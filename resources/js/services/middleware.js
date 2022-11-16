import Cookie from 'js-cookie';

export default {
    auth(to, from, next) {
        const token = Cookie.get('_authToken');

        if(!token){
            next('/spa/login');
        } else {
            next();
        }
    }
}