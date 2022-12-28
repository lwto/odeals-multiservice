<template>
    <div>
        <breadcrumb :sectionName="this.$route.meta.label" :homeName="this.$route.meta.homeName" />
        <div class="container mar-top mar-bot terms-content">        
            <div v-if="help_support && help_support.value != null "  v-html="help_support.value">
            </div>  
            <div v-else>
                <img :src="baseUrl+'/images/frontend/data_not_found.png'"  class="datanotfound" />
            </div>               
        </div>
    </div>
</template>
<script>
import { mapGetters } from "vuex";
export default {
    name:'TermsConditions',
    data() {
        return {
            baseUrl:window.baseUrl
        }
    },
    computed: {
        ...mapGetters(['help_support',]),
    }
}
</script>