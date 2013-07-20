<?php
	$this->start('css');
	echo $this->Html->css('bootstrap');
	echo $this->Html->css('bootstrap-responsive');
	echo $this->Html->css('font-awesome.min');
	echo $this->Html->css('style');
	?>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,600,700' rel='stylesheet' type='text/css'>
	<!-- HTML5 shim, for IE6-8 support of HTML5 elements and IE Fallback-->
	<!--[if lt IE 9]>
	<script src="/js/html5shiv.js"></script>
		<link href="/css/ie.css" rel="stylesheet">
	<![endif]-->
    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/ico/icon-144.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/ico/icon-114.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/ico/icon-72.png">
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="/ico/icon-57.png">
	<?php 
	$this->end();
	$this->start('script');
	echo $this->Html->script('jquery-1.7.2.min');
	echo $this->Html->script('bootstrap.min');
	echo $this->Html->script('jquery.flexslider');
	echo $this->Html->script('jquery.scrollTo-1.4.3.1-min');
	echo $this->Html->script('jquery.localscroll-1.2.7-min');
	echo $this->Html->script('big-thing');
	$this->end();	
?>

<div class="wrapper">
	<!-- begins header -->
	<header class="header">
		<!-- begins navbar -->
		<div id="top-nav" class="navbar">
			<div class="navbar-inner">
				<div class="container">
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>					
					<a class="brand" data-section="body" href="/">
						<img src="/img/kanjime-logo.png" width="60" alt="Kanji Me!" />
						<h1 class="hide">KanjiMe! | Find out your name in Japanese</h1>
					</a>
					<nav id="main-menu" class="nav-collapse collapse">
						<h2 class="hide">Main Navigation</h2>
						<ul class="nav pull-right">
							<li><a href="#features-section">Features</a></li>
							<li><a href="#testimonials-section">Testimonials</a></li>
							<li><a href="#call-to-action">Download now</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
		<!-- ends navbar -->

		<!-- begins hero unit -->
		<div class="hero-unit">
			<div class="container">
			<div class="row-fluid">
			<div class="span6 hero-text">
				<h2 class="heading">Kanji Me!</h2>
				<p class="description">Would you like to know How your name is written in Kanji?</p>
				<img id="img-app-icon" src="/img/kanjime-logo.png" alt="Kanji Me!" />
				<a href="/" class="btn btn-primary"><img id="img-app-button" src="/img/btn-app-store.png" alt="Get App"/></a>
			</div>
			<div class="span6 hero-image">					
				<div id="hero-carousel" class="carousel slide">
					<div class="carousel-inner">
						<div class="item active">
							<img src="/img/slide-item1.png" alt="KanjiMe! App">
						</div>
						<div class="item">
							<img src="/img/slide-item2.png" alt="KanjiMe! App">
						</div>						
					</div>
				</div>
			</div>
			</div>
			</div>				
		</div>
		<!-- ends hero unit -->
	</header>
	<!-- ends header -->

	<!-- begins main content -->
	<div class="main-content">
		<section id="features-section" class="container section features">
			<div class="row-fluid feature-item">
				<div class="span6">
					<img src="/img/feature-bootstrap.png" alt="Feature" />
				</div>
				<div class="span6 right-text">
					<h2 class="heading">Search your name</h2>
					<p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
				</div>					
			</div>
			<hr />
			<div class="row-fluid feature-item">
				<div class="span6">
					<h2 class="heading">Publish your Japanese Name</h2>
					<p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
				</div>
				<div class="span6">
					<img src="/img/feature-responsive.png" class="no-shadow" alt="Feature" />
				</div>					
			</div>
			<!--
			<hr />
			<div class="row-fluid feature-item">
				<div class="span6">
					<img src="/img/feature-easy-customize.png" alt="Feature" />
				</div>
				<div class="span6 right-text">
					<h2 class="heading">EASY TO CUSTOMIZE</h2>
					<p class="description">Yes, it&#39;s easy to customize the template. Well-written and intuitive code will help you to grasp the structure, elements and style of the page. Moreover, you can check the documentation for detailed guides.</p>
				</div>
			</div>
			-->
		</section>
		<!--
		<section class="container section features-more">
			<h2 class="heading">and more...</h2>
			<div class="row-fluid">
				<div class="span3 more-item">
					<h3 class="heading"><i class="icon icon-html5"></i> HTML5 &amp; CSS3</h3>
					<div class="description">
						<p>Credibly exploit cutting-edge alignments for parallel experiences. Credibly utilize worldwide leadership through high-payoff deliverables. Progressively network intermandated human capital.</p>
						<a href="#" class="learn-more pull-right">Learn More &rarr;</a>
					</div>
				</div>
				<div class="span3 more-item">
					<h3 class="heading"><i class="icon icon-money"></i> Pricing Tables</h3>
					<div class="description">
						<p>Synergistically seize front-end information after client-centered results. Dramatically parallel task adaptive testing procedures rather than intermandated ROI. Synergistically leverage.</p>
						<a href="#" class="learn-more pull-right">Learn More &rarr;</a>
					</div>
				</div>
				<div class="span3 more-item">
					<h3 class="heading"><i class="icon icon-bar-chart"></i> SEO Optimized</h3>
					<div class="description">
						<p>Dynamically embrace goal-oriented core competencies without timely platforms. Appropriately exploit inexpensive sources for customized resources. Authoritatively deliver bleeding-edge portals.</p>
						<a href="#" class="learn-more pull-right">Learn More &rarr;</a>
					</div>
				</div>
				<div class="span3 more-item">
					<h3 class="heading"><i class="icon icon-file-alt"></i> Well Documented</h3>
					<div class="description">
						<p>Monotonectally negotiate best-of-breed convergence whereas highly efficient networks. Compellingly expedite optimal infomediaries and mission-critical deliverables. Credibly foster cooperative results.</p>
						<a href="#" class="learn-more pull-right">Learn More &rarr;</a>
					</div>
				</div>
			</div>				
		</section>			
		-->
		<div class="full-width">
			<section id="testimonials-section" class="container testimonials flexslider">
				<h2 class="hide">Testimonial</h2>
				<ul class="slides">
					<li>
						<i class="icon-quote-left icon-4x pull-left"></i>
						<p class="testimonial-content">Big Thing is just perfect, it allows me to create my version of landing page fast.
						<span class="author">- Jane Watson, CEO of Fantasy Corp.</span>
						</p>
					</li>
					<li>
						<i class="icon-quote-left icon-4x pull-left"></i>
						<p class="testimonial-content">Professional design, clean and modern. Totally recommended!
						<span class="author">- Mandy, Art Director of Dream Team</span>
						</p>
					</li>
					<li>
						<i class="icon-quote-left icon-4x pull-left"></i>
						<p class="testimonial-content">It saves our time, so we can focus on the app development.
						<span class="author">- Steven, Manager of Lucid</span>
						</p>
					</li>
				</ul>
			</section>
		</div>

		<section id="call-to-action" class="container section call-to-action">
			<div class="row-fluid inner">
				<div class="span7">
					<h2 class="heading">Discover Now</h2>
					<p class="description">We do want you to create a great app, the next big thing. Let the landing page becomes our part, so you can save more time and focus on your app instead. </p>
					<a href="#" class="btn btn-primary"><img src="/img/btn-app-store.png" alt="Get App" /></a>
				</div>
				<div class="span5 image-wrapper">
					<img src="/img/call-to-action-iphone.png" class="pull-right" alt="iPhone App" />
				</div>
			</div>
		</section>
	</div>
	<!-- ends main content -->

	<!-- begins footer -->
	<section class="full-width newsletter">
		<div class="container">
			<div class="row-fluid">
				<div class="span6">
					<h3 class="heading">Join Our Newsletter</h3>
					<p class="description">Stay up to date with the latest news by subscribing to our newsletter.</p>
				</div>
				<div class="span6">
					<form class="form-inline pull-right">
						<input type="email" name="email" placeholder="youremail@domain.com">
						<input type="submit" class="btn btn-primary" value="Subscribe Now">
					</form>	
				</div>
			</div>
		</div>
	</section>
	<footer class="full-width footer">
		<div class="container">
			<div class="row-fluid">
				<div class="span6 copyright">Powered by Learn Japanese Language & Culture, Copyright 2013. All Rights Reserved.</div>
				<div class="span6 social">
					<ul>
						<li><a href="#"><i class="socicon facebookcircle"></i></a></li>
						<li><a href="#"><i class="socicon twittercircle"></i></a></li>
						<li><a href="#"><i class="socicon dribbblecircle"></i></a></li>
						<li><a href="#"><i class="socicon googlecircle"></i></a></li>
					</ul>	
				</div>
			</div>
		</div>
	</footer>
	<!-- ends footer -->
</div>