<template>
    <div>
        <breadcrumb :sectionName="this.$route.meta.label" :homeName="this.$route.meta.homeName" />
        <section-one/>
        <slogan/>
        <price/>
        <section-four/>
        <!-- <section-two  :data="jsonData.sectionTwo"/>-->
        <!-- <section-five :data="jsonData.sectionFive"/> -->
        <section-six/>
    </div>
</template>
<script>
import SectionFive from '../../components/Aboutus/SectionFive.vue'
import SectionFour from '../../components/Aboutus/SectionFour.vue'
import SectionSix from '../../components/Aboutus/SectionSix.vue'
import SectionTwo from '../../components/Aboutus/SectionTwo.vue'
import Slogan from '../../components/Aboutus/Slogan.vue'
import SectionOne from '../../components/Aboutus/SectionOne.vue'
import Price from '../../components/Aboutus/Price.vue'

export default {
    name:'About',
    data(){
        return{
            baseUrl: window.baseUrl
        }
    },
    components: { SectionTwo, SectionFour, SectionFive, SectionSix, Slogan, SectionOne, Price },
}
</script>