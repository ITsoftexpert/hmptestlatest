<?php

$isAjax = 'xmlhttprequest' == strtolower($_SERVER['HTTP_X_REQUESTED_WITH'] ?? '');
if (!$isAjax) die("No direct access.");

require_once("../includes/db.php");

if (isset($_REQUEST["sellerId"])) {
    $sellerId = $_REQUEST['sellerId'];
   
    $selectOrderDetails = $db->select("orders", array("seller_id" => $sellerId));
    $noResult = "No records";
}


 
$rowCount = $selectOrderDetails->rowCount();
$data = "";

if ($rowCount > 0) {
    // Display records fetched from the database in card format.
    $data = "";
    while ($oResult = $selectOrderDetails->fetch()) { //fetch values
        $order_id = $oResult->order_id;
        $proposal_id = $oResult->proposal_id;
        $order_price = $oResult->order_price;
        $order_status = $oResult->order_status;
        $buyerId = $oResult->buyer_id;
        $order_number = $oResult->order_number;
        $order_duration = intval($oResult->order_duration);
        $order_date = $oResult->order_date;
        $order_due = date("F d, Y", strtotime($order_date . " + $order_duration days"));

        $select_proposals = $db->select("proposals", array("proposal_id" => $proposal_id));
        $row_proposals = $select_proposals->fetch();
        $proposal_title = $row_proposals->proposal_title;
        $proposal_img1 = getImageUrl2("proposals", "proposal_img1", $row_proposals->proposal_img1);

        $data .= "<div class='order-card'>";
        $data .= "<div class='order-content'>";
        $data .= "<div class='order-image'>";
        $data .= "<img src='" . $proposal_img1 . "' alt='Order Image'>";
        $data .= "</div>"; // order-image

        $data .= "<div class='order-text'>";
        $data .= "<p>" . $proposal_title . " <a href='#'>read more</a></p>";
        $data .= "<div class='order-info'>";
        $data .= "<div class='info-container'>";
        $data .= "<div class='info-item'>";
        $data .= "<i class='fas fa-calendar'></i> " . $order_date . "<span class='heading'>Due On</span>";
        $data .= "</div>"; // info-item
        $data .= "<div class='info-item'>";
        $data .= "<i class='fa-solid fa-sack-dollar'></i> " . showPrice($order_price) . "<span class='heading'>Total Order</span>";
        $data .= "</div>"; // info-item
        $data .= "</div>"; // info-container
        $data .= "</div>"; // order-info
        $data .= "</div>"; // order-text
        $data .= "</div>"; // order-content

        $data .= "<div class='order-status'>";
        $data .= "<span class='Order-Status-textmain'>Order Status</span>";
        $data .= "<button class='status-" . strtolower($order_status) . "'>" . ucfirst($order_status) . "</button>";
        $data .= "</div>"; // order-status

        $data .= "</div>"; // order-card
    }
} else {
    $data = "<div class='no-orders-message'><h3>{$noResult}</h3></div>";
}

echo json_encode(["data" => $data]);
exit;
