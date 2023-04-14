import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex)
import {getField, updateField} from 'vuex-map-fields';

export default new Vuex.Store({
    state: {
        title:'',
        breadcrumb:[],
    },
    getters: {
        getField,
        getTitle: state => state.title,
        getBreadcrumbs: state => state.breadcrumb
    },
    mutations: {
        updateField,
        setBreadcrumb(state,breadcrumb){
            state.breadcrumb = breadcrumb
        },
        setTitle(state,title){
            /*document.querySelector(".titleName").innerText = title;*/
            document.querySelector("title").innerText = title;
            state.title = title
        },
    },
    actions: {

    },
    modules: {
    }
})
