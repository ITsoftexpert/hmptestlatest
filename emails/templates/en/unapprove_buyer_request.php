<div class="box" align="center">
  <div class="container" style="max-width: 632px; margin: 0 auto;">
    <div class="row bg-white o_sans" style="padding-top: 0px; padding-bottom: 24px;">
      <div class="icon-container">
        <div class="icon" align="center" style="border:2px solid black; padding:18px;">
          <img src="<?= img_url("decline-process-icon.png"); ?>" width="48" height="48">
        </div>
      </div>
      <h2 class="o_heading">Buyer Request Unapproved</h2>
      <p class="text-muted">Unfortunately, your buyer request has been unapproved. Please review the requirements and make the necessary adjustments to submit again. If you have any questions, feel free to contact support.</p>
      <div class="btn btn-red o_heading o_text" style="background-color: <?= $site_color;?>; width:250px;">
        <a class="o_text-primary" href='<?= $site_url; ?>/<?= $data['request_url']; ?>'>
          Edit and Resubmit Request
        </a>
      </div>
    </div>
  </div>
</div>
