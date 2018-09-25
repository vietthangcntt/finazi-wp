<!DOCTYPE html>
<!--[if IE 8]> <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if !IE]> <html <?php language_attributes(); ?>> <![endif]-->
 
<head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <link rel="profile" href="http://gmgp.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
 
        <?php wp_head(); ?>
</head>
 
<body <?php body_class(); ?> > <!--Thêm class tượng trưng cho mỗi trang lên <body> để tùy biến-->
	<header id="header">
		<div class="header-iner">
			<div class="header-toge">
			    <div class="container">
			    	<div class="row">
			    		<div class="col-md-1">
			    			<div class="list-header">
				    			<select>
				    				<option value="0">English</option>
				    				<option value="1">Vietnamese</option>
				    			</select>
				    		</div>
			    		</div>
			    		<div class="col-md-11">
			    			<div class="menu-header">
			    				<ul>
			    					<li><a href="#"><i class="fa fa-mobile" aria-hidden="true"></i> +212.386.5575 </a></li> 
									<li><a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i> Support@ConsultWP.com </a></li>
									<li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i> 1010 Avenue of the Moom,New York,NY 10018 US. </a></li>
			    				</ul>
			    				<div class="topbar-button">
									<a href="#" class="fa fa-tty">Free Quote</a>
								</div>
			    			</div>
			    		</div>
			    	</div>
			    </div>
			</div>
		    <button id="topbar-toggle" class="ion-ios-arrow-down"><i class="fa fa-chevron-down" aria-hidden="true"></i></button>
		</div>
		<div class="header-info">
			<div class="container">
				<div class="menu-list">
					<div class="header-logo">
						<?php
				    		$custom_logo_id = get_theme_mod( 'custom_logo' );
							$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
							if ( has_custom_logo() ) {
							        echo '<a href="http://localhost/finazi-wp/"><img src="'. esc_url( $logo[0] ) .'" ></a>';
							} else {
						        echo '<h1>'. get_bloginfo( 'name' ) .'</h1>';
						    }
					    ?>
			    	</div>
			    	<div class="menu-collapser">
			    		<i class="fa fa-bars" aria-hidden="true"></i>	    			
			    	</div>
			    	<div class="header-menu">
			    		<?php finazi_menu( 'primary-menu' ); ?>
			    	</div>
			    	<div class="shop_car">
			    		<?php finazi_car(); ?>
			    	</div>
			    	<div class="consult-header-search-box desk-search-form">          
		                <form action="" class="header-search-form">
		                    <input required="" class="header-search-form-input" name="s" type="text" placeholder="To Search start typing...">
		                </form>
		                <span class="ion-close close-form-btn"></span>
		            </div>
		    	</div>
		    </div>
	    </div>
	    <div class="nav-header">
	    	<div class="container">
		    	<div class="bread flw">
		    		<h1 class="page-title"> BLOG </h1>
		    		<div class="crumbs">
		    			<span class="first-item"> <a href="<?php echo get_home_url(); ?>"> Home </a></span>
		    			<span class="last-item">Blog</span>
		    		</div>
		    	</div>
	    	</div>
	    </div>
	</header>