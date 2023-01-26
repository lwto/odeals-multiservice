<template>
<section class="section-three">
  <div class="container">
    <h3 class="text-center mb-3">ODealsPro Partner App</h3>
    <p class="text-center">ODealsPro provide easily management for your business by Service Provider Application that you can manage your booking</p>
    <div class="d-flex justify-content-center align-items-center mt-4 gap-2">
      <a  :href="appsetting.play_store_url" target="_blank"><img :src="baseUrl + '/images/frontend/gpay-white.png'"></a>
      <a  :href="appsetting.app_store_url" target="_blank"><img :src="baseUrl + '/images/frontend/apple-white.png'"></a>
    </div>
  </div>
</section>
</template>
<style lang="scss">
.section-three{
  margin:20px 0 100px;
  padding:60px 0;
  background:#109848;
  color:white;
  h3{
    color:white;
  }
}
</style>
<script>
import { mapGetters } from "vuex";
export default {
    data(){
      return {
        baseUrl:window.baseUrl,
        appsetting:{}
      }
    },
    mounted(){
      setTimeout(() => {
        if(this.appdownload !== null){
            this.appsetting = this.appdownload
            this.appsetting.play_store_url = this.appsetting.playstore_url
            this.appsetting.app_store_url= this.appsetting.appstore_url
        }else{
            axios.get(this.baseUrl + "/appdownload.json")
            .then((response) => {
                this.appsetting = response.data
            });
        }
    }, 1000);
    
    },
    computed: {
        ...mapGetters(['generalsetting','service','appdownload']),
    },
}
</script>