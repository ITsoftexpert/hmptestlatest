<style>
	.font-size-3 {
		/* box-shadow: 0px 0px 5px black, inset 0px 0px 15px #00c8d4; */
	}

	.order-card {
		border: 1px solid #e0e0e0;
		border-radius: 8px;
		padding: 16px;
		max-width: 100%;
		background-color: #fff;
		font-family: Arial, sans-serif;
	}

	@media (min-width: 1024px) {
		.order-card {
			display: none;
		}
	}

	/* h3 {
		margin: 0 0 10px;
		font-size: 1.25em;
		font-weight: bold;
	} */
	.Order-Summary {
		margin: 0 0 10px;
		font-size: 1.25em;
		font-weight: bold;
		color: #a7a9ac;

	}

	.Order-Status-textmain {
		/* margin: 0 0 10px; */
		font-size: 1.25em;
		/* font-weight: bold; */
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
		font-size: 0.9em;
		color: #333;
	}

	.order-text a {
		color: #007bff;
		text-decoration: none;
	}

	/* .order-info {
		display: flex;
		justify-content: left;
		gap: 40px;
		margin: 10px 0;
		font-size: 0.85em;
		color: #555;
	} */

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

	.status-active {
		background-color: #00BCD3;
		color: #fff;
		border: none;
		padding: 5px 10px;
		border-radius: 4px;
		font-size: 0.9em;
		cursor: pointer;
	}

	.status-delivered {
		background-color: #FCC005;
		color: #fff;
		border: none;
		padding: 5px 10px;
		border-radius: 4px;
		font-size: 0.9em;
		cursor: pointer;
	}

	.status-completed {
		background-color: #4AAE50;
		color: #fff;
		border: none;
		padding: 5px 10px;
		border-radius: 4px;
		font-size: 0.9em;
		cursor: pointer;
	}

	.status-cancelled {
		background-color: #F44338;
		color: #fff;
		border: none;
		padding: 5px 10px;
		border-radius: 4px;
		font-size: 0.9em;
		cursor: pointer;
	}

	@media (max-width: 767px) {
		.buyer-nitin-edit-sec {
			display: none;
		}
	}

	/* .status-completed:hover {
		background-color: #0056b3;
	} */


	/* @media (max-width: 600px) {
		#orderActive {
			display: block;
			overflow-x: auto;
		}

		#orderActive thead {
			display: none;
		}

		#orderActive tbody tr {
			display: flex;
			flex-direction: column;
			
			margin-bottom: 1rem;
			
		}

		#orderActive tbody td {
			display: flex;
			justify-content: space-between;
			padding: 0.5rem;
			border: 1px solid #f2f2f2;
		}

		#orderActive tbody td::before {
			content: attr(data-label);
			
			font-weight: bold;
			margin-right: 1rem;
		}
	} */

	/* Basic styling */
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

	/* Hidden heading initially */
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

	/* Show heading on hover */
	.info-item:hover .heading {
		opacity: 1;
		bottom: 100%;
	}

	.buyer-active-orderdataby-nitin {
		display: flex;
		gap: 20px;
		flex-direction: column;
	}
</style>
<div class="table-responsive box-table mt-3 ">
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