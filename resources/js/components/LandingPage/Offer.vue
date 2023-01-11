<template>
<section  class="our-offer editors"  data-iq-gsap="onStart">
    <div class="container">
        <div class="text-center mb-5">
             <h3 class="main-title" v-if="discountservice.length > 0">Grab Deals and Special Offers</h3>
        </div>
        <div  class="swiper-container offerSlider">
            <div class="swiper-wrapper">
                <div  class="swiper-slide" v-for="(data,index) in discountservice" :key="index">
                    <div class="offer-box">
                        <div class="offer-info">
                            <div class="offer-title">
                                <span class="sub-title">{{__('messages.best_deal_month')}}</span>
                            <router-link :to="{name: 'service-detail',params: { service_id: data.id }}" class="main-title"><h3 class="text">{{data.name}}</h3></router-link>
                            </div>
                            <div class="offer-text">
                                <b>{{data.discount}}% {{__('messages.off')}}</b> {{__('messages.on_all_item')}}
                            </div>
                        </div>
                        <div class="offer-image">
                            <img :src="data.attchments[0] ? data.attchments[0]: baseUrl+'/images/default.png'" >
                            <div class="offer-disc">
                                <span class="disc-name">From {{data.price_format}}</span>
                            </div>
                        </div>                               
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>
</template>
<style scoped>
.our-offer{
    padding:100px 0;
}
.our-offer .offerSlider .offer-box .offer-image img{
    height:300px;    
}
.our-offer .offerSlider .offer-box{
     background:#F2F8F0;   
}
.sub-title{
    color:#109848;
}
.our-offer .offerSlider .offer-box .offer-image .offer-disc{
    background:#109848;
    border-color:#e3faec;
}
.text, .offer-text b, .main-title{
    color:#042f16;
}
.text:hover{
    color:#109848;
}
</style>
<script>
import { mapGetters } from "vuex"
import Swiper, { Navigation, Pagination, Parallax, Autoplay } from 'swiper'
Swiper.use([Navigation, Pagination, Parallax, Autoplay])
export default {
    name:'Offer',
    data(){
        return{
            baseUrl:window.baseUrl
        }
    },
    mounted(){
        new Swiper(".offerSlider", {
            autoplay:{delay: 3000},
            loop: true,
            slidesPerView: 1.6 , 
            // centeredSlides: true,
            spaceBetween: 30,
            observer: true,  
            observeParents: true,
            loopFillGroupWithBlank: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                250: { slidesPerView: 1 },
                320: { slidesPerView: 1 },
                768: { slidesPerView: 1.5},
                1199: { slidesPerView: 1.5 },
                1400: { slidesPerView: 1.5 },
                1500: { slidesPerView: 1.5},
                1920: { slidesPerView: 1.5},
            },
        });
    },
    computed: {
        ...mapGetters(["discountservice"]),
    },
    
}
</script>
