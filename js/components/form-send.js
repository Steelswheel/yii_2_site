import { POST } from "../API";
import { Form } from '@site/helpers'

let forms = document.querySelectorAll('[data-action="send"]')

if (forms) {
    forms.forEach(form => {
        form.addEventListener('click',e => {

            let formEl = e.target.closest('.form-submission');

            let modelSend = (new Form(formEl, ['phone','name','email','text','form']))
            let data = modelSend.formValue()
            data['page'] = document.querySelector('title').innerText;

            if (form.dataset.savings) {
                data['is_deposit'] = true;
            }

            const preloader = e.target.closest('div').querySelector('[data-role="preloader"]');

            e.target.dataset.visible = 'false';
            preloader.dataset.visible = 'true';

            POST('/site/form', data).then(() => {
                e.target.dataset.visible = 'true';
                preloader.dataset.visible = 'false';

                modelSend.success();
            }).catch(er => {
                e.target.dataset.visible = 'true';
                preloader.dataset.visible = 'false';

                if (er.code === 423) {
                    modelSend.spamReject();
                } else {
                    modelSend.error(er);
                }
            })

            return false

        })
    })
}