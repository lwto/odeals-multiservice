<template>
    <div>
        <promo-banner/>
        <banner/>
        <ads-section/>
        <category/>
        <service/>
        <offer/>
        <price/>
        <customer-rating/>
        <app/>
        <featured-service/>
        <provider/>
    </div>
</template>
<script>
import { mapGetters } from "vuex";
import App from '../../components/LandingPage/App.vue'
import Banner from '../../components/LandingPage/Banner.vue'
import Category from '../../components/LandingPage/Category.vue'
import CustomerRating from '../../components/LandingPage/CustomerRating.vue'
import FeaturedService from '../../components/LandingPage/FeaturedService.vue'
import Offer from '../../components/LandingPage/Offer.vue'
import Provider from '../../components/LandingPage/Provider.vue'
import Service from '../../components/LandingPage/Service.vue'
import PromoBanner from '../../components/LandingPage/promoBanner.vue'
import AdsSection from '../../components/LandingPage/AdsSection.vue'
import Price from '../../components/LandingPage/Price.vue'

export default {
    name:'LandingPage',
    components: { PromoBanner, Banner, AdsSection, Category,Service, Offer, Price, CustomerRating, App, FeaturedService, Provider },
    mounted(){
        this.$store.dispatch('dashboardData');
    },
    computed: {
        ...mapGetters(["customerreview"]),
    },
}
</script>
