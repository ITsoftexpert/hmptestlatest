<style>
    .th_head_styling th {
        border: 1px solid lightgrey;
        padding: 1rem;
        text-align: center;
    }

    .td_body_styling td {
        border: 1px solid lightgray;
        padding: 13px;
        text-align: center;
    }

    .border-no-data {
        border: 1px solid lightgrey;
        background-color: #f5c6cb;
    }

    @media(max-width:768px) {
        .desktop_view_milestone_table {
            display: none;
        }

        .mobile_view_milestone_card {
            display: block;
        }
    }


    @media(min-width:769px) {
        .desktop_view_milestone_table {
            display: inline-table;
        }

        .mobile_view_milestone_card {
            display: none;
        }
    }
</style>
<style>
    .th_head_styling th {
        border: 1px solid lightgrey;
        padding: 1rem;
        text-align: center;
    }

    .td_body_styling td {
        border: 1px solid lightgray;
        padding: 13px;
        text-align: center;
    }
</style>
<style>
    .bg-site-color {
        background-color: #00cdce;
        color: white;
    }

    /* Custom Dropdown */
    .custom-dropdown-code {
        position: relative;
        display: inline-block;
    }

    .custom-btn {
        background-color: #00cecc;
        color: white;
        padding: 5px 10px;
        font-size: 16px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
    }

    .custom-btn:hover {
        background-color: #00cedc;
    }

    .custom-dropdown-code-toggle {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .custom-dropdown-code-menu {
        display: none;
        position: absolute;
        top: 100%;
        left: -10;
        right: -17px;
        min-width: 160px;
        background-color: #fff;
        border: 1px solid #ddd;
        box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.1);
        z-index: 1;
        border-radius: 5px;
    }

    .custom-dropdown-code-menu a {
        color: #333;
        padding: 10px;
        text-decoration: none;
        display: block;
    }

    .custom-dropdown-code-menu a:hover {
        background-color: #f1f1f1;
    }

    .custom-dropdown-code.open .custom-dropdown-code-menu {
        display: block;
    }
</style>
<style>
    /* Additional Styling for New Row Structure */
    .milestone-card-row {
        display: flex;
        align-items: center;
        /* margin-bottom: 6px; */
    }

    .milestone-card-row-status {
        display: flex;
        align-items: center;
        justify-content: space-between;

    }

    .milestone-header-title {
        font-weight: bold;
        color: #000;
        font-size: 15px;
        margin-right: 8px;
        white-space: nowrap;
        width: 75px;
    }

    .milestone-job-title,
    .milestone-title,
    .milestone-description {
        font-size: 1em;
        color: #333;
        flex: 1;
    }

    /* General Styling for Milestone Card */
    .milestone-card {
        border: 1px solid #ccc;
        border-radius: 8px;
        padding: 16px;
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        font-family: Arial, sans-serif;
        /* margin: 20px; */
    }

    /* Header */
    .milestone-card-header {
        font-weight: bold;
        font-size: 1em;
        margin-bottom: 10px;
    }

    /* Details Section */
    .milestone-card-details {
        display: flex;
        align-items: center;
        font-size: 0.9em;
        color: #555;
        margin-bottom: 10px;
        justify-content: flex-start;
    }

    .milestone-card-item {
        display: flex;
        align-items: center;
    }

    .milestone-icon {
        margin-right: 4px;
        font-weight: bold;
        color: #000;
        font-size: 15px;

    }

    .w-75px {
        width: 75px;
    }

    /* Footer */
    .milestone-card-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 0.9em;
        color: #777;
        position: relative;
    }

    .milestone-actions {
        font-weight: bold;
        font-size: 15px;
        color: #000;
    }

    .milestone-action-button {
        background-color: #00c4cc;
        color: white;
        border: none;
        padding: 4px 8px;
        border-radius: 4px;
        cursor: pointer;
        font-size: 1em;
    }

    /* Dropdown Menu */
    .dropdown-menu-milestone {
        display: none;
        position: absolute;
        top: 30px;
        right: 0 !important;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        z-index: 1;
        width: 150px;
    }

    .dropdown-item-milestone {
        padding: 3px 10px;
        font-size: 0.9em;
        color: #333;
        cursor: pointer;
    }

    .dropdown-item-milestone:hover {
        background-color: #f0f0f0;
    }


    .horizontal-milestone {
        margin: 5px 0px 5px 0px;

    }

    .milestone-status.btn-style-status button {
        color: #fff;
        background-color: grey;
        padding: 5px 10px;
        border-radius: 5px;
        border: none;
    }

    .milestone-status.completed {
        color: green;
    }

    .milestone-status.cancel-request {
        color: orange;
    }


    /* Responsive */
    @media (max-width: 768px) {
        .mobile_details_milestone {
            display: block;
        }

        .desktop_details_milestone {
            display: none;
        }
    }

    @media (min-width: 769px) {
        .mobile_details_milestone {
            display: none;
        }

        .desktop_details_milestone {
            display: block;
        }
    }

    .custom-btn-styling {
        color: #fff;
        background-color: grey;
        padding: 5px 10px;
        border-radius: 5px;
        border: none;
    }

    .bg-danger-color {
        background-color: #f5c6cb;
    }
    .styling-none-data{      
        border: 1px solid lightgrey;
        text-align: center;
        padding: 1rem;
        background-color: #f5c6cb;
    }
</style>
<div class="row">
    <div class="col-md-10 offset-md-1">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card_body">
                                <h3 class="text-center mb-0 p-3" id="">Order's Milestone Details</h3>
                            </div>
                        </div>
                        <!-- desktop view only start -->
                        <table class="col-md-12 desktop_view_milestone_table">
                            <thead>
                                <tr class="th_head_styling">
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Amount</th>
                                    <th>Delivery Time</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (strpos($order_number, '-') !== false) {
                                    // '-' ke pehle ka portion le lo
                                    $display_order_number = explode("-", $order_number)[0];
                                } else {
                                    // Agar '-' nahi mila to original order_number use karo
                                    $display_order_number = $order_number;
                                }

                                // Direct query with proper string concatenation and LIKE condition
                                $get_current_order_milestones = $db->query("SELECT * FROM milestone WHERE order_number LIKE '" . $display_order_number . "-%'");
                                $row_data_count = $get_current_order_milestones->rowCount();                               
                                // Check if query executed successfully
                                if ($row_data_count > 0) {
                                    while ($get_current_order_milestone = $get_current_order_milestones->fetch()) {
                                ?>
                                        <tr class="td_body_styling">
                                            <td><?= $get_current_order_milestone->task_title; ?></td>
                                            <td><?= $get_current_order_milestone->task_description; ?></td>
                                            <td><?= $get_current_order_milestone->task_amount; ?></td>
                                            <td><?= $get_current_order_milestone->delivery_time; ?></td>
                                            <td><?= $get_current_order_milestone->milestone_status; ?></td>
                                            <td>
                                                <?php if ($get_current_order_milestone->milestone_status == "completed") { ?>
                                                    <select name="" id="orderOptions" onchange="handleSelect(this);">
                                                        <option value="" selected>Select</option>
                                                        <option value="<?= $site_url ?>/customer_support?enquiry_id=1&order_number=<?= $get_current_order_milestone->order_number ?>">Dispute</option>
                                                    </select>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                } else { ?>

                                    <tr class="border-no-data">
                                        <td colspan="6" class="p-4">
                                            <h4 class="text-center">No Milestone Data Found</h4>
                                        </td>
                                    </tr>

                                <?php }
                                ?>

                            </tbody>
                        </table>
                        <!-- desktop view only end -->

                        <!-- mobile view only start -->

                        <div class="page-container mobile_details_milestone">                            
                            <?php
                            if (strpos($order_number, '-') !== false) {
                                // '-' ke pehle ka portion le lo
                                $display_order_number = explode("-", $order_number)[0];
                            } else {
                                // Agar '-' nahi mila to original order_number use karo
                                $display_order_number = $order_number;
                            }

                            // Direct query with proper string concatenation and LIKE condition
                            $get_current_order_milestones = $db->query("SELECT * FROM milestone WHERE order_number LIKE '" . $display_order_number . "-%'");

                            if ($get_current_order_milestones->rowCount() > 0) {
                                while ($fetch_milestone_sec = $display_milestone_sec->fetch()) {
                                    $task_amount = $fetch_milestone_sec->task_amount;
                                    $delivery_time = $fetch_milestone_sec->delivery_time;
                                    $task_description = $fetch_milestone_sec->task_description;
                                    $request_id = $fetch_milestone_sec->request_id;
                                    $sender_id = $fetch_milestone_sec->sender_id;
                                    $proposal_id = $fetch_milestone_sec->proposal_id;
                                    $offer_id = $fetch_milestone_sec->offer_id;
                                    $task_title = $fetch_milestone_sec->task_title;
                                    $milestone_id = $fetch_milestone_sec->milestone_id;
                                    $milestone_status = $fetch_milestone_sec->milestone_status;
                                    $order_number = $fetch_milestone_sec->order_number;
                                    $order_id = $fetch_milestone_sec->order_id;
                                    $buyer_requests_miles_sec = $db->select("buyer_requests", array("request_id" => $request_id));
                                    $fetch_buyer_miles_req_sec = $buyer_requests_miles_sec->fetch();
                                    $request_title = $fetch_buyer_miles_req_sec->request_title;
                            ?>

                                    <!-- Mobile-only Card Format -->
                                    <div class="milestone-card">
                                        <!-- Job Title Row -->
                                        <div class="milestone-card-row">
                                            <p class="milestone-header-title">Job:</p>
                                            <p class="milestone-job-title"><?= $request_title; ?></p>
                                        </div>
                                        <!-- Milestone Title Row -->
                                        <div class="milestone-card-row">
                                            <p class="milestone-header-title">Milestone:</p>
                                            <p class="milestone-title"><?= $task_title; ?></p>
                                        </div>
                                        <!-- Milestone Description Row -->
                                        <div class="milestone-card-row">
                                            <p class="milestone-header-title">Desc:</p>
                                            <p class="milestone-description"><?= $task_description; ?></p>
                                        </div>
                                        <!-- Details Section -->
                                        <div class="milestone-card-details">
                                            <div class="milestone-card-item">
                                                <span class="milestone-icon w-75px">Amount: </span>
                                                <span class="milestone-amount">$<?= $task_amount; ?></span>
                                            </div>
                                            <div class="milestone-card-item">
                                                <span class="milestone-icon ml-5">Delivery Time:</span>
                                                <span class="milestone-date"><?= $delivery_time; ?> Days</span>
                                            </div>
                                        </div>
                                        <!-- Status Row -->
                                        <div class="milestone-card-row-status">
                                            <p class="milestone-header-title">Status:</p>
                                            <p class="milestone-status btn-style-status">
                                                <?php
                                                $milestone_view_status = ($milestone_status == "not paid") ? '<button class="order-now-' . $milestone_id . '">Order Now</button>' : $milestone_status;
                                                echo $milestone_view_status;
                                                ?></p> <!-- Add "completed" or "cancel-request" for other statuses -->
                                        </div>
                                        <hr class="horizontal-milestone">
                                        <!-- Actions Section -->

                                        <div class="milestone-card-footer">
                                            <p class="milestone-actions">Actions</p>

                                            <div class="custom-dropdown-code">
                                                <button class="custom-btn custom-btn-success custom-dropdown-code-toggle" onclick="toggleDropdownCustom()">▼</button>
                                                <div class="custom-dropdown-code-menu">
                                                    <p class="mb-0"><a href="<?= $site_url; ?>/customer_support?enquiry_id=1&order_number=<?= $order_number ?>">Dispute</a></p>
                                                    <p class="mb-0"><a href="<?= $site_url; ?>/order_details?order_id=<?= $order_id ?>">Payment Release</a></p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                <?php }
                            } else { ?>
                                <div class="styling-none-data">
                                    <h4>No Milestone Data Found</h4>
                                </div>

                            <?php } ?>
                        </div>
                        <!-- mobile view only end -->


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>