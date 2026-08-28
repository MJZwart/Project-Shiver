import axios from "axios"
import { unsetUser } from "./auth/auth"
import { ref } from "vue"

export const http = axios.create({
    // Any settings needed?
});

http.interceptors.request.use(
    function (config) {
        errorBag.value = {};

        return config;
    }
)

http.interceptors.response.use(
    function (response) {
        return response
    },
    function(error) {
        if (!('response' in error)) return;
        switch(error.response.status) {
            case 401:
                unsetUser();
                errorBag.value = {login: [error.response.data.error]}; // TODO: Properly curate error messages
                return Promise.reject(error);
            case 422:
                errorBag.value = {...error.response.data.errors}; //Alleen bij 422, de default zal '.data.error' zijn. En in 422 zit dan ook nog 'errors' voor input specifieke shit
                return Promise.reject(error);
            default:
                console.log('Something else than 401/422, check if this needs any better handling');
                return Promise.reject(error);
        }
    }
)

type httpError = {
    [key: string]: Array<string>;
}

// Maybe-todo?: Currently, a separate errorMessagesBag seems superfluous, any additional formatting for messages can be done in the error message container itself
export const errorBag = ref<httpError>({})