<template>
  <section class="apps-banner">
    <div class="container">
      <div class="row d-flex justify-content-between align-items-center" style="row-gap:15px;">
        <div class="col-md-6 text">
          <h6 class="text-white pb-0">Download and be a part of ODealsPro</h6>
        </div>
        <div class="app col-md-6 d-flex align-items-center" style="column-gap:15px; row-gap:15px;">
          <a  href="" target="_blank"><img src="/images/frontend/gpay-white.png"></a>
          <a  href="" target="_blank"><img src="/images/frontend/apple-white.png"></a>
        </div>
      </div>
    </div>
  </section>
</template>
<style scoped>
.apps-banner{
  background-color:#042f16;
  padding:20px 0;
}
.app{
  justify-content: right;
}
@media screen and (max-width: 768px) {
  .text h6{
    text-align: center;
  }
  .app{
    justify-content:center;
  }
}
</style>