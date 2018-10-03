<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<title><?php
	global $page, $paged;

	wp_title( '|', true, 'right' );

	bloginfo( 'name' );

	$site_description = get_bloginfo('description', 'display');
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . __('Page', 'ekuatorial') . max($paged, $page);

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/img/favicon.ico" type="image/x-icon" />
<?php wp_head(); ?>
</head>
<body <?php body_class(get_bloginfo('language')); $currentLang = get_locale();?>>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/<?php echo $currentLang; ?>/all.js#xfbml=1&appId=459964104075857";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	<header id="masthead">
		<div class="container">
			<div class="twelve columns">
				<a href="<?php echo home_url() ?>"><h1 class="headline">Biodiversity</h1></a>
				<div class="header-right">
					<?php if(function_exists('qtranxf_getLanguage')) : ?>
						<nav id="langnav">
							<ul>
								<?php
								$lang = qtranxf_getLanguage();
								global $q_config;
								if(is_404()) $url = get_option('home'); else $url = '';
								$current = qtranxf_getLanguage();
								foreach($q_config['enabled_languages'] as $language) {
									$attrs = '';
									if($language == $current)
										$attrs = 'class="active"';
									echo '<li><a href="' . qtranxf_convertURL($url, $language) . '" ' . $attrs . '>' . $q_config['language_name'][$language] . '</a></li>';
								}
								?>
							</ul>
						</nav>
					<?php endif; ?>
					<div id="colophon">
						<ul class="nav clearfix">
							<li><a class="icon siej" href="http://www.siej.or.id" target="_blank">Society of Indonesian Environmental Journalists</a></li>
							<li><a class="icon ejn" href="https://earthjournalism.net" target="_blank">Earth Journalism Network</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</header>
	<section id="main-content">
