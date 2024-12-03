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
	/* .page-container {
		display: flex;
		margin-top: 10rem;
	} */


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
		.milestone-card {
			display: block;
		}

		.desktop_view_milestone {
			display: none;
		}
	}

	@media (min-width: 769px) {
		.milestone-card {
			display: none;
		}

		.desktop_view_milestone {
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
</style>
<div class="w-100 text-right">
	<button class="mb-2 p-2 border-0 rounded text-white bg-site-color" onclick="displayMileStoneForm()">Create New Milestone</button>
</div>
<div class="table-responsive box-table box-shadow-req-act p-2 desktop_view_milestone">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th class="font-size-3">Job's Title</th>
				<th class="font-size-3">Milestone Title</th>
				<th class="font-size-3">Milestone Description</th>
				<th class="font-size-3">Milestone Amount</th>
				<th class="font-size-3">Milestone Delivery Time</th>
				<th class="font-size-3">Status</th>
				<th class="font-size-3">More Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$display_milestone = $db->select("milestone", array("seller_id" => $login_seller_id));
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
					$order_id = $fetch_milestone->order_id;

			?> <tr class="">
						<?php
						$buyer_requests_miles = $db->select("buyer_requests", array("request_id" => $request_id));
						$fetch_buyer_miles_req = $buyer_requests_miles->fetch();
						$request_title = $fetch_buyer_miles_req->request_title;
						?>
						<td><a href="<?= $site_url; ?>/order_details?order_id=<?= $order_id; ?>"><?= $request_title; ?> </a></td>
						<td> <a href="<?= $site_url; ?>/order_details?order_id=<?= $order_id; ?>"><?= $task_title; ?></a> </td>
						<td><?= $task_description; ?> </td>
						<td>$<?= $task_amount; ?> </td>
						<td><?= $delivery_time; ?>
						<td>
							<?php
							$milestone_view_status = ($milestone_status == "not paid") ? '<button class="custom-btn-styling order-now-' . $milestone_id . '">Order Now</button>' : $milestone_status;
							echo $milestone_view_status;
							?>
						</td>
						<td>
							<div class="dropdown">
								<button class="btn btn-success dropdown-toggle" data-toggle="dropdown"></button>
								<div class="dropdown-menu">
									<!-- <p class="mb-2" onclick="displayMileStoneForm()">Create Milestone</p>											 -->
									<p class="mb-2"><a href="<?= $site_url; ?>/customer_support?enquiry_id=1&order_number=<?= $order_number ?>">Dispute</a></p>
									<p class="mb-2"><a href="<?= $site_url; ?>/order_details?order_id=<?= $order_id ?>">Payment Release</a></p>
								</div>
							</div>
						</td>
					</tr>
					<script>
						$(".order-now-<?= $milestone_id; ?>").click(function() {
							request_id = "<?= $request_id; ?>";
							milestone_id = "<?= $milestone_id; ?>";
							$.ajax({


								method: "POST",
								url: "milestone_submit_order",
								data: {
									request_id: request_id,
									milestone_id: milestone_id
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
</div>
<div class="page-container mobile_view_milestone">
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
							<p class="mb-2"><a href="<?= $site_url; ?>/customer_support?enquiry_id=1&order_number=<?= $order_number ?>">Dispute</a></p>
							<p class="mb-2"><a href="<?= $site_url; ?>/order_details?order_id=<?= $order_id ?>">Payment Release</a></p>
						</div>
					</div>

				</div>
			</div>
	<?php }
	} ?>
</div>

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

	.submit_milestone_btn_style {
		border: none;
		background-color: #00cedc;
		color: white;
		border-radius: 3px;
		padding: 9px 40px;
		font-size: 16px;
	}
</style>

<div id="position_fixed_div">
	<div class="position_absolute_div">
		<div class="new_form_designinner2 milestone_form_display mb-5">
			<h4 class="mb-4"><u>Create Milestone</u> <span class="span_close_btn_sttyle" onclick="displayNoneMileStoneForm()"> X </span></h4>
			<div class="row">
				<div class="col-md-12">
					<label for="requestTitle" class="task-title-label-design">Request Title</label>
					<select name="request_id" id="requestTitle" class="col-md-12 p-2 task-input-field-design">
						<option value="" selected>Select Request Title</option>
						<?php
						$select_request = $db->select("buyer_requests", array("seller_id" => $login_seller_id));
						while ($fetch_request = $select_request->fetch()) {
							$request_id = htmlspecialchars($fetch_request->request_id); // Sanitize output
							$request_title = htmlspecialchars($fetch_request->request_title); // Sanitize output
							echo "<option value='$request_id'>$request_title</option>";
						}
						?>
					</select>
				</div>
				<div class="col-md-12 mt-3">
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

	</div>
</div>

<div id="append-modal"></div>

<?php
// insert milestone
if (isset($_POST["submit_milestone"])) {
	$task_title = $_POST['task_title'];
	$task_amount = $_POST['task_amount'];
	$delivery_time = $_POST['delivery_time'];
	$task_description = $_POST['task_description'];
	$request_id = $_POST['request_id'];
	// $request_id = $request_id;
	// $sender_id = $sender_id;
	// $proposal_id = $proposal_id;
	// $offer_id = $offer_id;		
	$insert_milestone_data = $db->insert(
		"milestone",
		array(
			"task_title" => $task_title,
			"task_amount" => $task_amount,
			"delivery_time" => $delivery_time,
			"task_description" => $task_description,
			"request_id" => $request_id,
			"sender_id" => $login_seller_id,
			"seller_id" => $login_seller_id,
			"proposal_id" => $proposal_id,
			"offer_id" => $offer_id,
		)
	);

	if ($insert_milestone_data) {
		echo "Milestone Created Successfully";
	} else {
		echo "Milestone Not Created! Try Again";
	}
}

?>

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