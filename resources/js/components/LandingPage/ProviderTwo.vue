<template>
    <section class="our-provider-two"  data-iq-gsap="onStart" data-iq-position-y="70" data-iq-rotate="0" data-iq-trigger="scroll" data-iq-ease="power.out" data-iq-opacity="0">
        <div class="container">
            <div class="content_title">
                <h3 class="text-center mb-5">
                    Our Partaner and Service Partaners
                </h3>
            </div>
            <div class="slide-container swiper-container">
                <div class="swiper-wrapper  slide-content">
                    <div class="swiper-slide" v-for="(data, index) in provider" :key="index">
                      <div class="inner-content card-weapper">
                        <div class="card"  >
                            <img :src="data.profile_image" />
                            <img :src="data.profile_image" class="shadow" />
                            <div class="info_content">
                                <div class="info-sub">
                                    <h3>Khun Siri</h3>
                                    <h1>Freelance</h1>
                                </div>
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
.our-provider-two{
    padding:100px 0;
    background:#F2F8F0;

}


.slide-container {
    max-width: 1800px;
    width: 100%;
    padding: 40px 0;
}

.slide-content {
    margin: 0 40px;
    padding: 40px 0;
    overflow: hidden;
    border-radius: 5px;
    -webkit-box-reflect: below -195px -webkit-gradient(linear, left top, left bottom, from(transparent), color-stop(70%, #00000000), to (rgb(250 250 250 / 40%)));
}

.swiper-slide {
    border-radius: 12px;
    width: 250px;
    height: 300px;
    margin: 0 !important;
}

.card img {
    width: 100%;
    height: 100%;
    border-radius: 12px;
    object-fit: cover;
    position: relative;
    z-index: 2;
}

.card .shadow {
    position: absolute;
    width: 103%;
    height: 103%;
    overflow: hidden;
    display: flex;
    left: 50%;
    transform: translate(-50%, 0);
    bottom: 0;
    z-index: -2;
    border-radius: 20px;
    filter: blur(20px);
    opacity: 0.4;
    top: 0;
}

.info_content {
    position: absolute;
    bottom: 10px;
    z-index: 2;
    color: #fffffff2;
    display: flex;
    align-content: center;
    justify-content: space-between;
    border-radius: 12px;
    margin: 0px 12px;
    padding: 16px;
    left: 0;
    right: 0;
    background: rgba(12, 12, 12, 0.37);
    box-shadow: 0 8px 32px rgb(31, 38, 135 / 37%);
    /* backdrop-filter: blur(10px); */
    border-radius: 10px;
    font-family: 'Times New Roman', Times, serif;
}

.info_content .info-sub h3 {
    font-size: 30px;
    font-weight: 1000;
    color: #111214;
    font-family: 'Times New Roman', Times, serif;
}

.info_content .info-sub h1 {
    font-size: 20px;
    font-weight: 1000;
    color: #1eff5c;
    font-family: 'Times New Roman', Times, serif;
}


/* .info_content .info-sub h1 span {
    font-size: 20px;
    font-weight: 600;
    color: #ffea2a;
    font-family: 'Times New Roman', Times, serif;
} */

.info_content .info-sub h2 {
    color: #1eff5c;
    font-family: 'Times New Roman', Times, serif;
    font-size: 20px;
    transition: all 0.3s ease;
}

.info_content h2 i {
    margin-left: 2px;
    font-size: 18px;
}

.info_content:hover>h2 {
    text-shadow: 0px 0px 20px #1eff5c;
}

.swiper-slide:not(.swiper-slide-active) .info_content {
    opacity: none;
    visibility: hidden;
}

.content-titles {
    margin: 100px 0;
    position: relative;
}

.content-titles h2 {
    font-size: 90px;
    color: #fff;
    text-transform: uppercase;
    letter-spacing: 7px;
    text-align: center;
    text-shadow: -1px -1px 20px rgba(255, 255, 255, 0.271);
}

.content-titles h2 span {
    background: -webkit-linear-gradient(45deg, #4048ff, #ff06cb, #ff5c28);
    background-clip: text;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    text-shadow: none !important;
}

@media screen and(max-width:768px) {
    .slide-content {
        margin: 0 10px;
    }
}

@media screen and(max-width:600px) {
    .content_titles h2 {
        font-size: 40px;
    }
    .info_content .info-sub h3 {
        font-size: 14px;
    }
    .info_content .info_sub h1 {
        font-size: 18px;
    }
    .info_content {
        font-size: 18px;
    }
}
</style>
<script>
import { mapGetters } from "vuex";
import Swiper, { Navigation, Pagination, Parallax, Autoplay } from 'swiper'
Swiper.use([Navigation, Pagination, Parallax, Autoplay])

export default {
    name:'ProviderTwo',
    data(){
      return {
          baseUrl:window.baseUrl
      }
    },
    mounted(){
    new Swiper(".slide-container", {
        // autoplay:{delay: 1200},
        slidesPerView: 3.35,
        spaceBetween: 0,
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        loop: true,
        centerSlide: "true",
        fade: "true",
        coverflowEffect: {
        rotate: 10,
        stretch: -0.1,
        depth: 100,
        modifier: 2.8,
        slideShadows: false,
        },
        
        breakpoints: {
        280: {
            slidesPerView: 1.2,
            coverflowEffect: {
                stretch: -10,
            },
        },
        340: {
            slidesPerView: 1.3,
            coverflowEffect: {
                stretch: -0.2,
            },
        },

        450: {
            slidesPerView: 2.45,
            coverflowEffect: {
                stretch: -1,
            },
        },
        640: {
            slidesPerView: 2.5,
            coverflowEffect: {
                stretch: -3,
            },
        },
        768: {
            slidesPerView: 3.3,
            coverflowEffect: {
                stretch: -0.4,
            },
        },
        1024: {
            slidesPerView: 3.35,
            coverflowEffect: {
                stretch: -0.1,
            },
        },
        1400: {
            slidesPerView: 4,
            coverflowEffect: {
                stretch: -0.4,
            },
        },
        1600: {
            slidesPerView: 4,
            coverflowEffect: {
                stretch: -0.4,
            },
        },
    },
    
    });
},
    
    computed: {
        ...mapGetters(["provider","slider"]),
    },
}
</script>