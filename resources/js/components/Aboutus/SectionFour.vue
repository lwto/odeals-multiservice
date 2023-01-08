<template>

<section class="our-provider editors mar-top mar-bot section-four"  data-iq-gsap="onStart" data-iq-position-y="70" data-iq-rotate="0" data-iq-trigger="scroll" data-iq-ease="power.out" data-iq-opacity="0">
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
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 row-cols-xl-4 list-inline">
            <div v-for="(provider, index) in providers" :key="index" class="col">
              <div class="provider-box">
                    <div class="img-box">
                        <img :src="provider.profile_image" alt="" class="team-img"> 
                        <div class="certi-box">
                            <img :src="baseUrl + '/images/frontend/certi.png'" alt=""> 
                        </div>
                    </div>
                    <div class="provider-box-content">
                        <h5>{{provider.display_name}}</h5>
                        <span class="primary-color">{{provider.providertype}}</span>
                    </div>
                </div>
            </div>
        </div>       
    </div>
</section>
</template>
<script>
import {get} from '../../request'

export default {
  name: "SectionFour",
  mounted(){
    this.getProvider()
  },
  data(){
    return{
      baseUrl:window.baseUrl,
      providers:[]
    }
  },
  methods: {
    getProvider() {
      get("user-list", {
          params: {
            user_type: "provider",
            per_page: 4
          },
        })
    },
  },
}
</script>