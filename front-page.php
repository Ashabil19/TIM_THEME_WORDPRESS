<?php get_header(); ?>
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
</div>

<div class="nav-search-bar">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-timeinstrument.png" alt="">
    <div class="search-input">
        <input type="search" name="" id="" placeholder="Search Product">
        <button><img src="<?php echo get_template_directory_uri(); ?>/assets/img/search-icon.svg" alt=""></button>
    </div>
    <div class="avatar">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/avatar_icon.svg" alt="">
    </div>
</div>

<nav class="navbar">
    <div class="logo">
        <h1>Logo</h1>
    </div>
    <ul class="nav-menu">
        <li class="nav-item"><a href="#beranda" class="nav-link">Beranda</a></li>
        <li class="nav-item"><a href="#produk" class="nav-link">Produk</a></li>
        <li class="nav-item"><a href="#artikel" class="nav-link">Artikel</a></li>
        <li class="nav-item"><a href="#produk-terlaris" class="nav-link">Produk Terlaris</a></li>
        <li class="nav-item"><a href="#hubungi-kami" class="nav-link">Hubungi Kami</a></li>
    </ul>
    <div class="menu-toggle" id="mobile-menu">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
    </div>
</nav>

<section id="hero">
    <div class="hero-banner">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/hero-content.png" alt="">
    </div>
    <div class="service-hero-container">
        <div class="service-hero"></div>
    </div>
</section>

<section id="container-tab1">
    <div class="tab">
        <button class="tablinks" onclick="openCity(event, 'discount')">DISCOUNTS AND PROMOTIONS</button>
        <button class="tablinks" onclick="openCity(event, 'new')">NEW</button>
        <button class="tablinks" onclick="openCity(event, 'featured')">FEATURED</button>
    </div>

    <div id="discount" class="tabcontent">
        <div class="card-container">
            <div class="card">
                <div class="card-img">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/product-img.png" alt="">
                </div>
                <div class="card-title">
                    <h4>Judul Produk</h4>
                </div>
                <div class="card-footer">
                    <button>Detail</button>
                </div>
            </div>
            <div class="card">
                <div class="card-img">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/product-img.png" alt="">
                </div>
                <div class="card-title">
                    <h4>Judul Produk</h4>
                </div>
                <div class="card-footer">
                    <button>Detail</button>
                </div>
            </div>
            <div class="card">
                <div class="card-img">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-timeinstrument.png" alt="">
                </div>
                <div class="card-title">
                    <h4>Judul Produk</h4>
                </div>
                <div class="card-footer">
                    <button>Detail</button>
                </div>
            </div>
            <div class="card">
                <div class="card-img">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-timeinstrument.png" alt="">
                </div>
                <div class="card-title">
                    <h4>Judul Produk</h4>
                </div>
                <div class="card-footer">
                    <button>Detail</button>
                </div>
            </div>
        </div>
    </div>

    <div id="new" class="tabcontent">
        <h3>Paris</h3>
        <p>Paris is the capital of France.</p>
    </div>

    <div id="featured" class="tabcontent">
        <h3>Tokyo</h3>
        <p>Tokyo is the capital of Japan.</p>
    </div>
</section>


<?php get_footer(); ?>