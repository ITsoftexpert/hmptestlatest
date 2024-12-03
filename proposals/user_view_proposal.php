<?php
// print("<pre>" . print_r($row_login_seller, true) . "</pre>");
// exit;
// check if purchased is expired or not
$num_gigs = $row_login_seller->no_of_gigs;
if ($row_plan_detail) {
	$getTotalProposals = $db->query("SELECT count(*) as total FROM `proposals` where proposal_seller_id = $row_plan_detail->seller_id AND proposal_status = 'active' AND created_at >= '$row_plan_detail->memb_start_date' AND created_at <= '$row_plan_detail->memb_end_date'");
	$objTotalProposals = $getTotalProposals->fetch();
	$totalProposal = $objTotalProposals->total;
	// print("<pre>" . print_r(($objTotalProposals)) . "</pre>");
	// exit;
} else {
	// update seller information
	$getTotalProposals = $db->query("SELECT count(*) as total FROM `proposals` where proposal_seller_id = $row_login_seller->seller_id AND proposal_status = 'active'");
	$objTotalProposals = $getTotalProposals->fetch();
	$totalProposal = $objTotalProposals->total;
}

// print("<pre>" . print_r([$totalProposal, $num_gigs], true) . "</pre>");
// exit;
if ($totalProposal >= $num_gigs) {
	$flag = 1;
} else {
	$flag = 0;
}

// $select_sellers = $db->select("sellers", array("seller_user_name" => $_SESSION['seller_user_name']));
// $row_sellers = $select_sellers->fetch();

// $checkuser = $db->select("memb_plan_detail where seller_id = $row_sellers->seller_id and memb_status = 'active'  order by id desc LIMIT 1");
// $row_purchsed = $checkuser->fetch();
// if ($row_purchsed) {
// 	$exp_date = $row_purchsed->memb_end_date;
// 	$row_purchsed_detail = $db->select("membership_table where id = " . $row_purchsed->memb_tbl_id . "  LIMIT 1");
// 	$row_purchsed_plan = $row_purchsed_detail->fetch();
// } else {
// 	$exp_date = 'new update';
// 	$row_purchsed_detail = $db->select("membership_table where id = 1  LIMIT 1");
// 	$row_purchsed_plan = $row_purchsed_detail->fetch();
// }
$limit = isset($homePerPage) ? $homePerPage : 5;
?>
<style>
	@media (max-width:768px) {
		.badge-float-right {
			float: right;
			margin-top: -3px;
			padding-top: 5px;
			margin-right: -9px !important;
		}

		.text-align-center {
			text-align: center;
		}

		.margin-auto {
			margin: auto;
			/* box-shadow: 2px 2px 5px black; */
			/* border: 2px solid red; */
		}

		.display_flex {
			width: 100%;
			display: flex;
			/* border: 2px solid red; */
		}

		.display_flex-1 {
			width: 100%;
			display: flex;
			margin-top: 20px !important;
			/* border: 2px solid red; */
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
	}

	.box-shadow-cs5 {
		font-size: 20px;
		width: 100%;
	}

	.font-size-3 {
		border: 1px solid lightgray !important;
		text-align: center;
	}

	.float_right {
		float: right;
	}

	.badge-float-right {
		float: right;
		margin-top: -3px;
		padding-top: 5px;
		margin-right: -9px !important;
	}


	.pt-pr {
		padding: 9px 15px 9px 9px;
	}


	.box-shadow-new-propo {
		background-color: #EBEBEB !important;
		box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
		border: none !important;
		color: #000;
	}

	.notify_you_model {
		width: 100%;
		height: 100%;
		top: 0;
		left: 0;
		background-color: grey;
		opacity: 0.5;
		position: fixed;
	}

	.active-proposals-carvel {
		background-color: #00cedc !important;
		border: none !important;
		color: #fff !important;
		font-size: 17px !important;
		padding: 2px 10px 1px 5px;

	}

	@media only screen and (max-width: 768px) {
		.active-proposel-seller-sec {
			display: none;
		}
	}

	.custom-dropdown {
		/* position: relative; */
		display: inline-block;
	}

	.custom-dropdown-content {
		display: none;
		position: absolute;
		right: 17px;
		background-color: white;
		min-width: 160px;
		box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
		z-index: 999;
	}

	.custom-dropdown-content a {
		color: black;
		padding: 12px 16px;
		text-decoration: none;
		display: block;
	}

	.custom-dropdown-content a:hover {
		background-color: #f1f1f1;
	}

	.custom-dropdown-button {
		background-color: #00cedc;
		border: none;
		color: #fff;
		border-radius: 5px;
	}

	/* ######################################################3 */

	/* Base styles for second dropdown */
	.secondsellerdropdown-dropdown {
		position: relative;
		display: block;
		width: 100%;
		text-align: center;
		margin-top: 20px;
	}

	/* Button */
	.secondsellerdropdown-btn {
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
	.secondsellerdropdown-icon {
		margin-left: 10px;
		font-size: 14px;
		vertical-align: middle;
	}

	/* Dropdown content */
	.secondsellerdropdown-content {
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
	.secondsellerdropdown-list {
		list-style: none;
		padding: 0;
		margin: 0;
	}

	/* Items */
	.secondsellerdropdown-item-active,
	.secondsellerdropdown-item-paused,
	.secondsellerdropdown-item-pending,
	.secondsellerdropdown-item-modification,
	.secondsellerdropdown-item-draft,
	.secondsellerdropdown-item-declined {
		margin-bottom: 8px;
	}

	/* Links */
	.secondsellerdropdown-link-active,
	.secondsellerdropdown-link-paused,
	.secondsellerdropdown-link-pending,
	.secondsellerdropdown-link-modification,
	.secondsellerdropdown-link-draft,
	.secondsellerdropdown-link-declined {
		display: flex;
		justify-content: space-between;
		padding: 8px;
		text-decoration: none;
		color: #212529;
	}

	/* Badges */
	.secondsellerdropdown-badge-active,
	.secondsellerdropdown-badge-paused,
	.secondsellerdropdown-badge-pending,
	.secondsellerdropdown-badge-modification,
	.secondsellerdropdown-badge-draft,
	.secondsellerdropdown-badge-declined {
		padding: 4px;
		border-radius: 5px;
		height: 25px;
		width: 25px;
		text-align: center;
		font-size: 14px;
		color: #fff;
		background-color: #00cedc;
	}

	.secondsellerdropdown-link-active:hover {
		background-color: #ebebeb;
	}

	.secondsellerdropdown-link-paused:hover {
		background-color: #ebebeb;
	}

	.secondsellerdropdown-link-pending:hover {
		background-color: #ebebeb;
	}

	.secondsellerdropdown-link-modification:hover {
		background-color: #ebebeb;
	}

	.secondsellerdropdown-link-draft:hover {
		background-color: #ebebeb;
	}

	.secondsellerdropdown-link-declined:hover {
		background-color: #ebebeb;
	}


	.secondsellerdropdown-btn-ok {
		background-color: #4CAF50;
		color: white;
		padding: 10px 20px;
		border: none;
		cursor: pointer;
		width: 100%;
		margin-top: 10px;
	}

	.secondsellerdropdown-btn-ok:hover {
		background-color: #45a049;
	}

	@media (max-width: 768px) {
		.secondsellerdropdown-dropdown {
			display: block;
		}

		.secondsellerdropdown-content {
			display: none;
		}

		.secondsellerdropdown-content.active {
			display: block;
		}

		.view-my-proposal-hide-on-mobile {
			display: none;
		}
	}

	@media (min-width: 1024px) {
		.secondsellerdropdown-btn {
			display: none;
		}
	}

	@media (min-width: 1024px) {
		.firstsellerdropdown-btn {
			display: none;
		}
	}


	/* byuer seller order summary page css new add */
	.order-card {
		border: 1px solid #e0e0e0;
		border-radius: 8px;
		padding: 16px;
		max-width: 100%;
		background-color: #fff;
		font-family: Arial, sans-serif;
	}

	.manage-req-heading-main {
		font-size: 13px;
	}

	@media (min-width: 1024px) {
		.order-card {
			display: none;
		}
	}

	.Order-Summary {
		margin: 0 0 10px;
		font-size: 1.25em;
		font-weight: bold;
		color: #a7a9ac;
	}

	.Order-Status-textmain {
		font-size: 1.25em;
		color: #a7a9ac;
	}

	.order-content {
		display: flex;
		gap: 10px;
		margin-bottom: 10px;
	}

	.order-image img {
		width: 100px;
		height: 85px;
		border-radius: 4px;
		object-fit: cover;
	}

	.order-text p {
		font-size: 13px;
		color: #333;
	}

	.order-text a {
		color: #007bff;
		text-decoration: none;
	}

	.order-info i {
		margin-right: 4px;
	}

	.order-status {
		display: flex;
		justify-content: space-between;
		align-items: center;
		border-top: 1px solid #e0e0e0;
		padding-top: 10px;
	}

	@media (max-width: 767px) {
		.buyer-carvel-edit-sec {
			display: none;
		}
	}

	.info-container {
		display: flex;
		font-size: 0.85em;
		color: #555;
		gap: 40px;
	}

	.info-item {
		position: relative;
		cursor: pointer;
	}

	.info-item .heading {
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

	.info-item:hover .heading {
		opacity: 1;
		bottom: 100%;
	}

	.buyer-active-orderdataby-carvel {
		display: flex;
		/* gap: 20px;
		flex-direction: column; */
	}

	.mobile-d-nones {
		display: none;
	}
</style>
<div class="col-md-12 padding-40">
	<div class="alert alert-info text-center mt-3 pt-3 pb-3 box-shadow-can-post hide-on-mobile">
		You can post <?php echo $totalProposal >= $num_gigs ? 0 : $num_gigs - $totalProposal ?> number of proposals.
	</div>
	<div class="col_md_12 display_flex-1 mt-0 mb-0 float_right justify-content-center">
		<?php if ($totalProposal >= $num_gigs) { ?>
			<a class="btn btn-success box-shadow-new-propo hide-on-mobile mobile-d-nones" href="<?= $site_url ?>/start_selling"><i class="fa fa-plus-circle"></i> <?= $lang['button']['add_new_proposal']; ?></a>
		<?php } ?>
	</div>
	<!-- 
	<div class="notify_you_model">
<div> </div>
</div> -->

	<div class="secondsellerdropdown-dropdown" id="secondsellerdropdownContainer">
		<button class="secondsellerdropdown-btn" onclick="toggleSecondsellerDropdown()">
			<span id="selectedProposal">Active Proposals</span> <!-- Display selected option -->
			<span class="secondsellerdropdown-icon"><i class="fa-solid fa-caret-down"></i></span>
		</button>
		<div class="secondsellerdropdown-content" id="secondsellerdropdownMenu">
			<ul class="secondsellerdropdown-list">
				<li class="secondsellerdropdown-item-active">
					<a href="#active-proposals-small" class="secondsellerdropdown-link-active" onclick="showSection('active-proposals-small', 'Active Proposals'); closeDropdown()">Active Proposals
						<span class="secondsellerdropdown-badge-active"><?= $count_active_proposals; ?></span>
					</a>
				</li>
				<li class="secondsellerdropdown-item-paused">
					<a href="#pause-proposals-small" class="secondsellerdropdown-link-paused" onclick="showSection('pause-proposals-small', 'Paused Proposals'); closeDropdown()">Paused Proposals
						<span class="secondsellerdropdown-badge-paused"><?= $count_pause_proposals; ?></span>
					</a>
				</li>
				<li class="secondsellerdropdown-item-pending">
					<a href="#pending-proposals-small" class="secondsellerdropdown-link-pending" onclick="showSection('pending-proposals-small', 'Pending Proposals'); closeDropdown()">Pending Proposals
						<span class="secondsellerdropdown-badge-pending"><?= $count_pending_proposals; ?></span>
					</a>
				</li>
				<li class="secondsellerdropdown-item-modification">
					<a href="#modification-proposals-small" class="secondsellerdropdown-link-modification" onclick="showSection('modification-proposals-small', 'Requires Modification'); closeDropdown()">Requires Modification
						<span class="secondsellerdropdown-badge-modification"><?= $count_modification_proposals; ?></span>
					</a>
				</li>
				<li class="secondsellerdropdown-item-draft">
					<a href="#draft-proposals-small" class="secondsellerdropdown-link-draft" onclick="showSection('draft-proposals-small', 'Draft'); closeDropdown()">Draft
						<span class="secondsellerdropdown-badge-draft"><?= $count_draft_proposals; ?></span>
					</a>
				</li>
				<li class="secondsellerdropdown-item-declined">
					<a href="#declined-proposals-small" class="secondsellerdropdown-link-declined" onclick="showSection('declined-proposals-small', 'Declined'); closeDropdown()">Declined
						<span class="secondsellerdropdown-badge-declined"><?= $count_declined_proposals; ?></span>
					</a>
				</li>
			</ul>
		</div>
	</div>

	<div class="buyer-active-orderdataby-carvel mt-4">
		<div id="active-proposals-small" class="proposal-section" style="display: block;"> <!-- Set to block by default -->
			<?php require_once("active-proposal-small.php"); ?>
		</div>
		<hr>
		<div id="pause-proposals-small" class="proposal-section" style="display: none;">
			<?php require_once("pause-proposals-small.php"); ?>
		</div>
		<hr>
		<div id="pending-proposals-small" class="proposal-section" style="display: none;">
			<?php require_once("pending-proposals-small.php"); ?>
		</div>
		<hr>
		<div id="modification-proposals-small" class="proposal-section" style="display: none;">
			<?php require_once("modification-proposals-small.php"); ?>
		</div>
		<hr>
		<div id="draft-proposals-small" class="proposal-section" style="display: none;">
			<?php require_once("draft-proposals-small.php") ?>
		</div>
		<hr>
		<div id="declined-proposals-small" class="proposal-section" style="display: none;">
			<?php require_once("declined-proposals-small.php") ?>
		</div>
	</div>


	<div class="clearfix"></div>


	<ul class="nav nav-tabs flex-column flex-sm-row mt-3 oldseller-section view-my-proposal-hide-on-mobile">
		<li class="nav-item width-increased">
			<a href="#active-proposals" data-toggle="tab" class="nav-link make-black <?= $active; ?> pt-pr">
				<?= $lang['tabs']['active_proposals']; ?> &nbsp; &nbsp; <span class="badge badge-success badge-float-right"><?= $count_active_proposals; ?></span>
			</a>
		</li>
		<li class="nav-item width-increased">
			<a href="#pause-proposals" data-toggle="tab" class="nav-link make-black <?= (isset($_GET['paused'])) ? "active" : ""; ?>  pt-pr">
				<?= $lang['tabs']['pause_proposals']; ?> &nbsp; &nbsp; <span class="badge badge-success badge-float-right"><?= $count_pause_proposals; ?></span>
			</a>
		</li>
		<li class="nav-item width-increased">
			<a href="#pending-proposals" data-toggle="tab" class="nav-link make-black <?= (isset($_GET['pending'])) ? "active" : ""; ?>  pt-pr">
				<?= $lang['tabs']['pending_proposals']; ?> &nbsp; &nbsp; <span class="badge badge-success badge-float-right"><?= $count_pending_proposals; ?></span>
			</a>
		</li>
		<li class="nav-item width-increaseds">
			<a href="#modification-proposals" data-toggle="tab" class="nav-link make-black <?= (isset($_GET['modification'])) ? "active" : ""; ?>  pt-pr">
				<?= $lang['tabs']['requires_modification']; ?> &nbsp; &nbsp; <span class="badge badge-success badge-float-right"><?= $count_modification_proposals; ?></span>
			</a>
		</li>
		<li class="nav-item width-increasese">
			<a href="#draft-proposals" data-toggle="tab" class="nav-link make-black <?= (isset($_GET['draft'])) ? "active" : ""; ?>  pt-pr">
				<?= $lang['tabs']['draft']; ?> &nbsp; &nbsp; <span class="badge badge-success badge-float-right"><?= $count_draft_proposals; ?></span>
			</a>
		</li>
		<li class="nav-item width-increases">
			<a href="#declined-proposals" data-toggle="tab" class="nav-link make-black <?= (isset($_GET['declined'])) ? "active" : ""; ?>  pt-pr">
				<?= $lang['tabs']['declined']; ?> &nbsp; &nbsp; <span class="badge badge-success badge-float-right"><?= $count_declined_proposals; ?></span>
			</a>
		</li>
	</ul>


	<!-- <script>
		function notifyYou() {
			alert('hello');
		}
	</script> -->

	<div class="tab-content active-proposel-seller-sec">
		<div id="active-proposals" class="tab-pane fade show <?= $active; ?>">
			<?php require_once("active-proposals.php") ?>
		</div>
		<div id="pause-proposals" class="tab-pane fade show <?= (isset($_GET['paused'])) ? "active" : ""; ?>">
			<?php require_once("pause-proposals.php") ?>
		</div>
		<div id="pending-proposals" class="tab-pane fade show <?= (isset($_GET['pending'])) ? "active" : ""; ?>">
			<?php require_once("pending-proposals.php") ?>
		</div>
		<div id="modification-proposals" class="tab-pane fade show <?= (isset($_GET['modification'])) ? "active" : ""; ?>">
			<?php require_once("modification-proposals.php") ?>
		</div>
		<div id="draft-proposals" class="tab-pane fade show <?= (isset($_GET['draft'])) ? "active" : ""; ?>">
			<?php require_once("draft-proposals.php") ?>
		</div>
		<div id="declined-proposals" class="tab-pane fade show <?= (isset($_GET['declined'])) ? "active" : ""; ?>">
			<?php require_once("declined-proposals.php") ?>
		</div>
	</div>

	<script>
		document.querySelectorAll(".custom-dropdown-button").forEach(button => {
			button.addEventListener("click", function(event) {
				const dropdownMenu = this.nextElementSibling;
				dropdownMenu.style.display = dropdownMenu.style.display === "block" ? "none" : "block";
				event.stopPropagation(); // Prevent event from bubbling up
			});
		});

		window.addEventListener("click", function() {
			document.querySelectorAll(".custom-dropdown-content").forEach(menu => {
				menu.style.display = "none"; // Hide all dropdowns
			});
		});
	</script>
	<script>
		function toggleSecondsellerDropdown() {
			const dropdown = document.getElementById('secondsellerdropdownMenu');
			dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
		}

		function closeDropdown() {
			const dropdown = document.getElementById('secondsellerdropdownMenu');
			dropdown.style.display = 'none';
		}

		// Function to show the selected proposal section and hide others
		function showSection(sectionId, selectedText) {
			// Hide all sections
			const sections = document.querySelectorAll('.proposal-section');
			sections.forEach(section => {
				section.style.display = 'none';
			});

			// Show the selected section
			const selectedSection = document.getElementById(sectionId);
			if (selectedSection) {
				selectedSection.style.display = 'block';
			}

			// Update the selected text in the button
			document.getElementById('selectedProposal').innerText = selectedText;
		}

		// Close the dropdown if the user clicks outside of it
		window.onclick = function(event) {
			if (!event.target.matches('.secondsellerdropdown-btn')) {
				const dropdowns = document.getElementsByClassName("secondsellerdropdown-content");
				for (let i = 0; i < dropdowns.length; i++) {
					const openDropdown = dropdowns[i];
					if (openDropdown.style.display === 'block') {
						openDropdown.style.display = 'none';
					}
				}
			}
		}
	</script>

</div>