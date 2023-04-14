<template>
    <div>
        <div v-if="isEdit">

            <div class="row">
                <div class="col-md-8">
                    <div v-for="(item, key) in inValue"
                         :key="inValue.filter(i => i.id === item.id).length === 1 ? `component${item.id}` : `component${item.id}${key}`"
                         class="form-group">


                        <label for=""> <b>{{types.find(i => i.value === item.type).label}}</b></label>

                        <component
                            v-bind:is="componentInput[types.find(i => i.value === item.type).component]"
                            v-model="item.value"
                            v-bind="types.find(i => i.value === item.type).settings"
                        >

                        </component>
                    </div>
                </div>
                <div class="col-md-4">

                    <label for="">Блоки</label>
                    <table class="table table-sm table-bordered">
                        <thead>
                        <tr>
                            <th style="width: 33px"><span @click="add" class="btn btn-sm btn-icon-sm btn-outline-dark"><font-awesome-icon icon="plus" class=""/></span></th>

                            <th>Тип</th>
                            <th style="width: 33px"></th>
                        </tr>
                        </thead>

                        <draggable
                            :list="inValue"
                            element="tbody"
                            :options="{handle:'.draggable-item'}"
                        >
                            <tr v-for="(item,key) in inValue" :key="key">
                                <th><span class="btn btn-sm btn-icon-sm btn-outline-dark  draggable-item"><font-awesome-icon icon="arrows-alt-v" class=""/></span></th>


                                <td>

                                    <select v-model="item.type" v-if="isEdit" @change="onUpdateType(key)"  class="form-control form-control-sm" >
                                        <option v-for="item in types" :value="item.value">{{item.label}}</option>
                                    </select>
                                </td>
                                <th><span @click="remove(key)" class="btn btn-sm btn-icon-sm btn-outline-dark btn-icon-bottom"><font-awesome-icon icon="trash-alt" class=""/></span></th>
                            </tr>
                        </draggable>

                    </table>
                </div>
            </div>




        </div>
        <div v-else>
            <ul>
                <li v-for="item in value">{{item.label}}</li>
            </ul>
        </div>
    </div>
</template>

<script>
import { cloneDeep, isEqual } from 'lodash'
import draggable from 'vuedraggable'
import {library} from '@fortawesome/fontawesome-svg-core'
import {
    faArrowsAltV,
    faTrashAlt,
    faPlus,
} from '@fortawesome/free-solid-svg-icons'
import {FontAwesomeIcon} from '@fortawesome/vue-fontawesome'

library.add(
    faArrowsAltV,
    faTrashAlt,
    faPlus,
);
import Vue from 'vue'

export default {
    name: "input-filling",
    components: {
        draggable,
        'font-awesome-icon': FontAwesomeIcon,
    },
    props:{
        value: {
            type: Array,
            default: () => ([])
        },
        disabled:{
            type: Boolean,
            default: false
        },
        isEdit: {
            type: Boolean,
            default: true
        }

    },
    data(){
        return {
            inValue: cloneDeep(this.value),
            types:[
                {label: 'Текст', value: 'string', component: 'string'},
                {label: 'Блок - пунктир', value: 'block-dotted-line', component: 'img-h1-text'},
                {label: 'Блоки - иконка внутри', value: 'blocks-icon-inside', component: 'img-h1-text-list'},
                {label: 'Список - справа', value: 'list-right', component: 'img-h1-text-list'},
                {label: 'Блики - фиолетовые снизу', value: 'blocks-purple-bottom', component: 'img-h1-text-list'},
                {label: 'Блоки - иконка сверху', value: 'blocks-icon-on-top', component: 'img-h1-text-list'},
                {label: 'Список - желтый с иконками', value: 'list-yellow-with-icons', component: 'img-h1-text-list'},
                {label: 'Блоки - две колонки', value: 'blocks-two-columns', component: 'img-h1-text-list'},
                {label: 'Список - по центру', value: 'list-centered', component: 'img-h1-text-list'},
                {label: 'Список - фон серый', value: 'list-background-gray', component: 'img-h1-text-list'},
                {label: 'Блоки - квадрат', value: 'blocks-square', component: 'img-h1-text-list'},
                {label: 'Кнопка', value: 'block-btn', component: 'string'},
                {label: 'Многострочный текст', value: 'text', component: 'text'},
                {label: 'Файл', value: 'file', component: 'file', settings: {}},
                {label: 'Файлы', value: 'files', component: 'file', settings: {multiple: true}},
            ],
            defaultValue: {  "type": "string", value: undefined },
            componentInput: {},
        }
    },
    watch:{
        inValue:{
            deep: true,
            handler(){

                    this.$emit('input',this.inValue)


            }
        },
        value(){
            if (!isEqual(this.value, this.inValue)){
                this.inValue = cloneDeep(this.value)
            }
        }
    },
    mounted(){
        this.setInput()
    },
    methods:{

        add(){
            this.inValue.push(cloneDeep(this.defaultValue))
        },
        remove(key){
            this.inValue.splice(key,1)
        },
        onUpdateType(key){
            this.inValue[key].value = undefined
        },
        setInput(){
            for(let item of this.types){
                let input = () => import(`./input-${item.component}`)
                input()
                    .then(() => Vue.set(this.componentInput, item.component, input))
                    .catch(() => {
                        // если нет то ищем в переданном пути
                        /*let inputDir = () => import(`./../page/${this.componentInputDir}/input-${typeField}`)
                        inputDir().then(() => Vue.set(this.componentInput, typeField, inputDir))*/
                    })

            }
        },

    }
}
</script>
