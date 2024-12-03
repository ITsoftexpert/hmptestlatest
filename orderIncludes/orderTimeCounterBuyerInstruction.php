<?php if ($order_status == "progress" or $order_status == "revision requested" or $order_status == "Extend Time Declined" or $order_status == "Extend Time Accepted") { ?>
  <?php if ($seller_id == $login_seller_id) { ?>
    <h2 class="text-center mt-4" id="countdown-heading">
      This Order Needs To Be Delivered Before This Day/Time:
    </h2>
  <?php } elseif ($buyer_id == $login_seller_id) { ?>
    <h2 class="text-center mt-4" id="countdown-heading">
      Your Order Should Be Ready On or Before This Day/Time:
    </h2>
  <?php } ?>
  <div id="countdown-timer">
    <div class="d-flex">
      <div class="col-lg-3 col-md-3 col-3 px-2 countdown-box">
        <p class="countdown-number style_counter_data" id="days"></p>
        <p class="countdown-title style_counter_data2">Day(s)</p>
      </div>
      <div class="col-lg-3 col-md-3 col-3 px-2 countdown-box">
        <p class="countdown-number style_counter_data" id="hours"></p>
        <p class="countdown-title style_counter_data2">Hours</p>
      </div>
      <div class="col-lg-3 col-md-3 col-3 px-2 countdown-box">
        <p class="countdown-number style_counter_data" id="minutes"></p>
        <p class="countdown-title style_counter_data2">Minutes</p>
      </div>
      <div class="col-lg-3 col-md-3 col-3 px-2 countdown-box">
        <p class="countdown-number style_counter_data" id="seconds"></p>
        <p class="countdown-title style_counter_data2">Seconds</p>
      </div>
    </div>
  </div>
<?php } ?>

<style>
  .style_counter_data {
    border: 2px solid #ebebeb;
    text-align: center;
    margin-bottom: 0px;
    padding: 5px;
    border-radius:5px 5px 0 0;
    font-size: 19px;

  }

  .style_counter_data2 {
    background-color:#00cedc;
    color: white;
    text-align: center;
    margin-bottom: 0px;
    padding: 5px;
    font-size: 19px;
    border-radius:0 0 5px 5px;
  }
</style>