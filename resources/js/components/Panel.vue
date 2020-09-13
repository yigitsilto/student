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
                <h4 class="mb-3 mb-md-0" style="margin-top: 4%">Anasayfa</h4>

             <div v-if="authority == 1">
                 <div class="col-12" style="margin-top: 7%">
                     <div class="">
                         <div class="">

                             <div class="row">
                                 <div class="col-lg-4">
                                     <div class="card bg-dark">
                                         <div class="card-body">
                                             <div class="d-flex justify-content-between align-items-baseline">
                                                 <h6 class="card-title mb-0 text-white">Öğrencinizin Adı Soyadı</h6>
                                                 <div class="dropdown mb-2">


                                                 </div>
                                             </div>
                                             <div class="row">
                                                 <div class="col-12">
                                                     <p class="mb-2  text-white">{{student_name}}</p>
                                                     <div class="d-flex align-items-baseline">
                                                         <p class="text-success">

                                                         </p>
                                                     </div>
                                                 </div>

                                             </div>
                                         </div>
                                     </div>
                                 </div>

                                 <div class="col-lg-4">
                                     <div class="card bg-dark">
                                         <div class="card-body">
                                             <div class="d-flex justify-content-between align-items-baseline">
                                                 <h6 class="card-title mb-0 text-white">Öğrencinizin Emaili</h6>
                                                 <div class="dropdown mb-2">


                                                 </div>
                                             </div>
                                             <div class="row">
                                                 <div class="col-12 ">
                                                     <p class="mb-2  text-white">{{student_mail}}</p>
                                                     <div class="d-flex align-items-baseline">
                                                         <p class="text-success">

                                                         </p>
                                                     </div>
                                                 </div>

                                             </div>
                                         </div>
                                     </div>
                                 </div>

                                 <div class="col-lg-4">
                                     <div class="card bg-dark">
                                         <div class="card-body">
                                             <div class="d-flex justify-content-between align-items-baseline">
                                                 <h6 class="card-title mb-0 text-white">Öğrencinizin Kodu</h6>
                                                 <div class="dropdown mb-2">


                                                 </div>
                                             </div>
                                             <div class="row">
                                                 <div class="col-12">
                                                     <p class="mb-2  text-white">{{student_code}}</p>
                                                     <div class="d-flex align-items-baseline">
                                                         <p class="text-success">

                                                         </p>
                                                     </div>
                                                 </div>

                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>

                             <div class="row mt-4">
                                 <div class="col-lg-6">
                                     <div class="card bg-danger">
                                         <div class="card-body">
                                             <div class="d-flex justify-content-between align-items-baseline">
                                                 <h6 class="card-title mb-0 text-white">Profil</h6>
                                                 <div class="dropdown mb-2">


                                                 </div>
                                             </div>
                                             <div class="row">
                                                 <div class="col-12">
                                                     <a class="mb-2 btn  btn-dark btn-group-xs  text-white"  data-toggle="modal" data-target="#calendarModal" v-on:click="redirectProfile">Profile Git</a>
                                                     <div class="d-flex align-items-baseline">
                                                         <p class="text-success">

                                                         </p>
                                                     </div>
                                                 </div>

                                             </div>
                                         </div>
                                     </div>
                                 </div>

                                 <div class="col-lg-6">
                                     <div class="card bg-danger">
                                         <div class="card-body">
                                             <div class="d-flex justify-content-between align-items-baseline">
                                                 <h6 class="card-title mb-0 text-white">Sınav İtirazı</h6>
                                                 <div class="dropdown mb-2">


                                                 </div>
                                             </div>
                                             <div class="row">
                                                 <div class="col-12 ">
                                                     <a class="mb-2 btn  btn-dark btn-group-xs  text-white" data-toggle="modal" data-target="#objectionModal">İtiraz Et</a>
                                                     <a class="mb-2 btn  btn-dark btn-group-xs  text-white" data-toggle="modal" v-on:click="redirectObjectionList">İtiraz Listesi</a>
                                                     <div class="d-flex align-items-baseline">
                                                         <p class="text-success">

                                                         </p>
                                                     </div>
                                                 </div>

                                             </div>
                                         </div>
                                     </div>
                                 </div>


                             </div>

                             <br>
                             <div class="table-responsive">
                                 <table class="table table-bordered table-dark table-hover">
                                     <thead>
                                     <th>İsim</th>
                                     <th>Email</th>
                                     <th>Veli Adı</th>
                                     <th>Veli Mail</th>
                                     <th>İşlem</th>
                                     </thead>
                                     <tbody>
                                     <tr>
                                         <td>{{this.student_name}}</td>
                                         <td>{{ this.student_mail }}</td>
                                         <td>{{ this.name }}</td>
                                         <td>{{ this.email }}</td>
                                         <td><a href="" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModalCenter">Detay</a></td>
                                     </tr>
                                     </tbody>
                                 </table>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>

                <!-- else -->
                <div v-else>
                    <div class="col-12" style="margin-top: 7%">
                        <div class="">
                            <div class="">

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="card bg-dark">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between align-items-baseline">
                                                    <h6 class="card-title mb-0 text-white">Adınız Soyadınız</h6>
                                                    <div class="dropdown mb-2">


                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <p class="mb-2  text-white">{{name}}</p>
                                                        <div class="d-flex align-items-baseline">
                                                            <p class="text-success">

                                                            </p>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="card bg-dark">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between align-items-baseline">
                                                    <h6 class="card-title mb-0 text-white">Email</h6>
                                                    <div class="dropdown mb-2">


                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 ">
                                                        <p class="mb-2  text-white">{{email}}</p>
                                                        <div class="d-flex align-items-baseline">
                                                            <p class="text-success">

                                                            </p>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="card bg-dark">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between align-items-baseline">
                                                    <h6 class="card-title mb-0 text-white">Öğrenci Kodunuz</h6>
                                                    <div class="dropdown mb-2">


                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <p class="mb-2  text-white">{{code}}</p>
                                                        <div class="d-flex align-items-baseline">
                                                            <p class="text-success">

                                                            </p>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-lg-6">
                                        <div class="card bg-dark">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between align-items-baseline">
                                                    <h6 class="card-title mb-0 text-white">Sınıfınız</h6>
                                                    <div class="dropdown mb-2">


                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <p class="mb-2  text-white">{{class_name_student}}</p>
                                                        <div class="d-flex align-items-baseline">
                                                            <p class="text-success">

                                                            </p>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="card bg-dark">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between align-items-baseline">
                                                    <h6 class="card-title mb-0 text-white">Öğretmeniniz</h6>
                                                    <div class="dropdown mb-2">


                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 ">
                                                        <p class="mb-2  text-white">{{class_teacher_student}}</p>
                                                        <div class="d-flex align-items-baseline">
                                                            <p class="text-success">

                                                            </p>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                 </div>
        </div>

        <!-- objectionModal (itiraz modalıı) -->

        <div class="modal fade" id="objectionModal" tabindex="-1" role="dialog" aria-labelledby="objectionModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Sınav İtirazı</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-lg-6">
                                <label for="">Sınav Tarihi</label>
                                <input type="date"   v-model="lesson_date" class="form-control">
                            </div>

                            <div class="col-lg-6">
                                <label for="">Dersin Adı</label>
                                <input type="text"   v-model="lesson_name" class="form-control">
                            </div>
                            <div class="col-lg-12">
                                <label for="">İtiraz Gerekçesi</label>
                                <input type="text"   v-model="explanation" class="form-control">
                            </div>


                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"  data-dismiss="modal">Kapat</button>
                        <button type="button" class="btn btn-danger" v-on:click="objectionSave" data-dismiss="modal" >Kaydet</button>
                    </div>
                </div>
            </div>
        </div>






        <!-- Modal (detay modalı) direk verileri çektim çünkü tek bir öğrenci var o yüzden bir döngü ile bastırmadım -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Öğrenci Detayı</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="">İsim Soyisim</label>
                                <input type="text" readonly="true" v-model="student_name" class="form-control">
                            </div>

                            <div class="col-lg-6">
                                <label for="">Email</label>
                                <input type="text" readonly  v-model="student_mail" class="form-control">
                            </div>

                            <div class="col-lg-6">
                                <label for="">Öğretmeni</label>
                                <input type="text" readonly  v-model="class_teacher" class="form-control">
                            </div>

                            <div class="col-lg-6">
                                <label for="">Sınıf Adı</label>
                                <input type="text" readonly  v-model="class_name" class="form-control">
                            </div>


                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"  data-dismiss="modal">Kapat</button>
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
      'app-header':Header,
        'top-bar':TopBar,
        'student-header':StudentHeader,
        'student-top-bar':StudentTopBar,
    },
    name: "panel",
    mounted() {
        Notiflix.Loading.Hourglass();
        // kullanıcı bilgilerini alıp state e atadık
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
            this.code = response.data.student_code;
            this.class_name_student = response.data.class_name;
            this.class_teacher_student = response.data.class_teacher;
            this.user_id = response.data.id;

            // eğer bu kısım geldiyse bir istek daha atıp öğrenci bilgilerini çekiyoruz id = gelen datadaki user_id = id
            axios.get("/api/student/"+response.data.student_id)
                .then(resp => {
                    console.log(resp.data);
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
          user_id:"",
          student_id:"",
          class_name:"",
          class_teacher:"",
          authority:"",
          code:"",
          class_name_student:"",
          class_teacher_student:"",
          explanation:"",
          lesson_date:"",
          lesson_name:"",

      }
    },
    methods:{
// logout metodu
        logout:function (e){
           // tokeni siliyoruz ve login sayfasına yönlendiriyoruz.
            localStorage.removeItem('token');
            this.$router.push({ name: 'home' })
        },

        // sınav itirazı kaydı
        objectionSave:function (e){
            Notiflix.Loading.Hourglass();

            let form = new FormData();

            form.append("lesson_date",this.lesson_date);
            form.append("lesson_name",this.lesson_name);
            form.append("explanation",this.explanation);
            form.append("user_id",this.user_id);

            if (this.lesson_date == "" || this.lesson_name == "" || this.explanation == ""){
                Notiflix.Loading.Remove();
                Notiflix.Report.Failure('Uyarı','Lütfen bilgileri boş bırakmayınız.','Kapat');

            }else{

                axios.post("/api/objection/create",form)
                    .then(resp => {
                        Notiflix.Loading.Remove();
                       if (resp.data == "ok"){
                           this.explanation = "";
                               this.lesson_date = "";
                               this.lesson_name = "";
                           Notiflix.Notify.Success('İtirazınız alınmıştır.En kısa sürede geri dönülecektir.');

                       }else{
                           Notiflix.Loading.Remove();
                           Notiflix.Notify.Failure('Bir hata meydana geldi');
                       }
                    })
                    .catch(err => {
                        Notiflix.Loading.Remove();
                        Notiflix.Notify.Failure('Bir hata meydana geldi');

                    });
            }

        },
        redirectObjectionList:function (e){
            localStorage.removeItem('page');
            localStorage.setItem('page', 'objection');
            this.$router.push({ name: 'objection' })
        },
        redirectProfile:function (){
            localStorage.removeItem('page');
            localStorage.setItem('page', 'profile');
            this.$router.push({ name: 'profile' })

        }

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
