<div class="box" align="center">
  <div class="container" style="max-width: 632px;margin: 0 auto;">
    <div class="row bg-white o_sans" style="padding-top: 0px; padding-bottom: 24px;">
      <div class="icon-container">
        <div class="icon" align="center" style="border:2px solid black; padding:18px;">
          <img src="<?= img_url("aprove-check-icon.png"); ?>" width="48" height="48">
        </div>
      </div>
      <h2 class="o_heading">Buyer Request Approved</h2>
      <p class="text-muted">Congratulations, your buyer request has been approved. You can now proceed with the details and respond accordingly. Best of luck with your sale!</p>
      <div class="btn btn-green o_heading o_text" style="background-color: <?= $site_color;?>; width:180px;">
        <a class="o_text-primary" href='<?= $site_url; ?>/<?= $data['request_url']; ?>'>
          See More Details
        </a>
      </div>
    </div>
  </div>
</div>
