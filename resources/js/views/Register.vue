<template>
    <form @submit.prevent="register" method="post">

        <label for="email">Nome: </label>
        <input v-model="usuario.name" type="text" name="name" id="name"><br>

        <label for="email">E-mail: </label>
        <input v-model="usuario.email" type="email" name="email" id="email"><br>

        <label for="senha">Senha: </label>
        <input v-model="usuario.password" type="password" name="password" id="password">

        <button>Cadastrar</button>

    </form>
</template>

<script>

import Register from '../services/auth.js';

export default {

    name: "Register",

    data() {
        return {
            usuario: {
                name: '',
                email: '',
                password: '',
            }
        }
    },

    methods: {
        register() 
        {
            Register.register(this.usuario).then(resposta => {
                alert(resposta.data.resposta)
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