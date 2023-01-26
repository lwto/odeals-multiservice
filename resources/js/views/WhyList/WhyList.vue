<template>
  <div>
    <breadcrumb :sectionName="this.$route.meta.label" :homeName="this.$route.meta.homeName" />
    <SectionOne/>
    <SectionTwo/>
    <SectionThree/>
    <!-- <AdsBanner/> -->
    <SectionFour/>
  </div>
</template>
<script>
import SectionOne from '../../components/WhyList/SectionOne.vue'
import SectionTwo from '../../components/WhyList/SectionTwo.vue'
import SectionThree from '../../components/WhyList/SectionThree.vue'
import AdsBanner from '../../components/AdsBanner/promoImgBanner.vue'
import SectionFour from '../../components/WhyList/SectionFour.vue'

export default {
  components: { SectionOne, SectionTwo, SectionThree,AdsBanner,SectionFour },
}
</script>