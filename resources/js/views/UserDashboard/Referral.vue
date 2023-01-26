<template>
<section class="referral mt-4">
  <div class="container">
    <h5>REFERRAL PROGRAM</h5>
    <div class="content row justify-content-center align-items-center">
      <div class="col-lg-8">
        <h2 class="heading-text text-center">Get <span>$100</span> when you invite your friends</h2>
        <div class="d-flex align-items-center justify-content-center gap-3 mt-4">
          <div class="icon">
            <div class="icon-container">
              <img src="/images/user/share.png" />
            </div>
            <h6>Share</h6>
          </div>
          <div class="icon">
            <div class="icon-container">
              <img src="/images/user/collect.png" />
            </div>
            <h6>Collect</h6>
          </div>
          <div class="icon">
            <div class="icon-container">
              <img src="/images/user/redeem.png" />
            </div>
            <h6>Redeem</h6>
          </div>
        </div>
        <div class="des">
          <p>Give friends $100 discount to book
             on ODealsPro and get $100 cashback after their booking</p>
        </div>
        <div class="mt-3 d-flex flex-column justify-content-center code-container">
          <p>Your Code</p>
          <p class="code"><span>ODEALSGIF</span></p>
        </div>
      </div>
    </div>
  </div>`
</section>
</template>
<style lang="scss">
.referral .heading-text {
  text-transform: uppercase;
  color: #109848;
}
.referral .heading-text span {
  font-size: calc(1.52rem + 2.25vw);
}
.referral .content {
  margin-top: 60px;
}
.referral .content .icon .icon-container {
  width: 80px;
  height: 80px;
  border-radius: 50%;
  background-color: #109848;
  display: flex;
  align-items: center;
  justify-content: center;
}
.referral .content .icon .icon-container img {
  width: 50px;
}
.referral .content .icon h6 {
  text-align: center;
  margin-top: 10px;
  text-transform: uppercase;
}
.referral .content .des {
  padding: 70px 15px 15px;
  background-color: #f2f8f0;
  margin-top: -60px;
}
.referral .content .code-container {
  text-align: center;
}
.referral .content .code-container p {
  margin-bottom: 0;
}
.referral .content .code-container .code span {
  border: 1px dotted black;
  padding: 2px 10px;
  color: #109848;
}

</style>
<script>
</script>