<template>

    <div class="d-flex" id="wrapper">

        <div v-if="authority == 1">
            <app-header></app-header>
        </div>
        <div v-else>
            <student-header></student-header>
        </div>

        <div id="page-content-wrapper">

            <div v-if="authority == 1">
                <top-bar></top-bar>
            </div>
            <div v-else>
                <student-top-bar></student-top-bar>
            </div>


            <div class="container-fluid">
                <h4 class="mb-3 mb-md-0" style="margin-top: 4%">Profil</h4>

                <div class="col-12" style="margin-top: 7%">

                    <div class="card bg-dark">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="">İsmi</label>
                                    <input type="text" v-model="username"  class="form-control bg-dark text-white">
                                </div>

                                <div class="col-lg-6">
                                    <label for="">Email</label>
                                    <input type="text" v-model="email" class="form-control bg-dark text-white">
                                </div>


                                <div class="col-12 mt-2">
                                    <p>Şifre Değiştirmek İstemiyorsanız Aşağıdaki Alanı Boş Bırakın.</p>
                                </div>
                                <div class="col-lg-6">
                                    <label for="">Şifre</label>
                                    <input type="password" v-model="password" class="form-control bg-dark text-white">
                                </div>
                                <div class="col-lg-6">
                                    <label for="">Şifre Tekrarı</label>
                                    <input type="password" v-model="rePass" class="form-control bg-dark text-white">
                                </div>
                            </div>
                            <button class="btn btn-danger mt-4" v-on:click="update" style="float: right;">Güncelle</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>



    </div>

</template>


<script>
$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});
</script>
<script>
import Notiflix from "notiflix";
import Header from "./inc/Header";
import TopBar from "./inc/TopBar";
import StudentHeader from "./inc/StudentHeader";
import StudentTopBar from "./inc/StudentTopBar";

export default {
    components: {
        "app-header":Header,
        'top-bar':TopBar,
        'student-header':StudentHeader,
        'student-top-bar':StudentTopBar
    },
    name: "Profile",
    mounted() {

        Notiflix.Loading.Hourglass();
        // user bilgilerini çektik
        axios.get("/api/user",{
            headers: {
                Authorization: 'Bearer' + localStorage.getItem('token')
            }
        })
            .then(response => {
                this.username = response.data.name;
                this.name = response.data.name;
                this.email = response.data.email;
                this.id = response.data.id;
                this.authority = response.data.authority;
                Notiflix.Loading.Remove();
            })
            .catch(err => {
                console.log(err);
            });
        // user api bitiş
    },
    data:function (){
        return {
            name:"",
            username:"",
            email:"",
            id:"",
            password:null,
            rePass:null,
            authority:"",
        }
    },
    methods:{
// logout metodu
        logout:function (e){
            // tokeni siliyoruz ve login sayfasına yönlendiriyoruz.
            localStorage.removeItem('token');
            this.$router.push({ name: 'home' })
        },
        update:function (e){

            Notiflix.Loading.Hourglass();
            // veriler boş mu kontrolü
            if (this.username == "" || this.email == ""){
                Notiflix.Loading.Remove();

                Notiflix.Notify.Failure("Lütfen formu boş bırakmadığınızdan emin olunuz");
            }
            else{
                // şifre boş ise null gönder değeri ve güncelleme
                if (this.password == null || this.password == ""){
                    // bilgilerin güncellendiği kısım
                    let form = new FormData();
                    form.append("name",this.username);
                    form.append("email",this.email);
                    form.append("password","null");
                    form.append("id",this.id);

                    axios.post("/api/update/profile",form)
                        .then(response => {
                            if (response.data == "ok"){
                                Notiflix.Loading.Remove();

                                Notiflix.Notify.Success("Güncelleme İşlemi Başarılı");
                            }
                        })
                        .catch(err =>  {
                            Notiflix.Loading.Remove();

                            Notiflix.Notify.Failure("Bir hata meydana geldi");
                            console.log(err)})


                }else{


                    // şifre boş değil ise uyuşuyor mu kontrol et
                    if(this.password == this.rePass){
                        // bilgilerin güncellendiği kısım
                        let form = new FormData();
                        form.append("name",this.username);
                        form.append("email",this.email);
                        form.append("password",this.password);
                        form.append("id",this.id);

                        axios.post("/api/update/profile",form)
                            .then(response => {
                                if (response.data == "ok"){
                                    Notiflix.Loading.Remove();

                                    Notiflix.Notify.Success("Güncelleme İşlemi Başarılı");
                                }
                            })
                            .catch(err =>  {
                                Notiflix.Loading.Remove();

                                Notiflix.Notify.Failure("Bir hata meydana geldi");
                                console.log(err)})
                    }else{
                        Notiflix.Loading.Remove();

                        Notiflix.Notify.Failure("Şifreler Uyuşmuyor");
                    }


                }



                }






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
