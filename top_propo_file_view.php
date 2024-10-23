<?php
error_reporting(0);
session_start();
if (isset($_SESSION['seller_user_name'])) {
    echo "<script>window.open('login','_self')</script>";
}
require_once("includes/db.php");
require_once("social-config.php");
?>
<!DOCTYPE html>
<html lang="en" class="ui-toolkit">

<head>
    <title><?= $site_name; ?>- Featured Candidates </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?= $site_desc; ?>">
    <meta name="keywords" content="<?= $site_keywords; ?>">
    <meta name="author" content="<?= $site_author; ?>">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100" rel="stylesheet">
    <link href="styles/bootstrap.css" rel="stylesheet">
    <link href="styles/styles.css" rel="stylesheet">
    <link href="styles/forHome.css" rel="stylesheet">
    <link href="styles/categories_nav_styles.css" rel="stylesheet">
    <link href="font_awesome/css/font-awesome.css" rel="stylesheet">
    <link href="styles/owl.carousel.css" rel="stylesheet">
    <link href="styles/owl.theme.default.css" rel="stylesheet">
    <link href="<?= $site_url; ?>/styles/update-style.css" rel="stylesheet">
    <link href="<?= $site_url; ?>/styles/featured-candidate-style.css" rel="stylesheet">
    <?php if (!empty($site_favicon)) { ?>
        <link rel="shortcut icon" href="<?= $site_favicon; ?>" type="image/x-icon">
    <?php } ?>
    <link href="styles/sweat_alert.css" rel="stylesheet">
    <!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
    <script src="js/ie.js"></script>
    <script type="text/javascript" src="js/sweat_alert.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>

    <style>
        .pagination {
            display: flex;
            justify-content: center;
            margin: 20px;

        }

        .pagination button {
            margin: 0 5px;
            padding: 10px;
            border: none;
            background-color: #ebebeb;
            color: #000;
            cursor: pointer;
        }

        .pagination span {
            margin: 0 5px;
            padding: 10px;
            cursor: pointer;
        }

        .pagination span.active {
            font-weight: bold;
            color: #00cedc;
            text-decoration: underline;
        }

        /* .outer_div_section_style {
            border: 2px solid #00ccdc;
            width: 100%;
            margin: auto;
        }

        .img_div_section_style {
            
            width: 50%;
            border-radius: 40%;
            margin-left: auto;
            margin-right: auto;
            display: block;

        }

        .view_profile_btn_style {
            width: 145px;
            border: none;
            height: 50px;
        }

        .hire_me_btn_style {
            width: 145px;
            border: none;
            height: 50px;
        }

        .per_hour_charges_style {
            font-weight: bold;
            color: grey;
            padding-left: 10px;
        }

        .name_section_style {
            color: red;
            text-align: center;
        }

        .headline_section_style {
            color: #007bff;
            text-align: center;
            overflow: hidden;
        }

        .add_country_style {
            margin-left: 80px;
        }

        .unorder-list-style {
            list-style-type: none;
            margin-left: -20px;
        }

        .rating-order-list-style {
            display: flex;
        }

        .display-flex-style {
            display: flex;
            margin: auto;
            width: 100%;
            justify-content: center;
            align-items: center;
        }

        .input_bar_styling {
            height: 100px;
            
            border: px solid black;
            margin-top: 20px;
        }

        .lens_frames_styling {
            height: 40px;
            
            border: px solid black;
            float: right;
        }

        .input_section_styles {
            background-color: #fff;
            border: 1px solid gray;
            width: 300px;
            height: 45px;
            border-radius: 28px 0px 0px 28px;
            margin-right: -4px;
            padding-left: 20px;
        }

        .input_section_styles:hover {
            background-color: white;
            border: 2px solid black;
        }

        .sumbit_button_style {
            background-color: lightgray;
            width: 120px;
            height: 45.2px;
            border: 1px solid gray;
            border-radius: 0px 28px 28px 0px;
        }

        .sumbit_button_style:hover {
            background-color: white;
            border: 2px solid black;
        }



        .pagination {
            display: flex;
            margin: auto;
            border: 1px solid lightgray;
            width: fit-content;
            background-color: lightgray;
            font-weight: 600;
            border-radius: 20px;
        }

        .pagination a {
            color: black;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
        }


        .A-whole-world {
            background-color: #f1fef7;
   
            height: 500px;
            
            font-size: 28px;
            color: gray;
            padding: 70px 80px 0px 80px;
        }

        .the-best-for {
            color: black;
            font-size: 35px;
            font-weight: 900;
            padding: 0px 50px 20px 0px;
            text-align: justify;
            
        }

        .heading-001 {
            font-size: 18px;
            padding: 0px 50px 0px 0px;
            text-indent: 0px;
            text-align: justify;
        } */

        /* category-list-start-section */

        /* .container-category-list {
            background-color: none;
            padding-left: 80px;
            height: 550px;
        }

        .container-category-list div h1 {
            color: #00C8D4;
            font-size: 40px;
            margin: 20px 0px 60px 0px;
        }

        .container-category-detail div {
            background-color: none;
            display: block;
            padding: 50px 100px 50px 100px;
            margin-bottom: 40px;
            text-align: center;
            justify-content: center;
            margin: auto;
            width: 393px;
        }

        .container-category-detail div p {
            font-family: Macan, Helvetica Neue, Helvetica, Arial, sans-serif;
            color: #00C8D4;
            margin-top: 10px;
            font-size: 18px;
        }

        .container-category-detail div img {
            height: 100px;
            width: 100px;
            border: 1px solid #00C8D4;
            border-radius: 30px 0px;
            padding: 0px;
        }

        .top-services-1 {
            
            margin: auto;
            width: 100%;

        }

        .top-Services {
            
            margin-left: 95px;
            text-align: left;
           
            color: #00C8D4;
            font-size: 40px !important;
            font-weight: 900;
           
        } */


        /* ##########################  view all start  #################################### */

        /* ########################  pagination start ############################## */

        /* .outer_page_styling {
           
            height: 72px;
        }

        .inner_page_styling {
            background-color: white;
            
            height: 70px;
            margin-top: 40px;
            text-align: center;
        } */

        /* btn theme-bg text-white */
        /* .view_all_styling {
           
            padding: 10px 25px;
            border-radius: 4px;
            background-color: #00C8D4;
            color: white;
            float: right;
        } */




        /* .t_p_c_section_1 {
            box-shadow: 0px 0px 7px 2px lightslategray, inset 2px 2px 50px lightblue;
            border-radius: 40px !important;
        }


        #disp-lay-fl-ex {
           
            margin: auto;
        }

        .border-radius-black button {
            border-radius: 22px !important;
           
            box-shadow: 0px 0px 5px black;
        }

        @media (max-width:768px) {
            .home-section601 {
                margin-top: 35px;
            }

            .home-section6 {
                border: 1px solid #f1fef7;
            }

            .t_p_c_section {
              
                width: 100% !important;
            }

            .t_p_c_section_1 {
                
                box-shadow: 0px 0px 7px 2px lightslategray, inset 2px 2px 50px lightblue;
                border-radius: 40px !important;
            }

            #disp-lay-fl-ex {
                
                margin: auto;
            } */

        /* ############################# */
        /* .mobile_responsive_screen {
                display: block;

            }

            #hire-me-styling-res {
                padding: 0px;
                
                width: 100%;
            }

            #view-profile-styling-res {
                padding: 0px;
                border: 2px solid #00C8D4;
                width: 100%;
            }

            .pagination_style_first {
                background-color: lightgray;
                border-radius: 1px;
                display: inline;
                text-decoration: none;
                padding: 10px 10px;
                font-weight: 600;
                font-size: 12px;
                font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            }

            .pagination_style_first:hover {
                background-color: #00C8D4;
            }

            .btn-view-hire-respo {
                
                margin: auto;
                width: 100%;
            }

            .second-class-respo {
                
                font-size: 13px;
                margin-left: 5px;
                margin-right: 5px;
            }



        } */

        /* ########################### pagination end ################################# */


        /* ############  startresponsive for scr 768-1600  ############### */
        /* @media (min-width:768px) and (max-width:1600px) {
            #disp-lay-fl-ex {
                
                display: block;
                margin-top: 50px;
            }

            .mobile_responsive_screen {
                display: flow-root;
               
                width: 90%;
                flex-flow: wrap;
                
               
            }

            .outer-frame-for-tpc {
                width: 33%;
                float: left;
                
            }

            #hire-me-styling-res {
                padding: 0px;
                
                width: 100%;
            }

            #view-profile-styling-res {
                padding: 0px;
               
                width: 100%;
            }

            .pagination_style_first {
                background-color: #f0f2fc;
                border-radius: 1px;
                display: inline;
                text-decoration: none;
                padding: 15px 20px;
                margin: 1px 3px;
                font-weight: 600;
                font-size: 12px;
                font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            }

            .pagination_style_first:hover {
                background-color: #00C8D4;
                color: white !important;
            }

            .btn-view-hire-respo {
                margin: auto;
                width: 100%;
            }

            .second-class-respo {
                font-size: 13px;
                margin-left: 5px;
                margin-right: 5px;
            }
        } */

        /* ############  startresponsive for scr 768-1600  ############### */
        /* @media(max-width:420px) {
            #uno-rder-list-respo {
                padding-top: 18px !important;
                padding-right: 0px !important;
            }
        }


        @media(max-width:768px) and (min-width:640px) {
            #uno-rder-list-respo {
                padding-top: 18px !important;
                padding-right: 0px !important;
            }

            .gnav-header #mobilemenu {
                padding-top: 16px !important;
                margin-left: 2px;
                padding-left: 2px !important;
            }
        }

        @media(max-width:639px) and (min-width:421px) {
            #uno-rder-list-respo {
                padding-top: 18px !important;
                padding-right: 0px !important;
            }
        }

        @media(max-width:1024px) and (min-width:769px) {
            #uno-rder-list-respo {
                padding-top: 18px !important;
                padding-right: 0px !important;
            }

            .gnav-header #mobilemenu {
                padding-top: 16px !important;
                margin-left: 2px;
                padding-left: 2px !important;
            }

            .home-section601 {
                margin-top: 38px;
            }
        }

        @media(max-width:1023px) and (min-width:992px) {
            #uno-rder-list-respo {
                padding-top: 18px !important;
                padding-right: 0px !important;
            }
        }

        @media (max-width:991px) and (min-width:900px) {
            #uno-rder-list-respo {
                padding-top: 18px !important;
                padding-right: 7px !important;
            }
        } */
    </style>

</head>

<body class="is-responsive">
    <?php require_once("includes/header.php"); ?>
    <!-- <div class=" pt-5 home-section6 home-section601 bg-white">
        <h2 style="text-align: center;" class="font-weight-bold">Featured Candidates</h2>
        <P style=" text-align: center;" class="text-muted">Leading Employers already using job and talent.</P>
        <div class="nitin-1 mobile_responsive_screen">

            <?php
            $limit = 9;
            $query1 =   $query1 = $db->query("SELECT * FROM sellers s INNER JOIN memb_plan_detail mpd ON s.seller_id = mpd.seller_id AND memb_status = 'Active' AND mpd.memb_tbl_id = 10");
            $total_record = $query1->rowCount();
            $total_pages = ceil($total_record / $limit);

            if (!isset($_GET["top_propo_file_view"])) {
                $page_number = 1;
            } else {
                $page_number = $_GET["top_propo_file_view"];
            }

            $initial_page = ($page_number - 1) * $limit;

            ?>

            <?php

            $query1 = $db->query("SELECT s.* FROM sellers s INNER JOIN memb_plan_detail mpd ON s.seller_id = mpd.seller_id AND memb_status = 'Active' AND mpd.memb_tbl_id = 10 LIMIT $initial_page , $limit");
            while ($get1_data = $query1->fetch()) {
                $seller_image = getImageUrl("sellers", $get1_data->seller_image);
                $seller_name = $get1_data->seller_name;
                $seller_id = $get1_data->seller_id;
                $seller_user_name = $get1_data->seller_user_name;
                $seller_city = $get1_data->seller_city;
                $seller_country = $get1_data->seller_country;
                $seller_headline = $get1_data->seller_headline;

                $quwery_1 = $db->query("SELECT * FROM proposals where proposal_seller_id = $seller_id");
                $picture1 = $quwery_1->fetch();
                $proposal_rating = $picture1->proposal_rating;
                $proposal_url = $picture1->proposal_url;
                $proposal_title = $picture1->proposal_title;
                $proposal_img1 = $picture1->proposal_img1;
                $proposal_desc = $picture1->proposal_desc;
            ?>
                <div class="outer-frame-for-tpc">
                    <div class="nitin-2" id="disp-lay-fl-ex">
                        <div class="col-xl-12">
                            <div class="rampal t_p_c_section">
                                <div class="col-md-12 mb-5">
                                    <div class="card pt-0 t_p_c_section_1">
                                        <div class="d-flex justify-content-space-between px-4 align-items-center position-relative" style="top: 15px;">
                                            <label class="mb-0 text-secondary font-weight-bold">$60/Hr</label>
                                            <i class="fa fa-heart rounded-circle d-flex justify-content-center align-items-center"></i>
                                        </div>
                                        <div class="d-flex flex-column align-items-center">
                                            <div class="rounded-circle overflow-hidden d-flex justify-content-center align-items-center user-pic">
                                                <img class="w-100 h-100" src="<?php echo $seller_image ?>" alt="Image not found">
                                            </div>
                                            <div class="my-4 text-center">
                                                <h3 class="mb-0 "><?php echo $seller_name; ?></h3>
                                                <p class="px-3 text-primary"><?php echo $seller_headline ?></p>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-between px-5">
                                            <ul class="list-inline text-muted second-class-respo">
                                                <li class="list-inline-item">
                                                    <?php for ($seller_i = 0; $seller_i < $proposal_rating; $seller_i++) {
                                                        echo "<i class='fa fa-star'></i>";
                                                    }
                                                    for ($seller_i = $proposal_rating; $seller_i < 5; $seller_i++) {
                                                        echo " <i class='fa fa-star-o'></i> ";
                                                    }

                                                    ?>
                                                </li>
                                            </ul>
                                            <span class="font-weight-bold second-class-respo"><i class="fa fa-map-marker mr-2"></i><?php echo $seller_city . " " . $seller_country; ?></span>
                                        </div>
                                        <div class="d-flex btn-view-hire-respo border-radius-black">
                                            <a href="<?= $seller_user_name; ?>" class="btn-view-hire-respo pl-3 pr-2 py-3">
                                                <button class="btn w-100 py-3 theme-btn text-white rounded-0">
                                                    View Profile
                                                </button>
                                            </a>
                                            <a href="#" data-toggle="modal" data-target="#login-modal" class="btn-view-hire-respo pl-2 pr-3 py-3">
                                                <button class="btn w-100 py-3 btn-white text-primary rounded-0">
                                                    Hire Me
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div> -->
    <!-- ######################################## -->


    <!-- nitin created design by featured candidate section  -->
    <div
        class="home-section3 body-max-width px-3 pt-2 mb-5 ">
        <div class="cards">
            <div class="align-items-center" id="top-propo-div-respon">
                <h5 class="my-0 text-center textdarkheadingempowerTps">Featured candidates</h5>
            </div>
        </div>
        <h2 class="text-center ">Leading employers already using job and talent.</h2>

        <!-- start of top proposal section-->
        <div class="container-top-proposal">
            <div class="container-top-proposal-row">
                <div class="featured-main-container">
                    <!-- f-1 -->
                    <div class="featured-card">
                        <div class="featured-main-header">
                            <div class="profile-picture">
                                <img src="https://hmpnitintesting.itsoftexpert.net///user_images/pic_1721118582.png" alt="Profile Picture">
                            </div>
                            <div class="profile-info">
                                <h3><span class="online-indicator"></span> Sumit kumar</h3>
                                <p class="feature-main-text">Lorem ipsum dolor sit amet, consectetur.......</p>
                                <div class="rating">
                                    <span>⭐ 4.9</span> <span>(1,708)</span>
                                </div>
                            </div>
                            <button class="favorite-button" onclick="toggleFavorite(this)">
                                <i class="fa-regular fa-heart"></i>
                            </button>
                        </div>
                        <div class="featured-main-tags">
                            <span>Email Template</span>
                            <span>Next.js</span>
                            <span>+17</span>
                        </div>
                        <div class="slider featured-main-slider">
                            <div class="slides">
                                <!-- Different images for Card 1 -->
                                <img src="https://plus.unsplash.com/premium_photo-1681666713641-8d722b681edc?w=500&auto=format&fit=crop&q=60" alt="Image 1">
                                <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=500&auto=format&fit=crop&q=60" alt="Image 2">
                                <img src="https://plus.unsplash.com/premium_photo-1681666713641-8d722b681edc?w=500&auto=format&fit=crop&q=60" alt="Image 3">
                            </div>
                            <div class="dots">
                                <span class="dot" onclick="currentSlide(1, 1)"></span>
                                <span class="dot" onclick="currentSlide(1, 2)"></span>
                                <span class="dot" onclick="currentSlide(1, 3)"></span>
                            </div>
                        </div>
                        <div class="featured-main-footer">
                            <p>From <br><strong>$195</strong>/project</p>
                            <a class="featured-chat-icon" href=""><i class="fa-duotone fa-solid fa-comment"></i></a>
                            <button class="see-profile-button">See profile</button>
                        </div>
                    </div>

                    <!-- f-2 -->
                    <div class="featured-card">
                        <div class="featured-main-header">
                            <div class="profile-picture">
                                <img src="https://hmpnitintesting.itsoftexpert.net///user_images/pic_1721118582.png" alt="Profile Picture">
                            </div>
                            <div class="profile-info">
                                <h3><span class="online-indicator"></span> Sumit kumar</h3>
                                <p class="feature-main-text">Lorem ipsum dolor sit amet, consectetur.......</p>
                                <div class="rating">
                                    <span>⭐ 4.9</span> <span>(1,708)</span>
                                </div>
                            </div>
                            <button class="favorite-two-button" onclick="toggletwoFavorite(this)">
                                <i class="fa-regular fa-heart"></i>
                            </button>
                        </div>
                        <div class="featured-main-tags">
                            <span>Email Template</span>
                            <span>Next.js</span>
                            <span>+17</span>
                        </div>
                        <div class="slider featured-main-slider">
                            <div class="slides">
                                <img src="https://plus.unsplash.com/premium_photo-1678565999332-1cde462f7b24?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OXx8d2Vic2l0ZXxlbnwwfHwwfHx8MA%3D%3D" alt="Image 1">
                                <img src="https://images.unsplash.com/photo-1517048676732-d65bc937f952?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTh8fHdlYnNpdGV8ZW58MHx8MHx8fDA%3D" alt="Image 2">
                                <img src="https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjB8fHdlYnNpdGV8ZW58MHx8MHx8fDA%3D" alt="Image 3">
                            </div>
                            <div class="dots">
                                <span class="dot" onclick="currentSlide(2, 1)"></span>
                                <span class="dot" onclick="currentSlide(2, 2)"></span>
                                <span class="dot" onclick="currentSlide(2, 3)"></span>
                            </div>
                        </div>
                        <div class="featured-main-footer">
                            <p>From <br><strong>$195</strong>/project</p>
                            <a class="featured-chat-icon" href=""><i class="fa-duotone fa-solid fa-comment"></i></a>
                            <button class="see-profile-button">See profile</button>
                        </div>
                    </div>
                    <!-- f-3 -->

                    <div class="featured-card">
                        <div class="featured-main-header">
                            <div class="profile-picture">
                                <img src="https://hmpnitintesting.itsoftexpert.net///user_images/pic_1721118582.png" alt="Profile Picture">
                            </div>
                            <div class="profile-info">
                                <h3><span class="online-indicator"></span> Sumit kumar</h3>
                                <p class="feature-main-text">Lorem ipsum dolor sit amet, consectetur.......</p>
                                <div class="rating">
                                    <span>⭐ 4.9</span> <span>(1,708)</span>
                                </div>
                            </div>
                            <button class="favorite-three-button" onclick="togglethreeFavorite(this)">
                                <i class="fa-regular fa-heart"></i>
                            </button>
                        </div>
                        <div class="featured-main-tags">
                            <span>Email Template</span>
                            <span>Next.js</span>
                            <span>+17</span>
                        </div>
                        <div class="slider featured-main-slider">
                            <div class="slides">
                                <img src="https://media.istockphoto.com/id/508498442/photo/man-using-laptop-working-on-plan-to-increase-website-traffic.webp?a=1&b=1&s=612x612&w=0&k=20&c=RzNNYwU9iTOFVRBv_6eB8kYPTIdGP0YzKLCOsYE7H-U=" alt="Image 1">
                                <img src="https://media.istockphoto.com/id/1398473177/photo/questionnaire-with-checkboxes-filling-survey-form-online-answer-questions.webp?a=1&b=1&s=612x612&w=0&k=20&c=yfGyijQDY6Toe7ucQFFsnPwy-tC5JKPEkIaJ2SMF-fs=" alt="Image 2">
                                <img src="https://media.istockphoto.com/id/1062674570/photo/purchasing-thing-online.webp?a=1&b=1&s=612x612&w=0&k=20&c=rIcG89F3Z1KVgHsD3JgBKcIzMIlqy5cKnXW4Rxwnrl8=" alt="Image 3">
                            </div>
                            <div class="dots">
                                <span class="dot" onclick="currentSlide(3, 1)"></span>
                                <span class="dot" onclick="currentSlide(3, 2)"></span>
                                <span class="dot" onclick="currentSlide(3, 3)"></span>
                            </div>
                        </div>
                        <div class="featured-main-footer">
                            <p>From <br><strong>$195</strong>/project</p>
                            <a class="featured-chat-icon" href=""><i class="fa-duotone fa-solid fa-comment"></i></a>
                            <button class="see-profile-button">See profile</button>
                        </div>
                    </div>

                    <!-- f-4 -->
                    <div class="featured-card">
                        <div class="featured-main-header">
                            <div class="profile-picture">
                                <img src="https://hmpnitintesting.itsoftexpert.net///user_images/pic_1721118582.png" alt="Profile Picture">
                            </div>
                            <div class="profile-info">
                                <h3><span class="online-indicator"></span> Sumit kumar</h3>
                                <p class="feature-main-text">Lorem ipsum dolor sit amet, consectetur.......</p>
                                <div class="rating">
                                    <span>⭐ 4.9</span> <span>(1,708)</span>
                                </div>
                            </div>
                            <button class="favorite-four-button" onclick="togglefourFavorite(this)">
                                <i class="fa-regular fa-heart"></i>
                            </button>
                        </div>
                        <div class="featured-main-tags">
                            <span>Email Template</span>
                            <span>Next.js</span>
                            <span>+17</span>
                        </div>
                        <div class="slider featured-main-slider">
                            <div class="slides">
                                <img src="https://media.istockphoto.com/id/1477183258/photo/woman-holding-ai-icons-with-laptop.webp?a=1&b=1&s=612x612&w=0&k=20&c=RTy3cj2HXeN3LBwpCvFtTvv2G8DIDh5S6-U-iCkEXSc=" alt="Image 1">
                                <img src="https://media.istockphoto.com/id/1464536813/photo/happy-business-people-technology-and-planning-in-cafe-collaboration-on-website-branding-logo.webp?a=1&b=1&s=612x612&w=0&k=20&c=b0kYyv6mh3kyqP4vLJKaP8EQEWzQ3H0LpDnvXs4OykE=" alt="Image 2">
                                <img src="https://media.istockphoto.com/id/1700212440/photo/update-software-application-and-hardware-upgrade-technology-concept-firmware-or-operating.webp?a=1&b=1&s=612x612&w=0&k=20&c=hHjC1xjpYdDb6tBYPhmPyyLu0RIV87eq6nNcPNk5k9c=" alt="Image 3">
                            </div>
                            <div class="dots">
                                <span class="dot" onclick="currentSlide(4, 1)"></span>
                                <span class="dot" onclick="currentSlide(4, 2)"></span>
                                <span class="dot" onclick="currentSlide(4, 3)"></span>
                            </div>
                        </div>
                        <div class="featured-main-footer">
                            <p>From <br><strong>$195</strong>/project</p>
                            <a class="featured-chat-icon" href=""><i class="fa-duotone fa-solid fa-comment"></i></a>
                            <button class="see-profile-button">See profile</button>
                        </div>
                    </div>

                    <!-- f-5 -->
                    <div class="featured-card">
                        <div class="featured-main-header">
                            <div class="profile-picture">
                                <img src="https://hmpnitintesting.itsoftexpert.net///user_images/pic_1721118582.png" alt="Profile Picture">
                            </div>
                            <div class="profile-info">
                                <h3><span class="online-indicator"></span> Sumit kumar</h3>
                                <p class="feature-main-text">Lorem ipsum dolor sit amet, consectetur.......</p>
                                <div class="rating">
                                    <span>⭐ 4.9</span> <span>(1,708)</span>
                                </div>
                            </div>
                            <button class="favorite-four-button" onclick="togglefourFavorite(this)">
                                <i class="fa-regular fa-heart"></i>
                            </button>
                        </div>
                        <div class="featured-main-tags">
                            <span>Email Template</span>
                            <span>Next.js</span>
                            <span>+17</span>
                        </div>
                        <div class="slider featured-main-slider">
                            <div class="slides">
                                <img src="https://media.istockphoto.com/id/1477183258/photo/woman-holding-ai-icons-with-laptop.webp?a=1&b=1&s=612x612&w=0&k=20&c=RTy3cj2HXeN3LBwpCvFtTvv2G8DIDh5S6-U-iCkEXSc=" alt="Image 1">
                                <img src="https://media.istockphoto.com/id/1464536813/photo/happy-business-people-technology-and-planning-in-cafe-collaboration-on-website-branding-logo.webp?a=1&b=1&s=612x612&w=0&k=20&c=b0kYyv6mh3kyqP4vLJKaP8EQEWzQ3H0LpDnvXs4OykE=" alt="Image 2">
                                <img src="https://media.istockphoto.com/id/1700212440/photo/update-software-application-and-hardware-upgrade-technology-concept-firmware-or-operating.webp?a=1&b=1&s=612x612&w=0&k=20&c=hHjC1xjpYdDb6tBYPhmPyyLu0RIV87eq6nNcPNk5k9c=" alt="Image 3">
                            </div>
                            <div class="dots">
                                <span class="dot" onclick="currentSlide(4, 1)"></span>
                                <span class="dot" onclick="currentSlide(4, 2)"></span>
                                <span class="dot" onclick="currentSlide(4, 3)"></span>
                            </div>
                        </div>
                        <div class="featured-main-footer">
                            <p>From <br><strong>$195</strong>/project</p>
                            <a class="featured-chat-icon" href=""><i class="fa-duotone fa-solid fa-comment"></i></a>
                            <button class="see-profile-button">See profile</button>
                        </div>
                    </div>

                    <!-- f-6 -->
                    <div class="featured-card">
                        <div class="featured-main-header">
                            <div class="profile-picture">
                                <img src="https://hmpnitintesting.itsoftexpert.net///user_images/pic_1721118582.png" alt="Profile Picture">
                            </div>
                            <div class="profile-info">
                                <h3><span class="online-indicator"></span> Sumit kumar</h3>
                                <p class="feature-main-text">Lorem ipsum dolor sit amet, consectetur.......</p>
                                <div class="rating">
                                    <span>⭐ 4.9</span> <span>(1,708)</span>
                                </div>
                            </div>
                            <button class="favorite-four-button" onclick="togglefourFavorite(this)">
                                <i class="fa-regular fa-heart"></i>
                            </button>
                        </div>
                        <div class="featured-main-tags">
                            <span>Email Template</span>
                            <span>Next.js</span>
                            <span>+17</span>
                        </div>
                        <div class="slider featured-main-slider">
                            <div class="slides">
                                <img src="https://media.istockphoto.com/id/1477183258/photo/woman-holding-ai-icons-with-laptop.webp?a=1&b=1&s=612x612&w=0&k=20&c=RTy3cj2HXeN3LBwpCvFtTvv2G8DIDh5S6-U-iCkEXSc=" alt="Image 1">
                                <img src="https://media.istockphoto.com/id/1464536813/photo/happy-business-people-technology-and-planning-in-cafe-collaboration-on-website-branding-logo.webp?a=1&b=1&s=612x612&w=0&k=20&c=b0kYyv6mh3kyqP4vLJKaP8EQEWzQ3H0LpDnvXs4OykE=" alt="Image 2">
                                <img src="https://media.istockphoto.com/id/1700212440/photo/update-software-application-and-hardware-upgrade-technology-concept-firmware-or-operating.webp?a=1&b=1&s=612x612&w=0&k=20&c=hHjC1xjpYdDb6tBYPhmPyyLu0RIV87eq6nNcPNk5k9c=" alt="Image 3">
                            </div>
                            <div class="dots">
                                <span class="dot" onclick="currentSlide(4, 1)"></span>
                                <span class="dot" onclick="currentSlide(4, 2)"></span>
                                <span class="dot" onclick="currentSlide(4, 3)"></span>
                            </div>
                        </div>
                        <div class="featured-main-footer">
                            <p>From <br><strong>$195</strong>/project</p>
                            <a class="featured-chat-icon" href=""><i class="fa-duotone fa-solid fa-comment"></i></a>
                            <button class="see-profile-button">See profile</button>
                        </div>
                    </div>

                    <!-- f-7 -->
                    <div class="featured-card">
                        <div class="featured-main-header">
                            <div class="profile-picture">
                                <img src="https://hmpnitintesting.itsoftexpert.net///user_images/pic_1721118582.png" alt="Profile Picture">
                            </div>
                            <div class="profile-info">
                                <h3><span class="online-indicator"></span> Sumit kumar</h3>
                                <p class="feature-main-text">Lorem ipsum dolor sit amet, consectetur.......</p>
                                <div class="rating">
                                    <span>⭐ 4.9</span> <span>(1,708)</span>
                                </div>
                            </div>
                            <button class="favorite-four-button" onclick="togglefourFavorite(this)">
                                <i class="fa-regular fa-heart"></i>
                            </button>
                        </div>
                        <div class="featured-main-tags">
                            <span>Email Template</span>
                            <span>Next.js</span>
                            <span>+17</span>
                        </div>
                        <div class="slider featured-main-slider">
                            <div class="slides">
                                <img src="https://media.istockphoto.com/id/1477183258/photo/woman-holding-ai-icons-with-laptop.webp?a=1&b=1&s=612x612&w=0&k=20&c=RTy3cj2HXeN3LBwpCvFtTvv2G8DIDh5S6-U-iCkEXSc=" alt="Image 1">
                                <img src="https://media.istockphoto.com/id/1464536813/photo/happy-business-people-technology-and-planning-in-cafe-collaboration-on-website-branding-logo.webp?a=1&b=1&s=612x612&w=0&k=20&c=b0kYyv6mh3kyqP4vLJKaP8EQEWzQ3H0LpDnvXs4OykE=" alt="Image 2">
                                <img src="https://media.istockphoto.com/id/1700212440/photo/update-software-application-and-hardware-upgrade-technology-concept-firmware-or-operating.webp?a=1&b=1&s=612x612&w=0&k=20&c=hHjC1xjpYdDb6tBYPhmPyyLu0RIV87eq6nNcPNk5k9c=" alt="Image 3">
                            </div>
                            <div class="dots">
                                <span class="dot" onclick="currentSlide(4, 1)"></span>
                                <span class="dot" onclick="currentSlide(4, 2)"></span>
                                <span class="dot" onclick="currentSlide(4, 3)"></span>
                            </div>
                        </div>
                        <div class="featured-main-footer">
                            <p>From <br><strong>$195</strong>/project</p>
                            <a class="featured-chat-icon" href=""><i class="fa-duotone fa-solid fa-comment"></i></a>
                            <button class="see-profile-button">See profile</button>
                        </div>
                    </div>

                    <!-- f-8 -->
                    <div class="featured-card">
                        <div class="featured-main-header">
                            <div class="profile-picture">
                                <img src="https://hmpnitintesting.itsoftexpert.net///user_images/pic_1721118582.png" alt="Profile Picture">
                            </div>
                            <div class="profile-info">
                                <h3><span class="online-indicator"></span> Sumit kumar</h3>
                                <p class="feature-main-text">Lorem ipsum dolor sit amet, consectetur.......</p>
                                <div class="rating">
                                    <span>⭐ 4.9</span> <span>(1,708)</span>
                                </div>
                            </div>
                            <button class="favorite-four-button" onclick="togglefourFavorite(this)">
                                <i class="fa-regular fa-heart"></i>
                            </button>
                        </div>
                        <div class="featured-main-tags">
                            <span>Email Template</span>
                            <span>Next.js</span>
                            <span>+17</span>
                        </div>
                        <div class="slider featured-main-slider">
                            <div class="slides">
                                <img src="https://media.istockphoto.com/id/1477183258/photo/woman-holding-ai-icons-with-laptop.webp?a=1&b=1&s=612x612&w=0&k=20&c=RTy3cj2HXeN3LBwpCvFtTvv2G8DIDh5S6-U-iCkEXSc=" alt="Image 1">
                                <img src="https://media.istockphoto.com/id/1464536813/photo/happy-business-people-technology-and-planning-in-cafe-collaboration-on-website-branding-logo.webp?a=1&b=1&s=612x612&w=0&k=20&c=b0kYyv6mh3kyqP4vLJKaP8EQEWzQ3H0LpDnvXs4OykE=" alt="Image 2">
                                <img src="https://media.istockphoto.com/id/1700212440/photo/update-software-application-and-hardware-upgrade-technology-concept-firmware-or-operating.webp?a=1&b=1&s=612x612&w=0&k=20&c=hHjC1xjpYdDb6tBYPhmPyyLu0RIV87eq6nNcPNk5k9c=" alt="Image 3">
                            </div>
                            <div class="dots">
                                <span class="dot" onclick="currentSlide(4, 1)"></span>
                                <span class="dot" onclick="currentSlide(4, 2)"></span>
                                <span class="dot" onclick="currentSlide(4, 3)"></span>
                            </div>
                        </div>
                        <div class="featured-main-footer">
                            <p>From <br><strong>$195</strong>/project</p>
                            <a class="featured-chat-icon" href=""><i class="fa-duotone fa-solid fa-comment"></i></a>
                            <button class="see-profile-button">See profile</button>
                        </div>
                    </div>
                    <!-- f-9 -->
                    <div class="featured-card">
                        <div class="featured-main-header">
                            <div class="profile-picture">
                                <img src="https://hmpnitintesting.itsoftexpert.net///user_images/pic_1721118582.png" alt="Profile Picture">
                            </div>
                            <div class="profile-info">
                                <h3><span class="online-indicator"></span> Sumit kumar</h3>
                                <p class="feature-main-text">Lorem ipsum dolor sit amet, consectetur.......</p>
                                <div class="rating">
                                    <span>⭐ 4.9</span> <span>(1,708)</span>
                                </div>
                            </div>
                            <button class="favorite-four-button" onclick="togglefourFavorite(this)">
                                <i class="fa-regular fa-heart"></i>
                            </button>
                        </div>
                        <div class="featured-main-tags">
                            <span>Email Template</span>
                            <span>Next.js</span>
                            <span>+17</span>
                        </div>
                        <div class="slider featured-main-slider">
                            <div class="slides">
                                <img src="https://media.istockphoto.com/id/1477183258/photo/woman-holding-ai-icons-with-laptop.webp?a=1&b=1&s=612x612&w=0&k=20&c=RTy3cj2HXeN3LBwpCvFtTvv2G8DIDh5S6-U-iCkEXSc=" alt="Image 1">
                                <img src="https://media.istockphoto.com/id/1464536813/photo/happy-business-people-technology-and-planning-in-cafe-collaboration-on-website-branding-logo.webp?a=1&b=1&s=612x612&w=0&k=20&c=b0kYyv6mh3kyqP4vLJKaP8EQEWzQ3H0LpDnvXs4OykE=" alt="Image 2">
                                <img src="https://media.istockphoto.com/id/1700212440/photo/update-software-application-and-hardware-upgrade-technology-concept-firmware-or-operating.webp?a=1&b=1&s=612x612&w=0&k=20&c=hHjC1xjpYdDb6tBYPhmPyyLu0RIV87eq6nNcPNk5k9c=" alt="Image 3">
                            </div>
                            <div class="dots">
                                <span class="dot" onclick="currentSlide(4, 1)"></span>
                                <span class="dot" onclick="currentSlide(4, 2)"></span>
                                <span class="dot" onclick="currentSlide(4, 3)"></span>
                            </div>
                        </div>
                        <div class="featured-main-footer">
                            <p>From <br><strong>$195</strong>/project</p>
                            <a class="featured-chat-icon" href=""><i class="fa-duotone fa-solid fa-comment"></i></a>
                            <button class="see-profile-button">See profile</button>
                        </div>
                    </div>
                    <!-- f-10 -->
                    <div class="featured-card">
                        <div class="featured-main-header">
                            <div class="profile-picture">
                                <img src="https://hmpnitintesting.itsoftexpert.net///user_images/pic_1721118582.png" alt="Profile Picture">
                            </div>
                            <div class="profile-info">
                                <h3><span class="online-indicator"></span> Sumit kumar</h3>
                                <p class="feature-main-text">Lorem ipsum dolor sit amet, consectetur.......</p>
                                <div class="rating">
                                    <span>⭐ 4.9</span> <span>(1,708)</span>
                                </div>
                            </div>
                            <button class="favorite-four-button" onclick="togglefourFavorite(this)">
                                <i class="fa-regular fa-heart"></i>
                            </button>
                        </div>
                        <div class="featured-main-tags">
                            <span>Email Template</span>
                            <span>Next.js</span>
                            <span>+17</span>
                        </div>
                        <div class="slider featured-main-slider">
                            <div class="slides">
                                <img src="https://media.istockphoto.com/id/1477183258/photo/woman-holding-ai-icons-with-laptop.webp?a=1&b=1&s=612x612&w=0&k=20&c=RTy3cj2HXeN3LBwpCvFtTvv2G8DIDh5S6-U-iCkEXSc=" alt="Image 1">
                                <img src="https://media.istockphoto.com/id/1464536813/photo/happy-business-people-technology-and-planning-in-cafe-collaboration-on-website-branding-logo.webp?a=1&b=1&s=612x612&w=0&k=20&c=b0kYyv6mh3kyqP4vLJKaP8EQEWzQ3H0LpDnvXs4OykE=" alt="Image 2">
                                <img src="https://media.istockphoto.com/id/1700212440/photo/update-software-application-and-hardware-upgrade-technology-concept-firmware-or-operating.webp?a=1&b=1&s=612x612&w=0&k=20&c=hHjC1xjpYdDb6tBYPhmPyyLu0RIV87eq6nNcPNk5k9c=" alt="Image 3">
                            </div>
                            <div class="dots">
                                <span class="dot" onclick="currentSlide(4, 1)"></span>
                                <span class="dot" onclick="currentSlide(4, 2)"></span>
                                <span class="dot" onclick="currentSlide(4, 3)"></span>
                            </div>
                        </div>
                        <div class="featured-main-footer">
                            <p>From <br><strong>$195</strong>/project</p>
                            <a class="featured-chat-icon" href=""><i class="fa-duotone fa-solid fa-comment"></i></a>
                            <button class="see-profile-button">See profile</button>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <div class="pagination">
        <button class="prev" onclick="changePage(-1)">&#10094; Prev</button>
        <span id="page-numbers"></span>
        <button class="next" onclick="changePage(1)">Next &#10095;</button>
    </div>


    <!-- nitin created design by featured candidate section  -->

    <!-- <div class="outer_page_styling">
        <div class="inner_page_styling">
            <?php
            echo "<a href='top_propo_file_view?$page=1'><li class='pagination_style_first'>FIRST</li></a>";
            for ($page_number = 1; $page_number <= $total_pages; $page_number++) {
                echo "<a href='top_propo_file_view?$page=" . $page_number . "'><li class='pagination_style_first'>" . $page_number . "</li></a>";
            }
            echo "<a href='top_propo_file_view?$page=" . $total_pages . "'><li class='pagination_style_first' id='disHidden'><span  class='last_page_style'>PREV</span></li></a>";
            echo "<a href='top_propo_file_view?$page=" . $total_pages . " '> <li class='pagination_style_first'><span class='last_page_style'>LAST</span></li></a>";
            ?>
        </div>
    </div> -->

    <!-- <script>
        if (href = 'top_propo_file_view?$page = 1') {
            document.querySelector("#disHidden").style.display = "none";
        }
    </script> -->


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

    <script>
        let currentPage = 1;
        const cardsPerPage = 4; // Number of cards to show per page
        const totalCards = document.querySelectorAll('.featured-card').length; // Total number of cards
        const totalPages = Math.ceil(totalCards / cardsPerPage);

        function displayCards() {
            const cards = document.querySelectorAll('.featured-card');
            cards.forEach((card, index) => {
                card.style.display = (index >= (currentPage - 1) * cardsPerPage && index < currentPage * cardsPerPage) ? 'block' : 'none';
            });
            updatePagination();
        }

        function changePage(direction) {
            currentPage += direction;
            if (currentPage < 1) currentPage = 1;
            if (currentPage > totalPages) currentPage = totalPages;
            displayCards();
        }

        function updatePagination() {
            const pageNumbers = document.getElementById('page-numbers');
            pageNumbers.innerHTML = '';
            for (let i = 1; i <= totalPages; i++) {
                const span = document.createElement('span');
                span.innerText = i;
                span.className = (i === currentPage) ? 'active' : '';
                span.onclick = () => {
                    currentPage = i;
                    displayCards();
                };
                pageNumbers.appendChild(span);
            }
        }

        // Initialize
        displayCards();
    </script>



    <?php require_once("includes/footer.php"); ?>
</body>

</html>