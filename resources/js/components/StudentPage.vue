<template>

    <div class="d-flex" id="wrapper">

        <div v-if="authority == 1">
            <app-header></app-header>
        </div>
        <div v-else>
            <student-header></student-header>
        </div>


        <!-- Page Content -->
        <div id="page-content-wrapper">

            <div v-if="authority == 1">
                <top-bar></top-bar>
            </div>
            <div v-else>
                <student-top-bar></student-top-bar>
            </div>


            <div class="container-fluid">
                <h4 class="mb-3 mb-md-0" style="margin-top: 4%">Öğrenci Sayfası</h4>

                <div class="col-12" style="margin-top: 7%">

                    <div class="card bg-dark">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="">Öğrenci İsmi</label>
                                    <input type="text" v-model="student_name"  class="form-control bg-dark text-white">
                                </div>

                                <div class="col-lg-6">
                                    <label for="">Öğrenci Maili</label>
                                    <input type="text" v-model="student_mail" class="form-control bg-dark text-white">
                                </div>

                                <div class="col-lg-6">
                                    <label for="">Sınıf Öğretmeni</label>
                                    <input type="text" v-model="class_teacher" class="form-control bg-dark text-white">
                                </div>

                                <div class="col-lg-6">
                                    <label for="">Sınıfı</label>
                                    <input type="text" v-model="class_name" class="form-control bg-dark text-white">
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
    components:{
      "app-header":Header,
        'top-bar':TopBar,
        'student-header':StudentHeader,
        'student-top-bar':StudentTopBar
    },
    name: "StudentPage",
    mounted() {

        Notiflix.Loading.Hourglass();

        axios.get("/api/user",{
            headers: {
                Authorization: 'Bearer' + localStorage.getItem('token')
            }
        })
            .then(response => {
                this.name = response.data.name;
                this.email = response.data.email;
                this.id = response.data.student_id;
                this.authority = response.data.authority;

                // eğer bu kısım geldiyse bir istek daha atıp öğrenci bilgilerini çekiyoruz id = gelen datadaki user_id = id
                axios.get("/api/student/"+response.data.student_id)
                    .then(resp => {
                        console.log(resp.data.name);
                        this.student_code = resp.data.student_code;
                        this.student_name = resp.data.name;
                        this.student_mail = resp.data.email;
                        this.student_id = resp.data.id;
                        this.class_name = resp.data.class_name;
                        this.class_teacher = resp.data.class_teacher;
                        Notiflix.Loading.Remove();

                    })
                    .catch(err => {
                        console.log(err);
                    })
                // api/student bitiş

            })

            .catch(err => {
                console.log(err);
            });
        // user api bitiş
    },
    data:function (){
        return {
            name:"",
            email:"",
            profile:"",
            student_name:"",
            student_mail:"",
            student_code:"",
            id:"",
            student_id:"",
            class_name:"",
            class_teacher:"",
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
        update:function (){
            Notiflix.Loading.Hourglass();
            // veriler boş mu kontrolü
            if (this.student_name == "" || this.student_mail == "", this.class_name == "" || this.class_teacher == ""){
                Notiflix.Loading.Remove();

                Notiflix.Notify.Failure("Lütfen formu boş bırakmadığınızdan emin olunuz");
            }else{
                // bilgilerin güncellendiği kısım
                let form = new FormData();
                form.append("name",this.student_name);
                form.append("email",this.student_mail);
                form.append("class_teacher",this.class_teacher);
                form.append("class_name",this.class_name);
                form.append("id",this.student_id);

                axios.post("/api/update/student",form)
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
