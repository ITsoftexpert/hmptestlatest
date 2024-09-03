<?php
$select_seller = $db->select("sellers", array("seller_user_name" => $get_seller_user_name));
$row_seller = $select_seller->fetch();
$seller_id = $row_seller->seller_id;
$seller_user_name = $row_seller->seller_user_name;
$seller_image = getImageUrl2("sellers", "seller_image", $row_seller->seller_image);
$seller_cover_image = $row_seller->seller_cover_image;


if (empty($seller_cover_image)) {
  $seller_cover_image = "images/user-background.jpg";
} else {
  $seller_cover_image = getImageUrl2("sellers", "seller_cover_image", $seller_cover_image);
}
$seller_country = $row_seller->seller_country;
$seller_headline = $row_seller->seller_headline;
$seller_about = $row_seller->seller_about;
$seller_skills = $row_seller->skills;
$seller_level = $row_seller->seller_level;
$seller_rating = $row_seller->seller_rating;
$seller_register_date = $row_seller->seller_register_date;
$seller_recent_delivery = $row_seller->seller_recent_delivery;

$seller_status = $row_seller->seller_status;
$select_buyer_reviews = $db->select("buyer_reviews", array("review_seller_id" => $seller_id));
$count_reviews = $select_buyer_reviews->rowCount();


if (!$count_reviews == 0) {
  $rattings = array();
  while ($row_buyer_reviews = $select_buyer_reviews->fetch()) {
    $buyer_rating = $row_buyer_reviews->buyer_rating;
    array_push($rattings, $buyer_rating);
  }
  $total = array_sum($rattings);
  @$average = $total / count($rattings);
  $average_rating = substr($average, 0, 1);
} else {
  $average = "0";
  $average_rating = "0";
}

$level_title = $db->select("seller_levels_meta", ["level_id" => $seller_level, "language_id" => $siteLanguage])->fetch()->title;
$count_proposals = $db->count("proposals", ["proposal_seller_id" => $seller_id, "proposal_status" => 'active']);

if (isset($login_seller_id)) {
  $follow_data = $db->select('follow_following_unfllow', array('followed_id' => $seller_id, 'follower_id' => $login_seller_id, 'status' => 'active'));
  $follow_tbl_data = $follow_data->fetch();
}
// print("<pre>" . print_r($follow_tbl_data, true) . "</pre>");
// exit;
$follow_id = isset($follow_tbl_data) && $follow_tbl_data ? $follow_tbl_data->id : 0;

?>
<style>
  .user-header-mt {
    margin-top: 150px;
  }

  @media screen and (min-width: 1024px) and (max-width: 1100px) {
    .user-header-mt {
      margin-top: 176px;
    }
  }

  @media screen and (max-width: 900px) {
    .user-header-mt {
      margin-top: 173px;
    }
  }
</style>

<div class="container_profile">


  <div class="box_profile box-25">

<?php if (isset($_SESSION['seller_user_name'])) { ?>
  <?php if ($_SESSION['seller_user_name'] == $seller_user_name) { ?>
    <a href="settings?profile_settings" class="btn btn-edit btn-success"><i class="fa fa-pencil"></i> Edit&nbsp;</a>
  <?php } ?>
<?php } ?>
  </div>





  <div class="box_profile box-75">75% Width Box


  </div>



  <!-- style="background: url(<?= $seller_cover_image; ?>);" -->
 
  

</div>

<div class="col-md-12 user-status">
  <ul>
    <li>
      <i class="fa fa-user"></i>
      <strong><?= $lang['user_profile']['member_since']; ?> </strong> <?= $seller_register_date; ?>
    </li>
    <?php if ($seller_recent_delivery != "none") { ?>
      <li>
        <i class="fa fa-truck fa-flip-horizontal"></i>
        <strong><?= $lang['user_profile']['recent_delivery']; ?> </strong> <?= $seller_recent_delivery; ?>
      </li>
    <?php } ?>
    <?php if ($seller_level != 1) { ?>
      <li>
        <i class="fa fa-bars"></i>
        <strong><?= $lang['user_profile']['seller_level']; ?> </strong> <?= $level_title; ?>
      </li>
    <?php } ?>
  </ul>
</div>
<!--Follow Button CSS Start-->
<style>
  button .msg-follow,
  button .msg-following,
  button .msg-unfollow {
    display: none;
    height: 34px;
    width: 112px;
    /*border: 1px solid #00cedc;*/
  }

  .following {
    background: yellowgreen;
    border: 0px;
  }

  button .msg-follow {
    display: inline;
  }

  button.following .msg-follow {
    display: none;
  }

  button.following .msg-following {
    display: inline;
  }

  button.following:not(.wait):hover .msg-following {
    display: none;
  }

  button.following:not(.wait):hover .msg-unfollow {
    display: inline;
  }
</style>

<script>
  /*$('button').click(function(){
        var $this = $(this);
        $this.toggleClass('following')
        if($this.is('.following')){
            $this.addClass('wait');

     //       alert("<?= $seller_id . $login_seller_id ?>");

        }
  var dataString = {
    "seller_id": <?= $seller_id ?>,
    "login_seller_id": <?= $login_seller_id ?>
  };

        /!*dataString['seller_id'] = [<?= $seller_id ?>];
  dataString['login_seller_id'] = [<?= $login_seller_id ?>];
* !/
  // dataString = new array('seller_id'=><?= $seller_id ?>, 'login_seller_id'=><?= $login_seller_id ?>) ; // array?
  var jsonString = JSON.stringify(dataString);

       /!* $.ajax({
  type: "POST",
    url: "following.php",
      data: { data: jsonString },
  cache: false,

    success: function(response) {
      // alert(response);
      console.log(response);

    }
        });* !/


    }).on('mouseleave', function () {
      $(this).removeClass('wait');
    }) */
</script>
<!--Follow button css ends-->