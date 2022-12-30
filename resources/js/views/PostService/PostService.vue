<template>
  <div>
     <post-service-banner/>
     <opportunities/>
     <register-step/>
     <testimonials/>
  </div>
</template>
<script>
import PostServiceBanner from '../../components/PostFreeService/Banner.vue'
import Opportunities from '../../components/PostFreeService/Opportunities.vue'
import RegisterStep from '../../components/PostFreeService/HowToGetStart.vue'
import Testimonials from '../../components/PostFreeService/Testimonials.vue'

export default {
  components: { PostServiceBanner, Opportunities, RegisterStep, Testimonials },
}
</script>