import { http } from './config.js';

export default {
    auth: (data) => {
        return http.post('/login', data);
    },

    register: (usuario) => {
        return http.post('/register', usuario);
    }
}