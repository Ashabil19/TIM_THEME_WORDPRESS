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
            <?php
            require_once __DIR__ . '/vendor/autoload.php'; // Sesuaikan path sesuai dengan lokasi autoload.php

            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\Exception;

            // Akses ke database global
            global $wpdb;
            // Flag untuk mengetahui apakah form berhasil dikirim
            $form_submitted = false;

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                // Ambil dan sanitasi data dari form
                $name = sanitize_text_field($_POST['name']);
                $email = sanitize_email($_POST['email']);
                $phone_number = sanitize_text_field($_POST['phone_number']);
                $company = sanitize_text_field($_POST['company']);
                $message = sanitize_textarea_field($_POST['message']);

                // Validasi bahwa field wajib diisi
                if (!empty($name) && !empty($company) && !empty($email) && !empty($phone_number) && !empty($message)) {

                    // Simpan data ke dalam tabel custom
                    $wpdb->insert(
                        'contact_form_submissions', // Nama tabel database
                        array(
                            'name' => $name,
                            'email' => $email,
                            'phone_number' => $phone_number,
                            'company' => $company,
                            'message' => $message,
                            'submission_date' => current_time('mysql'),
                        )
                    );

                    if ($wpdb->insert_id) {
                        // Email telah disimpan di database, sekarang kirim email notifikasi
                        $mail = new PHPMailer(true);
                        try {
                            // Set PHPMailer untuk menggunakan SMTP
                            $mail->isSMTP();
                            $mail->Host = 'smtp.gmail.com'; // Ganti dengan SMTP host kamu
                            $mail->SMTPAuth = true;
                            $mail->Username = 'ashabilsyauqi@gmail.com'; // Ganti dengan username email SMTP kamu
                            $mail->Password = 'fbfrolfhozvqoayj'; // Ganti dengan password atau App password
                            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                            $mail->Port = 587;

                            // Set pengirim email
                            $mail->setFrom($email, $name); // Tetapkan email pengguna sebagai pengirim

                            // Tambahkan Reply-To dari pengguna yang submit form
                            $mail->addReplyTo($email, $name); // Alamat email pengguna yang mengisi form

                            // Set penerima email (admin)
                            $mail->addAddress('ashabilsyauqi@gmail.com', 'Ashabil Syauqi'); // Email tujuan (admin)

                            // Set isi email
                            $mail->isHTML(true); // Email menggunakan format HTML
                            $mail->Subject = 'New Contact Form Submission';
                            $mail->Body    = "<strong>Name:</strong> $name <br>
                                        <strong>Email:</strong> $email <br>
                                        <strong>Phone:</strong> $phone_number <br>
                                        <strong>Company:</strong> $company <br>
                                        <strong>Message:</strong> <br> $message";

                            // Kirim email
                            $mail->send();
                            $form_submitted = true; // Ubah flag menjadi true setelah email berhasil dikirim
                        } catch (Exception $e) {
                            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                        }
                    } else {
                        echo '<p>There was an error saving your message. Please try again.</p>';
                    }
                } else {
                    echo '<p>Please fill in all required fields.</p>';
                }
            }
            ?>

            <?php if ($form_submitted) : ?>
                <!-- Tampilkan pesan sukses -->
                <!-- <p style="text-align: center; color: green;">Your message has been successfully sent!</p> -->
                <script>
                    alert('Form Submitted')
                </script>
            <?php endif; ?>
            <form action="" method="post" onsubmit="return validateForm();">
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
                <button type="submit">ASK A QUESTION</button>
            </form>
        </div>
    </div>

    <script>
        function validateForm() {
            var name = document.getElementById('name').value;
            var email = document.getElementById('email').value;
            var phone = document.getElementById('phone_number').value;
            var company = document.getElementById('company').value;
            var message = document.getElementById('message').value;

            if (name == "" || company == "" || email == "" || phone == "" || message == "") {
                alert("Please fill in all required fields.");
                return false;
            }
            return true;
        }
    </script>
</section>

<?php get_footer(); ?>