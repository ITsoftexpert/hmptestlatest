<?php
// error_reporting(0);
$get_section = $db->select("home_section", array("language_id" => $siteLanguage));
$row_section = $get_section->fetch();
$count_section = $get_section->rowCount();
@$section_heading = $row_section->section_heading;
@$section_short_heading = $row_section->section_short_heading;

// Home Section 5

$get_section_5 = $db->select("home_section_5", array("language_id" => $siteLanguage));
$row_section_5 = $get_section_5->fetch();
$count_section_5 = $get_section_5->rowCount();
@$section_heading_5 = $row_section_5->section_heading;
@$section_short_heading_5 = $row_section_5->section_short_heading;
@$section_video_url_5 = $row_section_5->video_url;


$get_slides = $db->query("select * from home_section_slider LIMIT 0,1");
$row_slides = $get_slides->fetch();
$slide_id = $row_slides->slide_id;
$slide_image = $row_slides->slide_image;
?>

<link rel="stylesheet" href="styles/forHome.css">
<!-- <link rel="stylesheet" href="styles/addnew.css"> -->
<link rel="stylesheet" href="styles/addnew.css">

<!-- <?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?> NEW HTML CODE: START <?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?> -->
<div class="body-max-width px-5 home-section1" id="powerful-job-respon">

  <div class="row align-items-center py-lg-4 justify-justify-content-between contenthire">
    <div class="col-lg-7 pt-5" id="content-size-accor-scr">
      <h1 class="text-headline-larger font-weight-bold mt-4" id="power-headling-restyle">

        <span class="bg_color_theme"> Uncover </span>
        <span class="font_size_decrease">the <br class="br">ideal freelance work rapidly and without impact</span>
      </h1>
      <p class="" id="restyle-for-portal-para">Break free from outdated norms – <br> instantly access the finest talent,
        right at your fingertips.</p>
      <style>
        .input_style_mobile_search {
          padding: 9px 0 9px 9px;
          border: 1px solid gray;
          border-radius: 5px 0 0 5px;
          border-right: none;
          width: 88%;
        }

        .btn_style_mobile_search {
          border: 1px solid grey;
          background-color: white;
          border-left: none;
          padding: 9px;
          border-radius: 0 5px 5px 0;
        }

        .input_style_mobile_search:focus-visible {
          outline: none;
          /* This prevents any default focus outline */
        }

        @media(min-width:768px) {
          .mobile_view_search_section {
            display: none;
          }
        }
      </style>
      <!-- mobile view search bar start -->
      <div id="mobile_before_scroll_down" class="mobile_view_search_section">
        <div class="" id="">
          <form class="" method="post">
            <div class="" id="inner-search-btn-bar">
              <div class="d-flex mb-3">
                <input class="search-query input_style_mobile_search" class="w-100 rounded" name="search_query"
                  placeholder="<?= $lang['search']['placeholder']; ?>" value="<?= @$_SESSION["search_query"]; ?>"
                  autocomplete="off">
                <button class="btn_style_mobile_search"
                  name="search" type="submit" value="Search">
                  <i class="fa fa-search"></i>
                </button>
              </div>
            </div>
            <ul class="search-bar-panel d-none"></ul>
          </form>
        </div>
      </div>
      <?php
      if (isset($_POST['search'])) {
        $search_query = $input->post('search_query');
        $_SESSION['search_query'] = $search_query;
        echo "<script>window.open('$site_url/search.php','_self')</script>";
      }
      ?>
      <!-- mobile view search bar end -->


      <div class="d-flex find-job-free_btns" id="f-j-restyle">
        <a href="<?= $site_url ?>/login">
          <button class="find_find_free_btn"> Post Job Free </button>
        </a>


        <a href="#" data-toggle="modal" data-target="#register-modal">
          <button class="post_job_free_btn"> Find Job </button>
        </a>
      </div>
    </div>
  </div>

  <video width="10%" autoplay muted loop id="bg-video">
    <source src="videos/HMP Banner (1920 x 880 px).mp4" type="video/mp4">
    Your browser does not support the video tag.
  </video>
</div>

<!-- Voice Search Script -->
<script>
  // Reference to the elements
  const voiceSearchIcon = document.getElementById('voiceSearchIcon');
  const searchQuery = document.getElementById('search-query');

  // Initialize Speech Recognition
  const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
  const recognition = new SpeechRecognition();

  // When voice search icon is clicked
  voiceSearchIcon.addEventListener('click', (event) => {
    event.preventDefault(); // Prevent form submission
    recognition.start(); // Start voice recognition
  });

  // On receiving speech input
  recognition.onresult = function(event) {
    const transcript = event.results[0][0].transcript;
    searchQuery.value = transcript; // Display the spoken words in the input box
  };

  // Error handling
  recognition.onerror = function(event) {
    alert('Error occurred in recognition: ' + event.error);
  };
</script>


<!-- Script for voice search functionality -->
<!--  =========================  rampal  ============================= -->
<style>
  @media (min-width: 768px) {
    .ram_container {
      display: none;
    }
  }

  @media (min-width: 768px) {
    .ram_cat_list {
      display: none !important;

    }

    .ram_cat_list2 {
      display: none !important;

    }
  }

  .clearable_rampal {
    display: flex !important;
    width: 100% !important;
  }

  .rounded_rampal {
    width: 100% !important;
    padding-left: 35px !important;
    border: 2px solid black;
    font-size: 17px;
    border-radius: 5px !important;
    background-color: transparent !important;
    color: #000;
    border: 2px solid #00000082;
    z-index: 2px !important;
  }

  #search-query::placeholder {
    color: #808080;
    /* Change the color to black */
  }

  .rampal_btn_primary {
    padding-top: 7px;
    background-color: transparent;
    color: white;
    border: none;
  }

  .rampal_btn_primary .fa-magnifying-glass {

    background-color: transparent;
    color: #808080;
  }

  .rampal_btn_primary2 {

    padding-top: 7px;
    background-color: transparent;
    color: white;
    border: none;

  }

  .rampal_btn_primary2 .fa-microphone {
    background-color: transparent;
    color: #000;
    font-size: 17px;
  }

  @media screen and (min-width: 769px) {
    .clearable_rampal {
      display: none !important;
      margin-bottom: 42px !important;

    }

  }

  @media screen and (max-width: 769px) {
    #power-headling-restyle {
      font-size: 24px;
    }
  }

  #search-query {
    border-color: none !important;
  }

  .rampal_btn_primary {
    border-radius: 0px 3px 3px 0px;
    border-color: none;
  }

  @media screen and (max-width: 420px) {
    .rampal_btn_primary {
      padding-left: 5px;
      padding-right: 5px;
    }
  }

  @media (max-width: 768px) {
    .home-section1 button {
      min-width: 0px;
    }
  }
</style>

<div class="ram_container">
  <div class="ram_text">
    <p class="ram_smaal_h">How to hire <br> talent on <br> Hiremyprofile</p>
    <h2 class="ram_big_h">Hire in 3 easy ways: get your work done swiftly, smoothly, and successfully</h2>
  </div>

  <div class="ram_outer">
    <div class="raminer_1">
      <a href="<?= $site_url; ?>/mobile_category" class="full-width-button">
        <i class="fa fa-search"></i>
        Hire By Category
        <i class="fa-solid fa-arrow-right"></i>
      </a>
    </div>

    <div class="raminer_2">
      <a href="<?= $site_url; ?>/freelancers" class="full-width-button">
        <i class="fa fa-user"></i>
        Hire an Expert
        <i class="fa-solid fa-arrow-right"></i>
      </a>
    </div>
  </div>
</div>




<!-- without scroller start -->
<div class="home-section2 impro-vise-back-color  display-disappear-2-bluff">
  <div class="body-max-width px-3 ">
    <div class="text-center mb-4 mt-3">
      <h5 class="font-700-weight top-head-ing-respo my-2 text-secondary">How to hire talent on Hiremyprofile</h5>
      <h2 class="">
        Hire in 3 easy ways: get your work done swiftly, smoothly, and successfully
        </br>
    </div>

    <div class="row mx-5">
      <div class=" bordersecOnePixel">
        <a href="<?= $site_url; ?>/requests/post_request">
          <div class="hover_corder_design">
            <div class="corner_box_styling"></div>
          </div>
        </a>
        <div class="p-5 px-2 p-lg-0 position-relative d-flex justify-content-center">
          <div class="loaders">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <!-- <span></span> -->
            <!-- <span></span> -->
            <!-- <span></span> -->
            <!-- <span></span> -->
            <!-- <span></span> -->
          </div>
          <a href="<?= $site_url; ?>/requests/post_request">
            <!-- <img class="img-fluid p-lg-5" src="images/hmp/Circle-Designs.png" alt=""> -->
            <div
              class="position-absolute center-icons shadow bg-white rounded-circle d-flex justify-content-center align-items-center">
              <i class="fa fa-check-square-o fa-3x theme-text"></i>
            </div>
          </a>
          <a href="<?= $site_url; ?>/requests/post_request">
            <label class="position-absolute text-nowrap  px-2 py-1 text-white mb-0 pos1 theme-bg">JUST A SINGLE
              CLICK</label>
          </a>
        </div>
        <a href="<?= $site_url; ?>/requests/post_request">
          <div class="py-5 px-5 top-mar-gin-space">
            <h5 class="text-center font-700-weight"><span class="hover-effect-backgr">POST</span></h5>
            <P class="text-center font-m-500-weight hover-effect-backgr">
              Free and simple! Get competitive proposals within your budget quickly. Start realizing your dreams today
          </div>
        </a>
      </div>

      <div class=" bordersecOnePixel">
        <a href="<?= $site_url; ?>/categories/graphics-design">
          <div class="hover_corder_design">
            <div class="corner_box_styling"></div>
          </div>
        </a>
        <div class="p-5 p-lg-0 position-relative d-flex justify-content-center">
          <a href="<?= $site_url; ?>/categories/graphics-design">
            <div class="loaders">
              <span></span>
              <span></span>
              <span></span>
              <span></span>
              <span></span>
              <span></span>
              <span></span>
              <span></span>
              <span></span>
              <span></span>
              <!-- <span></span> -->
              <!-- <span></span> -->
              <!-- <span></span> -->
              <!-- <span></span> -->
              <!-- <span></span> -->
            </div>
          </a>
          <!-- <img class="img-fluid p-lg-5" src="images/hmp/Circle-Designs.png" alt=""> -->
          <a href="<?= $site_url; ?>/categories/graphics-design">
            <div
              class="position-absolute center-icons shadow bg-white rounded-circle d-flex justify-content-center align-items-center">
              <i class="fa fa-search fa-3x theme-text"></i>
            </div>
          </a>
          <!-- <span>JUST A SINGLE CLICK</span> -->
          <a href="<?= $site_url; ?>/categories/graphics-design">
            <label class="position-absolute text-nowrap  px-2 py-1 text-white mb-0 pos2 text-uppercase theme-bg">Select
              a Service</label>
          </a>
        </div>
        <a href="<?= $site_url; ?>/categories/graphics-design">
          <div class="py-5 px-5 top-mar-gin-space">
            <h5 class="text-center font-700-weight"><span class="hover-effect-backgr">SELECT SERVICE</span></h5>
            <P class="text-center font-m-500-weight hover-effect-backgr">No project is too big or complex. Our
              freelancers handle any size and budget. Realize your ideas.</P>
          </div>
        </a>
      </div>
      <div class=" bordersecOnePixel">
        <a href="<?= $site_url; ?>/freelancers">
          <div class="hover_corder_design">
            <div class="corner_box_styling"></div>
          </div>
        </a>
        <div class="p-5 p-lg-0 position-relative d-flex justify-content-center">
          <a href="<?= $site_url; ?>/freelancers">
            <div class="loaders">
              <span></span>
              <span></span>
              <span></span>
              <span></span>
              <span></span>
              <span></span>
              <span></span>
              <span></span>
              <span></span>
              <span></span>
              <!-- <span></span> -->
              <!-- <span></span> -->
              <!-- <span></span> -->
              <!-- <span></span> -->
              <!-- <span></span> -->
            </div>
          </a>
          <a href="<?= $site_url; ?>/freelancers">
            <!-- <img class="img-fluid p-lg-5" src="images/hmp/Circle-Designs.png" alt=""> -->
            <div
              class="position-absolute center-icons shadow bg-white rounded-circle d-flex justify-content-center align-items-center">
              <i class="fa fa-shopping-bag fa-3x theme-text"></i>
            </div>
          </a>
          <a href="<?= $site_url; ?>/freelancers">
            <label class="position-absolute text-nowrap  px-2 py-1 text-white mb-0 pos3 text-uppercase theme-bg">Hire a
              Freelancer</label>
          </a>
        </div>
        <a href="<?= $site_url; ?>/freelancers">
          <div class="py-5 px-5 top-mar-gin-space">
            <h5 class="text-center font-700-weight"><span class="hover-effect-backgr">HIRE</span></h5>
            <P class="text-center font-m-500-weight padding-x-axis hover-effect-backgr">Hiremyprofile offers top-notch
              talent from numerous professionals to meet your requirements quickly</P>
          </div>
        </a>
        <!-- <div class="position_relative_hover_btn_style" onmouseover="hoverEffectOut(this)" onmouseout="hoverEffect(this)">
          <div class="position_absolute_hover_btn_style">
            <div class="hover_up_down_effect_btn1"></div>
            <div class="hover_up_down_effect_btn2"></div>
            <div class="hover_up_down_effect_btn3"></div>
            <div class="hover_up_down_effect_btn4"></div>
          </div>
          <div class="position_absolute_hover_btn_style hioer">
            <button class="m-auto click_here_btn_styling">Click here</button>
          </div>
        </div> -->
      </div>
    </div>
  </div>
</div>

<script src="js/stylishbtn.js"></script>



<script>
  function goNext0() {
    if (counter0 == 2) {
      counter0 = 0
      slideImage0()
    } else {
      counter0++
      slideImage0()
    }
  }

  function goPrev0() {
    if (counter0 == 0) {
      counter0 = 2
      slideImage0()
    } else {
      counter0--
      slideImage0()
    }
  }


  const slidering0 = document.querySelectorAll(".slideres0");
  let counter0 = 0;
  slidering0.forEach(
    (slideres0, index0) => {
      slideres0.style.left = `${index0 * 100}%`;
    })

  const slideImage0 = () => {
    slidering0.forEach(
      (slideres0) => {
        slideres0.style.transform = `translateX(-${counter0 * 100}%)`;
      }
    )
  }
  setInterval(letSetGo, 5000);

  function letSetGo() {
    goNext0();
  }
</script>

<div
  class="home-section3 body-max-width px-3 pt-2 mb-5 mob-sty-respo-vsi   dummy-video-content-border2  "
  id="dummy-video-content-border" style="margin: top 0px;">
  <div class="cards">
    <div class="d-flex justify-content-between align-items-center" id="top-propo-div-respon">
      <h5 class="my-0 textdarkheadingempowerTps">Discover our top sellers</h5>
    </div>
  </div>
  <h2 class="text-center ">Get top-tier talent, exceptional service, and quick results by hiring from our platform.</h2>

  <!-- start of top proposal section-->
  <div class="container-top-proposal">
    <div class="container-top-proposal-row">
      <?php
      $get_proposals = $db->query("select * from proposals where proposal_featured='yes' OR proposal_status='active' LIMIT 0,4");
      while ($row_proposals = $get_proposals->fetch()) {
        $proposal_id = $row_proposals->proposal_id;
        $proposal_title = $row_proposals->proposal_title;
        $proposal_title = strlen($proposal_title) > 120 ? substr($proposal_title, 0, 120) . "..." : $proposal_title;
        $proposal_price = $row_proposals->proposal_price;


        if ($proposal_price == 0) {
          $get_p_1 = $db->select("proposal_packages", array("proposal_id" => $proposal_id, "package_name" => "Basic"));
          $proposal_price = $get_p_1->fetch()->price;
        } ?>
        <?php
        $proposal_img1 = getImageUrl2("proposals", "proposal_img1", $row_proposals->proposal_img1);
        $proposal_video = $row_proposals->proposal_video;
        $proposal_seller_id = $row_proposals->proposal_seller_id;
        $proposal_rating = $row_proposals->proposal_rating;
        $proposal_url = $row_proposals->proposal_url;
        $proposal_featured = $row_proposals->proposal_featured;
        $proposal_enable_referrals = $row_proposals->proposal_enable_referrals;
        $proposal_referral_money = $row_proposals->proposal_referral_money;
        ?>
        <?php
        if (empty($proposal_video)) {
          $video_class = "";
        } else {
          $video_class = "video-img";
        }
        $get_seller = $db->select("sellers", array("seller_id" => $proposal_seller_id));
        $row_seller = $get_seller->fetch();
        $seller_user_name = $row_seller->seller_user_name;
        $seller_image = getImageUrl2("sellers", "seller_image", $row_seller->seller_image);
        $seller_level = $row_seller->seller_level;
        $seller_status = $row_seller->seller_status;
        if (empty($seller_image)) {
          $seller_image = "empty-image.png";
        }
        // Select Proposal Seller Level
        @$seller_level = $db->select("seller_levels_meta", array("level_id" => $seller_level, "language_id" => $siteLanguage))->fetch()->title;
        $proposal_reviews = array();
        $select_buyer_reviews = $db->select("buyer_reviews", array("proposal_id" => $proposal_id));
        $count_reviews = $select_buyer_reviews->rowCount();
        while ($row_buyer_reviews = $select_buyer_reviews->fetch()) {
          $proposal_buyer_rating = $row_buyer_reviews->buyer_rating;
          array_push($proposal_reviews, $proposal_buyer_rating);
        }
        $total = array_sum($proposal_reviews);
        //@$average_rating = $total / count($proposal_reviews);  //shubham
        ?>

        <div class="new-design-style">
          <div class="card-box card" id="new-mob-design-style">
            <a href="<?= $site_url; ?>/proposals/<?= $seller_user_name; ?>/<?= $proposal_url; ?>" class="subcategory">
              <picture class="card-img-top">
                <img src="<?= $proposal_img1; ?>">
                <?php if (isset($_SESSION['seller_user_name'])) { ?>
                  <?php if ($proposal_seller_id != $login_seller_id) { ?>
                    <i data-id="<?= $proposal_id; ?>" href="<?= $site_url; ?>"
                      class="fa fa-heart  <?= $show_favorite_class; ?> additing-some-new" data-toggle="tooltip"
                      data-placement="top" title="Favorite"></i>
                  <?php } ?>
                <?php } else { ?>
                  <a href="#" data-toggle="modal" data-target="#login-modal">
                    <i class="fa fa-heart proposal-favorite additing-some-new modification_class_absolute"
                      data-toggle="tooltip" data-placement="top" title="Favorite"></i>
                  </a>
                <?php } ?>
              </picture>
            </a>
            <div class="card-body">
              <div class="d-flex">
                <div class="rounded-circle overflow-hidden d-flex justify-content-center align-items-center user-pic">
                  <img class="w-100 h-100" src="<?= $seller_image; ?>" alt="">
                </div>
                <div class="px-3 d-flex justify-content-between w-100 align-items-center">
                  <div class="">
                    <a href="<?= $site_url; ?>/<?= $seller_user_name; ?>">
                      <h5 class="card-title font-weight-bold mb-0"><?= $seller_user_name; ?> <?= $proposal_id ?></h5>
                    </a>
                    <small class="text-secondary"><?= $seller_level; ?></small>
                  </div>
                  <div class="text-secondary">
                    <p> From :
                      <strong class=""><?= showPrice($proposal_price); ?></strong>
                    </p>
                  </div>
                </div>
              </div>
              <a href="<?= $site_url; ?>/proposals/<?= $seller_user_name; ?>/<?= $proposal_url; ?>">
                <p class="my-3"><?= $proposal_title; ?></p>
              </a>
              <div class="star-fill d-flex">
                <div class="font-weight-bold text-warning">
                  <i class="fa fa-star"></i>
                  <span><?php if ($proposal_rating == "0") {
                          echo "0.0";
                        } else {
                          printf("%.1f", $average_rating);
                        } ?></span>
                  <span class="font-weight-normal text-secondary">(<?= $count_reviews; ?>)</span>
                </div>
              </div>

            </div>

            <div class=" d-flex justify-content-between align-items-center py-1 px-1 bt-xs-1 bc-theme-according">

              <svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1003 1057" height="30px">

                <path class="a" d="m638.7 275.8h-274.4l-62.7-275.4h399.7z" />
                <path class="b" d="m500.4 275.8h-136.1l-62.7-275.4h198.8z" />
                <path class="b"
                  d="m1002.6 965.1c0 50.6-41 91.5-91.6 91.5h-0.5-223.4-371.4-223.3-0.5c-50.6 0-91.6-40.9-91.6-91.5 0-17 11.7-39.8 28.9-62.6-7.2-32.8-11-66.9-11-101.9 0-266.9 216.3-548.9 483.3-548.9 266.8 0 483.2 282 483.2 548.9 0 35-3.9 69-11 101.9 17.2 22.7 28.9 45.6 28.9 62.6z" />
                <path class="c"
                  d="m500.4 1056.6h-408.5c-50.6 0-91.6-40.9-91.6-91.5 0-17 11.7-39.8 28.9-62.6-7.2-32.8-11-66.9-11-101.9 0-266.6 215.8-548.1 482.2-548.9z" />
                <path fill-rule="evenodd" class="d"
                  d="m668.7 304h-334.5c-18.3 0-33.1-14.8-33.1-33 0-18.3 14.8-33.1 33.1-33.1h334.5c18.3 0 33.1 14.8 33.1 33.1 0 18.2-14.8 33-33.1 33zm-13.8-66.3h-307c-18.2 0-33-14.7-33-33 0-18.2 14.8-33.1 33-33.1h307c18.3 0 33.1 14.9 33.1 33.1 0 18.3-14.8 33-33.1 33z" />
                <path fill-rule="evenodd" class="e"
                  d="m701.7 270.8c0 0 0.1 0.1 0.1 0.2 0 18.2-14.8 33-33.1 33h-334.5c-18.3 0-33.1-14.8-33.1-33q0-0.1 0-0.2zm-13.8-66.6c0 0.2 0.1 0.3 0.1 0.5 0 18.3-14.8 33-33 33h-307c-18.3 0-33.1-14.7-33.1-33 0-0.2 0.1-0.3 0.1-0.5z" />
                <path class="f"
                  d="m712.1 676.8c0 116.3-94.3 210.7-210.6 210.7-116.4 0-210.7-94.4-210.7-210.7 0-116.3 94.3-210.6 210.7-210.6 116.3 0 210.6 94.3 210.6 210.6z" />
                <path class="g" d="m500.4 887.4c-115.9-0.6-209.6-94.6-209.6-210.6 0-116 93.7-210 209.6-210.6z" />
                <path class="e"
                  d="m483.3 797.6c-46.5-5-61.7-31.6-61.7-66.4h43.1c0.9 18.3 9 28.2 36.2 28.2 25.8 0 37.6-10.8 37.6-37.8 0-28.2-33.5-28.2-58.9-31.6-27-3.4-55.5-16.8-55.5-66.1 0-39 20.8-61.7 59.2-66.7v-33.4h38.1v33.8c31 4.9 51.2 22.6 54.6 62h-43c-1.3-20.1-11.9-26-32.7-26-23.5 0-33.1 7.4-33.1 30 0 30.1 23.9 27.6 60.1 33.2 27.7 4.4 54 15.5 54 63.3 0 47.7-17.9 71.6-59.9 77.2v32.5h-38.1z" />
              </svg>
              <div>
                <span class="text-secondary"><?= $lang['proposals']['starting_at']; ?> </span>
                <strong class="text-largest pl-2"><?= showPrice($proposal_price); ?></strong>
              </div>
            </div>

          </div>
        </div>
      <?php } ?>
    </div>
  </div>
  <!-- href="featured_proposals">   -->
  <div class="display_flex_position display_flex_positionpart2"><a class="btn theme-bg text-white"
      id="top-view-response" href="<?= $site_url; ?>/categories/graphics-design">
      VIEW ALL
    </a>
  </div>
</div>

<style>
  @media (max-width: 768px) {
    #dummy-video-content-border {
      margin-top: 0px;
    }
  }

  .ram_cat_list {
    display: flex;
    flex-wrap: wrap;
  }

  .ram_left_cat,
  .ram_right_cat {
    flex: 1;
    width: 50%;
  }

  .ram_left_cat a,
  .ram_right_cat a {
    display: block;
    text-decoration: none;
    color: inherit;
    margin-bottom: 8px;
    /* Adds a small gap between each link */
  }

  .ram_left_cat {
    padding-left: 22px;
  }

  .ram_right_cat {
    padding-right: 22px;
  }

  .ram_left_cat a:hover,
  .ram_right_cat a:hover {
    color: blue;
  }

  @media screen and (max-width: 768px) {

    .ram_left_cat,
    .ram_right_cat {
      width: 100% !important;
    }
  }

  .ram_cat_list2 {
    margin-top: 20px;
  }

  .ram_cat_list {
    margin-bottom: 20px;
  }
</style>

<div class=" mb-2 ram_cat_list2">
  <h5 class="text-center text-secondary">Popular categories</h5>
  <h2 class="text-center">Explore and hire from our most popular service categories today!</h2>
</div>
<div class="ram_cat_list mt-4">





  <div class="ram_left_cat">

    <ul>
      <li>
        <a href="<?= $site_url; ?>/categories/programming-amp-tech/AI-Development" class="left_cat_item">AI Development</a>
      </li>
      <li> <a href="<?= $site_url; ?>/categories/programming-amp-tech/Website-Development/E-Commerce-Development"
          class="left_cat_item">E-Commerce Development</a> </li>
      <li> <a href="<?= $site_url; ?>/categories/graphics-design/Logo-Brand-Identity/Logo-Design" class="left_cat_item">Logo
          Design</a> </li>
      <li> <a href="<?= $site_url; ?>/categories/video-animation/Editing-Post-Production/Video-Editing"
          class="left_cat_item">Video Editing</a> </li>
      <li> <a href="<?= $site_url; ?>/categories/programming-amp-tech/Mobile-App-Development" class="left_cat_item">Mobile App
          Development</a> </li>
      <li> <a href="<?= $site_url; ?>/categories/graphics-design/Art-Illustration" class="left_cat_item">Art & Illustration</a> </li>
      <li> <a href="<?= $site_url; ?>/categories/programming-amp-tech/Data-Science-ML" class="left_cat_item">Data Science & ML</a> </li>
      <li> <a href="<?= $site_url; ?>/categories/programming-amp-tech/Website-Platforms/Shopify" class="left_cat_item">Shopify
          Developer</a> </li>
      <li> <a href="<?= $site_url; ?>/categories/programming-amp-tech/Game-Development" class="left_cat_item">Game Development</a> </li>
      <li> <a href="<?= $site_url; ?>/categories/graphics-design/3D-Design" class="left_cat_item">3D Design</a> </li>
      <li> <a href="<?= $site_url; ?>/categories/writing-translation/Career-Writing/Resume-Writing"
          class="left_cat_item">Resume Writer</a> </li>
      <li> <a href="<?= $site_url; ?>/categories/graphics-design/Product-Gaming" class="left_cat_item">Product & Gaming</a> </li>
      <li> <a href="<?= $site_url; ?>/categories/business/Financial-Services" class="left_cat_item">Financial Services</a> </li>
    </ul>
    <!-- Repeat for other items -->
  </div>

  <div class="ram_right_cat">

    <ul>


      <li> <a href="<?= $site_url; ?>/categories/digital-marketing/Social/seo" class="left_cat_item">SEO</a> </li>
      <li> <a href="<?= $site_url; ?>/categories/programming-amp-tech/Website-Development" class="left_cat_item">Website
          Development</a> </li>
      <li> <a href="<?= $site_url; ?>/categories/digital-marketing/Social/Social-Media-Marketing" class="left_cat_item">Social
          Media Marketing</a> </li>
      <li> <a href="<?= $site_url; ?>/categories/writing-translation/Content-Writing" class="left_cat_item">Content Writer</a> </li>
      <li> <a href="<?= $site_url; ?>/categories/programming-amp-tech/Software-Development" class="left_cat_item">Software
          Development</a> </li>
      <li> <a href="<?= $site_url; ?>/categories/writing-translation/Content-Writing/Scriptwriting"
          class="left_cat_item">Scriptwriting</a> </li>
      <li> <a href="<?= $site_url; ?>/categories/programming-amp-tech/Software-Development" class="left_cat_item">Software
          Development</a> </li>
      <li> <a href="<?= $site_url; ?>/categories/programming-amp-tech/Data-Science-ML" class="left_cat_item">Data Science & ML</a> </li>
      <li> <a href="<?= $site_url; ?>/categories/music-audio/Sound-Design" class="left_cat_item">Sound Design</a> </li>
      <li> <a href="<?= $site_url; ?>/categories/personal-growth/fashion-amp-style" class="left_cat_item">Fashion & Style</a> </li>
      <li> <a href="<?= $site_url; ?>/categories/ai-services/ai-for-businesses" class="left_cat_item">AI for Businesses</a> </li>
      <li> <a href="<?= $site_url; ?>/categories/programming-amp-tech/Game-Development" class="left_cat_item">Game Development</a> </li>
      <li> <a href="<?= $site_url; ?>/categories/programming-amp-tech/AI-Development" class="left_cat_item">AI Development</a>
    </ul>

    </ul>

    <!-- Repeat for other items -->
  </div>
</div>





<!-- without scroller section 2 -->
<!-- top proposal services slider js script start-->
<script>
  const goPrev1 = () => {
    if (counter1 == 0) {
      counter1 = 2;
      slideImage1()
    } else {
      counter1--
      slideImage1()
    }
  }

  const goNext1 = () => {
    if (counter1 == 2) {
      counter1 = 0;
      slideImage1()
    } else {
      counter1++
      slideImage1()
    }
  }

  const slidering1 = document.querySelectorAll(".slideres1");
  let counter1 = 0;
  slidering1.forEach(
    (slideres1, index1) => {
      slideres1.style.left = `${index1 * 100}%`;
    })

  const slideImage1 = () => {
    slidering1.forEach(
      (slideres1) => {
        slideres1.style.transform = `translateX(-${counter1 * 100}%)`;
      }
    )
  }

  function scrollerAuto() {
    goNext1();
  }

  setInterval(scrollerAuto, 5000);
</script>



<style>
  .popular_section-slider {
    position: relative;
    max-width: 600px;
    margin: auto;
    overflow: hidden;
    border: 2px solid <?= $site_url; ?> ddd;
    border-radius: 10px;
  }

  .popular_section-slides {
    display: flex;
    transition: transform 0.5s ease-in-out;
  }

  .popular_section-slide {
    min-width: 100%;
    box-sizing: border-box;
    /* border: 2px solid green; */
    width: 100%;
    height: 15rem;
    text-align: center;
  }

  .popular_section-slide img {
    width: 40%;
    border-radius: 10px;
  }

  .popular_section-prev,
  .popular_section-next {
    position: absolute;
    top: 50%;
    width: auto;
    padding: 8px 15px;
    margin-top: -22px;
    /* color: white; */
    font-weight: bold;
    font-size: 18px;
    transition: 0.6s ease;
    border-radius: 0 3px 3px 0;
    user-select: none;
    border: none;
  }

  .popular_section-next {
    right: 0;
    border-radius: 3px 0 0 3px;
  }

  .popular_section-prev:hover,
  .popular_section-next:hover {
    background-color: rgba(0, 0, 0, 0.8);
  }

  .category_popular_paragraph2 {
    text-align: center;
    font-size: 1.6rem;
  }

  .desktop-view-only {
    display: block;
  }

  .mobile-view-only {
    display: none;
  }



  @media(max-width:768px) {

    .desktop-view-only {
      display: none;
    }

    .mobile-view-only {
      display: none;
      /* display: block; */
    }
  }
</style>

<style>
  .popular_service_div {
    padding: 30px 0;
    background-color: #f9f9f9;
  }

  .popular_service_div h5,
  .popular_service_div h2 {
    margin-bottom: 20px;
  }

  .popular_service_div_60 {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
    justify-items: center;
    padding: 0px 50px 0px 50px;
  }

  .popular_service_title {
    text-align: center;
    padding: 10px;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    transition: transform 0.3s ease;
  }

  .popular_service_title:hover {
    transform: translateY(-5px);
  }

  .popular_service_title img {
    width: 100%;
    height: 115px;
    /* margin-bottom: 15px; */
  }

  .category_popular_paragraph {
    font-size: 16px;
    font-weight: 500;
    color: #333;
    line-height: 1.5;
  }

  .margin-auto-link,
  .margin-auto-link-paragraph {
    text-decoration: none;
  }

  @media (max-width: 768px) {
    .desktop-view-only {
      display: none;
    }
  }
</style>


<script>
  let currentIndex = 0;

  function showSlide(index) {
    const slides = document.querySelectorAll('.popular_section-slide');
    const totalSlides = slides.length;

    if (index >= totalSlides) {
      currentIndex = 0;
    } else if (index < 0) {
      currentIndex = totalSlides - 1;
    } else {
      currentIndex = index;
    }

    const offset = -currentIndex * 100;
    document.querySelector('.popular_section-slides').style.transform = `translateX(${offset}%)`;
  }

  function nextSlide() {
    showSlide(currentIndex + 1);
  }

  function prevSlide() {
    showSlide(currentIndex - 1);
  }

  // Automatically show the next slide every 5 seconds
  setInterval(nextSlide, 5000);
</script>


<div class="popular_service_div desktop-view-only">
  <h5 class="text-center text-secondary">Popular categories</h5>
  <h2 class="text-center">Explore and hire from our most popular service categories today!</h2>
  <div class="popular_service_div_60">
    <div class="popular_service_title">
      <a href="<?= $site_url; ?>/categories/programming-tech/Website-Development" class="margin-auto-link">
        <img src="images/hmp/web-development-icon.png" alt="">
      </a>
      <a href="<?= $site_url; ?>/categories/programming-tech/Website-Development" class="margin-auto-link-paragraph">
        <p class="category_popular_paragraph">Website <br> Development</p>
      </a>
    </div>
    <div class="popular_service_title">
      <a href="<?= $site_url; ?>/categories/graphics-design/Logo-Brand-Identity/Logo-Design" class="margin-auto-link">
        <img src="images/hmp/logo-design-icon.png" alt=""></a>
      <a href="<?= $site_url; ?>/categories/graphics-design/Logo-Brand-Identity/Logo-Design" class="margin-auto-link-paragraph">
        <p class="category_popular_paragraph">Logo <br> Design</p>
      </a>
    </div>
    <div class="popular_service_title">
      <a href="<?= $site_url; ?>/categories/digital-marketing/Search/Search-Engine-Optimization-(SEO)" class="margin-auto-link">
        <img src="images/hmp/seo-icon.png" alt=""></a>
      <a href="<?= $site_url; ?>/categories/digital-marketing/Search/Search-Engine-Optimization-(SEO)" class="margin-auto-link-paragraph">
        <p class="category_popular_paragraph">SEO</p>
      </a>
    </div>
    <div class="popular_service_title">
      <a href="<?= $site_url; ?>/categories/programming-tech/Software-Development" class="margin-auto-link">
        <img src="images/hmp/software-development-icon.png" alt=""></a>
      <a href="<?= $site_url; ?>/categories/programming-tech/Software-Development" class="margin-auto-link-paragraph">
        <p class="category_popular_paragraph">Software <br> Development</p>
      </a>
    </div>
    <!-- Continue with the rest of the items... -->

    <div class="popular_service_title">
      <a href="<?= $site_url; ?>/categories/digital-marketing/Social/Social-Media-Marketing" class="margin-auto-link">
        <img src="images/hmp/Social-Media-Marketing-icon.png" alt="" width="100%"></a>
      <a href="<?= $site_url; ?>/categories/digital-marketing/Social/Social-Media-Marketing"
        class="margin-auto-link-paragraph">
        <p class="category_popular_paragraph">Social Media <br>
          Marketing</p>
      </a>
    </div>
    <div class="popular_service_title">
      <a href="<?= $site_url; ?>/categories/ai-services/ai-development" class="margin-auto-link">
        <img src="images/hmp/ai-management.png" alt="" width="100%"></a>
      <a href="<?= $site_url; ?>/categories/ai-services/ai-development" class="margin-auto-link-paragraph">
        <p class="category_popular_paragraph">AI <br> Development</p>
      </a>
    </div>
    <div class="popular_service_title">
      <a href="<?= $site_url; ?>/categories/graphics-design/Architecture-Building-Design" class="margin-auto-link">
        <img src="images/hmp/Architecture-icon.png" alt="" width="100%"></a>
      <a href="<?= $site_url; ?>/categories/graphics-design/Architecture-Building-Design"
        class="margin-auto-link-paragraph">
        <p class="category_popular_paragraph">Architecture <br> &
          Interior Design</p>
      </a>
    </div>
    <div class="popular_service_title">
      <a href="<?= $site_url; ?>/categories/programming-tech/Data-Science-ML" class="margin-auto-link">
        <img src="images/hmp/Data-Science-ml-icon.png" alt="" width="100%"></a>
      <a href="<?= $site_url; ?>/categories/programming-tech/Data-Science-ML" class="margin-auto-link-paragraph">
        <p class="category_popular_paragraph">Data Science <br> &
          ML</p>
      </a>
    </div>
    <div class="popular_service_title">
      <a href="<?= $site_url; ?>/categories/video-animation/photography" class="margin-auto-link">
        <img src="images/hmp/product-photoshoot-icon.png" alt="" width="100%"></a>
      <a href="<?= $site_url; ?>/categories/video-animation/photography" class="margin-auto-link-paragraph">
        <p class="category_popular_paragraph">Product <br>
          Photography</p>
      </a>
    </div>
    <div class="popular_service_title">
      <a href="<?= $site_url; ?>/categories/digital-marketing/Methods-Techniques/E-Commerce-Marketing"
        class="margin-auto-link">
        <img src="images/hmp/E-Commerce-Marketing-icon.png" alt="" width="100%"></a>
      <a href="<?= $site_url; ?>/categories/digital-marketing/Methods-Techniques/E-Commerce-Marketing"
        class="margin-auto-link-paragraph">
        <p class="category_popular_paragraph">E-Commerce <br>
          Marketing</p>
      </a>
    </div>
    <div class="popular_service_title">
      <a href="<?= $site_url; ?>/categories/video-animation/Editing-Post-Production/Video-Editing"
        class="margin-auto-link">
        <img src="images/hmp/video-editing-icon.png" alt="" width="100%"></a>
      <a href="<?= $site_url; ?>/categories/video-animation/Editing-Post-Production/Video-Editing"
        class="margin-auto-link-paragraph">
        <p class="category_popular_paragraph">Video <br>
          Editing</p>
      </a>
    </div>
    <div class="popular_service_title">
      <a href="<?= $site_url; ?>/categories/ai-services/ai-content" class="margin-auto-link">
        <img src="images/hmp/Voice-Over-icon.png" alt="" width="100%"></a>
      <a href="<?= $site_url; ?>/categories/ai-services/ai-content" class="margin-auto-link-paragraph">
        <p class="category_popular_paragraph"> AI <br> Content</p>
      </a>
    </div>
  </div>
</div>







<link href="<?= $site_url; ?>/styles/update-style.css" rel="stylesheet">
<link href="<?= $site_url; ?>/styles/featured-candidate-style.css" rel="stylesheet">
<!-- old code -->
<!-- js end -->
<style>
  .talent_hub-slider {
    position: relative;
    max-width: 600px;
    margin: auto;
    overflow: hidden;
    border: 2px solid <?= $site_url; ?> ddd;
    border-radius: 10px;
  }

  .talent_hub-slides {
    display: flex;
    transition: transform 0.5s ease-in-out;
  }

  .talent_hub-slide {
    min-width: 100%;
    box-sizing: border-box;
    text-align: center;
  }

  .talent_hub-slide img {
    width: 40%;
    border-radius: 10px;
  }

  .talent_hub-controls {
    position: absolute;
    width: 100%;
    top: 50%;
    display: flex;
    justify-content: space-between;
    transform: translateY(-50%);
  }

  .talent_hub-prev,
  .talent_hub-next {
    cursor: pointer;
    color: white;
    font-size: 24px;
    font-weight: bold;
    padding: 16px;
    user-select: none;
    transition: background-color 0.3s;
  }

  .talent_hub-prev:hover,
  .talent_hub-next:hover {
    background-color: rgba(0, 0, 0, 0.5);
  }
</style>






<div class="third_section_div_style desktop-view-only">
  <div class="third_sectioninner_div_style">
    <div class="third_sectioninner_60">
      <p class="margin_according_content color_theme_color">Freelance talent hub</p>
      <h2 class="margin_according_content mb-3">Access a world of independent talent.</h2>
      <div class="third_sectioninner_60paragraph">
        <div class="main-list-content-div-fth">
          <div class="image-icon-fth"><img src="images/first_icon.png" alt="no image" width="100%" class="m-auto">
          </div>
          <div class="content-img-fth">
            <p>
              "Hiremyprofile" offers a user-friendly platform where individuals can build comprehensive profiles
              showcasing their skills, experience, and expertise across various industries.
            </p>
          </div>
        </div>

        <div class="main-list-content-div-fth">
          <div class="image-icon-fth"><img src="images/quality_icon.png" alt="no image" width="100%" class="m-auto">
          </div>
          <div class="content-img-fth">
            <p>
              Employers can efficiently explore these profiles to identify candidates who align with their project needs
              or job openings.
            </p>
          </div>
        </div>

        <div class="main-list-content-div-fth">
          <div class="image-icon-fth"><img src="images/payment_icon.png" alt="no image" width="100%" class="m-auto">
          </div>
          <div class="content-img-fth">
            <p>
              The platform enhances communication channels, enabling direct interaction between employers and job
              seekers to discuss opportunities.
            </p>
          </div>
        </div>


        <div class="main-list-content-div-fth">
          <div class="image-icon-fth"><img src="images/fourth_icon.png" alt="no image" width="100%" class="m-auto">
          </div>
          <div class="content-img-fth">
            <p>
              With detailed insights into each candidate's qualifications, "Hiremyprofile" aims to facilitate successful
              matches and productive collaborations in the hiring process.
            </p>
          </div>
        </div>

      </div>
    </div>
    <div class="third_sectioninner_40">
      <video width="100%" id="videotemp">
        <source src="videos/yjky.mp4" type="video/mp4">
        Your browser does not support the video tag.
      </video>
      <div class="play-icon" id="play-icon"><i class="fa fa-play"></i></div>

      <!-- <iframe width="100%" height="100%" src="videos/yjky.mp4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var videotemp = document.getElementById('videotemp');
    var playIcon = document.getElementById('play-icon');

    playIcon.addEventListener('click', function() {
      if (videotemp.paused) {
        videotemp.play();
        playIcon.style.display = 'none';
      } else {
        videotemp.pause();
        playIcon.style.display = 'block';
      }
    });

    videotemp.addEventListener('play', function() {
      playIcon.style.display = 'none';
    });

    videotemp.addEventListener('pause', function() {
      playIcon.style.display = 'block';
    });

    videotemp.addEventListener('ended', function() {
      playIcon.style.display = 'block';
    });
  });
</script>
<!-- 9202023 end -->




<!-- bluff created design by featured candidate section  -->
<div
  class="home-section3 body-max-width px-3 pt-2 mb-5 ">
  <div class="cards">
    <div class="d-flex justify-content-between align-items-center" id="top-propo-div-respon">
      <h5 class="my-0 textdarkheadingempowerTps">Featured candidates</h5>
    </div>
  </div>
  <h2 class="text-center ">Leading employers already using job and talent.</h2>



  <div class="container-top-proposal">
    <div class="container-top-proposal-row">
      <div class="featured-main-container">
        <?php
        $query1 = $db->query("SELECT s.* FROM sellers s INNER JOIN memb_plan_detail mpd ON s.seller_id = mpd.seller_id AND memb_status = 'Active' AND mpd.memb_tbl_id = 10  ORDER BY RAND() LIMIT 4");
        while ($get1_data = $query1->fetch()) {
          $seller_image = getImageUrl("sellers", $get1_data->seller_image);
          $seller_name = $get1_data->seller_name; //seller name
          $seller_id = $get1_data->seller_id;
          $seller_user_name = $get1_data->seller_user_name;
          $seller_city = $get1_data->seller_city;
          $seller_country = $get1_data->seller_country;
          $seller_headline = $get1_data->seller_headline;

          $quwery_1 = $db->query("SELECT * FROM proposals where proposal_seller_id = $seller_id");
          $picture1 = $quwery_1->fetch();
          $proposal_rating = $picture1->proposal_rating;
          $proposal_url = $picture1->proposal_url;
          $proposal_id = $picture1->proposal_id;
          $proposal_title = $picture1->proposal_title;
          $proposal_img1 = $picture1->proposal_img1;
          $proposal_img2 = $picture1->proposal_img2;
          $proposal_img3 = $picture1->proposal_img3;
          $proposal_img4 = $picture1->proposal_img4;
          $proposal_desc = $picture1->proposal_desc;
          $proposal_price = $picture1->proposal_price;
          $proposal_views = $picture1->proposal_views;
          $proposal_seller_id = $picture1->proposal_seller_id;

        ?>
          <div class="featured-card">
            <div class="featured-main-header">
              <div class="profile-picture">
                <a href="<?= $site_url; ?>/<?= $seller_user_name; ?>">
                  <img src="<?= $seller_image; ?>" alt="Profile Picture">
                </a>
              </div>
              <div class="profile-info">
              <a href="<?= $site_url; ?>/<?= $seller_user_name; ?>">
                <h3><span class="online-indicator"></span> <?= substr($seller_name , 0, 15); ?> <?= strlen($seller_name) > 15 ? '..' : '' ?></h3>
              </a>
                <p class="feature-main-text"><?= substr($seller_headline, 0, 40); ?> <?= strlen($seller_headline) > 40 ? '...' : ''; ?></p>
                <div class="rating">
                  <span>⭐ <?= $proposal_rating > 0 ? $proposal_rating : 0; ?></span> <span>(<?= $proposal_views; ?>)</span>
                </div>
              </div>
              <button class="favorite-button" onclick="toggleFavorite(this)">
                <i class="fa-regular fa-heart"></i>
              </button>
            </div>
            
            <div class="featured-main-tags">
              <?php
              $skill_details = $db->query("SELECT * FROM skills_relation WHERE seller_id = $seller_id");
              while ($get_skill_details = $skill_details->fetch()) {
                $skill_sub_child_id = $get_skill_details->skill_sub_child_id;
                $skill_id = $get_skill_details->skill_id;

                $select_attribute = $db->query("SELECT * FROM seller_skills WHERE skill_id = $skill_id")->fetch();
                $skill_title = $select_attribute->skill_title;

                echo "<span>" . $skill_title .$proposal_id.  "</span>";
              }
              ?>
            </div>

            <div class="slider featured-main-slider">
            <a href="<?= $site_url; ?>/proposals/<?= $seller_user_name; ?>/<?= $proposal_url; ?>">
              <div class="slides">
                <!-- Different images for Card 1 -->
                <img src="proposals/proposal_files/<?= $proposal_img1; ?>" alt="Image 1">
                <img src="proposals/proposal_files/<?= $proposal_img2; ?>" alt="Image 2">
                <img src="proposals/proposal_files/<?= $proposal_img3; ?>" alt="Image 3">
                <img src="proposals/proposal_files/<?= $proposal_img4; ?>" alt="Image 4">
              </div>
            </a>
              <div class="dots">
                <span class="dot" onclick="currentSlide(1, 1)"></span>
                <span class="dot" onclick="currentSlide(1, 2)"></span>
                <span class="dot" onclick="currentSlide(1, 3)"></span>
                <span class="dot" onclick="currentSlide(1, 4)"></span>
              </div>
            </div>
            <div class="featured-main-footer">
              <p>From <br><strong>$<?= $proposal_price; ?></strong>/project</p>
              <a class="featured-chat-icon" href="<?= $site_url; ?>/proposals/<?= $seller_user_name; ?>/<?= $proposal_url; ?>"><i class="fa-duotone fa-solid fa-comment"></i></a>
              <a href="<?= $site_url; ?>/<?= $seller_user_name; ?>">
                <button class="see-profile-button">See profile</button>
              </a>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>


  <!-- start of top proposal section-->

  <div class="display_flex_position display_flex_positionpart2"><a class="btn theme-bg text-white"
      id="top-view-response" href="top_propo_file_view">
      VIEW ALL
    </a>
  </div>
</div>

<!-- bluff created design by featured candidate section  -->


<style>
  @media (max-width: 768px) {
    .home-section6 {
      background-color: #ebebeb;
      padding-top: 20px !important;
    }

  }
</style>



<!-- end to change -->
<script>
  const goPrev2 = () => {
    if (counter2 == 0) {
      counter2 = 2;
      slideImage2()
    } else {
      counter2--
      slideImage2()
    }
  }

  const goNext2 = () => {
    if (counter2 == 2) {
      counter2 = 0;
      slideImage2()
    } else {
      counter2++
      slideImage2()
    }
  }

  const slidering2 = document.querySelectorAll(".slideres2");
  let counter2 = 0;
  slidering2.forEach(
    (slideres2, index2) => {
      slideres2.style.left = `${index2 * 100}%`;
    })

  const slideImage2 = () => {
    slidering2.forEach(
      (slideres2) => {
        slideres2.style.transform = `translateX(-${counter2 * 100}%)`;
      }
    )
  }

  const autoSlider = () => {
    goNext2();
  }

  // setInterval(autoSlider, 5000);
</script>
<!-- <?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?> -->
<!-- <?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?> NEW HTML CODE: END <?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?> -->

<!-- top plan purchased people displayed section end -->

<!-- <?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?> NEW HTML CODE: END <?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?><?= $site_url; ?> -->

<!-- end main -->
<!-- start market -->

<!-- start market -->
<section class="market d-none">
  <div class="container" style="max-width: 1360px !important;">
    <div class="row">
      <div class="col-md-12">
        <h2><?= $lang['home']['categories']['title']; ?></h2>
        <h4><?= $lang['home']['categories']['desc']; ?></h4>
        <div class="row space80">
          <?php
          $get_categories = $db->query("select * from categories where cat_featured='yes' " . ($lang_dir == "right" ? 'order by 1 DESC LIMIT 4,4' : ' LIMIT 0,4') . "");
          while ($row_categories = $get_categories->fetch()) {
            $cat_id = $row_categories->cat_id;
            $cat_image = getImageUrl("categories", $row_categories->cat_image);
            $cat_url = $row_categories->cat_url;
            $get_meta = $db->select("cats_meta", array("cat_id" => $cat_id, "language_id" => $siteLanguage));
            $row_meta = $get_meta->fetch();
            $cat_title = $row_meta->cat_title;
          ?>
            <div class="col-md-3 col-6">
              <a href="categories/<?= $cat_url; ?>">
                <div class="grn_box">
                  <img src="<?= $cat_image; ?>" class="mx-auto d-block">
                  <p><?= $cat_title; ?></p>
                </div>
              </a>
            </div>
          <?php
          } ?>
        </div>
        <div class="space80 hidden-xs"></div>
        <div class="space20 visible-xs"></div>
        <div class="row space80">
          <?php
          $get_categories = $db->query("select * from categories where cat_featured='yes' " . ($lang_dir == "right" ? 'order by 1 DESC LIMIT 0,4' : ' LIMIT 4,4') . "");
          while ($row_categories = $get_categories->fetch()) {
            $cat_id = $row_categories->cat_id;
            $cat_image = getImageUrl("categories", $row_categories->cat_image);
            $cat_url = $row_categories->cat_url;
            $get_meta = $db->select("cats_meta", array("cat_id" => $cat_id, "language_id" => $siteLanguage));
            $row_meta = $get_meta->fetch();
            $cat_title = $row_meta->cat_title;
          ?>
            <div class="col-md-3 col-6">
              <a href="categories/<?= $cat_url; ?>">
                <div class="grn_box">
                  <img src="<?= $cat_image; ?>" class="mx-auto d-block" />
                  <p><?= $cat_title; ?></p>
                </div>
              </a>
            </div>
          <?php
          } ?>
        </div>

      </div>
    </div>
  </div>
</section>
<!-- end market -->
<!-- start timer -->
<section class="timer d-none">
  <div class="container" style="max-width: 1335px !important;">
    <div class="row">
      <?php
      $get_boxes = $db->query("select * from section_boxes where language_id='$siteLanguage' LIMIT 0,1");
      while ($row_boxes = $get_boxes->fetch()) {
        $box_id = $row_boxes->box_id;
        $box_title = $row_boxes->box_title;
        $box_desc = $row_boxes->box_desc;
        $box_image = getImageUrl("section_boxes", $row_boxes->box_image);
      ?>
        <div class="col-md-4 pad0">
          <div class="box">
            <h5><?= $box_title; ?></h5>
            <p><?= $box_desc; ?></p>
          </div>
        </div>
        <div class="col-md-4 pad0">
          <div class="blu_box">
            <img src="<?= $box_image; ?>" class="img-fluid mx-auto d-block">
          </div>
        </div>
      <?php
      } ?>
      <?php
      $get_boxes = $db->query("select * from section_boxes where language_id='$siteLanguage' LIMIT 1,100");
      while ($row_boxes = $get_boxes->fetch()) {
        $box_id = $row_boxes->box_id;
        $box_title = $row_boxes->box_title;
        $box_desc = $row_boxes->box_desc;
        $box_image = getImageUrl("section_boxes", $row_boxes->box_image);
      ?>
        <div class="col-md-4 pad0">
          <div class="box">
            <h5><?= $box_title; ?></h5>
            <p><?= $box_desc; ?></p>
          </div>
        </div>
        <div class="col-md-4 pad0">
          <div class="blu_box1">
            <img src="<?= $box_image; ?>" class="img-fluid mx-auto d-block">
          </div>
        </div>
      <?php
      } ?>
    </div>
  </div>
</section>
<!-- end timer -->
<!-- start top -->
<section class="top mb-0 d-none">
  <div class="container" style="max-width: 1360px !important;">
    <div class="row">
      <div class="col-md-12">
        <h2 class="text-center"><?= $lang['home']['proposals']['title']; ?></h2>
        <h4 class="text-center"><?= $lang['home']['proposals']['desc']; ?></h4>
        <?php
        $get_proposals = $db->query("select * from proposals where proposal_featured='yes' AND proposal_status='active'");
        $count_proposals = $get_proposals->rowCount();
        if ($count_proposals > 1) {
        ?>
          <span class="pull-right text-success"><a href="featured_proposals">View More</a></span>
        <?php
        } ?>
        <div class="mt-5">
          <!--- home-featured-carousel Starts --->
          <div class="row">
            <!--- row Starts -->
            <?php
            $get_proposals = $db->query("select * from proposals where proposal_featured='yes' OR proposal_status='active' LIMIT 0,10");
            while ($row_proposals = $get_proposals->fetch()) {
              $proposal_id = $row_proposals->proposal_id;
              $proposal_title = $row_proposals->proposal_title;
              $proposal_price = $row_proposals->proposal_price;
              if ($proposal_price == 0) {
                $get_p_1 = $db->select("proposal_packages", array("proposal_id" => $proposal_id, "package_name" => "Basic"));
                $proposal_price = $get_p_1->fetch()->price;
              }
              $proposal_img1 = getImageUrl2("proposals", "proposal_img1", $row_proposals->proposal_img1);
              $proposal_video = $row_proposals->proposal_video;
              $proposal_seller_id = $row_proposals->proposal_seller_id;
              $proposal_rating = $row_proposals->proposal_rating;
              $proposal_url = $row_proposals->proposal_url;
              $proposal_featured = $row_proposals->proposal_featured;
              $proposal_enable_referrals = $row_proposals->proposal_enable_referrals;
              $proposal_referral_money = $row_proposals->proposal_referral_money;
              if (empty($proposal_video)) {
                $video_class = "";
              } else {
                $video_class = "video-img";
              }
              $get_seller = $db->select("sellers", array("seller_id" => $proposal_seller_id));
              $row_seller = $get_seller->fetch();
              $seller_user_name = $row_seller->seller_user_name;
              $seller_image = getImageUrl2("sellers", "seller_image", $row_seller->seller_image);
              $seller_level = $row_seller->seller_level;
              $seller_status = $row_seller->seller_status;
              if (empty($seller_image)) {
                $seller_image = "empty-image.png";
              }
              // Select Proposal Seller Level
              @$seller_level = $db->select("seller_levels_meta", array("level_id" => $seller_level, "language_id" => $siteLanguage))->fetch()->title;
              $proposal_reviews = array();
              $select_buyer_reviews = $db->select("buyer_reviews", array("proposal_id" => $proposal_id));
              $count_reviews = $select_buyer_reviews->rowCount();
              while ($row_buyer_reviews = $select_buyer_reviews->fetch()) {
                $proposal_buyer_rating = $row_buyer_reviews->buyer_rating;
                array_push($proposal_reviews, $proposal_buyer_rating);
              }
              $total = array_sum($proposal_reviews);
              // @$average_rating = $total / count($proposal_reviews);
            ?>
              <div class="col-xl-2dot4 col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-4">
                <?php require("includes/proposals.php"); ?>
              </div>
            <?php
            } ?>
          </div>
          <!--- row Ends -->
        </div>
        <!--- home-featured-carousel Ends --->
      </div>
    </div>
  </div>
</section>

<script>
  $(document).ready(function() {

    var slider = $('<?= $site_url; ?>demo1').carousel({
      interval: 4000
    });

    var active = $(".carousel-item.active").find("video");
    var active_length = active.length;

    if (active_length == 1) {
      slider.carousel('pause');
      // console.log('paused');
      $(".carousel-indicators").css({
        "bottom": "90px"
      });
    }

    $("<?= $site_url; ?>demo1").on('slide.bs.carousel', function(event) {
      var eq = event.to;
      // console.log(event.from);
      // console.log(event.to);
      var video = $(event.relatedTarget).find("video");
      if (video.length == 1) {
        slider.carousel('pause');
        // console.log('paused');
        $(".carousel-indicators").css({
          "bottom": "90px"
        });
        video.trigger('play');
      } else {
        $(".carousel-indicators").css({
          "bottom": "20px"
        });
      }
    });

    $('video').on('ended', function() {
      slider.carousel({
        'pause': false
      });
      // console.log('started');
    });

  });
</script>
<script>
  let slideIntervals = [];

  function showSlides(cardIndex, n) {
    const slides = document.querySelectorAll(`.featured-card:nth-child(${cardIndex}) .slides img`);
    const dots = document.querySelectorAll(`.featured-card:nth-child(${cardIndex}) .dot`);

    let slideIndex = n;
    if (n > slides.length) slideIndex = 1;
    if (n < 1) slideIndex = slides.length;

    slides.forEach((slide) => slide.classList.remove("active"));
    dots.forEach((dot) => dot.classList.remove("active"));

    slides[slideIndex - 1].classList.add("active");
    dots[slideIndex - 1].classList.add("active");
    return slideIndex;
  }

  function currentSlide(cardIndex, n) {
    slideIntervals[cardIndex] = showSlides(cardIndex, n);
  }

  function nextSlide(cardIndex) {
    slideIntervals[cardIndex] = showSlides(cardIndex, slideIntervals[cardIndex] + 1);
  }

  function startAutoPlay(cardIndex) {
    slideIntervals[cardIndex] = 1;
    setInterval(() => nextSlide(cardIndex), 2000);
  }

  // Start autoplay for each card
  document.querySelectorAll('.featured-card').forEach((_, index) => {
    startAutoPlay(index + 1);
  });

  function toggleFavorite() {
    const button = document.querySelector('.favorite-button');
    button.classList.toggle('active');
  }

  function toggletwoFavorite() {
    const button = document.querySelector('.favorite-two-button');
    button.classList.toggle('active');
  }

  function togglethreeFavorite() {
    const button = document.querySelector('.favorite-three-button');
    button.classList.toggle('active');
  }

  function togglefourFavorite() {
    const button = document.querySelector('.favorite-four-button');
    button.classList.toggle('active');
  }
</script>