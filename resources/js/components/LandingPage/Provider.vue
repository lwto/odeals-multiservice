<template>
    <section class="our-provider"  data-iq-gsap="onStart" data-iq-position-y="70" data-iq-rotate="0" data-iq-trigger="scroll" data-iq-ease="power.out" data-iq-opacity="0">
        <div class="container">
            <div class="header-title d-flex align-items-center justify-content-between flex-wrap gap-3">
                <h3>Our Partners and Service Partners</h3>
                <router-link :to="{ name: 'provider' }" class="link-btn-box">{{__('messages.see_all')}}</router-link>
            </div>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 row-cols-xl-5 list-inline">
                <div v-for="(data, index) in provider" :key="index" class="col">
                    <div class="provider-box" v-if="index < 4">
                        <div class="img-box">
                            <router-link :to="{ name: 'provider-service',params: { provider_id: data.id }}">
                           <div class="team-img">
                            <img :src="data.profile_image"  class=""  alt="">
                           </div> 
                            </router-link>
                            <div class="certi-box">
                                <img :src="baseUrl + '/images/frontend/certi.png'" alt=""> 
                            </div>
                        </div>
                        <div class="provider-box-content">
                            <h5>{{data.display_name}}</h5>
                            <span class="provider-desc">{{data.providertype}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<style scoped>
.our-provider{
    padding:100px 0;
    background:#f6f7f9;

}
.our-provider .provider-box .img-box .team-img {
    height:150px;
    overflow:hidden;
    object-fit:cover;
}
img{
    width:100%;
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