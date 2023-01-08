<template>
  <section class="faq-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div id="accordion">
            <div v-for="faq in FAQs" class="card">
              <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                  <button class="btn btn-link" data-toggle="collapse" :data-target="'#faq' + faq.id" aria-expanded="true" :aria-controls="'#faq' + faq.id">
                     {{ faq.ques }}
                  </button>
                </h5>
              </div>
          
              <div :id="'faq' + faq.id" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                  {{faq.ans}}
                </div>
              </div>
            </div>
            </div>
        </div>
      </div>
    </div>
  </section>
</template>
<style scoped>
.card{
  overflow:hidden;
  border-radius:10px;
  margin-bottom:10px;
}
.card-header{
  padding:0;
  border-radius:0;
  border-bottom:1px solid #eee;
  background:#efefe3;
  text-align: left;
}
.btn{
  background:#efefe3;
  box-shadow:none;

}
.card-body{
  background:#fdfdfd;
}


</style>
<script>
export default{
  data(){
    return{
      FAQs : [
        {
          id:1,
          ques:"1.	How do I Book a service?",
          ans:""
        },
        {
          id:2,
          ques:"2.	I already booked services, why I haven’t received a booking confirmation?",
          ans:""
        },
        {
          id:3,
          ques:"3.	When do I get a confirmation email?",
          ans:""
        },
        {
          id:4,
          ques:"4.	Where can I check my booking detail and status?",
          ans:""
        },
        {
          id:5,
          ques:"5.	How can I make a change to or cancel existing appointment?",
          ans:""
        },

        {
          id:6,
          ques:"6.	How do I know if my booking was cancelled?",
          ans:""
        },
        {
          id:7,
          ques:"7.	Where can I find the cancellation policy?",
          ans:""
        },
        {
          id:8,
          ques:"8.	How can I book a service for multiple people?",
          ans:""
        },
        {
          id:9,
          ques:"9.	Can I pay by Cash?",
          ans:""
        },
        {
          id:10,
          ques:"10.	How can I pay ODeals Online?",
          ans:""
        },
        {
          id:11,
          ques:"11.	How long is my Voucher valid for?",
          ans:""
        },
        {
          id:12,
          ques:"12.	Can you resend the voucher to me? ",
          ans:""
        },
        {
          id:13,
          ques:"13.	Where do I add my promotional code/discount code?",
          ans:""
        },
        {
          id:14,
          ques:"14.	When and where do I receive a refund?",
          ans:""
        },
        {
          id:15,
          ques:"15.	Can I give my reservation/booking to someone else?",
          ans:""
        },

        {
          id:16,
          ques:"16.	Will I get charged additionally if I move my booking/reservation to a future date?",
          ans:""
        },
        {
          id:17,
          ques:"17.	Is it possible to book while I am away from home?",
          ans:""
        },
        {
          id:18,
          ques:"18.	Which area do you service?",
          ans:""
        },
        {
          id:19,
          ques:"19.	What are the timings during which I can book the services?",
          ans:""
        },
        {
          id:20,
          ques:"20.	If I want to complain about issues, charges or guidance, what should I do?",
          ans:""
        },
        {
          id:21,
          ques:"21.	How will I know about new discount offers??",
          ans:""
        },
        {
          id:22,
          ques:"22.	Do I need to do anything before you arrive?",
          ans:""
        },
      ]
    }
  }
}
</script>
