<template>
<section class="banner-two">
  <div class="container">
    <div class="row">
      <div class="col-lg-7">
        <div class="banner-content">
          <h2>Find The Right</h2>
          <h2 class="font-weight-bolder"><span>Home</span> Services Around You</h2>
          <form>
            <div class="row d-flex mt-4" style="column-gap:20px;">
              <div class="col-md-6 col-lg-7">
                <input type="text" class="form-control" placeholder="What are you Looking for?">
              </div>
              <div class="col-md-6 col-lg-4">
                <input type="text" class="form-control" placeholder="Your Location">
              </div>
            </div>
            <button class="btn btn-primary mt-4">Search</button>
          </form>
          <div class="services mt-4 d-flex align-items-center">
            <p><i class="fas fa-circle"></i>Services</p>
            <p class="service">AC Installation</p>
            <p Class="service">Nail Spa</p>
            <p Class="service">Personal Trainer</p>
          </div>
        </div>
      </div>
      <div class="col-lg-5">
        <div class="banner-img d-flex justify-content-center">
          <img src="" alt="">
        </div>
      </div>
    </div>
  </div>
</section>
</template>
<style scoped>
.banner-two{
  background-image: url('/images/frontend/banner-image.png');
  background-repeat:no-repeat;
  background-size:cover;
  background-position:bottom left;
}
.banner-content{
  padding:80px 0;
}
.banner-content h2 span{
  color:rgb(190, 130, 246);
}
.banner-content h2:second-child{
  font-weight:bolder;
}
.banner-content .services i{
  margin-right:4px;
  color:orange;
}
.banner-content .services .service{
  padding:0px 10px;
  border:1px dotted white;
  background-color:rgb(239, 239, 248) ;
  color:rgb(190, 130, 246);
  margin-left:15px;
  border-radius:4px;
  font-size:14px;
}
input{
  border-radius:4px;
}
</style>
<script>

</script>