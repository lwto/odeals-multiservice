<template>
  <section class="login-form padding-top padding-bot">
    <div class="row row d-flex justify-content-center">
      <div class="col-lg-4 col-md-6 col-sm-11">
        <h3 class="text-center mb-4">Login To OdealsPro</h3>
        <form action="javascript:void(0)" class="row" method="post">
            <div class="form-group col-12">
                <label for="email" class="font-weight-bold">{{__('auth.email')}}</label>
                <input
                    type="text"
                    v-model="email"
                    name="email"
                    id="email"
                    class="form-control"
                    :placeholder="__('auth.email')"
                />
            </div>
            <div class="form-group col-12">
                <label for="password" class="font-weight-bold">{{__('auth.login_password')}}</label>
                 <i v-if="showpassword" class="fa fa-eye text-primary" @click="showlogpass"></i>
                 <i v-else class="fa fa-eye-slash text-primary" @click="showlogpass"></i>
                <input
                    type="password"
                    v-model="password"
                    name="password"
                    id="logpassword"
                    class="form-control"
                    :placeholder="__('auth.login_password')"
                />
                 
            </div>
            <div class="col-12 mb-2 text-center">
                <button
                    type="submit"
                    class="btn btn-primary btn-block"
                    @click="login"
                >
                    {{__('auth.login')}}
                </button>
            </div>
            <div class="col-12">
                <p class="line">or log in with</p>
            </div>
            <div class="col-12 mt-2 mb-2">
                <div class="row" style="row-gap:10px;">
                    <div class="col-sm-6">
                        <div class="btn-facebook d-flex">
                            <i class="fab fa-facebook"></i>
                            <p>Facebook</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="btn-google d-flex">
                            <i class="fab fa-google"></i>
                            <p>Google</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 text-center">
                <label
                    class="d-flex align-items-center justify-content-center flex-column"
                >{{__('auth.dont_have_account')}}
                    <router-link :to="{ name: 'register' }">
                      {{__('auth.signup')}}
                    </router-link>
                  </label
                >
            </div>
            <div class="col-12 text-center mt-2">
                <a @click="redirectToLogin" class="btn btn-primary btn-sm float-right">PROVIDER | ODEALS PRO LOGIN</a>
            </div>
        </form>
      </div>
  </div>
  </section>
</template>

<script>
import { displayError } from '../../messages';
import { mapGetters } from "vuex";
export default {
    name: "Login",
    data() {
        return {
            email: "",
            password: "",
            baseUrl: window.baseUrl,
            showpassword: true
        };
    },
    computed: {
        ...mapGetters(["userData"]),
    },
    methods: {
        async login() {
            this.$store
                .dispatch("login", {
                    email: this.email,
                    password: this.password,
                    loginfrom: 'vue-app'
                })
                .then((response) => {
                    // this.$router.push({ name: this.$route.name, query: { redirect: this.$route.path } });
                    // this.closeloginmodal();
                    this.$router.push({ name: "frontend-home" });
                })
                .catch((err) => {
                    if(err.response != undefined){
                        displayError(err.response.data.message)
                    }
                });
        },
        closeloginmodal() {
            this.$refs["loginmodal"].hide();
        },
        show() {
            this.$refs["loginmodal"].show();
        },
        redirectToLogin(){
            window.location.href = baseUrl + "/login";
        },
        showlogpass(){
            this.showpassword=!this.showpassword
            var elem= document.querySelector('#logpassword')
            const type = elem.getAttribute('type') === 'password' ? 'text' : 'password';
            elem.setAttribute('type', type);
        }
    },
};
</script>
<style scoped>
.form-group {
position: relative;
}

.form-group > i {
position: absolute;
right:2rem;
top:50px
}
.btn-facebook, .btn-google{
    width:100%;
    align-items:center;
    justify-content:center;
    padding:10px 10px;
    background:#f2f8f0;
    border-radius:4px;
    cursor:pointer;
}
.btn-facebook i, .btn-google i{
    font-size:20px;
    margin-right:4px;
}
.btn-facebook p, .btn-google p{
    margin-bottom:0;
    padding-bottom:0;
}
.btn-facebook i{
    color:#4285f6;
}
.btn-google i{
    color:#109848;;
}
.line {
    margin-top:15px;
    display:flex;
  }
  .line:before, .line:after {
    color:white;
    content:'';
    flex:1;
    border-bottom:groove 2px;
    margin: auto 0.25rem;
    box-shadow: 0 -2px ;
  }

</style>
