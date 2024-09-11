<div class="box" align="center">
  <div class="container" style="max-width: 632px;margin: 0 auto;">
    <div class="row bg-white o_sans" style="padding-top: 0px; padding-bottom: 35px;">

      <div class="icon-container">
        <div class="icon" align="center" style="background-color: #ffffff; border:2px solid black;">
          <img src="<?= img_url("aprove-check-icon.png"); ?>" width="48" height="48">
        </div>
      </div>

      <h2 class="o_heading">Proposal Approved </h2>

      <p class="text-muted">Congratulations, your proposal has been approved and is now public for everyone in the community to see. Good sales!</p>

      <div class="btn btn-green o_heading o_text" style="background-color: <?= $site_color;?>; width: 200px;">
        <a class="o_text-primary" href='<?= $site_url; ?>/proposals/<?= $data['user_name']; ?>/<?= $data['proposal_url']; ?>' style=" padding-left: 12px; padding-right: 12px;">
          See More Details
        </a>
      </div>

    </div>
  </div>
</div>