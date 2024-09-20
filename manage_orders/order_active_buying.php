<style>
	.font-size-3 {
		/* box-shadow: 0px 0px 5px black, inset 0px 0px 15px #00c8d4; */
	}

	@media (max-width: 600px) {
		#orderActive {
			display: block;
			overflow-x: auto;
		}

		#orderActive thead {
			display: none;
			/* Header ko chhupao */
		}

		#orderActive tbody tr {
			display: flex;
			flex-direction: column;
			/* Rows ko vertical stack karo */
			margin-bottom: 1rem;
			/* background-color: #f2f2f2; */
		}

		#orderActive tbody td {
			display: flex;
			justify-content: space-between;
			padding: 0.5rem;
			border: 1px solid #f2f2f2;
		}

		#orderActive tbody td::before {
			content: attr(data-label);
			/* Heading ko dikhana */
			font-weight: bold;
			/* Bold karna */
			margin-right: 1rem;
			/* Space dena */
		}
	}
</style>
<div class="table-responsive box-table mt-3">
	<table class="table table-bordered" id="orderActive">
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
				<td data-label="<?= $lang['th']['order_summary']; ?>">Order details here</td>
				<td data-label="<?= $lang['th']['order_date']; ?>">2024-09-19</td>
				<td data-label="<?= $lang['th']['due_on']; ?>">2024-09-26</td>
				<td data-label="<?= $lang['th']['total']; ?>">$100</td>
				<td data-label="<?= $lang['th']['status2']; ?>">Pending</td>
			</tr>
			<!-- <tr class="table-info">
				<td colspan="5">data fetching...</td>
			</tr> -->
		</tbody>
	</table>

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