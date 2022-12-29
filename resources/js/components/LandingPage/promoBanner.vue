<template>
  <section class="promo-banner" >
    <!-- custom banner
    <div class="container">
      <div class="banner d-flex sketchy justify-content-between align-items-center">
        <div class="banner-img">
          <img src="https://www.pngmart.com/files/15/Happy-Face-Transparent-PNG.png" />
        </div>
        <div class="description">
            <span class="des-title" style="white-space: pre">WE HAVE A VERY</span><br />
            <span class="des-title">SPECIAL GIFT FOR YOU</span>
          <h3>SAVE $50</h3>
          <h5>ON YOUR NEXT ORDER!</h5>
        </div>
        <div class="promo-code gradient-border">
            <p class="text-center mb-0">YOUR PROMO CODE</p>
            <h3 class="text-center">GIFT4YOU</h3>
            <p class="text-center mb-0">Valid until: 23th October 2023</p>

        </div>
      </div>
    </div> -->

    <!-- IMAGE banner -->
    <div class="container">
      <div class="img-banner my-3">
        <img src="/images/frontend/adsPromo/promobanner.png" />
      </div>
    </div>
  </section>
  </template>
  
  <style scoped>
  .promo-container{
    padding:0 100px;
  }
  .sketchy{
    border: 3px solid #333333;
    border-radius: 2% 6% 5% 4%/1% 1% 2% 4%;
    position:relative;
  }
  .sketchy::before {
    content: "";
    border: 2px solid #353535;
    display: block;
    width: 100%;
    height: 100%;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate3d(-50%, -50%, 0) scale(1.015) rotate(0.5deg);
    border-radius: 1% 1% 2% 4%/2% 6% 5% 4%;
  }
  .gradient-border {
    --borderWidth: 3px;
    background: #fff;
    position: relative;
    border-radius: var(--borderWidth);
  }
  .gradient-border:after {
    content: '';
    position: absolute;
    top: calc(-1 * var(--borderWidth));
    left: calc(-1 * var(--borderWidth));
    height: calc(100% + var(--borderWidth) * 2);
    width: calc(100% + var(--borderWidth) * 2);
    background: linear-gradient(60deg, #f79533, #f37055, #ef4e7b, #a166ab, #5073b8, #1098ad, #07b39b, #6fba82);
    border-radius: calc(2 * var(--borderWidth));
    z-index: -1;
    animation: animatedgradient 3s ease alternate infinite;
    background-size: 300% 300%;
  }
  
  
  @keyframes animatedgradient {
    0% {
      background-position: 0% 50%;
    }
    50% {
      background-position: 100% 50%;
    }
    100% {
      background-position: 0% 50%;
    }
  }
  .promo-banner .banner{
    margin-bottom:8px;
  }
  .promo-banner .banner .banner-img{
    padding:20px;
    margin-left:20px;
  }
  .promo-banner .banner .banner-img img{
    width:130px;
  }
  .promo-banner .banner .description{
    padding:20px;
  }
  .promo-banner .banner .description .des-title{
    margin:0 0 8px;
    padding:0 4px;
    background:black;
    color:white;
    font-size: 1.2rem;
  }
  .promo-banner .banner .promo-code{
    padding:10px;
    margin:20px;
    width:300px;
  }

  .img-banner{
    max-height:200px;
    overflow: hidden;
  }
  .img-banner img{
    object-fit:cover;
    width:100%;
    height:100%;
  }
  </style>
    
  <script>
  </script>
  