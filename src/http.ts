import axios from "axios"
import { unsetUser } from "./auth/auth"
import { ref } from "vue"

export const http = axios.create({
    // Any settings needed?
})

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
            default:
                errorBag.value = {...error.response.data.errors}; //Alleen bij 422, de default zal '.data.error' zijn. En in 422 zit dan ook nog 'errors' voor input specifieke shit
                return Promise.reject(error);
        }
    }
)

type httpError = {
    [key: string]: Array<string>;
}

export const errorBag = ref<httpError>({})
export const errorMessages = ref({})