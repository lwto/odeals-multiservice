<template>
  <section class="cards mt-4">
    <div class="container">
      <h5>MY CARDS</h5>
      <p class="mt-1">You do not have stored credit cards yet. You can tick box to store card when purchase service online.</p>
      <div class="row justify-content-center mt-5">
        <div class="col-lg-6 col-md-8">
          <div class="card-form">
            <h6 class="mb-2">Card Details</h6>
            <form>
              <div class="form-group">
                <label for="cardNumber">Card Number</label>
                <input type="text" class="form-control" id="cardNumber" placeholder="Card Number" required>
              </div>
              <div class="form-group">
                <label for="holderName">Card Holders Name</label>
                <input type="text" class="form-control" id="holderName" placeholder="Name" required>
              </div>
              <p class="mb-0">Expiry Date</p>
              <div class="row">
                <div class="form-group col-md-6">
                  <input type="text" class="form-control" id="day" placeholder="09" required>
                </div>
                <div class="form-group col-md-6">
                  <input type="text" class="form-control" id="year" placeholder="2024" required>
                </div>
              </div>
              <div class="form-group">
                <label for="cvv">3 digit CVV</label>
                <input type="text" class="form-control" id="cvv" placeholder="CVV" required>
              </div>
              <div class="form-check mt-3">
                <input type="checkbox" class="form-check-input" id="saveCard">
                <label class="form-check-label" for="saveCard">Save card for future usage?</label>
              </div>
              <button type="submit" class="btn btn-primary mt-3">Save</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  
  </section>
  </template>
  <style scoped>
  .card-form {
    background:#f2f8f0;
    padding:24px 20px;
    width:100%;
    border-radius:6px;
  }
  
  </style>
  <script>
 
  </script>