<?php
if (isset($_GET["page"]) && isset($_GET['pending'])) {
    $dPageNumber = filter_var($_GET["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
    if (!is_numeric($dPageNumber)) {
        die('Invalid page number!');
    }
} else {
    $dPageNumber = 1;
}

$start_from =  (($dPageNumber - 1) * $limit);
$where_limit = " order by proposal_id DESC LIMIT $start_from, $limit";

$q_page = $db->query(
    "SELECT * FROM proposals WHERE proposal_seller_id=:proposal_seller_id AND proposal_status=:proposal_status",
    array("proposal_seller_id" => $login_seller_id, "proposal_status" => 'pending')
);
$totalDRows = $q_page->rowCount();

$totalDPages = ceil($totalDRows / $limit);
if ($totalDRows > 0) {
    $select_proposals = $db->query(
        "SELECT * FROM proposals WHERE proposal_seller_id=:proposal_seller_id AND proposal_status=:proposal_status $where_limit",
        array("proposal_seller_id" => $login_seller_id, "proposal_status" => 'pending')
    );

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
                    <button class="custom-dropdown-button">
                        <i class="fa-solid fa-caret-down"></i>
                    </button>
                    <div class="custom-dropdown-content">
                        <a href="<?= $site_url; ?>/proposals/<?= $login_seller_user_name; ?>/<?= $proposal_url; ?>">Preview</a>
                        <a href="<?= $site_url; ?>/proposals/edit_proposal?proposal_id=<?= $proposal_id; ?>">Edit</a>
                        <a href="<?= $site_url; ?>/proposals/delete_proposal?proposal_id=<?= $proposal_id; ?>" onclick="return confirm('Are you sure you want to delete this proposal?')">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
} else {
    ?>
    <div class="order-card">
        <div class="table-danger box-shadow-bg-color">
            <center>
                <h3 class='pb-4 pt-4 heading_3'>
                    <i class='fa fa-meh-o'></i> You currently have no proposals/services pending.
                </h3>
            </center>
        </div>
    </div>
<?php } ?>
<nav id="pagination-proposals-pending-small" aria-label="Draft proposals navigation">
    <?= pagination($limit, $dPageNumber, $totalDRows, $totalDPages, $site_url . "/proposals/view_proposals?pending&page="); ?>
</nav>