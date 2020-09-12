<template>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h4>Yapılacak İşler</h4>
                <div class="card">
                    <div class="card-header">

                        <router-link :to="{ name: 'home' }" class="btn btn-sm btn-dark">Yapılacak İşler</router-link>

                        <router-link :to="{ name: 'done' }" class="btn btn-sm btn-outline-dark">Tamamlanmış İşler</router-link>

                        <button type="button" style="float: right;" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                            İş Ekle
                        </button>

                    </div>


                    <div class="card-body" >

                        <router-view></router-view>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Yeni İş Ekle</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="">Başlangıç Tarihi</label>
                                <input type="date" class="form-control" placeholder="Başlangıç Tarihi">
                            </div>
                            <div class="col-lg-6">
                                <label for="">Bitiş Tarihi</label>
                                <input type="date" class="form-control" placeholder="Başlangıç Tarihi">
                            </div>

                            <div class="col-lg-12">
                                <label for="">Başlık</label>
                                <input type="text" class="form-control" placeholder="Başlık">
                            </div>

                            <div class="col-lg-12">
                                <label for="">Açıklama</label>
                                <input type="text" class="form-control" placeholder="Açıklama">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Vazgeç</button>
                        <button type="button" class="btn btn-primary">İş Ekle</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
