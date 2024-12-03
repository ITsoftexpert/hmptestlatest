<div class="order-card">
    <div class="order-content">
        <div class="order-text">
            <h3 class="manage-req-heading-main">Expert nnnnnn in CSS and HTML: Crafting Responsive and Accessible Web Designs</h3>
            <div class="order-info">
                <div class="info-container">
                    <div class="info-item">
                        <i class="fa-solid fa-basket-shopping"></i> <?= $count_orders; ?>
                        <span class="heading">Orders</span>
                    </div>
                    <div class="info-item">
                        <i class="fa-solid fa-eye"></i> <?= $proposal_views; ?>
                        <span class="heading">Views</span>
                    </div>
                    <div class="info-item">
                        <i class="fa-solid fa-sack-dollar"></i> <?= showPrice($proposal_price); ?>
                        <span class="heading">Proposal's Price</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="order-status">
        <span class="Order-Status-textmain">Actions</span>
        <div class="custom-dropdown">
            <button class="custom-dropdown-button">
                <i class="fa-solid fa-caret-down"></i>
            </button>
            <div class="custom-dropdown-content">
                <a href="<?= $site_url; ?>/proposals/delete_proposal?proposal_id=<?= $proposal_id; ?>" onclick="return confirm('Are you sure you want to delete this proposal?')">Delete</a>
            </div>
        </div>
    </div>
</div>