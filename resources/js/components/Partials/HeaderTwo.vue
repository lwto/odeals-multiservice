<template>

  <div class="header-two">
    <div class="header-left">
      <div class="toggle-menu" id="toggle-menu"><i class="fas fa-bars"></i></div>
      <div class="category-menu">
        <router-link :to="{ name: 'category' }"   :class="(currentRouteName === 'category' ? activeRouteClass + ' nav-link' : 'nav-link' )">
          Category
        </router-link>
      </div>
      <div class="service-menu">
        <router-link :to="{ name: 'service' }"   :class="(currentRouteName === 'service' || currentRouteName === 'service-detail' || currentRouteName === 'category-service'  || currentRouteName === 'provider-service' ? activeRouteClass + ' nav-link' : 'nav-link' )">
          Service
        </router-link>
      </div>
      <nav class="nav-menu" id="nav-menu">
        <div class="menu row">
          <div class="about-odeals col-lg-3 col-md-4">
            <h6>Discover ODealsPro</h6>
            <ul>
              <li class="link-item">
                <router-link :to="{ name: 'about-us' }"   :class="(currentRouteName === 'about-us' ? activeRouteClass + ' nav-link' : 'nav-link' )">
                  About us
                </router-link>
              </li>
              <li class="link-item">Why list your service with us</li>
              <li class="link-item">
                <router-link :to="{ name: 'post-service' }"   :class="(currentRouteName === 'post-service' ? activeRouteClass + ' nav-link' : 'nav-link' )">
                  Post free service
                </router-link>
              </li>
            </ul>
          </div>
          <div class="important-links col-lg-3 col-md-4">
            <h6>Important Links</h6>
            <ul>
              <li class="link-item">
                <router-link :to="{ name: 'faq' }"   :class="(currentRouteName === 'faq' ? activeRouteClass + ' nav-link' : 'nav-link' )">
                  FAQs
                </router-link>
              </li>
              <li class="link-item">
                <router-link :to="{ name: 'refund-cancellation-policy' }"   :class="(currentRouteName === 'refund-cancellation-policy' ? activeRouteClass + ' nav-link' : 'nav-link' )">
                  Cancellation & Refund Policy
                </router-link>
              </li>
              <li class="link-item">
                <router-link :to="{ name: 'term-conditions' }"   :class="(currentRouteName === 'term-conditions' ? activeRouteClass + ' nav-link' : 'nav-link' )">
                  Terms & Condition
                </router-link>
              </li>
              <li class="link-item">
                <router-link :to="{ name: 'privacy-policy' }"   :class="(currentRouteName === 'privacy-policy' ? activeRouteClass + ' nav-link' : 'nav-link' )">
                  Privacy Policy
                </router-link>
              </li>
            </ul>
          </div>
          <div class="join col-lg-6 col-md-4">
            <div class="row">
              <div class="col-lg-6">
                <ul>
                  <li class="link-item"  @click="redirectToLogin">Account Sign In/ Sign Up</li>
                  <li class="link-item">
                    <router-link :to="{ name: 'prof-register' }"   :class="(currentRouteName === 'prof-register' ? activeRouteClass + ' nav-link' : 'nav-link' )">
                      Join as a professional
                    </router-link>
                  </li>
                  <li class="link-item">
                    <router-link :to="{ name: 'contact-us' }"   :class="(currentRouteName === 'contact-us' ? activeRouteClass + ' nav-link' : 'nav-link' )">
                      Contact us
                    </router-link>
                  </li>
                </ul>
              </div>
              <div class="col-lg-6">
                <h6>Customer Care</h6>
                <ul>
                  <li class="link-item">
                    <a href="mailto:customer@odealspro.com" class="extra-page-content"><label><i class="fas fa-envelope"></i></label> <span>help@odealspro.com</span> </a> 
                  </li>
                  <li class="link-item">
                    <a class="extra-page-content"><label><i class="fas fa-phone-alt"></i></label> <span>Line ID: odeals.th</span> </a> 
                  </li>
                  <div class="d-flex align-items-center apps">
                    <a class="social"><i class="fab fa-line" style="font-size:1.5rem; margin-right:15px;"></i></a>
                    <a class="social"><i class="fab fa-facebook" style="font-size:1.5rem"></i></a>
                  </div>    
                </ul>
              </div>
            </div>
          </div>
        </div>
      </nav>
      
    </div>
    <div class="header-middle">
      <a href="#" class="navbar-brand">
        <router-link :to="{ name: 'frontend-home' }"  ><img :src="generalsetting.site_logo ? generalsetting.site_logo : baseUrl +'/images/logo.svg'" class="img-fluid logo" alt="logo" /></router-link>
      </a>
    </div>
    <div class="header-right">
      <div class="search">
        <i class="fas fa-search"></i>
      </div>
      <div class="user-menu">
        <i class="fas fa-user"></i>
      </div>
      <div class="quick-booking" v-b-modal.nearlocation>
        <Button class="btn btn-sm">Quick Booking</Button><br/>
      </div>
    </div>
    <b-modal id="nearlocation"  title="Get Nearest Services" header-close-content=" <button type='button' class='btn-close btn-sm' data-bs-dismiss='modal' aria-label='Close'></button>">
      <form class="review-form">
          <p v-if="showofflocation">{{__('messages.location_off')}}</p>
          <p v-else>{{__('messages.location_on')}}</p>
          <div class="row row-cols-2 pt-4">
              <div class="col">
                  <button type="submit" class="btn btn-secondary w-100" @click="$bvModal.hide('nearlocation')">{{__('messages.cancel')}}</button>
              </div>
              <div v-if="showofflocation" class="col">
                  <button type="button" class="btn btn-primary w-100" @click="removeCurrentLocation" >{{__('messages.offlocation')}}</button>
              </div>
              <div v-else class="col">
                  <button type="button" class="btn btn-primary w-100" @click="getServices">{{__('messages.save')}}</button>
              </div>
          </div>
      </form>  
  </b-modal>
  </div>

</template>
<style lang="scss">
ul{
  list-style-type: none;
  padding:0;
  margin:0;
}
.language-switcher{
  border:none;
  outline:none;
  color:gray;
}
.modal{
  top:80px;
}
.header-two{
  
  display:flex;
  align-items: center;
  justify-content:space-between;
  height:80px;
  position:relative;
  z-index: 1000;
  .header-left{
    display:flex;
    align-items:center;
    padding:0 20px;
    column-gap:15px;
    .toggle-menu i{
      color:#000;
      font-size:1.5rem;
      padding:10px 15px;
      background-color: #F2F8F0;
      cursor:pointer;
    }
    .category-menu, .service-menu{
      a{
        color:#042f16;
        padding:0;
        &:hover{
          color:#109848;
        }
        &.active{
          color:#109848;
        }
      }  
    }
    .nav-menu{
        width:100%;
        position:absolute;
        top:80px;
        left:-100%;
        background-color:#fff;
      .menu{
        padding:40px;
        margin:0px !important;
        border-top:1px solid #eee;
        z-index:1000;
        h6{
          padding-bottom:15px;
          color:#042f16;
        }
        .link-item{
          padding-bottom:15px;
          cursor:pointer;
          a{
            color:gray;
            padding:0; 
            &:hover{
              color:#109848;
            }
            &.active{
             color:#109848;
            }
          }
          &:hover{
              color:#109848;
            }
        }
        .social{
          color:#109848;
          cursor:pointer;
        }
      }
      &.active{
        left:0;
      }
    }
  }
  .header-middle{
    display:flex;
    align-items: center;
    justify-content:center;
  }
  .header-right{
    padding:0 20px;
    display:flex;
    column-gap:25px;
    align-items: center;
    justify-content:end;
    .search, .user-menu{
      font-size:1.45rem;
      color:#042f16;
      cursor:pointer;
      &:hover{
        color:#109848;
      }
    }
    .btn{
      color:#fff;
      background:#109848;
    }
  } 
}
</style>
<script>
import { mapGetters } from "vuex";
export default {
    data() {
        return { 
          baseUrl: window.baseUrl,
          activeRouteClass: "active",
          serviceList: [],
          show: false,
          componentKey: 0,
          showclass: "",
          showofflocation: false,
          is_location_on: false,
        };
    },
    computed: {
        ...mapGetters(["isLogged", "userData", "generalsetting"]),
        currentRouteName() {
            return this.$route.name;
        },
    },
    mounted() {

      //Menu toggle
      jQuery("#toggle-menu").on("click", function () {
        jQuery("#nav-menu").toggleClass("active");
      });

      //Remove menu 
      const navLink = document.querySelectorAll('.link-item');
      function linkAction() {
        jQuery("#nav-menu").removeClass('active');
      }
      navLink.forEach(n => n.addEventListener('click', linkAction));

      // Change background header
      function scrollHeader() {
          const header = document.querySelector('.header-two');
          // when the scroll is greater than 100 viewport height,add the scroll-header classto the header tag
          if (this.scrollY >= 100) header.classList.add('scroll-header');
          else header.classList.remove('scroll-header');
      }
      window.addEventListener('scroll', scrollHeader);
      
      //location service
      document.addEventListener("click", this.close);
        this.is_location_on = localStorage.getItem("is_location_on");
    },

  methods: {
        redirectToLogin(){
          window.location.href = baseUrl + "/login";
        },
        close(e) {
          if (!this.$el.contains(e.target)) {
              this.dropdownClass = false;
          }
        },
        forceRerender() {
            this.componentKey += 1;
        },
        getServices() {
            navigator.geolocation.getCurrentPosition((position) => {
                localStorage.setItem(
                    "location_current_lat",
                    position.coords.latitude
                );
                localStorage.setItem(
                    "location_current_long",
                    position.coords.longitude
                );
                localStorage.setItem("is_location_on", "on");
                this.$router.push({ name: "service" });
                this.showofflocation = true;
            });
            this.$bvModal.hide("nearlocation");
        },
        getServiceList() {
            var params = {
                per_page: "all",
            };
            get("service-list", {
                params: params,
            }).then((response) => {
                if (this.keyword) {
                    this.show = false;
                    this.serviceList = response.data.data.filter((service) =>
                        service.name
                            .toLowerCase()
                            .includes(this.keyword.toLowerCase().split(" "))
                    );
                    if (this.serviceList.length == 0) {
                        this.serviceList = [];
                        this.show = true;
                    }
                } else {
                    this.show = true;
                    this.forceRerender();
                }
            });
        },
        removeCurrentLocation() {
            window.location.reload();
            var params = {
                per_page: "all",
            };
            get("service-list", {
                params: params,
            }).then((response) => {
                this.serviceList = response.data.data;
                this.forceRerender();
            });
            localStorage.removeItem("location_current_lat");
            localStorage.removeItem("location_current_long");
            localStorage.removeItem("is_location_on");
        }, 
  }
  
}
</script>