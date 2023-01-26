<template>
<section class="vouchers mt-4">
  <div class="container">
    <h5>MY VOUCHERS</h5>
    <div class="row mt-5">
      <div class="col-lg-12">
        <ul class="tabs">
          <li data-tab-target="#active" class="active tab border-right">Active Vouchers</li>
          <li data-tab-target="#past" class="tab">Past Vouchers</li>
        </ul>
    
        <div class="tab-content">
          <div id="active" data-tab-content class="active">
            <div class="mt-3 voucher d-flex justify-content-between p-3">
              <p class="w-20">BLACKFRIDAY</p>
              <p class="w-20">50%</p>
              <p class="w-40">All Services</p>
              <p class="w-20 text-success">active</p>
            </div>
          </div>
          <div id="past" data-tab-content>
            <div class="mt-3 d-flex voucher justify-content-between p-3">
              <p class="w-20">LUCKY10</p>
              <p class="w-20">10%</p>
              <p class="w-40">All Services</p>
              <p class="w-20 text-danger">expired</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</section>
</template>
<style scoped>
.vouchers{
  min-height:50vh;
}
.voucher{
  background:#f2f8f0;
}
[data-tab-content] {
  display: none;
}

.active[data-tab-content] {
  display: block;
}

p{
  margin-bottom: 0;
  color:black;
}
.tabs {
  width:100%;
  display: flex;
  justify-content: space-around;
  list-style-type: none;
  margin: 0;
  padding: 0;
  border-bottom: 1px solid #eee;
  
}

.tab {
    padding:10px 0;
    text-align:center;
    cursor: pointer;
    width:50%;
}

.tab.active {
  background-color: #109848;
  color:white;
}

@media screen and (max-width: 426px) {
  p{
    font-size:12px;

  }
  .voucher{
    flex-wrap:wrap;
  }
}

</style>
<script>
export default{
  mounted(){
    const tabs = document.querySelectorAll('[data-tab-target]')
    const tabContents = document.querySelectorAll('[data-tab-content]')

    tabs.forEach(tab => {
      tab.addEventListener('click', () => {
        const target = document.querySelector(tab.dataset.tabTarget)
        tabContents.forEach(tabContent => {
          tabContent.classList.remove('active')
        })
        tabs.forEach(tab => {
          tab.classList.remove('active')
        })
        tab.classList.add('active')
        target.classList.add('active')
      })
    })  
  }
}
</script>