<link rel="stylesheet" href="styles/addnew.css">
<style>
   @media (max-width:767px) {
      .heading_4 {
         font-size: 16px;
      }

      .font-size-3 {
         padding: 10px !important;
         text-align: center;
         /* border:1px solid lightgray !important; */
      }

      .heading-41 {
         font-size: 16px;
         text-align: center;
      }

      .desktop_view_only_buyer {
         display: none;
      }

      .mobile_view_only_buyer {
         display: block;
      }
   }

   @media (min-width:768px) {
      .heading_4 {
         font-size: 20px;
         text-align: center;
         /* padding: 25px 0px; */
         /* height:65px; */
         /* box-shadow:0px 0px 5px black, inset 0px 0px 25px #00c8d4; */
      }

      .heading-41 {
         font-size: 20px;
         text-align: center;
         padding: 4px 0px;
         /* color:#045e5d; */
      }

      .font-size-3 {
         padding: 13px !important;
         text-align: center;
         /* border:1px solid lightgray !important; */
      }

      .desktop_view_only_buyer {
         display: block;
      }

      .mobile_view_only_buyer {
         display: none;
      }
   }

   .view-all-btn-style-buyer {
      margin-top: 2rem;
      border: 1px solid lightgray;
      padding: 1rem;
      text-align: center;
      border-radius: 5px;
   }

   .view-all-btn-style-buyer button {
      border: none;
      background-color: #00cdce;
      padding: 0.7rem 2rem;
      color: white;
      border-radius: 3px;
   }

   .w-21 {
      width: 21%;
   }
</style>

<div class=" box-table box-shadow-box-table">
   <!-- <h4 class="heading-41 text-align-center "> <?= $lang['manage_contacts']['my_sellers']; ?> </h4> -->
   <table class="table table-bordered mt-3 sellers-from-whom desktop_view_only_buyer">
      <thead>
         <tr class="w-100">
            <th class="font-size-3 w-21"><?= $lang['th']['seller_name']; ?></th>
            <th class="font-size-3"><?= $lang['th']['completed_orders']; ?></th>
            <th class="font-size-3"><?= $lang['th']['amount_spent']; ?></th>
            <th class="font-size-3"><?= $lang['th']['last_order_date']; ?></th>
            <th class="font-size-3">Chat</th>
         </tr>
      </thead>
      <tbody>
         <?php
         $limit = 10;
         if (isset($_GET["page"])) {
            $pageNumber = filter_var($_GET["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
            if (!is_numeric($pageNumber)) {
               die('Invalid page number!');
            }
         } else {
            $pageNumber = 1;
         }
         $start_from =  (($pageNumber - 1) * $limit);
         $where_limit = " order by id DESC LIMIT $start_from, $limit";

         $sel_my_sellers_page =  $db->query("SELECT * FROM my_sellers WHERE buyer_id=:buyer_id", array("buyer_id" => $login_seller_id));
         $totalRows = $sel_my_sellers_page->rowCount();
         $row_my_sellers_page = $sel_my_sellers_page->fetch();


         $totalPages = ceil($totalRows / $limit);
         if ($totalRows > 0) {
            $sel_my_sellers =  $db->query("SELECT * FROM my_sellers WHERE buyer_id=:buyer_id $where_limit", array("buyer_id" => $login_seller_id));

            while ($row_my_sellers = $sel_my_sellers->fetch()) {
               $seller_id = $row_my_sellers->seller_id;
               $completed_orders = $row_my_sellers->completed_orders;
               $amount_spent = $row_my_sellers->amount_spent;
               $last_order_date = $row_my_sellers->last_order_date;
               $select_seller = $db->select("sellers", array("seller_id" => $seller_id));
               $row_seller = $select_seller->fetch();
               $seller_image = getImageUrl2("sellers", "seller_image", @$row_seller->seller_image);
               $seller_user_name = @$row_seller->seller_user_name;
         ?>
               <tr>
                  <td>
                     <?php if (!empty($seller_image)) { ?>
                        <img src="<?= $seller_image; ?>" class="rounded-circle contact-image">
                     <?php } else { ?>
                        <img src="user_images/empty-image.png" class="rounded-circle contact-image">
                     <?php } ?>
                     <div class="contact-title">
                        <h6> <?= $seller_user_name; ?> </h6>
                        <a href="<?= $seller_user_name; ?>" target="blank" class="text-success"> User Profile </a> |
                        <a href="selling_history?seller_id=<?= $seller_id; ?>" target="blank" class="text-success"> History </a>
                     </div>
                  </td>
                  <td class="text-center"><?= $completed_orders; ?></td>
                  <td class="text-center"><?= showPrice($amount_spent); ?></td>
                  <td class="text-center">
                     <?= $last_order_date; ?>
                  </td>
                  <td class="text-center">
                     <a href="conversations/message?seller_id=<?= $seller_id; ?>" target="blank" class="btn btn-success">
                        <i class="fa fa-comment"></i>
                     </a>
                  </td>
               </tr>
            <?php
            }
         } else {
            ?>
            <tr class="table-danger">
               <td colspan="5" class="box-shadow-head3">
                  <center>
                     <h3 class='pb-4 pt-4 heading_3'>
                        <i class='fa fa-meh-o'></i> <?= $lang['manage_contacts']['no_sellers'] ?>
                     </h3>
                  </center>
               </td>
            </tr>
         <?php } ?>
      </tbody>
   </table>


   <div class="whom-slider-container mb-3 mobile_view_only_buyer">
      <div class="whomslider owl-carousel">
         <?php
         $limit = 10;
         if (isset($_GET["page"])) {
            $pageNumber = filter_var($_GET["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
            if (!is_numeric($pageNumber)) {
               die('Invalid page number!');
            }
         } else {
            $pageNumber = 1;
         }
         $start_from = (($pageNumber - 1) * $limit);
         $where_limit = " ORDER BY id DESC LIMIT $start_from, $limit";

         $sel_my_sellers_page = $db->query("SELECT * FROM my_sellers WHERE buyer_id=:buyer_id", array("buyer_id" => $login_seller_id));
         $totalRows = $sel_my_sellers_page->rowCount();

         if ($totalRows > 0) {
            $sel_my_sellers = $db->query("SELECT * FROM my_sellers WHERE buyer_id=:buyer_id $where_limit", array("buyer_id" => $login_seller_id));
            while ($row_my_sellers = $sel_my_sellers->fetch()) {
               $seller_id = $row_my_sellers->seller_id;
               $completed_orders = $row_my_sellers->completed_orders;
               $amount_spent = $row_my_sellers->amount_spent;
               $last_order_date = $row_my_sellers->last_order_date;
               $select_seller = $db->select("sellers", array("seller_id" => $seller_id));
               $row_seller = $select_seller->fetch();
               $seller_image = getImageUrl2("sellers", "seller_image", @$row_seller->seller_image);
               $seller_user_name = @$row_seller->seller_user_name;
         ?>
               <div class="freelancer-card">
                  <div class="freelancer-header">
                     <img src="<?= !empty($seller_image) ? $seller_image : 'user_images/empty-image.png'; ?>" alt="Profile Image" class="rounded-circle contact-image">
                     <div class="freelancer-info">
                        <h4><?= $seller_user_name; ?></h4>
                        <a class="user-pro" href="<?= $seller_user_name; ?>" target="_blank">User Profile</a> |
                        <a class="user-pro" href="selling_history?seller_id=<?= $seller_id; ?>" target="_blank">History</a>
                     </div>
                  </div>
                  <div class="tags">
                     <div class="completed-orders-container">
                        <span class="complete-order-badge"><?= $completed_orders; ?></span>
                        <div class="tag">Completed Orders</div>
                     </div>
                     <div class="info-item">
                        <div class="tag"><?= $last_order_date; ?></div>
                        <span class="heading">Last Order Date</span>
                     </div>
                  </div>
                  <div class="price-section">
                     <div class="price"><span class="amount-spent-buyerbluff">Amount Spent: </span><?= showPrice($amount_spent); ?></div>
                     <a href="conversations/message?seller_id=<?= $seller_id; ?>" target="_blank" class="chat-iconbuyer">
                        <div class="message-icon"><i class="fa fa-comment"></i></div>
                     </a>
                  </div>
               </div>
               <div class="w-100 view-all-btn-style-buyer"><button>View All</button></div>
            <?php
            }
         } else {
            ?>
            <div class="freelancer-card">
               <center>
                  <h3 class='pb-4 pt-4 heading_3'>
                     <i class='fa fa-meh-o'></i> <?= $lang['manage_contacts']['no_sellers'] ?>
                  </h3>
               </center>
            </div>
         <?php } ?>
      </div>
   </div>




   <nav id="pagination-buyer-contacts" aria-label="Active request navigation">
      <?= pagination($limit, $pageNumber, $totalRows, $totalPages, $site_url . "/manage_contacts?my_sellers&page="); ?>
   </nav>
</div>