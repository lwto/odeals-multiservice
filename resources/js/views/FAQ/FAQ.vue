<template>
  <div>
      <breadcrumb :sectionName="this.$route.meta.label" :homeName="this.$route.meta.homeName" />
      <faq-section/>
  </div>
</template>
<script>
import FaqSection from '../../components/FAQ/Faq.vue'
export default {
  components: { FaqSection },
  
}
</script>