<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/article-page.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/detail-product-page.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/product-page.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/article-detail.css">



    <title><?php bloginfo('name'); ?></title>

    <?php wp_head(); ?>

</head>


<body <?php body_class(); ?>>
    <div class="nav-search-bar">
        <img style="width: 20%;" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-taharica-instruments.png"  alt="">
        <div style="width: 80%" class="search-input">
            <input type="search" name="" id="" placeholder="Search Product">
            <button><img src="<?php echo get_template_directory_uri(); ?>/assets/img/search-icon.svg" alt=""></button>
        </div>
    </div>

    <nav>
        <div class="logo">
            <img src="<?php echo get_template_directory_uri(); ?>\assets\img\logo-taharica-instruments.png" alt="logo">
        </div>
        <ul class="">
            <li><a href="<?php echo home_url('/'); ?>">Beranda</a></li>
            <li><a href="<?php echo home_url('/products'); ?>">Produk</a></li>
            <li><a href="<?php echo home_url('/article'); ?>">Artikel</a></li>
            <!-- <li><a href="<?php echo home_url('/produk-terlaris'); ?>">Produk Terlaris</a></li> -->
            <li><a href="<?php echo home_url('/hubungi-kami'); ?>">Hubungi Kami</a></li>
        </ul>

        <div class="hamburger-icon">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>


