<template>
  <section class="ads-section editors mar-top">
    <div class="container">
      <div class="row" style="row-gap:30px;">
        <div class="col-lg-9">
          <div class="row" style="row-gap:30px;">
            <div class="col-lg-6">
              <h3 class="mb-3">Everyday life made easier</h3>
              <p>When life gets busy, you don't have to tackie it alone.
                Get time back for what you love without breaking the bank.
              </p>
              <p class="check">
                <i class="fas fa-check mr-3"></i> 
                <span>Choose your Tasker by reviews, skills, and price</span>
              </p>
              <p class="check">
                <i class="fas fa-check mr-3"></i> 
                <span>Schedule when it works for you - as early as today</span>
              </p>
              <p class="check">
                <i class="fas fa-check mr-3"></i> 
                <span>Chat, pay, tip and review all through one platform</span>
              </p>
            </div>
            <div class="col-lg-6">
              <div v-if="slider" class="swiper-container adsBanner">
                <div class="swiper-wrapper">
                    <div class="swiper-slide ">
                        <div class="inner-content d-flex justify-content-center">
                            <img src="/images/frontend/adsPromo/ads-img1.jpg"/>
                        </div>
                    </div>
                    <div class="swiper-slide item-slide">
                      <div class="inner-content d-flex justify-content-center">
                          <img src="/images/frontend/adsPromo/ads-img2.jpg"/>
                      </div>
                  </div>
                  <div class="swiper-slide item-slide">
                    <div class="inner-content d-flex justify-content-center">
                        <img src="/images/frontend/adsPromo/ads-img3.jpg"/>
                    </div>
                </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="d-flex flex-column apps justify-content-center">
            <a  href="" target="_blank"><img src="/images/frontend/gpay-white.png"></a>
            <a  href="" target="_blank"><img class="mt-3" src="/images/frontend/apple-white.png"></a>
            <p class="mt-3">Download and Be a part of OdealsPro</p>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped>

  .apps{
    padding: 10%;
    background:#eee; 
    border-radius:10px;  
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
        ...mapGetters(['slider']),
    },
   
}
</script>