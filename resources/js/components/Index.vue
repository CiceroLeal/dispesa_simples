<template>
    <div class="container">
        <router-link to="/conta/criar">Criar Conta</router-link>
    </div>
</template>

<script>
    export default {
        mounted() {
            axios.get('/conta').then(function (resp) {
                console.log(resp.data);
            })
        }
    }
</script>
