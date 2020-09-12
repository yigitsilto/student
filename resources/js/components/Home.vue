<template>
    <div class="site-wrap">

        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>


        <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

            <div class="container-fluid">
                <div class="d-flex align-items-center">
                    <div class="site-logo mr-auto w-25"><a href="index.html">Veli Bilgilendirme Sistemi</a></div>



                    <div class="ml-auto w-25">
                        <nav class="site-navigation position-relative text-right" role="navigation">
                            <ul class="site-menu main-menu site-menu-dark js-clone-nav mr-auto d-none d-lg-block m-0 p-0">
                                <li class="cta"><a href="#contact-section" class="nav-link" data-toggle="modal" data-target="#exampleModalCenter"><span>Kayıt Ol</span></a></li>
                            </ul>
                        </nav>
                        <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a>
                    </div>
                </div>
            </div>

        </header>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">

                    <div class="container">
                       <div class="row">
                           <div class="col-4" style="width: 100%;
    min-height: 300px;
    background-color: #343899;
    background-image: url('/resim.png');
    background-repeat: no-repeat;
background-size: 179px 125px;
    background-position: center;">

                           </div>
                           <div class="col-8" style="padding: 20px;">
                               <div class="row">
                                   <div class="col-lg-12">
                                       <label for="">İsminiz</label>
                                       <input type="text" placeholder="İsminiz"  v-model="Rusername" class="form-control">
                                   </div>
                                   <div class="col-lg-12">
                                       <label for="">Email</label>
                                       <input type="text" placeholder="Email" v-model="Remail"  class="form-control">
                                   </div>
                                   <div class="col-lg-12 ">
                                       <label for="">Öğrenci Kodu</label>
                                       <input type="text" placeholder="Öğrenci Kodu" v-model="Rstudent_code"  class="form-control">
                                   </div>
                               </div>
                               <div class="row ">
                                   <div class="col-lg-12 ">
                                       <label for="">Şifre</label>
                                       <input type="password" placeholder="Şifreniz" autocomplete="false" v-model="Rpassword"  class="form-control">
                                   </div>
                                   <div class="col-lg-12">
                                       <label for="">Şifre Tekrarı</label>
                                       <input type="password" placeholder="Şifre Tekrarı" v-model="Rrepassword"  class="form-control">
                                   </div>
                                   <div class="col-lg-12 mt-2">
                                       <button type="button" class="btn btn-block btn-primary" v-on:click="registerEvent">Kayıt Ol</button>

                                   </div>
                               </div>
                           </div>
                       </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="intro-section" id="home-section">

            <div class="slide-1" style="background: url(https://www.groovypost.com/wp-content/uploads/2017/12/typing_laptop_display_email_Featured.jpg);background-position: 50% -25px; background-size: cover; background-repeat: no-repeat" data-stellar-background-ratio="0.5">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="row align-items-center">
                                <div class="col-lg-6 mb-4">
                                    <h1  data-aos="fade-up" data-aos-delay="100">Veli Bilgilendirme Sistemi</h1>
                                    <p class="mb-4"  data-aos="fade-up" data-aos-delay="200">Öğrenci velisi bilgilendirme sistemi</p>

                                </div>

                                <div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="500">

                                    <form action="" method="post" class="form-box">
                                        <p v-if="wrong" class="alert alert-danger" style="color: black">Kullanıcı Adı Veya Şifre Hatalı</p>
                                        <p v-if="empty" class="alert alert-danger" style="color: black">Lütfen boşlukları doldurduğunuza emin olun.</p>

                                        <h3 class="h4 text-black mb-4">Giriş Yap</h3>
                                        <div class="form-group">
                                            <input type="text"  v-model="email"  class="form-control" placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" v-model="password" class="form-control" placeholder="Şifre">
                                        </div>

                                        <div class="form-group">
                                            <button class="btn btn-primary btn-pill" type="button" v-on:click="loginEvent">Giriş Yap</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</template>
<script src="/notiflix/dist/notiflix-aio-2.4.0.min.js"></script>

<script>
import Notiflix from "notiflix";

export default {

    mounted() {

    },
    data: function () {
        return {
            email: "",
            password:"",
            wrong:false,
            empty:false,
            Rusername:"",
            Remail:"",
            Rstudent_code:"",
            Rpassword:"",
            Rrepassword:"",
            reg: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,24}))$/

        }
    },
    methods:{

        isEmailValid: function(mail) {
            if (this.reg.test(mail)){
                return true;
            }else{
                return false;
            }
        },
        // kullanıcı giriş kontrolü
        loginEvent:function (event){

            Notiflix.Loading.Hourglass();
// eğer email veya şfire boş ise hata bastır
            if (this.email == "" || this.email == null || this.password == null || this.password == ""){
                this.empty = true;
                this.wrong = false;
                Notiflix.Loading.Remove();
            }else{

                if (this.isEmailValid(this.email)){
                    // api login
                    axios.post('/api/auth/login', {
                        email: this.email,
                        password: this.password
                    }).then(response => {
                        Notiflix.Loading.Remove();
                        localStorage.setItem('token', response.data.access_token)
                        // alert(response.data.access_token);
                        this.$router.push({ name: 'panel' })
                    }).catch(error => {
                        this.wrong = true;
                        this.empty = false;
                        Notiflix.Loading.Remove();
                        console.log(error.response)
                    });
                }else{
                    Notiflix.Loading.Remove();
                    Notiflix.Report.Failure('Uyarı','Email Adresi Geçersiz.','Kapat');

                }



            }
        },


        // kayıt ol butonu işlemleri
        registerEvent:function (e){
            Notiflix.Loading.Hourglass();

            if (this.Remail == "" || this.Rpassword == "" || this.Rstudent_code == "" || this.Rusername == "" || this.Rrepassword == "" ){
                Notiflix.Loading.Remove();
                Notiflix.Report.Failure('Uyarı','Lütfen boşlukları doldurduğunuza emin olun.','Kapat');

            }else if(this.Rpassword != this.Rrepassword){
                Notiflix.Loading.Remove();
                Notiflix.Report.Failure('Uyarı','Şifreler Uyuşmuyor.','Kapat');
            }else{


                // email validation kontrolü
                if (this.isEmailValid(this.Remail)){
                    // forma bilgileri atadık
                    let form = new FormData();
                    form.append("name",this.Rusername);
                    form.append("email",this.Remail);
                    form.append("student_code",this.Rstudent_code);
                    form.append("password",this.Rpassword);
                    //bilgileri post et
                    axios.post("/api/auth/register",form)
                        .then(response => {
                            Notiflix.Loading.Remove();
                            if (response.data == "fail_code"){
                                Notiflix.Report.Failure('Uyarı','Öğrenci kodunuz yanlış.','Kapat');
                            }else{
                                localStorage.setItem('token', response.data.access_token)
                                this.$router.push({ name: 'panel' })
                            }
                        })
                        .catch(err =>   {
                            Notiflix.Loading.Remove();
                            console.log(err.message);
                        });
                }else{

                    Notiflix.Loading.Remove();
                    Notiflix.Report.Failure('Uyarı','Email Adresi Geçersiz.','Kapat');


                }




            }

        },
        // register bitiş







    }
}
</script>
