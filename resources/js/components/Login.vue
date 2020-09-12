<template>

    <div class="wrapper fadeInDown">
        <div id="formContent" style="margin-top: 15%">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first" style="padding: 10px">
 <h4>Hoşgeldiniz</h4>
             </div>
            {{count}}
            <!-- Login Form -->
            <form>
                <input  required type="text" id="login" class="fadeIn second" name="login" placeholder="Email">
                <input required type="text" id="password" class="fadeIn third" name="login" placeholder="Şifre">
                <button class="fadeIn fourth"  v-on:click="signIn">{{signInText}}</button>

            </form>

        </div>
    </div>
</template>

<script>
export default {
    name: "Login",
    data: function () {
        return {
            signInText: "Giriş Yap",
            disabled:false,
            username:"",
            password:""
        }
    },
    methods:{
        signIn:function (event){
            let form = new FormData();
            form.append("email","yigitsilto5@gmail.com");
            form.append("password","1231231");
           axios.post("/auth/login",form)
            .then()
            .catch(err => alert(err));
        }
    }
}
</script>

<style scoped>

</style>
