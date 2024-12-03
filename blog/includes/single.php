<?php
$id = $input->get('id');
$language_id = isset($_GET['lang']) ? $input->get('lang') : $_SESSION['siteLanguage'];

$post = $db->select("posts", ['id' => $id])->fetch();

$post_meta = $db->select('posts_meta', ['post_id' => $id, 'language_id' => $language_id])->fetch();

$title = !empty($post_meta->title) ? $post_meta->title : '';
$author = !empty($post_meta->author) ? $post_meta->author : '';
$content = !empty($post_meta->content) ? $post_meta->content : '';

$url = preg_replace('#[ -]+#', '-', $title);

/// Get Category Details
$get_cat = $db->select("post_categories_meta", ['cat_id' => $post->cat_id, 'language_id' => $language_id]);
$row_cat = $get_cat->fetch();
$cat_name = !empty($row_cat->cat_name) ? $row_cat->cat_name : '';

$comments = $db->select("post_comments", array("post_id" => $id));
$count_comments = $comments->rowCount();

?>
<style>
	.page-container {
		/* display: flex; */
		margin-top: 14rem;
	}

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


<div class="card mb-4"><!--- card Starts --->
	<div class="card-body p-0 <?= $textRight; ?>"><!--- card-body Starts --->

		<div class="clearfix"></div>
		<div class="blog-content">
			<div class="blog-image-container">
				<?php if (!empty($post->image)) { ?>
					<img src="<?= getImageUrl("posts", $post->image); ?>" class="mb-3 rounded" />
				<?php } else { ?>
					<img src="https://plus.unsplash.com/premium_photo-1731453260225-931ebdde6d16?w=1500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxmZWF0dXJlZC1waG90b3MtZmVlZHwxNXx8fGVufDB8fHx8fA%3D%3D" alt="Blog Image">
				<?php } ?>

				<div class="blog-date">
					<span><?= date('M-d', strtotime($post->date_time)); ?></span>
				</div>
				<div class="blog-title-overlay">
					<h1><?= $title; ?></h1>
				</div>
			</div>
			<div class="blog-meta">
				<span><i class="icon-calendar"></i> Published on: <span class="text-muted"><?= $post->date_time; ?></span></span> |
				<span><i class="icon-folder"></i> Category: <a href="index?cat_id=<?= $post->cat_id; ?>" class="text-muted"><?= $cat_name; ?></a></span> |
				<span><i class="icon-user"></i> Author: <a href="#" class="text-muted"><?= $author; ?></span>
			</div>
			<div class="sharethis-inline-share-buttons px-4 mt-2 <?= ($lang_dir == "right" ? 'float-left' : '') ?>"></div>

			<div class="blog-description">
				<div class="mt-3 post-content">
					<?= $content; ?>
				</div>

				<h2>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</h2>
				<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius perspiciatis ut deleniti laudantium dolorum quidem quasi quas, voluptas optio sunt quaerat suscipit, a tempore reprehenderit harum beatae dolor cupiditate, possimus incidunt ab velit ex? Quos quis natus non! Eos quas laborum quaerat mollitia exercitationem. Placeat quidem illum voluptates vel veritatis?</p>
				<h2>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</h2>
				<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius perspiciatis ut deleniti laudantium dolorum quidem quasi quas, voluptas optio sunt quaerat suscipit, a tempore reprehenderit harum beatae dolor cupiditate, possimus incidunt ab velit ex? Quos quis natus non! Eos quas laborum quaerat mollitia exercitationem. Placeat quidem illum voluptates vel veritatis?</p>
				<h2>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</h2>
				<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius perspiciatis ut deleniti laudantium dolorum quidem quasi quas, voluptas optio sunt quaerat suscipit, a tempore reprehenderit harum beatae dolor cupiditate, possimus incidunt ab velit ex? Quos quis natus non! Eos quas laborum quaerat mollitia exercitationem. Placeat quidem illum voluptates vel veritatis?</p>
				<h2>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</h2>
				<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius perspiciatis ut deleniti laudantium dolorum quidem quasi quas, voluptas optio sunt quaerat suscipit, a tempore reprehenderit harum beatae dolor cupiditate, possimus incidunt ab velit ex? Quos quis natus non! Eos quas laborum quaerat mollitia exercitationem. Placeat quidem illum voluptates vel veritatis?</p>
				<h2>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</h2>
				<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius perspiciatis ut deleniti laudantium dolorum quidem quasi quas, voluptas optio sunt quaerat suscipit, a tempore reprehenderit harum beatae dolor cupiditate, possimus incidunt ab velit ex? Quos quis natus non! Eos quas laborum quaerat mollitia exercitationem. Placeat quidem illum voluptates vel veritatis?</p>
				<h2>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</h2>
				<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius perspiciatis ut deleniti laudantium dolorum quidem quasi quas, voluptas optio sunt quaerat suscipit, a tempore reprehenderit harum beatae dolor cupiditate, possimus incidunt ab velit ex? Quos quis natus non! Eos quas laborum quaerat mollitia exercitationem. Placeat quidem illum voluptates vel veritatis?</p>
				<h2>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</h2>
				<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius perspiciatis ut deleniti laudantium dolorum quidem quasi quas, voluptas optio sunt quaerat suscipit, a tempore reprehenderit harum beatae dolor cupiditate, possimus incidunt ab velit ex? Quos quis natus non! Eos quas laborum quaerat mollitia exercitationem. Placeat quidem illum voluptates vel veritatis?</p>
				<h2>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</h2>
				<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius perspiciatis ut deleniti laudantium dolorum quidem quasi quas, voluptas optio sunt quaerat suscipit, a tempore reprehenderit harum beatae dolor cupiditate, possimus incidunt ab velit ex? Quos quis natus non! Eos quas laborum quaerat mollitia exercitationem. Placeat quidem illum voluptates vel veritatis?</p>
				<h2>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</h2>
				<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius perspiciatis ut deleniti laudantium dolorum quidem quasi quas, voluptas optio sunt quaerat suscipit, a tempore reprehenderit harum beatae dolor cupiditate, possimus incidunt ab velit ex? Quos quis natus non! Eos quas laborum quaerat mollitia exercitationem. Placeat quidem illum voluptates vel veritatis?</p>
			</div>

			<!-- Leave a Comment Section -->

		</div>
	</div><!--- card-body Ends --->
</div><!--- card Ends --->





















<?php include("post_comments.php"); ?>

<a href="index" class="btn btn-success <?= $floatRight; ?>"> <i class="fa fa-arrow-left"></i>&nbsp; Go Back</a>