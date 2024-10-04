<?php get_header(); ?>

<section id="article-hero-mobile">
    <h1>OUR ARTICLE</h1>
    <div class="article-mobile-txt">
        <p>
            Taharica Instruments publishes various informative news and
            updates related to instrumental
        </p>
        <a href="">Read More</a>
    </div>
</section>

<section id="article-hero-container">
    <div class="line-article-hero"></div>
    <div class="article-hero">
        <div class="article-hero1">
            <h1>OUR ARTICLE</h1>
            <div class="article-hero-txt">
                <div class="line2-article-hero"></div>
                <h3>Building the Future One Design At A time</h3>
            </div>
        </div>
        <div class="article-hero2">
            <div class="logo">
                <!-- <img src="<?php echo get_template_directory_uri(); ?>/assets/img/article-pages/logo time 2.png" alt="" /> -->
                <h1>TAHARICA INSTRUMENTS INDONESIA</h1>
            </div>
            <div class="line2-article-hero"></div>
            <p>
                Time Instrument Indonesia publishes various informative news and
                updates related to instrumental
            </p>
        </div>
    </div>
</section>

<div class="separator-article"></div>

<section id="article">
    <div class="article-container">
        <?php
        // Menentukan query untuk menampilkan 8 artikel per halaman
        $args = array(
            'post_type' => 'post', // Hanya menampilkan tipe post standar
            'posts_per_page' => 6, // Menampilkan 6 post per halaman
            'paged' => get_query_var('paged') ? get_query_var('paged') : 1, // Mendukung pagination
        );
        // Menjalankan query untuk mendapatkan post
        $query = new WP_Query($args);

        // Jika ada artikel yang ditemukan
        if ($query->have_posts()) :
            // Loop untuk setiap artikel yang ditemukan
            while ($query->have_posts()) : $query->the_post(); ?>
                <a href="<?php the_permalink(); ?>">
                    <div class="card">
                        <div class="card-header">
                            <?php if (has_post_thumbnail()) : ?>
                                <!-- Menampilkan gambar unggulan post -->
                                <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>" />
                            <?php else : ?>
                                <!-- Menampilkan gambar default jika tidak ada gambar unggulan -->
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/article-pages/tes-article.png" alt="" />
                            <?php endif; ?>
                        </div>
                        <div class="card-text">
                            <h1> <?php
                                    // Mengambil judul dan menampilkan dua kata pertama
                                    $title = wp_trim_words(get_the_title(), 4, '...');
                                    echo esc_html($title);
                                    ?>
                            </h1>
                            <span><?php echo get_the_date(); ?></span>
                            <p>
                                <?php
                                $excerpt = wp_trim_words(get_the_excerpt(), 20, '...');
                                echo esc_html($excerpt);
                                ?>
                            </p>
                            <!-- Tampilkan tags -->
                            <?php
                            $tags = get_the_tags();
                            if ($tags) {
                                echo '<div class="tags">';
                                foreach ($tags as $tag) {
                                    echo '<span>' . esc_html($tag->name) . '</span> ';
                                }
                                echo '</div>';
                            } else {
                                echo '<p>No tags available</p>';
                            }
                            ?>
                            <div class="card-footer">
                                <a href="<?php the_permalink(); ?>">View Detail</a>
                            </div>
                        </div>
                    </div>
                </a>
        <?php endwhile; // Mengakhiri loop
        else :
            echo '<p>No articles found.</p>'; // Pesan jika tidak ada artikel ditemukan
        endif;

        // Reset query
        wp_reset_postdata();
        ?>
    </div>

</section>


<div style="margin-bottom: 50px" class="paggination">
    <div class="prev-paggination">
        <?php if (get_previous_posts_link()) : ?>
            <?php previous_posts_link('<img src="' . get_template_directory_uri() . '/assets/img/article-pages/prev-pag-icon.svg" alt="" /> <span class="previous-link">Previous</span>'); ?>
        <?php else : ?>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/article-pages/prev-pag-icon.svg" alt="" />
            <span style="color:#292929; text-decoration:none;">Previous</span>
        <?php endif; ?>
    </div>
    <div class="number-paggination">
        <?php
        $total_pages = $query->max_num_pages;
        $current_page = max(1, get_query_var('paged'));

        for ($i = 1; $i <= $total_pages; $i++) {
            $class = $i == $current_page ? 'active' : '';

            if ($i == $current_page) {
                echo "<span style='color:white; text-decoration:none;' class=\"$class\">$i</span>";
            } else {
                $page_link = get_pagenum_link($i);
                echo "<a style='color:#292929; text-decoration:none;' href=\"$page_link\" class='num-pag'>$i</a>";
            }
        }
        ?>
    </div>

    <div class="next-paggination">
        <?php if (get_next_posts_link(null, $query->max_num_pages)) : ?>
            <?php next_posts_link('<span style="color:#292929; text-decoration:none;" >Next</span> <img src="' . get_template_directory_uri() . '/assets/img/article-pages/next-pag-icon.svg" alt="" />', $query->max_num_pages); ?>
        <?php else : ?>
            <span style="color:#292929; text-decoration:none;">Next</span>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/article-pages/next-pag-ico" alt="" />
        <?php endif; ?>
    </div>
</div>



<section id="related-product-container">
    <div class="related-product">
        <h1>Related Product</h1>
    </div>
    <div class="card-container">
        <div class="card">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/article-pages/tes-article.png" alt="" />
            <h3>Nama Produk</h3>
        </div>
        <div class="card">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/article-pages/tes-article.png" alt="" />
            <h3>Nama Produk</h3>
        </div>
        <div class="card">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/article-pages/tes-article.png" alt="" />
            <h3>Nama Produk</h3>
        </div>
    </div>
</section>

<div class="quotes-footer">
    <h3>
        Time Instrument Indonesia publishes various informative news and updates
        related to instrumental
    </h3>
</div>

<?php get_footer(); ?>