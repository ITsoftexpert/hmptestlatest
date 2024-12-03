<?php
session_start();
require_once("includes/db.php");

if (!isset($_SESSION['seller_user_name'])) {
  echo "<script>window.open('login','_self')</script>";
  exit;
}

$login_seller_user_name = $_SESSION['seller_user_name'];
$select_login_seller = $db->select("sellers", array("seller_user_name" => $login_seller_user_name));
$row_login_seller = $select_login_seller->fetch();
$login_seller_id = $row_login_seller->seller_id;

// Pagination and search setup
$per_page = 10; // Number of records per page
$page = isset($_GET['view_purchases']) && is_numeric($_GET['view_purchases']) ? (int)$_GET['view_purchases'] : 1;
if ($page < 1) $page = 1;

$start_from = ($page - 1) * $per_page;
$search = isset($_GET['search']) ? trim($_GET['search']) : "";

// Base query and parameters
$query = "SELECT * FROM purchases WHERE seller_id = :seller_id";
$params = ["seller_id" => $login_seller_id];

if (!empty($search)) {
  $query .= " AND (amount LIKE :search OR date LIKE :search)";
  $params['search'] = "%$search%";
}

$query .= " ORDER BY date DESC LIMIT $per_page OFFSET $start_from"; // Use LIMIT/OFFSET directly

$get_purchases = $db->query($query, $params);

$total_query = "SELECT COUNT(*) as total FROM purchases WHERE seller_id = :seller_id";
$total_params = ["seller_id" => $login_seller_id];
if (!empty($search)) {
  $total_query .= " AND (amount LIKE :search OR date LIKE :search)";
  $total_params['search'] = "%$search%";
}
$total_purchases = $db->query($total_query, $total_params)->fetch()->total;
$count_purchases = $get_purchases->rowCount();

?>
<!DOCTYPE html>
<html lang="en" class="ui-toolkit">

<head>
  <title><?= $site_name; ?> - All Your Purchases.</title>
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
    .font-size-3 {
      /* font-size: 11px !important; */
      padding: 13px !important;
      text-align: center;
      /* box-shadow: 0px 0px 5px black, inset 0px 0px 15px #00c8d4; */
    }

    .bg-color {
      background-color: #f5c6cb;
      /* height:30vh; */
      /* padding-top:10vh !important; */
      /* box-shadow: inset 0px 0px 75px red; */
      /* margin: auto; */
    }

    .table {
      margin-bottom: 0px;
    }

    .box-shadow-purchase {
      /* box-shadow: 0px 0px 5px black; */
      border-radius: 3px;
    }

    .padding-alter-2 {
      padding: 2rem 3rem;
    }

    @media (max-width:768px) {
      .text-align-center {
        text-align: center;
        /* border: 1px solid green; */
        margin: auto;
      }

      .padding-alter-2 {
        padding: 5px 15px;
      }

      .full-width {
        width: 100%;
        /* border:1px solid blue; */
        display: flex;
        margin-bottom: 18px !important;
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


      .bg-color {
        background-color: #f5c6cb;
      }

    }

    @media (max-width: 767px) {
      .purchase-page-heading-bluff {
        color: #000 !important;
        background-color: #ebebeb !important;
        box-shadow: rgba(0, 0, 0, 0.12) 0px 1px 3px, rgba(0, 0, 0, 0.24) 0px 1px 2px;
        width: fit-content;
        border: none;
        padding: 11px 15px;
        display: flex;
        justify-content: center;
        font-size: 17px;
        font-weight: 600;
        gap: 8px;
        align-items: center;
        margin: auto;
      }
    }
  </style>
</head>

<body class="is-responsive">

  <?php require_once("includes/user_header.php"); ?>
  <div class="container-fluid padding-alter-2">

    <!-- Search Form -->
    <form method="get" action="">
      <input type="hidden" name="view_purchases" value="<?= $page; ?>">
      <div class="input-group mb-2">
        <input type="text" name="search" class="form-control" placeholder="Search by amount or date" value="<?= htmlspecialchars($search); ?>">

        <div class="input-group-append">
          <button type="submit" class="btn btn-success">Search</button>
        </div>
      </div>
      <div class=" float-right input-group-append">
        <a href="?view_purchases=<?= $page; ?>" class="btn btn-secondary">Clear</a>
      </div>
    </form>


    <div class="row">
      <div class="col-md-12 mt-4">
        <h3 class="mb-4 <?= ($lang_dir == "right" ? 'text-right' : '') ?> full-width purchase-page-heading-bluff"><span class="text-align-center"><?= $lang["titles"]["purchases"]; ?></span></h3>
        <div class="table-responsive box-table box-shadow-purchase">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="font-size-3"><?= $lang['th']['date']; ?></th>
                <th class="font-size-3"><?= $lang['th']['for']; ?></th>
                <th class="font-size-3"><?= $lang['th']['amount']; ?></th>
              </tr>
            </thead>
            <tbody>
              <?php

              $count_purchases = $get_purchases->rowCount();
              while ($row_purchases = $get_purchases->fetch()) {
                $order_id = $row_purchases->order_id;
                $reason = $row_purchases->reason;
                $amount = $row_purchases->amount;
                $date = $row_purchases->date;
                $method = $row_purchases->method;
                if ($reason == "featured_listing" or $method == "featured_proposal_declined") {
                  $select_proposals = $db->select("proposals", array("proposal_id" => $order_id));
                  $row_proposals = $select_proposals->fetch();
                  $proposal_title = $row_proposals->proposal_title;
                  $proposal_url = $row_proposals->proposal_url;
                }

                if ($reason == "order") {
                  $text = "Proposal/Service purchased with <b>" . ucwords(str_replace("_", " ", $method)) . "</b>";
                  $link = "(<a target='_blank' href='order_details?order_id=$order_id' class='text-success'>View Order</a>)";
                } elseif ($reason == "order_tip") {
                  $text = "Order Tip Payment with <b>" . ucwords(str_replace("_", " ", $method)) . "</b>";
                  $link = "(<a target='_blank' href='order_details?order_id=$order_id' class='text-success'>View Order</a>)";
                } elseif ($reason == "featured_listing") {
                  $text = "Featured Listing Payment with <b>" . ucwords(str_replace("_", " ", $method)) . "</b>";
                  $link = "(<a target='_blank' href='proposals/$login_seller_user_name/$proposal_url' class='text-success'>View Proposal</a>)";
                }

              ?>
                <tr>
                  <td> <?= $date; ?> </td>
                  <td>
                    <?php if ($method == "featured_proposal_declined") { ?>

                      Your featured proposal is declined so its feature listing fee is refunded to your shopping balance.
                      (<a href="<?= $site_url; ?>/view_proposals.php" class="text-success"> View Proposals </a>)

                    <?php } elseif ($method == "order_cancellation") { ?>

                      Canceled order payment refunded to your shopping balance

                    <?php } else { ?>

                      <?= "$text $link"; ?>

                    <?php } ?>

                  </td>
                  <td class="text-danger">
                    <?php
                    if ($method == "order_cancellation" or $method == "featured_proposal_declined") {
                      echo "<span class='text-success'>+$s_currency$amount.00</span>";
                    } else {
                      echo "-$s_currency$amount.00";
                    }
                    ?>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
          <?php
          if ($count_purchases == 0) {
            echo "<center>
          <h3 class='pb-4 pt-4 heading_3 bg-color'>
            <i class='fa fa-meh-o'></i> {$lang['purchases']['no_purchases']}
          </h3>
          </center>";
          }
          ?>
        </div>

        <!-- Pagination -->
        <?php
        $total_pages = ceil($total_purchases / $per_page);
        if ($total_pages > 1): ?>
          <nav>
            <ul class="pagination">
              <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <li class="page-item <?= ($i == $page) ? 'active' : ''; ?>">
                  <a class="page-link" href="?view_purchases=<?= $i; ?>&search=<?= urlencode($search); ?>"><?= $i; ?></a>
                </li>
              <?php endfor; ?>
            </ul>
          </nav>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <?php require_once("includes/footer.php"); ?>
</body>

</html>