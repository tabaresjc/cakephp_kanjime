<?php
	$this->append('custom_script');
		echo "\n\t". $this->Html->script('libs/newsletter');
		echo "\n\t". '<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>';
		echo "\n\t". '<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-51ff608d10328f65"></script>';		
	$this->end();
?>
	<div class="wrapper">
		<!-- begins header -->
		<header class="header">
			<!-- begins navbar -->
			<div id="top-nav" class="navbar">
				<div class="navbar-inner">
					<div class="container">
						<!--
						<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
							
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							
						</a>
						-->						
						<a class="brand" data-section="body" href="/">
							<img src="/img/kanjime-logo.png" width="60" alt="Kanji Me!" />
							<h1 class="hide">KanjiMe! | Find out your name in Japanese</h1>
						</a>
						<!--
						<nav id="main-menu" class="nav-collapse collapse">
							<h2 class="hide">Main Navigation</h2>							
							<ul class="nav pull-right">
								<li><a href="#features-section">Features</a></li>
								<li><a href="#testimonials-section">Testimonials</a></li>
								<li><a href="#call-to-action">Download now</a></li>
							</ul>							
						</nav>
						-->
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
					<p style="color:black;font-weight: 500;">Come and check cool & positive Kanjis for your name!, Avalaible for free in the App Store</p>
					
					<a href="/" class="btn btn-primary" style="margin-bottom:20px;" ><img id="img-app-button" src="/img/btn-app-store.png" alt="Get App"/></a>
					
					<!-- AddThis Button BEGIN -->
					<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
					<a class="addthis_button_preferred_1"></a>
					<a class="addthis_button_preferred_2"></a>
					<a class="addthis_button_preferred_3"></a>
					<a class="addthis_button_preferred_4"></a>
					<a class="addthis_button_compact"></a>
					<a class="addthis_counter addthis_bubble_style"></a>
					</div>
					<!-- AddThis Button END -->			
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
					<div class="span8">
						<div class="well">
							<h2 class="heading"><i class="icon icon-leaf"></i> What this app is all about</h2>
							<p>You might learn that your name is written in Katakana because your teacher said foreign words are written in Katakana customarily, like James: ジェームズ<br/><br/>
							However, foreign names can be written in Kanji if you like！ like most of Japanese have their own names in Kanji.<br/> 
							(e.g.Tanaka: 田中、Yamada: 山田、Sato: 佐藤)
							<br/><br/>
							For Kanji, there are 'on' reading and 'kun' rading.<br/>
							"on" reading is resemble to the Chinese way of reading. Whereas "kun" reading is Japanese original way of reading. For example
							</p>
							<br/>
							<div class="row-fluid">
								<div class="span4">
									<p style="text-align: center;font-size: 4em;margin-top: 20px;padding: 0;">山</p>
								</div>
								<div class="span8">
									Means: increase wealth
									<ul>
										<li>san (on reading) : 富士<b>山</b>: fujisan (Mt. Fuji)</li>
										<li>yama (kun reading)  : <b>山</b>にのぼる: yama ni noboru (Climb a mountain)</li>
									</ul>
								</div>								
							</div>
							<br/>
							<p>
							So basically Kanji for foreigner uses phonetic equivalent. Therefore there are several ways to be written in Kanji depending on its name. Since each Kanji has its meaning in it, the impression will be different.<br/><br/> 
							For example, “Thomas” could be written as
							</p>
							<br/>
							<div class="row-fluid">
								<div class="span4">
									<p style="text-align: center;font-size: 4em;margin-top: 20px;padding: 0;">富増</p>
								</div>
								<div class="span8">
									Means: increase wealth
									<ul>
										<li>富: on-reading: fu, fuu,  kun-reading: <b>to</b>, tomi</li>
										<li>増: on-reading: zou,  kun-reading: fu, ma, mashi, <b>masu</b></li>
									</ul>
								</div>								
							</div>
							<p>but it could also be written as </p>
							<br/>
							<div class="row-fluid">
								<div class="span4">
									<p style="text-align: center;font-size: 4em;margin-top: 20px;padding: 0;">戸間酢</p>
								</div>
								<div class="span8">
									Means: door-between/space-vinegar
									<ul>
										<li>戸: on-reading: ko,  kun-reading: <b>to</b>, e, he</li>
										<li>間: on-readin: kan, ken,  kun-reading: ai, aida, <b>ma</b></li>
										<li>酢: on-readin: saku,  kun-reading: <b>su</b></li>
									</ul>
								</div>								
							</div>							
							<p>I guess no Thomas would want to use the latter right? </p>		
							<br/>
							<p>
								So in this App, I'll carefully select cool & positive Kanji for your name! (also showing other reading option for the Kanji.)
								Please download popular names in Kanji for free!<br/><br/>

								New Kanji names will be update twice a week, so stay tuned with us after downloading this App even you don’t find yours. Your name might be introduced sooner or later!					
							</p>								
						</div>
					</div>
					
					<div class="span4">
						<div class="well">
							
							<div class="row-fluid">
								<div class="span12 social">
									<h3 class="heading" style="font-size: 1.5em;"><i class="icon icon-question-sign"></i> LearnJapanese123</h3>
									<ul style="text-align: left;">
										<li><a href="http://blog.learnjapanese123.com/" target="_blank"><img src="/img/wordpress_48.png" alt="Blog LearnJapanese123" /></a></li>
										<li><a href="https://www.facebook.com/Japanese.Language.Culture" target="_blank"><img src="/img/facebook_48.png" alt="Facebook for Japanese Language and and Culture"  /></a></li>
										<li><a href="https://plus.google.com/105449602868059056192?rel=author" target="_blank"><img src="/img/google_48.png" alt="Google+ for Japanese Language and and Culture"  /></a></li>
										<li>
											<a href="https://twitter.com/japanese123" target="_blank">
												<img src="/img/twitter_48.png" alt="Twitter for Japanese Language and and Culture"  />
											</a>
										</li>
										<li>
											<a href="http://www.youtube.com/user/10minsJapanese" target="_blank">
												<img src="/img/youtube_48.png" alt="Youtube Channel for Japanese Language and and Culture"  />
											</a>
										</li>
									</ul>	
								</div>
							</div>
						</div>						
						<div class="well">
							<a href="http://www.learnjapanese123.com/kanji/introduction" class="heading" style="font-size: 1.5em;"><i class="icon icon-question-sign"></i> BTW What is Kanji?</a>
							<br/>
							<br/>
							<p>Kanji was originally introduced from China around 300 AC, even before Japanese original letters Hiragana and Katakana were invented.<br><br> 
							Kanji is an ideograph meaning that the whole character conveys a meaning rather than just a sound (as in the case of hiragana and katakana letters). Kanji was originally drawn as pictures from nature but it gradually transformed to more generalized representations							
							</p>
							<a href="http://www.learnjapanese123.com/kanji/introduction" target="_blank">Learn More</a>
						</div>

					</div>
				</div>
			</section>
			
			<div class="full-width">
				<section id="testimonials-section" class="container testimonials flexslider">
					<h3>Here are some of the names</h3>
					<ul class="slides">
						<li>
							<i class="icon-quote-left icon-4x pull-left"></i>
							<p class="testimonial-content">William/ウィリアム<br/>羽衣利編</p>
						</li>
						<li>
							<i class="icon-quote-left icon-4x pull-left"></i>
							<p class="testimonial-content">Emily/エミリー<br/>恵美理</p>
						</li>
						<li>
							<i class="icon-quote-left icon-4x pull-left"></i>
							<p class="testimonial-content">Ian/イアン<br/>偉案 </p>
						</li>
					</ul>
				</section>
			</div>
			
			<section id="call-to-action" class="container section call-to-action">
				<div class="row-fluid inner" style="margin-bottom:40px;">
					<div class="span7">
						<h2 class="heading">New names every week!</h2>
						<p class="description">New Kanji names will be update twice a week, so stay tuned with us after downloading this App even you don’t find yours. Your name might be introduced sooner or later!</p>
						
					</div>
					<div class="span5 image-wrapper">
						<img src="/img/iTunesArtwork.png" class="pull-right" alt="iPhone App Icon" style="width:40%;" />
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
						<?php echo $this->Form->create('Newsletter', array('id'=>'NewsletterForm', 'type' => 'post', 'url' => array('controller' => 'newsletters', 'action' => 'add'), 'inputDefaults' => array('label' => false, 'div'=>false), 'class' => 'form-inline pull-right')); ?>
							<?php
							echo $this->Form->input('email', array('id'=>'NewsletterEmail', 'type'=>'email', 'placeholder'=>'youremail@domain.com'));
							echo $this->Form->submit('Suscribe Now', array('id'=>'NewsletterSubmit', 'div'=>false, 'class' => 'btn btn-primary', 'value'=>'Subscribe Now'));
							?>
						<?php echo $this->Form->end(); ?>
					</div>
				</div>
			</div>
		</section>
		<footer class="full-width footer">
			<div class="container">
				<div class="row-fluid">
					<div class="span6 copyright">Powered by LearnJapanese123, Copyright 2013. All Rights Reserved.</div>
					<div class="span6 social">
						<ul>
							<li><a href="https://www.facebook.com/Japanese.Language.Culture"><i class="socicon facebookcircle"></i></a></li>
							<li><a href="https://twitter.com/japanese123"><i class="socicon twittercircle"></i></a></li>
							<li><a href="https://plus.google.com/105449602868059056192"><i class="socicon googlecircle"></i></a></li>
						</ul>	
					</div>
				</div>
			</div>
		</footer>
		<!-- ends footer -->
	</div>