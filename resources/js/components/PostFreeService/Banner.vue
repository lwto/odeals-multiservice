<template>
  <section class="post-service-banner">
    <div class="container">
      <div class="row d-flex justify-content-between align-items-center" style="row-gap:30px;">
        <div class="col-lg-5">
          <h2 class="title">Unlimited Opportunities with ODeals!</h2>
          <p class="mt-3">Interested in making the most out of your skills? Then join ODeals and earn 100% from completed tasks!</p>
          <a @click="redirectToRegister" class="btn btn-primary btn-register mt-3">Register for FREE</a>

          <!-- <router-link :to="{ name: 'register' }">
            <button class="btn btn-primary btn-register mt-3">
              Register for FREE
            </button>
          </router-link> -->
        </div>
        <div class="col-lg-6 d-flex justify-content-center">
          <img src="/images/frontend/opportunities.jpg"/>
        </div>
      </div>
    </div>
  </section>
</template>
<script>

export default {
 
  data() {
      return {
          baseUrl: window.baseUrl,

      };
  }, 
  methods: {
      redirectToRegister(){
          window.location.href = baseUrl + "/register";
      },
      
  },
};
</script>