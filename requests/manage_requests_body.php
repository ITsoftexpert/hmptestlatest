<?php
$countRequestsActive = $db->count("buyer_requests", array("seller_id" => $login_seller_id, "request_status" => 'active'));
$countRequestsPause = $db->count("buyer_requests", array("seller_id" => $login_seller_id, "request_status" => 'pause'));
$countRequestsPending = $db->count("buyer_requests", array("seller_id" => $login_seller_id, "request_status" => 'pending'));
$countRequestsModification = $db->count("buyer_requests", array("seller_id" => $login_seller_id, "request_status" => 'modification'));
$countRequestsUnapproved = $db->count("buyer_requests", array("seller_id" => $login_seller_id, "request_status" => 'unapproved'));
$display_milestone = $db->select("milestone", array("seller_id" => $login_seller_id));
$milstoneRowCount = $display_milestone->rowCount();

$activeReqTab = isset($_GET['tab']) ? $_GET['tab'] : "approved_request";
?>
<style>
    @media (max-width:768px) {
        .badge-float-right {
            float: right;
            margin-top: -3px;
            padding-top: 5px;
            margin-right: -9px !important;
        }
    }

    @media (min-width:992px) {
        .width-increase1 {
            width: 18.5%;
            margin: 5px 0px;
        }

        .width-increase12 {
            width: 24%;
            margin: 5px 0px;
        }

        .width-increase13 {
            width: 18%;
            margin: 5px 0px;
        }
    }


    .ram_1_dropbtn {
        background-color: #ebebeb !important;
        box-shadow: rgba(0, 0, 0, 0.12) 0px 1px 3px, rgba(0, 0, 0, 0.24) 0px 1px 2px;
        color: #000;
        padding: 16px;
        font-weight: 600;
        font-size: 16px;
        border: none;
        margin: auto;
        width: fit-content;
        cursor: pointer;
        transition: background-color 0.3s, color 0.3s;
    }


    .ram_1_dropdown {
        position: relative;
        /* display: inline-block; */
        width: fit-content;
        margin: auto;
    }

    .ram_1_dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
        top: 100%;
    }


    .ram_1_dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        transition: background-color 0.3s, color 0.3s;
    }


    /* .ram_1_dropdown-content a:hover {
        background-color: #00CEDC;
        color: white;
    } */


    .ram_1_dropdown.show .ram_1_dropdown-content {
        display: block;
    }


    .ram_1_dropdown.show .ram_1_dropbtn {
        background-color: #00CEDC;
        color: #000;
    }


    .tab-content {
        margin-top: 20px;
    }

    .ram_1_dropbtn {
        padding: 6px 16px;
    }

    @media (max-width: 768px) {
        .ram_hide {
            display: none;
        }
    }

    @media (min-width: 768px) {
        #dropdownContainer {
            display: none;
        }
    }



    /* ################################### */
    /* Dropdown wrapper */
    .dropdown-manage-proposals {
        position: relative;
        display: block;
        width: 100%;
        text-align: center;
    }

    /* Button */
    .dropdown-btn-manage {
        /* background-color: #f8f9fa;
        border: 1px solid #ced4da;
        padding: 10px;
        font-size: 16px;
        cursor: pointer;
        display: inline-block;
        width: auto;
        margin: 0 auto;
        position: relative; */
        color: #000 !important;
        background-color: #ebebeb !important;
        box-shadow: rgba(0, 0, 0, 0.12) 0px 1px 3px, rgba(0, 0, 0, 0.24) 0px 1px 2px;
        width: fit-content;
        border: none;
        padding: 11px 15px;
        display: flex;
        justify-content: center;
        font-size: 17px;
        font-weight: 600;
        gap: 8px;
        align-items: center;
        margin: auto;
    }

    /* Drop icon styling */
    .drop-icon {
        margin-left: 10px;
        font-size: 14px;
        vertical-align: middle;
    }

    /* Dropdown content hidden by default */
    .dropdown-content-manage {
        display: none;
        position: absolute;
        background-color: #fff;
        border: 1px solid #ced4da;
        width: 100%;
        z-index: 1;
        padding: 10px;
        left: 0;
        top: 100%;
    }

    /* List styling */
    .proposal-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .proposal-item-active,
    .proposal-item-delivered,
    .proposal-item-completed,
    .proposal-item-cancelled,
    .proposal-item-all {
        margin-bottom: 8px;
    }

    /* Links for each proposal status */
    .proposal-link-active,
    .proposal-link-delivered,
    .proposal-link-completed,
    .proposal-link-unapproved,
    .proposal-link-all {
        display: flex;
        justify-content: space-between;
        padding: 10px 15px;
        text-align: center;
        text-decoration: none;
        color: #212529;
        text-transform: uppercase;
        align-items: center;
        font-size: 1rem;

    }

    /* Hover effect for each link */
    .proposal-link-active:hover {
        background-color: #ebebeb;
    }

    .proposal-link-delivered:hover {
        background-color: #ebebeb;
    }

    .proposal-link-completed:hover {
        background-color: #ebebeb;
    }

    .proposal-link-unapproved:hover {
        background-color: #ebebeb;
    }

    .proposal-link-all:hover {
        background-color: #ebebeb;
    }

    /* Badges for each link */
    .badge {
        padding: 5px;
        border-radius: 5px;
        font-size: 14px;
        color: #fff;
    }

    .badge-active {
        background-color: #00cfe8;
    }

    .badge-delivered {
        background-color: #00cfe8;
    }

    .badge-completed {
        background-color: #00cfe8;
    }

    .badge-cancelled {
        background-color: #00cfe8;
    }

    .badge-all {
        background-color: #00cfe8;
    }

    /* OK Button inside the dropdown */
    .btn-submit-ok {
        background-color: #4CAF50;
        color: #fff;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        width: 100%;
        margin-top: 10px;
    }

    .btn-submit-ok:hover {
        background-color: #45a049;
    }
</style>

<!-- <div class="ram_1_dropdown" id="dropdownContainer">
    <button class="ram_1_dropbtn dropdown-toggle"> Manage Request </button>
    <div class="ram_1_dropdown-content">
        <ul class="nav nav-tabs flex-column flex-sm-row mt-1">
            <li class="nav-item width-increase1">
                <a href="#activeBuyerReq" data-toggle="tab" class="nav-link make-black <?= $activeReqTab == 'approved_request' ? "active" : "" ?> padding-10">
                    <?= $lang['tabs']['active_requests']; ?> <span class="badge badge-success badge-float-right"><?= $countRequestsActive; ?></span>
                </a>
            </li>
            <li class="nav-item width-increase1">
                <a href="#pauseBuyerReq" data-toggle="tab" class="nav-link make-black <?= $activeReqTab == 'pause_request' ? "active" : "" ?> padding-10">
                    <?= $lang['tabs']['pause_requests']; ?> <span class="badge badge-success badge-float-right"><?= $countRequestsPause; ?></span>
                </a>
            </li>
            <li class="nav-item width-increase1">
                <a href="#pendingBuyerReq" data-toggle="tab" class="nav-link make-black <?= $activeReqTab == 'pending_request' ? "active" : "" ?> padding-10">
                    <?= $lang['tabs']['pending_approval']; ?> <span class="badge badge-success badge-float-right"><?= $countRequestsPending; ?></span>
                </a>
            </li>
            <li class="nav-item width-increase12">
                <a href="#modificationBuyerReq" data-toggle="tab" class="nav-link make-black <?= $activeReqTab == 'modification_request' ? "active" : "" ?> padding-10">
                    <?= $lang['tabs']['requires_modification']; ?> <span class="badge badge-success badge-float-right"><?= $countRequestsModification; ?></span>
                </a>
            </li>
            <li class="nav-item width-increase13">
                <a href="#unapprovedBuyerReq" data-toggle="tab" class="nav-link make-black <?= $activeReqTab == 'unapproved_request' ? "active" : "" ?> padding-10">
                    <?= $lang['tabs']['unapproved']; ?> <span class="badge badge-success badge-float-right"><?= $countRequestsUnapproved; ?></span>
                </a>
            </li>
        </ul>
    </div>
</div> -->

<div class="dropdown-manage-proposals mt-4" id="dropdownContainer">
    <button class="dropdown-btn-manage" onclick="toggleDropdown()">Manage Requests
        <span class="drop-icon"><i class="fa-solid fa-caret-down"></i></span>
    </button>
    <div class="dropdown-content-manage" id="dropdownMenu">
        <ul class="proposal-list">
            <li class="proposal-item-active">
                <a href="#" class="proposal-link-active">Active Requests <span class="badge badge-active">0</span></a>
            </li>
            <li class="proposal-item-delivered">
                <a href="#" class="proposal-link-delivered">Paused Requests <span class="badge badge-delivered">0</span></a>
            </li>
            <li class="proposal-item-completed">
                <a href="#" class="proposal-link-completed">Pending Approvel <span class="badge badge-completed">1</span></a>
            </li>
            <li class="proposal-item-cancelled">
                <a href="#" class="proposal-link-unapproved">Requires Modification <span class="badge badge-cancelled">1</span></a>
            </li>
            <li class="proposal-item-cancelled">
                <a href="#" class="proposal-link-unapproved">Unapproved <span class="badge badge-cancelled">1</span></a>
            </li>
            <!-- <li class="proposal-item-all">
                <a href="#" class="proposal-link-all">ALL <span class="badge badge-all">0</span></a>
            </li> -->
        </ul>
        <button class="btn-submit-ok">OK</button>
    </div>
</div>




<ul class="nav nav-tabs flex-column flex-sm-row mt-1 ram_hide">
    <li class="nav-item ">
        <a href="#activeBuyerReq" data-toggle="tab" class="nav-link make-black <?= $activeReqTab == 'approved_request' ? "active" : "" ?> padding-10">
            <?= $lang['tabs']['active_requests']; ?> <span class="badge badge-success badge-float-right ml-5"><?= $countRequestsActive; ?></span>
        </a>
    </li>
    <li class="nav-item ">
        <a href="#pauseBuyerReq" data-toggle="tab" class="nav-link make-black <?= $activeReqTab == 'pause_request' ? "active" : "" ?> padding-10">
            <?= $lang['tabs']['pause_requests']; ?> <span class="badge badge-success badge-float-right ml-5"><?= $countRequestsPause; ?></span>
        </a>
    </li>
    <li class="nav-item ">
        <a href="#pendingBuyerReq" data-toggle="tab" class="nav-link make-black <?= $activeReqTab == 'pending_request' ? "active" : "" ?> padding-10">
            <?= $lang['tabs']['pending_approval']; ?> <span class="badge badge-success badge-float-right ml-5"><?= $countRequestsPending; ?></span>
        </a>
    </li>
    <li class="nav-item ">
        <a href="#modificationBuyerReq" data-toggle="tab" class="nav-link make-black <?= $activeReqTab == 'modification_request' ? "active" : "" ?> padding-10">
            <?= $lang['tabs']['requires_modification']; ?> <span class="badge badge-success badge-float-right ml-5"><?= $countRequestsModification; ?></span>
        </a>
    </li>
    <li class="nav-item ">
        <a href="#unapprovedBuyerReq" data-toggle="tab" class="nav-link make-black <?= $activeReqTab == 'unapproved_request' ? "active" : "" ?> padding-10">
            <?= $lang['tabs']['unapproved']; ?> <span class="badge badge-success badge-float-right ml-5"><?= $countRequestsUnapproved; ?></span>
        </a>
    </li>
    <li class="nav-item ">

        <a href="#milestoneBuyerReq" data-toggle="tab" class="nav-link make-black padding-10">
            Milestone <span class="badge badge-success badge-float-right ml-5"><?= $milstoneRowCount; ?></span>
        </a>
    </li>
</ul>

<div class="tab-content mt-4">
    <div id="activeBuyerReq" class="tab-pane fade <?= $activeReqTab == 'approved_request' ? "show active" : "" ?>">
        <?php require_once("manage-requests/active.php") ?>
    </div>
    <div id="pauseBuyerReq" class="tab-pane fade <?= $activeReqTab == 'pause_request' ? "show active" : "" ?>">
        <?php require_once("manage-requests/pause.php") ?>
    </div>
    <div id="pendingBuyerReq" class="tab-pane fade <?= $activeReqTab == 'pending_request' ? "show active" : "" ?>">
        <?php require_once("manage-requests/pending.php") ?>
    </div>
    <div id="modificationBuyerReq" class="tab-pane fade <?= $activeReqTab == 'modification_request' ? "show active" : "" ?>">
        <?php require_once("manage-requests/modification.php") ?>
    </div>
    <div id="unapprovedBuyerReq" class="tab-pane fade <?= $activeReqTab == 'unapproved_request' ? "show active" : "" ?>">
        <?php require_once("manage-requests/unapproved.php") ?>
    </div>
    <div id="milestoneBuyerReq" class="tab-pane">
        <?php require_once("manage-requests/milestone.php") ?>
    </div>
</div>

<!-- Include jQuery if not already included -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Add JavaScript to update the button text on dropdown item click and handle dropdown visibility -->
<script>
    $(document).ready(function() {
        var dropdownButton = document.querySelector(".ram_1_dropbtn");
        var dropdown = document.querySelector(".ram_1_dropdown");
        var dropdownContent = document.querySelector(".ram_1_dropdown-content");

        dropdownButton.addEventListener("click", function() {
            dropdown.classList.toggle("show");
        });

        dropdownContent.addEventListener("click", function(event) {
            var target = event.target;
            if (target.tagName === 'A') {
                dropdownButton.textContent = target.textContent;
                // Trigger a click event on the corresponding tab
                var tabId = target.getAttribute('href').substring(1);
                var tab = document.getElementById(tabId);
                if (tab) {
                    var tabPane = new bootstrap.Tab(tab);
                    tabPane.show();
                }
                dropdown.classList.remove("show");
            }
        });


    });
</script>

<script>
    function toggleDropdown() {
        var dropdownMenu = document.getElementById("dropdownMenu");
        if (dropdownMenu.style.display === "block") {
            dropdownMenu.style.display = "none";
        } else {
            dropdownMenu.style.display = "block";
        }
    }
</script>

<!-- Bootstrap JavaScript (required for dropdown functionality) -->