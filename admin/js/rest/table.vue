<template>
    <div>

        <div class="m-b-sm" >

<!--            <table-column-select
                :v-if="isColumnsSelect"
                :labels="labels"
                :resetAttributes="formatAttributes(this.attributes)"
                :attributes="inAttributes"
                @attributes="updateAttributes"
            />-->

            <a @click.prevent="typeVisible = typeVisible === 'full'? 'mini': 'full'" href="#" class="btn btn-xs btn-default">
                <i :style="`color:${typeVisible === 'full'? 'black': '#9a9a9a'}`" class="fa fa-arrows-alt"></i>
            </a>

            <span class="label label-md">Всего {{pagination.totalCount}}
                <template v-if="pagination.pageCount > 1">, страница {{pagination.currentPage}}</template>
            </span>

            <span v-if="getCountFilter > 0" class="label label-md">Фильтры: ( {{getCountFilter}} Ш )
                <a v-for="(val, attribute, index) in getFilterNoUndefined"
                   v-if="labels[attribute]"
                   @click.prevent="filter[attribute] = undefined"
                   href="#"
                   :class="
                        inAttributes.find(i => i.attribute === attribute)
                            ? inAttributes.find(i => i.attribute === attribute).show
                                ? 'text-primary'
                                : 'text-success'
                            : 'text-primary'
                   "
                >
                    {{labels[attribute]}} <i class="fa fa-times"></i><span v-if="index + 1 !== getCountFilter">, </span>

                </a>
            </span>
        </div>

        <div class="table_scroll ibox-content" :class="loading?'sk-loading':''">

            <div class="sk-spinner sk-spinner-wave">
                <div class="sk-rect1"></div>
                <div class="sk-rect2"></div>
                <div class="sk-rect3"></div>
                <div class="sk-rect4"></div>
                <div class="sk-rect5"></div>
            </div>



            <div>
                <table :class="classTable?classTable:'table b-table  table-bordered table-sm'">
                    <thead>
                    <tr>
                        <th v-if="sortTable" width="42px"></th>
                        <th v-if="column_update !== undefined" class="column_update ">

                        </th>

                        <th
                            v-if="itemAttribute.show !== false"
                            v-for="itemAttribute in inAttributes" :width="itemAttribute.width || ''"
                        >
                            <template v-if="itemAttribute.order">
                                <span class="my-filter" @click="setSort(itemAttribute.attribute)">
                                   {{ itemAttribute.attributeLabel || labels[itemAttribute.attribute] }}
                                </span>

                                <span v-if="sort.sort && sort.sort.slice(1) === itemAttribute.attribute" class="pull-right">
                                    <i v-if="sort.sort[0] === '+'" class="fa fa-sort-amount-asc"></i>
                                    <i v-else class="fa fa-sort-amount-desc" ></i>
                                </span>
                            </template>
                            <template v-else>
                                {{ itemAttribute.attributeLabel || labels[itemAttribute.attribute] }}
                            </template>

                        </th>
                    </tr>

                    <tr v-if="onFilter">
                        <th v-if="column_update !== undefined"></th>
                        <th
                            v-if="itemAttribute.show !== false"
                            v-for="itemAttribute in inAttributes"
                        >


                            <component
                                v-if="itemAttribute.filter"
                                v-bind:is="componentFilter['filter'+(itemAttribute.filter === true ? 'string' : itemAttribute.filter)]"
                                :key="`filter${itemAttribute.attribute}`"
                                v-model="filter[itemAttribute.attribute]"
                                :attribute="itemAttribute.attribute"
                                :enumeration="enumeration[itemAttribute.attribute]"
                            />


                        </th>

                    </tr>
                    </thead>

                    <tbody>
                        <tr v-for="item in list">
                            <td  v-if="sortTable">
                                <span
                                    class="label label-white "
                                    :class="isLoadingDrag? 'is-loading' : 'label-drag cursorPointer'"
                                ><i class="fa fa-navicon" ></i></span>
                            </td>
                            <td v-if="column_update !== undefined">
                                <router-link
                                    :to="{name:column_update,params: routerParams(item.id) }"
                                    class="fullClickTable">
                                    <font-awesome-icon  icon="edit"/>
                                </router-link>
                            </td>
                            <td
                                v-if="itemAttribute.show !== false"
                                v-for="(itemAttribute, key) in inAttributes"
                                :key="key"
                                :class="itemAttribute.className || ''"
                            >


                                <table-cell
                                    v-if="itemAttribute.type"
                                    :key="`cell${item.id}${itemAttribute.attribute}`"
                                    :value="item[itemAttribute.attribute]"
                                    :value_name="item[`${itemAttribute.attribute}_name`]"
                                    :itemAttribute="itemAttribute"
                                    :itemList="item"
                                    :componentInputDir="componentInputDir"
                                    :enumeration="enumeration[itemAttribute.attribute] === undefined ? undefined : enumeration[itemAttribute.attribute]"
                                    :getParams="expand"
                                    :modelUpdate="modelUpdate"
                                    :actionUpdate="actionUpdate"
                                    :model="model"
                                    :attributeLabels="labels"
                                    :visible="typeVisible"
                                    :filter="filter"
                                    @updateRow="updateRow"
                                />

                                <slot v-else :name="itemAttribute.attribute" :data="item">
                                    {{item[itemAttribute.attribute]}}
                                </slot>
                            </td>
                        </tr>
                    </tbody>

                </table>

            </div>


        </div>


        <div class="block">
            <!-- layout="total, sizes, prev, pager, next, jumper"-->
            <el-pagination

                :current-page.sync="page.page"
                :page-size="pagination.perPage"
                :total="pagination.totalCount">
            </el-pagination>
        </div>


    </div>
</template>

<script>
/* eslint-disable */
import {library} from '@fortawesome/fontawesome-svg-core'
import {
  faEdit
} from '@fortawesome/free-solid-svg-icons'
import {FontAwesomeIcon} from '@fortawesome/vue-fontawesome'
library.add(
    faEdit,
);

import { debounce, isEqual, cloneDeep, isEmpty } from 'lodash'
import API from 'API'
import Vue from 'vue'
import tableCell from './table-cell'
import tableColumnSelect from './table-column-select'
import { Pagination } from 'element-ui'
export default {
    name: "AppointmentList",
    components: {
        tableCell,
        tableColumnSelect,
        'el-pagination': Pagination,
        'font-awesome-icon': FontAwesomeIcon,
    },
    props: {
        isColumnsSelect: {
            type: Boolean,
            default: false
        },
        column_update: {},
        column_updateParams:{
            type: Object,
            default: () => ({})
        },
        addFilter: {
            type: Object,
            default: function () {
                return {}
            }
        },
        model: {},
        // префикс для сохронения в локал localstorage
        prefixLocalStorage: {
            type: String,
            default:''
        },
        modelUpdate: {
            type: String,
        },
        actionUpdate: {
            type: String,
            default:'update'
        },
        attributes: {},
        classTable: {},
        sortTable: {
            type: [Boolean,Object],
            default: false
        },

        // Путь до компонентов input
        componentInputDir: String,
        getParams: {
            type: Object,
            default: () => ({})
        },
        functionDrag: Function,

    },
    data() {
        return {
            inAttributes: this.getAttributes(this.attributes),
            labels: {},
            attributeLabels: {},
            loading:false,
            filter: this.localStorageGet('filter'),
            sort: {sort: undefined},
            page: {page: 1},
            list: [],
            urlGet: {},
            pagination: {},
            paginationEl: 10,
            paginationList: [],

            componentFilter: {},
            enumeration: {},
            isEditField: false,
            editFieldValue: undefined,
            isLoadingDrag: false,
            typeVisible: this.localStorageGet('typeVisible','mini'),
            // метка обновления переменных их localstorage
            updateLocalData: false
        }
    },
    watch: {
        /* Внешнии фильтры */
        addFilter: {
            deep: true,
            handler: debounce(function(){
                this.load()
            },250),
        },
        /* Следим за изменениями фильтров */
        filter: {
            deep: true,
            handler: debounce(function(){
                this.load()
            },250),
        },
        sort: {
            deep: true,
            handler: debounce(function(){
                this.load()
            },250),
        },
        page: {
            deep: true,
            handler: debounce(function(){
                this.load()
            },1),
        },

        typeVisible(){

            if (this.updateLocalData){
                this.updateLocalData = false
            }else{
                this.localStorageSet('typeVisible',this.typeVisible)
            }

        }
    },
    computed: {
        getCountFilter(){
            return Object.values(this.filter).filter(i => i !== undefined).length
        },
        getFilterNoUndefined(){
            let a = Object.entries(this.filter);
            a = a.filter(i => i[1] !== undefined)
            return Object.fromEntries(a)
        },
        onFilter(){
            return this.inAttributes.filter(i => i.filter).length > 0
        },
        expand(){
            return {expand: this.inAttributes.filter(i => i.show !== false).map(i => i.attribute).join()}
        },
    },
    mounted() {

        // Подписываемся на события изменения переменных в соседних таблицах
        this.$root.$on(`${this.prefixLocalStorage}-${this.model}`, (attribute) => {

            let newValue = this.localStorageGet(attribute)
            if (!isEqual(newValue,this[attribute])){
                this.updateLocalData = true

                if (attribute === 'inAttributes'){
                    this.inAttributes = newValue
                    this.load()
                }

                if (attribute === 'typeVisible'){
                    this.typeVisible = newValue
                }
            }

        });

        this.load()

        // Список компонентов для фильтров
        this.initComponentFilterAndFields()
    },
    methods: {
        updateAttributes(inAttributes){

            this.inAttributes = inAttributes
            this.localStorageSet('inAttributes',this.inAttributes)
            this.load()
        },
        updateRow(row){
            let i = this.list.findIndex(i => i.id === row.id)
            Vue.set(this.list,i,row)
        },
        formatAttributes(attributes){
            //                             r
            //                             e r
            //                             t e w t
            //                             l d o i
            //                             i r h d
            // Сокращенная запись {title: (f o s e)'1111-select-select:200'}
            return attributes.map(i => {

                if (!i.attribute){
                    let params = Object.values(i)[0].split(':')[0]
                    let width = Object.values(i)[0].split(':')[1]

                    return {
                        attribute: Object.keys(i)[0],
                        filter: parseInt(params[0])
                            ? params.split(',')[2] || params.split(',')[1] || 'string'
                            : false,
                        order:  !!parseInt(params[1]),
                        show:   !!parseInt(params[2]),
                        edit:   !!parseInt(params[3]),
                        type: params.split(',')[1] || 'string',
                        width
                    }
                }
                return i
            })
        },
        getAttributes(attributes){
            // тут берем из localStorage

            let formatAtr = this.formatAttributes(attributes)

            let inAttributes = this.localStorageGet('inAttributes',false)
            let attributesLocal = this.localStorageGet('attributesLocal',false)

            if (!isEqual(attributesLocal,attributes) ){
                this.localStorageSet('attributesLocal',attributes)
                return formatAtr
            }

            return inAttributes ? inAttributes : formatAtr
        },
        routerParams(id){
            return {id,...this.column_updateParams}
        },
        onDragEnd(){
            this.isLoadingDrag = true;
            this.functionDrag(this.list.map(i => i.id))
                .finally(() => {
                    this.isLoadingDrag = false;
                })
        },

        clickCell(item, s) {
            //s.test()
        },
        setSort(attribute){
            if (this.sort.sort){
                if (this.sort.sort.slice(1) === attribute){
                    this.sort.sort = this.sort.sort[0] === '+'
                        ? this.sort.sort = `-${attribute}`
                        : this.sort.sort = undefined
                }else {
                    this.sort.sort = `+${attribute}`
                }
            }else {
                this.sort.sort = `+${attribute}`
            }
        },

        load() {
            this.loading = true
            let url = {
                ...this.getParams,
                ...this.page,
                ...this.sort,
                ...this.filter,
                ...this.addFilter,
                ...this.expand,
            }
            this.localStorageSet('filter',this.filter)
            API.get(this.model,url)
                .then(r => {
                    this.loading = false
                    this.pagination = r._meta
                    this.list = cloneDeep(r.items)
                    if(!isEmpty(r._enumeration)){
                        this.enumeration = r._enumeration
                    }



                    this.labels = r._attributeLabels
                    this.attributeLabels = this.inAttributes.map(item => ({
                        attributeLabel: (r._attributeLabels[item.attribute]) ? r._attributeLabels[item.attribute] : '',
                        ...item,
                    }))

                })

        },
        localStorageSet(attribute,value){
            localStorage.setItem(`${this.prefixLocalStorage}-${this.model}-${attribute}`,JSON.stringify(value))
            this.$root.$emit(`${this.prefixLocalStorage}-${this.model}`,attribute)
        },
        localStorageGet(attribute,defaultValue = {}){
            return localStorage.getItem(`${this.prefixLocalStorage}-${this.model}-${attribute}`)
                ? JSON.parse(localStorage.getItem(`${this.prefixLocalStorage}-${this.model}-${attribute}`))
                : defaultValue
        },
        // Подключение компонентов
        initComponentFilterAndFields(){
            let componentFilterFields = [...new Set(
                this.inAttributes
                    .filter(i => i.filter)
                    .map(i => i.filter === true ? 'string' : i.filter)
            )]

            this.setInputComponent(componentFilterFields,'filter')
        },
        setInputComponent(fields, typeFields){

            for(let field of fields){

                let input = () => import(`./input/${typeFields}-${field}`)

                input()
                    // Ищем компонент в общей папке
                    .then(() => Vue.set(this.componentFilter, `${typeFields}${field}`, input))
                    .catch(() => {
                        // если нет то ищем в переданном пути
                      /*  let inputDir = () => import(`./../page/${this.componentInputDir}/${typeFields}-${field}`)
                        inputDir()
                            .then(() => Vue.set(this.componentFilter, `${typeFields}${field}`, inputDir))
                            .catch()*/
                    }

                    )

            }
        },

    },

}
</script>

<style scoped>

>>>.btn-xs{
    padding: 0px 5px;
}
.column_update{
    width:50px;
    text-align: center;
}

.ibox-content{
    margin: 0;
    border:none;
    padding: 0px 0px;
}

.my-filter {
    cursor: pointer;
    border-bottom: 1px dotted #424242;
}
</style>
