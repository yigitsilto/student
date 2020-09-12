<template>
    <router-view></router-view>
</template>

<script>
import Notiflix from "notiflix";

export default {
    name: "App",
    mounted() {
        Notiflix.Loading.Hourglass();

        // token var ise panel sayfasına yönlendir yok ise login e at
        axios.get('/api/user', {
                headers: {
                    Authorization: 'Bearer' + localStorage.getItem('token')
                }
            },
        ).then(response => {
            Notiflix.Loading.Remove();

            this.$router.push({name: 'panel'});
        }).catch(error => {
            Notiflix.Loading.Remove();

            console.log(error);
            if (error.response.status === 401 || error.response.status === 403) {
                localStorage.setItem('token', '')
                this.$router.push({name: 'home'})
            }
        });
    }
}
</script>

<style scoped>

</style>
