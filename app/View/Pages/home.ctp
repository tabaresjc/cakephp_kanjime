<?php
	$this->start('css');
	echo $this->Html->css('bootstrap');
	echo $this->Html->css('bootstrap-responsive');
	echo $this->Html->css('prettyPhoto');
	echo $this->Html->css('sequence');
	echo $this->Html->css('styles');
	$this->end();
	$this->start('script');
	echo $this->Html->script('jquery.min');
	echo $this->Html->script('bootstrap');
	echo $this->Html->script('jquery.prettyPhoto');
	echo $this->Html->script('sequence.jquery');
	echo $this->Html->script('jquery-hover-effect');
	echo $this->Html->script('custom');
	?>
	<script>
		jQuery(function() {
			jQuery('ul.da-thumbs > li').hoverdir();
		});
	</script>	
	<?php
	$this->end();
?>
<!-- main wrap -->
<div class="main-wrap">
	<!-- header -->
	<header>
		<!-- top area -->
		<div class="top-nav">  
			<div class="wrapper"> 
				<div class="logo">
					<a href="index.html">
						<!-- your logo image -->
						<img src="img/logo.png" alt="" />
					</a>
				</div>
				
				<div class="phone">
					<p>Call &#45; 008 009 172</p>
				</div>
			</div> 
		</div>
		<!-- end top area -->
	</header>
	<!-- end of header-->

	<!-- section intro -->
	<section id="intro">	
		<div class="featured">
			<div class="wrapper">

				<div class="row-fluid">
				<!-- slider -->	
				<div class="span12">
				
				<div id="sequence-theme">
					<div id="sequence">
						<img class="prev" src="img/slides/bt-prev.png" alt="Previous Frame" />
						<img class="next" src="img/slides/bt-next.png" alt="Next Frame" />
						<ul>
							<li class="animate-in">
								<h2 class="title">Fresh design</h2>
								<h5 class="subtitle">We always consider with latest web design trends</h5>
								<img class="model" src="img/slides/img1.png" alt="" />
							</li>
							<li>
								<h2 class="title">Responsive layout</h2>
								<h5 class="subtitle">Degrade from wide screen to mobile screen size</h5>
								<img class="model" src="img/slides/img2.png" alt="" />
							</li>
							<li>
								<h2 class="title">Built with bootstrap</h2>
								<h5 class="subtitle">Supports modern browsers, old browsers (IE7+), touch devices and responsive designs</h5>
								<img class="model" src="img/slides/img3.png" alt="" />
							</li>
						</ul>
					</div>
					<ul class="nav">
						<li><img src="img/slides/thumb1.png" alt="Thumbnail" /></li>
						<li><img src="img/slides/thumb2.png" alt="Thumbnail" /></li>
						<li><img src="img/slides/thumb3.png" alt="Thumbnail" /></li>
					</ul>
				</div>			
						
				</div>
				<!-- end slider -->	
				</div>			  
			  
			</div>
		</div>
	</section>
	<!-- end section intro -->

	<!-- section main content -->
	<section id="main-content">
		<div class="content-wrap">		

			<!-- tagline -->
			<div class="tagline">
				<div class="wrapper">
					<!--### Subtitle ###-->
					<h2>Great choice to build application landing page</h2>
					<!-- CTA -->
					<div class="cta"> 
						<div class="btn-group"> 
							<a href="#" class="btn btn-green btn-large"><i class="icon-shopping-cart icon-white"></i> Buy this template</a> 
							<a href="#" class="btn btn-red btn-large">Try demo version</a> 
						</div>
					</div>
				</div>
			</div>	
			<!-- end tagline -->
				
			<!-- wrapper -->
			<div class="wrapper">
			
				<!-- boxes -->
				<div class="boxes">
						<div class="row-fluid">
						 
							<!-- box 1 -->
							<div class="span4">
								<div class="box">
									<div class="icon"> 
										<img src="img/icons/icon-1.png" class="" alt="" />
									</div>
									<h4>Easy to customize</h4>
									<p>  Optimal viewing experience with a minimum of resizing, and scrolling across a wide range of devices </p>
									<a href="#" class="textlink">Learn more</a>
								</div>	
							</div> 
							 
							<!-- box 2 -->
							<div class="span4">
								<div class="box">
									<div class="icon"> 
										<img src="img/icons/icon-2.png" class="" alt="" />
									</div>
									<h4>High conversion</h4>
									<p> Optimal viewing experience with a minimum of resizing, and scrolling across a wide range of devices </p>
									<a href="#" class="textlink">Learn more</a>
								</div>	
							</div> 
							 
							<!-- box 3 -->
							<div class="span4">
								<div class="box">
									<div class="icon"> 
										<img src="img/icons/icon-3.png" class="" alt="" />
									</div>
									<h4> Responsive Layout</h4>
									<p>  Optimal viewing experience with a minimum of resizing, and scrolling across a wide range of devices </p>
									<a href="#" class="textlink">Learn more</a>
								</div>	
							</div> 
						 
						</div>
						
				</div>			
				<!-- end boxes -->
			
				
				<!-- recent portfolio -->
				<div class="row-fluid portfolio">
				<div class="headline"><h2><span>Great examples built with bootslander</span></h2></div>
					<ul class="portfolio_list da-thumbs">
				  
						<li class="span3">
							<img src="img/dummies/img1.jpg" alt="img">
							<article class="da-animate da-slideFromRight" style="display: block;">
								<h5>Portfolio item</h5>
								<span class="link_post"><a href="#"></a></span>
								<span class="zoom"><a data-pretty="prettyPhoto[works]" href="img/dummies/big1.jpg"></a></span>
							</article>
						</li>
						<li class="span3">
							<img src="img/dummies/img2.jpg" alt="img">
							<article class="da-animate da-slideFromRight" style="display: block;">
								<h5>Portfolio item</h5>
								<span class="link_post"><a href="#"></a></span>
								<span class="zoom"><a data-pretty="prettyPhoto[works]" href="img/dummies/big1.jpg"></a></span>
							</article>
						</li>
						<li class="span3">
							<img src="img/dummies/img3.jpg" alt="img">
							<article class="da-animate da-slideFromRight" style="display: block;">
								<h5>Portfolio item</h5>
								<span class="link_post"><a href="#"></a></span>
								<span class="zoom"><a data-pretty="prettyPhoto" href="img/dummies/big1.jpg"></a></span>
							</article>
						</li>
						<li class="span3">
							<img src="img/dummies/img4.jpg" alt="img">
							<article class="da-animate da-slideFromRight" style="display: block;">
								<h5>Portfolio item</h5>
								<span class="link_post"><a href="#"></a></span>
								<span class="zoom"><a data-pretty="prettyPhoto" href="img/dummies/big1.jpg"></a></span>
							</article>
						</li>
					</ul>
					
				</div>	
				<!-- end portfolio -->	
				
				
				<!-- testimonials -->
				<div class="row-fluid testimonials">
					<div class="headline"><h2><span>What people are saying</span></h2></div>
					<ul>
						<li class="span4">
							<div class="testimonial">
								<img src="img/dummies/user-1.png" alt="" class="img-circle" />
								<p>
								&ldquo;Lorem ipsum dolor sit amet, veritus molestie et his. Summo dissentiet duo an. Et duo vitae atomorum, eripuit eruditi definitiones nec ut.&rdquo;
								</p>	
								<span>&#45;&#45; Mike lamouz, <a href="#">Net designer</a></span>
							</div>							
						</li>
						<li class="span4">
							<div class="testimonial">
								<img src="img/dummies/user-2.png" alt="" class="img-circle" />
								<p>
								&ldquo;Lorem ipsum dolor sit amet, veritus molestie et his. Summo dissentiet duo an. Et duo vitae atomorum, eripuit eruditi definitiones nec ut.&rdquo;
								</p>		
								<span>&#45;&#45; Leslie samarov, <a href="#">JIK Company</a></span>
							</div>						
						</li>
						<li class="span4">
							<div class="testimonial">
								<img src="img/dummies/user-3.png" alt="" class="img-circle" />
								<p>
								&ldquo;Lorem ipsum dolor sit amet, veritus molestie et his. Summo dissentiet duo an. Et duo vitae atomorum, eripuit eruditi definitiones nec ut.&rdquo;
								</p>
								<span>&#45;&#45; Jonathan does, <a href="#">App Studio</a></span>							
							</div>						
						</li>						
						
					</ul>	
				</div>
			
			</div>
			<!-- end wrapper -->

		</div>
	</section>
	<!-- end main content section -->

	<!-- section bottom -->
	<section id="bottom">
		<div class="bottom-cta">
			<div class="wrapper">
				<h3 class="title">Don&#96;t miss this special offer! </h3>
				<h2>Get it now for just $10! the price will be increased after 50 downloads</h2>
				<a href="#" class="btn btn-red btn-large">Get the latest version bootslander v.1.2</a>
			</div>
		</div>
	</section>
	<!-- end section bottom -->

	<!-- footer -->
	<footer>
		<div class="footer"> 
			<div class="wrapper">
				<div class="social">
					<a href="#" class="fb"> </a> <a href="#" class="tw"> </a>
				</div>

				<div class="subfooter"> 
					<ul>
						<li><a href="#">Home</a> &#45; <li>
						<li><a href="#">Terms conditions</a> &#45; <li>
						<li><a href="#">Contact</a><li>
					</ul>	
					<p class="copyright">&#169; copyright 2013. All rights reserved. Designed by iWebStudio</p>

				</div>
			</div>
		</div>
	</footer>
</div>
<!-- end main wrap -->
