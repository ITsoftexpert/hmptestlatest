<style>
	@media (max-width:768px) {
		.font-size-3 {
			font-size: 13px !important;
			padding: 10px !important;
		}

		.heading_3 {
			font-size: 20px;
			width: 100%;
		}
	}

	.font-size-3 {
		/* font-size: 11px !important; */
		padding: 13px !important;
		text-align: center;
		/* box-shadow: 0px 0px 5px black, inset 0px 0px 15px #00c8d4; */
	}

	.box-shadow-req-act {
		/* box-shadow:0px 0px 5px black; */
		/* border:2px solid green !important; */
	}

	.box-shadow-manage {
		/* box-shadow: 0px 0px 5px black, inset 0px 0px 70px red; */
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

	.buyer-offer-img {
		width: 18px;
		/* Equal to the font size */
		height: auto;
		/* Ensures square dimensions */
	}

	.manage-req-heading-main {
		font-size: 18px;
		font-weight: 600;
		margin-bottom: 10px;
	}

	/* Style for the button */
	.status-active {
		background-color: #00d9d9;
		/* Match the color from the image */
		border: none;
		padding: 10px;
		cursor: pointer;
	}

	/* Container for the dropdown */
	.dropdown {
		position: relative;
		display: inline-block;
	}

	/* Dropdown content (initially hidden with animation) */
	.dropdown-content {
		display: none;
		/* Initially hidden */
		position: absolute;
		background-color: #fff;
		box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
		z-index: 1;
		min-width: 160px;
		border-radius: 4px;
		right: 0;
		/* Position dropdown 20px to the right */
		top: 100%;
		/* Default to open down */
		transform: scaleY(0);
		/* Initial scale set to 0 for animation */
		transform-origin: top;
		/* Origin from the top for downward opening */
		transition: transform 0.3s ease;
		/* Animation effect */
	}

	/* Style for the dropdown items */
	.dropdown-content a {
		color: black;
		padding: 12px 16px;
		text-decoration: none;
		display: block;
	}

	/* Change color of dropdown links on hover */
	.dropdown-content a:hover {
		background-color: #f1f1f1;
	}

	/* Active class for dropdown (used in JS to toggle visibility) */
	.dropdown-content.show {
		display: block;
		transform: scaleY(1);
		/* Expands the dropdown */
	}



	/* ====================-----table for phone only---------========================= */
</style>
<div class="table-responsive box-table  box-shadow-req-act">
	<table class="table table-bordered buyer-nitin-edit-sec" id="requestActive">
		<thead>
			<tr>
				<th class="font-size-3"><?= $lang['th']['title']; ?></th>
				<th class="font-size-3"><?= $lang['th']['description']; ?></th>
				<th class="font-size-3"><?= $lang['th']['date']; ?></th>
				<th class="font-size-3"><?= $lang['th']['offers']; ?></th>
				<th class="font-size-3"><?= $lang['th']['budget']; ?></th>
				<th class="font-size-3"><?= $lang['th']['actions']; ?></th>
			</tr>
		</thead>
		<tbody>
			<tr class="table-info">
				<td colspan="6">
					data fetching...
				</td>
			</tr>
		</tbody>
	</table>

	<div class="buyer-active-orderdataby-nitin">
		<div class="order-card">
			<!-- <h3 class="Order-Summary">Order Summary</h3> -->
			<div class="order-content">
				<!-- <div class="order-image">
					<img src="https://images.unsplash.com/photo-1688888745596-da40843a8d45?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mjd8fHByb2ZpbGUlMjBwaG90b3xlbnwwfHwwfHx8MA%3D%3D" alt="Order Image">
				</div> -->
				<div class="order-text">
					<h3 class="manage-req-heading-main">I want to make my website in wordpress from expert testing</h3>
					<div class="order-info">
						<div class="info-container">
							<div class="info-item">
								<i class="fas fa-calendar"></i> July 24, 2024
								<span class="heading">date</span>
							</div>
							<div class="info-item">
								<img class="buyer-offer-img" src="images/buyer-offer-img.png" alt=""> 0
								<span class="heading">offer</span>
							</div>
							<div class="info-item">
								<i class="fa-solid fa-sack-dollar"></i> 22.00
								<span class="heading">Budget</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="order-status">
				<span class="Order-Status-textmain">Actions</span>
				<div class="dropdown">
					<button class="status-active">
						<i class="fa-solid fa-caret-down dropdown-icon"></i> <!-- Icon for first dropdown -->
					</button>
					<div class="dropdown-content">
						<a href="#">View Offers</a>
						<a href="#">Pause</a>
						<a href="#">Edit</a>
						<a href="#">Delete</a>
					</div>
				</div>

			</div>
		</div>
		<div class="order-card">
			<!-- <h3 class="Order-Summary">Order Summary</h3> -->
			<div class="order-content">
				<!-- <div class="order-image">
					<img src="https://images.unsplash.com/photo-1688888745596-da40843a8d45?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mjd8fHByb2ZpbGUlMjBwaG90b3xlbnwwfHwwfHx8MA%3D%3D" alt="Order Image">
				</div> -->
				<div class="order-text">
					<h3 class="manage-req-heading-main">i want to make my website in wordpress from expert testing</h3>
					<div class="order-info">
						<div class="info-container">
							<div class="info-item">
								<i class="fas fa-calendar"></i> July 24, 2024
								<span class="heading">date</span>
							</div>
							<div class="info-item">
								<img class="buyer-offer-img" src="images/buyer-offer-img.png" alt=""> 0
								<span class="heading">offer</span>
							</div>
							<div class="info-item">
								<i class="fa-solid fa-sack-dollar"></i> 22.00
								<span class="heading">Budget</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="order-status">
				<span class="Order-Status-textmain">Actions</span>
				<div class="dropdown">
					<button class="status-active">
						<i class="fa-solid fa-caret-down dropdown-icon"></i> <!-- Icon for first dropdown -->
					</button>
					<div class="dropdown-content">
						<a href="#">View Offers</a>
						<a href="#">Pause</a>
						<a href="#">Edit</a>
						<a href="#">Delete</a>
					</div>
				</div>
			</div>
		</div>
		<div class="order-card">
			<!-- <h3 class="Order-Summary">Order Summary</h3> -->
			<div class="order-content">
				<!-- <div class="order-image">
					<img src="https://images.unsplash.com/photo-1688888745596-da40843a8d45?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mjd8fHByb2ZpbGUlMjBwaG90b3xlbnwwfHwwfHx8MA%3D%3D" alt="Order Image">
				</div> -->
				<div class="order-text">
					<h3 class="manage-req-heading-main">i want to make my website in wordpress from expert testing</h3>
					<div class="order-info">
						<div class="info-container">
							<div class="info-item">
								<i class="fas fa-calendar"></i> July 24, 2024
								<span class="heading">date</span>
							</div>
							<div class="info-item">
								<img class="buyer-offer-img" src="images/buyer-offer-img.png" alt=""> 0
								<span class="heading">offer</span>
							</div>
							<div class="info-item">
								<i class="fa-solid fa-sack-dollar"></i> 22.00
								<span class="heading">Budget</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="order-status">
				<span class="Order-Status-textmain">Actions</span>
				<div class="dropdown">
					<button class="status-active">
						<i class="fa-solid fa-caret-down dropdown-icon"></i> <!-- Icon for first dropdown -->
					</button>
					<div class="dropdown-content">
						<a href="#">View Offers</a>
						<a href="#">Pause</a>
						<a href="#">Edit</a>
						<a href="#">Delete</a>
					</div>
				</div>
			</div>
		</div>
		<div class="order-card">
			<!-- <h3 class="Order-Summary">Order Summary</h3> -->
			<div class="order-content">
				<!-- <div class="order-image">
					<img src="https://images.unsplash.com/photo-1688888745596-da40843a8d45?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mjd8fHByb2ZpbGUlMjBwaG90b3xlbnwwfHwwfHx8MA%3D%3D" alt="Order Image">
				</div> -->
				<div class="order-text">
					<h3 class="manage-req-heading-main">i want to make my website in wordpress from expert testing</h3>
					<div class="order-info">
						<div class="info-container">
							<div class="info-item">
								<i class="fas fa-calendar"></i> July 24, 2024
								<span class="heading">date</span>
							</div>
							<div class="info-item">
								<img class="buyer-offer-img" src="images/buyer-offer-img.png" alt=""> 0
								<span class="heading">offer</span>
							</div>
							<div class="info-item">
								<i class="fa-solid fa-sack-dollar"></i> 22.00
								<span class="heading">Budget</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="order-status">
				<span class="Order-Status-textmain">Actions</span>
				<div class="dropdown">
					<button class="status-active">
						<i class="fa-solid fa-caret-down dropdown-icon"></i> <!-- Icon for first dropdown -->
					</button>
					<div class="dropdown-content">
						<a href="#">View Offers</a>
						<a href="#">Pause</a>
						<a href="#">Edit</a>
						<a href="#">Delete</a>
					</div>
				</div>
			</div>
		</div>

	</div>
	<nav id="pagination-request-active" aria-label="Active request navigation"></nav>
</div>





<script type="text/javascript">
	$(document).ready(function() {
		var activeRequest = function(userId, status, limit, page = 1) {
			return $.ajax({
				url: "<?= $site_url ?>/ajax/request_data.php",
				dataType: "json",
				data: {
					user_id: userId,
					status: status,
					limit: limit,
					page: page,
				}
			}).done(function(data) {
				$('body #requestActive tbody').html(data.data);
				$('body #pagination-request-active').html(data.pagination);
				$('body #wait').removeClass("loader");
			});
		}
		activeRequest(<?= $login_seller_id ?>, 'active', <?= isset($homePerPage) ? $homePerPage : 10 ?>);

		//executes code below when user click on pagination links
		$("body #pagination-request-active").on("click", ".pagination a", function(e) {
			e.preventDefault();
			var page = $(this).attr("data-page"); //get page number from link
			$('body #wait').addClass("loader");
			activeRequest(<?= $login_seller_id ?>, 'active', <?= isset($homePerPage) ? $homePerPage : 10 ?>, page);
		})
	});
</script>

<script>
	// Get all icons with the class 'dropdown-icon'
	const dropdownIcons = document.querySelectorAll('.dropdown-icon');

	// Add event listener to each dropdown icon
	dropdownIcons.forEach((icon) => {
		icon.addEventListener('click', function(event) {
			const dropdownContent = this.parentElement.nextElementSibling; // Get the corresponding dropdown content
			const rect = dropdownContent.getBoundingClientRect();
			const windowHeight = window.innerHeight;

			// Prevent the click from affecting other elements
			event.stopPropagation();

			// Toggle dropdown visibility and apply animation class
			if (dropdownContent.classList.contains('show')) {
				dropdownContent.classList.remove('show');
			} else {
				// Check if there's enough space below the button
				dropdownContent.style.top = "100%"; // Default to open down
				dropdownContent.style.bottom = "auto"; // Reset
				if (rect.bottom > windowHeight) {
					// If not enough space, open upwards
					dropdownContent.style.top = "auto";
					dropdownContent.style.bottom = "100%";
				}
				dropdownContent.classList.add('show');
			}
		});
	});

	// Close any open dropdowns if you click outside of any dropdown
	document.addEventListener('click', function(event) {
		const openDropdowns = document.querySelectorAll('.dropdown-content.show');
		openDropdowns.forEach((dropdown) => {
			if (!event.target.closest('.dropdown')) {
				dropdown.classList.remove('show');
			}
		});
	});
</script>