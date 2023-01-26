<template>
    <div>
        <breadcrumb :sectionName="this.$route.meta.label" :homeName="this.$route.meta.homeName" />
        <section class="container about-us mar-top mar-bot">
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-info">
                        <h3 class="mb-5">{{__('messages.contact_us_page')}}</h3>
                        <!-- <div v-if="generalsetting.helpline_number" class="icon-box-wrapper">
                            <div class="icon-box">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g id="Iconly/Light/Calling">
                                    <g id="Calling">
                                    <path id="Stroke 1" d="M14.3525 2.5C18.0535 2.911 20.9775 5.831 21.3925 9.532" stroke="#109848" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path id="Stroke 3" d="M14.3525 6.04297C16.1235 6.38697 17.5075 7.77197 17.8525 9.54297" stroke="#109848" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path id="Stroke 5" fill-rule="evenodd" clip-rule="evenodd" d="M11.0315 12.4724C15.0205 16.4604 15.9254 11.8467 18.4652 14.3848C20.9138 16.8328 22.3222 17.3232 19.2188 20.4247C18.8302 20.737 16.3613 24.4943 7.68446 15.8197C-0.993405 7.144 2.76157 4.67244 3.07394 4.28395C6.18376 1.17385 6.66682 2.58938 9.11539 5.03733C11.6541 7.5765 7.04253 8.48441 11.0315 12.4724Z" stroke="#109848" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                    </g>
                                </svg>
                            </div>
                            <div class="icon-content">
                                <p class="mb-0">{{__('messages.helpline_number')}}</p>
                                <h6 class="mb-0">{{generalsetting.helpline_number}}</h6>                       
                            </div>
                        </div> -->
                        <div class="icon-box-wrapper">
                            <div class="icon-box">
                                <svg fill="#109848" width="40px" height="40x" viewBox="-5.5 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.52 23.44c-1 0-2-0.6-2.88-1.68-0.040 0-0.040 0-0.080 0-4.16 0-7.56-3.4-7.56-7.56s3.4-7.56 7.56-7.56 7.56 3.4 7.56 7.56c0 2.040-0.8 3.96-2.24 5.36 0.16 1.24-0.040 2.32-0.6 3.040-0.44 0.52-1.080 0.84-1.76 0.84v0zM14.080 20.040c0.28 0 0.52 0.12 0.68 0.36 0.72 1 1.36 1.36 1.76 1.36 0.2 0 0.32-0.080 0.44-0.2 0.32-0.4 0.4-1.2 0.2-2.080-0.080-0.32 0.040-0.64 0.28-0.84 1.28-1.12 2-2.72 2-4.4 0-3.24-2.64-5.88-5.88-5.88s-5.88 2.64-5.88 5.88 2.64 5.88 5.88 5.88c0.12 0 0.28 0 0.4 0 0.040-0.080 0.12-0.080 0.12-0.080zM3.84 25.36c-0.2 0-0.44-0.040-0.6-0.12-0.96-0.32-1.72-1.48-1.48-3.36-1.12-1.12-1.76-2.68-1.76-4.28 0-2.56 1.52-4.8 3.88-5.72 0.44-0.16 0.92 0.040 1.080 0.48s-0.040 0.92-0.48 1.080c-1.68 0.68-2.8 2.32-2.8 4.16 0 1.28 0.56 2.52 1.52 3.36 0.040 0.040 0.080 0.080 0.12 0.12 0.16 0.2 0.24 0.44 0.16 0.72-0.24 1.24 0.12 1.8 0.32 1.88 0.24 0.080 0.76-0.24 1.2-1.16 0.16-0.32 0.48-0.48 0.8-0.48 0.84 0.040 1.72-0.12 2.48-0.56 0.4-0.24 0.92-0.080 1.16 0.32s0.080 0.92-0.32 1.16c-0.88 0.48-1.88 0.76-2.88 0.76-0.76 1.2-1.68 1.64-2.4 1.64z"></path>
                                </svg>
                            </div>
                            <div class="icon-content">
                                <p class="mb-0">Line ID</p>
                                <h6 class="mb-0">odeals.th</h6>                       
                            </div>
                        </div>
                        <div class="icon-box-wrapper">
                            <div class="icon-box">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g id="Iconly/Light/Message">
                                <g id="Message">
                                <path id="Stroke 1" d="M17.9024 8.85107L13.4591 12.4641C12.6196 13.1301 11.4384 13.1301 10.5989 12.4641L6.11816 8.85107" stroke="#109848" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path id="Stroke 3" fill-rule="evenodd" clip-rule="evenodd" d="M16.9089 21C19.9502 21.0084 22 18.5095 22 15.4384V8.57001C22 5.49883 19.9502 3 16.9089 3H7.09114C4.04979 3 2 5.49883 2 8.57001V15.4384C2 18.5095 4.04979 21.0084 7.09114 21H16.9089Z" stroke="#109848" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </g>
                                </g>
                                </svg>
                            </div>
                            <div class="icon-content">
                                <p class="mb-0">Support Email</p>
                                <h6 class="mb-0"><a class="mailto" href="mailto:support@odealpro.com">support@odealspro.com</a></h6>                       
                            </div>
                        </div>
                        <div class="separator">               
                        </div>
                        <div class="social-box">
                            <p>{{__('messages.we_are_available')}} :</p>
                            <ul class="list-unstyled social_icon d-flex mb-0">
                                <li v-if="generalsetting.facebook_url">
                                    <a :href="generalsetting.facebook_url" class="fb-footer">
                                    <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li v-if="generalsetting.twitter_url">
                                    <a :href="generalsetting.twitter_url" class="twitter-footer">
                                    <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                                <li v-if="generalsetting.linkedin_url">
                                    <a :href="generalsetting.linkedin_url" class="link-footer">
                                    <i class="fab fa-linkedin-in"></i>
                                    </a>
                                </li>
                                <li v-if="generalsetting.instagram_url">
                                    <a :href="generalsetting.instagram_url" class="insta-footer" target="_blank">
                                    <i class="fab fa-instagram"></i>
                                    </a >
                                </li>
                                <li v-if="generalsetting.youtube_url">
                                    <a :href="generalsetting.youtube_url" class="youtube-footer" target="_blank">
                                    <i class="fab fa-youtube"></i>
                                    </a >
                                </li>
                                <li>
                                    <a href="https://www.facebook.com/profile.php?id=100089713154026" class="fb-footer">
                                    <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://line.me/en/" class="line-footer" target="_blank">
                                    <i class="fab fa-line"></i>
                                    </a >
                                </li>
                            </ul>
                        </div>
                    </div>            
                </div>
                <div class="col-lg-6 mt-lg-0 mt-5" >
                    <div class="contact-form">
                            <div class="row row-cols-md-2  row-cols-1">
                                <div class="col form-group">
                                    <input type="text" class="form-control" id="exampleFormControlInput1" v-model="contact.first_name" :placeholder="__('auth.first_name')">
                                    <div v-if="submit && !$v.contact.first_name.required"
                                        class="invalid-feedback-data">{{__('auth.first_name')}} {{__('messages.is_required')}}
                                    </div>
                                </div>
                                <div class="col form-group">
                                    <input type="text" class="form-control" id="exampleFormControlInput2" v-model="contact.last_name"  :placeholder="__('auth.last_name')">
                                    <div v-if="submit && !$v.contact.last_name.required"
                                        class="invalid-feedback-data">{{__('auth.last_name')}} {{__('messages.is_required')}}
                                    </div>
                                </div>
                            </div>

                            <div class="row row-cols-md-2 row-cols-1">
                                <div class="col form-group">
                                    <input type="text" class="form-control" id="exampleFormControlInput3"  v-model="contact.phone_no" :placeholder="__('messages.contact_number')">
                                </div>
                                <div class="col form-group">
                                    <input type="text" class="form-control" id="exampleFormControlInput4"  v-model="contact.email" :placeholder="__('auth.email')">
                                    <div v-if="submit && !$v.contact.email.required"
                                        class="invalid-feedback-data">{{__('auth.email')}} {{__('messages.is_required')}}
                                    </div>
                                </div>
                            </div>
                            <div class="row row-cols-1">
                                <div class="col form-group">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="8"  v-model="contact.user_message" :placeholder="__('messages.message')"></textarea>
                                    <div v-if="submit && !$v.contact.user_message.required"
                                        class="invalid-feedback-data">{{__('messages.message')}} {{__('messages.is_required')}}
                                    </div>
                                </div>    
                            </div> 
                            <button type="submit" class="btn odeals-btn pay" @click="contactUs">{{__('messages.send')}}</button>
                    </div>                
                </div>
            </div>
        </section>
        <!-- <section class="map-box mar-top">
             <iframe width="100%" height="450" frameborder="0" style="border:0" :src="'https://www.google.com/maps/embed/v1/place?q=40.7127837,-74.0059413&amp;key=' +googleMapKey"></iframe>
        </section> -->
    </div>
</template>
<style lang="scss">
a{
    color:#109848;
}
a:hover{
    color:#109848;
}
.line-footer i{
    font-size:2.5rem;
    color:#109848;
}
.odeals-btn{
    color:#fff;
    background-color: #109848;
}
.contact-info .icon-box-wrapper:hover .icon-box {
    background:#109848;
}
.contact-info .icon-box-wrapper .icon-box{
    background:#F2F8F0;
}

</style>
<script>
import { mapGetters } from "vuex";
import {post} from '../../request'
import { displayMessage,displayError } from "../../messages";
import {
  required
} from "vuelidate/lib/validators";
export default {
    name:'ContactUs',
     validations: {
        contact: {
            first_name: {
                required,
            },
            last_name: {
                required,
            },
            email: {
                required,
            },
            user_message: {
                required,
            },
        }
    },
    data() {
        return {
            contact:{},
            submit:false
        }
    },
    mounted(){
      this.contact = this.defaultContactRequest()
      console.log(this.googleMapKey);
    },
    computed: {
        ...mapGetters(['generalsetting','googleMapKey']),
    },
    methods:{
        defaultContactRequest: function () {
            return {
                id: "",
                first_name: "",
                last_name: "",
                phone_no: "",
                email: "",
                user_message: "",
                subject: "Contact",
            };
        },
        contactUs(){
            this.submit = true
            this.$v.$touch();
            if (this.$v.$invalid) {
                return;
            }
            post("contact-us", this.contact).then((response) => {
                if(response.status == 200){
                    displayMessage(response.data.message);
                    this.contact.first_name = '';
                    this.contact.last_name = '';
                    this.contact.phone_no = '';
                    this.contact.email = '';
                    this.contact.user_message = '';
                }
            });

        }
    }
}
</script>