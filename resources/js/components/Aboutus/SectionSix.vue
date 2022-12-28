<template>
  <section v-if="data" class="container mar-top mar-bot">
        <div class="news-letter-box">
            <div class="row row-cols-lg-2 row-cols-1 align-items-center">
                <div class="col">
                    <h3 class="mb-3">{{data.title}}</h3>
                    <p class="mb-0">{{data.text}}</p>
                </div>
                <div class="col mt-lg-0 mt-4">
                    <div class="search-text newsletter">
                        <form>
                            <div class="input-group mb-0">
                                <input type="text" :placeholder="__('messages.email')" class="form-control"> 
                                <button class="subscribe-btn">{{data.buttontext}}</button>                               
                            </div>                
                        </form>
                    </div>
                </div>                
            </div>
        </div>
    </section>
</template>
<script>
export default {
  name: "SectionSix",
  props:{
    data:{type:Object}
  },
}
</script>