<template>
  <section class="wellbeing-services">
    <div class="container">
      <div class="row align-items-center justify-content-center" style="row-gap:15px;">
        <div class="col-lg-8">
          <div class="row justify-content-between" style="row-gap:15px;">
            <div class="col-lg-4 col-md-6 d-flex justify-content-center">
              <div class="house-card" style="width: 250px;">
                <div class="house-card-img">
                  <img class="" src="https://img.freepik.com/free-photo/beautiful-young-woman-having-spa-massage-head-beauty-salon-indoors_186202-3543.jpg?w=1380&t=st=1673430129~exp=1673430729~hmac=f8e8842d6bec6d884bd25102c8042236dbab206a456c4282cf81e2de6c811d8c" alt="Card image cap"/>
                  <p class="promo">25% OFF</p>
                </div>
                <div class="body">
                  <p class="service-title">Massage and Spa</p>
                  <p class="price">฿400</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 d-flex justify-content-center">
              <div class="house-card" style="width: 250px;">
                <div class="house-card-img">
                  <img class="" src="https://img.freepik.com/free-photo/beautiful-elegant-female-hand-with-beauty-french-manicure_186202-691.jpg?w=1380&t=st=1673430276~exp=1673430876~hmac=38a73345242a1490ec33e46431ad075b5acd9e53095487e40845af55f420a981" alt="Card image cap"/>
                  <p class="promo">13% OFF</p>
                </div>                
                <div class="body">
                  <p class="service-title">Nail Art</p>
                  <p class="price">฿250</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 d-flex justify-content-center">
              <div class="house-card" style="width: 250px;">
                <div class="house-card-img">
                  <img class="" src="https://img.freepik.com/free-photo/beautiful-woman-face_1150-8440.jpg?t=st=1673430315~exp=1673430915~hmac=d47695c1fcf69309cb5a03debf60b5922913f0b080e30e345fb7c62c41336d3b" alt="Card image cap"/>
                  <p class="promo">20% OFF</p>
                </div>
                <div class="body">
                  <p class="service-title">Makeup Artist</p>
                  <p class="price">฿500</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 d-flex justify-content-center">
              <div class="house-card" style="width: 250px;">
                <div class="house-card-img">
                  <img class="" src="https://img.freepik.com/free-photo/woman-stratching-isolated_1303-13963.jpg?w=1380&t=st=1673430404~exp=1673431004~hmac=25546a17e1155f0e9ecefb85671cb77b2ebded2318ed42176ead6b9a2e59595e" alt="Card image cap"/>
                  <p class="promo">6% OFF</p>
                </div>
                <div class="body">
                  <p class="service-title">Yoga</p>
                  <p class="price">฿300</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 d-flex justify-content-center">
              <div class="house-card" style="width: 250px;">
                <div class="house-card-img">
                  <img class="" src="https://img.freepik.com/free-photo/young-man-sportswear-exercise-class-gym_1150-12374.jpg?t=st=1673431465~exp=1673432065~hmac=ef218794368386961c2296d1b5d3e62fa7e093241fc869bd1ffd56a551865c70"/>
                  <p class="promo">15% OFF</p>
                </div>
                <div class="body">
                  <p class="service-title">Personal Trainer</p>
                  <p class="price">฿440</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 d-flex justify-content-center">
              <div class="house-card" style="width: 250px;">
                <div class="house-card-img">
                  <img class="" src="https://img.freepik.com/free-photo/woman-relaxing-spa_329181-13143.jpg?w=1380&t=st=1673431641~exp=1673432241~hmac=fc78bbdea5d5e435c12173ec1655a4939a3df1d9e57dffb247bc2ee9d61bdeae" alt="Card image cap"/>
                  <p class="promo">18% OFF</p>
                </div>
                <div class="body">
                  <p class="service-title">Foot Spa</p>
                  <p class="price">฿360</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 ">
          <h4 class="text-center mb-5">Health and Wellbeing</h4>
          <div class="d-flex justify-content-center">
            <div class="main-image">
              <img src="https://img.freepik.com/free-photo/sport-wellbeing-active-lifestyle-concept-portrait-smiling-slim-strong-asian-fitness-girl-personal-workout-trainer-showing-muscles-flexing-biceps-look-proud-white-background_1258-21452.jpg?w=1060&t=st=1673425547~exp=1673426147~hmac=056f312689d534dc39387a4fb6ff4c695dbc945c17d677e658fe09ac9f91cd7e"/>
              <div class="d-flex justify-content-center button"> <span class="link-btn-box btn">SEE ALL</span></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
<style scoped>
.house-card{
  border-radius: 6px;
  overflow:hidden;
}
.house-card-img{
  border-top-left-radius: 6px;
  border-top-right-radius: 6px;
}
.house-card-img img{
  cursor:pointer;
}
.wellbeing-services{
  padding:150px 0;
}
.house-card .body{
  background:#F2F8F0;
  padding:15px;
}
.main-image img{
  width:100%;
  height:auto;
  border-radius:10px;
}
.btn{
  background:white;
  color:#109848;
}
.main-image{
  position:relative;
}
.button{
  position:absolute;
  bottom:20px;
  width:100%;
  margin:auto;
  
}
p{
  color:#042f16;
  margin-bottom:0;

}
.service-title{
  font-weight:bold;
}
.house-card-img{
  position:relative;
}
.promo{
  background:#109848;
  color:#fff;
  padding:0 12px;
  font-weight:bold;
  position:absolute;
  right:0;
  top:30px;
}
</style>