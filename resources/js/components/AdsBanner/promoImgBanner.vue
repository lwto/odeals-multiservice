<template>
  <section class="promo-img-banner" style="margin-bottom:100px;">
    <div class="container">
      <!-- IMAGE banner -->
      <div class="image-banner" :class="{ hidden: closeImg==true}">
        <div class="img-banner my-3">
          <img src="/images/frontend/adsPromo/promobanner.png" />
          <div class="close-btn" @click="closeBanner"><i class="fas fa-window-close"></i></div>
        </div> 
      </div> 
    </div>
  </section>
</template>
<style scoped>

.img-banner {
  max-height: 200px;
  overflow: hidden;

}
.image-banner{
  position:relative;
}
.image-banner.hidden{
  display:none;
}
.img-banner img {
  object-fit: cover;
  width: 100%;
  height: 100%;
  object-position: center center;
}
.close-btn {
  position: absolute;
  right: 4px;
  top: 0px;
  font-size: 22px;
  padding: 4px;
  border: none;
  cursor: pointer;
}
</style>

<script>
export default {
  data() {
    return {
      closeImg: false,
    };
  },
  methods: {
    closeBanner() {
      this.closeImg = true;
    },
  },
};
</script>