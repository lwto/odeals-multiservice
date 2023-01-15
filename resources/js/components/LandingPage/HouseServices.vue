<template>
  <section class="house-services">
    <div class="container">
      <h3 class="text-center mb-5">Best Deals of The Month</h3>
      <div class="row align-items-center justify-content-center" style="row-gap:15px;">      
        <div class="col-lg-4 ">
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
        <div class="col-lg-8">
          <div class="row justify-content-between" style="row-gap:15px;">
            <div class="col-lg-4 col-md-6 d-flex justify-content-center">
              <div class="house-card" style="width: 250px;">
                <div class="house-card-img">
                  <img class="" src="https://everestmechanical.com/wp-content/uploads/2022/07/AC-Services-colorado.jpg" alt="Card image cap"/>
                  <p class="promo">20% OFF</p>
                </div>
                <div class="body">
                  <p class="service-title">AC Repair</p>
                  <p class="price">฿200</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 d-flex justify-content-center">
              <div class="house-card" style="width: 250px;">
                <div class="house-card-img">
                  <img class="" src="https://img.freepik.com/free-photo/close-up-hand-painting-wall-with-roller_176420-4760.jpg?w=1380&t=st=1673429184~exp=1673429784~hmac=b453cecb2a0549d9ddbd390a698c755f15e3c58ef34f6a88bf3d2b78cf5c2f3b"></img>
                  <p class="promo">12% OFF</p>
                </div>                
                <div class="body">
                  <p class="service-title">Wall Painting</p>
                  <p class="price">฿300</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 d-flex justify-content-center">
              <div class="house-card" style="width: 250px;">
                <div class="house-card-img">
                  <img class="" src="https://img.freepik.com/free-photo/side-view-close-up-hand-young-man-apron-rubber-gloves-holding-basket-cleaning-equipment-feather-duster-spray-bottle-sponge-cloth-wiping-basket_1150-48118.jpg?w=1380&t=st=1673429327~exp=1673429927~hmac=29baa7d4ae79c584631003e6b6a43729603cbdf891f1c6baf95f62f1da9b54ec"></img>
                  <p class="promo">5% OFF</p>
                </div>
                <div class="body">
                  <p class="service-title">Cleaning</p>
                  <p class="price">฿120</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 d-flex justify-content-center">
              <div class="house-card" style="width: 250px;">
                <div class="house-card-img">
                  <img class="" src="https://img.freepik.com/free-photo/close-up-hand-man-use-glue-tape-close-cardboard-box-sealing-big-box-packing-moving-new-house-concept-selective-focusx9cardboard-box_1150-58847.jpg?w=1380&t=st=1673429919~exp=1673430519~hmac=4a432ea9c208a55e402acc306b5b6ba47495b366d3828082337fed2d6151891f"/>
                  <p class="promo">25% OFF</p>
                </div>
                <div class="body">
                  <p class="service-title">Moving</p>
                  <p class="price">฿80</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 d-flex justify-content-center">
              <div class="house-card" style="width: 250px;">
                <div class="house-card-img">
                  <img class="" src="https://img.freepik.com/free-photo/unrecognizable-male-plumber-standing-near-kitchen-sink-showing-thumb-up_1098-17823.jpg?w=1380&t=st=1673429683~exp=1673430283~hmac=ed554802914a078d73800368f76e2978a02dc99ed45fc9b060985e960dc0e953" alt="Card image cap"/>
                  <p class="promo">10% OFF</p>
                </div>
                <div class="body">
                  <p class="service-title">Plumber</p>
                  <p class="price">฿230</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 d-flex justify-content-center">
              <div class="house-card" style="width: 250px;">
                <div class="house-card-img">
                  <img class="" src="https://img.freepik.com/free-photo/man-ironing-clothes-side-view_23-2148386991.jpg?w=1380&t=st=1673429772~exp=1673430372~hmac=b5f133b2d3606f7ef17da7d5089d07939d120adc91cabd316457e335563cd57c" alt="Card image cap"/>
                  <p class="promo">4% OFF</p>
                </div>
                <div class="body">
                  <p class="service-title">Ironing</p>
                  <p class="price">฿200</p>
                </div>
              </div>
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
}
.house-card-img{
  border-top-left-radius: 6px;
  border-top-right-radius: 6px;
}
.house-card-img img{
  cursor:pointer;
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