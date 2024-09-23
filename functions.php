<?php

// Enqueuing
function load_css()
{

    // wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', [], 1, 'all');
    // wp_enqueue_style('bootstrap');

    wp_register_style('main', get_template_directory_uri() . '/css/main.css', [], 1, 'all');
    wp_enqueue_style('main');


    
    // Tambahkan file CSS lainnya sesuai kebutuhan
    wp_register_style('product-page', get_template_directory_uri() . '/css/product-page.css', [], 1, 'all');
    wp_enqueue_style('product-page');
}
add_action('wp_enqueue_scripts', 'load_css');

// function load_js()
// {
//     wp_enqueue_script('jquery');

//     wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', ['jquery'], 1, true);
//     wp_enqueue_script('bootstrap');
// }
// add_action('wp_enqueue_scripts', 'load_js');


// Nav Menus
register_nav_menus(array(
    'top-menu' => __('Top Menu', 'theme'),
    'footer-menu' => __('Footer Menu', 'theme'),
));

// Theme Support
add_theme_support('menus');
add_theme_support('post-thumbnails');

// Image Sizes
add_image_size('small', 600, 600, false);




function filter_products_by_category() {
    $category_id = intval($_POST['category_id']); // Dapatkan ID kategori dari permintaan AJAX

    $args = array(
        'post_type'      => 'product',
        'posts_per_page' => 6,
        'tax_query'      => array(
            array(
                'taxonomy' => 'category', // Menggunakan taxonomy 'category'
                'field'    => 'term_id',
                'terms'    => $category_id, // Filter berdasarkan category_id
            ),
        ),
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            ?>
            <a href="<?php echo home_url('/detail-product/?product_id=') . get_the_ID(); ?>" style="text-decoration: none; color: inherit;">
                <div class="card_product">
                    <div class="card_header">
                        <div class="img-container">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/article-pages/logo-time-2.png" alt="">
                        </div>
                        <h4><?php the_title(); ?></h4>
                    </div>
                    <div class="card_body">
                        <?php
                            $deskripsi_singkat = get_field('deskripsi-singkat');
                            $excerpt = wp_trim_words($deskripsi_singkat, 8, ' ...');
                        ?>
                        <p><?php echo esc_html($excerpt); ?></p>
                        <button class="product_button">Detail</button>
                    </div>
                </div>
            </a>
            <?php
        endwhile;
        wp_reset_postdata();
    else :
        echo 'No products found.';
    endif;

    die();
}
add_action('wp_ajax_filter_products_by_category', 'filter_products_by_category');
add_action('wp_ajax_nopriv_filter_products_by_category', 'filter_products_by_category');

