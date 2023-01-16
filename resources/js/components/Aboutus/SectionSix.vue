<template>
  <section class="container mar-top mar-bot">
        <div class="news-letter-box">
            <div class="row row-cols-lg-2 row-cols-1 align-items-center">
                <div class="col">
                    <h3 class="mb-3">Subscribe to our newsletter</h3>
                    <p class="mb-0">Subscribe to the newsletter to receive exclusive offers, latest news, and updates</p>
                </div>
                <div class="col mt-lg-0 mt-4">
                    <div class="search-text newsletter">
                        <form>
                            <div class="input-group mb-0">
                                <input type="text" :placeholder="__('messages.email')" class="form-control"> 
                                <button class="subscribe-btn odeals-btn">Subscribe</button>                               
                            </div>                
                        </form>
                    </div>
                </div>                
            </div>
        </div>
    </section>
</template>
<style scoped>
.news-letter-box{
    background:#f2f8f0;
}
h3{
    color:#042f16;
}
.odeals-btn{
    background:#109848 !important;
}
</style>
<script>
export default {
  name: "SectionSix",
}
</script>