<?php
session_start();
require_once("includes/db.php");
if (!isset($_SESSION['seller_user_name'])) {
   echo "<script>window.open('login','_self')</script>";
}
$login_seller_user_name = $_SESSION['seller_user_name'];
$select_login_seller = $db->select("sellers", array("seller_user_name" => $login_seller_user_name));
$row_login_seller = $select_login_seller->fetch();
$login_seller_id = $row_login_seller->seller_id;
?>
<!DOCTYPE html>
<html lang="en" class="ui-toolkit">

<head>
   <title><?= $site_name; ?> - <?= $lang["titles"]["manage_contacts"]; ?>.</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="<?= $site_desc; ?>">
   <meta name="keywords" content="<?= $site_keywords; ?>">
   <meta name="author" content="<?= $site_author; ?>">
   <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100" rel="stylesheet">
   <link href="styles/bootstrap.css" rel="stylesheet">
   <link href="styles/custom.css" rel="stylesheet"> <!-- Custom css code from modified in admin panel --->
   <link href="styles/styles.css" rel="stylesheet">
   <link href="styles/user_nav_styles.css" rel="stylesheet">
   <link href="font_awesome/css/font-awesome.css" rel="stylesheet">
   <script type="text/javascript" src="js/jquery.min.js"></script>
   <?php if (!empty($site_favicon)) { ?>
      <link rel="shortcut icon" href="<?= $site_favicon; ?>" type="image/x-icon">
   <?php } ?>
   <style>
      .nav-item-width {
         margin: auto;
         /* border:1px solid green; */
         width: 50%;
         text-align: center;
      }

      .padding-11 {
         padding: 9px 15px;
         /* width: 200px; */
         text-align: center;
         /* box-shadow: 0px 0px 5px black, inset 0px 0px 15px #00c8d4; */
      }

      .badge-float-right {
         float: right;
         margin-top: -3px;
         padding-top: 5px;
         margin-right: -9px !important;
      }

      .padding-alter5 {
         /* margin-top: -115px; */
         padding: 1.5rem 1.5rem;
      }

      @media (max-width:767px) {
         .full-width {
            /* border: 1px solid blue; */
            width: 100%;
         }

         .mobile_view_dropdown {
            display: block;
         }

         .desktop_view_navbar {
            display: none;
         }

         .padding-alter5 {
            /* margin-top: -140px; */
            padding: 0;
         }

         .nav-item-width {
            margin: auto;
            /* border:1px solid green; */
            width: 50%;
            text-align: center;
         }

         .badge-float-right {
            float: right;
            margin-top: -3px;
            padding-top: 5px;
            margin-right: -9px !important;
         }

         .heading_4 {
            font-size: 16px;
         }

         .text-align-center {
            text-align: center;
            margin: auto;
         }

         .font-size-3 {
            font-size: 13px !important;
            padding: 10px !important;
            text-align: center;
         }

         .heading_3 {
            font-size: 20px;
            width: 100%;
         }

         .heading-4 {
            /* border:1px solid green; */
            font-size: 18px !important;
            text-align: center;
         }

         .heading-3 {
            /* background-color: green; */
            font-size: 20px;
         }

         .full-width-h {
            /* border-bottom: 1px solid lightgray; */
            width: 100%;
            display: flex;
            margin-top: 13px !important;
         }

         .text-align-center-s {
            text-align: center;
            margin: auto;
            /* border:1px solid green; */
         }

         .top-margin {
            margin-top: 25px !important;
         }

      }

      @media (min-width:768px) {
         .mobile_view_dropdown {
            display: none;
         }

         .desktop_view_navbar {
            display: flex;
         }
      }
   </style>
</head>

<body class="is-responsive">
   <?php require_once("includes/user_header.php"); ?>
   <div class="container-fluid">
      <div class="row padding-alter5">
         <div class="col-md-12 mt-1">
            <h1 class="full-width-h"><span class="text-align-center-s desktop_view_navbar"><?= $lang["titles"]["manage_contacts"]; ?></span></h1>
            <ul class="nav nav-tabs mt-4 mb-4 full-width top-margin desktop_view_navbar"><!-- nav nav-tabs mt-5 mb-3 Starts -->
               <?php
               $count_my_buyers = $db->count("my_buyers", array("seller_id" => $login_seller_id));
               ?>
               <li class="nav-item nav-item-width ">
                  <a href="#my_buyers" data-toggle="tab" class="nav-link make-black padding-11 
                  <?php
                  if (!isset($_GET['my_buyers']) and !isset($_GET['my_sellers'])) {
                     echo "active";
                  }
                  if (isset($_GET['my_buyers'])) {
                     echo "active";
                  }
                  ?>">
                     <?= $lang['tabs']['my_buyers']; ?> <span class="badge badge-success badge-float-right"><?= $count_my_buyers; ?></span>
                  </a>
               </li>
               <?php
               $count_my_sellers = $db->count("my_buyers", array("buyer_id" => $login_seller_id));
               ?>
               <li class="nav-item nav-item-width">
                  <a href="#my_sellers" data-toggle="tab" class="nav-link make-black padding-11
            <?php
            if (isset($_GET['my_sellers'])) {
               echo "active";
            }
            ?>
            ">
                     <?= $lang['tabs']['my_sellers']; ?> <span class="badge badge-success badge-float-right"><?= $count_my_sellers; ?></span>
                  </a>
               </li>
            </ul>

            <div class="dropdown-container mobile_view_dropdown">
               <button class="dropdown-btn" onclick="toggleDropdown()">
                  Manage Contacts
                  <span class="dropdown-icon"><i class="fa-solid fa-caret-down"></i></span>
               </button>
               <div class="dropdown-content" id="dropdownMenu">
                  <ul class="nav nav-tabs mt-4 mb-4 full-width top-margin d-block">
                     <?php
                     $count_my_buyers = $db->count("my_buyers", array("seller_id" => $login_seller_id));
                     ?>
                     <li class="nav-item">
                        <a href="#my_buyers" data-toggle="tab" class="nav-link make-black padding-11" onclick="selectOption('<?= $lang['tabs']['my_buyers']; ?>')">
                           <?= $lang['tabs']['my_buyers']; ?> <span class="badge badge-success badge-float-right"><?= $count_my_buyers; ?></span>
                        </a>
                     </li>
                     <?php
                     $count_my_sellers = $db->count("my_buyers", array("buyer_id" => $login_seller_id));
                     ?>
                     <li class="nav-item">
                        <a href="#my_sellers" data-toggle="tab" class="nav-link make-black padding-11" onclick="selectOption('<?= $lang['tabs']['my_sellers']; ?>')">
                           <?= $lang['tabs']['my_sellers']; ?> <span class="badge badge-success badge-float-right"><?= $count_my_sellers; ?></span>
                        </a>
                     </li>
                  </ul>
               </div>
            </div>


            <script>
               function toggleDropdown() {
                  document.getElementById("dropdownMenu").classList.toggle("show");
               }

               // Function to handle selection of dropdown options
               function selectOption(optionText) {
                  // Update the button text with the selected option
                  var dropdownButton = document.querySelector('.dropdown-btn');
                  dropdownButton.innerHTML = optionText + ' <span class="dropdown-icon"><i class="fa-solid fa-caret-down"></i></span>';

                  // Close the dropdown menu
                  document.getElementById("dropdownMenu").classList.remove("show");
               }

               window.onclick = function(event) {
                  if (!event.target.matches('.dropdown-btn')) {
                     var dropdowns = document.getElementsByClassName("dropdown-content");
                     for (var i = 0; i < dropdowns.length; i++) {
                        var openDropdown = dropdowns[i];
                        if (openDropdown.classList.contains('show')) {
                           openDropdown.classList.remove('show');
                        }
                     }
                  }
               }
            </script>


            <style>
               .dropdown-container {
                  position: relative;
                  /* display: inline-block; */
               }

               .dropdown-btn {
                  color: #000 !important;
                  background-color: #ebebeb !important;
                  box-shadow: rgba(0, 0, 0, 0.12) 0px 1px 3px, rgba(0, 0, 0, 0.24) 0px 1px 2px;
                  width: fit-content;
                  display: flex;
                  justify-content: center;
                  font-size: 17px;
                  font-weight: 600;
                  gap: 8px;
                  align-items: center;
                  margin: auto;
                  padding: 8px 20px;
                  border: none;
                  margin-bottom: 1rem;
               }

               .dropdown-content {
                  display: none;
                  position: absolute;
                  background-color: #ffffff;
                  box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
                  z-index: 1;
                  width: 100%;
               }

               .dropdown-content.show {
                  display: block;
               }

               .nav-tabs {
                  padding: 0;
                  margin: 0;
                  list-style: none;
               }

               .nav-item {
                  padding: 5px 10px;
               }

               .nav-link {
                  text-decoration: none;
                  color: #000;
                  display: block;
                  padding: 10px;
               }

               .nav-link.active {
                  background-color: #007bff;
                  color: #fff;
               }

               .badge {
                  float: right;
                  margin-left: 5px;
               }
            </style>

            <div class="tab-content mt-2">
               <div id="my_buyers" class="tab-pane fade 
      <?php
      if (!isset($_GET['my_buyers']) and !isset($_GET['my_sellers'])) {
         echo "show active";
      }
      if (isset($_GET['my_buyers'])) {
         echo "show active";
      }
      ?>
      ">
                  <?php include('seller_contacts.php'); ?>
               </div>
               <div id="my_sellers" class="tab-pane fade
   <?php
   if (isset($_GET['my_sellers'])) {
      echo "show active";
   }
   ?>
   ">
                  <?php include('buyer_contacts.php'); ?>
               </div>
            </div>
         </div>
      </div>
   </div>
   <?php require_once("includes/footer.php"); ?>
</body>

</html>