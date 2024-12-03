<style>
	.page-container {
		/* display: flex; */
		/* margin-top: 14rem; */
	}

	.blog-wrapper-main {
		margin-bottom: 20px;
		/* background-color: #fff; */
		/* padding: 10px; */
		/* box-shadow: rgba(67, 71, 85, 0.27) 0px 0px 0.25em, rgba(90, 125, 188, 0.05) 0px 0.25em 1em; */

	}

	.blognewadd {
		display: flex;
		/* align-items: center; */
		background-color: #fff;
		border-radius: 8px;
		box-shadow: rgba(67, 71, 85, 0.27) 0px 0px 0.25em, rgba(90, 125, 188, 0.05) 0px 0.25em 1em;
		overflow: hidden;
		/* width: 50%; */
		margin: auto;
		/* justify-content: center; */
	}

	.blognewadd-image img {
		width: 260px;
		height: 215px;
		object-fit: cover;
	}

	@media (max-width: 768px) {
		.blognewadd {
			display: block;
			/* Remove flex for mobile view */
			width: 80%;
			/* Set width to 80% */
		}

		.blognewadd-image img {
			width: 100%;
			/* Make image responsive */
			height: auto;
			/* Adjust height for responsiveness */
		}
	}

	.blognewadd-content {
		padding: 1rem;
		flex: 1;
	}

	.blognewadd-meta {
		display: flex;
		gap: 10px;
		margin-bottom: 0.5rem;
	}

	.blognewadd-date,
	.blognewadd-category {
		background-color: #00c4cc;
		color: #fff;
		font-size: 0.8rem;
		padding: 0.25rem 0.5rem;
		border-radius: 5px;
		display: flex;
		align-items: center;
	}

	.blognewadd-title {
		font-size: 22px;
		margin: 0.5rem 0;
	}

	.blognewadd-description {
		font-size: 1rem;
		color: #666;
	}

	.blognewadd-readmore {
		color: #00c4cc;
		text-decoration: none;
		font-weight: bold;
	}

	.blognewadd-author {
		display: flex;
		align-items: center;
		margin-top: 1rem;
		font-size: 0.9rem;
		color: #333;
	}

	.blognewadd-author-img {
		width: 35px;
		height: 35px;
		object-fit: cover;
		border-radius: 50%;
		margin-right: 0.5rem;
	}

	.blognewadd-author-text {
		color: #fff;
		font-weight: 500;
		font-size: 16px;
	}
</style>
<style>
	.blog-wrapper-main {
		margin-bottom: 20px;
	}

	.single-blog-page {
		display: flex;
		gap: 20px;
		justify-content: center;
		padding: 20px;
	}

	.blog-content {
		/* width: 65%; */
		background-color: #fff;
		border-radius: 8px;
		/* box-shadow: rgba(67, 71, 85, 0.27) 0px 0px 0.25em, rgba(90, 125, 188, 0.05) 0px 0.25em 1em; */
		overflow: hidden;
	}

	.blog-image-container {
		position: relative;
		padding: 10px;
	}

	.blog-image-container img {
		width: 100%;
		height: auto;
	}

	.blog-date {
		position: absolute;
		top: 18px;
		left: 18px;
		background-color: #00cedc;
		color: #fff;
		padding: 0px 6px 0px 6px;
		border-radius: 5px;
		font-size: 1.2rem;
		text-align: center;
	}

	.blog-date span {
		font-size: 1.5rem;
		display: block;
	}

	.blog-title-overlay {
		position: absolute;
		bottom: 30px;
		left: 15px;
		right: 15px;
		background: rgba(0, 0, 0, 0.6);
		color: #fff;
		padding: 10px;
		border-radius: 5px;
	}

	.blog-meta {
		display: flex;
		gap: 15px;
		font-size: 15px;
		padding: 10px 0px 0px 20px;
		font-weight: 400;
		color: #2e2e2e;
	}

	.blog-description {
		padding: 20px;
	}

	/* Leave a Comment Section */
	.leave-comment {
		padding: 0 16px 20px;
		background-color: #f7f7f7;
		border-radius: 8px;
	}

	.leave-comment h3 {
		font-size: 1.3rem;
		margin-bottom: 15px;
	}

	.leave-comment .form-group {
		margin-bottom: 15px;
	}

	.leave-comment .form-group label {
		display: block;
		font-size: 0.9rem;
		margin-bottom: 5px;
		color: #333;
	}

	.leave-comment .form-group input,
	.leave-comment .form-group textarea {
		width: 100%;
		padding: 10px;
		border: 1px solid #ddd;
		border-radius: 5px;
		font-size: 0.9rem;
	}

	.comment-submit {
		background-color: #00cedc;
		color: #fff;
		padding: 10px 20px;
		border: none;
		border-radius: 5px;
		cursor: pointer;
		font-size: 0.9rem;
	}

	.comment-submit:hover {
		background-color: #d00;
	}

	.sidebar {
		/* width: 30%; */
	}

	.search-widget,
	.latest-posts-widget {
		background-color: #f7f7f7;
		border-radius: 8px;
		padding: 3px 20px 20px;
		/* margin-bottom: 20px; */
	}

	.search-widget h3,
	.latest-posts-widget h3 {
		margin-bottom: 15px;
		font-size: 1.1rem;
	}

	.search-widget form {
		display: flex;
	}

	.search-widget input {
		flex: 1;
		padding: 10px;
		border: 1px solid #ddd;
		border-radius: 5px 0 0 5px;
	}

	.search-widget button {
		background-color: #00cedc;
		color: #fff;
		padding: 11px 15px;
		border: none;
		border-radius: 0 5px 5px 0;
		cursor: pointer;
	}

	.latest-posts-widget ul {
		list-style: none;
		padding: 0;
	}

	.latest-posts-widget li {
		display: flex;
		gap: 10px;
		margin-bottom: 15px;
	}

	.post-thumbnail img {
		width: 60px;
		height: 60px;
		object-fit: cover;
		border-radius: 5px;
	}

	.post-info {
		font-size: 0.9rem;
	}

	.post-info a {
		color: #333;
		text-decoration: none;
	}

	.post-info a:hover {
		text-decoration: underline;
	}

	@media (max-width: 768px) {
		.single-blog-page {
			flex-direction: column;
		}

		.blog-content,
		.sidebar {
			width: 100%;
		}
	}

	.no_border {
		border: none !important;
	}

	.font-size-16px {
		font-size: 16px;
	}
</style>

<div class="card mb-3 no_border"><!--- card Starts -->

	<div class="card-body p-0" style="background-color: #f7f7f7;"><!--- card-body Starts -->
		<h5 class="px-3 pt-3">Search Here</h5>
		<form action="index" method="get">
			<div class="input-group search-widget">
				<?php if ($lang_dir == "right") { ?>
					<div class="input-group-prepend">
						<button class="btn btn-success" type="submit">
							<i class="fa fa-search"></i>
						</button>
					</div>
					<input type="text" class="form-control <?= $textRight; ?>" placeholder="<?= $lang['placeholder']['search']; ?>" name="search" value="<?= @$input->get("search"); ?>" required />

				<?php } else { ?>
					<input type="text" class="form-control" placeholder="<?= $lang['placeholder']['search']; ?>" name="search" value="<?= @$input->get("search"); ?>" required />
					<div class="input-group-prepend">
						<button class="btn btn-success" type="submit">
							<i class="fa fa-search"></i>
						</button>
					</div>
				<?php } ?>
			</div>
		</form>
	</div><!--- card-body Ends -->
</div><!--- card Ends -->

<div class="card card-primary">
	<div class="card-header <?= $textRight; ?>">
		<h5>Latest Posts</h5>
	</div>
	<div class="card-body">
		<ul class="mb-0 list-unstyled <?= $textRight; ?>">
			<?php
			// $categories = $db->select("post_categories");
			// while ($cat = $categories->fetch()) {
			// 	$image = $cat->cat_image;
			// 	$cat_meta = $db->select(
			// 		"post_categories_meta",
			// 		array(
			// 			'cat_id' => $cat->id,
			// 			'language_id' => $_SESSION['siteLanguage']
			// 		)
			// 	)->fetch();
			// 	$cat_name = !empty($cat_meta->cat_name) ? $cat_meta->cat_name : '';
			// echo $cat_name.'<br />';

			$post_meta_get = $db->select('posts_meta');
			while ($post_meta2 = $post_meta_get->fetch()) {
				$url = preg_replace('#[ -]+#', '-', $post_meta2->title);
				$content = substr(strip_tags($post_meta2->content), 0, 250);
				$author = $post_meta2->author;
				$title = $post_meta2->title;
				/// Get Category Details

				$cat = $db->select("post_categories")->fetch();
				$image = $cat->cat_image;
				$cat_meta = $db->select(
					"post_categories_meta",
					array(
						'cat_id' => $cat->id,
						'language_id' => $_SESSION['siteLanguage']
					)
				)->fetch();
				$cat_name = !empty($cat_meta->cat_name) ? $cat_meta->cat_name : '';


			?>
				<li class="d-flex">
					<div class="post-thumbnail mr-2">
						<a href="index?cat_id=<?= $cat->id; ?>">
							<?php if (!empty($image)) { ?>
								<img src="../blog_cat_images/<?= $image; ?>" width="50" height="45" class='mr-1'>
							<?php } else { ?>
								<span style="margin-left: 26px;"></span>
							<?php } ?>
						</a>
					</div>
					<div class="post-info">
						<span><i class="fa-solid fa-user"></i><b> By <?= ucwords($author); ?> </b></span><br>

						<?php
						// Split the title into an array of words
						$words = explode(" ", $title);
						// Check if there are more than 10 words
						if (count($words) > 10) {
							// Take only the first 10 words and add "..."
							$shortTitle = implode(" ", array_slice($words, 0, 10)) . "...";
						} else {
							// If 10 words or less, keep it as is
							$shortTitle = $title;
						}
						?>
						<a href="#" class="font-size-16px"><?= $shortTitle; ?></a>
					</div>
				</li>
			<?php } ?>
		</ul>
	</div>
</div>