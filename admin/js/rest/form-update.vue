<template>
    <div class="form-update">

        <template v-if="isLoadingForm">
            LOADING
        </template>
        <template v-else>
            <slot name="template"
                  :attributeLabels="attributeLabels"
                  :attributeValues="attributeValues"
                  :attributeRes="attributeRes"
            ></slot>



            <!--  Рендеренг полей -->
            <template v-for="itemAttribute in inAttributes">

                <div :ref="itemAttribute.attribute"

                     :class="{
                        'has-error': attributeErrors[itemAttribute.attribute],
                        'form-group': itemAttribute.title !== false
                     }
                ">

                    <label v-if="itemAttribute.title !== false ">{{attributeLabels[itemAttribute.attribute]}}</label>


                    <component v-bind:is="componentInput[itemAttribute.type]"
                               :value="attributeValues[itemAttribute.attribute] == null
                                    ? undefined
                                    : attributeValues[itemAttribute.attribute]"
                               :value_name="res[itemAttribute.attribute+'_name']"
                               :value_all="attributeValues"
                               @input="val => attributeValues[itemAttribute.attribute] = val"
                               :disabled="itemAttribute.disabled"
                               :enumeration="enumeration[itemAttribute.attribute]"
                               :enumeration_all="enumeration"
                               :error="attributeErrors[itemAttribute.attribute]"
                               :settings="itemAttribute.settings"
                               v-bind="itemAttribute.settings"
                               :id="id"
                               size="md"
                    />

                    <div v-if="attributeErrors[itemAttribute.attribute]"  class="text-danger">{{attributeErrors[itemAttribute.attribute]}}</div>


                </div>
            </template>

            <div v-if="Object.keys(attributeErrors).length > 0" class="m-b-lg">
                <div v-for="item in attributeErrors"  class="text-danger">{{item}}</div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <!--  <button v-if="id > 0" ref="functionBtnCreate" class='btn btn-primary' @click.prevent="saveAllAttribute"></button>
                      <button v-else ref="functionBtnCreate" class='btn btn-primary' @click.prevent="create"></button>-->


                    <button
                        ref="functionBtn"
                        v-if="id > 0"
                        class="btn btn-success"
                        :class="{'is-loading': loading}"
                        @click="saveAllAttribute"
                        :disabled="isDataHasChanged"
                    ><span>{{btnTextSave}}</span></button>

                    <button
                        v-else
                        ref="functionBtn"
                        class="btn btn-success"
                        :class="{'is-loading': loading}"
                        @click="create"
                        :disabled="isDataHasChanged"
                    ><span>{{btnTextCreate}}</span></button>


                    <button
                            v-if="showBtbDelete && id"
                            ref="functionBtnDelete"
                            class="btn btn-danger pull-right"
                            :class="{'is-loading': loading}"
                            @click="deleteModel(id)"

                    ><span>Удалить</span></button>


                </div>
            </div>



        </template>



    </div>
</template>

<script>
import Vue from 'vue'
import API from 'API'
import { Message } from 'element-ui';

export default {
    name: "form-update",
    props: {
        url: {
            type: String,
            default: ''
        },

        id: {
            type: [Number, String, Boolean],
            default: false
        },
        routerNameView: {
            type: String,
            default: 'index'
        },
        routerNameTable: {
            type: String,
            default: 'index'
        },
        routerNameViewParams: {
            type: Object,
            default: () => ({})
        },
        attributes: Array,
        btnTextCreate: {
            type: String,
            default: 'Создать'
        },
        btnTextSave: {
            type: String,
            default: 'Сохранить'
        },
        extra:{
            type: Array,
            default: () => ([])
        },
        // показывать кнопку или нет
        isBtn: Boolean,
        // имя модели
        model: String,
        // получаем поля с сервера
        attributesServer: Boolean,
        showBtbCreate:{
            type: Boolean,
            default: true
        },
        showBtbDelete:{
            type: Boolean,
            default: false
        },
        showBtbCreateNext:{
            type: Boolean,
            default: true
        },
        // редиректить на новую созданную можеель
        redirectNewModel:{
            type: Boolean,
            default: true
        },
        // Путь до компонентов input
        componentInputDir:String,
    },
    data(){
        return {
            handler: undefined,
            loading:false,
            attributeLabels:{},
            attributeValues:{},
            res:{},
            attributeErrors:{},
            immutableData:{},
            attributeType:{},
            enumeration:{},
            isLoadingForm: true,
            inAttributes:[],
            attributeRes: {},
            componentInput:{},
            MESSAGE: undefined
        }
    },
    mounted() {
        let M = () => {
            let m = {}

            let start = function(){
                if (m.closed === false) m.close()
                m = Message({
                    duration: 0,
                    message: "Данные сохраняются",
                    showClose: true
                })
            }
            let success = function(){
                m.type = 'success'
                m.message = "Данные сохранены"
                setTimeout(() => {m.close()}, 2000)
            }
            let error = function(errorMessage){
                m.type = 'error'
                m.message = errorMessage
                m.dangerouslyUseHTMLString = true
                setTimeout(() => {m.close()}, 5000)
            }
            return {
                start,
                success,
                error
            }
        }
        this.MESSAGE = M()

        this.setInput()
        this.initForm()
        //this.$emit('attributeValues', {})


        // CtrlS
        this.handler = e => {
            if((e.ctrlKey || e.metaKey) && event.which == 83) {
                this.saveCtrlS();
                event.preventDefault();
                return false;
            }
        }
        window.addEventListener('keydown', this.handler);
        this.$root.$on('saveYiiUpdate', () => {
            this.saveCtrlS();
        })
    },
    destroyed(){
        window.removeEventListener('keydown', this.handler);
    },
    watch:{
        attributeValues:{
            handler: function () {
                this.$emit('handleAttributeValues',this.attributeValues)
            },
            deep: true,
        },
        id(){
            this.initForm()
        }
    },
    computed:{
        expand(){
            return [...this.attributes.map(i => i.attribute),...this.extra].join(',')
        },
        isDataHasChanged(){
            return JSON.stringify(this.attributeValues) === JSON.stringify(this.immutableData)
        }
    },
    methods: {
        // Подключение компонентов
        setInput(){
            let typeFields = [...new Set(this.attributes.map(i => i.type))]

            for(let typeField of typeFields){

                let input = () => import(`./input/input-${typeField}`)

                input()
                    // Ищем компонент в общей папке
                    .then(() => Vue.set(this.componentInput, typeField, input))
                    .catch(() => {
                        // если нет то ищем в переданном пути
                        /*let inputDir = () => import(`./../page/${this.componentInputDir}/input-${typeField}`)
                        inputDir().then(() => Vue.set(this.componentInput, typeField, inputDir))*/
                    })

            }
        },
        async initForm(){
            // загружаем поля при создании
            if (this.id === false){
                await this.loadAttributes()
            }else{
                await this.loadData()
            }

            // Установка полей и форм
            this.$nextTick(this.setForm());
        },
        // установка полей
        setForm(){

            // Установка полей
            this.inAttributes.forEach(itemAttribute => {
                let el = this.$el.querySelector('.attribute-'+itemAttribute.attribute);
                if (el) el.appendChild(this.$refs[itemAttribute.attribute][0])
            })

            // Установка кнопок на кастомные места
            let btnSave = this.$el.querySelector('.function-btn');
            if (btnSave) btnSave.appendChild(this.$refs['functionBtn'])



        },
        // загрузка модели по id
        async loadData(){

            const formData = await API.get(`${this.url}/${this.id}`,{expand:this.expand})

            this.getData(formData)
        },
        // загрузка атрибутов если cоздаем новою модель
        async loadAttributes(){
            const formData = await API.get(`${this.url}/attributes`,{})
            this.getData(formData)
        },

        /**
         * заполнение формы данными
         * @param res
         */
        getData(res){
            let atr = {}
            this.attributeLabels = res._attributeLabels
            this.enumeration = res._enumeration
            this.$emit('res',res)
            this.res = res;

            this.inAttributes = this.attributes.filter(i => i.show === undefined || i.show)

            if (res._fieldSettings){
                this.inAttributes = this.inAttributes.map(itemInAttributes => {
                    return {
                        ...itemInAttributes,
                        'disabled': res._fieldSettings.find(({attribute}) => attribute === itemInAttributes.attribute)
                            ? res._fieldSettings.find(({attribute}) => attribute === itemInAttributes.attribute).disabled
                            : false,
                    }
                })
            }


            // установка значений
            for (let item of this.inAttributes){
                atr[item.attribute] = this.id === false
                    ? item.default
                        ? item.default
                        : null
                    : atr[item.attribute] = res[item.attribute]
            }


            this.attributeRes = res
            this.attributeValues = JSON.parse(JSON.stringify(atr))
            this.immutableData = JSON.parse(JSON.stringify(atr))

            this.isLoadingForm = false
        },



        saveAllAttribute(){
            if (!this.loading){
                this.attributeErrors = {}
                this.loading = true;

                let expand = 'expand='+this.expand

                this.MESSAGE.start();

                API.post(`${this.url}/update/${this.id}?${expand}`,this.attributeValues)
                    .then(r => {
                        this.getData(r)
                        this.saveEmit(r)
                        this.MESSAGE.success();


                    })
                    .catch(this.errorForm)
                    .finally(() => {  this.loading = false })
            }

        },
        saveEmit(r){
            this.$emit('save',r)
        },
        updateEmit(){
            this.$emit('update')
        },


        create(){
            this.loading = true;
            this.MESSAGE.start();

            this.attributeErrors = {}
            let expand = 'expand='+this.expand
            return API.post(`${this.url}/create?${expand}`,this.attributeValues)
                .then(res => {
                    this.MESSAGE.success();

                    if (this.redirectNewModel){
                        window.removeEventListener('keydown', this.handler);
                        this.$router.push({name: this.routerNameView, params: {id: res.id, ...this.routerNameViewParams}})
                    }else {
                        this.$forceUpdate();
                        this.isLoadingForm = true;
                        this.initForm()
                        this.updateEmit()
                    }
                    this.saveEmit(res)


                })
                .catch(this.errorForm)
                .finally(() => {  this.loading = false })
        },

        errorForm(er){

            if (er.status === 422){
                let messageEr = er.data.map(i => (`<p>Поле <strong>${this.attributeLabels[i.field]}</strong>:  ${i.message}</p>`))
                er.data.forEach(el => {
                    Vue.set(this.attributeErrors, el.field, el.message)
                })
                this.MESSAGE.error(messageEr.join('<br>'))
            }else {
                this.MESSAGE.error('Ошибка '+er.status)
            }

        },
        deleteModel(id){
            this.loading = true;
            API.delete(`${this.url}/delete/${id}`).then(() => {
                this.$router.push({name: this.routerNameTable})
            })
        },


        saveCtrlS(){

            if (!this.isDataHasChanged && !this.loading){
                if (this.id){
                    this.saveAllAttribute()
                }else {
                    this.create();
                }
            }
        }

    }
}
</script>

<style scoped>

</style>
