<template>
    <p>Login:</p>
    <router-link v-if="token == undefined" :to="{name: 'login'}">Clique aqui para fazer login</router-link><br>
    <router-link v-if="token == undefined" :to="{name: 'register'}">Clique aqui para se cadastrar</router-link><br>
    <router-link v-if="token != undefined" :to="{name: 'home'}">Clique aqui para entrar na home</router-link><br><br>
    <button v-if="token != undefined" v-on:click="logout">SAIR</button>
    <router-view></router-view>
</template>

<script>

    // importando a biblioteca e pegando o token
    import Cookie from 'js-cookie';

    export default {
        name: "App",

        data()
        { 
            return {
                token: Cookie.get('_authToken')
            }
        },

        methods: {

            logout()
            {
                Cookie.remove('_authToken');
                this.$router.go();
            }

        },
    }    

</script>

<style>
    /*  */
</style>