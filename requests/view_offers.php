<?php

session_start();
require_once("../includes/db.php");
if (!isset($_SESSION['seller_user_name'])) {
	echo "<script>window.open('../login','_self')</script>";
}

$login_seller_user_name = $_SESSION['seller_user_name'];
$select_login_seller = $db->select("sellers", array("seller_user_name" => $login_seller_user_name));
$row_login_seller = $select_login_seller->fetch();
$login_seller_id = $row_login_seller->seller_id;

$request_id = $input->get('request_id');
$get_requests = $db->select("buyer_requests", array("request_id" => $request_id, "seller_id" => $login_seller_id, "request_status" => "active"));
if ($get_requests->rowCount() == 0) {
	echo "<script>window.open('manage_requests','_self');</script>";
}
$row_requests = $get_requests->fetch();
$request_id = $row_requests->request_id;
$cat_id = $row_requests->cat_id;
$child_id = $row_requests->child_id;
$request_description = $row_requests->request_description;
$request_date = $row_requests->request_date;
$request_budget = $row_requests->request_budget;
$request_delivery_time = $row_requests->delivery_time;

$get_meta = $db->select("cats_meta", array("cat_id" => $cat_id, "language_id" => $siteLanguage));
$row_meta = $get_meta->fetch();
$request_cat_title = $row_meta->cat_title;
$get_meta = $db->select("child_cats_meta", array("child_id" => $child_id, "language_id" => $siteLanguage));
$row_meta = $get_meta->fetch();
$request_child_title = $row_meta->child_title;
$get_offers = $db->select("send_offers", array("request_id" => $request_id, "status" => 'active'));
$count_offers = $get_offers->rowCount()

?>


<!DOCTYPE html>
<html lang="en" class="ui-toolkit">

<head>
	<title><?= $site_name; ?> - View Offers.</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="<?= $site_desc; ?>">
	<meta name="keywords" content="<?= $site_keywords; ?>">
	<meta name="author" content="<?= $site_author; ?>">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100" rel="stylesheet">
	<link href="../styles/bootstrap.css" rel="stylesheet">
	<link href="../styles/custom.css" rel="stylesheet"> <!-- Custom css code from modified in admin panel --->
	<link href="../styles/styles.css" rel="stylesheet">
	<link href="../styles/user_nav_styles.css" rel="stylesheet">
	<link href="../font_awesome/css/font-awesome.css" rel="stylesheet">
	<link href="../styles/sweat_alert.css" rel="stylesheet">
	<link href="../styles/newly_changes_style_file.css" rel="stylesheet">
	<script type="text/javascript" src="../js/sweat_alert.js"></script>
	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script src="https://checkout.stripe.com/checkout.js"></script>
	<?php if (!empty($site_favicon)) { ?>
		<link rel="shortcut icon" href="<?= $site_favicon; ?>" type="image/x-icon">
	<?php } ?>

	<style>
		.bg-site-color {
			background-color: #00cdce;
			color: white;
		}

		/* Custom Dropdown */
		.custom-dropdown-code {
			position: relative;
			display: inline-block;
		}

		.custom-btn {
			background-color: #00cecc;
			color: white;
			padding: 5px 10px;
			font-size: 16px;
			border: none;
			cursor: pointer;
			border-radius: 5px;
		}

		.custom-btn:hover {
			background-color: #00cedc;
		}

		.custom-dropdown-code-toggle {
			display: flex;
			justify-content: center;
			align-items: center;
		}

		.custom-dropdown-code-menu {
			display: none;
			position: absolute;
			top: 100%;
			left: -10;
			right: -17px;
			min-width: 160px;
			background-color: #fff;
			border: 1px solid #ddd;
			box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.1);
			z-index: 1;
			border-radius: 5px;
		}

		.custom-dropdown-code-menu a {
			color: #333;
			padding: 10px;
			text-decoration: none;
			display: block;
		}

		.custom-dropdown-code-menu a:hover {
			background-color: #f1f1f1;
		}

		.custom-dropdown-code.open .custom-dropdown-code-menu {
			display: block;
		}
	</style>
	<style>
		/* Additional Styling for New Row Structure */
		.milestone-card-row {
			display: flex;
			align-items: center;
			/* margin-bottom: 6px; */
		}

		.milestone-card-row-status {
			display: flex;
			align-items: center;
			justify-content: space-between;

		}

		.milestone-header-title {
			font-weight: bold;
			color: #000;
			font-size: 15px;
			margin-right: 8px;
			white-space: nowrap;
			width: 75px;
		}

		.milestone-job-title,
		.milestone-title,
		.milestone-description {
			font-size: 1em;
			color: #333;
			flex: 1;
		}

		/* General Styling for Milestone Card */
		.milestone-card {
			border: 1px solid #ccc;
			border-radius: 8px;
			padding: 16px;
			background-color: #fff;
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
			font-family: Arial, sans-serif;
			/* margin: 20px; */
		}

		/* Header */
		.milestone-card-header {
			font-weight: bold;
			font-size: 1em;
			margin-bottom: 10px;
		}

		/* Details Section */
		.milestone-card-details {
			display: flex;
			align-items: center;
			font-size: 0.9em;
			color: #555;
			margin-bottom: 10px;
			justify-content: flex-start;
		}

		.milestone-card-item {
			display: flex;
			align-items: center;
		}

		.milestone-icon {
			margin-right: 4px;
			font-weight: bold;
			color: #000;
			font-size: 15px;

		}

		.w-75px {
			width: 75px;
		}

		/* Footer */
		.milestone-card-footer {
			display: flex;
			justify-content: space-between;
			align-items: center;
			font-size: 0.9em;
			color: #777;
			position: relative;
		}

		.milestone-actions {
			font-weight: bold;
			font-size: 15px;
			color: #000;
		}

		.milestone-action-button {
			background-color: #00c4cc;
			color: white;
			border: none;
			padding: 4px 8px;
			border-radius: 4px;
			cursor: pointer;
			font-size: 1em;
		}

		/* Dropdown Menu */
		.dropdown-menu-milestone {
			display: none;
			position: absolute;
			top: 30px;
			right: 0 !important;
			background-color: #fff;
			border: 1px solid #ddd;
			border-radius: 4px;
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
			z-index: 1;
			width: 150px;
		}

		.dropdown-item-milestone {
			padding: 3px 10px;
			font-size: 0.9em;
			color: #333;
			cursor: pointer;
		}

		.dropdown-item-milestone:hover {
			background-color: #f0f0f0;
		}


		.horizontal-milestone {
			margin: 5px 0px 5px 0px;

		}

		.milestone-status.btn-style-status button {
			color: #fff;
			background-color: grey;
			padding: 5px 10px;
			border-radius: 5px;
			border: none;
		}

		.milestone-status.completed {
			color: green;
		}

		.milestone-status.cancel-request {
			color: orange;
		}


		/* Responsive */
		@media (max-width: 768px) {
			.mobile_details_milestone {
				display: block;
			}

			.desktop_details_milestone {
				display: none;
			}
		}

		@media (min-width: 769px) {
			.mobile_details_milestone {
				display: none;
			}

			.desktop_details_milestone {
				display: block;
			}
		}

		.custom-btn-styling {
			color: #fff;
			background-color: grey;
			padding: 5px 10px;
			border-radius: 5px;
			border: none;
		}

		.bg-danger-color {
			background-color: #f5c6cb;
		}
	</style>
	<style>
		.new_form_designinner {
			width: auto;
			max-width: 550px;
			background-color: #f7f7f7;
			border-radius: 10px;
			margin: 8rem auto;
			padding: 2rem;
		}

		.new_form_designinner2 {
			width: auto;
			display: none;
			max-width: 550px;
			background-color: #f7f7f7;
			border-radius: 10px;
			margin: auto;
			padding: 2rem;
		}

		/* Mobile view adjustment with !important */
		@media (max-width: 768px) {
			.new_form_designinner {
				margin: 9rem 2rem 0px 2rem !important;
			}
		}

		.close_miles_form_span {
			border: 1px solid;
			padding: 5px 10px 1px;
			float: inline-end;
			/* color: #000; */
			font-weight: 100;
			border-radius: 5px;
			/* background-color: black; */
		}

		.task-input-field-design {
			box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 5px 0px,
				rgba(0, 0, 0, 0.1) 0px 0px 1px 0px;
			border: none;
			border-radius: 5px;
		}

		.task-title-label-design {
			color: gray;
			font-weight: 600;
		}

		.create-milestone-title-n:hover {
			color: #00cedc !important;
		}

		.milestone-d-action-drop {
			padding: 10px;
		}
	</style>

	<!-- Include the PayPal JavaScript SDK -->
	<script src="https://www.paypal.com/sdk/js?client-id=<?= $paypal_client_id; ?>&disable-funding=credit,card&currency=<?= $paypal_currency_code; ?>"></script>

</head>

<body class="is-responsive">
	<?php require_once("../includes/user_header.php"); ?>
	<div class="container mb-4" style="margin-top: 200px;">
		<div class="row view-offers">
			<h2 class="mb-3 ml-3"> View Offers (<?= $count_offers; ?>) </h2>
			<div class="col-md-12">
				<div class="card mb-4 rounded-0">
					<div class="card-body">
						<h5 class="font-weight-bold"> Request Description: </h5>
						<p class="offer-p"><?= $request_description; ?></p>
						<p class="offer-p">
							<i class="fa fa-money"></i> <span> Request Budget: </span><span class="text-muted"> <?= showPrice($request_budget); ?> </span><br>
							<i class="fa fa-calendar"></i> <span> Request Date: </span><span class="text-muted"> <?= $request_date; ?></span> <br>
							<i class="fa fa-clock-o"></i> <span> Request Duration: </span><span class="text-muted"> <?= $request_delivery_time; ?> </span> <br>
							<i class="fa fa-archive"></i> <span> Request Category: </span><span class="text-muted"> <?= $request_cat_title; ?> / <?= $request_child_title; ?> </span>
						</p>
					</div>
				</div>
				<?php if ($count_offers == "0") { ?>
					<div class="card rounded-0 mb-3">
						<div class="card-body bg-danger-color">
							<h3 class="text-center">
								<i class="fa fa-frown-o"></i> Unfortunately, no offers yet. Please wait a little longer.
							</h3>
						</div>
					</div>
					<?php
				} else {
					// USER RATING
					$select_buyer_reviews = $db->select("buyer_reviews", array("review_seller_id" => $login_seller_id));
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

					while ($row_offers = $get_offers->fetch()) {

						$offer_id = $row_offers->offer_id;
						$proposal_id = $row_offers->proposal_id;
						$description = $row_offers->description;
						$delivery_time = $row_offers->delivery_time;
						$amount = $row_offers->amount;
						$sender_id = $row_offers->sender_id;
						$select_sender = $db->select("sellers", array("seller_id" => $sender_id));
						$row_sender = $select_sender->fetch();
						$sender_user_name = $row_sender->seller_user_name;
						$sender_level = $row_sender->seller_level;
						$sender_image = $row_sender->seller_image;
						$sender_status = $row_sender->seller_status;

						$select_proposals = $db->select("proposals", array("proposal_id" => $proposal_id));
						$row_proposals = $select_proposals->fetch();
						$proposal_title = $row_proposals->proposal_title;
						$proposal_url = $row_proposals->proposal_url;
						$proposal_img1 = getImageUrl2("proposals", "proposal_img1", $row_proposals->proposal_img1);

					?>
						<div class="card rounded-0 mb-3">
							<div class="card-body">
								<div class="row">
									<div class="col-md-2">
										<img src="<?= $proposal_img1; ?>" class="img-fluid">
									</div>
									<div class="col-md-7">
										<h5 class="mt-md-0 mt-2">
											<a href="<?= $site_url ?>/proposals/<?= $sender_user_name; ?>/<?= $proposal_url; ?>" class="text-success">
												<?= $proposal_title; ?>
											</a>
										</h5>
										<p class="mb-1">
											<?= $description; ?>
										</p>
										<p class="offer-p">
											<i class="fa fa-money"></i> Offer Budget: <span class="font-weight-normal text-muted"> <?= showPrice($amount); ?> </span><br>
											<i class="fa fa-calendar"></i> Offer Duration: <span class="font-weight-normal text-muted"> <?= $delivery_time; ?> </span>
										</p>
									</div>
									<div class="col-md-3 responsive-border pt-md-0 pt-3">
										<div class="offer-seller-picture">
											<a href="<?= $site_url ?>/<?= $sender_user_name; ?>" target="_blank">
												<?php if (!empty($sender_image)) { ?>
													<img src="<?= $site_url ?>/user_images/<?= $sender_image; ?>" class="rounded-circle">
												<?php } else { ?>
													<img src="<?= $site_url ?>/user_images/empty-image.png" class="rounded-circle">
												<?php } ?>
											</a>

											<?php if ($sender_level == 2) { ?>
												<img src="<?= $site_url ?>/images/level_badge_1.png" class="level-badge">
											<?php } elseif ($sender_level == 3) { ?>
												<img src="<?= $site_url ?>/images/level_badge_2.png" class="level-badge">
											<?php } elseif ($sender_level == 4) { ?>
												<img src="<?= $site_url ?>/images/level_badge_3.png" class="level-badge">
											<?php } ?>
										</div>
										<div class="offer-seller mb-1">
											<p class="font-weight-bold mb-1">
												<a href="<?= $site_url ?>/<?= $sender_user_name; ?>" class="text-dark" target="_blank">
													<?= $sender_user_name; ?>
												</a>
												<small class="text-success">
													<?= $sender_status; ?>
												</small>
											</p>
											<div class="star-rating text-warning">
												<?php
												for ($seller_i = 0; $seller_i < $average_rating; $seller_i++) {
													echo " <i class='fa fa-star'></i> ";
												}
												for ($seller_i = $average_rating; $seller_i < 5; $seller_i++) {
													echo " <i class='fa fa-star-o'></i> ";
												}
												?>
												<span class="text-dark m-1"><strong>
														<?php printf("%.1f", $average); ?></strong> (<?= $count_reviews ?>)</span>
											</div>
											<p class="user-link">
												<a href="<?= $site_url ?>/<?= $sender_user_name; ?>" class="text-success" target="_blank"> User Profile </a>
											</p>
										</div>
										<p><small><i class="fa fa-thumbs-o-up" data-toggle="tooltip" data-placement="top" title="Recommend"></i> 0 recommendation</small></p>
										<a href="<?= $site_url ?>/conversations/message?seller_id=<?= $sender_id; ?>&offer_id=<?= $offer_id; ?>" class="btn btn-sm btn-success rounded-0">
											Contact Now
										</a>
										<button class="btn btn-sm btn-success rounded-0" onclick="orderNowModel()">Order Now</button>

										<div id="order_now_model_btn" class="model_order_now_display_style">
											<div class="order_now_models_inner_div">
												<h3>Choose Payment Option <span class="close_order_now_moden_btn" onclick="orderNowModelClose()">X</span></h3>
												<hr>
												<div class="p-2">
													<input type="radio" name="select_one_option" id="create_milestone" /> &nbsp; Create Milestone <br>
												</div>
												<div class="p-2">
													<input type="radio" name="select_one_option" id="full_payment" /> &nbsp; Complete Project <br>
												</div>
												<hr>

												<div class="new_form_designinner2 milestone_form_display">
													<form method="post">
														<h4 class="mb-4"><u>Create Milestone</u></h4>
														<div class="row">
															<div class="col-md-12">
																<label for="" class="task-title-label-design">Task Title</label><br>
																<input class="col-md-12 p-2 task-input-field-design" type="text" name="task_title" placeholder="Enter your task" id="" required>
															</div>
															<div class="col-md-12 mt-3">
																<label for="" class="task-title-label-design">Task Description</label><br>
																<input class="col-md-12 p-2 task-input-field-design" type="text" name="task_description" placeholder="Enter your description" id="" required>
															</div>
															<div class="col-md-6 mt-3">
																<label for="" class="task-title-label-design">Task Amount ( In $ )</label> <br>
																<input class="col-md-12 p-2 task-input-field-design" type="number" name="task_amount" placeholder="Enter your amount" id="" required>
															</div>
															<div class="col-md-6 mt-3">
																<label for="" class="task-title-label-design">Delivery Time</label><br>
																<input class="col-md-12 p-2 task-input-field-design" type="number" name="delivery_time" placeholder="Enter your delivery time" id="" required>
															</div>
														</div>
														<div class="w-100 d-flex pt-5">
															<button type="submit" class="m-auto submit_milestone_btn_style" name="submit_milestone">Submit</button>
														</div>
													</form>
												</div>
												<div class="full_payment_btn_display form_milestone_div_btn" style="display:none;">
													<h4 class="mb-3"><u>Full Payment</u></h4>
													<button id="order-button-<?= $offer_id; ?>" class="btn btn-sm btn-success rounded px-4 py-2">
														Pay Here
													</button>
												</div>
											</div>
										</div>
										<p class="mt-2"><a class="text-danger <?= ($lang_dir == "right" ? 'text-right' : '') ?>" href="#" data-toggle="modal" data-target="#report-modal-uni" data-content-id="<?= $request_id ?>" data-content-type="view_offers" data-url="<?= $site_url ?>/requests/view_offers?request_id=<?= $request_id ?>"><svg viewBox="0 0 24 24" role="presentation" aria-hidden="true" focusable="false" style="height:12px;width:12px;fill:#000;margin-right:5px;">
													<path d="m22.39 5.8-.27-.64a207.86 207.86 0 0 0 -2.17-4.87.5.5 0 0 0 -.84-.11 7.23 7.23 0 0 1 -.41.44c-.34.34-.72.67-1.13.99-1.17.87-2.38 1.39-3.57 1.39-1.21 0-2-.13-3.31-.48l-.4-.11c-1.1-.29-1.82-.41-2.79-.41a6.35 6.35 0 0 0 -1.19.12c-.87.17-1.79.49-2.72.93-.48.23-.93.47-1.35.71l-.11.07-.17-.49a.5.5 0 1 0 -.94.33l7 20a .5.5 0 0 0 .94-.33l-2.99-8.53a21.75 21.75 0 0 1 1.77-.84c.73-.31 1.44-.56 2.1-.72.61-.16 1.16-.24 1.64-.24.87 0 1.52.11 2.54.38l.4.11c1.39.37 2.26.52 3.57.52 2.85 0 5.29-1.79 5.97-3.84a.5.5 0 0 0 0-.32c-.32-.97-.87-2.36-1.58-4.04zm-4.39 7.2c-1.21 0-2-.13-3.31-.48l-.4-.11c-1.1-.29-1.82-.41-2.79-.41-.57 0-1.2.09-1.89.27a16.01 16.01 0 0 0 -2.24.77c-.53.22-1.04.46-1.51.7l-.21.11-3.17-9.06c.08-.05.17-.1.28-.17.39-.23.82-.46 1.27-.67.86-.4 1.7-.7 2.48-.85.35-.06.68-.1.99-.1.87 0 1.52.11 2.54.38l.4.11c1.38.36 2.25.51 3.56.51 1.44 0 2.85-.6 4.18-1.6.43-.33.83-.67 1.18-1.02a227.9 227.9 0 0 1 1.85 4.18l.27.63c.67 1.57 1.17 2.86 1.49 3.79-.62 1.6-2.62 3.02-4.97 3.02z" fill-rule="evenodd"></path>
												</svg> Report Proposal</a></p>
									</div>
								</div>
								<script>
									function orderNowModel() {
										let ordernowmodelbtn = document.getElementById("order_now_model_btn");
										ordernowmodelbtn.style.display = "block";
									}

									function orderNowModelClose() {
										let ordernowmodelbtn = document.getElementById("order_now_model_btn");
										ordernowmodelbtn.style.display = "none";
									}
									document.addEventListener("DOMContentLoaded", function() {
										const createMilestoneRadio = document.getElementById('create_milestone');
										const fullPaymentRadio = document.getElementById('full_payment');

										const milestoneForm = document.querySelector('.milestone_form_display');
										const fullPaymentForm = document.querySelector('.full_payment_btn_display');

										function handleDisplay() {
											if (createMilestoneRadio.checked) {
												milestoneForm.style.display = 'block';
												fullPaymentForm.style.display = 'none';
											} else if (fullPaymentRadio.checked) {
												milestoneForm.style.display = 'none';
												fullPaymentForm.style.display = 'block';
											}
										}
										createMilestoneRadio.addEventListener('change', handleDisplay);
										fullPaymentRadio.addEventListener('change', handleDisplay);
									});
								</script>
								<script>
									$("#order-button-<?= $offer_id; ?>").click(function() {
										request_id = "<?= $request_id; ?>";
										offer_id = "<?= $offer_id; ?>";
										$.ajax({
											method: "POST",
											url: "offer_submit_order",
											data: {
												request_id: request_id,
												offer_id: offer_id
											}
										}).done(function(data) {
											$("#append-modal").html(data);
										});
									});
								</script>
							</div>
						</div>
					<?php } ?>
				<?php } ?>
			</div>
		</div>
	</div>



	<?php
	// insert milestone
	if (isset($_POST["submit_milestone"])) {
		$task_amount = $_POST['task_amount'];
		$delivery_time = $_POST['delivery_time'];
		$task_description = $_POST['task_description'];
		$task_title = $_POST['task_title'];

		$chech_if_onumber = $db->select("milestone", array("request_id" => $request_id))->fetch();
		$order_number = $chech_if_onumber->order_number;

		$current_order_no = $order_number;

		$suffix = 0;
		do {
			$chech_if_exist = $suffix == 0 ? $current_order_no : $current_order_no . '-' . $suffix;

			$existing_o_data = $db->select("milestone", array("request_id" => $request_id, "order_number" => $chech_if_exist))->fetch();
			$suffix++;
		} while ($existing_o_data);

		$insert_milestone_data = $db->insert(
			"milestone",
			array(
				"task_amount" => $task_amount,
				"delivery_time" => $delivery_time . " days",
				"task_description" => $task_description,
				"request_id" => $request_id,
				"sender_id" => $sender_id,
				"seller_id" => $login_seller_id,
				"proposal_id" => $proposal_id,
				"offer_id" => $offer_id,
				"task_title" => $task_title,
				"order_number" => $chech_if_exist
			)
		);

		if ($insert_milestone_data) {
			echo "<div class='bg-success p-3 rounded mx-5 mb-3'><div>Milestone Created Successfully</div></div>";
		} else {
			echo "<div class='bg-warning p-3 rounded mx-5 mb-3'><div>Milestone Not Created! Try Again</div></div>";
		}
	}
	// select query milestone


	// $fetchAllMiles->$task_description;
	?>
	<div class="page-container mobile_details_milestone p-3">
		<h2 class="mb-3 text-center">Milestone Details </h2>
		<?php
		$display_milestone_sec = $db->select("milestone", array("seller_id" => $login_seller_id));
		if ($display_milestone_sec->rowCount() > 0) {
			while ($fetch_milestone_sec = $display_milestone_sec->fetch()) {
				$task_amount = $fetch_milestone_sec->task_amount;
				$delivery_time = $fetch_milestone_sec->delivery_time;
				$task_description = $fetch_milestone_sec->task_description;
				$request_id = $fetch_milestone_sec->request_id;
				$sender_id = $fetch_milestone_sec->sender_id;
				$proposal_id = $fetch_milestone_sec->proposal_id;
				$offer_id = $fetch_milestone_sec->offer_id;
				$task_title = $fetch_milestone_sec->task_title;
				$milestone_id = $fetch_milestone_sec->milestone_id;
				$milestone_status = $fetch_milestone_sec->milestone_status;
				$order_number = $fetch_milestone_sec->order_number;
				$order_id = $fetch_milestone_sec->order_id;
				$buyer_requests_miles_sec = $db->select("buyer_requests", array("request_id" => $request_id));
				$fetch_buyer_miles_req_sec = $buyer_requests_miles_sec->fetch();
				$request_title = $fetch_buyer_miles_req_sec->request_title;
		?>

				<!-- Mobile-only Card Format -->
				<div class="milestone-card">
					<!-- Job Title Row -->
					<div class="milestone-card-row">
						<p class="milestone-header-title">Job:</p>
						<p class="milestone-job-title"><?= $request_title; ?></p>
					</div>
					<!-- Milestone Title Row -->
					<div class="milestone-card-row">
						<p class="milestone-header-title">Milestone:</p>
						<p class="milestone-title"><?= $task_title; ?></p>
					</div>
					<!-- Milestone Description Row -->
					<div class="milestone-card-row">
						<p class="milestone-header-title">Desc:</p>
						<p class="milestone-description"><?= $task_description; ?></p>
					</div>
					<!-- Details Section -->
					<div class="milestone-card-details">
						<div class="milestone-card-item">
							<span class="milestone-icon w-75px">Amount: </span>
							<span class="milestone-amount">$<?= $task_amount; ?></span>
						</div>
						<div class="milestone-card-item">
							<span class="milestone-icon ml-5">Delivery Time:</span>
							<span class="milestone-date"><?= $delivery_time; ?> Days</span>
						</div>
					</div>
					<!-- Status Row -->
					<div class="milestone-card-row-status">
						<p class="milestone-header-title">Status:</p>
						<p class="milestone-status btn-style-status">
							<?php
							$milestone_view_status = ($milestone_status == "not paid") ? '<button class="order-now-' . $milestone_id . '">Order Now</button>' : $milestone_status;
							echo $milestone_view_status;
							?></p> <!-- Add "completed" or "cancel-request" for other statuses -->
					</div>
					<hr class="horizontal-milestone">
					<!-- Actions Section -->

					<div class="milestone-card-footer">
						<p class="milestone-actions">Actions</p>

						<div class="custom-dropdown-code">
							<button class="custom-btn custom-btn-success custom-dropdown-code-toggle" onclick="toggleDropdownCustom()">▼</button>
							<div class="custom-dropdown-code-menu">
								<p class="mb-0"><a href="<?= $site_url; ?>/customer_support?enquiry_id=1&order_number=<?= $order_number ?>">Dispute</a></p>
								<p class="mb-0"><a href="<?= $site_url; ?>/order_details?order_id=<?= $order_id ?>">Payment Release</a></p>
							</div>
						</div>

					</div>
				</div>
		<?php }
		} ?>
	</div>



	<div class="width_ninty_percent desktop_details_milestone">
		<h4 class="mb-3">Milestone Details </h4>
		<div class="table-responsive box-table box-shadow-req-act p-2">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th class="font-size-3">Title</th>
						<th class="font-size-3">Description</th>
						<th class="font-size-3">Amount</th>
						<th class="font-size-3">Delivery Date & Time</th>
						<th class="font-size-3">Status</th>
						<th class="font-size-3">More Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php

					$buyer_request_id = $_GET['request_id'];
					$display_milestone = $db->select("milestone", array("seller_id" => $login_seller_id, array("request_id" => $buyer_request_id)));

					if ($display_milestone->rowCount() > 0) {
						while ($fetch_milestone = $display_milestone->fetch()) {
							$task_amount = $fetch_milestone->task_amount;
							$delivery_time = $fetch_milestone->delivery_time;
							$task_description = $fetch_milestone->task_description;
							$request_id = $fetch_milestone->request_id;
							$sender_id = $fetch_milestone->sender_id;
							$proposal_id = $fetch_milestone->proposal_id;
							$offer_id = $fetch_milestone->offer_id;
							$task_title = $fetch_milestone->task_title;
							$milestone_id = $fetch_milestone->milestone_id;
							$milestone_status = $fetch_milestone->milestone_status;
							$order_number = $fetch_milestone->order_number;
					?> <tr class="">
								<td><?= $task_title; ?> </td>
								<td><?= $task_description; ?> </td>
								<td>$<?= $task_amount; ?> </td>
								<td><?= $delivery_time; ?> </td>
								<td>
									<?php
									$status_milestone = ($milestone_status == 'not paid') ? '<button class="custom-btn-styling" id="order-now-' . $milestone_id . '">Order Now</button>' : $milestone_status;
									?>
									<?= $status_milestone; ?>
								</td>
								<td>
									<div class="dropdown">
										<button class="btn btn-success dropdown-toggle" data-toggle="dropdown"></button>
										<div class="dropdown-menu px-2" id="drop_list_miles">
											<p class="mb-2" onclick="newFormDesignFunc()">Create Milestone</p>
											<p class="mb-2"><a href="<?= $site_url ?>/customer_support?enquiry_id=1&order_number=<?= $order_number ?>">Dispute</a></p>
											<p class="mb-2"><a href="">Payment Release</a></p>
										</div>
									</div>
								</td>
							</tr>
							<script>
								$("#order-now-<?= $milestone_id; ?>").click(function() {
									request_id = "<?= $request_id; ?>";
									milestone_id = "<?= $milestone_id; ?>";
									order_number = "<?= $order_number; ?>";
									$.ajax({
										method: "POST",
										url: "milestone_submit_order",
										data: {
											request_id: request_id,
											milestone_id: milestone_id,
											order_number: order_number
										}
									}).done(function(data) {
										$("#append-modal").html(data);
									});
								});
							</script>
						<?php

						}
					} else {
						?>
						<tr class="table-danger">
							<td colspan="6">
								No milestones found
							</td>
						</tr>
					<?php }

					?>
				</tbody>
			</table>

			<!-- <div class="new_form_design" id="new_form_design">
				<div class="new_form_designinner">
					<div class="form_milestone_div">
						<div class="milestone_form_display">
							<form method="post">
								<h4 class="mb-4"><u>Create Milestone</u> <span class="close_miles_form_span" onclick="closeNewDesignForm()"> X </span></h4>
								<div class="row">
									<div class="col-md-12">
										<label for="">Task Title</label><br>
										<input class="col-md-12 p-3" type="text" name="task_title" id="" required>
									</div>
									<div class="col-md-12 mt-3">
										<label for="">Task Description</label><br>
										<input class="col-md-12 p-3" type="text" name="task_description" id="" required>
									</div>
									<div class="col-md-6 mt-3">
										<label for="">Task Amount ( In $ )</label> <br>
										<input class="col-md-12 p-3" type="number" name="task_amount" id="" required>
									</div>
									<div class="col-md-6 mt-3">
										<label for="">Delivery Time</label><br>
										<input class="col-md-12 p-3" type="number" name="delivery_time" id="" required>
									</div>
								</div>
								<div class="w-100 d-flex pt-5 pb-3">
									<button type="submit" class="m-auto submit_milestone_btn_style" name="submit_milestone">Submit</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div> -->

			<div class="new_form_design" id="new_form_design">
				<div class="new_form_designinner">
					<div class="form_milestone_div">
						<div class="milestone_form_display">
							<form method="post">
								<h4 class="mb-4"><u>Create Milestone</u> <span class="close_miles_form_span" onclick="closeNewDesignForm()"> X </span></h4>
								<div class="row">
									<div class="col-md-12">
										<label for="" class="task-title-label-design">Task Title</label><br>
										<input class="col-md-12 p-2 task-input-field-design" type="text" name="task_title" placeholder="Enter Your Task" id="" required>
									</div>
									<div class="col-md-12 mt-3">
										<label for="" class="task-title-label-design">Task Description</label><br>
										<input class="col-md-12 p-2 task-input-field-design" type="text" name="task_description" placeholder="Enter Your description" id="" required>
									</div>
									<div class="col-md-6 mt-3">
										<label for="" class="task-title-label-design">Task Amount ( In $ )</label> <br>
										<input class="col-md-12 p-2 task-input-field-design" type="number" name="task_amount" placeholder="Enter Your amount" id="" required>
									</div>
									<div class="col-md-6 mt-3">
										<label for="" class="task-title-label-design">Delivery Time</label><br>
										<input class="col-md-12 p-2 task-input-field-design" type="number" name="delivery_time" placeholder="Enter Your delivery time" id="" required>
									</div>
								</div>
								<div class="w-100 d-flex pt-5 pb-3">
									<button type="submit" class="m-auto submit_milestone_btn_style" name="submit_milestone">Submit</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<script>
		function newFormDesignFunc() {
			var new_form_design = document.getElementById("new_form_design");
			var drop_list_miles = document.getElementById("drop_list_miles");
			new_form_design.style.display = "block";
			drop_list_miles.style.display = "none";
		}

		function closeNewDesignForm() {
			var new_form_design = document.getElementById("new_form_design");
			new_form_design.style.display = "none";
			window.location.reload();
		}
	</script>

	<script>
		function displayMileStoneForm() {
			var position_fixed_div = document.getElementById("position_fixed_div");
			position_fixed_div.style.display = "block";
		}

		function displayNoneMileStoneForm() {
			var position_fixed_div = document.getElementById("position_fixed_div");
			position_fixed_div.style.display = "none";
		}

		function toggleDropdownCustom() {
			const dropdown = document.querySelector('.custom-dropdown-code');
			dropdown.classList.toggle('open');
		}
	</script>
	<div id="append-modal"></div>
	<?php require_once("../includes/footer.php"); ?>
</body>

</html>