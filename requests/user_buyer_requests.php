<?php
$activetab = (isset($_GET['offers'])) ? 'offers' : "active";
$limit = 5; //isset($homePerPage) ? $homePerPage : 5;

$requests_query = $where_child_id = get_buyer_request_query($login_seller_id);
$relevant_requests = $row_general_settings->relevant_requests;
?>

<style>
    @media (max-width:768px) {
        .nav-item-width {
            /* border:2px solid green; */
            width: 50%;
            text-align: center;
            justify-content: center;
            align-items: center;
        }


        .badge-float-right {
            float: right;
            margin-top: -3px;
            padding-top: 5px;
            margin-right: -9px;
        }

        .heading-31 {
            /* background-color: green; */
            font-size: 20px;
            padding-left: 4px;
            padding-top: 4px;
        }

        .font-size {
            font-size: 13px !important;
            /* margin: 10px !important; */
            /* background-color: green !important; */
        }

        .font-size-th {
            font-size: 11px !important;
            padding: 5px !important;
            text-align: center;
            /* margin: 10px !important; */
            /* background-color: green !important; */
        }

        .float_left {
            float: left;
        }

        .font-size-4 {
            font-size: 20px;
        }

        .text-align-center {
            text-align: center;
        }
    }

    .font-size-4 {
        font-size: 20px;
        text-align: center;
    }

    @media(min-width:768px) {
        .width-increase {
            width: 140px;
            text-align: center;
            /* box-shadow: 0px 0px 1px black,inset 0px 0px 15px #f5fffe; */
        }
    }

    .heading-31 {
        /* background-color: green; */
        font-size: 20px;
        padding-left: 4px;
        padding-top: 4px;
        width: 40%;
        /* text-align: right; */
    }



    @media (min-width:769px) {
        #sub-category {
            width: auto;
            /* width: 100%; */
            margin-top: -40px !important;
        }

        .pt-pr {
            padding: 9px 15px;
        }

        .badge-float-right {
            float: right;
            margin-top: -3px;
            padding-top: 5px;
            margin-right: -9px;
        }

        .width_55 {
            width: 55%;
        }

        .text-align-center {
            text-align: center;
        }

        .width_45percent {
            overflow-wrap: anywhere;
        }

        .width_10 {
            width: 10%;
        }
    }

    .font-size-th {
        padding: 13px !important;
        text-align: center;
        border: 1px solid lightgray !important;
        /* box-shadow: 0px 0px 5px black, inset 0px 0px 15px #00c8d4; */
    }

    .padding {
        padding: 5px;
    }

    @media only screen and (max-width: 768px) {
        .buyer-request-head-nitin {
            display: none;
        }
    }
</style>

<style>
    /* Hide the element with class buyerrequesttbl-nitin on mobile */
    @media (max-width: 767px) {
        .buyerrequesttbl-nitin {
            display: none;
        }
    }

    /* Hide the element with class mobile-request-card on desktop and larger screens */
    @media (min-width: 768px) {
        .mobile-request-card {
            display: none;
        }
    }

    /* General Styles */
    /* body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
        margin: 0;
        padding: 0;
    } */

    /* .request-list {
        padding: 10px;
    } */

    /* Card Styles */
    .request-card {
        display: flex;
        background-color: white;
        border-radius: 10px;
        padding: 15px;
        margin-bottom: 15px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        /* align-items: center; */
    }

    /* Icon Section */
    .icon {
        width: 40px;
        margin-right: 15px;
    }

    .icon img {
        width: 100%;
    }

    /* Info Section */
    .request-info {
        flex: 1;
    }

    .request-title {
        font-size: 16px;
        font-weight: bold;
        margin: 0;
    }

    .request-des {
        font-size: 14px;
        color: #6c757d;
        margin: 5px 0;
    }

    .request-price {
        font-size: 14px;
        color: #28a745;
        font-weight: bold;
    }

    .request-time {
        font-size: 12px;
        color: #6c757d;
        /* margin-top: 5px; */
    }

    .rate-date-nitin-seller {
        display: flex;
        gap: 20px;
    }

    /* Mobile Styles */
    @media screen and (max-width: 600px) {
        .request-card {
            flex-direction: row;
        }
    }





    /* Hide the element with class buyerrequesttbl-nitin on mobile */
    @media (max-width: 767px) {
        .buyerrequesttbl-nitin {
            display: none;
        }
    }

    /* Hide the element with class offer-submitted-nitin on desktop and larger screens */
    @media (min-width: 768px) {
        .offer-submitted-nitin {
            display: none;
        }
    }

    /* General Styles */
    .offer-card.offer-submitted-nitin {
        display: flex;
        background-color: white;
        border-radius: 10px;
        padding: 15px;
        margin-bottom: 15px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .offer-icon.offer-submitted-nitin {
        width: 40px;
        margin-right: 15px;
    }

    .offer-icon.offer-submitted-nitin img {
        width: 100%;
    }

    .offer-info.offer-submitted-nitin {
        flex: 1;
    }

    .offer-title.offer-submitted-nitin {
        font-size: 16px;
        font-weight: bold;
        margin: 0;
    }

    .offer-des.offer-submitted-nitin {
        font-size: 14px;
        color: #6c757d;
        margin: 5px 0;
    }

    .offer-price.offer-submitted-nitin {
        font-size: 14px;
        color: #28a745;
        font-weight: bold;
    }

    .offer-time.offer-submitted-nitin {
        font-size: 12px;
        color: #6c757d;
    }

    .rate-date.offer-submitted-nitin {
        display: flex;
        gap: 20px;
    }

    /* Mobile Styles */
    @media screen and (max-width: 600px) {
        .offer-card.offer-submitted-nitin {
            flex-direction: row;
        }
    }

    .duration-weeks {
        font-weight: bold;
        /* Make the weeks bold if desired */
        color: #000;
        /* Change color if necessary */
    }
</style>
<ul class="nav nav-tabs mt-3">
    <!-- nav nav-tabs Starts -->
    <li class="nav-item width-increase nav-item-width">
        <a href="#active-requests" data-toggle="tab" class="nav-link make-black <?= $activetab == "active" ? "active" : "" ?> pt-pr">
            <?= $lang['tabs']['active2']; ?> <span class="badge badge-success badge-float-right" id="activeReqSpan">
                <?php
                // $i_requests = 0;
                // $i_send_offers = 0;
                // if ($relevant_requests == "no") {
                //     $requests_query = "";
                // }
                // if (isset($_SESSION['seller_user_name'])) {
                //     if (!empty($requests_query) or $relevant_requests == "no") {
                //         $get_requests = $db->query("select * from buyer_requests where request_status='active'" . $requests_query . " AND NOT seller_id='$login_seller_id' order by request_id DESC");
                //         $totalRequest = $get_requests->rowCount();
                //         while ($row_requets = $get_requests->fetch()) {
                //             $request_id = $row_requets->request_id;
                //             $count_offers = $db->count("send_offers", array("request_id" => $request_id, "sender_id" => $login_seller_id));
                //             if ($count_offers == 1) {
                //                 $i_send_offers++;
                //             }
                //             $i_requests++;
                //         }
                //     }
                // } else {
                //     $get_requests = $db->query("select * from buyer_requests where request_status='active'" . $requests_query . " order by request_id DESC");
                //     $totalRequest = $get_requests->rowCount();
                //     while ($row_requets = $get_requests->fetch()) {
                //         $request_id = $row_requets->request_id;
                //         $count_offers = $db->count("send_offers", array("request_id" => $request_id, "sender_id" => $login_seller_id));
                //         if ($count_offers == 1) {
                //             $i_send_offers++;
                //         }
                //         $i_requests++;
                //     }
                // }
                // echo $i_requests - $i_send_offers;
                echo  "0";
                ?>
            </span>
        </a>
    </li>
    <?php
    $count_offers = $db->count("send_offers", array("sender_id" => $login_seller_id));
    if (isset($_SESSION['seller_user_name'])) {
    ?>
        <li class="nav-item width-increase nav-item-width">
            <a href="#sent-offers" data-toggle="tab" class="nav-link make-black <?= $activetab == "offers" ? "active" : "" ?> pt-pr">
                <?= $lang['tabs']['offers_sent']; ?> <span class="badge badge-success badge-float-right"> <?= $count_offers; ?> </span>
            </a>
        </li>
    <?php } ?>
</ul>
<div class="tab-content mt-4 seller-recent-buyer-req-nitin">
    <div id="active-requests" class="tab-pane fade <?= $activetab == "active" ? "show active" : "" ?> box-shadow-buyer-request">
        <div class="box-table width-99  box-shadow-head31">
            <h3 class="float_left ml-2 mt-3 mb-3 heading-31 buyer-request-head-nitin"> Buyer Requests </h3>
            <?php // if (isset($_SESSION['seller_user_name']) && !(isset($homePerPage))) {
            ?>
            <select id="sub-category" class="form-control float-right sort-by mt-3 mb-3 mr-0 font-size">
                <option value="all"> All Subcategories</option>
                <?php
                if (!empty($where_child_id)) {
                    $get_c_cats = $db->query("SELECT * FROM categories_children WHERE {$where_child_id}");
                    while ($row_c_cats = $get_c_cats->fetch()) {
                        $child_id = $row_c_cats->child_id;
                        $get_meta = $db->select("child_cats_meta", array("child_id" => $child_id, "language_id" => $siteLanguage));
                        $row_meta = $get_meta->fetch();
                        $child_title = $row_meta->child_title;
                        echo "<option value='$child_id'> $child_title </option>";
                    }
                }
                ?>
            </select>
            <?php // }
            ?>
            <table class="table-responsive table table-bordered buyerrequesttbl-nitin" id="buyerRequestsTbl">
                <thead class="mt-3">
                    <tr>
                        <th class="font-size-th width_55">Request</th>
                        <th class="font-size-th text-align-center">Offers</th>
                        <th class="font-size-th text-align-center">Date</th>
                        <th class="font-size-th text-align-center">Duration</th>
                        <th class="font-size-th text-align-center">Budget</th>
                    </tr>
                </thead>
                <tbody id="load-data">
                    <tr class="table-info">
                        <td colspan="5">
                            data fetching...
                        </td>
                    </tr>
                </tbody>
            </table>



            <br>
            <br>
            <div class="request-list mobile-request-card">
                <div class="request-card">
                    <div class="icon">
                        <img src="images/seller-buyer-request-img.png" alt="Folder Icon">
                    </div>
                    <div class="request-info">
                        <h3 class="request-title">Amazon Sales Growth Expert for...</h3>
                        <p class="request-des">Amazon FBA, Internet Marketing...</p>
                        <div class="rate-date-nitin-seller">
                            <p class="request-price">$30 - 250 USD</p>
                            <p class="request-time">September, 24, 2024 </p>
                        </div>
                    </div>
                </div>

                <div class="request-card">
                    <div class="icon">
                        <img src="images/seller-buyer-request-img.png" alt="Folder Icon">
                    </div>
                    <div class="request-info">
                        <h3 class="request-title">Hotel Application Mobile App..</h3>
                        <p class="request-des">PHP, Mobile App Development...</p>
                        <div class="rate-date-nitin-seller">
                            <p class="request-price">$30 - 250 USD</p>
                            <p class="request-time">August, 28, 2024</p>
                        </div>
                    </div>
                </div>

                <div class="request-card">
                    <div class="icon">
                        <img src="images/seller-buyer-request-img.png" alt="Folder Icon">
                    </div>
                    <div class="request-info">
                        <h3 class="request-title">ASP.NET Developer Needed for...</h3>
                        <p class="request-des">.NET, C# Programming, ASP.NET...</p>
                        <div class="rate-date-nitin-seller">
                            <p class="request-price">$30 - 250 USD</p>
                            <p class="request-time">August, 28, 2024</p>
                        </div>
                    </div>
                </div>

                <div class="request-card">
                    <div class="icon">
                        <img src="images/seller-buyer-request-img.png" alt="Folder Icon">
                    </div>
                    <div class="request-info">
                        <h3 class="request-title">All-in-One Web & Mobile Sales..</h3>
                        <p class="request-des">PHP, Website Design, Software....</p>
                        <div class="rate-date-nitin-seller">
                            <p class="request-price">$30 - 250 USD</p>
                            <p class="request-time">August, 28, 2024</p>
                        </div>
                    </div>
                </div>
            </div>







            <nav id="pagination-buyer-requests-ajax" aria-label="Active request navigation">
            </nav>
        </div>
    </div>
    <div id="sent-offers" class="tab-pane fade <?= $activetab == "offers" ? "show active" : "" ?>">
        <div class="table-responsive box-table box-shadow-rdpy">
            <h3 class="ml-2 mt-3 mb-3 font-size-4 text-align-center padding"> OFFERS SUBMITTED </h3>
            <table class="table table-bordered buyerrequesttbl-nitin" id="offerSentTbl">
                <thead>
                    <tr>
                        <th class="font-size-th">Request</th>
                        <th class="font-size-th width_10">Duration</th>
                        <th class="font-size-th width_10">Price</th>
                        <th class="font-size-th">Your Request</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="table-info">
                        <td colspan="4">
                            data fetching...
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="offer-list offer-submitted-nitin">
                <div class="offer-card offer-submitted-nitin">
                    <div class="offer-icon offer-submitted-nitin">
                        <img src="images/seller-buyer-request-img.png" alt="Folder Icon">
                    </div>
                    <div class="offer-info offer-submitted-nitin">
                        <h3 class="offer-title offer-submitted-nitin">Amazon Sales Growth Expert for...</h3>
                        <p class="offer-des offer-submitted-nitin">Amazon FBA, Internet Marketing...</p>
                        <div class="rate-date offer-submitted-nitin">
                            <p class="offer-price offer-submitted-nitin">$30 - 250 USD</p>
                            <p class="offer-duration offer-submitted-nitin">Duration: <span class="duration-weeks">2 weeks</span></p>
                        </div>
                    </div>
                </div>

                <div class="offer-card offer-submitted-nitin">
                    <div class="offer-icon offer-submitted-nitin">
                        <img src="images/seller-buyer-request-img.png" alt="Folder Icon">
                    </div>
                    <div class="offer-info offer-submitted-nitin">
                        <h3 class="offer-title offer-submitted-nitin">Hotel Application Mobile App..</h3>
                        <p class="offer-des offer-submitted-nitin">PHP, Mobile App Development...</p>
                        <div class="rate-date offer-submitted-nitin">
                            <p class="offer-price offer-submitted-nitin">$30 - 250 USD</p>
                            <p class="offer-duration offer-submitted-nitin">Duration: <span class="duration-weeks">2 weeks</span></p>

                        </div>
                    </div>
                </div>

                <div class="offer-card offer-submitted-nitin">
                    <div class="offer-icon offer-submitted-nitin">
                        <img src="images/seller-buyer-request-img.png" alt="Folder Icon">
                    </div>
                    <div class="offer-info offer-submitted-nitin">
                        <h3 class="offer-title offer-submitted-nitin">ASP.NET Developer Needed for...</h3>
                        <p class="offer-des offer-submitted-nitin">.NET, C# Programming, ASP.NET...</p>
                        <div class="rate-date offer-submitted-nitin">
                            <p class="offer-price offer-submitted-nitin">$30 - 250 USD</p>
                            <p class="offer-duration offer-submitted-nitin">Duration: <span class="duration-weeks">2 weeks</span></p>

                        </div>
                    </div>
                </div>

                <div class="offer-card offer-submitted-nitin">
                    <div class="offer-icon offer-submitted-nitin">
                        <img src="images/seller-buyer-request-img.png" alt="Folder Icon">
                    </div>
                    <div class="offer-info offer-submitted-nitin">
                        <h3 class="offer-title offer-submitted-nitin">All-in-One Web & Mobile Sales..</h3>
                        <p class="offer-des offer-submitted-nitin">PHP, Website Design, Software....</p>
                        <div class="rate-date offer-submitted-nitin">
                            <p class="offer-price offer-submitted-nitin">$30 - 250 USD</p>
                            <p class="offer-duration offer-submitted-nitin">Duration: <span class="duration-weeks">2 weeks</span></p>

                        </div>
                    </div>
                </div>
            </div>




            <nav id="pagination-buyer-offer-sent" aria-label="buyer offer send navigation">
            </nav>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        var buyerReqs = function(userId, catId, limit, page = 1, search = null) {
            return $.ajax({
                url: "<?= $site_url ?>/requests/load_category_data",
                dataType: "json",
                method: "POST",
                data: {
                    user_id: userId,
                    child_id: catId,
                    limit,
                    page,
                    search,
                }
            }).done(function(data) {
                $('body #buyerRequestsTbl tbody').html(data.data);
                $('body #pagination-buyer-requests-ajax').html(data.pagination);
                $('body #activeReqSpan').html(data.total);
                $('body #wait').removeClass("loader");
            });
        }
        buyerReqs(<?= $login_seller_id ?>, 'all', 5);

        //executes code below when user click on pagination links
        $("body #pagination-buyer-requests-ajax").on("click", ".pagination a", function(e) {
            e.preventDefault();
            var page = $(this).attr("data-page"); //get page number from link
            $('body #wait').addClass("loader");
            var cat_id = $("#sub-category option:selected").val();
            var search = $("#search-input").val();
            buyerReqs(<?= $login_seller_id ?>, cat_id, 5, page, search);
        })

        $(document).on("click", '.remove_request', function(event) {
            event.preventDefault();
            if (confirm('Are are you sure want to remove this?')) {
                var id = $(this).data('remove-id');
                $("#request_tr_" + id).fadeOut().remove();
            }
        });
        $(document).on("click", '.send_button', function(event) {
            event.preventDefault();
            var sentId = $(this).data('send-id')
            if (sentId == 0) {
                $('#quota-finish').modal()
            } else {
                $.ajax({
                        method: "POST",
                        url: "<?= $site_url ?>/requests/send_offer_modal",
                        data: {
                            request_id: sentId
                        }
                    })
                    .done(function(data) {
                        $(".append-modal").html(data);
                    });
            }
        });

        var buyerOfferSent = function(userId, limit, page = 1) {
            return $.ajax({
                url: "<?= $site_url ?>/ajax/offer_sent",
                dataType: "json",
                method: "POST",
                data: {
                    user_id: userId,
                    limit,
                    page,
                }
            }).done(function(data) {
                $('body #offerSentTbl tbody').html(data.data);
                $('body #pagination-buyer-offer-sent').html(data.pagination);
                $('body #wait').removeClass("loader");
            });
        }
        buyerOfferSent(<?= $login_seller_id ?>, 5);

        //executes code below when user click on pagination links
        $("body #pagination-buyer-offer-sent").on("click", ".pagination a", function(e) {
            e.preventDefault();
            var page = $(this).attr("data-page"); //get page number from link
            $('body #wait').addClass("loader");
            buyerOfferSent(<?= $login_seller_id ?>, 5, page);
        })

        $('#sub-category').change(function() {
            var child_id = $(this).val();
            $('body #wait').addClass("loader");
            buyerReqs(<?= $login_seller_id ?>, child_id, 5);
        });

        $('#req-search').click(function(e) {
            e.preventDefault();

            var search = $("#search-input").val();
            $('body #wait').addClass("loader");
            var cat_id = $("#sub-category option:selected").val();
            buyerReqs(<?= $login_seller_id ?>, cat_id, 5, 1, search);
        });

        $(document).on("click", '.withdrawOffer', function(event) {
            event.preventDefault();
            if (confirm('Are are you sure want to withdraw this?')) {
                var id = $(this).data('id');
                var tableRow = $(this).closest('tr');
                $('body #wait').addClass("loader");
                $.ajax({
                    url: "<?= $site_url ?>/ajax/remove-data",
                    dataType: "json",
                    method: "POST",
                    data: {
                        id,
                        action: 'offer-sent',
                    }
                }).done(function(data) {
                    $('body #wait').removeClass("loader");
                    tableRow.find('td').fadeOut('fast',
                        function() {
                            tableRow.fadeOut().remove();
                        }
                    );
                });
            }
        });
    })
</script>