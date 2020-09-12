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
                <h4 class="mb-3 mb-md-0" style="margin-top: 4%">İtiraz Listesi (Burada son 5 veri yer almaktadır.)</h4>

                <div class="col-12" style="margin-top: 7%">

                    <div class="card bg-dark">
                        <table class="table bordered table-dark">
                            <thead>
                            <th>Ders Adı</th>
                            <th>Sınav Tarihi</th>
                            <th>Açıklama</th>
                            <th>İşlem</th>
                            </thead>
                            <tbody>
                            <tr v-for="datas in data">
                                <td>{{datas.lesson_name}}</td>
                                <td>{{datas.lesson_date}}</td>
                                <td>{{datas.explanation}}</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" v-on:click="detailObject(datas.id)">Detay</button>
                                    <button type="button" class="btn btn-danger" v-on:click="deleteObject(datas.id)">Sil</button>

                                </td>
                            </tr>
                            </tbody>
                        </table>



                    </div>

                </div>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">İtiraz Detay</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="">Tarih</label>
                                <input type="text" placeholder="Tarih" v-model="lesson_date" class="form-control">
                            </div>

                            <div class="col-lg-6">
                                <label for="">Dersin Adı</label>
                                <input type="text" placeholder="Tarih" v-model="lesson_name" class="form-control">
                            </div>

                            <div class="col-lg-12">
                                <label for="">Açıklama</label>
                                <input type="text" placeholder="Tarih" v-model="explanation" class="form-control">
                            </div>
                        </div>

                        <input type="hidden" v-model="temporary_id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                        <button type="button" class="btn btn-primary" v-on:click="updateObjection" data-dismiss="modal">Güncelle</button>
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
    name: "Objection",
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
                this.id = response.data.id;
                this.authority = response.data.authority;

                // burada kullanıcı bilgilerini aldıktan sonra birde itirazları getirmek için axios kullanıcaz
                this.getObjection(response.data.id);

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
            id:"",
            authority:"",
            perPage: ['10', '25', '50'],
            data:[],
            lesson_name:"",
            lesson_date:"",
            explanation:"",
            temporary_id:"",

        }
    },
    methods:{
        getObjection:function (id){

            axios.get("/api/objection/list/"+id)
            .then(resp => {
                this.data = resp.data;
                Notiflix.Loading.Remove();
            })
            .catch(err => {
                Notiflix.Loading.Remove();
            });
        },

        // delete işlemi
        deleteObject:function (id){
            Notiflix.Loading.Hourglass();

            let form = new FormData();

            form.append("id",id);
            axios.post("/api/objection/delete",form)
            .then(response => {
                if (response.data == "ok"){
                    Notiflix.Loading.Remove();
// burada state i güncellemek için tekrar yükleme fonskiyonunu çağırdım
                    this.getObjection(this.id);
                    Notiflix.Notify.Success("Silme İşlemi Başarılı");

                }else{
                    Notiflix.Loading.Remove();

                    Notiflix.Notify.Failure("Bir hata meydana geldi");
                }

            })
            .catch(err => {
                Notiflix.Loading.Remove();

                Notiflix.Notify.Failure("Bir hata meydana geldi");
            })
        },

        // burada modala detay bilgisini bastırıcaz id den çekicez orayı
        detailObject:function (id){
            Notiflix.Loading.Hourglass();

            axios.get("/api/objection/detail/"+id)
                .then(resp => {
                    this.lesson_name = resp.data.lesson_name;
                    this.lesson_date = resp.data.lesson_date;
                    this.explanation = resp.data.explanation;
                    this.temporary_id = id;
                    Notiflix.Loading.Remove();
                })
                .catch(err => {
                    Notiflix.Loading.Remove();
                });
        },

        // update itiraz
        updateObjection:function (e){
            Notiflix.Loading.Hourglass();

            let form = new FormData();

           form.append("id",this.temporary_id);
           form.append("lesson_name",this.lesson_name);
           form.append("lesson_date",this.lesson_date);
           form.append("explanation",this.explanation);

           axios.post("/api/objection/update",form)
            .then(response => {
                if (response.data == "ok"){
                    Notiflix.Loading.Remove();
// burada state i güncellemek için tekrar yükleme fonskiyonunu çağırdım
                    this.getObjection(this.id);
                    Notiflix.Notify.Success("Güncelleme İşlemi Başarılı");

                }else{
                    Notiflix.Loading.Remove();

                    Notiflix.Notify.Failure("Bir hata meydana geldi");
                }
            })
            .catch(err => {
                Notiflix.Loading.Remove();

                Notiflix.Notify.Failure("Bir hata meydana geldi");
            })
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
