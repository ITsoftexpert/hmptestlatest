<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<style>
    @media (max-width:768px) {
        .badge-float-right {
            float: right;
            margin-top: -3px;
            padding-top: 5px;
            margin-right: -9px !important;
        }

        .font-size-3 {
            font-size: 13px !important;
            padding: 10px !important;
            text-align: center;
        }
    }

    @media(min-width:550px) and (max-width:768px) {
        .width-increase {
            /* border:1px solid green; */
            width: 150px;
            text-align: center;
        }
    }

    @media(min-width:768px) {
        .width-increase {
            /* border:1px solid green; */
            width: 170px;
            text-align: center;
        }
    }

    .badge-float-right {
        float: right;
        margin-top: -3px;
        padding-top: 5px;
        margin-right: -9px !important;
    }

    .padding-13 {
        padding: 9px 15px;
    }

    .nav-tabs .respo_drop_menu {
        z-index: 10;
    }

    .font-size-3 {

        padding: 13px !important;
        text-align: center;

    }

    @media (max-width:768px) {
        .respo_drop_menu .respo_drop_item.active {
            background-color: #00CEDC;
            color: white;
        }
    }

    /* Style for active tab in larger screens */
    @media (min-width:768px) {
        .nav-tabs .nav-item .nav-link.active {
            background-color: #ebebeb;
            color: #000;
            font-weight: 600;
        }
    }

    #navbarDropdown {
        color: #000 !important;
        background-color: #ebebeb !important;
        box-shadow: rgba(0, 0, 0, 0.12) 0px 1px 3px, rgba(0, 0, 0, 0.24) 0px 1px 2px;
        width: fit-content;
        display: flex;
        justify-content: center;
        font-size: 17px;
        font-weight: 600;
        gap: 8px;
        align-items: center;
        margin: auto;

    }

    .dropdown-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        /* Aligns content vertically */
        padding: 10px 15px;
    }

    .dropdown-item .badge {
        margin-left: 10px;
        /* Optional: adds space between the label and the badge */
    }

    .dropcarvelbuyer {
        background-color: #fff;
        width: 100%;
        transform: translate3d(0px, 46px, 0px) !important;
    }
</style>
<ul class="nav nav-tabs flex-column flex-sm-row box-shadow-buyer-order">
    <li class="nav-item dropdown d-block d-sm-none">
        <button class="dropdown-toggle nav-link respo_drop_toggle make-black padding-13 text-blue" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Manage Proposals
        </button>
        <div class="dropdown-menu dropcarvelbuyer dropdown-menu-display" aria-labelledby="navbarDropdown">
            <?php
            $statuses = ['active', 'delivered', 'completed', 'cancelled', 'all'];
            foreach ($statuses as $status) {
                $count_orders = $db->count("orders", array("buyer_id" => $login_seller_id, "order_status" => $status));
                $label = $lang['tabs'][$status];
                $active_class = $status == 'active' ? 'active' : '';
                echo "
                <a class='dropdown-item respo_drop_item' href='#$status' data-toggle='tab'>
                    <span class='status-label'>$label</span> 
                    <span class='badge badge-success'>$count_orders</span>
                    <span class='check-icon' style='display:none;'>✔️</span>                    
                </a>";
            }
            ?>
        </div>
    </li>

    <script>
        $(document).ready(function() {
            // Set the dropdown label to "active" by default
            $('#navbarDropdown').text('Manage Proposals (Active)');

            // Handle dropdown item click
            $('.dropdown-item').on('click', function(e) {
                // e.preventDefault(); // Prevent default anchor behavior

                // Get selected item text and update dropdown button label
                const selectedText = $(this).find('.status-label').text().trim();
                $('#navbarDropdown').text(selectedText);

                // Show corresponding tab content
                const targetTab = $(this).attr('href');
                $('.dropdown-menu-display').removeClass('show'); // This line closes the dropdown
                $('#navbarDropdown').attr('aria-expanded', 'false'); // Update ARIA attribute

            });

            // Toggle the dropdown menu on button click
            $('#navbarDropdown').on('click', function(e) {
                e.stopPropagation(); // Prevent click event from bubbling
                $('.dropdown-menu-display').toggleClass('show');
                $(this).attr('aria-expanded', $('.dropdown-menu-display').hasClass('show'));
            });

            // Close the dropdown if clicked outside
            $(document).on('click', function() {
                $('.dropdown-menu-display').removeClass('show');
                $('#navbarDropdown').attr('aria-expanded', 'false');
            });

        });
    </script>


    <!-- Add this JavaScript code to handle selection and confirmation -->
    <!-- <script>
        let selectedStatuses = [];

        document.querySelectorAll('.dropdown-item').forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault(); // Prevent default anchor behavior

                const checkIcon = this.querySelector('.check-icon');
                const status = this.getAttribute('data-status');

                // Toggle check icon display
                if (checkIcon.style.display === 'none') {
                    checkIcon.style.display = 'inline';
                    if (status === 'active') {
                        selectedStatuses.push(status);
                    }
                } else {
                    checkIcon.style.display = 'none';
                    selectedStatuses = selectedStatuses.filter(s => s !== status);
                }
            });
        });

        document.getElementById('confirmSelection').addEventListener('click', function() {
            if (selectedStatuses.length > 0) {
                alert('Selected statuses: ' + selectedStatuses.join(', '));
                // Optionally hide the dropdown
                document.getElementById('navbarDropdown').setAttribute('aria-expanded', 'false');
                document.querySelector('.dropdown-menu').classList.remove('show');
            } else {
                alert('No statuses selected.');
            }
        });
    </script> -->






    <!-- Tabs for larger screens -->
    <?php
    $statuses = ['active', 'delivered', 'completed', 'cancelled', 'all'];
    foreach ($statuses as $status) {
        $count_orders = $db->count("orders", array("buyer_id" => $login_seller_id, "order_status" => $status));
        $label = $lang['tabs'][$status];
        $active_class = $status == 'active' ? 'active' : '';
        echo "<li class='nav-item width-increase d-none d-sm-block'>
            <a href='#$status' data-toggle='tab' class='nav-link $active_class make-black padding-13'>
                $label <span class='badge badge-success badge-float-right'>$count_orders</span>
            </a>
        </li>";
    }
    ?>
</ul>
<div class="tab-content">
    <div class="tab-pane fade show active" id="active">
        <?php require_once("manage_orders/order_active_buying.php") ?>
    </div>

    <div class="tab-pane" id="delivered">
        <?php require_once("manage_orders/order_delivered_buying.php") ?>
    </div>

    <div class="tab-pane" id="completed">
        <?php require_once("manage_orders/order_completed_buying.php") ?>
    </div>
    <div class="tab-pane" id="cancelled">
        <?php require_once("manage_orders/order_cancelled_buying.php") ?>
    </div>
    <div class="tab-pane" id="all">
        <?php require_once("manage_orders/order_all_buying.php") ?>
    </div>
</div>

<script>
    // Document ready function
    document.addEventListener("DOMContentLoaded", function() {
        // Get all dropdown items
        var dropdownItems = document.querySelectorAll(".respo_drop_menu .respo_drop_item");

        // Add click event listener to each dropdown item
        dropdownItems.forEach(function(item) {
            item.addEventListener("click", function() {
                // Get the clicked item's label
                var selectedText = this.textContent.trim();

                // Set the dropdown button's label to the selected item's label
                var dropdownButton = document.getElementById("navbarDropdown");
                dropdownButton.textContent = selectedText;
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        // Handle dropdown item click
        $('.respo_drop_menu .respo_drop_item').on('click', function() {
            // Close the dropdown menu
            $('.respo_drop_menu').removeClass('show');
        });

        // Handle dropdown toggle click
        $('.respo_drop_toggle').on('click', function() {
            // Toggle the dropdown menu
            $('.respo_drop_menu').toggleClass('show');
        });
    });
</script>