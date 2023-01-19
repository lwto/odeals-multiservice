<template>
<section class="banner-two">
  <div class="container">
    <div class="row">
      <div class="col-lg-7">
        <div class="banner-content">
          <h2>Find The Right</h2>
          <h2 class="font-weight-bolder"><span>Home</span> Services Around You</h2>

          <h4 class="mt-4 mb-3">Be our partner. Join us now!</h4>
          <div class="d-flex gap-3 mt-5">
            <router-link :to="{ name: 'prof-register' }" class="btn btn-primary"  >
              Join as Partner
            </router-link>
            <button v-b-modal="'my-modal3'" class="btn btn-primary">Join as User</button>

          </div>
          <!-- <form>
            <div class="row d-flex mt-4" style="column-gap:10px; row-gap:15px;">
              <div class=" col-sm-10 col-md-6 col-lg-7">
                <input type="text" class="form-control" placeholder="What are you Looking for?">
              </div>
              <div class="col-sm-10 col-md-6 col-lg-4">
                <input type="text" class="form-control" placeholder="Your Location">
              </div>
            </div>
            <button class="btn btn-primary mt-4">Search</button>
          </form> -->
          <!-- <div class="services mt-4 d-flex align-items-center flex-wrap">
            <p><i class="fas fa-circle"></i>Services</p>
            <p class="service">AC Installation</p>
            <p Class="service">Nail Spa</p>
            <p Class="service">Personal Trainer</p>
          </div> -->
        </div>
      </div>
      <div class="col-lg-5">
        <div class="banner-img d-flex justify-content-center">
          <img src="" alt="">
        </div>
      </div>
    </div>
  </div>
  <Register/>
</section>
</template>
<style scoped>
.banner-two{
  background-image: url('/images/frontend/banner-image.png');
  background-repeat:no-repeat;
  background-size:cover;
  background-position:center center;
}

.banner-content{
  padding:80px 0;
}
.banner-content h2 span{
  color:#109848;
}
.banner-content h2:second-child{
  font-weight:bolder;
}
.banner-content .services i{
  margin-right:4px;
  color:#109848;
}
h2{
  color:#000;
}
.banner-content .services .service{
  padding:0px 10px;
  border:1px dotted white;
  background-color:#e3faec;
  color:#109848;
  margin-left:15px;
  border-radius:4px;
  font-size:14px;
  cursor:pointer;
}
input{
  border-radius:4px;
}
.btn-primary{
  background:#109848;
  border-color:#109848;
}
.btn-primary:hover{
  background:#0b8f42;
}
input{
  outline:none;
  border:none;
  background:white;
}
@media screen and (max-width: 762px) {
  .banner-two{
    background-position:bottom left;
  }
  
}
</style>
<script>
import Register from '../../views/Auth/Register.vue';
export default {
  components: { Register },
}
</script>