<template>
    <div class="Yii-table-cell ">
        <div class="edit-attribute "
             :class="((isEdit && typeAttribute !== 'modal') ? 'cell-edit-field': '') + ' ' + `cell-edit-field__${itemAttribute.type}`"
             ref="editField"
        >


            <div>
                <div @click.prevent="openEdit" :class="{'is-edit-div': classDotted}">

                </div>
                <component
                    v-bind:is="componentField"
                    :isEdit="openEditBlock"
                    :disabled="(!isClickEdit && isLoading)"
                    :value="inValue === null ? undefined : inValue"
                    :value_name="inValue_name"
                    @input="saveAndUpdate"
                    :enumeration="enumeration"
                    @save="save"
                    @close="isEdit = false"
                    :isLoading="isLoading"
                    :componentInputDir="componentInputDir"
                    :typeAttribute="itemAttribute.type"
                    :visible="visible"
                    :filter="filter"
                    :id="itemList.id"
                    insertionPoint="table"
                />
            </div>

            <span v-if="itemAttribute.edit && disabled" class="m-l-xs">
                <i class="fa fa-unlock-alt"></i>
            </span>

            <div
                v-if="itemAttribute.edit && !disabled"
                class="edit-attribute__pencil">

                <div v-if="isEdit" class="btn-group-xs">
                    <button  @click.prevent="save" class="btn btn-xs" :class="{'is-loading': isLoading}">
                        <span><i class="glyphicon glyphicon-save"></i></span>
                    </button>
                    <button @click.prevent="console" class="btn btn-xs"><i class="fa fa-times"></i></button>
                </div>

            </div>

        </div>
        <div class="text-danger" v-for="(itemError, key) in errors" :key="key">
            <b>{{attributeLabels[itemError.field]
                ? attributeLabels[itemError.field]
                : itemError.field}}</b>: {{itemError.message}}
        </div>
    </div>

</template>

<script>
/* eslint-disable */

import {cloneDeep, isEqual} from 'lodash'
import API from 'API'
export default {
    name: "table-cell",
    props: {
        value: [String, Number, Boolean, Array, Object],
        value_name: {},
        itemAttribute: Object,
        itemList: Object,
        componentInputDir: String,
        enumeration: Array,
        filter: {},
        getParams: Object,
        modelUpdate: String,
        actionUpdate: String,
        model: String,
        attributeLabels: {},
        visible: {
            type: String,
            default: 'full',
            validator: function (value) {
                return ['mini', 'full'].includes(value)
            }
        }
    },
    data(){
        return {
            isEdit: false,
            inValue: cloneDeep(this.value),
            inValue_name: cloneDeep(this.value_name),
            isLoading: false,
            errors: []
        }
    },
    watch: {
        /*inValue:{
            deep: true,
            handler(){
                // если блок не открывается по клику то следим за его значением

            }
        },*/
        value(){
            if (JSON.stringify(this.value) !== JSON.stringify(this.inValue)){
                this.inValue = cloneDeep(this.value)
            }
        },
        value_name(){
            if (JSON.stringify(this.value_name) !== JSON.stringify(this.inValue_name)){
                this.inValue_name = cloneDeep(this.value_name)
            }
        }
    },
    computed: {
        // блок открыт на редактирование или закрыт
        openEditBlock(){
            if (this.isClickEdit){
                return this.isEdit
            }
            return !this.disabled
        },
        classDotted(){
            return !this.disabled && this.itemAttribute.edit && !this.isEdit && this.isClickEdit
        },
        isClickEdit(){
            switch (this.itemAttribute.type) {
                case 'check' : return false
                case 'toggle' : return false
                default : return true
            }
        },
        typeAttribute(){
            switch (this.itemAttribute.type) {
             /*   case 'tinymce' :  return 'modal'
                case 'text' :  return 'modal'
                case 'strong-table' :  return 'modal'
                case 'tabs' :  return 'modal'
                case 'property' :  return 'modal'
                case 'columns' :  return 'modal'
                case 'group-onOff' :  return 'modal'
                case 'group-tabs' :  return 'modal'
                case 'role' :  return 'modal'*/
                default : return this.itemAttribute.type
            }
        },
        disabled(){
            return this.itemList.fieldSettings
                ? this.itemList.fieldSettings.find(i => i.attribute === this.itemAttribute.attribute).disabled
                : false
        }
    },
    mounted(){
        window.addEventListener('keydown', this.esc);
    },
    destroyed(){
        window.removeEventListener('keydown', this.esc);
    },
    methods: {
        esc(e){
            if(e.which === 27) {
                if (this.isEdit){
                    this.isEdit = false
                }
            }
        },
        saveAndUpdate(val){
            this.inValue = val
            if (!this.isClickEdit){
                this.save()
            }
        },
        openEdit(){
            if (this.classDotted){
                this.isEdit = true
                this.$nextTick(() => {
                    let cor = this.$refs.editField.getBoundingClientRect()
                    if (window.innerWidth < cor.right + 50){
                        this.$refs.editField.style.right = 0
                        this.$refs.editField.style.left = 'auto'
                    }
                })
            }
        },
        save(){
            this.errors = []
            this.isLoading = true
            let model = this.modelUpdate || this.model

            API.post(
                `${model}/${this.actionUpdate}/${this.itemList.id}`,
                {[this.itemAttribute.attribute]: this.inValue},
                this.getParams
            )
                .then(r => {
                    this.isEdit = false
                    this.inValue = r[this.itemAttribute.attribute]
                    if (r[`${this.itemAttribute.attribute}_name`]){
                        this.inValue_name = r[`${this.itemAttribute.attribute}_name`]
                    }
                    this.$emit('updateRow',r)

                })
                .catch(er => {
                    this.errors = er.data
                })
                .finally(() => {
                    this.isLoading = false
                })
        },
        console(){
            this.errors = []
            this.isEdit = false
            this.inValue = JSON.parse(JSON.stringify(this.value))
        },
        componentField(){

            // Ищем компонент в общей папке
            let input = () => import(`./input/input-${this.typeAttribute}`)
            return input()
                .then(() => input())
               /* .catch(() => {
                    return import(`./../page/${this.componentInputDir}/input-${this.typeAttribute}`)
                })*/
        },
    }
}
</script>

<style scoped>

.is-edit-div{
    border-bottom: 1px dotted #0a0a0a;
    cursor: pointer;
    min-height: 18px;
    min-width: 20px;

    position: absolute;
    width: 100%;
    height: 100%;
}
.edit-attribute{
    display: flex;
    align-items: center;
    max-width: 500px;

}
.edit-attribute > div{
    position: relative;
}
.edit-attribute__pencil{
    margin-left: 10px;
}
.edit-attribute__pencil > div{
    width: 50px;
}
</style>
