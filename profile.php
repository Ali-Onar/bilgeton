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
					<div class="author-list-detail">

						<ul class="author-list-counter">
							<li><span>76</span>Saved</li>
							<li><span>412</span>Freinds</li>
							<li><span>106</span>Posts</li>
						</ul>

					</div>

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
							<a class="nav-link" id="author-article-tab" data-toggle="pill" href="#author-article" role="tab" aria-controls="author-article" aria-selected="false">Yazılar<span class="author-count">4</span></a>
						</li>

						<li class="nav-item">
							<a class="nav-link" id="author-listing-tab" data-toggle="pill" href="#author-listing" role="tab" aria-controls="author-listing" aria-selected="false">Okuduğu Kitaplar<span class="author-count">12</span></a>
						</li>

						<li class="nav-item">
							<a class="nav-link" id="author-hotel-tab" data-toggle="pill" href="#author-hotel" role="tab" aria-controls="author-hotel" aria-selected="false">Sosyal Hesaplar<span class="author-count">0</span></a>
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
							<div class="Reveal-verticle-list listing-shot">
								<div class="listing-badge now-open">Now Open</div>
								<a href="#" class="list-cat theme-bg">Rental</a>
								<div class="Reveal-signle-item">
									<a class="listing-item" href="single-listing-2.html">
										<div class="listing-items">
											<div class="listing-shot-img">
												<img src="https://via.placeholder.com/650x440" class="img-responsive" alt="" />
											</div>
										</div>
									</a>
									<div class="Reveal-verticle-listing-caption">
										<a href="#" class="like-listing"><i class="ti-heart"></i></a>
										<div class="Reveal-listing-shot-caption">
											<h4><a href="single-listing-2.html">George’s Barber Shop George’s Barber Shop </a> <span class="approve-listing"><i class="fa fa-check"></i></span></h4>


											<span class="post-date"><i class="ti-calendar"></i>30 july 2018</span>


											<p class="Reveal-short-descr">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt</p>
											<div class="Reveal-listing-shot-info rating">
												<a href="blo-detail.html" class="bl-continue">Devamını Oku</a>
											</div>
										</div>
									</div>
								</div>
							</div>

							<!--  Single Listing -->
							<div class="Reveal-verticle-list listing-shot">
								<div class="listing-badge now-open">Now Open</div>
								<a href="#" class="list-cat theme-bg">Rental</a>
								<div class="Reveal-signle-item">
									<a class="listing-item" href="single-listing-2.html">
										<div class="listing-items">
											<div class="listing-shot-img">
												<img src="https://via.placeholder.com/650x440" class="img-responsive" alt="" />
											</div>
										</div>
									</a>
									<div class="Reveal-verticle-listing-caption">
										<a href="#" class="like-listing"><i class="ti-heart"></i></a>
										<div class="Reveal-listing-shot-caption">
											<h4><a href="single-listing-2.html">George’s Barber Shop George’s Barber Shop </a> <span class="approve-listing"><i class="fa fa-check"></i></span></h4>


											<span class="post-date"><i class="ti-calendar"></i>30 july 2018</span>


											<p class="Reveal-short-descr">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt</p>
											<div class="Reveal-listing-shot-info rating">
												<a href="blo-detail.html" class="bl-continue">Devamını Oku</a>
											</div>
										</div>
									</div>
								</div>
							</div>

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

									<li>Kardeşimin Hikayesi<span>05.01.2021</span></li>
									<li>Hilal ve Haç<span>19.10.2020</span></li>
									<li>Modern Türkiye'nin Doğuşu<span>30.09.2020</span></li>
									<li>Serenad<span>02.08.2019</span></li>
									<li>Bozkurtlar<span>18.05.2018</span></li>
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
										<li><a href="#"><i class="ti-facebook"></i></a></li>
										<li><a href="#"><i class="ti-twitter"></i></a></li>
										<li><a href="#"><i class="ti-google"></i></a></li>
										<li><a href="#"><i class="ti-instagram"></i></a></li>
										<li><a href="#"><i class="ti-linkedin"></i></a></li>
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