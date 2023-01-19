<template>
  <section class="faq-section padding-bot pt-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div id="accordion">
            <div v-for="faq in FAQs" class="card">
              <div class="card-header" :id="'heading' + faq.id">
                <h5 class="mb-0">
                  <div class="btn btn-link d-flex gap-3 align-items-center" data-toggle="collapse" :data-target="'#faq' + faq.id" aria-expanded="true" :aria-controls="'#faq' + faq.id">
                    <i class="fas fa-angle-down"></i>
                    <p style="font-weight:bold;">{{ faq.ques }}</p>
                  </div>
                </h5>
              </div>
          
              <div :id="'faq' + faq.id" class="collapse" :aria-labelledby="'heading' + faq.id" data-parent="#accordion">
                <div class="card-body" style="white-space:pre-line;">{{faq.ans}}</div>
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
  background:#F2F8F0;
  text-align: left;
}
.card-header p{
margin-bottom:0;
padding-top:15px;
padding-bottom:15px;
text-transform:initial;
}
.btn{
  background:#F2F8F0;
  box-shadow:none;
  text-align: left;
  color:black;

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
          ques:"How do I book a service?",
          ans:"If you already register with ODealsPro. You can choose any service that you prefer and book for the services. If you cannot book the services, please contact our service team via LINE (LINE account: odeals.th)"
        },
        {
          id:2,
          ques:"I already booked services, why I haven't received a booking confirmation?",
          ans:"i.	Pay with Credit/Debit Card, Promptpay, you will receive a confirmation instantly after you completed a payment. \n \n ii.	Pay with Internet Banking or Mobile Banking, you will receive a confirmation within 1 hour after you completed a payment."
        },
        {
          id:3,
          ques:"When do I get a confirmation email?",
          ans:"You will receive an instant confirmation email that gives you the details of your booking. If you have not received your booking confirmation email, please check your SPAM folder, if you still cannot find it, please contact us and we will re-send the confirmation to you."
        },
        {
          id:4,
          ques:"Where can I check my booking detail and status?",
          ans:"You can check via your email that you provide during register ODelas account. Or you can check in your ODealsPro profile under “My Booking”. You will also be able to see all the appointments you have made under this tab."
        },
        {
          id:5,
          ques:"How can I make a change to or cancel existing appointment?",
          ans:"If you need to change a detail of your appointment (date, start time, duration, address, etc) or to cancel it - please reach out to our customer service team via live chat or our Line and we can update your request or appointment for you. \n \n Please note the following change/ cancellation policy: \n  1. If you cancel up to 24 hours before the time of your appointment, there is no charge. \n  2. If you cancel between 3 and 24 hours before your appointment, there is a 50% fee off your service price. \n  3. If you cancel less than 3 hours in advance, you will be charged the full price of the service. \n \n  This cancellation policy is in place to compensate the Service Provider for reserving their time and giving up other opportunities for work. Because we're on-demand, Service Provider lose income if they keep an appointment time open for you without remuneration."
        },

        {
          id:6,
          ques:"How do I know if my booking was cancelled?",
          ans:"You can check in your ODealsPro profile under “My Booking”."
        },
        {
          id:7,
          ques:"Where can I find the cancellation policy?",
          ans:"You can check in our ODelas website under 'Cancellation & Refund Policy' page. "
        },
        {
          id:9,
          ques:"Can I pay by Cash?",
          ans:"No. We receive only Online Payment. "
        },
        {
          id:10,
          ques:"How can I pay ODealsPro Online?",
          ans:"Pay with Credit/Debit Card, Promptpay \n Pay with Internet Banking or Mobile Banking"
        },
        {
          id:11,
          ques:"How long is my Voucher valid for?",
          ans:"You can check in your ODealsPro Profile under 'Voucher'. You will able to see your voucher expired date. "
        },
        {
          id:13,
          ques:"Where do I add my promotional code/discount code?",
          ans:"When you do the booking there will have place to add 'promotion code/discount code'."
        },
        {
          id:14,
          ques:"When and where do I receive a refund?",
          ans:"Please check in our ODelas website under 'Cancellation & Refund Policy' page. "
        },
        {
          id:15,
          ques:"Can I give my reservation/booking to someone else?",
          ans:"Please contact our customer service via LINE."
        },

        {
          id:16,
          ques:"Will I get charged additionally if I move my booking/reservation to a future date?",
          ans:"If you move the booking up to 24 hours before the time of your appointment, there is no charge. "
        },
        {
          id:17,
          ques:"Is it possible to book while I am away from home?",
          ans:"It is depended on what service you choose."
        },
        {
          id:18,
          ques:"Which area does your service cover?",
          ans:"Currently we are available on Bangkok and Pattaya. Later we will expand more city. "
        },
        {
          id:19,
          ques:"What are the timings during which I can book the services?",
          ans:"You can book the service any time."
        },
        {
          id:20,
          ques:"If I want to complain about issues, charges or guidance, what should I do?",
          ans:"You can send email to us or send message to us via LINE."
        },
        {
          id:21,
          ques:"How will I know about new discount offers??",
          ans:"You can check on your ODelas account under “Notification”. "
        },
        {
          id:22,
          ques:"Do I need to do anything before you arrive?",
          ans:"You no need to do anything before our service provider arrive."
        },
      ]
    }
  }
}
</script>
