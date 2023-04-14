import Vue from 'vue'
import store from './store/store'
import './plugins/vuetify'
import router from './router.js'

//treeselect
import '@riophae/vue-treeselect/dist/vue-treeselect.css'

import BootstrapVue from "bootstrap-vue"
//import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'


import appAdmin from './app-admin'

import Default from './Layout/Wrappers/baseLayout.vue';
import Pages from './Layout/Wrappers/pagesLayout.vue';
import Apps from './Layout/Wrappers/appLayout.vue';
import site from './Layout/Wrappers/siteLayout.vue';

Vue.config.productionTip = false;

Vue.use(BootstrapVue);

Vue.component('default-layout', Default);
Vue.component('userpages-layout', Pages);
Vue.component('apps-layout', Apps);
Vue.component('site-layout', site);

import 'element-ui/lib/theme-chalk/index.css';
import lang from 'element-ui/lib/locale/lang/ru-RU'
import locale from 'element-ui/lib/locale'
locale.use(lang)


import PortalVue from 'portal-vue'
Vue.use(PortalVue)


if (document.querySelector('#admin'))
  new Vue({
    el: '#admin',
    store,
    router,
    render: h => h(appAdmin)
  });


