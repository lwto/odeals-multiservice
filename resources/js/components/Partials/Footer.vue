<template>
<footer class="footer">
    <div class="footer-upper pt-3">
      <div class="container custom_container">
        <div class="footer-extra-content">
          <div class="row" style="row-gap:20px;">
            <!-- <div class="col-md-6 col-lg-2 col-xl-2 mb-4">
                <router-link :to="{ name: 'frontend-home' }"  ><img :src="generalsetting.site_logo ? generalsetting.site_logo : baseUrl +'/images/logo.svg'"  class="img-fluid logo" alt="logo"></router-link>
            </div> -->
            <div class="col-md-6 col-lg-3 col-xl-3 mb-4">
              <h5 class="product-services">About ODeals Company</h5>
              <div class="extra-content">
               <router-link class="extra-page-content" :to="{ name: 'about-us' }"> <label><i class="fas fa-angle-right"></i></label> <span> About us </span> </router-link>
               <router-link class="extra-page-content" :to="{ name: 'why-list' }"> <label><i class="fas fa-angle-right"></i></label> <span>Why list your service with us?</span> </router-link>
               <router-link class="extra-page-content" :to="{ name: 'post-service' }"> <label><i class="fas fa-angle-right"></i></label> <span>Post free service</span> </router-link>
               <!-- <router-link class="extra-page-content" :to="{ name: 'refund-cancellation-policy' }"> <label><i class="fas fa-angle-right"></i></label> <span> {{__('messages.cancellation_&_refund_policy')}} </span> </router-link> -->
                <!-- <router-link :to="{ name: 'contact-us' }" class="extra-page-content"> <label><i class="fas fa-angle-right"></i></label> <span> {{__('messages.contact_us')}} </span> </router-link> -->
                <!-- <router-link class="extra-page-content" :to="{ name: 'help-support' }"> <label><i class="fas fa-angle-right"></i></label> <span> {{__('messages.help_support')}} </span> </router-link> -->
              </div>
            </div>
            <div class="col-md-6 col-lg-3 col-xl-3 mb-4">
              <h5 class="product-services">Important Links</h5>
              <div class="extra-content">
                <router-link class="extra-page-content" :to="{ name: 'faq' }"> <label><i class="fas fa-angle-right"></i></label> <span>FAQs</span> </router-link>
                <router-link class="extra-page-content" :to="{ name: 'refund-cancellation-policy' }"> <label><i class="fas fa-angle-right"></i></label> <span>Cancellation & Refund Policy</span> </router-link>
                <router-link class="extra-page-content" :to="{ name: 'term-conditions' }"> <label><i class="fas fa-angle-right"></i></label> <span> {{__('messages.terms_condition')}} </span> </router-link>
                <router-link class="extra-page-content" :to="{ name: 'privacy-policy' }"> <label><i class="fas fa-angle-right"></i></label> <span> {{__('messages.privacy_policy')}} </span> </router-link>
              </div>
            </div>
            <div class="col-md-6 col-lg-3 col-xl-3 mb-4">
              <h5 class="product-services">Customer Care</h5>
              <div class="extra-content">
               <a href="mailto:support@odealspro.com" class="extra-page-content"><label><i class="fas fa-envelope"></i></label> <span>support@odealspro.com</span> </a> 
               <a class="extra-page-content"><label><i class="fas fa-phone-alt"></i></label> <span>Line ID: odeals.th</span> </a> 
               <div class="d-flex align-items-center mt-3 apps">
                <a class="social"><i class="fab fa-line" style="font-size:1.75rem; margin-right:15px;"></i></a>
                <a class="social"><i class="fab fa-facebook" style="font-size:1.75rem"></i></a>
              </div>
              </div>
            </div>
            <!-- <div class="col-md-6 col-lg-3 col-xl-3 mb-4">
              <h5 class="text-white product-services">Connect with us</h5>
              <div class="extra-content">
                <div class="d-flex align-items-center mb-3">
                  <a class="text-white"><i class="fab fa-line" style="font-size:1.75rem; margin-right:15px;"></i></a>
                  <a class="text-white"><i class="fab fa-facebook" style="font-size:1.75rem"></i></a>
                </div>
                <h6 class="text-white">ODeals on Your Mobile</h6>
                <div class="d-flex flex-column mt-4">
                  <a  :href="appsetting.play_store_url" target="_blank"><img :src="baseUrl + '/images/frontend/gpay-white.png'"></a>
                  <a  :href="appsetting.app_store_url" target="_blank"><img class="mt-3" :src="baseUrl + '/images/frontend/apple-white.png'"></a>
                </div>
              </div>
            </div> -->
            <!-- <div class="col-md-6 col-lg-3 col-xl-4 mb-md-0 mb-2">
              <h5 class="text-white product-services">{{__('messages.handyman_services')}}</h5>
              <div class="row">
               <div class="col-lg-6" v-for="(column,i) in columns" :key="i">
                  <div class="extra-content pb-3">
                    <a v-for="(item,index) in column"  :key="index" class="extra-page-content" href="#">
                      <span><router-link :to="{name: 'service-detail',params: { service_id: item.id }}" v-bind:style="{ 'color': '#6c757d' }">{{item.name}}</router-link></span>
                    </a>
                  </div>
              </div>
              </div>
            </div>  -->
            <div class="col-md-6 col-lg-3 col-xl-3 mb-4">
              <div class="card download-card">
                <div class="card-body">
                  <!-- <h6 class="text-white mb-3">{{__('messages.download_aplication_from')}}</h6> -->
                  <span class="download-text">Let's enjoy ODeals various services and get latest offer and deals by 
                    downloading application
                  </span>
                  <div class="d-flex align-items-center mt-4 gap-2">
                    <a  :href="appsetting.play_store_url" target="_blank"><img :src="baseUrl + '/images/frontend/gpay-white.png'"></a>
                    <a  :href="appsetting.app_store_url" target="_blank"><img :src="baseUrl + '/images/frontend/apple-white.png'"></a>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
        <!-- <div class="row">
          <div class="col-lg-12">
            <div class="footer-information">
              <div class="footer-social">
                <p class="text-white">{{__('messages.we_are_available')}}</p>
                <div class="d-flex">
                  <ul class="list-unstyled social_icon d-flex justify-content-end mb-0">
                    <li v-if="generalsetting.facebook_url">
                      <a :href="generalsetting.facebook_url" class="fb-footer" target="_blank">
                        <i class="fab fa-facebook-f"></i>
                      </a>
                    </li>
                    <li v-if="generalsetting.twitter_url">
                      <a :href="generalsetting.twitter_url" class="twitter-footer" target="_blank" >
                        <i class="fab fa-twitter"></i>
                      </a >
                    </li>
                    <li v-if="generalsetting.linkedin_url">
                      <a :href="generalsetting.linkedin_url" class="link-footer" target="_blank">
                        <i class="fab fa-linkedin-in"></i>
                      </a >
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
                  </ul>
                </div>
              </div>
              <div class="footer-details">
                <div v-if="generalsetting.inquriy_email" class="footer-sub-line d-flex flex-column">
                  <span class="text-white">{{__('messages.inquriy_email')}}</span>
                  <span><a class="mailtofooter" v-bind:href="'mailto:'+generalsetting.inquriy_email">{{generalsetting.inquriy_email}}</a></span>
                </div>
                <hr class="hr-vertial">
                <div v-if="generalsetting.helpline_number" class="footer-sub-line d-flex flex-column">
                  <span class="text-white">{{__('messages.helpline_number')}}</span>
                  <span>{{generalsetting.helpline_number}}</span>
                </div>
              </div>
            </div>
          </div>
        </div> -->
      </div>
      <!-- <cookie-law theme="dark-lime"></cookie-law> -->
    </div>
    <div class="footer-bot">
      <div class="container">
          <p style="text-align:justify;" class="pb-2 pt-4">
            <small>ODeals help to find local service providers like cleaners, part time maids, electricians, air conditioning experts, plumbers and other home pro SPA. 
                We are here to help you to search and book best spa in Pattaya, the most popular massage in Pattaya, cheap and clean nail salons in Pattaya, top quality
                 hair salons in Pattaya, safe and quality eyelash extension, eyebrow tattoos in Pattaya, or the most reputable hair removal or waxing shops in Pattaya.
                  ODeals also provide home massage booking in Pattaya, discount spa in Pattaya, promotion on facial treatment in Pattaya for you. If you are looking
                   for best deals, discounts, or promotion of beauty treatment, skin treatment, waxing, or spa and massage or home cleaning or AC Repair Service or Carpentry
                    or Plumber service in Pattaya. ODeals will help you find and book the best, most popular, best rated, or luxury, premium, quality massage and spa, 
                    Beauty and Salon, Cleaning Service, AC Repairs, Plumber Services in Pattaya, Thailand. 
            </small>
          </p>
          <div class="row copyright" v-if="generalsetting.site_copyright">
            <div class="col-lg-12 footer-descriptiom pb-2">
              <p class="text-center"><small>{{generalsetting.site_copyright}}</small></p>
            </div>
          </div>
        </div>
      </div>
</footer>
</template>
<style scoped>
.footer-descriptiom {
  border:0px;
}
.apps a{
  cursor:pointer;
}
.footer{
  padding:30px 0 0;
  background:#042f16;
}
.footer-upper{
  background:#042f16;

}
.footer-bot{
  background:#e3faec;
}
.footer .footer-extra-content .download-card {
  background:#109848 !important;
}
.download-text{
  color:#e3faec;
  font-size:15px;
}
.product-services,.social{
  color:#fdfdfd;
}
.download-card h6{
  color:#e3faec;
}
label, span {
color:#e3faec;
}
label:hover, span:hover{
  color:white;
}
</style>
<script>
import { mapGetters } from "vuex";
import CookieLaw from 'vue-cookie-law'
export default {
    name:'Footer',
    components: { CookieLaw },
    data(){
      return {
        baseUrl:window.baseUrl,
        cols: 2,
        appsetting:{}
      }
    },
    mounted(){
      setTimeout(() => {
        if(this.appdownload !== null){
            this.appsetting = this.appdownload
            this.appsetting.play_store_url = this.appsetting.playstore_url
            this.appsetting.app_store_url= this.appsetting.appstore_url
        }else{
            axios.get(this.baseUrl + "/appdownload.json")
            .then((response) => {
                this.appsetting = response.data
            });
        }
    }, 1000);
    
    },
    computed: {
        ...mapGetters(['generalsetting','service','appdownload']),
        columns () {
            let columns = []
            let mid = Math.ceil(this.service.length / this.cols)
            for (let col = 0; col < this.cols; col++) {
              if(this.service.length > 0){
                columns.push(this.service.slice(col * mid, col * mid + mid))
              }
            }
            return columns
        }
    },
}
</script>