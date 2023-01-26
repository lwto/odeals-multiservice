<template>
    <div>
        <!-- <promo-banner/> -->
        <banner-two/>
        <apps-banner/>
        <category-two/>
        <featured-services-two/>
        <ads-section/>
        <offer/>
        <house-services/>
        <wellbeing-services/>
        <Provider/>
        
        <!-- 
        <category/>
        <service/>
        <price/>
        <customer-rating/>
        <app/>
        <featured-service/>
        <provider/> -->
    </div>
</template>
<script>
import { mapGetters } from "vuex";
import App from '../../components/LandingPage/App.vue'
import HouseServices from '../../components/LandingPage/HouseServices.vue'
import WellbeingServices from '../../components/LandingPage/WellbeingServices.vue'
import Banner from '../../components/LandingPage/Banner.vue'
import Category from '../../components/LandingPage/Category.vue'
import CustomerRating from '../../components/LandingPage/CustomerRating.vue'
import FeaturedService from '../../components/LandingPage/FeaturedService.vue'
import Offer from '../../components/LandingPage/Offer.vue'
import Provider from '../../components/LandingPage/Provider.vue'
import Service from '../../components/LandingPage/Service.vue'
import PromoBanner from '../../components/LandingPage/promoBanner.vue'
import AdsSection from '../../components/LandingPage/AdsSection.vue'
import BannerTwo from '../../components/LandingPage/BannerDesignTwo.vue'
import CategoryTwo from '../../components/LandingPage/CategoryTwo.vue'
import FeaturedServicesTwo from '../../components/LandingPage/FeaturedServicesTwo.vue'
import AppsBanner from '../../components/LandingPage/AppsBanner.vue'



export default {
    name:'LandingPage',
    components: { 
        WellbeingServices,
        HouseServices,
        CategoryTwo,
        AppsBanner,
        FeaturedServicesTwo,
        PromoBanner, 
        BannerTwo,
        Banner, 
        AdsSection, 
        Category,
        Service, 
        Offer, 
        CustomerRating, 
        App, 
        FeaturedService, 
        Provider,
     },
    mounted(){
        this.$store.dispatch('dashboardData');
    },
    computed: {
        ...mapGetters(["customerreview"]),
    },
}
</script>
