import Inputmask from 'inputmask';

let emailEls = document.querySelectorAll('[name="email"]')
emailEls.forEach(el => {
    (new Inputmask({ alias: 'email'})).mask(el)
})


let phoneEls = document.querySelectorAll('[name="phone"]')
phoneEls.forEach(el => {
    (new Inputmask('+7 (999) 999-99-99')).mask(el)
})
