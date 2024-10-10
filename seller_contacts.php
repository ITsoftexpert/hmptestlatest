<style>
   .heading-41 {
      font-size: 20px;
      text-align: center;
      padding: 4px 0px;
      /* color:#045e5d; */
   }

   @media(max-width:768px) {
      .heading-41 {
         font-size: 16px;
         text-align: center;
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
      display: flex;
      transition: transform 0.5s ease;
      /* Smooth transition */
      width: calc(100% * number_of_cards);
      /* Set total width based on number of cards */
   }

   @media (max-width: 768px) {

      /* Adjust the width as needed */
      .hide-on-mobile {
         display: none;
      }
   }
</style>

<div class=" box-table box-shadow-table41">
   <h4 class="heading-41 box-shadow-heading-41 hide-on-mobile">
      <?= $lang['manage_contacts']['my_buyers']; ?>
   </h4>

   <table class="table table-bordered mt-3 sellers-from-whom">
      <!-- table table-hover Starts -->
      <thead>
         <tr>
            <th class="font-size-3"><?= $lang['th']['buyer_name']; ?></th>
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
                  <td><?= $completed_orders; ?></td>
                  <td><?= showPrice($amount_spent); ?></td>
                  <td>
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



   <div class="new-slider-container mb-3">
      <div class="newSlider owl-carousel">
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
                  <span class="complete-order-badge">3</span>
                  <div class="tag">Completed Orders</div>
               </div>
               <div class="info-item">
                  <div class="tag">July 09, 2024</div>
                  <span class="heading">Last Order Date</span>
               </div>
            </div>
            <div class="freelancer-image">
               <img src="https://images.unsplash.com/photo-1508317469940-e3de49ba902e?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8c2tpbGx8ZW58MHx8MHx8fDA%3D" alt="Project Image">
            </div>
            <div class="price-section">
               <div class="price"><span class="amount-spent-buyer">Amount Spent: </span> $45.00</div>
               <a href="#" class="chat-iconbuyer">
                  <div class="message-icon"><i class="fa fa-comment"></i></div>
               </a>
            </div>
         </div>


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
                  <span class="complete-order-badge">3</span>
                  <div class="tag">Completed Orders</div>
               </div>
               <div class="info-item">
                  <div class="tag">July 09, 2024</div>
                  <span class="heading">Last Order Date</span>
               </div>
            </div>
            <div class="freelancer-image">
               <img src="https://images.unsplash.com/photo-1508317469940-e3de49ba902e?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8c2tpbGx8ZW58MHx8MHx8fDA%3D" alt="Project Image">
            </div>
            <div class="price-section">
               <div class="price"><span class="amount-spent-buyer">Amount Spent: </span> $45.00</div>
               <a href="#" class="chat-iconbuyer">
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
                  <span class="complete-order-badge">3</span>
                  <div class="tag">Completed Orders</div>
               </div>
               <div class="info-item">
                  <div class="tag">July 09, 2024</div>
                  <span class="heading">Last Order Date</span>
               </div>
            </div>
            <div class="freelancer-image">
               <img src="https://images.unsplash.com/photo-1508317469940-e3de49ba902e?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8c2tpbGx8ZW58MHx8MHx8fDA%3D" alt="Project Image">
            </div>
            <div class="price-section">
               <div class="price"><span class="amount-spent-buyer">Amount Spent: </span> $45.00</div>
               <a href="#" class="chat-iconbuyer">
                  <div class="message-icon"><i class="fa fa-comment"></i></div>
               </a>
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
                  <span class="complete-order-badge">3</span>
                  <div class="tag">Completed Orders</div>
               </div>
               <div class="info-item">
                  <div class="tag">July 09, 2024</div>
                  <span class="heading">Last Order Date</span>
               </div>
            </div>
            <div class="freelancer-image">
               <img src="https://images.unsplash.com/photo-1508317469940-e3de49ba902e?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8c2tpbGx8ZW58MHx8MHx8fDA%3D" alt="Project Image">
            </div>
            <div class="price-section">
               <div class="price"><span class="amount-spent-buyer">Amount Spent: </span> $45.00</div>
               <a href="#" class="chat-iconbuyer">
                  <div class="message-icon"><i class="fa fa-comment"></i></div>
               </a>
            </div>
         </div>

         <!-- Add more freelancer cards here -->
         <!-- ... -->

      </div>
      <button class="prev d-none" onclick="moveNewSlide(-1)">❮</button>
      <button class="next d-none" onclick="moveNewSlide(1)">❯</button>
   </div>



   <script>
      $(document).ready(function() {
         $(".newSlider").owlCarousel({
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


   <!-- <script>
      let newSlideIndex = 0;

      function moveNewSlide(direction) {
         const newCards = document.querySelectorAll('.freelancer-card');
         newSlideIndex += direction;

     
         if (newSlideIndex < 0) {
            newSlideIndex = newCards.length - 1;
         } else if (newSlideIndex >= newCards.length) {
            newSlideIndex = 0;
         }

         const newSlider = document.querySelector('.newSlider');
         newSlider.style.transform = `translateX(-${newSlideIndex * 100}%)`; 
      }

     
      setInterval(() => moveNewSlide(1), 5000); 
   </script> -->



   <nav id="pagination-seller-contacts" aria-label="Active request navigation">
      <?= pagination($limit, $pageNumber, $totalRows, $totalPages, $site_url . "/manage_contacts?page="); ?>
   </nav>
</div>