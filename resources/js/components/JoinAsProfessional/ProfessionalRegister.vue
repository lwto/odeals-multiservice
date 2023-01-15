<template>
  <section class="professional-register padding-top padding-bot">
    <div class="row d-flex justify-content-center">
      <div class="col-lg-6 col-sm-8">
          <h3 class="text-center ">Join us as Our Service Provider</h3>
          <div class="d-flex justify-content-center align-items-center"> 
              <a @click="redirectToFreelance" class="btn freelance">Sign up as Freelancer</a>
              <a @click="redirectToCompany" class="btn company">Sign up as Company</a>
            
          </div>
         
      </div>
      
  </div>
  </section>
</template>
<style scoped>
.freelance,.company{
  margin-top:40px;
  font-size:17px;
  font-weight:500;
}
.company{
  margin-left:15px;
  color:#fff;
  background:#109848;
}
.freelance{
  background:#e3faec;
  color:#000;
}
.btn{
  text-transform: initial;
}
</style>

<script>

export default {
 
  data() {
      return {
          baseUrl: window.baseUrl,

      };
  }, 
  methods: {
      redirectToFreelance(){
          window.location.href = baseUrl + "/register-freelance";
      },
      redirectToCompany(){
          window.location.href = baseUrl + "/register-company";
      },
      
  },
};
</script>


