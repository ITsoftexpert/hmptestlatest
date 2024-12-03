<style>
	@media (max-width:767px) {
		.font-size-3 {
			font-size: 13px !important;
			padding: 10px !important;
		}

		.mobile_view_only_completed {
			display: block;
		}

		.desktop_view_only_completed {
			display: none;
		}
	}

	@media (min-width:768px) {

		.mobile_view_only_completed {
			display: none;
		}

		.desktop_view_only_completed {
			display: block;
		}
	}
</style>
<div class="table-responsive box-table mt-3">
	<table class="table table-bordered desktop_view_only_completed" id="orderSellerCompleted">
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
	<div id="orderCompletedSellingSmall" class="mobile_view_only_completed">

	</div>
	<nav id="pagination-seller-order-completed" aria-label="Active order navigation">
	</nav>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		var completedSellerOrder = function(userId, status, limit, page = 1) {
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
				$('body #orderSellerCompleted tbody').html(data.data);
				$('#orderCompletedSellingSmall').html(data.dataCard4);
				$('body #pagination-seller-order-completed').html(data.pagination);
				$('body #wait').removeClass("loader");
			});
		}
		completedSellerOrder(<?= $login_seller_id ?>, 'completed', <?= isset($homePerPage) ? $homePerPage : 10 ?>);

		//executes code below when user click on pagination links
		$("body #pagination-seller-order-completed").on("click", ".pagination a", function(e) {
			e.preventDefault();
			var page = $(this).attr("data-page"); //get page number from link
			$('body #wait').addClass("loader");
			completedSellerOrder(<?= $login_seller_id ?>, 'completed', <?= isset($homePerPage) ? $homePerPage : 10 ?>, page);
		})
	});
</script>