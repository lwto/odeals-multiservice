<template>
  <section class="house-services">
    <div class="container">
      <h3 class="text-center mb-5">Best Deals of The Month</h3>
      <div class="row align-items-center justify-content-center" style="row-gap:15px;">      
        <div class="col-lg-4 ">
          <div class="swiper-container adsBanner">
            <div class="swiper-wrapper">
                <div class="swiper-slide ">
                    <div class="inner-content d-flex justify-content-center">
                        <img src="/images/frontend/adsPromo/ads-image-5.jpg"/>
                    </div>
                </div>
                <div class="swiper-slide item-slide">
                  <div class="inner-content d-flex justify-content-center">
                      <img src="/images/frontend/adsPromo/ads-image-4.jpg"/>
                  </div>
              </div>
              <div class="swiper-slide item-slide">
                <div class="inner-content d-flex justify-content-center">
                    <img src="/images/frontend/adsPromo/ads-image-7.jpg"/>
                </div>
            </div>
            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="row justify-content-between" style="row-gap:15px;">
            <div v-for="(data,index) in discountservice" :key="index" class="col-lg-4 col-md-6 d-flex justify-content-center">
              <router-link :to="{name: 'service-detail',params: { service_id: data.id }}" class="main-title" v-if="index < 6">
                <div class="house-card">
                  <div class="house-card-img">
                    <img :src="data.attchments[0] ? data.attchments[0]: baseUrl+'/images/default.png'" >
                    <p class="promo">{{ data.discount }}% OFF</p>
                  </div>
                  <div class="body">
                    <router-link :to="{name: 'service-detail',params: { service_id: data.id }}" class="main-title"><p class="service-title text-truncate">{{data.name}}</p></router-link>
                    <p class="price">{{data.price_format}}</p>
                  </div>
                </div>
              </router-link>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
<style scoped>
.house-card{
  border-radius: 6px;
  overflow:hidden;
  width:250px !important;
  max-width:250px !important;
}
.house-card-img{
  border-top-left-radius: 6px;
  border-top-right-radius: 6px;
  height:180px;
}
.house-card-img img{
  cursor:pointer;
  width:100%;
  height:100%;
  object-fit: cover;
}
.wellbeing-services{
  padding:150px 0;
}
.house-card .body{
  background:#F2F8F0;
  padding:15px;
}
.ads-image img{
  width:100%;
  height:auto;
  border-radius:10px;
}
.btn{
  background:white;
  color:#109848;
}

h3{
  color:#042f16;
}
p{
  color:#042f16;
  margin-bottom:0;

}
.service-title{
  font-weight:bold;
}
.house-card-img{
  position:relative;
}
.promo{
  background:#109848;
  color:#fff;
  padding:0 12px;
  font-weight:bold;
  position:absolute;
  right:0;
  top:30px;
}
@media only screen and (max-width: 1200px){
  .house-card{
      width:200px !important;
      max-width: 200px !important;
    }
  }
@media only screen and (max-width: 992px){
  .house-card{
      width:300px !important;
      max-width:300px !important;
    }
      .house-card-img{
        height:200px;
      }

}
@media only screen and (max-width: 350px){
  .house-card{
      width:245px !important;
      max-width:245px !important;
    }
      .house-card-img{
        height:130px;
      }

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
    new Swiper(".adsBanner", {
        autoplay:{delay: 6000},
        loop: true,
        slidesPerView: 1,
        spaceBetween: 10,
        observer: true,  
        observeParents: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        breakpoints: {
            320: { slidesPerView: 1 },
            550: { slidesPerView: 1 },
            991: { slidesPerView: 1},
            1400: { slidesPerView: 1 },
            1500: { slidesPerView: 1 },
            1920: { slidesPerView: 1},
            },
        });
    
    },
    
    computed: {
        ...mapGetters(['slider', 'discountservice']),
    },
   
}
</script>