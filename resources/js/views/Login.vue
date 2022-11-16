<template>
    <form @submit.prevent="login" method="post">

        <label for="email">E-mail: </label>
        <input v-model="data.email" type="email" name="email" id="email"><br>

        <label for="senha">Senha: </label>
        <input v-model="data.password" type="password" name="password" id="password">

        <button>Entrar</button>

    </form>
</template>

<script>

import Login from '../services/auth.js';
import Cookie from 'js-cookie';

export default {

    name: "Login",

    data() {
        return {
            data: {
                email: '',
                password: '',
            }
        }
    },

    methods: {
        login() 
        {
            Login.auth(this.data).then(resposta => {
                Cookie.set('_authToken', resposta.data.access_token)
                this.$router.go();
            })
        }
    }
}
</script>

<style>
form {
    margin-top: 5%;
}
</style>