<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php wp_title(); ?></title>
    <link rel="profile" href="http://gmgp.org/xfn/11" />
    <!--<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,700italic,300,700' rel='stylesheet' type='text/css'> -->
    <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/css/skeleton.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/css/layout.css" type="text/css" media="screen" />
    <!--[if lte IE 8]>
    	<link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/css/ie7.css" type="text/css" media="screen" />
    <![endif]-->
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
    <?php wp_head(); ?>    

</head>

<body <?php body_class(''); ?>>

    <header>
            
        <div class="container">

        <h1 class="site-title"><a href="<?php echo get_home_url(); ?>"><?php bloginfo('name') ?></a></h1>
    
        <nav>
        
            <div class="table">
                <?php wp_nav_menu(); ?>
            </div>
        
        </nav>
        
        </div>
    
    </header>
    
    <div class="container container-twelve">