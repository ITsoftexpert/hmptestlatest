<style>
   .heading-41 {
      font-size: 20px;
      text-align: center;
      padding: 4px 0px;
      /* color:#045e5d; */
   }

   @media(max-width:767px) {
      .heading-41 {
         font-size: 16px;
         text-align: center;
      }

      .mobile_view_seller_contact {
         display: block;
      }

     

      .desktop_view_seller_contact {
         display: none;
      }
   }

   @media(min-width:768px) {
      .mobile_view_seller_contact {
         display: none;
      }

      .desktop_view_seller_contact {
         display: block;
      }
   }

   .font-size-3 {
      padding: 13px !important;
      text-align: center;
      /* box-shadow: 0px 0px 5px black, inset 0px 0px 15px #00c8d4; */
      /* border:1px solid lightgray !important; */
   }

   .new-slider-container {
      position: relative;
      width: 100%;
      overflow: hidden;
      /* Hide overflow */
   }

   .newSlider {
      /* display: flex; */
      transition: transform 0.5s ease;
      /* Smooth transition */
      width: calc(100% * number_of_cards);
      /* Set total width based on number of cards */
   }

   .w-21 {
      width: 21%;
   }

   .view-all-btn-style-seller {
      margin-top: 2rem;
      border: 1px solid lightgray;
      padding: 1rem;
      text-align: center;
      border-radius: 5px;
   }

   .view-all-btn-style-seller button {
      border: none;
      background-color: #00cdce;
      padding: 0.7rem 2rem;
      color: white;
      border-radius: 3px;
   }
</style>

<div class=" box-table box-shadow-table41">
   <h4 class="heading-41 box-shadow-heading-41 hide-on-mobile">
      <?= $lang['manage_contacts']['my_buyers']; ?>
   </h4>

   <table class="table table-bordered mt-3 sellers-from-whom desktop_view_seller_contact">
      <!-- table table-hover Starts -->
      <thead>
         <tr class="w-100">
            <th class="font-size-3 w-21"><?= $lang['th']['buyer_name']; ?></th>
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
            } //incase of invalid page number
         } else {
            $pageNumber = 1; //if there's no page number, set it to 1
         }
         $start_from =  (($pageNumber - 1) * $limit);
         $where_limit = " order by id DESC LIMIT $start_from, $limit";

         $sel_my_buyers_page =  $db->query("SELECT * FROM my_buyers WHERE seller_id=:seller_id", array("seller_id" => $login_seller_id));
         $totalRows = $sel_my_buyers_page->rowCount();
         $row_my_buyers_page = $sel_my_buyers_page->fetch();

         //break records into pages
         $totalPages = ceil($totalRows / $limit);
         if ($totalRows > 0) {
            $sel_my_buyers =  $db->query("SELECT * FROM my_buyers WHERE seller_id=:seller_id $where_limit", array("seller_id" => $login_seller_id));

            while ($row_my_buyers = $sel_my_buyers->fetch()) {
               $buyer_id = $row_my_buyers->buyer_id;
               $completed_orders = $row_my_buyers->completed_orders;
               $amount_spent = $row_my_buyers->amount_spent;
               $last_order_date = $row_my_buyers->last_order_date;
               $select_buyer = $db->select("sellers", array("seller_id" => $buyer_id));
               $row_buyer = $select_buyer->fetch();
               $buyer_user_name = $row_buyer->seller_user_name;
               $buyer_image = getImageUrl2("sellers", "seller_image", $row_buyer->seller_image);
         ?>
               <tr>
                  <td>
                     <?php if (!empty($buyer_image)) { ?>
                        <img src="<?= $buyer_image; ?>" class="rounded-circle contact-image">
                     <?php } else { ?>
                        <img src="user_images/empty-image.png" class="rounded-circle contact-image">
                     <?php } ?>
                     <div class="contact-title">
                        <h6> <?= $buyer_user_name; ?> </h6>
                        <a href="<?= $buyer_user_name; ?>" target="blank" class="text-success"> User Profile </a> |
                        <a href="buying_history?buyer_id=<?= $buyer_id; ?>" class="text-success"> History </a>
                     </div>
                  </td>
                  <td class="text-center"><?= $completed_orders; ?></td>
                  <td class="text-center"><?= showPrice($amount_spent); ?></td>
                  <td class="text-center">
                     <?= $last_order_date; ?>
                  </td>
                  <td class="text-center">
                     <a href="conversations/message?seller_id=<?= $buyer_id; ?>" target="blank" class="btn btn-success">
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
                     <h3 class='pb-4 pt-4 heading-3'>
                        <i class='fa fa-meh-o'></i> <?= $lang['manage_contacts']['no_buyers'] ?>
                     </h3>
                  </center>
               </td>
            </tr>
         <?php } ?>
      </tbody>
   </table>



   <div class="new-slider-container mb-3 mobile_view_seller_contact">
      <div class="newSlider">
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

         $sel_my_buyers_page = $db->query("SELECT * FROM my_buyers WHERE seller_id=:seller_id", array("seller_id" => $login_seller_id));
         $totalRows = $sel_my_buyers_page->rowCount();

         if ($totalRows > 0) {
            $sel_my_buyers = $db->query("SELECT * FROM my_buyers WHERE seller_id=:seller_id $where_limit", array("seller_id" => $login_seller_id));
            while ($row_my_buyers = $sel_my_buyers->fetch()) {
               $buyer_id = $row_my_buyers->buyer_id;
               $completed_orders = $row_my_buyers->completed_orders;
               $amount_spent = $row_my_buyers->amount_spent;
               $last_order_date = $row_my_buyers->last_order_date;
               $select_buyer = $db->select("sellers", array("seller_id" => $buyer_id));
               $row_buyer = $select_buyer->fetch();
               $buyer_user_name = $row_buyer->seller_user_name;
               $buyer_image = getImageUrl2("sellers", "seller_image", $row_buyer->seller_image);
         ?>
               <div class="freelancer-card">
                  <div class="freelancer-header">
                     <img src="<?= !empty($buyer_image) ? $buyer_image : 'user_images/empty-image.png'; ?>" alt="Profile Image" class="rounded-circle contact-image">
                     <div class="freelancer-info">
                        <h4><?= $buyer_user_name; ?></h4>
                        <a class="user-pro" href="<?= $buyer_user_name; ?>" target="_blank">User Profile</a> |
                        <a class="user-pro" href="buying_history?buyer_id=<?= $buyer_id; ?>">History</a>
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
                     <div class="price"><span class="amount-spent-buyer">Amount Spent: </span><?= showPrice($amount_spent); ?></div>
                     <a href="conversations/message?seller_id=<?= $buyer_id; ?>" target="_blank" class="chat-iconbuyer">
                        <div class="message-icon"><i class="fa fa-comment"></i></div>
                     </a>
                  </div>
               </div>

               <div class="w-100 view-all-btn-style-seller"><button>View All</button></div>
            <?php
            }
         } else {
            ?>
            <div class="freelancer-card">
               <center>
                  <h3 class='pb-4 pt-4 heading-3'>
                     <i class='fa fa-meh-o'></i> <?= $lang['manage_contacts']['no_buyers'] ?>
                  </h3>
               </center>
            </div>
         <?php } ?>
      </div>
   </div>

   <nav id="pagination-seller-contacts" aria-label="Active request navigation">
      <?= pagination($limit, $pageNumber, $totalRows, $totalPages, $site_url . "/manage_contacts?page="); ?>
   </nav>
</div>