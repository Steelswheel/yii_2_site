import axios from 'axios';
import { cloneDeep } from 'lodash'
const HTTP = axios.create({
    baseURL: '/',
    headers: {
        'Content-type': 'application/json',
    }
});

let getCsrfToken = function () {
    return document.querySelector('[name="csrf-token"]').content
}

HTTP.interceptors.response.use(
    response => response.data,
    error => {
        if (error.response.status === 422) {
            return Promise.reject(error.response.data)
        }
    }
);

export const appendFormData = (data,formData,id = 0) => {

    for (let attribute in data) {

        if (['[object Object]'].includes(Object.prototype.toString.call(data[attribute])) ) {
            id = appendFormData(data[attribute], formData, id)

        }else if(['[object Array]'].includes(Object.prototype.toString.call(data[attribute])) ){

            for(let key in data[attribute]){

                if ( ['[object File]'].includes(Object.prototype.toString.call(data[attribute][key]))) {
                    formData.append(id, data[attribute][key]);
                    data[attribute][key] = id
                    id++
                }else{
                    id = appendFormData(data[attribute][key], formData, id)
                }
            }
        }else {
            if ( ['[object File]'].includes(Object.prototype.toString.call(data[attribute]))) {
                formData.append(id, data[attribute]);
                data[attribute] = id
                return ++id
            }
        }
    }

    return id
}

export default {

    get: (method,data) => HTTP.get(method, {
        params: data
    }),

    postUpload: (method,upload,onUploadProgress) => {

        const formData = new FormData()
        let  headers = {'Content-Type': 'multipart/form-data'}

        formData.append('upload', upload);

        return HTTP.post(method, formData,
            {
                headers,
                onUploadProgress
            }
        )
    },

    post: (method,dataForm) => {
        let data = cloneDeep(dataForm)
        data['_csrf'] = getCsrfToken();
        let headers = {'Content-Type': 'application/json'}
        const formData = new FormData()

        if(appendFormData(data, formData) > 0) {
            let jsonText = JSON.stringify(data)
            formData.append('JSON', jsonText);
            data = formData;
            headers = {'Content-Type': 'multipart/form-data'}
        }

        return HTTP.post(method, data,{
            headers
        })
    },

    delete: method => HTTP.delete(method)

}
