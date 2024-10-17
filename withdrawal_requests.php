<?php

session_start();

include("includes/db.php");

if (!isset($_SESSION['seller_user_name'])) {
	echo "<script>window.open('login.php','_self')</script>";
}

$login_seller_user_name = $_SESSION['seller_user_name'];
$select_login_seller = $db->select("sellers", array("seller_user_name" => $login_seller_user_name));
$row_login_seller = $select_login_seller->fetch();
$login_seller_id = $row_login_seller->seller_id;

?>
<!DOCTYPE html>

<html lang="en" class="ui-toolkit">

<head>

	<title><?= $site_name; ?> - Revenue Earned</title>
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
	<link rel="stylesheet" href="styles/addnew.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>

	<?php if (!empty($site_favicon)) { ?>

		<link rel="shortcut icon" href="<?= $site_favicon; ?>" type="image/x-icon">

	<?php } ?>

	<style>
		@media (max-width:768px) {
			.font-size-3 {
				font-size: 13px !important;
				padding: 10px !important;
				text-align: center;
			}

			.text-align-center {
				text-align: center;
			}

			.mrg-top {
				/* margin-top: 165px !important; */
				margin-bottom: 20px !important;
			}

			.font-size-5 {
				font-size: 19px;
				font-weight: 500;
			}


		}


		@media (max-width: 768px) {

			/* Adjust the max-width according to your design breakpoints */
			.withdrawal-req-heading {
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


		.buyer-active-order-data-nitin {
			display: flex;
			gap: 20px;
			flex-direction: column;
		}

		@media (min-width: 768px) {

			/* Adjust the min-width according to your design breakpoints */
			.buyer-active-order-data-nitin {
				display: none;
				/* This will hide the element on desktop screens */
			}
		}

		.order-card-nitin {
			border: 1px solid #e0e0e0;
			border-radius: 8px;
			padding: 16px;
			max-width: 100%;
			background-color: #fff;
			font-family: Arial, sans-serif;
		}

		.order-content-nitin {
			display: flex;
			gap: 10px;
			margin-bottom: 10px;
		}

		.ref-no-nitin {
			font-size: 1.25em;
			font-weight: bold;
			color: #333;
			margin-bottom: 10px;
		}

		.ref-value-nitin {
			color: red;
			/* Set Ref No value color to red */
		}

		.info-container-nitin {
			display: flex;
			font-size: 0.85em;
			margin: 12px 0;
			color: #555;
			gap: 20px;
		}

		.buyer-offer-img-nitin {
			width: 18px;
		}

		.offer-number-nitin {
			font-weight: bold;
			/* Make offer number bold */
			/* color: red; */
			/* Set offer number color to red */
		}

		.order-status-nitin {
			display: flex;
			justify-content: space-between;
			align-items: center;
			border-top: 1px solid #e0e0e0;
			padding-top: 10px;
		}

		.order-status-text-main-nitin {
			font-size: 1.25em;
			color: #a7a9ac;
		}

		.status-completed-nitin {
			font-weight: bold;
			color: white;
			/* Change text color for better visibility */
			background-color: green;
			/* Set background color to green */
			padding: 5px 15px 5px 15px;
			/* Add some padding for better appearance */
			border-radius: 4px;
			/* Round the corners */
		}

		.status-pending-nitin {
			font-weight: bold;
			color: white;
			/* Change text color for better visibility */
			background-color: orange;
			/* Set background color to green */
			padding: 5px 15px 5px 15px;
			/* Add some padding for better appearance */
			border-radius: 4px;
			/* Round the corners */
		}

		.status-declined-nitin {
			font-weight: bold;
			color: white;
			/* Change text color for better visibility */
			background-color: red;
			/* Set background color to green */
			padding: 5px 15px 5px 15px;
			/* Add some padding for better appearance */
			border-radius: 4px;
			/* Round the corners */
		}

		@media (max-width: 767px) {

			/* Adjust this width based on your mobile breakpoint */
			.withdrawal-req-mobile-hide {
				display: none;
				/* Hide on mobile devices */
			}
		}
	</style>

</head>

<body class="is-responsive">

	<?php include("includes/user_header.php"); ?>

	<div class="container-fluid mrg-top">
		<!-- container Starts -->

		<div class="row">
			<!-- row Starts -->

			<div class="col-md-12 mt-5">
				<!-- col-md-12 mt-5 Starts -->

				<h1 class="mb-4 text-align-center withdrawal-req-heading"> Withdrawal Requests </h1>

				<div class="table-responsive box-table withdrawal-req-mobile-hide">
					<!-- table-responsive box-table Starts -->

					<table class="table table-hover">
						<thead>
							<tr>
								<th class="font-size-3"><?= $lang['th']['no']; ?></th>

								<th class="font-size-3"><?= $lang['th']['ref_no']; ?></th>

								<th class="font-size-3"><?= $lang['th']['date']; ?></th>

								<th class="font-size-3"><?= $lang['th']['amount']; ?></th>

								<th class="font-size-3"><?= $lang['th']['method']; ?></th>

								<th class="font-size-3"><?= $lang['th']['status']; ?></th>
							</tr>
						</thead>
						<tbody>

							<?php

							$i = 0;

							$get = $db->select("payouts", array('seller_id' => $login_seller_id), "DESC");
							$count = $get->rowCount();
							if ($count > 0) {
								while ($row = $get->fetch()) {

									$id = $row->id;
									$ref = $row->ref;
									$seller_id = $row->seller_id;
									$amount = $row->amount;
									$method = $row->method;
									$date = $row->date;
									$status = $row->status;

									if ($method == "bank_transfer") {
										$m_text = "Bank Transfer";
									} else {
										$m_text = ucfirst($method);
									}

									$i++;
							?>

									<tr>

										<td> <?= $i; ?> </td>

										<td class="text-danger"> <?= $ref; ?> </td>

										<td> <?= $date; ?> </td>

										<td class="text-success"> <?= "$s_currency$amount.00"; ?> </td>

										<td class="text-success"> <?= $m_text; ?> </td>

										<td class="<?php if ($status == "pending" or $status == "declined") {
														echo "text-danger";
													} else {
														echo "text-success";
													} ?>">

											<?= ucfirst($status); ?>

											<?php if ($method == "moneygram" and $status == "completed" and $paymentGateway == 1) { ?>
												<a href="#" data-toggle="modal" data-target="#ref-<?= $id; ?>" class="float-right small">View Ref No</a>
											<?php } ?>

											<?php if ($status == "declined") { ?>

												<a href="#" data-toggle="modal" data-target="#reason-<?= $id; ?>" class="float-right small">View Reason</a>

											<?php } ?>

										</td>

									</tr>

									<?php
									if ($paymentGateway == 1) {
										include("plugins/paymentGateway/refModal.php");
									}
									?>

									<div id="reason-<?= $id; ?>" class="modal fade">
										<!-- reason modal fade Starts -->

										<div class="modal-dialog">
											<!-- modal-dialog Starts -->

											<div class="modal-content">
												<!-- modal-content Starts -->

												<div class="modal-header">
													<!-- modal-header Starts -->

													<h5 class="modal-title"> Reason </h5>

													<button class="close" data-dismiss="modal"> <span> &times; </span> </button>

												</div><!-- modal-header Ends -->

												<div class="modal-body text-center">
													<!-- modal-body Starts -->

													<p><?= $row->message; ?></p>

												</div><!-- modal-body Ends -->

											</div><!-- modal-content Ends -->

										</div><!-- modal-dialog Ends -->

									</div><!-- reason modal fade Ends -->

									<?php if (isset($_GET['id']) and $_GET['id'] == $id) { ?>

										<script type="text/javascript">
											$(document).ready(function() {

												<?php if ($status == "completed" and $method == "moneygram" and $paymentGateway == 1) { ?>
													$('#ref-<?= $id; ?>').modal('show');
												<?php } elseif ($status == "declined") { ?>
													$('#reason-<?= $id; ?>').modal('show');
												<?php } ?>

											});
										</script>

									<?php } ?>


								<?php
								}
							} else {
								?>
								<tr class="table-danger text-align-center">
									<td colspan="6" class="font-size-5">0 records found.</td>
								</tr>
							<?php } ?>
						</tbody>

					</table><!-- table table-hover Ends -->


				</div><!-- table-responsive box-table Ends -->

				<div class="buyer-active-order-data-nitin">
					<!-- Completed Status -->
					<div class="order-card-nitin">
						<div class="order-content-nitin">
							<div class="order-text-nitin">
								<span class="ref-no-nitin">Ref No: <span class="ref-value-nitin" style="color: red;">12345</span></span> <!-- Ref No remains bold -->
								<div class="order-info-nitin">
									<div class="info-container-nitin">
										<div class="info-item">
											<i class="fas fa-calendar"></i> July 24, 2024
											<span class="heading">Date</span>
										</div>
										<div class="info-item">
											<i class="fa-brands fa-paypal"></i>
											<span class="offer-number-nitin">Paypal</span> <!-- Offer number -->
											<span class="heading">Method</span>
										</div>
										<div class="info-item">
											<i class="fa-solid fa-sack-dollar"></i> 22.00
											<span class="heading">Amount</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="order-status-nitin">
							<span class="order-status-text-main-nitin">Status: </span>
							<span class="status-completed-nitin">Completed</span>
						</div>
					</div>

					<!-- Pending Status -->
					<div class="order-card-nitin">
						<div class="order-content-nitin">
							<div class="order-text-nitin">
								<span class="ref-no-nitin">Ref No: <span class="ref-value-nitin" style="color: red;">12346</span></span> <!-- Ref No remains bold -->
								<div class="order-info-nitin">
									<div class="info-container-nitin">
										<div class="info-item">
											<i class="fas fa-calendar"></i> July 24, 2024
											<span class="heading">Date</span>
										</div>
										<div class="info-item">
											<i class="fa-brands fa-paypal"></i>
											<span class="offer-number-nitin">Paypal</span> <!-- Offer number -->
											<span class="heading">Method</span>
										</div>
										<div class="info-item">
											<i class="fa-solid fa-sack-dollar"></i> 22.00
											<span class="heading">Amount</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="order-status-nitin">
							<span class="order-status-text-main-nitin">Status: </span>
							<span class="status-pending-nitin">Pending</span>
						</div>
					</div>

					<!-- Declined Status -->
					<div class="order-card-nitin">
						<div class="order-content-nitin">
							<div class="order-text-nitin">
								<span class="ref-no-nitin">Ref No: <span class="ref-value-nitin" style="color: red;">12347</span></span> <!-- Ref No remains bold -->
								<div class="order-info-nitin">
									<div class="info-container-nitin">
										<div class="info-item">
											<i class="fas fa-calendar"></i> July 24, 2024
											<span class="heading">Date</span>
										</div>
										<div class="info-item">
											<i class="fa-brands fa-paypal"></i>
											<span class="offer-number-nitin">Paypal</span> <!-- Offer number -->
											<span class="heading">Method</span>
										</div>
										<div class="info-item">
											<i class="fa-solid fa-sack-dollar"></i> 22.00
											<span class="heading">Amount</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="order-status-nitin">
							<span class="order-status-text-main-nitin">Status: </span>
							<span class="status-declined-nitin">Declined</span>
						</div>
					</div>
				</div>



			</div><!-- col-md-12 mt-5 Ends -->

		</div><!-- row Ends -->

	</div><!-- container Ends -->

	<?php include("includes/footer.php"); ?>

</body>

</html>