<?php
session_start();
require_once("includes/db.php");
require_once("social-config.php");
?>
<!DOCTYPE html>
<html lang="en" class="ui-toolkit">

<head>
    <title><?= $site_name; ?> - Sub menu</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?= $site_desc; ?>">
    <meta name="keywords" content="<?= $site_keywords; ?>">
    <meta name="author" content="<?= $site_author; ?>">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100" rel="stylesheet">
    <link href="styles/bootstrap.css" rel="stylesheet">
    <link href="styles/custom.css" rel="stylesheet"> <!-- Custom css code from modified in admin panel --->
    <link href="styles/styles.css" rel="stylesheet">
    <link href="styles/categories_nav_styles.css" rel="stylesheet">
    <link href="font_awesome/css/font-awesome.css" rel="stylesheet">
    <link href="styles/owl.carousel.css" rel="stylesheet">
    <link href="styles/owl.theme.default.css" rel="stylesheet">
    <link href="styles/sweat_alert.css" rel="stylesheet">

    <script src="js/ie.js"></script>
    <script type="text/javascript" src="js/sweat_alert.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a39d50ac9681a6c"></script>
    <style>
        .page-container {
            /* display: flex; */
            margin-top: 8rem;
        }

        .custom-sidebar {
            width: 100%;
            /* height: 100vh; */
            background-color: #fff;
            color: #000;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.5);
        }

        .sidebar-header {
            text-align: center;
        }

        .menu-section {
            margin: 20px 0;
        }

        .menu-section h3 {
            margin: 10px 0;
            font-size: 1.2em;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
        }

        .dropdown-toggle {
            cursor: pointer;
        }

        .menu-list {
            list-style: none;
            padding: 0;
            display: none;
            /* Hidden by default */
        }

        .menu-item {
            padding: 10px 0;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .menu-item i {
            margin-right: 10px;
            /* Space between icon and text */
        }

        /* .menu-item:hover {
            background-color: #EBEBEB;
        } */

        .show {
            display: block;
            /* Show the dropdown */
        }

        .main-content {
            flex: 1;
            padding: 20px;
        }
    </style>
</head>


<body class="is-responsive">
    <?php require_once("includes/header.php"); ?>

    <div class="page-container">
        <div class="custom-sidebar">
            <div class="menu-section">
                <h3><a href="<?= $site_url; ?>/dashboard">Dashboard</a></h3>
            </div>
            <div class="menu-section">
                <!-- <h3><a href=""><i class="fas fa-tachometer-alt"></i>&nbsp;&nbsp;Dashboard</a></h3> -->
                <h3><a href="">Selling </a><i class=" fa-chevron-down dropdown-toggle" onclick="toggleDropdown('hire-dropdown')"></i></h3>
                <ul class="menu-list dropdown" id="hire-dropdown">
                    <li class="menu-item"><a href="<?= $site_url; ?>/selling_orders"><i class="fas fa-box"></i> Orders</a></li>
                    <li class="menu-item"><a href="<?= $site_url; ?>/proposals/view_proposals"><i class="fas fa-file-alt"></i> My Proposals</a></li>
                    <li class="menu-item"><a href="<?= $site_url; ?>/proposals/create_coupon"><i class="fas fa-tags"></i> Create A Coupon</a></li>
                    <li class="menu-item"><a href="<?= $site_url; ?>/requests/buyer_requests"><i class="fas fa-bullhorn"></i> Buyer Requests</a></li>
                    <li class="menu-item"><a href="<?= $site_url; ?>/revenue"><i class="fas fa-coins"></i> Revenues</a></li>
                    <li class="menu-item"><a href="<?= $site_url; ?>/withdrawal_requests"><i class="fas fa-wallet"></i> Withdrawal Requests</a></li>
                </ul>
            </div>
            <div class="menu-section">
                <h3><a href="">Buying</a> <i class=" fa-chevron-down dropdown-toggle" onclick="toggleDropdown('work-dropdown')"></i></h3>
                <ul class="menu-list dropdown" id="work-dropdown">
                    <li class="menu-item"><a href="<?= $site_url; ?>/buying_orders"><i class="fas fa-box-open"></i>Orders</a></li>
                    <li class="menu-item"><a href="<?= $site_url; ?>/purchases"><i class="fas fa-shopping-cart"></i> Purchases</a></li>
                    <li class="menu-item"><a href="<?= $site_url; ?>/favorites"><i class="fas fa-heart"></i> Favorites</a></li>
                </ul>
            </div>
            <div class="menu-section">
                <h3><a href="">Requests</a> <i class=" fa-chevron-down dropdown-toggle" onclick="toggleDropdown('requests-dropdown')"></i></h3>
                <ul class="menu-list dropdown" id="requests-dropdown">
                    <li class="menu-item"><a href="<?= $site_url; ?>/requests/post_request"><i class="fas fa-pen"></i> Post A Request</a></li>
                    <li class="menu-item"><a href="<?= $site_url; ?>/requests/manage_requests"><i class="fas fa-tasks"></i> Manage Requests</a></li>
                </ul>
            </div>
            <div class="menu-section">
                <h3><a href="">Contacts</a> <i class=" fa-chevron-down dropdown-toggle" onclick="toggleDropdown('contacts-dropdown')"></i></h3>
                <ul class="menu-list dropdown" id="contacts-dropdown">
                    <li class="menu-item"><a href="<?= $site_url; ?>/manage_contacts?my_buyers"><i class="fas fa-users"></i> My Buyers</a></li>
                    <li class="menu-item"><a href="<?= $site_url; ?>/manage_contacts?my_sellers"><i class="fas fa-store"></i> My Sellers</a></li>
                </ul>
            </div>
            <div class="menu-section">
                <h3><a href="">My Referrals</a> <i class=" fa-chevron-down dropdown-toggle" onclick="toggleDropdown('referrals-dropdown')"></i></h3>
                <ul class="menu-list dropdown" id="referrals-dropdown">
                    <li class="menu-item"><a href="<?= $site_url; ?>/my_referrals"><i class="fas fa-user-friends"></i> User Referrals</a></li>
                    <li class="menu-item"><a href="<?= $site_url; ?>/proposal_referrals"><i class="fas fa-hand-holding-usd"></i> Proposal Referrals</a></li>
                </ul>
            </div>
            <div class="menu-section">
                <h3><a href="<?= $site_url; ?>/conversations/inbox">Inbox Messages</a></h3>
            </div>

            <div class="menu-section">
                <h3> <a href="<?= $site_url; ?>/notifications">Notifications</a></h3>
            </div>

            <div class="menu-section">
                <h3> <a href="<?= $site_url; ?>/<?= $_SESSION['seller_user_name']; ?>">My Profile</a></h3>
            </div>
            <div class="menu-section">
                <h3>Settings <i class=" fa-chevron-down dropdown-toggle" onclick="toggleDropdown('settings-dropdown')"></i></h3>
                <ul class="menu-list dropdown" id="settings-dropdown">
                    <li class="menu-item"><a href="<?= $site_url; ?>/settings?profile_settings"><i class="fas fa-user-cog"></i> Profile Settings</a></li>
                    <li class="menu-item"><a href="<?= $site_url; ?>/settings?professional_settings"><i class="fas fa-briefcase"></i> Professional Settings</a></li>
                    <li class="menu-item"><a href="<?= $site_url; ?>/settings?account_settings"><i class="fas fa-user-shield"></i> Account Settings</a></li>
                </ul>
            </div>
        </div>

        <script>
            function toggleDropdown(dropdownId) {
                const dropdown = document.getElementById(dropdownId);
                dropdown.classList.toggle('show');
            }
        </script>
    </div>

    <?php require_once("includes/footer.php"); ?>
</body>


</html>