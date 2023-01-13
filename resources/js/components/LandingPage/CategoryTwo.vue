<template>
<section class="category-two">
  <div class="container">
    <div v-if="slider" class="swiper-container category-swiper">
      <div class="swiper-wrapper">
        <div v-for="(cat, index) in category" :key="index" class="swiper-slide">
          <div class="inner-content d-flex justify-content-center">
              <router-link 
                :to="{
                  name: 'category-detail',
                  params: { category_id: cat.id },
                }"
              >
                <div class="category text-center">
                  
                  <img :src="cat.category_image" alt="image"/>
                 
                    <h6 class="categories-name">
                        {{cat.name}}
                    </h6>
                </div>
              </router-link>
          </div>
        </div>
  
      </div>
      <div class="mt-5 d-flex justify-content-center">
        <div class="btn-prev "><i class="fas fa-angle-left"></i></div>
        <div class="btn-next" style="margin-left:10px;"><i class="fas fa-angle-right"></i></div>
      </div>
    </div>
  </div>
</section>
</template>
<style scoped>
.category-two{
  padding:60px 0;
}
img{
  width:50px;
  align-self:center;
}
.category{
 
  border:1px solid #F2F8F0;
  border-radius:4px;
  padding: 20px;
  width:180px;
  height:160px;
  display:flex;
  flex-direction:column;
  justify-content:center;
}
.categories-name{
  margin-top:15px;
  text-align: center;
  font-weight: 500;
  color:#042f16;

}
.btn-prev, .btn-next{
  padding:2px 12px;
  color:#042f16;
  background:#F2F8F0;
  border-radius:50%;
  cursor:pointer;
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
    new Swiper(".category-swiper", {
        // autoplay:{delay: 6000},
        loop: true,
        slidesPerView: 1,
        spaceBetween: 10,
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
            389: { slidesPerView: 2 },
            550: { slidesPerView: 2 },
            768: { slidesPerView: 3 },
            991: { slidesPerView: 4},
            1400: { slidesPerView: 5 },
            1500: { slidesPerView: 6 },
            1920: { slidesPerView: 6},
            },
        });
    
    },
    
    computed: {
        ...mapGetters(['slider','category']),
    },
   
}
</script>