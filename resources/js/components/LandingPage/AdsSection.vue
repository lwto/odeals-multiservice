<template>
  <section class="ads-section">
    <div class="">
      <div class="row d-flex align-items-center" style="row-gap:30px;">
            <div class="col-lg-6 content">
              <h3 class="mb-3">Everyday life made easier</h3>
              <p class="text-white">When life gets busy, you don't have to tackie it alone.
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
            <div class="col-lg-6 px-0">
              <div class="swiper-container adsBanner">
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
  </section>
</template>

<style scoped>
p,h3, span{
  color:#fff;
}
 p{
  color:black;
 }

  .check i {
    color:#F2F8F0;
  }
.content{
  padding:40px 20px;
}
.ads-section{
  background:#109848;
}
.adsBanner{
  height:100%;
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