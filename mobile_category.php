<?php
session_start();
require_once("includes/db.php");
require_once("social-config.php");
?>
<!DOCTYPE html>
<html lang="en" class="ui-toolkit">

<head>
    <title><?= $site_name; ?>Graphics & Design main page</title>
    <meta charset="utf-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
    <link href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" rel="">
    <script src="js/ie.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script type="text/javascript" src="js/sweat_alert.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a39d50ac9681a6c"></script>
    <style>
        /* Yeh meri optimized CSS hai hhhhh */
        .main-graphic-design-icon-image,
        .mobile-view-category-icon { 
            width: 70px;
            /* Ensure consistent sizing */
            height: 70px;
            object-fit: cover;
            display: block;
            /* Prevent inline spacing issues */
            -webkit-transform: translateZ(0);
            /* Safari-specific fix for rendering issues */
            -webkit-backface-visibility: hidden;
            /* Improve performance for Safari */
        }

        .mobile-view-category-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 0.5rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            /* Lighter border for consistent appearance */
        }

        .mobile-view-category-content {
            flex-grow: 1;
            min-width: 0;
            /* Prevent content overflow */
        }

        .mobile-view-category-name a {
            text-decoration: none;
            color: #000;
            word-break: break-word;
            /* Handle long text properly */
        }

        .mobile-view-category-description {
            font-size: 14px;
            color: #666;
            overflow: hidden;
            text-overflow: ellipsis;
            /* Handle long descriptions */
            white-space: nowrap;
        }

        @media (min-width: 768px) {
            .mobile-view-category-wrapper {
                display: none;
                /* Hide on larger screens */
            }
        }
    </style>

</head>


<body class="is-responsive">
    <?php require_once("includes/header.php"); ?>

    <?php
    if (isset($_SESSION['seller_user_name'])) { ?>
        <style>
            .page-container {
                margin-top: 5rem;
            }
        </style>
    <?php } else { ?>
        <style>
            .page-container {
                margin-top: 5rem;
            }
        </style>
    <?php } ?>

    <div class="page-container">
        <div class="main-graphic-design-main-cont">
            <!-- Header Section -->
            <div class="main-graphic-design-header-sec">
                <div class="main-graphic-design-icon-container">
                    <img src="images/hmp/megnifying_class.jpg" alt="Icon" class="main-graphic-design-icon-image">
                </div>
                <h1 class="main-graphic-design-main-title">Explore Categories</h1>
                <p class="main-graphic-design-subtitle">Browse through a diverse range of services tailored to your needs</p>
            </div>
            <?php
            $select_category = $db->select('cats_meta', array('language_id' => 1));
            while ($fetch_category = $select_category->fetch()) {
                $cat_title = $fetch_category->cat_title;
                $cat_desc = $fetch_category->cat_desc;
                $cat_id = $fetch_category->cat_id;

                $select_subcat = $db->select('categories', array('cat_id' => $cat_id))->fetch();
                $cat_url = $select_subcat->cat_url;
                $cat_image = $select_subcat->cat_image;


            ?>
                <div class="mobile-view-category-item">
                    <img src="<?= $site_url; ?>/cat_images/<?= $cat_image; ?>" alt="Writing Icon" class="mobile-view-category-icon" />
                    <div class="mobile-view-category-content">
                        <h3 class="mobile-view-category-name"> <a href="<?= $site_url; ?>/mobile_sub_cat?cat_id=<?= $cat_id; ?>">
                                <?= $cat_title; ?></span>
                            </a>
                        </h3>
                        <div class="d-flex" style="flex-wrap:wrap;">
                            <?php
                            $select_child_meta = $db->query("SELECT * FROM child_cats_meta WHERE child_parent_id = :cat_id LIMIT 2", ['cat_id' => $cat_id]);

                            while ($fetch_child_meta = $select_child_meta->fetch()) {
                                $child_title = $fetch_child_meta->child_title;
                                echo "<p class='mobile-view-category-description m-0'>$child_title</p>, &nbsp;";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            <?php }
            ?>
        </div>
    </div>
    <?php require_once("includes/footer.php"); ?>
</body>

</html>