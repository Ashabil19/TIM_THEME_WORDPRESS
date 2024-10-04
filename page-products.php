<?php get_header()?>

<section id="homepage">
    <?php 
        $gambar = get_template_directory_uri() . '/assets/img/kv-pi-services.jpeg';
        // tinggal cari parameter dari ACF
    ?>
    <div class="banner" style="background-image: url('<?php echo $gambar; ?>');">
    
    </div>
</section>

<section class="product-section" >



    <div class="box-content filter-container">
        <?php
        // Fungsi untuk menampilkan kategori dan subkategori
        function display_category_hierarchy($parent_id = 0, $taxonomy = 'category') {
            // Ambil semua terms dari taxonomy 'category' dengan parent ID tertentu
            $categories = get_terms(array(
                'taxonomy'   => $taxonomy,
                'parent'     => $parent_id,
                'hide_empty' => false, // Jangan sembunyikan kategori yang kosong
            ));

            // Periksa apakah ada kategori yang ditemukan
            if (!empty($categories) && !is_wp_error($categories)) {
                $output = '';
                foreach ($categories as $category) {
                    // Tampilkan kategori utama
                    $output .= '<div class="accordion-item">';
                    $output .= '<button class="accordion-header"><span class="filter-text" data-category-id="' . esc_attr($category->term_id) . '">' . esc_html($category->name) . '</span></button>';
                    $output .= '<div class="accordion-content">';

                    // Tampilkan subkategori
                    $subcategories = display_subcategories($category->term_id, $taxonomy);
                    $output .= $subcategories;

                    $output .= '</div>'; // Tutup accordion-content
                    $output .= '</div>'; // Tutup accordion-item
                }
                return $output;
            }
            return '';
        }

        // Fungsi untuk menampilkan subkategori
        function display_subcategories($parent_id, $taxonomy) {
            // Ambil semua subkategori
            $subcategories = get_terms(array(
                'taxonomy'   => $taxonomy,
                'parent'     => $parent_id,
                'hide_empty' => false,
            ));

            $output = '';
            if (!empty($subcategories) && !is_wp_error($subcategories)) {
                foreach ($subcategories as $subcategory) {
                    $output .= '<div class="accordion-sub-item">';
                    $output .= '<button class="accordion-sub-header"><span class="filter-text" data-category-id="' . esc_attr($subcategory->term_id) . '">' . esc_html($subcategory->name) . '</span></button>';
                    $output .= '<div class="accordion-sub-content">';
                    // Tampilkan sub-subkategori
                    $output .= display_category_hierarchy($subcategory->term_id, $taxonomy);
                    $output .= '</div>'; // Tutup accordion-sub-content
                    $output .= '</div>'; // Tutup accordion-sub-item
                }
            }
            return $output;
        }

        // Memulai tampilan dari kategori utama (parent = 0)
        echo '<div class="accordion-container">';
        echo display_category_hierarchy(0, 'category');
        echo '</div>';
        ?>

                
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
                                    <?php if (has_post_thumbnail()) : ?>
                                        <!-- Menampilkan gambar unggulan post -->
                                        <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>" />
                                    <?php else : ?>
                                        <!-- Menampilkan gambar default jika tidak ada gambar unggulan -->
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/article-pages/tes-article.png" alt="" />
                                    <?php endif; ?>
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
    </div>



</section>



<div class="paggination" style="margin-bottom:100px;">
        <div class="prev-paggination">
            <?php if (get_previous_posts_link()) : ?>
                <?php previous_posts_link('<img src="' . get_template_directory_uri() . '/assets/img/prev-pag-icon.svg" alt="" /> <span class="previous-link">Previous</span>'); ?>
            <?php else : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/prev-pag-icon.svg" alt="" />
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
                <?php next_posts_link('<span style="color:#292929; text-decoration:none;" >Next</span> <img src="' . get_template_directory_uri() . '/assets/img/next-pag-icon.svg" alt="" />', $query->max_num_pages); ?>
            <?php else : ?>
                <span style="color:#292929; text-decoration:none;">Next</span>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/next-pag-icon.svg" alt="" />
            <?php endif; ?>
        </div>

    </div>

    </div>


    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
            // Ambil semua elemen teks di dalam button yang memiliki class 'filter-text'
            var categoryTextSpans = document.querySelectorAll('.filter-text');

            // Pasang event listener pada setiap teks di dalam button
            categoryTextSpans.forEach(function(span) {
                span.addEventListener('click', function(event) {
                    var categoryId = this.getAttribute('data-category-id'); // Ambil ID kategori yang diklik

                    // Mencegah klik pada button lainnya
                    event.stopPropagation();

                    // Kirimkan permintaan AJAX
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', '<?php echo admin_url('admin-ajax.php'); ?>', true);
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    
                    xhr.onload = function() {
                        if (xhr.status >= 200 && xhr.status < 400) {
                            // Update kontainer produk dengan hasil baru
                            document.querySelector('.product-container').innerHTML = xhr.responseText;
                        }
                    };
                    
                    // Kirim data kategori ke server
                    xhr.send('action=filter_products_by_category&category_id=' + categoryId);
                });
            });
        });
    </script>




<?php get_footer()?>
