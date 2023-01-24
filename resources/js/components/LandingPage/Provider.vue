<template>
    <section class="our-provider"  data-iq-gsap="onStart" data-iq-position-y="70" data-iq-rotate="0" data-iq-trigger="scroll" data-iq-ease="power.out" data-iq-opacity="0">
        <div class="container">
            <!-- <div class="mb-5 d-flex align-items-center justify-content-between flex-wrap gap-3"> -->
                <h3 class="text-center mb-5">Our Partners and Service Partners</h3>
                <!-- <router-link :to="{ name: 'provider' }" class="link-btn-box btn">{{__('messages.see_all')}}</router-link> -->
            <!-- </div> -->
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 row-cols-xl-4 list-inline justify-content-center">
                <div v-for="(data, index) in provider" :key="index" class="col d-flex justify-content-center">
                    <div class="provider-box" v-if="index < 5" >
                        <div class="img-box">
                            <router-link :to="{ name: 'provider-service',params: { provider_id: data.id }}">
                            <div class="team-img">
                                <img :src="data.profile_image"  class=""  alt="">
                            </div> 
                            </router-link>
                            <div class="provider-box-content">
                                <h6>{{data.display_name}}</h6>
                                <span class="provider-desc">{{data.providertype}}</span>
                            </div>
                        </div>                       
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center pt-5">
                <router-link :to="{ name: 'provider' }" class="link-btn-box btn">{{__('messages.see_all')}}</router-link>
            </div>
        </div>
    </section>
</template>
<style scoped>
.our-provider{
    padding:100px 0;
    background:#F2F8F0;

}
.our-provider .provider-box .img-box .certi-box {
    width: 50px;
    min-width: 50px;
    height: 50px;
    border-radius: 50%;
    background: transparent;
    color:#fff;
    border:0px;
}
.our-provider .provider-box .img-box .certi-box img{
    width:50px;
}
.provider-box-content{
    position:absolute;
    bottom: 10px;
    left:10px;
    right:10px;
    margin:0 auto;
    background-color: #123f03a5;
    padding:10px !important;
    border-radius:15px;
    z-index:1;
}
.provider-box-content h6{
    color:#f2f8f0;
    font-size:18px;
}
.provider-box-content span{
    color:#fff;
    font-size:15px;
}
.provider-box{
    width:200px;
    border-radius: 14px;
    box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
}
.our-provider .provider-box .img-box .team-img {
    overflow:hidden;
    object-fit:cover;
    object-position:center;
    height:250px;
    border-radius: 14px;
}
img{
    width:100%;
    height:100%;
    object-fit: cover;
   
}
h3{
    color:#042f16;
}
.link-btn-box{
    background:#109848;
    color:white;
}
@media only screen and (max-width: 576px){
    .provider-box{
        width:90%;
    }
    .our-provider .provider-box .img-box .team-img {
        height:350px;
    }

}
</style>
<script>
import { mapGetters } from "vuex";
export default {
    name:'Provider',
    data(){
      return {
          baseUrl:window.baseUrl
      }
    },
    computed: {
        ...mapGetters(["provider"]),
    },
}
</script>