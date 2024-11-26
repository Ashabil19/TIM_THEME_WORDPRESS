<?php get_header(); ?>
<?php
// Ambil parameter product_id dari URL
$product_id = isset($_GET['product_id']) ? intval($_GET['product_id']) : 0;

// Cek jika product_id valid
if ($product_id > 0) {
    // Ambil post dengan ID yang sesuai
    $post = get_post($product_id);

    if ($post && $post->post_type == 'product') {
        setup_postdata($post);
?>

        <article>
            <div class="pages-name">
                <h4>Home</h4>
                <h4>></h4>
                <h4>Product</h4>
                <h4>></h4>
                <h4><?php the_title(); ?></h4>
            </div>

            <section id="detail-product">
                <div class="product-img">
                    <div class="img-item-container">
                        <?php
                        // Ambil gambar produk dari ACF
                        $images = [
                            get_field('foto-product'),
                            get_field('foto_product_2'),
                            get_field('foto_product_3'),
                            get_field('foto_product_4')
                        ];
                        foreach ($images as $image) {
                            if ($image) {
                                echo '<div class="img-item"><img src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '" /></div>';
                            }
                        }
                        ?>
                    </div>
                    <div class="img-preview">
                        <img src="<?php echo esc_url(get_field('foto-product')['url']); ?>" alt="<?php echo esc_attr(get_field('foto-product')['alt']); ?>" />
                    </div>
                </div>
                <div class="product-desc">
                    <h1><?php the_title(); ?></h1>
                    <small><?php echo get_the_category_list(', '); ?></small>
                    <p><?php echo wp_kses_post(get_field('deskripsi-singkat')); ?></p>
                    <!-- <button>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/detail-product-pages/Whatsapp.svg" alt="" />
                        <h3>Minta Penawaran</h3>
                    </button> -->
                    <a href="https://wa.me/6285215560669?text=Hallo,%20saya%20ingin%20mendapatkan%20penawaran%20dari%20produk%20ini:%20<?php echo urlencode(get_permalink()); ?>" 
                        target="_blank" 
                        class="btn-penawaran" 
                        style="display: inline-flex; align-items: center; background:  #152793; color: white; text-decoration: none; padding: 10px 20px; border-radius: 5px; font-size: 14px; gap: 10px;">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/detail-product-pages/Whatsapp.svg" 
                            alt="WhatsApp Icon" 
                            style="width: 14%; height: auto;" />
                        <h3 style="margin: 0; font-size: 16px;">Minta Penawaran</h3>
                    </a>


                </div>
            </section>

            <section id="container-tab-product">
                <div class="tab-product" data-tabsProductet="3">
                    <button class="tablinks-product tab-product-active" data-tabsProductet="3">Spesifikasi</button>
                    <button class="tablinks-product" data-tabsProductet="3">Fitur</button>
                    <button class="tablinks-product" data-tabsProductet="3">What u get</button>
                </div>
                <div class="tabcontent-product-container" data-tabsProductet="3">
                    <div class="tabcontent-product tab-product-active" data-tabsProductet="3">
                        <h1>Spesifikasi</h1>
                        <div class="spesifikasi_content"><?php echo wp_kses_post(get_field('spesifikasi')); ?></div>
                    </div>
                    <div class="tabcontent-product" data-tabsProductet="3">
                        <h3>Fitur</h3>
                        <div class="fitur_content"><?php echo wp_kses_post(get_field('fitur')); ?></div>
                    </div>
                    <div class="tabcontent-product" data-tabsProductet="3">
                        <h3>What You Get</h3>
                        <div class="wyg_content"><?php echo wp_kses_post(get_field('what-you-get')); ?></div>
                    </div>
                </div>
            </section>


            <section id="related-article-product">
                <h2>Related Article</h2>
                <div class="article-container">
                    <?php
                    // Ambil artikel terkait (misalnya dengan query)
                    $related_articles = new WP_Query([
                        'post_type' => 'post',
                        'posts_per_page' => 3,
                        'orderby' => 'rand'
                    ]);
                    if ($related_articles->have_posts()) :
                        while ($related_articles->have_posts()) : $related_articles->the_post();
                    ?>
                            <div class="article-card">
                                <div class="article-card-head">
                                    <img src="<?php the_post_thumbnail_url(); ?>" alt="" />
                                </div>
                                <div class="article-card-content">
                                    <h3><?php the_title(); ?></h3>
                                    <p>
                                        <?php
                                        $excerpt = wp_trim_words(get_the_excerpt(), 20, '...');
                                        echo esc_html($excerpt);
                                        ?>
                                    </p>
                                </div>
                            </div>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
                <button>Read More</button>
            </section>

            <section id="related-product-detail">
                <h2>Related Product</h2>
                <div class="product-container">
                    <?php
                    // Ambil produk terkait
                    $related_products = new WP_Query([
                        'post_type' => 'product',
                        'posts_per_page' => 4,
                        'orderby' => 'rand'
                    ]);
                    if ($related_products->have_posts()) :
                        while ($related_products->have_posts()) : $related_products->the_post();
                    ?>
                            <div class="product-card">
                                <div class="product-card-head">
                                    <img src="<?php the_post_thumbnail_url(); ?>" alt="" />
                                </div>
                                <div class="product-card-content">
                                    <h3><?php the_title(); ?></h3>
                                    <p><?php echo get_the_category_list(', '); ?></p>
                                </div>
                            </div>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
            </section>
        </article>

<?php
        wp_reset_postdata();
    } else {
        echo '<p>Produk tidak ditemukan.</p>';
    }
} else {
    echo '<p>ID produk tidak valid.</p>';
}
?>

<?php get_footer(); ?>