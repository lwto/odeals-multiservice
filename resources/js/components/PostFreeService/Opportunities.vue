<template>
  <section class="opportunities" style="margin-bottom:60px;">
    <div class="container">
      <div class="d-flex flex-column justify-content-center opp-banner">
        <h3 class="text-white text-center mb-3">Start Your Entrepreneurial Journey Now!</h3>
        <p class="text-white text-center mb-3">
          ODeals provides you with a platform to sell and market your new or<br/>
           used products, connecting users that are just a click away.
        </p>
        <div class="text-center">
          <router-link :to="{ name: 'prof-register' }">
            <button class="btn odeals-btn mt-3">
              Register for FREE
            </button>
          </router-link>
          <!-- <router-link :to="{ name: 'register' }">
            <button class="btn btn-primary btn-register mt-3">
              Get Started for FREE
            </button>
          </router-link> -->
        </div>
      </div>

      <div class="row justify-content-between" style="margin-top:60px; row-gap:10px;">
        <div class="col-lg-3 col-md-6">
          <h4 class="mb-2">Wide Selection Of Goods</h4>
          <img src="/images/icon/choice.png"/>
          <p>Sell and market your products on ODeals, from new to used goods!</p>
        </div>
        <div class="col-lg-3 col-md-6">
          <h4 class="mb-2">Marketing Your Products</h4>
          <img src="/images/icon/star.png"/>
          <p>Post your products to sell with a tap of button.</p>
        </div>
        <div class="col-lg-3 col-md-6">
          <h4 class="mb-2">Easy to<br/> use</h4>
          <img src="/images/icon/click.png"/>
          <p>Manage, list and categories your items quick and easy.</p>
        </div>
        <div class="col-lg-3 col-md-6">
          <h4 class="mb-2">Free to<br/> use</h4>
          <img src="/images/icon/add-user.png"/>
          <p>Get started with listing your goods and earn 100% from everything you sell with ODeals!</p>
        </div>
      </div>
    </div>
  </section>
</template>
<style scoped>
.odeals-btn{
  color:#fff;
  background:#109848;
}
.opportunities img{
  width:60px;
  margin-bottom: 8px;
}
.opp-banner{
  margin: 10px 0;
  padding:50px 15px;
  background:url('/images/frontend/opportunities-cover.jpg');
  background-size:cover;
  background-position: top;
}
h4{
  font-weight: bolder;
  font-size:1.75rem;
  color:#042f16;
}
</style>
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