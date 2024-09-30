<?php get_header(); ?>

<section id="contact-us">
    <h1>Contact Us</h1>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.2247646531337!2d106.92011787475074!3d-6.234074893754143!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698d5136fb5c4f%3A0xf3d086329e513d9c!2sPT%20TAHARICA!5e0!3m2!1sid!2sid!4v1727144519361!5m2!1sid!2sid" width="80%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

    <div class="number-form-container">

        <div class="contact-name">
            <h3>Hubungi Kami</h3>
            <div class="name">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/TelephoneOutbound.svg" alt="">
                <span>+62 21 86906777</span>
            </div>
            <div class="name">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/TelephoneOutbound.svg" alt="">
                <span>+62 21 86906777</span>
            </div>
            <div class="name">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/TelephoneOutbound.svg" alt="">
                <span>+62 21 86906777</span>
            </div>
            <div class="name">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/TelephoneOutbound.svg" alt="">
                <span>+62 21 86906777</span>
            </div>
        </div>
        <div class="form-container">
            <h4>UNTUK REQUEST INFORMASI TENTANG PRODUK ATAU PERUSAHAAN KAMI</h4>
            <h3>KONTAK KAMI SEGERA DIBAWAH INI</h3>
            <form action="" method="post">
                <div class="form-row">
                    <div class="form-input">
                        <label for="name">Your Name</label>
                        <input type="text" name="name" id="name" required>
                    </div>
                    <div class="form-input">
                        <label for="email">Your Email</label>
                        <input type="email" name="email" id="email" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-input">
                        <label for="phone_number">Phone Number</label>
                        <input type="number" name="phone_number" id="phone_number" required>
                    </div>
                    <div class="form-input">
                        <label for="company">Company</label>
                        <input type="text" name="company" id="company">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-input">
                        <label for="message">Your Message</label>
                        <textarea id="message" name="message" cols="100" rows="10" required></textarea>
                    </div>
                </div>
                <button type="submit" name="submit_form">ASK A QUESTION</button>
            </form>
        </div>
    </div>
</section>

<?php get_footer(); ?>