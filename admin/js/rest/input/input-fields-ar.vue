<template>
    <div>
        <div v-if="isEdit">

            <div class="row">
                <div class="col-md-6">
                    <div v-for="(item, key) in inValue"
                         :key="inValue.filter(i => i.id === item.id).length === 1 ? `component${item.id}` : `component${item.id}${key}`"
                         class="form-group">


                        <label for="">{{item.label}}</label>

                        <component
                             v-bind:is="componentInput[types.find(i => i.value === item.type).component]"
                             v-model="item.value"
                             v-bind="types.find(i => i.value === item.type).settings"
                        >

                        </component>
                    </div>
                </div>
                <div class="col-md-6">

                    <label for="">Атрибуты</label>
                    <table class="table table-sm table-bordered">
                        <thead>
                        <tr>
                            <th style="width: 33px"><span @click="add" class="btn btn-sm btn-icon-sm btn-outline-dark"><font-awesome-icon icon="plus" class=""/></span></th>
                            <th>ID</th>
                            <th>Заголовок</th>
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
                                    <input
                                        type="text" v-model="item.id"
                                        class="form-control form-control-sm"
                                        :class="{'is-invalid':inValue.filter(i => i.id === item.id).length > 1 }"
                                    >
                                    <div class="invalid-feedback">Значение ID должно быть уникальным</div>
                                </td>
                                <td><input type="text" v-model="item.label" class="form-control form-control-sm"></td>
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
        name: "input-fields-ar",
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
                    {label: 'Многострочный текст', value: 'text', component: 'text'},
                    {label: 'Файлы', value: 'upload', component: 'upload' ,  settings: {multiple: true}},
                    {label: 'Списки', value: 'img-h1-text-list', component: 'img-h1-text-list'},
                ],
                defaultValue: { "id": "", "type": "string", "label": "", value: undefined },
                componentInput: {},
            }
        },
        watch:{
            inValue:{
                deep: true,
                handler(){
                    if (this.isValidateUniqueId()){
                        this.$emit('input',this.inValue)
                    }

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
            isValidateUniqueId(){
                let counter = this.inValue.reduce((accum ,i) => {
                    accum[i.id] !== undefined
                        ? accum[i.id]++
                        : accum[i.id] = 0
                    return accum
                },{})

                return Object.values(counter).reduce((accum,i) => accum + i) === 0
            },
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