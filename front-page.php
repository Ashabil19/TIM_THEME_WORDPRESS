<?php get_header(); ?>


<div class="hero">

    <div class="slider">
        <div class="list">
            <?php
            // Query untuk mendapatkan post dari custom post type 'frontpage-slider'
            $args = array(
                'post_type' => 'frontpage-slider',
                'posts_per_page' => -1, // Mengambil semua post
                'orderby' => 'date',    // Urutkan berdasarkan tanggal
                'order' => 'ASC'        // Urutan dari yang paling lama ke baru
            );


            $slider_query = new WP_Query($args);

            if ($slider_query->have_posts()) :
                while ($slider_query->have_posts()) : $slider_query->the_post();
                    // Mengambil gambar dari field ACF
                    $banner_image = get_field('slider_image');
                    if ($banner_image):
            ?>
                        <div class="item">
                            <img style='width:100%;' src="<?php echo esc_url($banner_image['url']); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
                        </div>
            <?php
                    endif;
                endwhile;
                wp_reset_postdata(); // Mengembalikan post global ke query utama
            endif;
            ?>
        </div>

        <ul class="dots">
            <?php
            // Membuat list dot untuk navigasi slider
            $count = $slider_query->post_count; // Mendapatkan jumlah post
            for ($i = 0; $i < $count; $i++) {
                echo '<li' . ($i === 0 ? ' class="active"' : '') . '></li>';
            }
            ?>
        </ul>
    </div>

    <div class="slogan-container">
        <div class="slogan-content">
            <div class="slogan-header">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/slogan1.svg" alt="" />
            </div>
            <h4>Best Quality</h4>
            <p>
                Kualitas terbaik,
                dibuat dengan teliti untuk kepuasan Anda.
            </p>
        </div>
        <div class="slogan-content">
            <div class="slogan-header">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/slogan2.svg" alt="" />
            </div>
            <h4>Best Price</h4>
            <p>
                Harga terbaik,
                selalu memberikan nilai lebih untuk Anda.
            </p>
        </div>
        <div class="slogan-content">
            <div class="slogan-header">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/slogan3.svg" alt="" />
            </div>
            <h4>Waranty</h4>
            <p>
                Garansi terbaik,
                kepuasan Anda adalah prioritas utama kami.
            </p>
        </div>
    </div>
</div>

<!-- vertikal slider -->
<div class="slider2-container">
    <div class="dot2s2-nav">
        <div class="dot2 active"></div>
        <div class="dot2"></div>
    </div>

    <div class="slider2">
        <div class="slide">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ti_hero.svg" alt="Slide 1" />
            <button class="slide-btn bounce2"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/down-arrow.svg" alt="down arrow"></button>
        </div>
        <div class="slide video-slide">
            <div class="video-caption">
                <h1>TIME 5100</h1>
                <h3>Pen Type Leeb Hardness Tester</h3>
            </div>
            <video
                id="video"
                role="presentation"
                preload="auto"
                playsinline=""
                crossorigin="anonymous"
                loop=""
                muted=""
                autoplay="">
                <source src="<?php echo get_template_directory_uri(); ?>/assets/video/hardness_tester.mp4" type="video/mp4" />
            </video>
            <button class="slide-btn bounce2"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/up-arrow.svg" alt="up arrow"></button>
        </div>
    </div>
</div>

<script>
    // vertikal slider home
    const slider2 = document.querySelector(".slider2");
    const slider2Container = document.querySelector(".slider2-container");
    const slides = document.querySelectorAll(".slide");
    const dot2s2 = document.querySelectorAll(".dot2");
    const slideButtons = document.querySelectorAll(".slide-btn");

    let currentSlide = 0;
    let isScrolling = false;
    let startY;

    function goToSlide(index) {
        if (index < 0) index = 0;
        if (index >= slides.length) index = slides.length - 1;

        slider2.style.transform = `translateY(-${index * 100}vh)`;
        currentSlide = index;

        dot2s2.forEach((dot2) => dot2.classList.remove("active"));
        dot2s2[currentSlide].classList.add("active");
    }

    dot2s2.forEach((dot2, index) => {
        dot2.addEventListener("click", () => {
            goToSlide(index);
        });
    });

    // Navigasi dengan tombol slider
    slideButtons.forEach((button, index) => {
        button.addEventListener("click", () => {
            if (index === 0 && currentSlide < slides.length - 1) {
                goToSlide(currentSlide + 1); // Tombol "down arrow"
            } else if (index === 1 && currentSlide > 0) {
                goToSlide(currentSlide - 1); // Tombol "up arrow"
            }
        });
    });

    // Touch events for mobile
    slider2.addEventListener("touchstart", (e) => {
        startY = e.touches[0].clientY;
    });

    slider2.addEventListener("touchmove", (e) => {
        if (!isScrolling && startY) {
            const currentY = e.touches[0].clientY;
            const diff = startY - currentY;

            if (Math.abs(diff) > 50) {
                isScrolling = true;

                if (diff > 0) {
                    // Geser ke atas
                    if (currentSlide < slides.length - 1) {
                        e.preventDefault();
                        goToSlide(currentSlide + 1);
                    }
                } else if (diff < 0) {
                    // Geser ke bawah
                    if (currentSlide > 0) {
                        e.preventDefault();
                        goToSlide(currentSlide - 1);
                    }
                }

                startY = null;
                setTimeout(() => {
                    isScrolling = false;
                }, 800);
            }
        }
    });
    // end vertikal slider home
</script>

<!-- vertikal slider -->





<div class="home-related-article">
    <div class="related-article">
        <?php
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 2, // Mengambil 2 post terbaru
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
        ?>
                <div class="article-card">
                    <div class="article-card-head">


                        <?php if (has_post_thumbnail()) : ?>
                            <!-- Menampilkan gambar unggulan post -->
                            <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>" />
                        <?php else : ?>
                            <!-- Menampilkan gambar default jika tidak ada gambar unggulan -->
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/article-pages/tes-article.png" alt="" />
                        <?php endif; ?>
                    </div>
                    <div class="article-card-bages">
                        <h3>Artikel</h3> <!-- Anda bisa mengganti ini sesuai dengan kategori post jika diperlukan -->
                    </div>
                    <div class="article-title">
                        <a style="color:#292929 text-decoration:none" href="<?php the_permalink(); ?>" style="text-decoration: none;">
                            <h3><?php the_title(); ?></h3>
                        </a>
                    </div>
                </div>
        <?php
            endwhile;
            wp_reset_postdata(); // Mengembalikan post global ke query utama
        else :
            echo 'No posts found.';
        endif;
        ?>
    </div>
</div>








<section class="container-tab">
    <div class="tab" data-tabset="2">
        <button class="tablinks tab-active" data-tabset="2">New Product</button>
        <button class="tablinks" data-tabset="2">All Products</button>
        <div class="line2" data-tabset="2"></div>
    </div>
    <div class="tabcontent-container" data-tabset="2">

        <div class="tabcontent tab-active" data-tabset="2">
            <div class="card-container">
                <?php
                $args = array(
                    'post_type' => 'product', // Custom post type 'product'
                    'posts_per_page' => 8, // Jumlah post yang ingin ditampilkan
                    'orderby' => 'date', // Urutkan berdasarkan tanggal publikasi
                    'order' => 'DESC' // Urutan menurun, dari yang terbaru ke lama
                );

                $query = new WP_Query($args);

                $query = new WP_Query($args);

                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                ?>

                        <a href="<?php echo home_url('/detail-product/?product_id=') . get_the_ID(); ?>" style="text-decoration: none; color: inherit;">
                            <div class="card">
                                <div class="card-img">
                                    <?php
                                    $image = get_field('foto-product'); // Mengambil data dari custom field

                                    if ($image) {
                                        echo '<div class="img-item"><img src="' . esc_url($image['url']) . '" alt="' . esc_attr(get_the_title()) . '" /></div>';
                                    }
                                    ?>
                                </div>
                                <div class="card-title">
                                    <h3><?php the_title(); ?></h3>
                                </div>
                                <div class="card-footer">
                                    <button>Detail</button>
                                </div>
                            </div>
                        </a>

                <?php
                    endwhile;
                    wp_reset_postdata(); // Mengembalikan post global ke query utama
                else :
                    echo 'No posts found.';
                endif;
                ?>
            </div>
        </div>

        <div class="tabcontent" data-tabset="2">
            <div class="card-container">
                <?php
                $args = array(
                    'post_type' => 'product', // Custom post type 'product'
                    'posts_per_page' => 16, // Jumlah post yang ingin ditampilkan
                    'orderby' => 'date', // Urutkan berdasarkan tanggal publikasi
                    'order' => 'ASC' // Urutan menurun, dari yang terbaru ke lama
                );

                $query = new WP_Query($args);

                $query = new WP_Query($args);

                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                ?>

                        <a href="<?php echo home_url('/detail-product/?product_id=') . get_the_ID(); ?>" style="text-decoration: none; color: inherit;">
                            <div class="card">
                                <div class="card-img">
                                    <?php
                                    $image = get_field('foto-product'); // Mengambil data dari custom field

                                    if ($image) {
                                        echo '<div class="img-item"><img src="' . esc_url($image['url']) . '" alt="' . esc_attr(get_the_title()) . '" /></div>';
                                    }
                                    ?>
                                </div>
                                <div class="card-title">
                                    <h3><?php the_title(); ?></h3>
                                </div>
                                <div class="card-footer">
                                    <button>Detail</button>
                                </div>
                            </div>
                        </a>

                <?php
                    endwhile;
                    wp_reset_postdata(); // Mengembalikan post global ke query utama
                else :
                    echo 'No posts found.';
                endif;
                ?>
            </div>
        </div>
    </div>
</section>




<!-- 
<section id="kategori-home">
    <div class="wrapper-kategori">
        <h1>Popular Categories</h1>
        <hr / style="margin-bottom: 10px;">
        <div class="carousel-container">
            <button id="prev">&#10094;</button>
            <div class="carousel-kategori">
                <ul>
                    <li class="card-kategori">
                        <a href="">
                            <div
                                class="img-kategori"
                                style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/kategori1.jpg)">
                                <h2>Category 1</h2>
                            </div>
                        </a>
                    </li>

                    <li class="card-kategori">
                        <div
                            class="img-kategori"
                            style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/kategori2.png)">
                            <h2>Category 2</h2>
                        </div>
                    </li>
                    <li class="card-kategori">
                        <div
                            class="img-kategori"
                            style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/kategori3.jpg)">
                            <h2>Category 3</h2>
                        </div>
                    </li>
                    <li class="card-kategori">
                        <div
                            class="img-kategori"
                            style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/kategori4.jpg)">
                            <h2>Category 4</h2>
                        </div>
                    </li>
                    <li class="card-kategori">
                        <div
                            class="img-kategori"
                            style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/kategori5.png)">
                            <h2>Category 5</h2>
                        </div>
                    </li>
                    <li class="card-kategori">
                        <div
                            class="img-kategori"
                            style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/kategori6.png)">
                            <h2>Category 6</h2>
                        </div>
                    </li>
                    <li class="card-kategori">
                        <div
                            class="img-kategori"
                            style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/kategori7.png)">
                            <h2>Category 7</h2>
                        </div>
                    </li>
                    <li class="card-kategori">
                        <div
                            class="img-kategori"
                            style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/kategori8.png)">
                            <h2>Category 8</h2>
                        </div>
                    </li>
                </ul>
            </div>
            <button id="next">&#10095;</button>
        </div>
    </div>
</section> -->





<?php get_footer(); ?>