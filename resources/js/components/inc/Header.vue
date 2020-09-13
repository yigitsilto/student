<template>
<header>
    <div class="bg-dark" id="sidebar-wrapper">
        <div class="sidebar-heading text-white"><span style="font-size: 16px">Hoşgeldiniz</span></div>
        <div class="list-group list-group-flush">
            <a href="#" class="list-group-item list-group-item-action bg-dark text-white" v-on:click="redirectHome">Anasayfa</a>
            <a href="#" class="list-group-item list-group-item-action bg-dark text-white" v-on:click="redirectStudent">Öğrenci Bilgisi</a>
            <a href="#" class="list-group-item list-group-item-action bg-dark text-white" v-on:click="redirectProfile">Profil </a>
            <a href="#" class="list-group-item list-group-item-action bg-dark text-white" v-on:click="logout">Çıkış Yap</a>
        </div>
    </div>

</header>
</template>

<script>
$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});
</script>
<script>
import Notiflix from "notiflix";
export default {
    name: "Header",
    mounted() {

    },
    data:function (){
        return {
        }
    },
    methods:{
// logout metodu
        logout:function (e){
            // tokeni siliyoruz ve login sayfasına yönlendiriyoruz.
            localStorage.removeItem('page');
            localStorage.setItem('page', null)
            localStorage.removeItem('token');
            this.$router.push({ name: 'home' })
        },

        // öğrenci bilgisine yönlendirir
        redirectStudent:function (e){
            localStorage.removeItem('page');
            localStorage.setItem('page', 'student')
            this.$router.push({ name: 'student' })

        },
        // profil sayfasına yönlendirir
        redirectProfile:function (e){
            localStorage.removeItem('page');
            localStorage.setItem('page', 'profile')
            this.$router.push({ name: 'profile' })

        },
        // anasayfa bilgisine yönlendirir
        redirectHome:function (e){
            localStorage.removeItem('page');
            localStorage.setItem('page', 'panel')

            this.$router.push({ name: 'panel' })

        },
    }
}
</script>


<style scoped>
#wrapper {
    overflow-x: hidden;
}

#sidebar-wrapper {
    min-height: 100vh;
    margin-left: -15rem;
    -webkit-transition: margin .25s ease-out;
    -moz-transition: margin .25s ease-out;
    -o-transition: margin .25s ease-out;
    transition: margin .25s ease-out;
}

#sidebar-wrapper .sidebar-heading {
    padding: 0.875rem 1.25rem;
    font-size: 1.2rem;
}

#sidebar-wrapper .list-group {
    width: 15rem;
}

#page-content-wrapper {
    min-width: 100vw;
}

#wrapper.toggled #sidebar-wrapper {
    margin-left: 0;
}

@media (min-width: 768px) {
    #sidebar-wrapper {
        margin-left: 0;
    }

    #page-content-wrapper {
        min-width: 0;
        width: 100%;
    }

    #wrapper.toggled #sidebar-wrapper {
        margin-left: -15rem;
    }
}

</style>
