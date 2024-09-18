<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title><?php bloginfo('name'); ?></title>

    <?php wp_head(); ?>

</head>


<body <?php body_class(); ?>>

<!-- 
<div class="nav-contact" style="margin-top: 20px;">
    <div class="nav-contact-icon">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/TelephoneOutbound.svg" alt="">
        <span>021 8690 6777</span>
    </div>
    <div class="nav-contact-icon">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/Whatsapp.svg" alt="">
        <span>0852-1556-0669 (Mr. Almas)</span>
    </div>
    <div class="nav-contact-icon">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/Whatsapp.svg" alt="">
        <span>0819‑4401‑4959(Mr. Arya)</span>
    </div>
    <div class="nav-contact-icon">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/mail.svg" alt="">
        <span>marketing.time@taharica.com</span>
    </div>
</div> -->

<div class="nav-search-bar">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-timeinstrument.png" alt="">
    <div class="search-input">
        <input type="search" name="" id="" placeholder="Search Product">
        <button><img src="<?php echo get_template_directory_uri(); ?>/assets/img/search-icon.svg" alt=""></button>
    </div>
</div>

<nav>
    <h1>Logo</h1>
    <ul class="">
        <li><a href="#">Beranda</a></li>
        <li><a href="#">Produk</a></li>
        <li><a href="#">Artikel</a></li>
        <li><a href="#">Produk Terlaris</a></li>
        <li><a href="#">Hubungi Kami</a></li>
    </ul>
    <div class="hamburger-icon">
        <span></span>
        <span></span>
        <span></span>
    </div>
</nav>