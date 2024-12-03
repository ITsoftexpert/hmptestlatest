<?php
session_start();
require_once("includes/db.php");
require_once("social-config.php");
?>
<!DOCTYPE html>
<html lang="en" class="ui-toolkit">

<head>
    <title><?= $site_name; ?> - Graphics & Design Main Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?= $site_desc; ?>">
    <meta name="keywords" content="<?= $site_keywords; ?>">
    <meta name="author" content="<?= $site_author; ?>">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100" rel="stylesheet">
    <link href="styles/bootstrap.css" rel="stylesheet">
    <link href="styles/custom.css" rel="stylesheet">
    <link href="styles/styles.css" rel="stylesheet">
    <link href="styles/categories_nav_styles.css" rel="stylesheet">
    <link href="font_awesome/css/font-awesome.css" rel="stylesheet">
    <link href="styles/owl.carousel.css" rel="stylesheet">
    <link href="styles/owl.theme.default.css" rel="stylesheet">
    <link href="styles/sweat_alert.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" rel="stylesheet">

    <script src="js/ie.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script type="text/javascript" src="js/sweat_alert.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a39d50ac9681a6c"></script>
    <style>
        .page-container {
            margin-top: 5rem;
        }

        .main-graphic-design-main-cont {
            padding: 20px;
        }

        .main-graphic-design-header-sec {
            text-align: center;
            margin-bottom: 30px;
        }

        .main-graphic-design-icon-container {
            display: flex;
            justify-content: center;
            margin-bottom: 10px;
        }

        .main-graphic-design-icon-image {
            width: 70px;
            height: 70px;
        }

        .main-graphic-design-main-title {
            font-size: 24px;
            color: #333333;
            margin: 0;
        }

        .main-graphic-design-subtitle {
            font-size: 17px;
            color: #111;
        }

        .main-graphic-design-section {
            margin-bottom: 20px;
            padding: 10px;
            box-shadow: rgba(0, 0, 0, 0.04) 0px 3px 5px;
        }

        .main-graphic-design-section-title a {
            text-decoration: none;
            color: #000;
            display: flex;
            align-items: center;
            font-size: 18px;
            justify-content: space-between;
        }

        .main-graphic-design-section-title a:hover {
            color: #00cedc;
        }

        .main-graphic-design-section-title a .icon {
            margin-left: 8px;
            color: #000;
            font-size: 20px;
            font-weight: bold;
        }

        .main-graphic-design-section-title a:hover .icon {
            color: #00cedc;
        }

        @media screen and (max-width: 768px) {
            .main-graphic-design-main-title {
                font-size: 30px !important;
                margin-bottom: 7px;
            }

            .main-graphic-design-section-title {
                font-size: 14px;
            }
        }
    </style>
</head>

<body class="is-responsive">
    <?php require_once("includes/header.php"); ?>

    <div class="page-container">
        <div class="main-graphic-design-main-cont">
            <div class="main-graphic-design-header-sec">
                <div class="main-graphic-design-icon-container">
                    <?php
                    if (isset($_GET['cat_id'])) {
                        $cat_id = $_GET['cat_id'];
                        $select_category = $db->select('cats_meta', ['cat_id' => $cat_id, 'language_id' => 1]);
                        if ($select_category->rowCount() > 0) {
                            $fetch_category = $select_category->fetch();
                            $cat_title = $fetch_category->cat_title;
                            $cat_desc = $fetch_category->cat_desc;

                            $select_subcat = $db->select('categories', ['cat_id' => $cat_id])->fetch();
                            $cat_url = $select_subcat->cat_url;
                            $cat_image = $select_subcat->cat_image;
                    ?>
                            <img src="<?= $site_url; ?>/cat_images/<?= $cat_image; ?>" alt="Icon" class="main-graphic-design-icon-image">
                </div>
                <h1 class="main-graphic-design-main-title"><?= $cat_title; ?></h1>
                <p class="main-graphic-design-subtitle"><?= $cat_desc; ?></p>

                <?php
                            $select_subcat_children = $db->select('categories_children', ['child_parent_id' => $cat_id]);
                            while ($fetch_subcat_child = $select_subcat_children->fetch()) {
                                $child_url = $fetch_subcat_child->child_url;
                                $child_id = $fetch_subcat_child->child_id;

                                $select_child_meta = $db->select('child_cats_meta', ['child_id' => $child_id])->fetch();
                                $child_title = $select_child_meta->child_title;
                                $child_desc = $select_child_meta->child_desc;
                ?>
                    <div class="main-graphic-design-section">
                        <h2 class="main-graphic-design-section-title">
                            <a href="<?= $site_url; ?>/categories/<?= $cat_url; ?>/<?= $child_url; ?>">
                                <?= $child_title; ?> <span class="icon">></span>
                            </a>
                        </h2>
                    </div>
        <?php
                            }
                        } else {
                            echo "<p>Invalid Category</p>";
                        }
                    } else {
                        echo "<p>No category selected.</p>";
                    }
        ?>
            </div>
        </div>
    </div>
    </div>

    <?php require_once("includes/footer.php"); ?>
</body>

</html>