<style>
	@media(max-width:768px) {
		.badge-float-right {
			float: right;
			margin-top: -3px;
			padding-top: 5px;
			margin-right: -9px !important;
		}
	}

	@media (min-width:550px) and (max-width:768px) {
		.width-increase {
			width: 20%;
			text-align: center;
		}
	}

	@media(min-width:768px) {
		.width-increase {
			width: 140px;
			text-align: center;
			background-color: #b0b3b41f;
			margin-right: 3px;
		}
	}

	.pt-pr {
		padding: 9px 15px 9px 9px;
	}

	.badge-float-right {
		float: right;
		margin-top: -3px;
		padding-top: 5px;
		margin-right: -9px !important;
	}

	.seller-active-order-nitin {
		padding: 5px 8px 5px 8px;
		background: #00cedc;
		width: fit-content;
		color: #fff !important;
	}

	.border-none-dropdownnitin {
		border: none;
		background-color: #00cedc !important;
		color: #fff !important;
		padding: 2px 10px 1px 5px;
		font-size: 17px !important;
	}

	.active-order-text-nitin {
		color: #fff;
	}

	.seller-drop-nitin {
		left: -105px !important;
	}

	@media (min-width: 768px) {
		.seller-active-order-nitin {
			display: none;
		}
	}

	@media (max-width: 767.98px) {

		/* For screens smaller than 768px */
		.oldseller-section {
			display: none;
		}
	}



	/* ######################################### */

	/* Base styles for dropdown */
	.firstsellerdropdown-dropdown {
		position: relative;
		display: block;
		width: 100%;
		text-align: center;
	}

	/* Button */
	.firstsellerdropdown-btn {
		/* background-color: #f8f9fa;
		border: 1px solid #ced4da;
		padding: 10px;
		font-size: 16px;
		cursor: pointer;
		display: inline-block;
		width: auto;
		margin: 0 auto;
		position: relative; */
		color: #000 !important;
		background-color: #ebebeb !important;
		box-shadow: rgba(0, 0, 0, 0.12) 0px 1px 3px, rgba(0, 0, 0, 0.24) 0px 1px 2px;
		width: fit-content;
		border: none;
		padding: 11px 15px;
		font-size: 17px;
		font-weight: 600;
		gap: 8px;
		align-items: center;
	}

	/* Dropdown icon */
	.firstsellerdropdown-icon {
		margin-left: 10px;
		font-size: 14px;
		vertical-align: middle;
	}

	/* Dropdown content */
	.firstsellerdropdown-content {
		display: none;
		position: absolute;
		background-color: #fff;
		border: 1px solid #ced4da;
		width: 100%;
		z-index: 1;
		padding: 10px;
		left: 0;
		top: 100%;
	}

	/* List styling */
	.firstsellerdropdown-list {
		list-style: none;
		padding: 0;
		margin: 0;
	}

	/* Items */
	.firstsellerdropdown-item-active,
	.firstsellerdropdown-item-delivered,
	.firstsellerdropdown-item-completed,
	.firstsellerdropdown-item-cancelled,
	.firstsellerdropdown-item-all {
		margin-bottom: 8px;
	}

	/* Links */
	.firstsellerdropdown-link-active,
	.firstsellerdropdown-link-delivered,
	.firstsellerdropdown-link-completed,
	.firstsellerdropdown-link-cancelled,
	.firstsellerdropdown-link-all {
		display: flex;
		justify-content: space-between;
		padding: 8px;
		text-decoration: none;
		color: #212529;
	}

	/* Hover effect for links */
	.firstsellerdropdown-link-active:hover {
		background-color: #ebebeb;
	}

	.firstsellerdropdown-link-delivered:hover {
		background-color: #ebebeb;
	}

	.firstsellerdropdown-link-completed:hover {
		background-color: #ebebeb;
	}

	.firstsellerdropdown-link-cancelled:hover {
		background-color: #ebebeb;
	}

	.firstsellerdropdown-link-all:hover {
		background-color: #ebebeb;
	}

	/* Badges */
	.firstsellerdropdown-badge-active {
		padding: 4px;
		border-radius: 5px;
		height: 25px;
		width: 25px;
		text-align: center;
		font-size: 14px;
		color: #fff;
		background-color: #00cedc;
	}

	.firstsellerdropdown-badge-delivered {
		padding: 4px;
		border-radius: 5px;
		height: 25px;
		width: 25px;
		text-align: center;
		font-size: 14px;
		color: #fff;
		background-color: #00cedc;
	}

	.firstsellerdropdown-badge-completed {
		padding: 4px;
		border-radius: 5px;
		height: 25px;
		width: 25px;
		text-align: center;
		font-size: 14px;
		color: #fff;
		background-color: #00cedc;
	}

	.firstsellerdropdown-badge-cancelled {
		padding: 4px;
		border-radius: 5px;
		height: 25px;
		width: 25px;
		text-align: center;
		font-size: 14px;
		color: #fff;
		background-color: #00cedc;
	}

	.firstsellerdropdown-badge-all {
		padding: 4px;
		border-radius: 5px;
		height: 25px;
		width: 25px;
		text-align: center;
		font-size: 14px;
		color: #fff;
		background-color: #00cedc;
	}

	/* OK Button */
	.firstsellerdropdown-btn-ok {
		background-color: #4CAF50;
		color: white;
		padding: 10px 20px;
		border: none;
		cursor: pointer;
		width: 100%;
		margin-top: 10px;
	}

	.firstsellerdropdown-btn-ok:hover {
		background-color: #45a049;
	}

	/* Mobile-specific styles */
	@media (max-width: 768px) {
		.firstsellerdropdown-dropdown {
			display: block;
			/* Ensures dropdown is displayed */
		}

		.firstsellerdropdown-content {
			display: none;
			/* Initially hidden */
		}

		/* Show dropdown content on mobile */
		.firstsellerdropdown-content.active {
			display: block;
			/* Use 'active' class to show content */
		}
	}

	/* Hide on desktop */
	@media (min-width: 1024px) {

		/* Adjust this value based on your breakpoint */
		.firstsellerdropdown-btn {
			display: none;
		}
	}
</style>

<div class="firstsellerdropdown-dropdown" id="firstsellerdropdownContainer">
	<button class="firstsellerdropdown-btn" onclick="toggleFirstsellerDropdown()">Manage Proposals
		<span class="firstsellerdropdown-icon"><i class="fa-solid fa-caret-down"></i></span>
	</button>
	<div class="firstsellerdropdown-content" id="firstsellerdropdownMenu">
		<ul class="firstsellerdropdown-list">
			<li class="firstsellerdropdown-item-active">
				<a href="#" class="firstsellerdropdown-link-active">ACTIVE <span class="firstsellerdropdown-badge-active">0</span></a>
			</li>
			<li class="firstsellerdropdown-item-delivered">
				<a href="#" class="firstsellerdropdown-link-delivered">DELIVERED <span class="firstsellerdropdown-badge-delivered">0</span></a>
			</li>
			<li class="firstsellerdropdown-item-completed">
				<a href="#" class="firstsellerdropdown-link-completed">COMPLETED <span class="firstsellerdropdown-badge-completed">1</span></a>
			</li>
			<li class="firstsellerdropdown-item-cancelled">
				<a href="#" class="firstsellerdropdown-link-cancelled">CANCELLED <span class="firstsellerdropdown-badge-cancelled">1</span></a>
			</li>
			<li class="firstsellerdropdown-item-all">
				<a href="#" class="firstsellerdropdown-link-all">ALL <span class="firstsellerdropdown-badge-all">0</span></a>
			</li>
		</ul>
		<button class="firstsellerdropdown-btn-ok">OK</button>
	</div>
</div>


<!-- <div class="dropdown seller-active-order-nitin">
	<span class="font-weight-bold active-order-text-nitin">Active Orders</span>
	<button class="btn btn-secondary dropdown-toggle border-none-dropdownnitin" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<?= $lang['tabs']['select_order_status']; ?>
	</button>
	<div class="dropdown-menu seller-drop-nitin" aria-labelledby="dropdownMenuButton">
		<a class="dropdown-item" href="#seller_active" data-toggle="tab">
			<?= $lang['tabs']['active']; ?> <span class="badge badge-success badge-float-right"><?= $db->count("orders", array("seller_id" => $login_seller_id, "order_active" => 'yes')); ?></span>
		</a>
		<a class="dropdown-item" href="#seller_delivered" data-toggle="tab">
			<?= $lang['tabs']['delivered']; ?> <span class="badge badge-success badge-float-right"><?= $db->count("orders", array("seller_id" => $login_seller_id, "order_status" => 'delivered')); ?></span>
		</a>
		<a class="dropdown-item" href="#seller_completed" data-toggle="tab">
			<?= $lang['tabs']['completed']; ?> <span class="badge badge-success badge-float-right"><?= $db->count("orders", array("seller_id" => $login_seller_id, "order_status" => 'completed')); ?></span>
		</a>
		<a class="dropdown-item" href="#seller_cancelled" data-toggle="tab">
			<?= $lang['tabs']['cancelled']; ?> <span class="badge badge-success badge-float-right"><?= $db->count("orders", array("seller_id" => $login_seller_id, "order_status" => 'cancelled')); ?></span>
		</a>
		<a class="dropdown-item" href="#seller_all" data-toggle="tab">
			<?= $lang['tabs']['all']; ?> <span class="badge badge-success badge-float-right"><?= $db->count("orders", array("seller_id" => $login_seller_id)); ?></span>
		</a>
	</div>
</div> -->

<ul class="nav nav-tabs flex-column flex-sm-row oldseller-section">
	<li class="nav-item width-increase">
		<?php
		$count_orders = $db->count("orders", array("seller_id" => $login_seller_id, "order_active" => 'yes'));
		?>
		<a href="#seller_active" data-toggle="tab" class="nav-link make-black active  pt-pr">
			<?= $lang['tabs']['active']; ?> <span class="badge badge-success badge-float-right"><?= $count_orders; ?></span>
		</a>
	</li>
	<li class="nav-item width-increase">
		<?php
		$count_orders = $db->count("orders", array("seller_id" => $login_seller_id, "order_status" => 'delivered'));
		?>
		<a href="#seller_delivered" data-toggle="tab" class="nav-link make-black pt-pr">
			<?= $lang['tabs']['delivered']; ?> <span class="badge badge-success badge-float-right"><?= $count_orders; ?></span>
		</a>
	</li>
	<li class="nav-item width-increase">
		<?php
		$count_orders = $db->count("orders", array("seller_id" => $login_seller_id, "order_status" => 'completed'));
		?>
		<a href="#seller_completed" data-toggle="tab" class="nav-link make-black pt-pr">
			<?= $lang['tabs']['completed']; ?> <span class="badge badge-success badge-float-right"><?= $count_orders; ?></span>
		</a>
	</li>
	<li class="nav-item width-increase">
		<?php
		$count_orders = $db->count("orders", array("seller_id" => $login_seller_id, "order_status" => 'cancelled'));
		?>
		<a href="#seller_cancelled" data-toggle="tab" class="nav-link make-black pt-pr">
			<?= $lang['tabs']['cancelled']; ?> <span class="badge badge-success badge-float-right"><?= $count_orders; ?></span>
		</a>
	</li>
	<li class="nav-item width-increase">
		<?php
		$count_orders = $db->count("orders", array("seller_id" => $login_seller_id));
		?>
		<a href="#seller_all" data-toggle="tab" class="nav-link make-black pt-pr">
			<?= $lang['tabs']['all']; ?> <span class="badge badge-success badge-float-right"><?= $count_orders; ?></span>
		</a>
	</li>
</ul>
<div class="tab-content">
	<div class="tab-pane fade show active" id="seller_active">
		<?php require_once("manage_orders/order_active_selling.php") ?>
	</div>
	<div class="tab-pane" id="seller_delivered">
		<?php require_once("manage_orders/order_delivered_selling.php") ?>
	</div>
	<div class="tab-pane" id="seller_completed">
		<?php require_once("manage_orders/order_completed_selling.php") ?>
	</div>
	<div class="tab-pane" id="seller_cancelled">
		<?php require_once("manage_orders/order_cancelled_selling.php") ?>
	</div>
	<div class="tab-pane" id="seller_all">
		<?php require_once("manage_orders/order_all_selling.php") ?>
	</div>
</div>

	<script>
		function toggleFirstsellerDropdown() {
			var dropdownMenu = document.getElementById("firstsellerdropdownMenu");
			dropdownMenu.classList.toggle("active"); // Use class to toggle visibility
		}
	</script>