<template>
    <div>
        <b-modal id="my-modal3" ref="registermodal" title="Sign up with OdealsPro" @hidden="resetModal">
            <form
                action="javascript:void(0)"
                @submit="register"
                class=""
                method="post"
            >
            <!-- <div class="form-group col-12">
                <label for="username" class="font-weight-bold">{{__('auth.username')}}<span class="text-danger">*</span></label>
                <input
                    type="text"
                    name="username"
                    v-model="user.username"
                    id="username"
                    :placeholder="__('auth.username')"
                    class="form-control"
                />
                 <div v-if="submit && !$v.user.username.required"
                    class="invalid-feedback-data">{{__('auth.username')}} {{__('messages.is_required')}}
                </div>
            </div> -->
                <div class="form-group col-12">
                    <label for="email" class="font-weight-bold">{{__('auth.email')}}<span class="text-danger">*</span></label>
                    <input
                        type="email"
                        name="email"
                        v-model="user.email"
                        id="email"
                        :placeholder="__('auth.email')"
                        class="form-control"
                    />
                    <div v-if="submit && !$v.user.email.required"
                        class="invalid-feedback-data">{{__('auth.email')}} {{__('messages.is_required')}}
                    </div>
                </div>
                <div class="form-group col-12">
                    <label for="password" class="font-weight-bold">{{__('auth.login_password')}}<span class="text-danger">*</span></label>
                     <i v-if="showpassword" class="fa fa-eye text-primary" @click="showregpass"></i>
                     <i v-else class="fa fa-eye-slash text-primary" @click="showregpass"></i>
                    <input
                        type="password"
                        name="password"
                        v-model="user.password"
                        id="regpassword"
                        :placeholder="__('auth.login_password')"
                        class="form-control"
                    />
                    <div v-if="submit && !$v.user.password.required"
                        class="invalid-feedback-data">{{__('auth.login_password')}} {{__('messages.is_required')}}
                    </div>
                </div>
                <div class="form-check mb-2">
                    <input 
                        type="checkbox" 
                        class="form-check-input" 
                        id="terms" 
                        v-model="user.terms"
                    />
                    <label class="form-check-label" for="terms">I agree to ODealsPro's <router-link class="extra-page-content" :to="{ name: 'term-conditions' }"> terms & conditions </router-link> and <router-link class="extra-page-content" :to="{ name: 'privacy-policy' }"> privacy policy </router-link> </label>
                    <div v-if="submit && !$v.user.terms.required"
                        class="invalid-feedback-data">Agreement is {{__('messages.is_required')}}
                    </div>
                </div>
                <div class="col-12 mb-2 text-center">
                    <button
                        type="submit"
                        :disabled="processing"
                        class="btn btn-primary btn-block"
                    >
                        {{ processing ? "Please wait" : __('messages.register') }}
                    </button>
                </div>
                <div class="col-12">
                    <p class="line">or sign up with</p>
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
                        class="d-flex align-item-center flex-column justify-content-center"
                    >{{__('auth.already_have_account')}}
                        <div @click="closeregistermodal">
                            <a href="#">{{__('auth.sign_in')}}</a>
                        </div></label
                    >
                </div>
            </form>
        </b-modal>
        <login-component ref="openModal" />
    </div>
</template>

<script>
import { displayError } from '../../messages';
import {
  required
} from "vuelidate/lib/validators";
export default {
    name: "Register",
    validations: {
        user: {
            
            email: {
                required,
            },
            password: {
                required,
            },
        }
    },
    data() {
        return {
            user: {
                username: "",
                email: "",
                password: "",
                
            },
            processing: false,
            showpassword:true,
            submit:false
        };
    },
    methods: {
        async register() {
            this.submit = true
            this.$v.$touch();
            if (this.$v.$invalid) {
                return;
            }
            this.$store
                .dispatch("register", this.user)
                .then(() => {
                    this.closeregistermodal();
                    displayMessage(__('messages.save_form'))
                })
                .catch((err) => {
                    displayError(err.response.data.message)
                });
        },
        closeregistermodal() {
            this.$refs["registermodal"].hide();
               this.$refs.openModal.show();
        },
        resetModal() {
            // this.user.username= "";
            this.user.email= "";
            this.user.  password= "";

        },
         showregpass(){
            this.showpassword=!this.showpassword
            var elem= document.querySelector('#regpassword')
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
