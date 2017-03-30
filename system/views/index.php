<?php
try{
	$url="../../texasadmin/assets/images/";
	$koneksi=new PDO('mysql:host=localhost;dbname=u9700765_texas',"u9700765_texas","texas");
}catch(PDOException $e){
	echo "Koneksi Gagal".$e->getMessage();
}
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="Null Computindo" />

	<!-- Stylesheets
	============================================= -->
	<link rel="stylesheet" href="assets/css/google-fonts.css" type="text/css" />
	<link rel="stylesheet" href="assets/css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="assets/style.css" type="text/css" />
	<link rel="stylesheet" href="assets/css/swiper.css" type="text/css" />
	<link rel="stylesheet" href="assets/css/dark.css" type="text/css" />
	<link rel="stylesheet" href="assets/css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="assets/css/animate.css" type="text/css" />
	<link rel="stylesheet" href="assets/css/magnific-popup.css" type="text/css" />
	<link rel="stylesheet" href="assets/css/w3slider.css" type="text/css" />


	<link rel="stylesheet" href="css/responsive.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Texas English Course</title>
	<style>
		#primary-menu ul > li {
			float: left;
			margin-left: 0px;
			font-size:16px;
		}

		#primary-menu ul li > a {
			padding: 39px 13px;
			font-size:16px;

		}
	</style>
</head>

<body class="dark stretched" >
<!-- Document Wrapper
============================================= -->
<div id="wrapper" class="clearfix">
	<!-- Header
    ============================================= -->
	<header id="header" class="transparent-header full-header" data-sticky-class="dark">
		<div id="header-wrap">
			<div class="container clearfix">
				<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>
				<!-- Logo
                ============================================= -->
				<!-- <div id="logo" style="padding-left: 10px; padding-right: 10px; margin-right: 0px; width: 20%" > -->
				<div id="logo" style="width:20%; height:10%;" class="hidden-md hidden-sm">
					<a href="" class="standard-logo" data-dark-logo="image/logotexas.png">
						<img src="image/logotexas.png" alt="Texas Logo" >

					</a>
					<!-- 						<a href="http://notohadinegoro.co.id/" class="retina-logo" data-dark-logo="http://notohadinegoro.co.id/assets/images/logo-dark@2x.png"><img src="http://notohadinegoro.co.id/assets/images/logo@2x.png" alt="Canvas Logo"></a> -->
				</div><!-- #logo end -->
				<!-- Primary Navigation
                ============================================= -->

				<nav id="primary-menu" class="dark " style="padding-left: 0px; padding-right: 0px; float: left;  ">
					<ul style="margin-right: 0px; padding-right: 0px; " >
						<li class="current" ><a href="index.php"><div>Home</div></a></li>
						<li><a href="#"><center><div>Program</div></center></a>
							<ul style="background:rgba(51,51,51,0.8)">
								<li><a href="#"><div>English</div></a>
									<ul>
										<li><a href="#"><div>General English</div></a>
											<ul>
												<li><a href="childernclass.php">Children Class</a></li>
												<li><a href="teenclass.html">Teens Class</a></li>
												<li><a href="adultclass.html">Adults Class</a></li>
											</ul>
										</li>
										<li><a href="#"><div>Conversation</div></a>
											<ul>
												<li><a href="childernclass.php">Children Class</a></li>
												<li><a href="teenclass.html">Teens Class</a></li>
												<li><a href="adultclass.html">Adults Class</a></li>
											</ul>
										</li>
										<li><a href="#"><div>Writing</div></a>
											<ul>
												<li><a href="childernclass.php">Children Class</a></li>
												<li><a href="teenclass.html">Teens Class</a></li>
												<li><a href="adultclass.html">Adults Class</a></li>
											</ul>
										</li>
										<li><a href="#"><div>English For Spesific Purpose (ESP)</div></a>
											<ul>
												<li><a href="childernclass.php">Children Class</a></li>
												<li><a href="teenclass.html">Teens Class</a></li>
												<li><a href="adultclass.html">Adults Class</a></li>
											</ul>
										</li>
									</ul>
								</li>
								<li><a href="#"><div>IELTS</div></a>
									<ul>
										<li><a href="generaltraining.html"><div>General Training</div></a></li>
										<li><a href="academic.html"><div>Academic</div></a></li>
									</ul>
								</li>
								<li><a href="toeic.html"><div>TOEIC</div></a></li>
								<li><a href="#"><div>Komputer</div></a>
									<ul>
										<li><a href="msoffice.html"><div>Microsoft Office</div></a></li>
										<li><a href="desaingrafis.html"><div>Desain Grafis</div></a></li>
										<li><a href="komputerjaringan.html"><div>Komputer Jaringan</div></a></li>
										<li><a href="akuntansi.html"><div>Akuntansi</div></a></li>
									</ul>
								</li>
								<li><a href="#"><div>Bahasa Asing Lainnya</div></a>
									<ul>
										<li><a href="jepang.html"><div>Jepang</div></a></li>
										<li><a href="korea.html"><div>Korea</div></a></li>
										<li><a href="mandarin.html"><div>Mandarin</div></a></li>
										<li><a href="jerman.html"><div>Jerman</div></a></li>
										<li><a href="perancis.html"><div>Perancis</div></a></li>
										<li><a href="arab.html"><div>Arab</div></a></li>
									</ul>
								</li>
								<li><a href="#"><div>Pelajaran Umum</div></a>
									<ul>
										<li><a href="#"><div>Matematika</div></a></li>
										<li><a href="#"><div>Fisika</div></a></li>
									</ul>
								</li>
							</ul>
						</li>
						<li><a href="#"><div>TOEFL ITP</div></a>
							<ul style="opacity:0.9">
								<li><a href="#"><div>TOEFL ITP Test</div></a></li>
								<li><a href="#"><div>TOEFL ITP Try Out</div></a></li>
								<li><a href="#"><div>TOEFL ITP Training</div></a></li>
							</ul>
						</li>
						<li class=""><a href="fasilitas.html"><div>Fasilitas</div></a></li>
						<li class=""><a href="#"><div>Galeri</div></a></li>
						<li class=""><a href="alumni.html"><div>Alumni</div></a></li>
						<li class=""><a href="#"><div>Event</div></a></li>
						<li class=""><a href="meetourteam.html"><div>Meet Our Team</div></a></li>
					</ul>
				</nav><!-- #primary-menu end -->				</div>
		</div>
	</header><!-- #header end -->

	<section id="slider" class="slider-parallax swiper_wrapper full-screen clearfix">
		<div class="slider-parallax-inner">
			<div class="swiper-container swiper-parent">
				<div class="swiper-wrapper">
					<?php
					$ambil=$koneksi->prepare("
							SELECT
                        		*
                    		FROM
                        		slider
                    		WHERE
                        		status = 1"
					);
					$ambil->execute();
					while($tampil=$ambil->fetch()){
						?>
						<div class="swiper-slide dark" style="background-image: url('<?php echo $url.'gambarslider/'.$tampil['gambar_slider']; ?>');">
							<div class="container clearfix">
								<div class="slider-caption slider-caption-center">
								</div>
							</div>
						</div>
					<?php } ?>
					<!--<div class="swiper-slide dark" style="background-image: url('ImageSlide/2.png');">-->
					<!--<div class="container clearfix">-->
					<!--<div class="slider-caption slider-caption-center">-->
					<!--</div>-->
					<!--</div>-->
					<!--</div>-->
					<!--<div class="swiper-slide dark" style="background-image: url('ImageSlide/slider3.png');">-->
					<!--<div class="container clearfix">-->
					<!--<div class="slider-caption slider-caption-center">-->
					<!--</div>-->
					<!--</div>-->
					<!--</div>-->
					<!--<div class="swiper-slide dark" style="background-image: url('ImageSlide/4.png');">-->
					<!--<div class="container clearfix">-->
					<!--<div class="slider-caption slider-caption-center">-->
					<!--</div>-->
					<!--</div>-->
					<!--</div>-->
					<!--<div class="swiper-slide dark" style="background-image: url('ImageSlide/5.png');">-->
					<!--<div class="container clearfix">-->
					<!--<div class="slider-caption slider-caption-center">-->
					<!--</div>-->
					<!--</div>-->
					<!--</div>-->
					<!--<div class="swiper-slide dark" style="background-image: url('ImageSlide/6.png');">-->
					<!--<div class="container clearfix">-->
					<!--<div class="slider-caption slider-caption-center">-->
					<!--</div>-->
					<!--</div>-->
					<!--</div>-->
					<!--<div class="swiper-slide dark" style="background-image: url('ImageSlide/7.png');">-->
					<!--<div class="container clearfix">-->
					<!--<div class="slider-caption slider-caption-center">-->
					<!--</div>-->
					<!--</div>-->
					<!--</div>-->
					<!--<div class="swiper-slide dark" style="background-image: url('ImageSlide/8.png');">-->
					<!--<div class="container clearfix">-->
					<!--<div class="slider-caption slider-caption-center">-->
					<!--</div>-->
					<!--</div>-->
					<!--</div>-->
				</div>
				<div id="slider-arrow-left"><i class="icon-angle-left"></i></div>
				<div id="slider-arrow-right"><i class="icon-angle-right"></i></div>
			</div>

			<a href="#" data-scrollto="#content" data-offset="100" class="dark one-page-arrow"><i class="icon-angle-down infinite animated fadeInDown"></i></a>
		</div>
	</section>

	<!-- Content
    ============================================= -->
	<section id="content">
		<div class="content-wrap">
			<div class="container clearfix">
				<div class="row clearfix">
					<div class="col-lg-5">
						<!--
                                                    <div class="heading-block topmargin">
                         -->
						<div class="heading-block" style="padding-bottom: 15px; margin-bottom: 15px">
							<h1>Texas<br />English Course</h1>
						</div>
						<p class="lead">berdiri selama kurang lebih 21 tahun tahun di Kabupaten Jember, Jawa Timur. Saat ini kami telah mendidik tidak kurang 10.000 siswa baik yang berasal dari Kabupaten Jember dan kota-kota lain disekitarnya, seperti Bondowoso, Lumajang, Probolinggo, dan Situbondo..</p>
					</div>

					<div class="col-lg-7">
						<div style="position: relative; margin-bottom: -60px;" class="ohidden" data-height-lg="426" data-height-md="567" data-height-sm="470" data-height-xs="287" data-height-xxs="183">
							<img src="ImageSlide/1.png" style="position: absolute; top: 0; left: 0;" data-animate="fadeInUp" data-delay="100" alt="Texas">
							<!--
                                                            <img src="http://notohadinegoro.co.id//assets/images/services/main-fmobile.png" style="position: absolute; top: 0; left: 0;" data-animate="fadeInUp" data-delay="400" alt="iPad">
                             -->
						</div>
					</div>
				</div>
			</div>

			<div class="section nobottommargin">
				<div class="container clear-bottommargin clearfix">
					<div class="row topmargin-sm clearfix">
						<div class="col-md-4 bottommargin">
							<i class="i-plain color i-large icon-line2-screen-desktop inline-block" style="margin-bottom: 15px;"></i>
							<div class="heading-block nobottomborder" style="margin-bottom: 15px;">
								<span class="before-heading">Supporting Your Bussiness.</span>
								<h4>Responsive &amp; Developing</h4>
							</div>
							<p>Texas ready to focus your business planning. through the organization's systems engineering, human resources, targeted promotions and marketing.</p>
						</div>

						<div class="col-md-4 bottommargin">
							<i class="i-plain color i-large icon-line2-energy inline-block" style="margin-bottom: 15px;"></i>
							<div class="heading-block nobottomborder" style="margin-bottom: 15px;">
								<span class="before-heading">Quick Response &amp; Experience Research.</span>
								<h4>Powerful Performance</h4>
							</div>
							<p>with heartfelt service and quick response makes Texas group as a company that deserves to be your business partner.</p>
						</div>

						<div class="col-md-4 bottommargin">
							<i class="i-plain color i-large icon-line2-equalizer inline-block" style="margin-bottom: 15px;"></i>
							<div class="heading-block nobottomborder" style="margin-bottom: 15px;">
								<span class="before-heading">Flexible &amp; Customizable.</span>
								<h4>A Trusted Company</h4>
							</div>
							<p>
								with a good level of service and reliable solutions Texas group can do research on your company's needs.</p>
						</div>
					</div>
				</div>
			</div>

			<div class="container clearfix">
				<div class="row topmargin-lg bottommargin-sm">
					<div class="heading-block center">
						<h2>Bidang Bisnis Texas English Course</h2>
						<span class="divcenter">Philanthropy convener livelihoods, initiative end hunger gender rights local. John Lennon storytelling; advocate, altruism impact catalyst.</span>
					</div>

					<div class="col-md-4 col-sm-6 bottommargin">
						<div class="feature-box fbox-right topmargin" data-animate="fadeIn">
							<div class="fbox-icon">
								<a href="#"><i class="icon-line-check"></i></a>
							</div>
							<h3>English </h3>
							<p>Stretch your Website to the Full Width or make it boxed to surprise your visitors.</p>
						</div>

						<div class="feature-box fbox-right topmargin" data-animate="fadeIn" data-delay="200">
							<div class="fbox-icon">
								<a href="#"><i class="icon-line-check"></i></a>
							</div>
							<h3>Bahasa Asing</h3>
							<p>We have covered each &amp; everything in our Docs including Videos &amp; Screenshots.</p>
						</div>
					</div>

					<div class="col-md-4 hidden-sm bottommargin center">
						<!-- <img src="kind.png" alt=""> -->
					</div>

					<div class="col-md-4 col-sm-6 bottommargin">
						<div class="feature-box topmargin" data-animate="fadeIn">
							<div class="fbox-icon">
								<a href="#"><i class="icon-line-check"></i></a>
							</div>
							<h3>Komputer</h3>
							<p>Canvas provides support for Native HTML5 Videos that can be added to a Background.</p>
						</div>

						<div class="feature-box topmargin" data-animate="fadeIn" data-delay="200">
							<div class="fbox-icon">
								<a href="#"><i class="icon-line-check"></i></a>
							</div>
							<h3>Pelajaran Umum</h3>
							<p>Complete control on each &amp; every element that provides endless customization.</p>
						</div>

					</div>
				</div>
			</div>

			<div class="row clearfix common-height">
				<!-- 		<div class="col-md-6  col-padding" style="background: url('') center center no-repeat; background-size: cover;">
                            <div>&nbsp;</div>
                        </div> -->

				<div class="col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1 col-sm-12 center col-padding" style="background-color: #F5F5F5;">
					<div>
						<div class="heading-block nobottomborder">
							<!-- <span class="before-heading color">Easily Understandable &amp; Customizable.</span> -->
							<h3 style="color: black">Walkthrough Videos &amp; Demos</h3>
						</div>

						<div class="center bottommargin">
							<!-- <a href="https://youtu.be/cV2HjwZKfAA" data-lightbox="iframe" style="position: relative;"> -->
							<iframe width="560" height="315" src="https://www.youtube.com/embed/cV2HjwZKfAA?ecver=1" frameborder="0" allowfullscreen></iframe>
							<!-- <img src="services/video.jpg" alt="Video"> -->
							<!-- <span class="i-overlay nobg"><img src="image/galeri1.jpg" alt="Play"></span> -->
							<!-- </a> -->
						</div>
					</div>
				</div>
			</div>

			<div class="section topmargin nobottommargin nobottomborder">
				<div class="container clearfix">
					<div class="heading-block center nomargin">
						<h3>Our Latest Works</h3>
					</div>
				</div>
			</div>

			<!-- <div id="portfolio" class="portfolio portfolio-nomargin grid-container portfolio-notitle portfolio-full grid-container clearfix">
                <article class="portfolio-item pf-media pf-icons">
                    <div class="portfolio-image">
                        <a href="portfolio-single.html">
                            <img src="" alt="Open Imagination">
                        </a>
                        <div class="portfolio-overlay">
                            <a href="" class="left-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>
                            <a href="portfolio-single.html" class="right-icon"><i class="icon-line-ellipsis"></i></a>
                        </div>
                    </div>
                    <div class="portfolio-desc">
                        <h3><a href="portfolio-single.html">Open Imagination</a></h3>
                        <span><a href="#">Media</a>, <a href="#">Icons</a></span>
                    </div>
                </article>

                <article class="portfolio-item pf-illustrations">
                    <div class="portfolio-image">
                        <a href="portfolio-single.html">
                            <img src="2.jpg" alt="Locked Steel Gate">
                        </a>
                        <div class="portfolio-overlay">
                            <a href="images/portfolio/full/2.jpg" class="left-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>
                            <a href="portfolio-single.html" class="right-icon"><i class="icon-line-ellipsis"></i></a>
                        </div>
                    </div>
                    <div class="portfolio-desc">
                        <h3><a href="portfolio-single.html">Locked Steel Gate</a></h3>
                        <span><a href="#">Illustrations</a></span>
                    </div>
                </article>

                <article class="portfolio-item pf-graphics pf-uielements">
                    <div class="portfolio-image">
                        <a href="#">
                            <img src="3.jpg" alt="Mac Sunglasses">
                        </a>
                        <div class="portfolio-overlay">
                            <a href="http://vimeo.com/89396394" class="left-icon" data-lightbox="iframe"><i class="icon-line-play"></i></a>
                            <a href="portfolio-single-video.html" class="right-icon"><i class="icon-line-ellipsis"></i></a>
                        </div>
                    </div>
                    <div class="portfolio-desc">
                        <h3><a href="portfolio-single-video.html">Mac Sunglasses</a></h3>
                        <span><a href="#">Graphics</a>, <a href="#">UI Elements</a></span>
                    </div>
                </article>

                <article class="portfolio-item pf-icons pf-illustrations">
                    <div class="portfolio-image">
                        <a href="portfolio-single.html">
                            <img src="4.jpg" alt="Open Imagination">
                        </a>
                        <div class="portfolio-overlay" data-lightbox="gallery">
                            <a href="images/portfolio/full/4.jpg" class="left-icon" data-lightbox="gallery-item"><i class="icon-line-stack-2"></i></a>
                            <a href="images/portfolio/full/4-1.jpg" class="hidden" data-lightbox="gallery-item"></a>
                            <a href="portfolio-single-gallery.html" class="right-icon"><i class="icon-line-ellipsis"></i></a>
                        </div>
                    </div>
                    <div class="portfolio-desc">
                        <h3><a href="portfolio-single-gallery.html">Morning Dew</a></h3>
                        <span><a href="#"><a href="#">Icons</a>, <a href="#">Illustrations</a></span>
                    </div>
                </article>

                <article class="portfolio-item pf-uielements pf-media">
                    <div class="portfolio-image">
                        <a href="portfolio-single.html">
                            <img src="5.jpg" alt="Console Activity">
                        </a>
                        <div class="portfolio-overlay">
                            <a href="images/portfolio/full/5.jpg" class="left-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>
                            <a href="portfolio-single.html" class="right-icon"><i class="icon-line-ellipsis"></i></a>
                        </div>
                    </div>
                    <div class="portfolio-desc">
                        <h3><a href="portfolio-single.html">Console Activity</a></h3>
                        <span><a href="#">UI Elements</a>, <a href="#">Media</a></span>
                    </div>
                </article>

                <article class="portfolio-item pf-graphics pf-illustrations">
                    <div class="portfolio-image">
                        <a href="portfolio-single.html">
                            <img src="6.jpg" alt="Open Imagination">
                        </a>
                        <div class="portfolio-overlay" data-lightbox="gallery">
                            <a href="images/portfolio/full/6.jpg" class="left-icon" data-lightbox="gallery-item"><i class="icon-line-stack-2"></i></a>
                            <a href="images/portfolio/full/6-1.jpg" class="hidden" data-lightbox="gallery-item"></a>
                            <a href="images/portfolio/full/6-2.jpg" class="hidden" data-lightbox="gallery-item"></a>
                            <a href="images/portfolio/full/6-3.jpg" class="hidden" data-lightbox="gallery-item"></a>
                            <a href="portfolio-single-gallery.html" class="right-icon"><i class="icon-line-ellipsis"></i></a>
                        </div>
                    </div>
                    <div class="portfolio-desc">
                        <h3><a href="portfolio-single-gallery.html">Shake It!</a></h3>
                        <span><a href="#">Illustrations</a>, <a href="#">Graphics</a></span>
                    </div>
                </article>

                <article class="portfolio-item pf-uielements pf-icons">
                    <div class="portfolio-image">
                        <a href="portfolio-single-video.html">
                            <img src="7.jpg" alt="Backpack Contents">
                        </a>
                        <div class="portfolio-overlay">
                            <a href="http://www.youtube.com/watch?v=kuceVNBTJio" class="left-icon" data-lightbox="iframe"><i class="icon-line-play"></i></a>
                            <a href="portfolio-single-video.html" class="right-icon"><i class="icon-line-ellipsis"></i></a>
                        </div>
                    </div>
                    <div class="portfolio-desc">
                        <h3><a href="portfolio-single-video.html">Backpack Contents</a></h3>
                        <span><a href="#">UI Elements</a>, <a href="#">Icons</a></span>
                    </div>
                </article>

                <article class="portfolio-item pf-graphics">
                    <div class="portfolio-image">
                        <a href="portfolio-single.html">
                            <img src="4/8.jpg" alt="Sunset Bulb Glow">
                        </a>
                        <div class="portfolio-overlay">
                            <a href="images/portfolio/full/8.jpg" class="left-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>
                            <a href="portfolio-single.html" class="right-icon"><i class="icon-line-ellipsis"></i></a>
                        </div>
                    </div>
                    <div class="portfolio-desc">
                        <h3><a href="portfolio-single.html">Sunset Bulb Glow</a></h3>
                        <span><a href="#">Graphics</a></span>
                    </div>
                </article>

            </div>


            <div class="clear"></div>

            <a href="portfolio.html" class="button button-full button-dark center tright bottommargin-lg">
                <div class="container clearfix">
                    More than 100+ predefined Portfolio Grid Layouts. <strong>See More</strong> <i class="icon-caret-right" style="top:4px;"></i>
                </div>
            </a>
-->
			<div class="container clearfix">

				<div class="col_three_third bottommargin-sm col_last">

					<center>
						<div class="heading-block topmargin-sm center">
							<h3 >Get Direction</h3>
						</div>
						<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d246.82419734226391!2d113.67511267055224!3d-8.183893084642193!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x6418b23a238fbc95!2sLKP+Texas!5e0!3m2!1sen!2sid!4v1484290317357" frameborder="0" style="border:0; " allowfullscreen></iframe>
					</center>
					<p class="text-center" style="font-size:20px">Jl. Imam Bonjol 31A, Kaliwates, Jember 68133</br>
						Jawa Timur - Indonesia</br>
						Telp. (0331) 424013/081358202426</p>

				</div>

			</div>

			<div class="container clearfix">

				<div class="col_three_third bottommargin-sm col_last">

					<div class="heading-block center">
						<h3>Galeri</h3>
					</div>
					<center>
						<!-- <div class="w3-content w3-section" style="max-width:500px">
                          <img class="mySlides w3-animated-top" src="image/galeri1.jpg" style="width:100%">
                          <img class="mySlides w3-animated-bottom" src="image/galeri2.jpg" style="width:100%">
                          <img class="mySlides w3-animated-top" src="image/galeri3.jpg" style="width:100%">
                          <img class="mySlides w3-animated-bottom" src="image/galeri4.jpg" style="width:100%">
                          <img class="mySlides w3-animated-top" src="image/galeri5.jpg" style="width:100%">
                          <img class="mySlides w3-animated-bottom" src="image/galeri6.jpg" style="width:100%">


                        </div>
                         -->

						<div id="carousel-example-generic" class="carousel slide " data-ride="carousel"  style="max-width:500px">
							<ol class="carousel-indicators">
								<?php
								$galeri=$koneksi->prepare("
														SELECT
															*
														FROM
															galeri
														WHERE
															status = 1"
								);
								$galeri->execute();
								$i=0;
								while($galeris=$galeri->fetch()){
									if($i==0) {
										?>
										<li data-target="#carousel-example-generic" data-slide-to="<?php echo $i; ?>"
											class="active"></li>
										<?php
									}else {
										?>
										<li data-target="#carousel-example-generic" data-slide-to="<?php echo $i; ?>"></li>
										<?php
									}
									$i++;
								} ?>
							</ol>
							<div class="carousel-inner" >

								<?php
								$galeri2=$koneksi->prepare("
														SELECT
															*
														FROM
															galeri
														WHERE
															status = 1"
								);
								$i=0;
								$galeri2->execute();
									while($galeris2=$galeri2->fetch()){
											if($i==0){
								?>
												<div class="item active">
													<img src="<?php echo $url.'gambargaleri/'.$galeris2['gambar_galeri']; ?>" width="500px" height="375px">
												</div>
												<?php }else{ ?>
								<div class="item">
									<img src="<?php echo $url.'gambargaleri/'.$galeris2['gambar_galeri']; ?>" width="500px" height="375px">
								</div>
								<?php }
								$i++;
									} ?>
							</div>
							<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
								<span class="fa fa-angle-left" style="margin-left: -17px"></span>
							</a>
							<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
								<span class="fa fa-angle-right" style="color: white"></span>
							</a>
						</div>
					</center>

				</div>
			</div>



			<div class="heading-block center" id="alumni">
				<h3 >What Clients Say?</h3>
			</div>

			<div class="fslider testimonial testimonial-full" data-animation="fade" data-arrows="false">
				<div class="flexslider">
					<div class="slider-wrap">
						<div class="slide">
							<!-- 	<div class="testi-image">
                                    <a href="#"><img src="3.jpg" alt="Customer Testimonails"></a>
                                </div> -->
							<div class="testi-content">
								<p>Belajar Conversation dan presentasi di TEXAS membuat saya lebih percaya diri dan tahun 2014 saya bisa meraih juara 1 guru dan tenaga kependidikan yang berdedikasi se-Jawa Timur. Terima kasih TEXAS</p>
								<div class="testi-meta">
									Unshita Rini
									<span>Juara 1 Guru TK Berprestasi</span>
								</div>
							</div>
						</div>

						<div class="slide">
							<!-- 		<div class="testi-image">
										<a href="#"><img src="2.jpg" alt="Customer Testimonails"></a>
									</div> -->
							<div class="testi-content">
								<p>TEXAS is a gread place, because I can improve my English better. You should come to TEXAS that has many advantages to improve your English ability and capability. I take conversation, TOEFL, IELTS and Chinese, now I a student of National Taiwan University of Science and Tech. Thanks TEXAS..!!</p>
								<div class="testi-meta">
									Setya Widyawan P, ST
									<span>Alumni UNEJ</span>
								</div>
							</div>
						</div>

						<div class="slide">
							<!-- 	<div class="testi-image">
                                    <a href="#"><img src="1.jpg" alt="Customer Testimonails"></a>
                                </div> -->
							<div class="testi-content">
								<p>TEXAS is a nice place to improve our languages. Like English, Japanese, Mandarin, French, etc. besides, we can join the English club and French club to increase our speaking comprehensions. </p>
								<div class="testi-meta">
									Wendy Triadji Nugroho, ST, MT, M.Sc.
									<span>Dosen Politeknik Negeri Jember</span>
								</div>
							</div>
						</div>

						<div class="slide">
							<!-- 	<div class="testi-image">
                                    <a href="#"><img src="1.jpg" alt="Customer Testimonails"></a>
                                </div> -->
							<div class="testi-content">
								<p>Nothing else I could say to TEXAS, Thank you so much for every great you’ve given. For every single words you told, it’s all just really meaningful for me and my study. Thanks TEXAS…!!!</p>
								<div class="testi-meta">
									Avicena
									<span>Mahasiswa Fak. Hukum Universitas Indonesia</span>
								</div>
							</div>
						</div>

						<div class="slide">
							<!-- 	<div class="testi-image">
                                    <a href="#"><img src="1.jpg" alt="Customer Testimonails"></a>
                                </div> -->
							<div class="testi-content">
								<p>Learning in TEXAS we=as very comfortable and relaxing. I get motivated to learn more here, because the lecturer is very patient and care with my progress. Now I have convidence in English conversation. Thanks TEXAS… !!!</p>
								<div class="testi-meta">
									Mevita Cahyani
									<span>Graduated from ITS</span>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>

		</div>

		<div class="section notopmargin notopborder">
			<div class="container clearfix">
				<div class="heading-block center nomargin">
					<h3>Latest from the Blog</h3>
				</div>
			</div>
		</div>

		<div class="container clear-bottommargin clearfix">
			<div class="row">

				<div class="col-md-3 col-sm-6 bottommargin">
					<div class="ipost clearfix">
						<div class="entry-image">
							<!-- <a href="#"><img class="image_fade" src="1.jpg" alt="Image"></a> -->
						</div>
						<div class="entry-title">
							<h3><a href="blog-single.html">Bloomberg smart cities; change-makers economic security</a></h3>
						</div>
						<ul class="entry-meta clearfix">
							<li><i class="icon-calendar3"></i> 13th Jun 2014</li>
							<li><a href="blog-single.html#comments"><i class="icon-comments"></i> 53</a></li>
						</ul>
						<div class="entry-content">
							<p>Prevention effect, advocate dialogue rural development lifting people up community civil society. Catalyst, grantees leverage.</p>
						</div>
					</div>
				</div>

				<div class="col-md-3 col-sm-6 bottommargin">
					<div class="ipost clearfix">
						<div class="entry-image">
							<!-- <a href="#"><img class="image_fade" src="2.jpg" alt="Image"></a> -->
						</div>
						<div class="entry-title">
							<h3><a href="blog-single.html">Medicine new approaches communities, outcomes partnership</a></h3>
						</div>
						<ul class="entry-meta clearfix">
							<li><i class="icon-calendar3"></i> 24th Feb 2014</li>
							<li><a href="blog-single.html#comments"><i class="icon-comments"></i> 17</a></li>
						</ul>
						<div class="entry-content">
							<p>Cross-agency coordination clean water rural, promising development turmoil inclusive education transformative community.</p>
						</div>
					</div>
				</div>

				<div class="col-md-3 col-sm-6 bottommargin">
					<div class="ipost clearfix">
						<div class="entry-image">
							<!-- <a href="#"><img class="image_fade" src="3.jpg" alt="Image"></a> -->
						</div>
						<div class="entry-title">
							<h3><a href="blog-single.html">Significant altruism planned giving insurmountable challenges liberal</a></h3>
						</div>
						<ul class="entry-meta clearfix">
							<li><i class="icon-calendar3"></i> 30th Dec 2014</li>
							<li><a href="blog-single.html#comments"><i class="icon-comments"></i> 13</a></li>
						</ul>
						<div class="entry-content">
							<p>Micro-finance; vaccines peaceful contribution citizens of change generosity. Measures design thinking accelerate progress medical initiative.</p>
						</div>
					</div>
				</div>

				<div class="col-md-3 col-sm-6 bottommargin">
					<div class="ipost clearfix">
						<div class="entry-image">
							<!-- <a href="#"><img class="image_fade" src="4.jpg" alt="Image"></a> -->
						</div>
						<div class="entry-title">
							<h3><a href="blog-single.html">Compassion conflict resolution, progressive; tackle</a></h3>
						</div>
						<ul class="entry-meta clearfix">
							<li><i class="icon-calendar3"></i> 15th Jan 2014</li>
							<li><a href="blog-single.html#comments"><i class="icon-comments"></i> 54</a></li>
						</ul>
						<div class="entry-content">
							<p>Community health workers best practices, effectiveness meaningful work The Elders fairness. Our ambitions local solutions globalization.</p>
						</div>
					</div>
				</div>

			</div>
		</div>

		<div class="section">
			<div class="container clearfix">

				<div class="row topmargin-sm">

					<div class="heading-block center">
						<h3>Meet Our Team</h3>
					</div>

					<div class="col-md-3 col-sm-6 bottommargin">

						<div class="team">
							<div class="team-image">
								<img src="image/lucia-ebr.png" alt="Lucia EBR" style="height:350px">
							</div>
							<div class="team-desc team-desc-bg">
								<div class="team-title"><h4>Lucia E. B. R.</h4><span>Owner<span></div>
								<a href="#" class="social-icon inline-block si-small si-light si-rounded si-facebook">
									<i class="icon-facebook"></i>
									<i class="icon-facebook"></i>
								</a>
								<a href="#" class="social-icon inline-block si-small si-light si-rounded si-twitter">
									<i class="icon-twitter"></i>
									<i class="icon-twitter"></i>
								</a>
								<a href="#" class="social-icon inline-block si-small si-light si-rounded si-gplus">
									<i class="icon-gplus"></i>
									<i class="icon-gplus"></i>
								</a>
							</div>
						</div>

					</div>

					<div class="col-md-3 col-sm-6 bottommargin">

						<div class="team">
							<div class="team-image" >
								<img src="image/ayu-julia.png" alt="Ayu Julia" style="height:350px">
							</div>
							<div class="team-desc team-desc-bg">
								<div class="team-title"><h4>Ayu Julia</h4><span>Admin</span></div>
								<a href="#" class="social-icon inline-block si-small si-light si-rounded si-facebook">
									<i class="icon-facebook"></i>
									<i class="icon-facebook"></i>
								</a>
								<a href="#" class="social-icon inline-block si-small si-light si-rounded si-twitter">
									<i class="icon-twitter"></i>
									<i class="icon-twitter"></i>
								</a>
								<a href="#" class="social-icon inline-block si-small si-light si-rounded si-gplus">
									<i class="icon-gplus"></i>
									<i class="icon-gplus"></i>
								</a>
							</div>
						</div>

					</div>

					<div class="col-md-3 col-sm-6 bottommargin">

						<div class="team">
							<div class="team-image">
								<img src="image/imam-ashari.png" alt="Imam Ashari" style="height:350px">
							</div>
							<div class="team-desc team-desc-bg">
								<div class="team-title"><h4>Imam Ashari</h4><span>Admin</span></div>
								<a href="#" class="social-icon inline-block si-small si-light si-rounded si-facebook">
									<i class="icon-facebook"></i>
									<i class="icon-facebook"></i>
								</a>
								<a href="#" class="social-icon inline-block si-small si-light si-rounded si-twitter">
									<i class="icon-twitter"></i>
									<i class="icon-twitter"></i>
								</a>
								<a href="#" class="social-icon inline-block si-small si-light si-rounded si-gplus">
									<i class="icon-gplus"></i>
									<i class="icon-gplus"></i>
								</a>
							</div>
						</div>

					</div>

					<div class="col-md-3 col-sm-6 bottommargin">

						<div class="team">
							<div class="team-image">
								<img src="image/uswatun-hasanah.png" alt="Uswatun Hasanah" style="height:350px">
							</div>
							<div class="team-desc team-desc-bg">
								<div class="team-title"><h4>Uswatun Hasanah</h4><span>Admin</span></div>
								<a href="#" class="social-icon inline-block si-small si-light si-rounded si-facebook">
									<i class="icon-facebook"></i>
									<i class="icon-facebook"></i>
								</a>
								<a href="#" class="social-icon inline-block si-small si-light si-rounded si-twitter">
									<i class="icon-twitter"></i>
									<i class="icon-twitter"></i>
								</a>
								<a href="#" class="social-icon inline-block si-small si-light si-rounded si-gplus">
									<i class="icon-gplus"></i>
									<i class="icon-gplus"></i>
								</a>
							</div>
						</div>

					</div>

				</div>

			</div>
		</div>

		<div class="container clearfix">

			<div id="oc-clients" class="owl-carousel image-carousel carousel-widget" data-margin="60" data-loop="true" data-nav="false" data-autoplay="5000" data-pagi="false" data-items-xxs="2" data-items-xs="3" data-items-sm="4" data-items-md="5" data-items-lg="6">

				<!-- <div class="oc-item"><a href="#"><img src="http://notohadinegoro.co.id//assets/images/clients/1.png" alt="Clients"></a></div> -->
				<!-- <div class="oc-item"><a href="#"><img src="http://notohadinegoro.co.id//assets/images/clients/2.png" alt="Clients"></a></div> -->
				<!-- <div class="oc-item"><a href="#"><img src="http://notohadinegoro.co.id//assets/images/clients/3.png" alt="Clients"></a></div> -->
				<!-- <div class="oc-item"><a href="#"><img src="http://notohadinegoro.co.id//assets/images/clients/4.png" alt="Clients"></a></div> -->
				<!-- <div class="oc-item"><a href="#"><img src="http://notohadinegoro.co.id//assets/images/clients/5.png" alt="Clients"></a></div> -->
				<!-- <div class="oc-item"><a href="#"><img src="http://notohadinegoro.co.id//assets/images/clients/6.png" alt="Clients"></a></div> -->
				<!-- <div class="oc-item"><a href="#"><img src="http://notohadinegoro.co.id//assets/images/clients/7.png" alt="Clients"></a></div> -->
				<!-- <div class="oc-item"><a href="#"><img src="http://notohadinegoro.co.id//assets/images/clients/8.png" alt="Clients"></a></div> -->
				<!-- <div class="oc-item"><a href="#"><img src="http://notohadinegoro.co.id//assets/images/clients/9.png" alt="Clients"></a></div> -->
				<!-- <div class="oc-item"><a href="#"><img src="http://notohadinegoro.co.id//assets/images/clients/10.png" alt="Clients"></a></div> -->

			</div>


		</div>

</div>

</section><!-- #content end -->

<!-- Footer
============================================= -->
<footer id="footer" class="dark">

	<div class="container">

		<!-- Footer Widgets
        ============================================= -->
		<div class="footer-widgets-wrap clearfix">

			<div class="col_two_third">

				<div class="col_one_third">

					<div class="widget clearfix">

						<!-- <img src="images/logo.png" alt="" class=""> -->

						<p>We believe in <strong>Simple</strong>, <strong>Creative</strong> &amp; <strong>Flexible</strong> Design Standards.</p>

						<div style="background: url('images/world-map.png') no-repeat center center; background-size: 100%;">
							<address>

								Jl. Imam Bonjol 31A, Kaliwates, Jember 68133</br>
								Jawa Timur - Indonesia</br>

							</address>
							<abbr title="Phone Number"><strong>Phone:</strong></abbr> (0331) 424013/081358202426<br>
							<abbr title="Email Address"><strong>Website:</strong></abbr> texas-englishcourse.com
						</div>

					</div>

				</div>

				<div class="col_one_third">

					<div class="widget widget_links clearfix">

						<h4>Blogroll</h4>

						<ul>
							<li><a href="#">Documentation</a></li>
							<li><a href="#">Feedback</a></li>
							<li><a href="#">Plugins</a></li>
							<li><a href="#">Support Forums</a></li>
							<li><a href="#">Themes</a></li>
							<li><a href="#">WordPress Blog</a></li>
							<li><a href="#">WordPress Planet</a></li>
						</ul>

					</div>

				</div>

				<div class="col_one_third col_last">

					<div class="widget clearfix">
						<h4>Recent Posts</h4>

						<div id="post-list-footer">
							<div class="spost clearfix">
								<div class="entry-c">
									<div class="entry-title">
										<h4><a href="#">Lorem ipsum dolor sit amet, consectetur</a></h4>
									</div>
									<ul class="entry-meta">
										<li>10th July 2014</li>
									</ul>
								</div>
							</div>

							<div class="spost clearfix">
								<div class="entry-c">
									<div class="entry-title">
										<h4><a href="#">Elit Assumenda vel amet dolorum quasi</a></h4>
									</div>
									<ul class="entry-meta">
										<li>10th July 2014</li>
									</ul>
								</div>
							</div>

							<div class="spost clearfix">
								<div class="entry-c">
									<div class="entry-title">
										<h4><a href="#">Debitis nihil placeat, illum est nisi</a></h4>
									</div>
									<ul class="entry-meta">
										<li>10th July 2014</li>
									</ul>
								</div>
							</div>
						</div>
					</div>

				</div>

			</div>

			<div class="col_one_third col_last">

				<div class="widget clearfix" style="margin-bottom: -20px;">

					<div class="row">

						<div class="col-md-6 bottommargin-sm">
							<div class="counter counter-small"><span data-from="50" data-to="15065421" data-refresh-interval="80" data-speed="3000" data-comma="true"></span></div>
							<h5 class="nobottommargin">Total Downloads</h5>
						</div>

						<div class="col-md-6 bottommargin-sm">
							<div class="counter counter-small"><span data-from="100" data-to="18465" data-refresh-interval="50" data-speed="2000" data-comma="true"></span></div>
							<h5 class="nobottommargin">Clients</h5>
						</div>

					</div>

				</div>

				<div class="widget subscribe-widget clearfix">
					<h5><strong>Subscribe</strong> to Our Newsletter to get Important News, Amazing Offers &amp; Inside Scoops:</h5>
					<div class="widget-subscribe-form-result"></div>
					<form id="widget-subscribe-form" action="include/subscribe.php" role="form" method="post" class="nobottommargin">
						<div class="input-group divcenter">
							<span class="input-group-addon"><i class="icon-email2"></i></span>
							<input type="email" id="widget-subscribe-form-email" name="widget-subscribe-form-email" class="form-control required email" placeholder="Enter your Email">
							<span class="input-group-btn">
										<button class="btn btn-success" type="submit">Subscribe</button>
									</span>
						</div>
					</form>
				</div>

				<div class="widget clearfix" style="margin-bottom: -20px;">

					<div class="row">

						<div class="col-md-6 clearfix bottommargin-sm">
							<a href="#" class="social-icon si-dark si-colored si-facebook nobottommargin" style="margin-right: 10px;">
								<i class="icon-facebook"></i>
								<i class="icon-facebook"></i>
							</a>
							<a href="#"><small style="display: block; margin-top: 3px;"><strong>Like us</strong><br>on Facebook</small></a>
						</div>
						<div class="col-md-6 clearfix">
							<a href="#" class="social-icon si-dark si-colored si-rss nobottommargin" style="margin-right: 10px;">
								<i class="icon-rss"></i>
								<i class="icon-rss"></i>
							</a>
							<a href="#"><small style="display: block; margin-top: 3px;"><strong>Subscribe</strong><br>to RSS Feeds</small></a>
						</div>

					</div>

				</div>

			</div>

		</div><!-- .footer-widgets-wrap end -->

	</div>

	<!-- Copyrights
    ============================================= -->
	<div id="copyrights">

		<div class="container clearfix">

			<div class="col_half">
				Copyrights &copy; 2016 All Rights Reserved by <a href="http://null.co.id/">CV. Null Computindo</a><br>
				<div class="copyright-links"><a href="#">Terms of Use</a> / <a href="#">Privacy Policy</a></div>
			</div>

			<div class="col_half col_last tright">
				<div class="fright clearfix">
					<a href="#" class="social-icon si-small si-borderless si-instagram">
						<i class="icon-instagram"></i>
						<i class="icon-instagram"></i>
					</a>

					<a href="#" class="social-icon si-small si-borderless si-facebook">
						<i class="icon-facebook"></i>
						<i class="icon-facebook"></i>
					</a>

					<a href="#" class="social-icon si-small si-borderless si-twitter">
						<i class="icon-twitter"></i>
						<i class="icon-twitter"></i>
					</a>

					<a href="#" class="social-icon si-small si-borderless si-gplus">
						<i class="icon-gplus"></i>
						<i class="icon-gplus"></i>
					</a>

					<a href="#" class="social-icon si-small si-borderless si-pinterest">
						<i class="icon-pinterest"></i>
						<i class="icon-pinterest"></i>
					</a>

					<a href="#" class="social-icon si-small si-borderless si-vimeo">
						<i class="icon-vimeo"></i>
						<i class="icon-vimeo"></i>
					</a>

					<a href="#" class="social-icon si-small si-borderless si-github">
						<i class="icon-github"></i>
						<i class="icon-github"></i>
					</a>

					<a href="#" class="social-icon si-small si-borderless si-yahoo">
						<i class="icon-yahoo"></i>
						<i class="icon-yahoo"></i>
					</a>

					<a href="#" class="social-icon si-small si-borderless si-linkedin">
						<i class="icon-linkedin"></i>
						<i class="icon-linkedin"></i>
					</a>
				</div>

				<div class="clear"></div>

				<i class="icon-envelope2"></i> texas-englishcourse.com <span class="middot">&middot;</span> <i class="icon-headphones"></i> (0331) 424013/081358202426 <span class="middot">&middot;</span> <i class="icon-skype2"></i> CanvasOnSkype
			</div>

		</div>

	</div><!-- #copyrights end -->

</footer><!-- #footer end -->

</div><!-- #wrapper end -->

<!-- Go To Top
============================================= -->
<div id="gotoTop" class="icon-angle-up"></div>

<!-- External JavaScripts
============================================= -->
<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript" src="assets/js/plugins.js"></script>

<!-- Footer Scripts
============================================= -->
<script type="text/javascript" src="assets/js/functions.js"></script>

<script>
</script>

</body>
</html>