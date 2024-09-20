<?php get_header()?>

<section id="homepage">
    <?php 
        $gambar = get_template_directory_uri() . '/assets/img/article-pages/tes-article.png';
        // tinggal cari parameter dari ACF
    ?>
    <div class="banner" style="background-image: url('<?php echo $gambar; ?>');">
    
    </div>
</section>

<section class="product-section" >
    <div class="box-content filter-container">

        INI CERITANYA Filter
    </div>
    <div class="box-content product-container">

            <?php
                $args = array(
                    'post_type'      => 'product',
                    'posts_per_page' => 6, 
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
                                        // Ambil data dari custom field 'deskripsi-singkat'
                                        $deskripsi_singkat = get_field('deskripsi-singkat');
                                        // Batasi menjadi 8 kata dengan wp_trim_words
                                        $excerpt = wp_trim_words($deskripsi_singkat, 8, ' ...');
                                    ?>
                                    <p><?php echo esc_html($excerpt);?></p>
                                    <button class="product_button">Detail</button>
                                </div>
                            </div>
                        </a>
     
                        <?php

                    endwhile;
                    wp_reset_postdata(); 


                else :
                    echo 'No posts found.';
                endif;
            ?>
</section>
<div class="paggination ">
        <div class="prev-paggination">
            <?php if (get_previous_posts_link()) : ?>
                <?php previous_posts_link('<img src="' . get_template_directory_uri() . '/assets/img/product-pages/prev-pag-icon.svg" alt="" /> <span class="previous-link">Previous</span>'); ?>
            <?php else : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/product-pages/prev-pag-icon.svg" alt="" />
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
                <?php next_posts_link('<span style="color:#292929; text-decoration:none;" >Next</span> <img src="' . get_template_directory_uri() . '/assets/img/product-pages/next-pag-icon.svg" alt="" />', $query->max_num_pages); ?>
            <?php else : ?>
                <span style="color:#292929; text-decoration:none;">Next</span>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/product-pages/next-pag-icon.svg" alt="" />
            <?php endif; ?>
        </div>

    </div>

    </div>


<?php get_footer()?>