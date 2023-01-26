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
            <a href="#" class="btn btn-primary"  >
              Join as Partner
            </a>
            <a href="#" class="btn btn-primary"  >
              Join as User
            </a>

          </div>
        </div>
      </div>
      <div class="col-lg-5">
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
  padding:100px 0;
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