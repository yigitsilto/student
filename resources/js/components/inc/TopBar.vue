<template>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark border-bottom">
        <img height="50" src="/logo.png" alt="">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item active ">
                    <a class="nav-link text-white" href="#" v-on:click="redirectHome">Anasayfa <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#" v-on:click="redirectStudent">Öğrenci Bilgisi</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white"  href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Profil
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-black" href="#" v-on:click="redirectProfile">Profil</a>
                        <a class="dropdown-item text-black" href="#" v-on:click="logout">Çıkış Yap</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
</template>

<script>
export default {
    name: "TopBar",
    methods:{
        // öğrenci bilgisine yönlendirir
        redirectStudent:function (e){
            this.$router.push({ name: 'student' })

        },
        // profil sayfasına yönlendirir
        redirectProfile:function (e){
            this.$router.push({ name: 'profile' })

        },
        // anasayfa bilgisine yönlendirir
        redirectHome:function (e){
            this.$router.push({ name: 'panel' })

        },
    }
}
</script>

<style scoped>

</style>
