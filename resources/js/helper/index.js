import Axios from 'Axios';

export const host = 'http://127.0.0.1:8000'

export const axios = Axios.create({
    baseURL: host
})
