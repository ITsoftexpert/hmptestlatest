<link rel="stylesheet" href="styles/addnew.css">
<div class="table-responsive box-table mt-3 mb-3 ">
	<table class="table table-bordered buyer-nitin-edit-sec" id="orderActive">
		<thead>
			<tr>
				<th class="font-size-3"><?= $lang['th']['order_summary']; ?></th>
				<th class="font-size-3"><?= $lang['th']['order_date']; ?></th>
				<th class="font-size-3"><?= $lang['th']['due_on']; ?></th>
				<th class="font-size-3"><?= $lang['th']['total']; ?></th>
				<th class="font-size-3"><?= $lang['th']['status2']; ?></th>
			</tr>
		</thead>
		<tbody>
			<tr class="table-info">
				<td colspan="5">
					data fetching...
				</td>
			</tr>
		</tbody>
	</table>

	<div class="buyer-active-orderdataby-nitin">
		<div class="order-card">
			<!-- <h3 class="Order-Summary">Order Summary</h3> -->
			<div class="order-content">
				<div class="order-image">
					<img src="https://images.unsplash.com/photo-1688888745596-da40843a8d45?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mjd8fHByb2ZpbGUlMjBwaG90b3xlbnwwfHwwfHx8MA%3D%3D" alt="Order Image">
				</div>
				<div class="order-text">
					<p>Lorem Ipsum has been the industry's standard dummy text ever since the adnjd...<a href="#">read more</a></p>
					<div class="order-info">
						<div class="info-container">
							<div class="info-item">
								<i class="fas fa-calendar"></i> July 24, 2024
								<span class="heading">Due On</span>
							</div>
							<div class="info-item">
								<i class="fa-solid fa-sack-dollar"></i> 700
								<span class="heading">Total Order</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="order-status">
				<span class="Order-Status-textmain">Order Status</span>
				<button class="status-active">Active</button>
			</div>
		</div>
		<div class="order-card">
			<!-- <h3 class="Order-Summary">Order Summary</h3> -->
			<div class="order-content">
				<div class="order-image">
					<img src="https://plus.unsplash.com/premium_photo-1689977968861-9c91dbb16049?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MzN8fHByb2ZpbGUlMjBwaG90b3xlbnwwfHwwfHx8MA%3D%3D" alt="Order Image">
				</div>
				<div class="order-text">
					<p>Lorem Ipsum has been the industry's standard dummy text ever since the adnjd...<a href="#">read more</a></p>
					<div class="order-info">
						<div class="info-container">
							<div class="info-item">
								<i class="fas fa-calendar"></i> July 24, 2024
								<span class="heading">Due On</span>
							</div>
							<div class="info-item">
								<i class="fa-solid fa-sack-dollar"></i> 700
								<span class="heading">Total Order</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="order-status">
				<span class="Order-Status-textmain">Order Status</span>
				<button class="status-delivered">Delivered</button>
			</div>
		</div>
		<div class="order-card">
			<!-- <h3 class="Order-Summary">Order Summary</h3> -->
			<div class="order-content">
				<div class="order-image">
					<img src="https://images.unsplash.com/photo-1719581863356-f5f455386066?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NDJ8fHByb2ZpbGUlMjBwaG90b3xlbnwwfHwwfHx8MA%3D%3D" alt="Order Image">
				</div>
				<div class="order-text">
					<p>Lorem Ipsum has been the industry's standard dummy text ever since the adnjd...<a href="#">read more</a></p>
					<div class="order-info">
						<div class="info-container">
							<div class="info-item">
								<i class="fas fa-calendar"></i> July 24, 2024
								<span class="heading">Due On</span>
							</div>
							<div class="info-item">
								<i class="fa-solid fa-sack-dollar"></i> 700
								<span class="heading">Total Order</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="order-status">
				<span class="Order-Status-textmain">Order Status</span>
				<button class="status-completed">Completed</button>
			</div>
		</div>
		<div class="order-card">
			<!-- <h3 class="Order-Summary">Order Summary</h3> -->
			<div class="order-content">
				<div class="order-image">
					<img src="https://images.unsplash.com/photo-1684966610091-f6beda2d025a?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NDZ8fHByb2ZpbGUlMjBwaG90b3xlbnwwfHwwfHx8MA%3D%3D" alt="Order Image">
				</div>
				<div class="order-text">
					<p>Lorem Ipsum has been the industry's standard dummy text ever since the adnjd...<a href="#">read more</a></p>
					<div class="order-info">
						<div class="info-container">
							<div class="info-item">
								<i class="fas fa-calendar"></i> July 24, 2024
								<span class="heading">Due On</span>
							</div>
							<div class="info-item">
								<i class="fa-solid fa-sack-dollar"></i> 700
								<span class="heading">Total Order</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="order-status">
				<span class="Order-Status-textmain">Order Status</span>
				<button class="status-cancelled">Cancelled</button>
			</div>
		</div>

	</div>


	<!-- FontAwesome Icons (optional, but adds icons as in your example) -->
	<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

	<nav id="pagination-order-yes" aria-label="Active order navigation">
	</nav>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		var activeOrder = function(userId, status, limit, page = 1) {
			return $.ajax({
				url: "<?= $site_url ?>/ajax/order_data.php",
				dataType: "json",
				data: {
					user_id: userId,
					status: status,
					limit: limit,
					page: page,
				}
			}).done(function(data) {
				$('body #orderActive tbody').html(data.data);
				$('body #pagination-order-yes').html(data.pagination);
				$('body #wait').removeClass("loader");
			});
		}
		activeOrder(<?= $login_seller_id ?>, 'yes', <?= isset($homePerPage) ? $homePerPage : 10 ?>);

		//executes code below when user click on pagination links
		$("body #pagination-order-yes").on("click", ".pagination a", function(e) {
			e.preventDefault();
			var page = $(this).attr("data-page"); //get page number from link
			$('body #wait').addClass("loader");
			activeOrder(<?= $login_seller_id ?>, 'yes', <?= isset($homePerPage) ? $homePerPage : 10 ?>, page);
		})
	});
</script>