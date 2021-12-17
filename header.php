<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
	<title><?php wp_title(' ', true, ''); ?></title>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=3.0, user-scalable=yes"/>
	
	<link rel="icon" href="<?php bloginfo('template_url'); ?>/favicon.png" type="image/x-icon" />
	
	<?php wp_head(); ?>
	
	<meta name="google-site-verification" content="oauwgYLVnS8RkUGD8Q8IJbPg3ix5d-nVKzXCP_tQ0vI" />
	
</head>

<body <?php //body_class(); ?>>
<header class="header">
        <div class="container">
            <div class="header__logo">
                <a href="/"><img width="342" height="51" src="<?php bloginfo('template_url'); ?>/img/logo.png"></a>
            </div>
            <div class="header__menu">
                <div class="header__submenu-item" style="margin-right:15px;">
                    <div class="header__submenu-title"><a href="/baseball/">Baseball</a></div>
                </div>
				<div class="header__submenu-item" style="margin-right:15px;">
                    <div class="header__submenu-title"><a href="/basketball/">Basketball</a></div>
                </div>
				<div class="header__submenu-item" style="margin-right:15px;">
                    <div class="header__submenu-title"><a href="/football/">Football</a></div>
                </div>
                <div class="header__submenu-item" style="margin-right:15px;">
                    <div class="header__submenu-title"><a href="/hockey/">Hockey</a></div>
                </div>
                <div class="header__submenu-item" style="margin-right:15px;">
                    <div class="header__submenu-title"><a href="/college/">College</a></div>
                </div>    
				<div class="header__submenu-item" style="margin-right:15px;">
                    <div class="header__submenu-title"><a href="/soccer/">Soccer</a></div>
                </div>
				<div class="header__submenu-item" style="margin-right:15px;">
                    <div class="header__submenu-title"><a href="/league/">League</a></div>
                </div>
                
               
                <div class="header__submenu-item">
                    <div class="header__submenu-title">Other Sports <img src="<?php bloginfo('template_url'); ?>/img/icons/arr_down.png" class="arr__down"></div>
                    <div class="header__submenu">
                        <div class="col">
                            <div class="header__submenu-block">
                                <div class="submenu__block-title"><a href="/rugby/">Rugby</a></div>
                            </div>
                        </div> 
						<div class="col">
                            <div class="header__submenu-block">
                                <div class="submenu__block-title"><a href="/lacrosse/">Lacrosse</a></div>
                            </div>
                        </div>
                     	<div class="col">
                            <div class="header__submenu-block">
                                <div class="submenu__block-title"><a href="/auto-racing/">Auto Racing</a></div>
                            </div>
                        </div>
                     	<div class="col">
                            <div class="header__submenu-block">
                                <div class="submenu__block-title"><a href="/other/">Other</a></div>
                            </div>
                        </div>
                      
                        
                    </div>
                </div> 
								
				
            </div>
            <div class="hamburger">
			<div class="shiftnav-toggle shiftnav-toggle-shiftnav-main shiftnav-toggle-button" tabindex="0" data-shiftnav-target="shiftnav-main">
			<span></span>
			<span></span>
			<span></span>
			</div>
				<?php //shiftnav_toggle( 'shiftnav-main' , '' , array( 'icon' => 'bars' , 'class' => 'shiftnav-toggle-button') ); ?>
            </div>
        </div>
    </header>

	<?php if ( is_front_page() && is_home() ) {?>
		<main class="main">
	<?php } elseif ( is_front_page()){?>
		<?php // Static homepage ?>
	<?php } elseif ( is_home()){?>
		<?php // Blog page ?>
	<?php } elseif ( is_category()){?>	
		<main class="main categories">
	<?php } else {?>
		<main class="main item-logo">
	<?php }?>
	

	

	
        <div class="search">
            <div class="search__wrapp">
                <form action="<?php bloginfo('url'); ?>" class="search__form">
                    <input value="<?php the_search_query(); ?>" type="text" name="s" class="search__input" placeholder="Search For A Team" required>
                    <button><img width="17" height="17" src="<?php bloginfo('template_url'); ?>/img/icons/search.png"></button>
                </form>
            </div>
        </div>







<?php /*

	<div id="main">
	<header id="header">
		<div class="container_24 clearfix">
			<div class="grid_24">
				<div class="logo">
					<a href="<?php bloginfo('url'); ?>" id="logo">
						<img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>">
					</a>
					<p class="tagline"><?php bloginfo('description'); ?></p>
				</div>
				<nav class="primary">
					<?php	
						$nav_args = array(
							'container'       => false, 
							'menu_class'      => 'sf-menu sf-js-enabled', 
							'container_id'	  => 'topnav',
							'depth'           => 2,
							'before'          => '',
							'after'           => '',
							'link_before'     => '<span>',
							'link_after'      => '</span>',
							'theme_location'  => 'main-menu'
							);
						wp_nav_menu($nav_args);
					?>
				</nav>
				<div id="header_area_1">
					<div id="meta-2" class="widget-header">
						<?php dynamic_sidebar( 'header-area1' ); ?>
					</div> 
				</div>
				<div id="header_area_2">
					<div id="text-2" class="widget-header">
						<?php dynamic_sidebar( 'header-area2' ); ?>
					</div>
				</div>
				<form method="get" id="searchform" action="<?php bloginfo('url'); ?>">
					<input type="text" name="s" value="<?php the_search_query(); ?>" onblur="if(this.value=='') this.value='search'" onfocus="if(this.value =='search' ) this.value=''">
					<input type="submit" value="">
				</form>
			</div>
		</div>
	</header>
	
	*/?>