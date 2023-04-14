import Vue from "vue";
import { camelCase } from 'lodash'



export const addComponent = (componentName) => {
    const el = document.querySelector(`#${componentName}`)
    if (el){
        let props = {}
        for (let atr in el.dataset){
            if (atr.indexOf('json') === 0){
                props[camelCase(atr.substr(4))] = JSON.parse(el.dataset[atr])
            }else{
                props[atr] = el.dataset[atr]
            }
        }

        const component = () => import(`./components/${componentName}/${componentName}`)
        new Vue({
            render: h => h(component,{props})
        }).$mount(`#${componentName}`);
    }
}

export class Form{
    constructor(form,fields) {
        this.form = form;
        this.fields = fields;
    }

    itemValue = function (field){
        let el = this.form.querySelector(`[name="${field}"]`)
        if (el){
            return el.value
        }
        return ''
    }

    clearInvalid() {
        this.form.querySelectorAll(`.is-invalid`)
            .forEach(el => el.classList.remove('is-invalid'))
    }

    setError = function(field,message){
        if (message){
            let messageText = message.join('<br>')
            let el = this.form.querySelector(`[name="${field}"]`)
            el.classList.add('is-invalid')
            if (el.nextElementSibling && el.nextElementSibling.classList.contains('invalid-feedback')){
                el.nextElementSibling.innerHTML = messageText
            }else{
                let div = document.createElement('div')
                div.classList.add('invalid-feedback')
                div.innerHTML = messageText
                el.parentNode.insertBefore(div, el.nextSibling);
            }
        }
    }

    success() {
        this.form.style.display = 'none'
        this.form.nextElementSibling.style.display = 'block'
    }

    spamReject() {
        this.form.style.display = 'none'
        this.form.nextElementSibling.innerHTML = 'Вы уже отправили сообщение!'
        this.form.nextElementSibling.style.display = 'block'
    }

    formValue(){
        this.clearInvalid()
        let data = {}
        this.fields.forEach(i => {
            data[i] = this.itemValue(i)
        })
        return data
    }

    error(error){
        let data = {}
        for(let item in error){
            this.setError(item, error[item])
        }
        return data
    }


}