<?php get_header(); ?>

<section class="search-results">

    <h1>Hasil Pencarian: <?php echo get_search_query(); ?></h1>

    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            if (get_post_type() === 'product') : // Pastikan hanya menampilkan post type 'product'
                $foto_product = get_field('foto-product');
                $foto_url = $foto_product ? $foto_product['url'] : get_template_directory_uri() . '/assets/img/article-pages/logo-time-2.png';
    ?>
                <div class="container-card search">
                    <a href="<?php echo home_url('/detail-product/?product_id=') . get_the_ID(); ?>" style="text-decoration: none; color: inherit;">
                        <div class="card_product">
                            <div class="card_header">
                                <div class="img-container">
                                    <img src="<?php echo esc_url($foto_url); ?>" alt="">
                                </div>
                                <h4><?php the_title(); ?></h4>
                            </div>
                            <div class="card_body">
                                <?php
                                $deskripsi_singkat = get_field('deskripsi_singkat');
                                $excerpt = wp_trim_words($deskripsi_singkat, 8, ' ...');
                                ?>
                                <p><?php echo esc_html($excerpt); ?></p>
                                <button class="product_button">Detail</button>
                            </div>
                        </div>
                    </a>
                </div>
    <?php
            endif;
        endwhile;
    else :
        echo '<p>No products found.</p>';
    endif;

    wp_reset_postdata();
    ?>
</section>

<?php get_footer(); ?>