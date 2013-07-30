<?php
// app/View/Helper/MyHtmlHelper.php
App::uses('HtmlHelper', 'View/Helper');
class GenericHtmlHelper extends HtmlHelper {

	public function addHtmlStart($controller, $action) {
		$out = '';
		if($controller==='pages' && $action==='display'){
			$out .= '<!DOCTYPE html>' . "\n";
			$out .= '<!--[if lt IE 7 ]><html class="ie ie6" lang="en" class="no-js"> <![endif]-->' . "\n";
			$out .= '<!--[if IE 7 ]><html class="ie ie7" lang="en" class="no-js"> <![endif]-->' . "\n";
			$out .= '<!--[if IE 8 ]><html class="ie ie8" lang="en" class="no-js"> <![endif]-->' . "\n";
			$out .= '<!--[if (gte IE 9)|!(IE)]><!--><html lang="en" class="no-js"> <!--<![endif]-->' . "\n";
		} else if($controller==='users' && $action==='login') {
			$out .= '<!DOCTYPE html>' . "\n";
			$out .= '<html class="login-bg">' . "\n";					
		} else {
			$out .= '<!DOCTYPE html>' . "\n";
			$out .= '<html>' . "\n";			
		}
		return $out;
	}
	
	public function addMetaLinks($controller, $action) {
		$meta = '';
		$meta .= "\n";
		$meta .= "\t". $this->meta(array('name' => 'viewport', 'content' => 'width=device-width, initial-scale=1.0')). "\n";
		$meta .= "\t". $this->meta('favicon.ico','/img/favicon.ico',array('type' => 'icon')). "\n";
		return $meta;
	}
	
	public function addCssLinks($controller, $action) {
		$css = '';
		if($controller==='pages' && $action==='display'){
			$css .= "\t". '<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">'. "\n";
			$css .= "\t". '<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet">'. "\n";
			$css .= "\t". $this->css('style'). "\n";
			$css .= "\t". '<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,600,700" rel="stylesheet" type="text/css">' . "\n";
			$css .= "\t". '<!-- HTML5 shim, for IE6-8 support of HTML5 elements and IE Fallback-->' . "\n";
			$css .= "\t". '<!--[if lt IE 9]>' . "\n";
			$css .= "\t". '<script src="/js/html5shiv.js"></script>' . "\n";
			$css .= "\t". '<link href="/css/ie.css" rel="stylesheet">' . "\n";
			$css .= "\t". '<![endif]-->' . "\n";
			$css .= "\t". '<!-- Fav and touch icons -->' . "\n";
			$css .= "\t". '<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/ico/icon-144.png">' . "\n";
			$css .= "\t". '<link rel="apple-touch-icon-precomposed" sizes="114x114" href="/ico/icon-114.png">' . "\n";
			$css .= "\t". '<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/ico/icon-72.png">' . "\n";
			$css .= "\t". '<link rel="apple-touch-icon-precomposed" sizes="57x57" href="/ico/icon-57.png">' . "\n";	
		} else {
			$css .= "\t" . '<!-- bootstrap -->' . "\n";
			$css .= "\t" . '<link href="/admin/css/bootstrap/bootstrap.css" rel="stylesheet" />' . "\n";
			$css .= "\t" . '<link href="/admin/css/bootstrap/bootstrap-responsive.css" rel="stylesheet" />' . "\n";
			$css .= "\t" . '<link href="/admin/css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet" />' . "\n";
			
			$css .= "\t" . '<!-- libraries -->' . "\n";
			$css .= "\t" . '<link href="/admin/css/lib/font-awesome.css" type="text/css" rel="stylesheet" />' . "\n";
			
			$css .= "\t" . '<!-- global styles -->' . "\n";
			$css .= "\t" . '<link rel="stylesheet" type="text/css" href="/admin/css/layout.css">' . "\n";
			$css .= "\t" . '<link rel="stylesheet" type="text/css" href="/admin/css/elements.css">' . "\n";
			$css .= "\t" . '<link rel="stylesheet" type="text/css" href="/admin/css/icons.css">' . "\n";

			$css .= "\t" . '<!-- open sans font -->' . "\n";
			$css .= "\t" . '<link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">' . "\n";

			$css .= "\t" . '<!--[if lt IE 9]>' . "\n";
			$css .= "\t" . '  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>' . "\n";
			$css .= "\t" . '<![endif]-->' . "\n";
		}
		return $css;
	}
	
	public function addScriptsLinks($controller, $action) {
		$script = '';
		if($controller==='pages' && $action==='display'){
			$script .= "\t". '<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>' . "\n";
			$script .= "\t". '<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>' . "\n";
			$script .= "\t". '<script src="//cdnjs.cloudflare.com/ajax/libs/flexslider/2.1/jquery.flexslider.js"></script> ' . "\n";
			$script .= "\t". '<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-scrollTo/1.4.3/jquery.scrollTo.min.js"></script> ' . "\n";
			$script .= "\t". '<script src="//cdn.jsdelivr.net/jquery.localscroll/1.2.8b/jquery.localScroll.js"></script> ' . "\n";
			$script .= "\t". '<script type="text/javascript" src="/js/big-thing.js"></script>' . "\n";
		} else {
			$script .= "\t" . '<!-- scripts -->' . "\n";
			$script .= "\t" . '<script src="http://code.jquery.com/jquery-latest.js"></script>' . "\n";
			$script .= "\t" . '<script src="/admin/js/bootstrap.min.js"></script>' . "\n";
			$script .= "\t" . '<script src="/admin/js/theme.js"></script>' . "\n";
		} 
		return $script;		
	}
}
