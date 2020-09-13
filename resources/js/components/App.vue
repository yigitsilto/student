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

            var page = localStorage.getItem("page");
            // sayfa aktiflik için localstore kullandım
            if(page == null || page =="null"){
                this.$router.push({name: 'panel'});
            }else{

                // öğrenci sayfayı incele kısmından localstorege i değiştirip girememesi için böyle bir kontrol yaptım
                if (page == "objection" || page == "student"){
                    if (response.data.authority == 0){
                        this.$router.push({name: "panel"});

                    }else{
                        this.$router.push({name: page});
                    }
                }else{
                    this.$router.push({name: page});

                }

            }

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
