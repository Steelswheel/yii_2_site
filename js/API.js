import axios from "axios";

const HTTP = axios.create({
    baseURL: '/',
    headers: {
        'Content-type': 'application/x-www-form-urlencoded',
    }
});

let getCsrfToken = function () {
    return document.querySelector('[name="csrf-token"]').content;
};

HTTP.interceptors.response.use(
    response => response.data,
    error => {
        if (error.response.status === 422) {
            return Promise.reject(error.response.data)
        } else if (error.response.status === 423) {
            return Promise.reject(error.response.data)
        }
    }
);

export const POST = (method, data) => {
    const formData = new FormData();

    formData.append('_csrf', getCsrfToken());

    for (let key in data) {
        if (Array.isArray(data[key]) && data[key].length > 0) {
            for (let i = 0; i < data[key].length; i++) {
                formData.append(key+`[${i}]`, data[key][i].file);
            }
        } else {
            formData.append(key, data[key]);
        }
    }

    return HTTP.post(method, formData);
}

export const GET = (method,data) => HTTP.get(method, {
    params: data
});

