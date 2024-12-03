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

	<title><?= $site_name; ?> - Proposals/Services Ordered By Users.</title>

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
	<link href="styles/owl.carousel.css" rel="stylesheet">
	<link href="styles/owl.theme.default.css" rel="stylesheet">
	<script type="text/javascript" src="js/jquery.min.js"></script>

	<?php if (!empty($site_favicon)) { ?>

		<link rel="shortcut icon" href="<?= $site_favicon; ?>" type="image/x-icon">

	<?php } ?>

	<style>
		@media (max-width: 767px) {
			.history-my-buyer-contact {
				display: none;
			}
		}

		@media (min-width: 768px) {
			.only_desktop_view_card {
				display: block;
			}

			.only_mobile_view_card {
				display: none;
			}

		}

		/* Order card styles */
		.unique-order-card {
			border: 1px solid #e0e0e0;
			border-radius: 8px;
			padding: 16px;
			max-width: 100%;
			background-color: #fff;
			font-family: Arial, sans-serif;
			margin: 15px;
		}

		@media (min-width: 1024px) {
			.unique-order-card {
				display: none;
			}
		}

		.unique-order-summary {
			margin: 0 0 10px;
			font-size: 1.25em;
			font-weight: bold;
			color: #a7a9ac;
		}

		.unique-order-status-textmain {
			font-size: 1.25em;
			color: #a7a9ac;
		}

		.unique-order-content {
			display: flex;
			gap: 10px;
			margin-bottom: 10px;
		}

		.unique-order-image img {
			width: 100px;
			height: 85px;
			border-radius: 4px;
			object-fit: cover;
		}

		.unique-order-text p {
			font-size: 13px;
			color: #333;
		}

		.unique-order-text a {
			color: #007bff;
			text-decoration: none;
		}

		.unique-order-info i {
			margin-right: 4px;
		}

		.unique-order-status {
			display: flex;
			justify-content: space-between;
			align-items: center;
			border-top: 1px solid #e0e0e0;
			padding-top: 10px;
		}

		.unique-status-active {
			background-color: #00bcd3;
			color: #fff;
			border: none;
			padding: 5px 10px;
			border-radius: 4px;
			font-size: 0.9em;
			cursor: pointer;
		}

		.unique-status-delivered {
			background-color: #fcc005;
			color: #fff;
			border: none;
			padding: 5px 10px;
			border-radius: 4px;
			font-size: 0.9em;
			cursor: pointer;
		}

		.unique-status-completed {
			background-color: #4aae50;
			color: #fff;
			border: none;
			padding: 5px 10px;
			border-radius: 4px;
			font-size: 0.9em;
			cursor: pointer;
		}

		.unique-status-cancelled {
			background-color: #f44338;
			color: #fff;
			border: none;
			padding: 5px 10px;
			border-radius: 4px;
			font-size: 0.9em;
			cursor: pointer;
		}

		@media (max-width: 767px) {
			.buyer-nitin-edit-sec {
				/* display: none; */
			}

			.only_desktop_view_card {
				display: none;
			}

			.only_mobile_view_card {
				display: block;
			}


		}

		.unique-info-container {
			display: flex;
			font-size: 0.85em;
			color: #555;
			gap: 40px;
		}

		.unique-info-item {
			position: relative;
			cursor: pointer;
		}

		.unique-info-item .unique-heading {
			position: absolute;
			bottom: 120%;
			left: 50%;
			transform: translateX(-50%);
			padding: 5px 10px;
			background-color: rgba(0, 0, 0, 0.8);
			color: white;
			font-size: 14px;
			border-radius: 5px;
			opacity: 0;
			pointer-events: none;
			transition: all 0.4s ease;
			white-space: nowrap;
		}

		.unique-info-item:hover .unique-heading {
			opacity: 1;
			bottom: 100%;
		}

		.unique-active-orderdataby-nitin {
			display: flex;
			gap: 20px;
			flex-direction: column;
		}
	</style>

</head>

<body class="is-responsive">

	<?php require_once("includes/user_header.php"); ?>

	<?php

	$seller_id = $input->get('seller_id');

	$select_seller = $db->select("sellers", array("seller_id" => $seller_id));
	$row_seller = $select_seller->fetch();
	$seller_user_name = $row_seller->seller_user_name;
	$seller_image = getImageUrl2("sellers", "seller_image", $row_seller->seller_image);

	$sel_orders = $db->select("orders", array("buyer_id" => $login_seller_id, "seller_id" => $seller_id), "DESC");
	$count_orders = $sel_orders->rowCount();

	?>

	<div class="container only_desktop_view_card" style="margin-top: 200px;">

		<div class="row">

			<div class="col-md-12">

				<h2>Purchases From <a href="<?= $seller_user_name; ?>"><?= ucfirst($seller_user_name); ?></a> </h2>

				<h6><?= $count_orders; ?> Results Found</h6>

			</div>

		</div>

		<div class="row">
			<div class="col-md-12 mt-1 mb-3">

				<div class="table-responsive box-table mt-3">

					<table class="table table-bordered">

						<thead>

							<tr>

								<th>ORDER SUMMARY</th>
								<th>ORDER DATE</th>
								<th>DUE ON</th>
								<th>TOTAL</th>
								<th>STATUS</th>


							</tr>

						</thead>

						<tbody>

							<tr>

								<?php

								while ($row_orders = $sel_orders->fetch()) {
									$order_id = $row_orders->order_id;
									$proposal_id = $row_orders->proposal_id;
									$order_price = $row_orders->order_price;
									$order_status = $row_orders->order_status;
									$order_number = $row_orders->order_number;
									$order_duration = intval($row_orders->order_duration);
									$order_date = $row_orders->order_date;
									$order_due = date("F d, Y", strtotime($order_date . " + $order_duration days"));

									$select_proposals = $db->select("proposals", array("proposal_id" => $proposal_id));
									$row_proposals = $select_proposals->fetch();
									$proposal_title = $row_proposals->proposal_title;
									$proposal_img1 = getImageUrl2("proposals", "proposal_img1", $row_proposals->proposal_img1);

								?>
									<td>
										<a href="<?= $site_url ?>/order_details?order_id=<?= $order_id; ?>" class="make-black">

											<img class="order-proposal-image" src="<?= $proposal_img1; ?>">

											<p class="order-proposal-title"><?= $proposal_title; ?></p>


										</a>

									</td>

									<td><?= $order_date; ?></td>
									<td><?= $order_due; ?></td>
									<td>$<?= $order_price; ?></td>
									<td><button class="btn btn-success"><?= ucwords($order_status); ?></button></td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
					<?php
					if ($count_orders == 0) {
						echo "<center><h3 class='pb-4 pt-4'><i class='fa fa-meh-o'></i> No proposals/services sold at the momment.</h3></center>";
					}
					?>

				</div>

			</div>

		</div>

	</div>
	<div class="only_mobile_view_card">
		<?php
		// Define the number of results per page
		$limit = 5;

		// Get the total number of records for this seller and buyer
		
		$sel_orders_sm = $db->select("orders", array("buyer_id" => $login_seller_id, "seller_id" => $seller_id), "DESC");
		$total_record = $sel_orders_sm->rowCount();

		// Calculate total pages
		$total_pages = ceil($total_record / $limit);

		// Get current page number from URL, default to 1 if not set
		$page_number = isset($_GET['page']) ? (int)$_GET['page'] : 1;
		$page_number = max(1, min($page_number, $total_pages));

		// Calculate the starting point for results on the current page
		$initial_page = ($page_number - 1) * $limit;

		// Dynamic query without prepare and bindParam
		$sel_orders_sm = $db->query("SELECT * FROM orders WHERE seller_id = $seller_id AND buyer_id = $login_seller_id ORDER BY order_date DESC LIMIT $initial_page, $limit");

		while ($row_orders_sm = $sel_orders_sm->fetch()) {
			$order_id = $row_orders_sm->order_id;
			$proposal_id = $row_orders_sm->proposal_id;
			$order_price = $row_orders_sm->order_price;
			$order_status = $row_orders_sm->order_status;
			$order_number = $row_orders_sm->order_number;
			$order_duration = intval($row_orders_sm->order_duration);
			$order_date = $row_orders_sm->order_date;
			$order_due = date("F d, Y", strtotime($order_date . " + $order_duration days"));

			$select_proposals = $db->select("proposals", array("proposal_id" => $proposal_id));
			$row_proposals = $select_proposals->fetch();
			$proposal_title = $row_proposals->proposal_title;
			$proposal_img1 = getImageUrl2("proposals", "proposal_img1", $row_proposals->proposal_img1);
		?>

			<div class="unique-order-card">
				<div class="unique-order-content">
					<div class="unique-order-image">
						<img class="order-proposal-image" src="<?= $proposal_img1; ?>" alt="Order Image">
					</div>
					<div class="unique-order-text">
						<p><?= $proposal_title; ?><a href="#">read more</a></p>
					</div>
				</div>
				<div class="unique-order-info mb-2 pb-1">
					<div class="unique-info-container">
						<div class="unique-info-item">
							<i class="fas fa-calendar"></i> <?= $order_date; ?>
							<span class="unique-heading">Order Date</span>
						</div>
						<div class="unique-info-item">
							<i class="fas fa-calendar"></i> <?= $order_due; ?>
							<span class="unique-heading">Due On</span>
						</div>
						<div class="unique-info-item">
							<?= showPrice($order_price); ?>
							<span class="unique-heading">Total Order</span>
						</div>
					</div>
				</div>
				<div class="unique-order-status">
					<span class="unique-order-status-textmain">Order Status</span>
					<button class="unique-status-active"><?= ucwords($order_status); ?></button>
				</div>
			</div>

		<?php } ?>

		<!-- Pagination Links -->
		<style>
			/* Basic styling for pagination-new container */
			.pagination-new {
				display: flex;
				justify-content: center;
				align-items: center;
				margin-top: 20px;
				margin-bottom: 20px;
			}

			.pagination-new a,
			.pagination-new .pagination-new-current {
				margin: 0 5px;
				padding: 8px 12px;
				text-decoration: none;
				font-size: 16px;
				border-radius: 4px;
				color: #007bff;
				transition: background-color 0.3s, color 0.3s;
			}

			.pagination-new a:hover {
				background-color: #007bff;
				color: white;
			}

			.pagination-new .pagination-new-current {
				background-color: #007bff;
				color: white;
				font-weight: bold;
			}

			.pagination-new a:disabled {
				background-color: #f1f1f1;
				color: #ccc;
				cursor: not-allowed;
			}
		</style>

<div class="pagination-new">
			<?php if ($page_number > 1): ?>
				<a href="?page=1&seller_id=<?= $seller_id; ?>" class="pagination-new-link">First</a>
				<a href="?page=<?= $page_number - 1; ?>&seller_id=<?= $seller_id; ?>" class="pagination-new-link">Prev</a>
			<?php endif; ?>

			<?php for ($i = 1; $i <= $total_pages; $i++): ?>
				<?php if ($i == $page_number): ?>
					<span class="pagination-new-current"><?= $i; ?></span>
				<?php else: ?>
					<a href="?page=<?= $i; ?>&seller_id=<?= $seller_id; ?>" class="pagination-new-link"><?= $i; ?></a>
				<?php endif; ?>
			<?php endfor; ?>

			<?php if ($page_number < $total_pages): ?>
				<a href="?page=<?= $page_number + 1; ?>&seller_id=<?= $seller_id; ?>" class="pagination-new-link">Next</a>
				<a href="?page=<?= $total_pages; ?>&seller_id=<?= $seller_id; ?>" class="pagination-new-link">Last</a>
			<?php endif; ?>
		</div>



	</div>

	<?php require_once("includes/footer.php"); ?>

</body>

</html>