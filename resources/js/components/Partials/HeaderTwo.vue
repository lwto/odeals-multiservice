<template>
  <div class="header-two">
    <!-------- Header Top Language ------->
    <div class="top-header">
        <a href="" class="lang">EN</a>
        <a href="" class="lang">ไทย</a>
        <a href="" class="lang">中文</a>
        <a href="" class="lang">မြန်မာ</a>
    </div>
    <!-------- Header ------->
    <div class="header">
      <!-------- Header Left ------->
      <div class="header-left col-lg-5">
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
        <div class="join-us">
          <router-link :to="{ name: 'prof-register' }"   :class="(currentRouteName === 'prof-register' ? activeRouteClass + ' nav-link' : 'nav-link' )">
            Join as Partner
          </router-link>
        </div>
        <!-------- Nav Menu ------->
        <nav class="nav-menu" id="nav-menu">
          <!-------- Desktop Menu ------->
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
                    <li class="link-item">
                      <router-link :to="{ name: 'faq' }"   :class="(currentRouteName === 'faq' ? activeRouteClass + ' nav-link' : 'nav-link' )">
                        FAQs
                      </router-link>
                    </li>    
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
                <div class="col-lg-6 customer-care">
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
          <!-------- Mobile Menu ------->
          <div class="mobile-menu">
            <div class="d-flex gap-2 align-items-center mb-2 btn-gp">
              <router-link :to="{ name: 'category' }" class="btn-mobile" >
                Home
              </router-link>
              <router-link :to="{ name: 'prof-register' }" class="btn-mobile"  >
                Join as a professional
              </router-link>
            </div>
            <div class="d-flex gap-2 align-items-center mb-3 btn-gp">
              <router-link :to="{ name: 'category' }" class="btn-mobile">
                Category
              </router-link>
              <router-link :to="{ name: 'service' }" class="btn-mobile" >
                Service
              </router-link>
            </div>
            <div id="accordion">
              <div class="card">
                <div class="card-header" id="headingOne">
                  <h6 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#about" aria-expanded="true" aria-controls="collapseOne">
                      Discover more about ODeals Pro
                    </button>
                  </h6>
                </div>
            
                <div id="about" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                  <div class="card-body">
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
                      <li class="link-item">
                        <router-link :to="{ name: 'faq' }"   :class="(currentRouteName === 'faq' ? activeRouteClass + ' nav-link' : 'nav-link' )">
                          FAQs
                        </router-link>
                      </li> 
                    </ul>
                  </div>
                </div>
              </div>
              <div class="card mt-2">
                <div class="card-header" id="headingTwo">
                  <h6 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      Important links
                    </button>
                  </h6>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                  <div class="card-body">
                    <ul>
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
                </div>
              </div>
              <div class="card mt-2">
                <div class="card-header" id="headingThree">
                  <h6 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      Customer Care
                    </button>
                  </h6>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                  <div class="card-body">
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
          </div>
        </nav>
        
      </div>
      <!-------- Brand Logo ------->
      <div class="header-middle col-lg-2">
        <a href="#" class="navbar-brand">
          <router-link :to="{ name: 'frontend-home' }"  ><img :src="generalsetting.site_logo ? generalsetting.site_logo : baseUrl +'/images/logo.svg'" class="img-fluid logo" alt="logo" /></router-link>
        </a>
      </div>
      <!-------- Header Right Side -------->
      <div class="header-right col-lg-5">
        <!-------- Search ------->
        <div class="search">
          <!-- Search Large Device -->
          <div class="input-group search-text search-device-lg" style="width: auto;">
            <input type="text" placeholder="Search" class="form-control nav-item dropdown search-input" id="search" @keyup="getServiceList" v-model="keyword"  data-bs-toggle="dropdown" aria-expanded="false"> 
            <svg width="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="search-icon">
              <circle cx="11.7669" cy="11.7666" r="8.98856" stroke="currentcolor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></circle>
              <path d="M18.0186 18.4851L21.5426 22" stroke="currentcolor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>            
          <ul :class="`dropdown-menu dropdown-menu-end user-dropdown ${keyword.length > 0 ? 'show' : ''}`" aria-labelledby="dropdownMenuButton1" class="search-list">
              <li>
                <div v-if="serviceList.length > 0 && !show" class="searchbox-datalink global-search-result show-data" :key="componentKey">
                  <ul class="iq-post p-3">
                      <div>
                        <li v-for="service in serviceList" :key="service.id" class="mr-0 pb-0 d-block" @click="removeInput">
                            <router-link
                            :to="{
                                name: 'service-detail',
                                params: { service_id: service.id },
                            }"
                            > 
                              <p>{{service.name}}</p>
                            </router-link>
                        </li>
                      </div>
                  </ul>
                </div>
              </li>
              <li>
                <div  v-if="show && serviceList.length == 0" class="searchbox-datalink global-search-result show-data" >
                  <ul class="iq-post">
                      <div>
                          {{__('messages.record_not_found')}}
                      </div>
                  </ul>
                </div>
              </li>
            </ul>
          </div>

          <!-- Search Small Device -->
          <div class="search-text position-relative search-device-sm cursor-pointer">
            <i class="fas fa-search s-icon"></i>
            <div class="search-content">
                <form>
                    <div class="input-group  mb-0">
                        <input type="text" placeholder="Search" id="search" class="form-control" @keyup="getServiceList" v-model="keyword" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg width="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="search-icon">
                            <circle cx="11.7669" cy="11.7666" r="8.98856" stroke="currentcolor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></circle>
                            <path d="M18.0186 18.4851L21.5426 22" stroke="currentcolor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        <ul :class="`search-list dropdown-menu dropdown-menu-end user-dropdown ${keyword.length > 0 ? 'show' : ''}`" aria-labelledby="dropdownMenuButton1">
                        <li>
                        <div v-if="serviceList.length > 0 && !show" class="searchbox-datalink global-search-result show-data" :key="componentKey">
                            <ul class="iq-post p-3">
                                <div>
                                <li v-for="service in serviceList" :key="service.id" class="mr-0 mb-3 pb-0 d-block" @click="removeInput">
                                    <router-link 
                                    :to="{
                                        name: 'service-detail',
                                        params: { service_id: service.id },
                                    }"
                                    >
                                      <p>{{service.name}}</p>
                                    </router-link>
                                </li>
                                </div>
                            </ul>
                        </div>
                        </li>
                        <li>
                        <div  v-if="show && serviceList.length == 0" class="searchbox-datalink global-search-result show-data" >
                            <ul class="iq-post">
                                <div>
                                    {{__('messages.record_not_found')}}
                                </div>
                            </ul>
                        </div>
                        </li>
                        </ul>
                    </div>
                </form>
            </div>
        </div>
        </div>
        <!-------- User Login/Register ------->
        <div class="user-btn position-relative">
          <div class="user-menu" id="user-menu">
            <i class="fas fa-user"></i>
          </div>
          <div id="user-menu-dropdown">
            <ul class="list-unstyled mb-0">
                <li v-if="!isLogged" v-b-modal="'my-modal1'" class="list-link"><a  href="#">{{__('messages.register')}}</a></li>
                <li  v-if="!isLogged" @click="login" class="list-link"><a  href="#">{{__('messages.login')}}</a></li>
                <li  v-if="!isLogged" class="list-link">
                  <router-link :to="{ name: 'prof-register' }">
                    Join as Partner
                  </router-link>
                </li>
                <li v-if="isLogged">
                    <a href="#" class="dropdown-item" @click="getHomePage()"
                    >{{__('messages.dashboard')}}</a
                    >
                </li>
                <li v-if="isLogged">
                    <a href="#" class="dropdown-item" @click="logout"
                    >{{__('messages.logout')}}</a
                    >
                </li>
            </ul>       
          </div>
        </div>
        <div v-if="isLogged" class="user-booking">
            <router-link :to="{ name: 'booking' }" class="btn btn-sm">
              {{__('messages.booking')}}
            </router-link>
        </div>
        <div v-else class="quick-booking" v-b-modal.nearlocation>
          <Button class="btn btn-sm">Booking</Button><br/>
        </div>
      </div>

      <!-------- Near Location Modal ------->
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
    <login-component ref="openModal" />
    <Register />
    </div>
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
.top-header{
  display:flex;
  padding:10px 15px;
  column-gap:15px;
  justify-content:right;
  background:#109848;
  transition: all 0.5s ease-out;
  .lang{
    color:#F2F8F0;
    font-size:15px;
    &:hover{
      color:#fff;
    }
  }
}
.header{
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
    .category-menu, .service-menu, .join-us{
      a{
        font-weight:500;
        color:#000;
        padding:0;
        font-size:17px;
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
        transition: all 0.8s ease-out;
      .menu{
        padding:40px;
        margin:0px !important;
        border-top:1px solid #eee;
        z-index:1000;
        h6{
          padding-bottom:15px;
          color:#042f16;
        }
      }
      &.active{
        left:0;
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
      .mobile-menu{
        border-top:1px solid #eee;
        display:none;
        padding:20px;
        .btn-mobile{
          text-transform:initial;
          border:1px solid #109848;
          width:50%;
          text-align:center;
          color:black;
          padding:10px;
          border-radius:10px;
          &:hover{
            color:white;
            background:#109848;
          }
        }
        .card{
          overflow:hidden;
          border-radius:10px;
          margin-bottom:10px;
        }
        .card-header{
          padding:0;
          border-radius:0;
          background:#F2F8F0;
          text-align: left;
        }
        .card-header h6{
        margin-bottom:0;
        .btn{
          background:#F2F8F0;
          box-shadow:none;
          text-align: left;
          color:black;
          width:100%;
          text-transform:none;
        }
        }
        
        
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
    column-gap:15px;
    align-items: center;
    justify-content:end;
    .search, .user-menu{
      font-size:1.45rem;
      color:#042f16;
      &:hover{
        color:#109848;
      }
    }
    .btn{
      color:#fff;
      background:#109848;
    }
    .search{
      .search-input{
        background:transparent;
        font-size:1rem;
        outline:none;
        border:1px solid #F2F8F0;
        color:#042f16;
        height:2.3rem;
      }
      .search-list{
        margin-top:40px;
        a{
          color:gray;
          &:hover{
            color:#042f16;
          }
        }
      }
    }
    .user-menu{
      background:#F2F8F0;
      padding:0px 13px;
      cursor:pointer;
      border-radius:4px;
    }
    #user-menu-dropdown{
        top:45px;
    }
  } 
}
.search-device-sm {
  display: none;
}
@media (max-width: 1200px){
  .search-device-lg{
    display:none;
  }
  .search-device-sm {
      display: block;
      height: 40px;
      line-height: 40px;
      text-align: center;
      width: 40px;
      cursor:pointer;
     .s-icon{
      background:#F2F8F0;
      padding:9px 12px;
      border-radius:4px;
     }

      .search-content {
        left: auto;
        margin: auto;
        opacity: 0;
        pointer-events: none;
        position: absolute;
        right: 0;
        top: 40px;
        transition: opacity .5s ease-in-out;
        visibility: hidden;
        width: 300px;
        z-index: 999;
        input {
          border-radius: 0!important;
          height: 50px;
        }
        .search-list{
          margin-top:50px !important;
        }
      }
    }
  .search-device-sm.search-open .search-content {
    opacity: 1;
    pointer-events: auto;
    visibility: visible;
  }
}
@media (max-width: 992px){
  .header{
    .header-left{
      .category-menu, .service-menu, .join-us,.customer-care{
        display:none;
      }
    }
    .header-right{
      flex-grow:1;
    }
    .header-left{
      .nav-menu{
        min-height:100vh;
        .menu{
          display:none;
        }
        .mobile-menu{
          display:block;
        }
      }
    }
  }
}
@media (max-width: 576px) {
  .quick-booking, .user-booking{
    display:none;
  }
  .btn-gp{
    flex-direction:column;
    .btn-mobile{
      width:100% !important;
    }
  }
}
@media (max-width: 300px) {
  .top-header{
    column-gap:10px;   
    .lang{
      font-size:13px;
    }
  }
  .header{
    .header-left{
      padding:0 15px 0px 10px;
      .toggle-menu i{
        font-size:1.2rem;
        padding:8px 12px;
      } 
  }
  .header-right{
    padding:0 15px;
    column-gap:10px;
    .search, .user-menu{
      font-size:1rem;
    }
  }
}
}
</style>
<script>
import { mapGetters } from "vuex";
import { get } from "../../request";
import Register from '../../views/Auth/Register.vue';
export default {
  components: { Register },
    data() {
        return { 
          searchdropdownClass: false,
          baseUrl: window.baseUrl,
          activeRouteClass: "active",
          keyword: "",
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
      //search btn
      jQuery(".search-device-sm .s-icon").on("click", function (e) {
            jQuery(".search-device-sm").toggleClass("search-open");
        });
      jQuery(document).on("click", function (e) {
          if (
              !(
                  jQuery(e.target).is(".search-device-sm .form-control") ||
                  jQuery(e.target).is(".search-device-sm .s-icon") ||
                  jQuery(e.target).is(".search-device-sm")
              )
          ) {
                jQuery(".search-device-sm").removeClass("search-open");
          }

         if (e.target.parentElement.id == "user-menu") {
              jQuery("#user-menu-dropdown").toggleClass("user-menu-open");
          } else {
              jQuery("#user-menu-dropdown").removeClass("user-menu-open");
          }
      });
      
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
          const headerTop = document.querySelector('.top-header');
          // when the scroll is greater than 100 viewport height,add the scroll-header classto the header tag
          if (this.scrollY >= 100) {
            header.classList.add('scroll-header');
            headerTop.classList.add('scroll-header');
          }
          else {
            header.classList.remove('scroll-header');
            headerTop.classList.remove('scroll-header');
          }

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
        openDropdown() {
            this.dropdownClass = !this.dropdownClass;
        },
        logout() {
            this.$store.dispatch("logout");
        },
        getHomePage() {
            window.location.href = baseUrl + "/home";
        },
        login() {
            this.$refs.openModal.show();
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
        removeInput(){
          this.keyword = "";
          document.getElementById("search").value = " ";
        }
  }
  
}
</script>