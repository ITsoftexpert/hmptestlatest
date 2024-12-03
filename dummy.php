<div class="form_milestone_div">
			<div class="milestone_form_display">
				<form method="post">
					<h4 class="mb-4"><u>Create Milestone</u> <span class="span_close_btn_sttyle" onclick="displayNoneMileStoneForm()"> X </span></h4>
					<div class="row">
						<div class="col-md-12">
							<label for="requestTitle">Select Request Title</label>
							<select name="request_id" id="requestTitle">
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

						<div class="col-md-12">
							<label for="">Task Title</label><br>
							<input class="col-md-12 p-2" type="text" name="task_title" id="" required><br>
						</div>
						<div class="col-md-12">
							<label for="">Task Description</label><br>
							<input class="col-md-12 p-3" type="text" name="task_description" id="" required><br>
						</div>
						<div class="col-md-6 mt-4">
							<label for="">Task Amount ( In $ )</label> <br>
							<input class="col-md-12 p-3" type="number" name="task_amount" id="" required><br>
						</div>
						<div class="col-md-6 mt-4">
							<label for="">Delivery Time</label><br>
							<input class="col-md-12 p-3" type="number" name="delivery_time" id="" required><br>
						</div>
					</div>
					<div class="w-100 d-flex pt-5 pb-3 mt-2">
						<button type="submit" class="m-auto submit_milestone_btn_style2" name="submit_milestone">Submit</button>
					</div>
				</form>
			</div>
		</div>