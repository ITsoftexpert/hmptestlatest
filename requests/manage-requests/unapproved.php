<style>
	@media (max-width:768px) {
		.font-size-3 {
			font-size: 13px !important;
			padding: 10px !important;
			text-align: center;
		}

        .desktop_view_req_unapproved {
            display: none;
        }

        .mobile_view_req_unapproved {
            display: block;
        }
    }

    @media (min-width:768px) {

        .desktop_view_req_unapproved {
            display: block;
        }

        .mobile_view_req_unapproved {
            display: none;
        }
    }
</style>

<div class="table-responsive box-table box-shadow-req-act desktop_view_req_unapproved">
	<table class="table table-bordered" id="requestUnapproved">
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
	<nav id="pagination-request-unapproved" aria-label="unapproved request navigation"></nav>
</div>
<div class="mobile_view_req_unapproved" id="orderCardReqApproved">
</div>

<script type="text/javascript">
	$(document).ready(function() {
		var unapprovedRequest = function(userId, status, limit, page = 1) {
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
				$('body #requestUnapproved tbody').html(data.data);
				$('#orderCardReqApproved').html(data.cardData);
				$('body #pagination-request-unapproved').html(data.pagination);
				$('body #wait').removeClass("loader");
			});
		}
		unapprovedRequest(<?= $login_seller_id ?>, 'unapproved', <?= isset($homePerPage) ? $homePerPage : 10 ?>);

		//executes code below when user click on pagination links
		$("body #pagination-request-unapproved").on("click", ".pagination a", function(e) {
			e.preventDefault();
			var page = $(this).attr("data-page"); //get page number from link
			$('body #wait').addClass("loader");
			unapprovedRequest(<?= $login_seller_id ?>, 'unapproved', <?= isset($homePerPage) ? $homePerPage : 10 ?>, page);
		})
	});
</script>