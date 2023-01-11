<template>
<section class="featured-services-two"  data-iq-gsap="onStart">
  <div class="container">
    <h3 class="text-center mb-5">Featured Services</h3>
    <div v-if="slider" class="swiper-container featured-swiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide d-flex justify-content-center" v-for="(data, index) in featuredservice" :key="index">
          <div class="inner-content">
            <div class="card" style="width: 18rem;">
              <div class="featured-img card-img-top">
                <a :href="'#/service-detail/'+data.id">
                  <img class="" :src="data.attchments[0] ? data.attchments[0] : baseUrl+'/images/default.png'" />
                </a>
                <div class="provider-img">
                  <img :src="data.provider_image ? data.provider_image : baseUrl+'/images/default.png'" />
                </div>
                <p class="provider">by <a>{{data.provider_name}}</a></p>
              </div>
              <div class="card-body">
                <a :href="'#/service-detail/'+data.id">
                  <p class="service-name">{{data.name}}</p>
                </a>
                <div class="ratting-value pb-3 pt-2"> 
                  <div class="d-flex align-items-center">                               
                      <rating :readonly = true :showrating ="false" :ratingvalue="data.total_rating" />
                  </div>
              </div>
                <p class="price">{{data.price_format}}</p>
                <p class="location"><i class="fas fa-map-marker-alt"></i> <span>{{data.city_id}}</span></p>
              </div>
            </div>  
          </div>
        </div>
      </div>
      <div class="mt-2 d-flex justify-content-center">
        <div class="btn-prev "><i class="fas fa-angle-left"></i></div>
        <div class="btn-next" style="margin-left:10px;"><i class="fas fa-angle-right"></i></div>
      </div>
    </div>
    <div class="d-flex justify-content-center mt-4">
      <router-link :to="{ name: 'service' }"> <span class="link-btn-box btn btn-primary">{{__('messages.see_all')}}</span></router-link>
    </div>
  </div>
</section>
</template>
<style scoped>
.featured-services-two{
  padding-bottom:60px;
}
p{
  margin-bottom:0px;
}
h3{
  color:#042f16;
}
.service-name{
  font-size:18px;
  font-weight:500;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  color:#042f16;
}
.location i{
  color:#042f16;
}

.price{
  font-size:18px;
  font-weight:bold;
  color:#109848;
}
.btn-prev, .btn-next{
  padding:2px 12px;
  color:#042f16;
  background:#F2F8F0;
  border-radius:50%;
  cursor:pointer;
}
.card{
  border-radius:8px;
  overflow:hidden;
  box-shadow: rgba(0, 0, 0, 0.1) -4px 9px 25px -6px;
}
.card-body{
  border:1px solid #F2F8F0;
  border-top:0px;
  border-radius:8px;
  border-top-right-radius:0px;
  border-top-left-radius:0px;
}
.card-img-top{
  position:relative;
  height:200px;
}
.card-img-top img{
  width:100%;
  height:100%;
  position:top;
  object-fit:cover;
}
.provider-img{
  position:absolute;
  left:10px;
  bottom:10px;
  border-radius:50%;
  width:40px;
  height:40px;
  background:white;
  overflow:hidden;
}
.btn-primary{
  background:#109848;
  border-color:#109848;
}
.btn-primary:hover{
  background:#0b8f42;
}
.location span{
  color:#042f16;
}
.provider {
  color:#fff;
  background:#109848;
  padding:0 12px;
  position:absolute;
  right:10px;
  bottom:10px; 
  font-size:13px;
}

</style>
<script>
import { mapGetters } from "vuex";
import Swiper, { Navigation, Pagination, Parallax, Autoplay } from 'swiper'
Swiper.use([Navigation, Pagination, Parallax, Autoplay])

export default {
    data(){
      return {
        baseUrl:window.baseUrl,
      }
    },
    mounted(){
    new Swiper(".featured-swiper", {
        autoplay:{delay: 6000},
        loop: true,
        slidesPerView: 4,
        spaceBetween: 8,
        observer: true,  
        observeParents: true,
        navigation: {
            nextEl: ".btn-next",
            prevEl: ".btn-prev",
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        breakpoints: {
            320: { slidesPerView: 1 },
            620: { slidesPerView: 1 },
            768: { slidesPerView: 2 },
            991: { slidesPerView: 3},
            1400: { slidesPerView: 4 },
            1500: { slidesPerView: 4 },
            1920: { slidesPerView: 4},
            },
        });
    
    },
    
    computed: {
        ...mapGetters(['slider','featuredservice']),
    },
   
}
</script>