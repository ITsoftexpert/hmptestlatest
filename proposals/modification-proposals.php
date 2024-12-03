<div class="table-responsive box-table mt-3 box-shadow-act-pro">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="font-size-3"><?= $lang['th']['modification_proposal_title']; ?></th>
                <th class="font-size-3"><?= $lang['th']['modification_message']; ?></th>
                <th class="font-size-3"><?= $lang['th']['actions']; ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($_GET["page"]) && isset($_GET['modification'])) {
                $dPageNumber = filter_var($_GET["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
                if (!is_numeric($dPageNumber)) {
                    die('Invalid page number!');
                } //incase of invalid page number
            } else {
                $dPageNumber = 1; //if there's no page number, set it to 1
            }

            $start_from =  (($dPageNumber - 1) * $limit);
            $where_limit = " order by proposal_id DESC LIMIT $start_from, $limit";

            $q_page =  $db->query("SELECT * FROM proposals WHERE proposal_seller_id=:proposal_seller_id AND proposal_status=:proposal_status", array("proposal_seller_id" => $login_seller_id, "proposal_status" => 'modification'));
            $totalDRows = $q_page->rowCount();

            //break records into pages
            $totalDPages = ceil($totalDRows / $limit);
            if ($totalDRows > 0) {
                $select_proposals =  $db->query("SELECT * FROM proposals WHERE proposal_seller_id=:proposal_seller_id AND proposal_status=:proposal_status $where_limit", array("proposal_seller_id" => $login_seller_id, "proposal_status" => 'modification'));

                while ($row_proposals = $select_proposals->fetch()) {
                    $proposal_id = $row_proposals->proposal_id;
                    $proposal_title = $row_proposals->proposal_title;
                    $proposal_url = $row_proposals->proposal_url;
                    $select_modification = $db->select("proposal_modifications", array("proposal_id" => $proposal_id));
                    $row_modification = $select_modification->fetch();
                    $modification_message = $row_modification->modification_message;
            ?>
                    <tr>
                        <td class="proposal-title"> <?= $proposal_title; ?> </td>
                        <td> <?= $modification_message; ?></td>
                        <td class="text-center">
                            <div class="dropdown">
                                <button class="btn btn-success dropdown-toggle" data-toggle="dropdown"></button>
                                <div class="dropdown-menu">
                                    <a href="<?= $site_url; ?>/proposals/submit_approval?proposal_id=<?= $proposal_id; ?>" class="dropdown-item"> Submit For Approval </a>
                                    <a href="<?= $site_url; ?>/proposals/<?= $login_seller_user_name; ?>/<?= $proposal_url; ?>" class="dropdown-item"> Preview </a>
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
                                <i class='fa fa-meh-o'></i> You currently have no modifications requested.
                            </h3>
                        </center>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <nav id="pagination-proposals-modification" aria-label="modification proposals navigation">
        <?= pagination($limit, $dPageNumber, $totalDRows, $totalDPages, $site_url . "/proposals/view_proposals?modification&page="); ?>
    </nav>
</div>