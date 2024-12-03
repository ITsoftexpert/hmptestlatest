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

	@media(max-width: 767px) {
		.desktop_view_only_lg {
			display: none;
		}

		.mobile_view_only_sm {
			display: block;
		}
	}

	@media(min-width: 768px) {
		.desktop_view_only_lg {
			display: block;
		}

		.mobile_view_only_sm {
			display: none;
		}
	}
</style>


<div class="table-responsive box-table mt-3 desktop_view_only_lg">
	<table class="table table-bordered" id="orderAll">
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
	<nav id="pagination-order-all" aria-label="all order navigation">
	</nav>
</div>
<div id="orderAllSmall" class="mobile_view_only_sm"></div>


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
				$('body #orderAll tbody').html(data.data);
				$('#orderAllSmall').html(data.data2);
				$('body #pagination-order-all').html(data.pagination);
				$('body #wait').removeClass("loader");
			});
		}
		activeOrder(<?= $login_seller_id ?>, 'all', <?= isset($homePerPage) ? $homePerPage : 10 ?>);

		//executes code below when user click on pagination links
		$("body #pagination-order-all").on("click", ".pagination a", function(e) {
			e.preventDefault();
			var page = $(this).attr("data-page"); //get page number from link
			$('body #wait').addClass("loader");
			activeOrder(<?= $login_seller_id ?>, 'all', <?= isset($homePerPage) ? $homePerPage : 10 ?>, page);
		})
	});
</script>