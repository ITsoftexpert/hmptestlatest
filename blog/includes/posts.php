<?php

$per_page = 5;
if (isset($_GET['page'])) {
	$page = $input->get('page');
	if ($page == 0) {
		$page = 1;
	}
} else {
	$page = 1;
}

/// Page will start from 0 and multiply by per page
$start_from = ($page - 1) * $per_page;

if (isset($_GET['search'])) {
	$search = $input->get('search');
	// $posts = $db->query("select * from posts where title like :title order by 1 DESC LIMIT :limit OFFSET :offset",["title"=>"%$search%"],array("limit"=>$per_page,"offset"=>$start_from));
	$posts = $db->query("select * from posts_meta LEFT JOIN posts ON posts_meta.post_id = posts.id where posts_meta.language_id=$siteLanguage AND posts_meta.title like :title order by 1 DESC LIMIT :limit OFFSET :offset", ["title" => "%$search%"], array("limit" => $per_page, "offset" => $start_from));
} else if (isset($_GET['cat_id'])) {
	$cat_id = $input->get('cat_id');
	$search = "";
	$posts = $db->query("select * from posts where cat_id=:cat_id order by 1 DESC LIMIT :limit OFFSET :offset", ["cat_id" => $cat_id], array("limit" => $per_page, "offset" => $start_from));
} else if (isset($_GET['author'])) {
	$author = $input->get('author');
	$search = "";
	$posts = $db->query("select * from posts where author=:author order by 1 DESC LIMIT :limit OFFSET :offset", ["author" => $author], array("limit" => $per_page, "offset" => $start_from));
} else {
	$search = "";
	$posts = $db->query("select * from posts order by 1 DESC LIMIT :limit OFFSET :offset", "", array("limit" => $per_page, "offset" => $start_from));
}

$count_posts = $posts->rowCount();

if ($count_posts == 0) {
	echo "<h2 class='h3 text-center bg-white p-5'>No Posts Found.</h2>";
}

while ($post = $posts->fetch()) {

	$post_meta = $db->select('posts_meta', ['post_id' => $post->id, 'language_id' => $siteLanguage])->fetch();

	$url = preg_replace('#[ -]+#', '-', $post_meta->title);
	$content = substr(strip_tags($post_meta->content), 0, 250);

	$author = $post_meta->author;
	$title = $post_meta->title;
	/// Get Category Details

	$get_cat = $db->select("post_categories_meta", ['cat_id' => $post->cat_id, 'language_id' => $siteLanguage]);
	$row_cat = $get_cat->fetch();
	$cat_name = !empty($row_cat->cat_name) ? $row_cat->cat_name : '';

?>



	<div class="page-container">
		<div class="blog-wrapper-main">
			<div class="blognewadd">
				<div class="blognewadd-image">
					<img src="<?= getImageUrl("posts", $post->image); ?>" alt="Blog Image">
				</div>
				<div class="blognewadd-content">
					<div class="blognewadd-meta">
						<span class="blognewadd-date">
							<i class="icon-calendar"></i> <?= $post->date_time; ?>
						</span>
						<span class="blognewadd-category">
							<a href="index?cat_id=<?= $post->cat_id; ?>" class="text-white"><i class="icon-tag"></i><?= $cat_name; ?></a>
						</span>
					</div>
					<h3 class="blognewadd-title"><a href="<?= $post->id; ?>/<?= $url; ?>"><?= $title; ?></a></h3>
					<p class="blognewadd-description">
						<?= $content; ?>...
						<a href="<?= $post->id; ?>/<?= $url; ?>" class="blognewadd-readmore">Read more</a>
					</p>
					<div class="blognewadd-author">
						<img src="https://images.unsplash.com/photo-1463453091185-61582044d556?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTh8fHVzZXIlMjBwcm9maWxlfGVufDB8fDB8fHww" alt="Author Image" class="blognewadd-author-img">
						<span class="blognewadd-author-text">By <?= $author; ?></span>
					</div>
				</div>
			</div>
			<!-- Repeat structure for other items -->
		</div>
	</div>




<?php } ?>

<?php if (!isset($_GET['cat_id']) and !isset($_GET['author'])) { ?>

	<nav class="nav justify-content-center">

		<ul class="pagination"><!--- pagination Starts --->
			<?php

			/// Now Select All From Order Table

			if (isset($_GET['search'])) {
				// $query = $db->query("select * from posts where title like :title",["title"=>"%$search%"]);
				$query = $db->query("select * from posts_meta LEFT JOIN posts ON posts_meta.post_id = posts.id where posts_meta.language_id=$siteLanguage AND posts_meta.title like :title", ["title" => "%$search%"]);
			} else if (isset($_GET['cat_id'])) {
				$query = $db->query("select * from posts where cat_id=:cat_id", ["cat_id" => $cat_id]);
			} else if (isset($_GET['author'])) {
				$query = $db->query("select * from posts where author=:author", ["author" => $author]);
			} else {
				$query = $db->query("select * from posts order by 1 DESC");
			}

			/// Count The Total Records
			$total_records = $query->rowCount();
			/// Using ceil function to divide the total records on per page
			$total_pages = ceil($total_records / $per_page);

			echo "<li class='page-item'><a href='index?search=$search&page=1' class='page-link'>{$lang['pagination']['first_page']}</a></li>";

			echo "<li class='page-item " . (1 == $page ? "active" : "") . "'><a class='page-link' href='index?search=$search&page=1'>1</a></li>";

			$i = max(2, $page - 5);

			if ($i > 2) {
				echo "<li class='page-item' href='#'><a class='page-link'>...</a></li>";
			}

			for (; $i < min($page + 6, $total_pages); $i++) {
				echo "<li class='page-item";
				if ($i == $page) {
					echo " active ";
				}
				echo "'><a href='index?search=$search&page=" . $i . "' class='page-link'>" . $i . "</a></li>";
			}

			if ($i != $total_pages and $total_pages > 1) {
				echo "<li class='page-item' href='#'><a class='page-link'>...</a></li>";
			}

			if ($total_pages > 1) {
				echo "<li class='page-item " . ($total_pages == $page ? "active" : "") . "'><a class='page-link' href='index?search=$search&page=$total_pages'>$total_pages</a></li>";
			}

			echo "<li class='page-item'><a href='index?search=$search&page=$total_pages' class='page-link'>{$lang['pagination']['last_page']}</a></li>";

			?>
		</ul><!--- pagination Ends --->

	</nav>

<?php } ?>