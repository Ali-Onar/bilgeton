<?php require_once 'header.php';

$sql = $db->wread("users", "users_slug", $_GET['users_slug']);
$row = $sql->fetch(PDO::FETCH_ASSOC);

?>

<!-- ============================ Our Story Start ================================== -->
<section class="gray">

	<div class="container detail-wrap-up">

		<!-- row Start -->
		<div class="row">

			<div class="col-lg-4 col-md-12 col-sm-12">
				<div class="autor-bio-wrap">

					<!-- author thumb -->
					<div class="author-thumb">
						<div class="author-thumb-pic">
							<img src="nedmin/dimg/users/<?php echo $row['users_file'] ?>" class="img-fluid circle" alt="">
						</div>
						<div class="author-thumb-caption">
							<h4><?php echo $row['users_name'] ?></h4>
							<span><?php echo $row['users_title'] ?></span>
						</div>
					</div>

					<!-- author detail -->
					<div class="author-full-detail">

						<div class="author-bio-single-list">
							<div class="author-bio-icon">
								<i class="fa fa-marker"></i>
							</div>
							<div class="author-bio-caption">
								<span>Location</span>
								<h6><?php echo $row['users_location'] ?></h6>
							</div>
						</div>

						<div class="author-bio-single-list">
							<div class="author-bio-icon">
								<i class="fa fa-envelope"></i>
							</div>
							<div class="author-bio-caption">
								<span>Email</span>
								<h6><?php echo $row['users_mail'] ?></h6>
							</div>
						</div>

						<!-- <div class="author-bio-single-list">
							<div class="author-bio-icon">
								<i class="fa fa-phone"></i>
							</div>
							<div class="author-bio-caption">
								<span>Call</span>
								<h6>+91 123 546 5847</h6>
							</div>
						</div> -->

					</div>

					<!-- Author List Count -->
					<!-- <div class="author-list-detail">

						<ul class="author-list-counter">
							<li><span>76</span>Saved</li>
							<li><span>412</span>Freinds</li>
							<li><span>106</span>Posts</li>
						</ul>

					</div> -->

				</div>
			</div>

			<div class="col-lg-8 col-md-12 col-sm-12">

				<!-- Tab Navigation -->
				<div class="author-tab-header">
					<ul class="nav nav-tabs" id="author-tab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="author-about-tab" data-toggle="pill" href="#author-about" role="tab" aria-controls="author-about" aria-selected="true">Hakkında</a>
						</li>

						<li class="nav-item">
							<a class="nav-link" id="author-article-tab" data-toggle="pill" href="#author-article" role="tab" aria-controls="author-article" aria-selected="false">Yazılar<span class="author-count">
									<?php
									$forBlogsUsersID = $row['users_id'];
									$sqlCount = $db->qsql("SELECT COUNT(blogs_title) as 'totalBlog' FROM blogs where users_id=:users_id", "users_id", $forBlogsUsersID);
									$rowCount = $sqlCount->fetch(PDO::FETCH_ASSOC);
									echo $rowCount['totalBlog'];
									?>
								</span></a>
						</li>

						<li class="nav-item">
							<a class="nav-link" id="author-listing-tab" data-toggle="pill" href="#author-listing" role="tab" aria-controls="author-listing" aria-selected="false">Okuduğu Kitaplar<span class="author-count">
									<?php
									$forBlogsUsersID = $row['users_id'];
									$sqlCount = $db->qsql("SELECT COUNT(books_name) as 'totalBook' FROM books where users_id=:users_id", "users_id", $forBlogsUsersID);
									$rowCount = $sqlCount->fetch(PDO::FETCH_ASSOC);
									echo $rowCount['totalBook'];
									?>
								</span></a>
						</li>

						<li class="nav-item">
							<a class="nav-link" id="author-hotel-tab" data-toggle="pill" href="#author-hotel" role="tab" aria-controls="author-hotel" aria-selected="false">Sosyal Hesaplar</a>
						</li>
					</ul>
				</div>

				<!-- All Tab Content -->
				<div class="tab-content" id="author-tabContent">

					<!-- About Tab Content -->
					<div class="tab-pane fade show active" id="author-about" role="tabpanel" aria-labelledby="author-about-tab">

						<!-- About Content -->
						<div class="Reveal-block-wrap">

							<div class="Reveal-block-header">
								<h4 class="block-title">Bio</h4>
							</div>

							<div class="Reveal-block-body">
								<p><?php echo $row['users_bio'] ?></p>
							</div>

						</div>
					</div>

					<!-- About Tab Content -->
					<div class="tab-pane fade" id="author-article" role="tabpanel" aria-labelledby="author-article-tab">

						<!-- About Content -->
						<div class="Reveal-block-wrap">

							<div class="Reveal-block-header">
								<h4 class="block-title">Yazı Listesi</h4>
							</div>

							<!-- Buraya Yazılar Gelecek -->
							<!--  Single Listing -->

							<?php
							$forBlogsUsersID = $row['users_id'];
							$sql = $db->qSql(
								"SELECT * FROM blogs WHERE users_id=:users_id order by blogs_time DESC",
								'users_id',
								$forBlogsUsersID
							);

							while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
							?>

								<div class="Reveal-verticle-list listing-shot">
									<a href="#" class="list-cat theme-bg"><?php echo $db->tDate($row['blogs_time'], ['date' => TRUE]); ?></a>
									<div class="Reveal-signle-item">
										<a class="listing-item" href="bloglar/<?php echo $db->seo($row['blogs_slug']); ?>">
											<div class="listing-items">
												<div class="listing-shot-img">
													<img src="nedmin/dimg/blogs/<?php echo $row['blogs_file'] ?>" class="img-responsive" alt="<?php echo $row['blogs_title'] ?>" />
												</div>
											</div>
										</a>
										<div class="Reveal-verticle-listing-caption">
											<a href="#" class="like-listing"><i class="ti-heart"></i></a>
											<div class="Reveal-listing-shot-caption">
												<h4><a href="bloglar/<?php echo $db->seo($row['blogs_slug']); ?>"><?php echo $row['blogs_title'] ?></a> <span class="approve-listing"><i class="fa fa-check"></i></span></h4>
												<p class="Reveal-short-descr"><?php echo mb_substr($row['blogs_content'], 0, 150) ?>...</p>
												<div class="Reveal-listing-shot-info rating">
													<a href="bloglar/<?php echo $db->seo($row['blogs_slug']); ?>" class="bl-continue">Devamını Oku</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
						</div>



					</div>

					<!-- listing Tab Content -->
					<div class="tab-pane fade" id="author-listing" role="tabpanel" aria-labelledby="author-listing-tab">

						<!-- Single Block Wrap -->
						<div class="Reveal-block-wrap">

							<div class="Reveal-block-header">
								<h4 class="block-title">Kitap Listesi</h4>
							</div>

							<div class="Reveal-block-body p-0">
								<ul class="item-pricing">
									<?php
									$sql = $db->qSql(
										"SELECT * FROM books WHERE users_id=:users_id order by books_time DESC",
										'users_id',
										$forBlogsUsersID
									);

									while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
									?>
										<li><?php echo $row['books_name'] ?><span><?php echo $row['books_time']; ?></span></li>
									<?php } ?>
								</ul>
							</div>

						</div>
					</div>



					<!-- hotel Tab Content -->
					<div class="tab-pane fade" id="author-hotel" role="tabpanel" aria-labelledby="author-hotel-tab">
						<!-- Single Block Wrap -->
						<div class="Reveal-block-wrap">

							<div class="Reveal-block-header">
								<h4 class="block-title">Bağlantı Listesi</h4>
							</div>
							<div class="imp-boxes-single">
								<div class="imp-boxes-single-icon"><img src="assets/img/share.svg" width="25" alt="" /></div>
								<div class="imp-boxes-single-content">
									<ul>
										<?php

										$sql = $db->wread("users", "users_slug", $_GET['users_slug']);
										$row = $sql->fetch(PDO::FETCH_ASSOC);

										?>

										<?php if ($row['users_facebook']) { ?>
											<li><a href="<?php echo $row['users_facebook'] ?>" target="_blank"><i class="ti-facebook"></i></a></li>
										<?php }
										if ($row['users_twitter']) { ?>
											<li><a href="<?php echo $row['users_twitter'] ?>" target="_blank"><i class="ti-twitter"></i></a></li>
										<?php }
										if ($row['users_instagram']) { ?>
											<li><a href="<?php echo $row['users_instagram'] ?>" target="_blank"><i class="ti-instagram"></i></a></li>
										<?php }
										if ($row['users_linkedin']) { ?>
											<li><a href="<?php echo $row['users_linkedin'] ?>" target="_blank"><i class="ti-linkedin"></i></a></li>
										<?php }
										if ($row['users_github']) { ?>
											<li><a href="<?php echo $row['users_github'] ?>" target="_blank"><i class="ti-github"></i></a></li>
										<?php } ?>
									</ul>
								</div>
							</div>
						</div>
					</div>

					<!-- restaurants Tab Content -->
					<div class="tab-pane fade" id="author-restaurants" role="tabpanel" aria-labelledby="author-restaurants-tab">
						<!-- Featured Listings -->
						<div class="Reveal-block-wrap">

							<div class="Reveal-block-header">
								<h4 class="block-title">All Restaurants</h4>
							</div>

							<div class="Reveal-block-body">
								<div class="alert alert-success" role="alert">
									There are no any Restaurants.
								</div>
							</div>

						</div>
					</div>

				</div>





			</div>

		</div>
		<!-- /row -->

	</div>

</section>
<!-- ============================ Our Story End ================================== -->

<?php require_once 'footer.php'; ?>