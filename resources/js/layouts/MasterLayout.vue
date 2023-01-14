<template>
    <div>
        <div class="loading">
            <loader/>
        </div>
        <main class="main-content">
            <div class="position-relative">
                <header>
                   <!-- <Header/> -->
                   <HeaderTwo/>
                </header>
            </div>
            <div class="container-fluid content-inner p-0" style="margin-top:126.25px;">
                <router-view></router-view>
            </div>
            <Footer/>
        </main>
    </div>
</template>
<script>
import Loader from "../components/Partials/Loader";
import Header from "../components/Partials/Header";
import Footer from '../components/Partials/Footer';
import HeaderTwo from "../components/Partials/HeaderTwo.vue";
export  default {
    name:'MasterLayout',
    components: {Header, Loader,Footer, HeaderTwo}
}
</script>

