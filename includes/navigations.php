<style>
  /* Basic dropdown item styling */
  .dropdown-item-again {
    padding: 10px 15px;
    /* Adjust padding for more/less space */
    color: #333;
    /* Text color */
    background-color: #fff;
    /* Background color */
    text-decoration: none;
    /* Remove underline */
    display: block;
    width: max-content;
    font-size: 14px;
    /* Font size */
    transition: background-color 0.3s ease, color 0.3s ease;
  }

  /* Hover effect */
  .dropdown-item-again:hover {
    color: grey;
    /* Text color on hover */
  }

  /* Active/selected state */
  .dropdown-item-again.active {

    color: blue;
    /* Active text color */
  }

  /* Disabled state */
  .dropdown-item-again.disabled {
    color: #ccc;
    /* Disabled text color */
    background-color: #f8f9fa;
    /* Disabled background color */
    cursor: not-allowed;
    /* Not-allowed cursor */
    pointer-events: none;
  }


  .new-hover-effects:hover {
    color: #00c8d4 !important;
    background-color: #e5e5e5;
  }

  .hide {
    display: none;
  }

  @media (max-width: 767px) {
    .px-3 {
      padding: 0px 15px !important;
    }
  }

  .afterlogin-bluff-bottom-icon {
    font-size: 28px;
    color: #000;
  }

  @media (max-width: 420px) {
    .box-shadow-navigate {
      padding: 20px 16px 10px 16px;
      bottom: 0;
      position: fixed;
      width: 100%;
      background-color: #fff !important;
      border-top: 2px solid #D1ECF1;


    }

    .mobile-submenu-bluffafterlogin {
      background-color: #fff !important;
    }
  }

  @media (min-width: 421px) and (max-width: 640px) {
    .box-shadow-navigate {
      padding: 15px 14px 10px 16px;
      bottom: 0;
      position: fixed;
      width: 100%;
      background-color: #fff !important;
      border: 1px solid #D1ECF1;
    }
  }

  @media (min-width: 641px) and (max-width: 768px) {
    .box-shadow-navigate {
      padding: 15px 15px 10px 18px;
    }
  }

  @media (min-width: 768px) and (max-width: 1024px) {
    .box-shadow-navigate {
      padding: 18px 15px 12px 15px;
      bottom: 0;
      position: fixed;
      background-color: #fff !important;
      width: 100%;
      /* z-index: 999; */
      border: 1px solid #d1ecf1;
    }
  }

  @media (min-width: 900px) and (max-width: 1024px) {
    .box-shadow-navigate {
      padding: 2px 21px 10px 21px;
    }
  }

  @media (min-width: 1025px) {
    .box-shadow-navigate {
      padding: 5px 24px 5px 24px;
      /* z-index: 999; */
      border-bottom: 1px solid #e1e3df;
      background: #fff;
    }
  }

  /* Desktop view ke liye */
  @media only screen and (min-width: 1024px) {
    .afterlogin-bluff-bottom-icon {
      display: none !important;
    }

    .bluff-desktop-none-notification {
      display: none !important;
    }
  }

  @keyframes slideIn {
    from {
      transform: translateY(100%);
      opacity: 0;
    }

    to {
      transform: translateY(0);
      opacity: 1;
    }
  }

  @keyframes slideOut {
    from {
      transform: translateY(0);
      opacity: 1;
    }

    to {
      transform: translateY(100%);
      opacity: 0;
    }
  }

  @keyframes slideIn {
    from {
      transform: translateY(100%);
      opacity: 0;
    }

    to {
      transform: translateY(0);
      opacity: 1;
    }
  }

  @keyframes slideOut {
    from {
      transform: translateY(0);
      opacity: 1;
    }

    to {
      transform: translateY(100%);
      opacity: 0;
    }
  }

  @media(max-width: 768px) {
    .mobile-submenu-bluffafterlogin {
      padding: 20px 16px 10px 16px;
      bottom: 0;
      position: fixed;
      width: 100%;
      background-color: #fff !important;
      border-top: 2px solid #D1ECF1;
      box-shadow: 0 -1px 5px rgba(0, 0, 0, 0.1);
      opacity: 1;
      animation: slideIn 0.6s ease forwards;
    }

    .count_badge_style_favorite {
      position: absolute;
      top: 3px;
      right: -12px;
      color: white !important;
      background-color: #00c8d4;
      font-size: 9px;
      border-radius: 50px;
      line-height: 18px;
      padding: 3px 9px;
      margin-top: 0;
      min-width: 15px;
    }
  }
</style>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const navElement = document.querySelector('.box-shadow-navigate');
    let lastScrollTop = 0;
    let ticking = false;
    let isHidden = false;

    function handleScroll() {
      // Only handle scroll if the screen width is 768px or less
      if (window.innerWidth <= 768) {
        const currentScrollTop = window.pageYOffset || document.documentElement.scrollTop;

        if (currentScrollTop > lastScrollTop && !isHidden) {
          // Scrolling down
          navElement.classList.add('hide');
          isHidden = true;
        } else if (currentScrollTop < lastScrollTop && isHidden) {
          // Scrolling up
          navElement.classList.remove('hide');
          isHidden = false;
        }

        lastScrollTop = currentScrollTop <= 0 ? 0 : currentScrollTop; // For Mobile or negative scrolling
      }
    }

    function onScroll() {
      if (!ticking) {
        window.requestAnimationFrame(function() {
          handleScroll();
          ticking = false;
        });
        ticking = true;
      }
    }

    window.addEventListener('scroll', onScroll);

    // Optional: Handle resize to reset states if needed
    window.addEventListener('resize', function() {
      if (window.innerWidth > 768) {
        // Remove class if screen width goes above 768px
        navElement.classList.remove('hide');
        isHidden = false;
      }
    });
  });
</script>




<!-- function handleScroll() {
// Only handle scroll if the screen width is 768px or less
if (window.innerWidth <= 768) {
  const currentScrollTop=window.pageYOffset || document.documentElement.scrollTop;

  if (currentScrollTop> lastScrollTop && !isHidden) {
  // Scrolling down
  navElement.classList.add("hide");
  isHidden = true;
  } else if (currentScrollTop < lastScrollTop && isHidden) {
    // Scrolling up
    navElement.classList.remove("hide");
    isHidden=false;
    }

    lastScrollTop=currentScrollTop <=0 ? 0 : currentScrollTop; // For Mobile or negative scrolling
    }
    }

    function onScroll() {
    if (!ticking) {
    window.requestAnimationFrame(function() {
    handleScroll();
    ticking=false;
    });
    ticking=true;
    }
    }

    window.addEventListener("scroll", onScroll);

    // Optional: Handle resize to reset states if needed
    window.addEventListener("resize", function() {
    if (window.innerWidth> 768) {
    // Remove class if screen width goes above 768px
    navElement.classList.remove("hide");
    isHidden = false;
    }
    });
    }); -->
</script>
<nav class="navbar navbar-expand-lg mobile-submenu-bluffafterlogin bb-xs-1  font-weight-bold navbar-light box-shadow-navigate">
  <!-- <a class="navbar-brand d-block d-lg-none" href="#">Sub Menu</a> -->
  <li class="list-inline-item align-middle position-relative font-size-18 ">
    <a href="<?= $site_url; ?>">
      <i class="fa-solid fa-house afterlogin-bluff-bottom-icon"></i>
    </a>
  </li>
  <li class="list-inline-item align-middle position-relative font-size-18 ">
    <label class=" bluff-desktop-none-notification rounded-circle text-white position-absolute text-smaller mb-0 badge-custm d-flex align-items-center justify-content-center d-flex total-user-count count c-notifications-header"></label>
    <a href="<?= $site_url; ?>/notifications" class="fa fa-bell-o fa-2x bell menuItem afterlogin-bluff-bottom-icon">
    </a>
    <div class="dropdown-menu notifications-dropdown">
    </div>
  </li>
  <li class="list-inline-item align-middle position-relative font-size-18 ">
    <a href="<?= $site_url; ?>/requests/post_request">
      <i class="fa-solid fa-plus afterlogin-bluff-bottom-icon"></i>
    </a>
  </li>
  <li class="list-inline-item align-middle position-relative font-size-18 ">
    <a href="<?= $site_url; ?>/favorites" class="fa fa-heart-o afterlogin-bluff-bottom-icon" title="<?= $lang["menu"]["favorites"]; ?>">
      <span class="total-user-count count c-favorites count_badge_style_favorite"></span>
    </a>
  </li>
  <li class="list-inline-item align-middle position-relative font-size-18 ">
    <a href="<?= $site_url; ?>/sub_mobilemenu">
      <i class="fa-solid fa-bars afterlogin-bluff-bottom-icon"></i>
    </a>
  </li>
  <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button> -->
  <div class="collapse navbar-collapse bluff-fix-height-submenu" id="navbarNavDropdown">
    <ul class="navbar-nav justify-content-between w-100">
      <li class="active">
        <?php
        if (isset($_SESSION['seller_user_name'])) {
        ?>
          <a class="nav-link text-muted new-hover-effects" href="<?= $site_url; ?>/dashboard">Dashboard <span class="sr-only">(current)</span></a>
        <?php } else { ?>
          <a class="nav-link text-muted new-hover-effects" href="<?= $site_url; ?>">Home <span class="sr-only">(current)</span></a>
        <?php } ?>
      </li>
      <li class="dropdown">
        <a class="nav-link text-muted new-hover-effects dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?= $lang["menu"]['selling']; ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <?php if ($count_active_proposals > 0) { ?>
            <a class="dropdown-item-again" href="<?= $site_url; ?>/selling_orders">
              <?= $lang["menu"]['orders']; ?>
            </a>
          <?php } ?>
          <a class="dropdown-item-again" href="<?= $site_url; ?>/proposals/view_proposals">
            <?= $lang["menu"]['my_proposals']; ?>
          </a>
          <?php if ($count_active_proposals > 0) { ?>
            <a class="dropdown-item-again" href="<?= $site_url; ?>/proposals/create_coupon">
              <?= $lang["menu"]['create_coupon']; ?>
            </a>
          <?php } ?>
          <?php if ($count_active_proposals > 0) { ?>
            <a class="dropdown-item-again" href="<?= $site_url; ?>/requests/buyer_requests">
              <?= $lang["menu"]['buyer_requests']; ?>
            </a>
          <?php } ?>
          <a class="dropdown-item-again" href="<?= $site_url; ?>/revenue">
            <?= $lang["menu"]['revenues']; ?>
          </a>
          <?php if ($count_active_proposals > 0) { ?>
            <a class="dropdown-item-again" href="<?= $site_url; ?>/withdrawal_requests">
              <?= $lang["menu"]['withdrawal_requests']; ?>
            </a>
          <?php } ?>
        </div>
      </li>
      <li class="dropdown">
        <a class="nav-link text-muted new-hover-effects dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?= $lang["menu"]['buying']; ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item-again" href="<?= $site_url; ?>/buying_orders">
            <?= $lang["menu"]['orders']; ?>
          </a>
          <a class="dropdown-item-again" href="<?= $site_url; ?>/purchases">
            <?= $lang["menu"]['purchases']; ?>
          </a>
          <a class="dropdown-item-again" href="<?= $site_url; ?>/favorites">
            <?= $lang["menu"]['favorites']; ?>
          </a>
        </div>
      </li>
      <li class="dropdown">
        <a class="nav-link text-muted new-hover-effects dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?= $lang["menu"]['requests']; ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item-again" href="<?= $site_url; ?>/requests/post_request">
            <?= $lang["menu"]['post_request']; ?>
          </a>
          <a class="dropdown-item-again" href="<?= $site_url; ?>/requests/manage_requests">
            <?= $lang["menu"]['manage_requests']; ?>
          </a>
        </div>
      </li>
      <li class="dropdown">
        <a class="nav-link text-muted new-hover-effects dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?= $lang["menu"]['contacts']; ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item-again" href="<?= $site_url; ?>/manage_contacts?my_buyers">
            <?= $lang["menu"]['my_buyers']; ?>
          </a>
          <a class="dropdown-item-again" href="<?= $site_url; ?>/manage_contacts?my_sellers">
            <?= $lang["menu"]['my_sellers']; ?>
          </a>
        </div>
      </li>
      <?php if ($enable_referrals == "yes") { ?>
        <li class="dropdown">
          <a class="nav-link text-muted new-hover-effects dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?= $lang["menu"]['my_referrals']; ?>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item-again" href="<?= $site_url; ?>/my_referrals" data-target="#referrals">
              <?= $lang["menu"]['user_referrals']; ?>
            </a>
            <a class="dropdown-item-again" href="<?= $site_url; ?>/proposal_referrals" data-target="#referrals">
              <?= $lang["menu"]['proposal_referrals']; ?>
            </a>
          </div>
        </li>
      <?php } ?>
      <li class="">
        <a class="nav-link text-muted new-hover-effects" href="<?= $site_url; ?>/conversations/inbox"><?= $lang["menu"]['inbox_messages']; ?> </a>
      </li>
      <li class="">
        <a class="nav-link text-muted new-hover-effects" href="<?= $site_url; ?>/notifications">Notifications </a>
      </li>
      <li class="">
        <a class="nav-link text-muted new-hover-effects" href="<?= $site_url; ?>/<?= $_SESSION['seller_user_name']; ?>"><?= $lang["menu"]['my_profile']; ?></a>
      </li>
      <li class="dropdown">
        <a class="nav-link text-muted new-hover-effects dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?= $lang["menu"]['settings']; ?>
        </a>
        <div class="dropdown-menu  dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item-again" href="<?= $site_url; ?>/settings?profile_settings">
            <?= $lang["menu"]['profile_settings']; ?>
          </a>
          <a class="dropdown-item-again" href="<?= $site_url; ?>/settings?professional_settings">
            <?= $lang["menu"]['professional_settings']; ?>
          </a>
          <a class="dropdown-item-again" href="<?= $site_url; ?>/settings?account_settings">
            <?= $lang["menu"]['account_settings']; ?>
          </a>
        </div>
      </li>
    </ul>
  </div>
</nav>