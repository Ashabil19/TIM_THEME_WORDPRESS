<?php get_header();?>


<section class="detail-article">

                <?php 
                        $gambar = get_template_directory_uri() . '/assets/img/kv-pi-services.jpeg';
                        // tinggal cari parameter dari ACF
                ?>
                <div class="ilustration" style="background-image: url('<?php echo $gambar; ?>');"></div>
                <div class="article-content">
                    <div class="article">
                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                            <h1><?php the_title(); ?></h1>
                            <div class="publisher">
                                <div class="pub-person">
                                    <p><?php echo get_the_author(); ?>, </p> 
                                </div>
                                <div class="pub-date">
                                    <p><?php echo get_the_date(); ?></p> <!-- Mengambil tanggal posting -->
                                </div>
                            </div>
                            <?php the_content(); ?>
                        <?php endwhile; else: ?>
                            <p><?php _e('No posts found.'); ?></p>
                        <?php endif; ?>
                    </div>


                  

                    <div class="additional-embed">
                        <div class="box-article">       
                            <?php
                                $args = array(
                                    'post_type' => 'post', 
                                    'posts_per_page' => 2, 
                                );
                                $query = new WP_Query($args); 
                                if ($query->have_posts()) : 
                                    while ($query->have_posts()) : $query->the_post();
                                        ?>
                                                <a style="text-decoration: none; cursor:pointer;" href="<?php the_permalink(); ?>">
                                                    <div style="width:100%; border:1px solid grey;" class="card_product">
                                                        <div class="card_header">
                                                            <div style="height:240px;" class="img-container">
                                                            <?php if (has_post_thumbnail()) : ?>
                                                                <!-- Menampilkan gambar unggulan post -->
                                                                <img style="width:100%; height:200px;"  src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>" />
                                                            <?php else : ?>
                                                                <!-- Menampilkan gambar default jika tidak ada gambar unggulan -->
                                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/article-pages/tes-article.png" alt="" />
                                                            <?php endif; ?>
                                                            </div>
                                                            <h4  ><?php the_title(); ?></h4>
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
                    </div>
                   </div>
                </div>

       

                   
             




                



</section>








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
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/article-pages/tes-tinggi.jpg" alt="" />
            <h3>Nama Produk</h3>
        </div>
        <div class="card">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/article-pages/tes-article.png" alt="" />
            <h3>Nama Produk</h3>
        </div>
    </div>
</section>


<?php get_footer();?>