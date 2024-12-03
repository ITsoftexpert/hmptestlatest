<link rel="stylesheet" href="styles/addnew.css">

<style>
	.order-card {
		border: 1px solid #ddd;
		padding: 16px;
		margin-bottom: 16px;
		border-radius: 8px;
		/* display: flex; */
		align-items: center;
	}

	.order-card-image {
		width: 80px;
		height: 80px;
		border-radius: 4px;
		margin-right: 16px;
	}

	.order-card-content {
		flex: 1;
	}

	.order-card-title {
		font-size: 1.2em;
		margin-bottom: 8px;
	}

	.order-status {
		/* background-color: lightgray; */
		color: white;

		border: 1px solid lightgrey;
		padding: 8px 16px;
		border-radius: 4px;
	}
</style>
<div class="table-responsive box-table mt-3">
	<table class="table table-bordered buyer-bluff-edit-sec" id="orderSellerActive">
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
	<div id="orderSellerActiveSmall">
	</div>
	<nav id="pagination-seller-order-yes" aria-label="Active order navigation">
	</nav>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		var activeSellerOrder = function(userId, status, limit, page = 1) {
			return $.ajax({
				url: "<?= $site_url ?>/ajax/order_seller_data.php",
				dataType: "json",
				data: {
					user_id: userId,
					status: status,
					limit: limit,
					page: page,
				}
			}).done(function(data) {
				$('body #orderSellerActive tbody').html(data.data);
				$('#orderSellerActiveSmall').html(data.dataCard4);
				$('body #pagination-seller-order-yes').html(data.pagination);
				$('body #wait').removeClass("loader");
			});
		}
		activeSellerOrder(<?= $login_seller_id ?>, 'yes', <?= isset($homePerPage) ? $homePerPage : 10 ?>);

		//executes code below when user click on pagination links
		$("body #pagination-seller-order-yes").on("click", ".pagination a", function(e) {
			e.preventDefault();
			var page = $(this).attr("data-page"); //get page number from link
			$('body #wait').addClass("loader");
			activeSellerOrder(<?= $login_seller_id ?>, 'yes', <?= isset($homePerPage) ? $homePerPage : 10 ?>, page);
		})
	});
</script>