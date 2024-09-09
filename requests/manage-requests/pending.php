<style>
	@media (max-width:768px) {
		.font-size-3 {
			font-size: 13px !important;
			padding: 10px !important;
			text-align: center;
		}

		.desc-wrap {		
			/* border: 1px solid red !important; */
			word-break:break-all;			
		}
	}
	.box-shadow-reqpend{
		/* box-shadow: 0px 0px 5px black, inset 0px 0px 25px gray; */
	}
</style>

<div class="table-responsive box-table box-shadow-req-act">
	<table class="table table-bordered" id="requestPending">
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
		<tbody class="box-shadow-reqpend">
			<tr class="table-info">
				<td colspan="6">
					data fetching...
				</td>
			</tr>
		</tbody>
	</table>
	<nav id="pagination-request-pending" aria-label="pending request navigation"></nav>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		var pendingRequest = function(userId, status, limit, page = 1) {
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
				$('body #requestPending tbody').html(data.data);
				$('body #pagination-request-pending').html(data.pagination);
				$('body #wait').removeClass("loader");
			});
		}
		pendingRequest(<?= $login_seller_id ?>, 'pending', <?= isset($homePerPage) ? $homePerPage : 10 ?>);

		//executes code below when user click on pagination links
		$("body #pagination-request-pending").on("click", ".pagination a", function(e) {
			e.preventDefault();
			var page = $(this).attr("data-page"); //get page number from link
			$('body #wait').addClass("loader");
			pendingRequest(<?= $login_seller_id ?>, 'pending', <?= isset($homePerPage) ? $homePerPage : 10 ?>, page);
		})
	});
</script>