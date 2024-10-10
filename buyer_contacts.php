  <style>
     @media (max-width:768px) {
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
     }


     .freelancer-card {
        max-width: 330px;
        border: 1px solid #ccc;
        border-radius: 10px;
        background-color: white;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        padding: 15px;
        margin: 0 auto;
        overflow: hidden;
     }

     .freelancer-header {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
        position: relative;
     }

     .freelancer-header img {
        border-radius: 50%;
        width: 70px;
        height: 70px;
        object-fit: cover;
        border: 3px solid #a7a9ac;
        margin-right: 15px;
     }

     .freelancer-header .status {
        position: absolute;
        left: 48px;
        top: 48px;
        width: 10px;
        height: 10px;
        background-color: green;
        border-radius: 50%;
        border: 2px solid white;
     }

     .freelancer-header .heart-icon {
        position: absolute;
        right: 0;
        top: 0;
        cursor: pointer;
     }

     .freelancer-header .freelancer-info {
        flex-grow: 1;
     }

     .freelancer-info h4 {
        margin: 0;
     }

     .freelancer-info p {
        margin: 2px 0;
        color: #666;
        font-size: 14px;
     }

     .user-pro {
        color: #666;
     }

     .tags {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
        margin: 10px 0;
     }

     .tag {
        background-color: #f1f1f1;
        padding: 6px 12px;
        border-radius: 15px;
        font-size: 12px;
     }

     .freelancer-image {
        margin-top: 10px;
     }

     .freelancer-image img {
        width: 100%;
        height: 170px;
        border-radius: 8px;
        object-fit: cover;
     }

     .price-section {
        display: flex;
        justify-content: space-between;
        border-top: 1px solid #e0e0e0;

        align-items: center;
        margin-top: 15px;
        padding: 7px 5px 0px 5px;
     }

     .price-section .price {
        font-size: 16px;
        font-weight: bold;
     }

     .profile-btn {
        background-color: #00b9f5;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 14px;
        font-weight: bold;
        transition: background-color 0.3s;
     }

     .profile-btn:hover {
        background-color: #008ecf;
     }

     .message-icon {
        background-color: #00cedc;
        border-radius: 20%;
        color: #fff;
        padding: 5px 10px 5px 10px;
        cursor: pointer;
     }

     .amount-spent-buyernitin {
        color: #a7a9ac;
     }

     .completed-orders-container {
        position: relative;
        display: inline-block;
     }

     .complete-order-badge {
        position: absolute;
        width: 20px;
        height: 20px;
        top: -10px;
        /* Adjust according to your design */
        right: -3px;
        /* Adjust according to your design */
        background-color: #00b9f5;
        color: white;
        border-radius: 50%;
        padding: 2px 7px;
        font-size: 12px;
        font-weight: bold;
     }

     /* .tag {
        font-size: 16px;
        font-weight: normal;
        padding: 10px;
        background-color: #f0f0f0;
        border-radius: 5px;
        display: inline-block;
     } */
     /* Hide on mobile (screen width less than 768px) */
     @media only screen and (max-width: 768px) {
        .sellers-from-whom {
           display: none;
        }
     }

     @media only screen and (min-width: 1024px) {
        .freelancer-card {
           display: none;
        }
     }

     .whom-slider-container {
        position: relative;
        width: 100%;
        overflow: hidden;
        /* Hide overflow */
     }

     .whomslider {
        display: flex;
        transition: transform 0.5s ease;
        /* Smooth transition */
        width: calc(100% * number_of_cards);
        /* Set total width based on number of cards */
     }

     .freelancer-card {
        min-width: 100%;
        /* Show one card at a time */
        box-sizing: border-box;
        padding: 10px;
        /* Add some padding */
     }

     /* Additional styles for your card here */

     .info-item {
        position: relative;
        cursor: pointer;
     }

     /* Hidden heading initially */
     .info-item .heading {
        position: absolute;
        bottom: 120%;
        left: 50%;
        transform: translateX(-50%);
        padding: 5px 10px;
        background-color: rgba(0, 0, 0, 0.8);
        color: white;
        font-size: 14px;
        border-radius: 5px;
        opacity: 0;
        pointer-events: none;
        transition: all 0.4s ease;
        white-space: nowrap;
     }

     /* Show heading on hover */
     .info-item:hover .heading {
        opacity: 1;
        bottom: 100%;
     }

     .chat-iconbuyer {
        cursor: pointer;
     }

     .manage-contacts-btn {
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


     @media (min-width: 1024px) {

        /* Aap is value ko apni zarurat ke hisaab se badal sakte hain */
        .manage-contacts-btn {
           display: none;
        }
     }
  </style>

  <div class=" box-table box-shadow-box-table">
     <button class="manage-contacts-btn mt-4 mb-4">Manage Contacts
     </button>
     <!-- <h4 class="heading-41 text-align-center "> <?= $lang['manage_contacts']['my_sellers']; ?> </h4> -->
     <table class="table table-bordered mt-3 sellers-from-whom">
        <thead>
           <tr>
              <th class="font-size-3"><?= $lang['th']['seller_name']; ?></th>

              <th class="font-size-3"><?= $lang['th']['completed_orders']; ?></th>
              <th class="font-size-3"><?= $lang['th']['amount_spent']; ?></th>
              <th class="font-size-3"><?= $lang['th']['last_order_date']; ?></th>
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
                    <td><?= $completed_orders; ?></td>
                    <td><?= showPrice($amount_spent); ?></td>
                    <td>
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


     <div class="whom-slider-container mb-3">
        <div class="whomslider owl-carousel">
           <div class="freelancer-card">
              <div class="freelancer-header">
                 <img src="https://media.istockphoto.com/id/1285124274/photo/middle-age-man-portrait.webp?a=1&b=1&s=612x612&w=0&k=20&c=wQTkPBW1rlfaFAkKanmLbpmEtiWWVH33UkndM1ib1-o=" alt="Profile Image">
                 <div class="freelancer-info">
                    <h4>Nitin Kumar</h4>
                    <a class="user-pro" href="">User Profile</a> |
                    <a class="user-pro" href="">History</a>
                 </div>
              </div>
              <div class="tags">
                 <div class="completed-orders-container">
                    <span class="complete-order-badge">5</span>
                    <div class="tag">Completed Orders</div>
                 </div>
                 <div class="info-item">
                    <div class="tag">July 10, 2024</div>
                    <span class="heading">Last Order Date</span>
                 </div>
              </div>
              <div class="freelancer-image">
                 <img src="https://images.unsplash.com/photo-1508317469940-e3de49ba902e?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8c2tpbGx8ZW58MHx8MHx8fDA%3D" alt="Project Image">
              </div>
              <div class="price-section">
                 <div class="price"><span class="amount-spent-buyernitin">Amount Spent: </span> $78.00</div>
                 <a href="#" class="chat-iconbuyer">
                    <div class="message-icon"><i class="fa fa-comment"></i></div>
                 </a>
              </div>
           </div>

           <!-- Add more freelancer cards here -->
           <div class="freelancer-card">
              <div class="freelancer-header">
                 <img src="https://media.istockphoto.com/id/1285124274/photo/middle-age-man-portrait.webp?a=1&b=1&s=612x612&w=0&k=20&c=wQTkPBW1rlfaFAkKanmLbpmEtiWWVH33UkndM1ib1-o=" alt="Profile Image">
                 <div class="freelancer-info">
                    <h4>Anuranjan</h4>
                    <a class="user-pro" href="">User Profile</a> |
                    <a class="user-pro" href="">History</a>
                 </div>
              </div>
              <div class="tags">
                 <div class="completed-orders-container">
                    <span class="complete-order-badge">5</span>
                    <div class="tag">Completed Orders</div>
                 </div>
                 <div class="info-item">
                    <div class="tag">July 10, 2024</div>
                    <span class="heading">Last Order Date</span>
                 </div>
              </div>
              <div class="freelancer-image">
                 <img src="https://media.istockphoto.com/id/2168660389/photo/young-professionals-collaborating-in-a-modern-office-environment.webp?a=1&b=1&s=612x612&w=0&k=20&c=Iu9fmYb8dRUg-u5DYoIkhWUrXq4bdse0Id7P8VGIcSs=" alt="Project Image">
              </div>
              <div class="price-section">
                 <div class="price"><span class="amount-spent-buyernitin">Amount Spent: </span> $78.00</div>
                 <div class="message-icon"><i class="fa fa-comment"></i></div>
              </div>
           </div>

           <div class="freelancer-card">
              <div class="freelancer-header">
                 <img src="https://media.istockphoto.com/id/1285124274/photo/middle-age-man-portrait.webp?a=1&b=1&s=612x612&w=0&k=20&c=wQTkPBW1rlfaFAkKanmLbpmEtiWWVH33UkndM1ib1-o=" alt="Profile Image">
                 <div class="freelancer-info">
                    <h4>Priyanshu</h4>
                    <a class="user-pro" href="">User Profile</a> |
                    <a class="user-pro" href="">History</a>
                 </div>
              </div>
              <div class="tags">
                 <div class="completed-orders-container">
                    <span class="complete-order-badge">5</span>
                    <div class="tag">Completed Orders</div>
                 </div>
                 <div class="info-item">
                    <div class="tag">July 10, 2024</div>
                    <span class="heading">Last Order Date</span>
                 </div>
              </div>
              <div class="freelancer-image">
                 <img src="https://images.unsplash.com/photo-1631624210938-539575f92e3c?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8c29mdHdhcmUlMjBkZXZlbG9wbWVudHxlbnwwfHwwfHx8MA%3D%3D" alt="Project Image">
              </div>
              <div class="price-section">
                 <div class="price"><span class="amount-spent-buyernitin">Amount Spent: </span> $78.00</div>
                 <a href="#">
                    <div class="message-icon"><i class="fa fa-comment"></i></div>
                 </a>
              </div>
           </div>

           <div class="freelancer-card">
              <div class="freelancer-header">
                 <img src="https://media.istockphoto.com/id/1285124274/photo/middle-age-man-portrait.webp?a=1&b=1&s=612x612&w=0&k=20&c=wQTkPBW1rlfaFAkKanmLbpmEtiWWVH33UkndM1ib1-o=" alt="Profile Image">
                 <div class="freelancer-info">
                    <h4>Parmanshu</h4>
                    <a class="user-pro" href="">User Profile</a> |
                    <a class="user-pro" href="">History</a>
                 </div>
              </div>
              <div class="tags">
                 <div class="completed-orders-container">
                    <span class="complete-order-badge">5</span>
                    <div class="tag">Completed Orders</div>
                 </div>
                 <div class="info-item">
                    <div class="tag">July 10, 2024</div>
                    <span class="heading">Last Order Date</span>
                 </div>
              </div>
              <div class="freelancer-image">
                 <img src="https://images.unsplash.com/photo-1581092580497-e0d23cbdf1dc?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OHx8c29mdHdhcmV8ZW58MHx8MHx8fDA%3D" alt="Project Image">
              </div>
              <div class="price-section">
                 <div class="price"><span class="amount-spent-buyernitin">Amount Spent: </span> $78.00</div>
                 <div class="message-icon"><i class="fa fa-comment"></i></div>
              </div>
           </div>
           <!-- Repeat for more cards -->
        </div>
        <button class="prev d-none" onclick="moveSlide(-1)">❮</button>
        <button class="next d-none" onclick="moveSlide(1)">❯</button>
     </div>


     <script>
        $(document).ready(function() {
           $(".whomslider").owlCarousel({
              loop: true, // Set to true for autoplay to work continuously
              margin: 10,
              autoplay: true, // Enable autoplay
              autoplayTimeout: 5000, // Time between transitions in milliseconds
              autoplayHoverPause: true, // Pause on hover
              responsive: {
                 0: {
                    items: 1
                 },
                 640: {
                    items: 2
                 },
                 960: {
                    items: 3
                 },
                 1200: {
                    items: 4
                 }
              }
           });
        });
     </script>


     <nav id="pagination-buyer-contacts" aria-label="Active request navigation">
        <?= pagination($limit, $pageNumber, $totalRows, $totalPages, $site_url . "/manage_contacts?my_sellers&page="); ?>
     </nav>
  </div>