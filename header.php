<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/article-page.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/detail-product-page.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/product-page.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/article-detail.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/hubungi-kami.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/tentang-kami.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/search.css">



    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>

</head>


<body <?php body_class(); ?>>
    <div class="nav-search-bar">
        <img style="width: 20%;" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-taharica-instruments.png" alt="">
        <div style="width: 80%" class="search-input">
            <form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
                <input type="search" placeholder="Search Product" value="<?php echo get_search_query(); ?>" name="s">
                <input type="hidden" name="post_type" value="product" />
                <button type="submit" class="search-submit"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/search-icon.svg" alt=""></button>
            </form>
        </div>
    </div>

    <nav>
        <div class="logo">
            <img src="<?php echo get_template_directory_uri(); ?>\assets\img\logo-taharica-instruments.png" alt="logo">
        </div>
        <ul class="">
            <li>
                <div class="search-box-mobile">
                    <form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
                        <div style="width: 80%" class="search-input">
                            <input type="search" placeholder="Search Product" value="<?php echo get_search_query(); ?>" name="s">
                            <input type="hidden" name="post_type" value="product" />
                            <button type="submit" class="search-submit"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/search-icon.svg" alt=""></button>
                        </div>
                    </form>
                </div>
            </li>
            <li><a href="<?php echo home_url('/'); ?>">Beranda</a></li>
            <li><a href="<?php echo home_url('/products'); ?>">Produk</a></li>
            <li><a href="<?php echo home_url('/articles'); ?>">Artikel</a></li>
            <li><a href="<?php echo home_url('/tentang-kami'); ?>">Tentang Kami</a></li>
            <!-- <li><a href="<?php echo home_url('/produk-terlaris'); ?>">Produk Terlaris</a></li> -->
            <li><a href="<?php echo home_url('/hubungi-kami'); ?>">Hubungi Kami</a></li>
        </ul>

        <div class="hamburger-icon">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchField = document.querySelector('.search-field');
            if (searchField) {
                searchField.addEventListener('keydown', function(event) {
                    if (event.key === 'Enter') {
                        event.preventDefault();
                        searchField.closest('form').submit(); // Memastikan form terkirim saat Enter ditekan
                    }
                });
            }
        });
    </script>