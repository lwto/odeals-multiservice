<template>
<section class="section-one">
  <div class="container">
    <div class="row align-items-center" style="row-gap:20px;">
      <div class="col-lg-6">
        <h2 class="mb-4"><span class="green">Grow your business</span> by being ODealsPro's partner</h2>
        <p class="mb-3">ODealsPro can boost up your sale by provide your customers easy booking process, receive online payments, and get clients self-booking 24/7 on our platform!</p>
        <h6 class="mb-5 bold">Just one click you can be our partner</h6>
        <div class="btn btn-odeals">
          <router-link :to="{ name: 'prof-register' }">
            Join us
          </router-link>
        </div>
      </div>
      <div class="col-lg-6">
        <img src="https://img.freepik.com/free-photo/portrait-beautiful-young-asian-woman-cheerleader-with-smart-mobile-phone_74190-11288.jpg?w=826&t=st=1673874161~exp=1673874761~hmac=c1f82bcf4ce27134de2d8df5de7e6a92dddc917f69365c0fd607b5cf2f8f873f"/> 
      </div>
    </div>
  </div>
</section>
</template>
<style lang="scss">
.section-one{
  padding:80px 0;
  .bold{
    font-weight: bold;
  }
  .green{
    color:#109848;
  }
  h2{
    font-size: calc(1.4375rem + 1.05vw);
    color:#042f16;
  }
  .btn-odeals{
    background:#109848;
    a{
      color:#fff;
    }
  }
}

</style>
<script>

</script>