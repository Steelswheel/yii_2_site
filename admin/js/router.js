import Vue from 'vue'
import Router from 'vue-router'
import { upperFirst } from 'lodash'
Vue.use(Router);

let propsInt = (route) => {
    const id = Number.parseInt(route.params.id, 10)
    if (Number.isNaN(id)) {
        return undefined
    }
    return { ...route.params, id }
}

function routCRUD(name){
    const actions = ['','create','update']
    return   actions.map(action => ({
        path: `/admin/${name}${action === 'update'?'/:id':action ? '/'+action: ''}`,
        name: name + upperFirst(action),
        props: action === 'update' ? propsInt:undefined,
        component: () => import(`./pages/${name}/${name}${action ? '-'+action : ''}`),
    }))

}

export default new Router({
    mode: 'history',

    scrollBehavior() {
        return window.scrollTo({ top: 0, behavior: 'smooth' });
    },

    routes: [

        //    meta: {layout: 'userpages'},
        {
            path: '/admin/',
            name: 'adminIndex',
            component: () => import('./pages/page1'),
        },
        {
            path: '/admin/asd',
            name: 'page1',
            component: () => import('./pages/page2'),
        },

        ...routCRUD('settings'),
        ...routCRUD('problem'),
        ...routCRUD('query'),
        ...routCRUD('news'),
        ...routCRUD('gallery'),
        ...routCRUD('reviews'),



    ]
})
