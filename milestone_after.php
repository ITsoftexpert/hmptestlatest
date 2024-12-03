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
</style>
<style>
    .new_form_designinner {
        width: auto;
        max-width: 550px;
        background-color: #f7f7f7;
        border-radius: 10px;
        margin: 8rem auto;
        padding: 2rem;
    }

    .new_form_designinner2 {
        width: auto;
        max-width: 550px;
        background-color: #f7f7f7;
        border-radius: 10px;
        margin: auto;
        padding: 2rem;
    }

    /* Mobile view adjustment with !important */
    @media (max-width: 768px) {
        .new_form_designinner {
            margin: 9rem 2rem 0px 2rem !important;
        }
    }

    .close_miles_form_span {
        border: 1px solid;
        padding: 5px 10px 1px;
        float: inline-end;
        /* color: #000; */
        font-weight: 100;
        border-radius: 5px;
        /* background-color: black; */
    }

    .task-input-field-design {
        box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 5px 0px,
            rgba(0, 0, 0, 0.1) 0px 0px 1px 0px;
        border: none;
        border-radius: 5px;
    }

    .task-title-label-design {
        color: gray;
        font-weight: 600;
    }

    .create-milestone-title-n:hover {
        color: #00cedc !important;
    }

    .milestone-d-action-drop {
        padding: 10px;
    }

    .submit_milestone_btn_style {
        border: none;
        background-color: #00cedc;
        color: white;
        border-radius: 3px;
        padding: 9px 40px;
        font-size: 16px;
    }
</style>

<div id="position_fixed_div">
    <div class="new_form_designinner2 milestone_form_display mb-5">
        <form method="post">
            <h4 class="mb-4"><u>Create Milestone</u></h4>
            <div class="row">
                <div class="col-md-12">
                    <label for="" class="task-title-label-design">Task Title</label><br>
                    <input class="col-md-12 p-2 task-input-field-design" type="text" name="task_title" placeholder="Enter your task" id="" required>
                </div>
                <div class="col-md-12 mt-3">
                    <label for="" class="task-title-label-design">Task Description</label><br>
                    <input class="col-md-12 p-2 task-input-field-design" type="text" name="task_description" placeholder="Enter your description" id="" required>
                </div>
                <div class="col-md-6 mt-3">
                    <label for="" class="task-title-label-design">Task Amount ( In $ )</label> <br>
                    <input class="col-md-12 p-2 task-input-field-design" type="number" name="task_amount" placeholder="Enter your amount" id="" required>
                </div>
                <div class="col-md-6 mt-3">
                    <label for="" class="task-title-label-design">Delivery Time</label><br>
                    <input class="col-md-12 p-2 task-input-field-design" type="number" name="delivery_time" placeholder="Enter your delivery time" id="" required>
                </div>
            </div>
            <div class="w-100 d-flex pt-5">
                <button type="submit" class="m-auto submit_milestone_btn_style" name="submit_milestone">Submit</button>
            </div>
        </form>
    </div>
</div>
<?php

// insert milestone
if (isset($_POST["submit_milestone"])) {
    $task_amount = $_POST['task_amount'];
    $delivery_time = $_POST['delivery_time'];
    $task_title = $_POST['task_title'];
    $task_description = $_POST['task_description'];
    $order_number = $_POST['order_number'];
    $order_id = $_POST['order_id'];

    $slectordernum = $db->select("orders", array("order_id" => $order_id))->fetch();
    $milestone_id = $slectordernum->milestone_id;

    $selectExistMiles = $db->select("milestone", array("milestone_id" => $milestone_id))->fetch();
    $request_id = $selectExistMiles->request_id;
    $sender_id = $selectExistMiles->sender_id;
    $login_seller_id = $selectExistMiles->seller_id;
    $proposal_id = $selectExistMiles->proposal_id;
    $offer_id = $selectExistMiles->offer_id;

    $insert_milestone_data = $db->insert(
        "milestone",
        array(
            "task_amount" => $task_amount,
            "delivery_time" => $delivery_time,
            "task_description" => $task_description,
            "request_id" => $request_id,
            "sender_id" => $sender_id,
            "seller_id" => $login_seller_id,
            "proposal_id" => $proposal_id,
            "offer_id" => $offer_id
        )
    );

    if ($insert_milestone_data) {
        echo "Milestone Created Successfully <a href='$site_url/requests/manage_requests'>(View & Start)</a>";
    } else {
        echo "Milestone Not Created! Try Again";
    }
} ?>
<script>
    document.getElementById('selectnextstep').addEventListener('change', function() {
        var selectedValue = this.value;

        // Hide both sections initially
        document.getElementById('forreview').style.display = 'none';
        document.getElementById('forcontinue').style.display = 'none';

        // Show the appropriate section based on the selection
        if (selectedValue === 'completed') {
            document.getElementById('forreview').style.display = 'block';
        } else if (selectedValue === 'continue') {
            document.getElementById('forcontinue').style.display = 'block';
        }
    });
</script>