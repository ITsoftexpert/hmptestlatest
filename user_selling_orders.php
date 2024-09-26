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
</style>
<div class="dropdown seller-active-order-nitin">
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
</div>

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