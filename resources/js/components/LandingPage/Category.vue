<template>
  
  <section class="our-category  mar-top mar-bot" data-iq-gsap="onStart" data-iq-position-y="70" data-iq-rotate="0" data-iq-trigger="scroll" data-iq-ease="power.out" data-iq-opacity="0">
    <div class="container">
        <div  class="category-box">
          <div class="header-title d-flex justify-content-between align-items-center">
            <h3 class="title">Best Solution For Every House Problems</h3>
            <router-link :to="{ name: 'category' }" class="link-btn-box"
              ><span>{{__('messages.see_all')}}</span>
            </router-link>
          </div>
          <!-- <ul v-if="category.length > 0" class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-6 list-inline mb-0"> -->
          <ul class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-6 list-inline mb-0">
            <li class="col mar-bot-res">
              <router-link 
                :to="{
                  name: 'category-detail',
                  params: { category_id: 7 },
                }"
              >
                <div :class="`card text-center bg-transparent circle-clip-effect mb-0`" >
                    <div :class="`card-body service-card `">
                        <img :src="category[0].category_image" alt="image" class="img-fluid">
                        <h6 class="categories-name">
                            {{category[0].name}}
                        </h6>
                    </div>
                </div>
              </router-link>
            </li>
            <li class="col mar-bot-res">
              <router-link 
                :to="{
                  name: 'category-detail',
                  params: { category_id: 9 },
                }"
              >
                <div :class="`card text-center bg-transparent circle-clip-effect mb-0`" >
                    <div :class="`card-body service-card `">
                        <img :src="category[3].category_image" alt="image" class="img-fluid">
                        <h6 class="categories-name">
                            {{category[3].name}}
                        </h6>
                    </div>
                </div>
              </router-link>
            </li>
            <li class="col mar-bot-res">
              <router-link 
                :to="{
                  name: 'category-detail',
                  params: { category_id: 15 },
                }"
              >
                <div :class="`card text-center bg-transparent circle-clip-effect mb-0`" >
                    <div :class="`card-body service-card `">
                        <img :src="category[6].category_image" alt="image" class="img-fluid">
                        <h6 class="categories-name">
                            {{category[6].name}}
                        </h6>
                    </div>
                </div>
              </router-link>
            </li>
            <li class="col mar-bot-res">
              <router-link 
                :to="{
                  name: 'category-detail',
                  params: { category_id: 17 },
                }"
              >
                <div :class="`card text-center bg-transparent circle-clip-effect mb-0`" >
                    <div :class="`card-body service-card `">
                        <img :src="category[4].category_image" alt="image" class="img-fluid">
                        <h6 class="categories-name">
                            {{category[4].name}}
                        </h6>
                    </div>
                </div>
              </router-link>
            </li>
          </ul>
          <!-- <div v-else class="row">
            <img :src="baseUrl+'/images/frontend/data_not_found.png'"  class="datanotfound" />
        </div> -->
        </div>
    </div>

    <div class="container" style="margin-top:40px;">
      <div  class="category-box">
        <div class="header-title d-flex justify-content-between align-items-center">
          <h3 class="title">Health and Wellbeing</h3>
          <router-link :to="{ name: 'category' }" class="link-btn-box"
            ><span>{{__('messages.see_all')}}</span>
          </router-link>
        </div>
        <ul class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-6 list-inline mb-0">
          <li class="col mar-bot-res">
            <router-link 
              :to="{
                name: 'category-detail',
                params: { category_id: 14 },
              }"
            >
              <div :class="`card text-center bg-transparent circle-clip-effect mb-0`" >
                  <div :class="`card-body service-card `">
                      <img :src="category[1].category_image" alt="image" class="img-fluid">
                      <h6 class="categories-name">
                          {{category[1].name}}
                      </h6>
                  </div>
              </div>
            </router-link>
          </li>
          <li class="col mar-bot-res">
            <router-link 
              :to="{
                name: 'category-detail',
                params: { category_id: 16 },
              }"
            >
              <div :class="`card text-center bg-transparent circle-clip-effect mb-0`" >
                  <div :class="`card-body service-card `">
                      <img :src="category[5].category_image" alt="image" class="img-fluid">
                      <h6 class="categories-name">
                          {{category[5].name}}
                      </h6>
                  </div>
              </div>
            </router-link>
          </li>
          <li class="col mar-bot-res">
            <router-link 
              :to="{
                name: 'category-detail',
                params: { category_id: 12 },
              }"
            >
              <div :class="`card text-center bg-transparent circle-clip-effect mb-0`" >
                  <div :class="`card-body service-card `">
                      <img :src="category[7].category_image" alt="image" class="img-fluid">
                      <h6 class="categories-name">
                          {{category[7].name}}
                      </h6>
                  </div>
              </div>
            </router-link>
          </li>
          <!-- <li class="col mar-bot-res">
            <router-link 
              :to="{
                name: 'category-detail',
                params: { category_id: category[4].id },
              }"
            >
              <div :class="`card text-center bg-transparent circle-clip-effect mb-0`" >
                  <div :class="`card-body service-card `">
                      <img :src="category[4].category_image" alt="image" class="img-fluid">
                      <h6 class="categories-name">
                          {{category[4].name}}
                      </h6>
                  </div>
              </div>
            </router-link>
          </li> -->
        </ul>
      </div>
  </div>
  </section>
</template>
<style scoped>
.card{
  border-radius:0;
}
</style>
<script>
import { mapGetters } from "vuex";
export default {
    name:'Category',
    data() {
        return {
            baseUrl:window.baseUrl
        };
    },
    computed: {
        ...mapGetters(["category"]),
    },
}
</script>
