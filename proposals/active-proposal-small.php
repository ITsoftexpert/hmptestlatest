<div class="box-table mt-3 box-shadow-act-pro">
    <?php
    if (isset($_GET["page"]) && $active == "active") {
        $dPageNumber = filter_var($_GET["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
        if (!is_numeric($dPageNumber)) {
            die('Invalid page number!');
        }
    } else {
        $dPageNumber = 1;
    }

    $start_from =  (($dPageNumber - 1) * $limit);
    $where_limit = " order by proposal_id DESC LIMIT $start_from, $limit";

    $q_page =  $db->query("SELECT * FROM proposals WHERE proposal_seller_id=:proposal_seller_id AND proposal_status=:proposal_status", array("proposal_seller_id" => $login_seller_id, "proposal_status" => 'active'));
    $totalDRows = $q_page->rowCount();
    $totalDPages = ceil($totalDRows / $limit);

    if ($totalDRows > 0) {
        $select_proposals =  $db->query("SELECT * FROM proposals WHERE proposal_seller_id=:proposal_seller_id AND proposal_status=:proposal_status $where_limit", array("proposal_seller_id" => $login_seller_id, "proposal_status" => 'active'));

        while ($row_proposals = $select_proposals->fetch()) {
            $proposal_id = $row_proposals->proposal_id;
            $proposal_title = $row_proposals->proposal_title;
            $proposal_views = $row_proposals->proposal_views;
            $proposal_price = $row_proposals->proposal_price;
            if ($proposal_price == 0) {
                $get_p = $db->select("proposal_packages", array("proposal_id" => $proposal_id, "package_name" => "Basic"));
                $proposal_price = $get_p->fetch()->price;
            }
            $proposal_url = $row_proposals->proposal_url;
            $proposal_featured = $row_proposals->proposal_featured;
            $count_orders = $db->count("orders", array("proposal_id" => $proposal_id));
    ?>

            <div class="order-card">
                <div class="order-content">
                    <div class="order-text">
                        <h3 class="manage-req-heading-main"><?= $proposal_title; ?></h3>
                        <div class="order-info">
                            <div class="info-container">
                                <div class="info-item">
                                    <i class="fa-solid fa-basket-shopping"></i> <?= $count_orders; ?>
                                    <span class="heading">Orders</span>
                                </div>
                                <div class="info-item">
                                    <i class="fa-solid fa-eye"></i> <?= $proposal_views; ?>
                                    <span class="heading">Views</span>
                                </div>
                                <div class="info-item">
                                    <i class="fa-solid fa-sack-dollar"></i> <?= showPrice($proposal_price); ?>
                                    <span class="heading">Proposal's Price</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="order-status">
                    <span class="Order-Status-textmain">Actions</span>
                    <div class="custom-dropdown">
                        <button class="custom-dropdown-button" id="dropdownBtn-<?= $proposal_id; ?>">
                            <i class="fa-solid fa-caret-down"></i>
                        </button>
                        <div class="custom-dropdown-content" id="dropdownMenu-<?= $proposal_id; ?>">
                            <a href="<?= $site_url; ?>/proposals/<?= $login_seller_user_name; ?>/<?= $proposal_url; ?>">Preview</a>
                            <?php if ($proposal_featured == "no") { ?>
                                <a href="#" id="featured-button-small-<?= $proposal_id; ?>">Make Proposal Featured</a>
                            <?php } else { ?>
                                <a href="#" class="text-success">Already Featured</a>
                            <?php } ?>
                            <a href="<?= $site_url; ?>/proposals/pause_proposal?proposal_id=<?= $proposal_id; ?>">Deactivate Proposal</a>
                            <a href="<?= $site_url; ?>/proposals/view_coupons?proposal_id=<?= $proposal_id; ?>">View Coupons</a>
                            <a href="<?= $site_url; ?>/proposals/view_referrals?proposal_id=<?= $proposal_id; ?>">View Referrals</a>
                            <a href="<?= $site_url; ?>/proposals/edit_proposal?proposal_id=<?= $proposal_id; ?>">Edit</a>
                            <a href="<?= $site_url; ?>/proposals/delete_proposal?proposal_id=<?= $proposal_id; ?>" onclick="return confirm('Are you sure you want to delete this proposal?')">Delete</a>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                $("#featured-button-small-<?= $proposal_id; ?>").click(function() {
                    $.ajax({
                            method: "POST",
                            url: "<?= $site_url; ?>/proposals/pay_featured_listing",
                            data: {
                                proposal_id: <?= $proposal_id; ?>
                            }
                        })
                        .done(function(data) {
                            $("#featured-proposal-modal").html(data);
                        })
                        .fail((jqXHR) => {
                            alert(jqXHR.status);
                        });
                });
            </script>

        <?php }
    } else { ?>
        <div class="table-danger box-shadow-bg-color">
            <div class="box-shadow-cs5">
                <center>
                    <h3 class='pb-4 pt-4 heading_3'>
                        <i class='fa fa-meh-o'></i> You currently have no proposals/services to sell.
                    </h3>
                </center>
            </div>
        </div>
    <?php } ?>

    <nav id="pagination-proposals-active-small" aria-label="Draft proposals navigation">
        <?= pagination($limit, $dPageNumber, $totalDRows, $totalDPages, $site_url . "/proposals/view_proposals?page="); ?>
    </nav>
</div>