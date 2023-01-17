<template>

<section class="our-provider editors section-four"  data-iq-gsap="onStart" data-iq-position-y="70" data-iq-rotate="0" data-iq-trigger="scroll" data-iq-ease="power.out" data-iq-opacity="0">
    <div class="container"> 
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="header-title text-center">
                    <h3 class="mb-3">Meet Our leaders</h3>
                    <p>All our service providers are verified
                    </p>
                </div>
            </div>
        </div>    
        <div class="row list-inline justify-content-center">
            <div v-for="(provider, index) in providers" :key="index" class="col-lg-3 col-md-6 d-flex justify-content-center">
              <div class="provider-box">
                    <div class="img-box">
                        <img :src="provider.profile_image" alt="" class="team-img"> 
                        <div class="certi-box">
                            <img :src="baseUrl + '/images/approved.png'" alt=""> 
                        </div>
                    </div>
                    <div class="provider-box-content">
                        <h6>{{provider.display_name}}</h6>
                        <span style="color:#109848;">{{provider.providertype}}</span>
                    </div>
                </div>
            </div>
        </div>       
    </div>
</section>
</template>
<style scoped>
h3{
  color:#042f16;
}
.provider-box{
  width:250px;
}
.our-provider .provider-box .img-box .team-img {
  height: 180px;
}

.our-provider .provider-box .img-box .certi-box {
  background:white;
  width:45px;
  min-width:45px;
  height:45px;
}
.our-provider .provider-box .img-box .certi-box img{
width:60px;
}

@media screen and ( max-width: 768px ){
  .provider-box{
    width:100%;
  }
  .our-provider .provider-box .img-box .team-img {
    height: 250px;
  }
}
</style>
<script>
import {get} from '../../request'

export default {
  data(){
    return{
      baseUrl:window.baseUrl,
      providers:[]
    }
  },
  mounted(){
    this.getProvider()
  },
  methods: {
    getProvider() {
      get("user-list", {
          params: {
            user_type: "provider",
            per_page: 4
          },
        })
        .then((response) => {
          if(response.status){
            this.providers = response.data.data;
          }
        });
    },
  },
}
</script>