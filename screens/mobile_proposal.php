<?php
if (strlen($proposal_desc) > 400) {
	$show = "";
} else {
	$show = "show";
}
?>
<style>
	.margin-top-6rem{
		margin-top: 6rem;
	}
</style>
<div class="mp-gig-wrapper js-mp-gig-wrapper px-3 margin-top-6rem"><!--- mp-gig-wrapper js-mp-gig-wrapper Starts --->
	<nav class="breadcrumbs h-text-truncate mb-3">
		<a href="<?= $site_url ?>">Home</a>
		<a href="<?= $site_url ?>/mobile_category"> <?= $proposal_cat_title; ?> </a>
		<a href="<?= $site_url ?>/mobile_sub_cat?cat_id= <?= $proposal_cat_id ?>">
			<?= $proposal_child_title; ?>
		</a>
		<!-- <a href="<?= $site_url ?>/categories/<?= $proposal_cat_url; ?>/<?= $proposal_child_url; ?>/<?= $proposal_attr_title ?>">
			<?= $proposal_attr_title; ?>
		</a> -->
	</nav>
	<h3>categpry iid <?= $proposal_cat_id; ?></h3>
	<div class="mp-gig"><!--- mp-gig Starts --->
		<div class="gig-page-section-dummy" id="overview"></div>
		<div class="gig-page-section gig-page-section-overview">
			<div id="GigGallery-component"><?php include("includes/proposal_slider.php"); ?></div>
		</div>
		<div class="gig-page-section-dummy" id="seller-info"></div>
		<?php
		include("mobile/sellerInfo.php");
		include("mobile/gigInfo.php");
		include("mobile/referralBox.php");
		include("mobile/faqs.php");
		include("mobile/reviews.php");
		?>
	</div><!--- mp-gig Ends --->
</div><!--- mp-gig-wrapper js-mp-gig-wrapper Ends --->
<?php include("mobile/javascript.php"); ?>