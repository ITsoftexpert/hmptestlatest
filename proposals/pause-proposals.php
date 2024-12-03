<div class="table-responsive box-table mt-3 box-shadow-act-pro">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="font-size-3"><?= $lang['th']['proposal_title']; ?></th>
                <th class="font-size-3"><?= $lang['th']['proposal_price']; ?></th>
                <th class="font-size-3"><?= $lang['th']['views']; ?></th>
                <th class="font-size-3"><?= $lang['th']['orders']; ?></th>
                <th class="font-size-3"><?= $lang['th']['actions']; ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($_GET["page"]) && isset($_GET['paused'])) {
                $dPageNumber = filter_var($_GET["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
                if (!is_numeric($dPageNumber)) {
                    die('Invalid page number!');
                } //incase of invalid page number
            } else {
                $dPageNumber = 1; //if there's no page number, set it to 1
            }

            $start_from =  (($dPageNumber - 1) * $limit);
            $where_limit = " order by proposal_id DESC LIMIT $start_from, $limit";

            $q_page =  $db->query("SELECT * FROM proposals WHERE proposal_seller_id=:proposal_seller_id AND (proposal_status='pause' or proposal_status='admin_pause')", array("proposal_seller_id" => $login_seller_id));
            $totalDRows = $q_page->rowCount();

            //break records into pages
            $totalDPages = ceil($totalDRows / $limit);
            if ($totalDRows > 0) {
                $select_proposals =  $db->query("SELECT * FROM proposals WHERE proposal_seller_id=:proposal_seller_id AND (proposal_status='pause' or proposal_status='admin_pause') $where_limit", array("proposal_seller_id" => $login_seller_id));

                while ($row_proposals = $select_proposals->fetch()) {
                    $proposal_id = $row_proposals->proposal_id;
                    $proposal_title = $row_proposals->proposal_title;
                    $proposal_views = $row_proposals->proposal_views;
                    $proposal_price = $row_proposals->proposal_price;
                    if ($proposal_price == 0) {
                        $get_p = $db->select("proposal_packages", array("proposal_id" => $proposal_id, "package_name" => "Basic"));
                        $proposal_price = $get_p->fetch()->price;
                    }
                    $proposal_img1 = getImageUrl2("proposals", "proposal_img1", $row_proposals->proposal_img1);
                    $proposal_url = $row_proposals->proposal_url;
                    $proposal_featured = $row_proposals->proposal_featured;
                    $proposal_status = $row_proposals->proposal_status;

                    $count_orders = $db->count("orders", array("proposal_id" => $proposal_id));

                    if ($proposal_status == "admin_pause") {
                        $onclick = <<<EOT
								onclick="return confirm('{$lang['view_proposals']['admin_pause_proposal']}')"
								EOT;
                    } else {
                        $onclick = "";
                    }

            ?>
                    <tr>
                        <td class="proposal-title"> <?= $proposal_title; ?> </td>
                        <td class="text-success"> <?= showPrice($proposal_price); ?> </td>
                        <td><?= $proposal_views; ?></td>
                        <td><?= $count_orders; ?></td>
                        <td class="text-center">
                            <div class="dropdown">
                                <button class="btn btn-success dropdown-toggle" data-toggle="dropdown"></button>
                                <div class="dropdown-menu">
                                    <a href="<?= $site_url; ?>/proposals/<?= $login_seller_user_name; ?>/<?= $proposal_url; ?>" class="dropdown-item"> Preview </a>
                                    <a href="<?= $site_url; ?>/proposals/activate_proposal?proposal_id=<?= $proposal_id; ?>" class="dropdown-item" <?= $onclick; ?>>
                                        Activate
                                    </a>
                                    <a href="<?= $site_url; ?>/proposals/view_referrals?proposal_id=<?= $proposal_id; ?>" class="dropdown-item"> View Referrals</a>
                                    <a href="<?= $site_url; ?>/proposals/edit_proposal?proposal_id=<?= $proposal_id; ?>" class="dropdown-item"> Edit </a>
                                    <a href="<?= $site_url; ?>/proposals/delete_proposal?proposal_id=<?= $proposal_id; ?>" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this proposal?')"> Delete </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php }
            } else {
                ?>
                <tr class="table-danger box-shadow-bg-color">
                    <td colspan="5" class="box-shadow-cs5">
                        <center>
                            <h3 class='pb-4 pt-4 heading_3'>
                                <i class='fa fa-meh-o'></i> You currently have no paused proposals/services
                            </h3>
                        </center>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <nav id="pagination-proposals-pause" aria-label="Draft proposals navigation">
        <?= pagination($limit, $dPageNumber, $totalDRows, $totalDPages, $site_url . "/proposals/view_proposals?pause&page="); ?>
    </nav>
</div>