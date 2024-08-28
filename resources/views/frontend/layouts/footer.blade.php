<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <style>
        /* Inline CSS for the footer */

        /* Base styling for footer */
        footer.default-padding {
            padding: 40px 0;
            background-color: #f8f9fa;
        }

        footer .footer-item {
            margin-bottom: 20px;
        }

        footer .footer-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        footer .list-info, footer .list, footer .recent-post {
            list-style: none;
            padding-left: 0;
            margin-left: 0;
        }

        footer .list-info li, footer .list li {
            margin-bottom: 10px;
            font-size: 16px;
        }

        footer .info-icon {
            display: flex;
            align-items: center;
        }

        footer .info-icon .fa {
            margin-right: 10px;
            color: black;
        }

        footer .recent-post li .date {
            font-size: 12px;
            color: #999;
        }

        footer .link ul {
            list-style: none;
            padding-left: 0;
            margin: 0;
        }

        footer .link ul li {
            margin-bottom: 10px;
        }

        footer .link ul li a {
            font-size: 16px;
            margin-bottom: 10px;
        }

        footer .link ul li a:hover {
            text-decoration: underline;
        }

        footer p {
            margin: 0;
            font-size: 14px;
        }

        .text-right {
            text-align: right;
        }

        /* Responsive footer grid */
        .footer-grid {
            display: flex;
            flex-wrap: wrap;
        }

        .footer-grid > div {
            flex: 1 1 100%; /* Full width on small screens */
            padding: 10px;
        }

        /* Adjust layout for medium screens and above */
        @media (min-width: 768px) {
            .footer-grid > div {
                flex: 1 1 45%; /* Two columns layout */
            }
        }

        /* Adjust layout for large screens */
        @media (min-width: 992px) {
            .footer-grid > div {
                flex: 1 1 22%; /* Four columns layout */
            }
        }

        /* Custom CSS for background color and image size */
        footer.custom-bg {
            background-color: #DCEBF2;
            color: #666;
        }

        footer .footer-item img {
            max-width: 100%; /* Ensure the logo doesn't exceed its container */
            height: auto; /* Maintain aspect ratio */
            margin-bottom: 10px;
        }

        /* Responsive text sizes */
        @media (max-width: 767px) {
            footer .footer-title {
                font-size: 16px;
            }

            footer .list-info li, footer .list li, footer .link ul li a {
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            footer .footer-title {
                font-size: 14px;
            }

            footer .list-info li, footer .list li, footer .link ul li a {
                font-size: 12px;
            }
        }

    </style>
</head>
<body>

    <!-- Your other content -->

    <footer class="default-padding custom-bg">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-item">
                    <div class="title-wrapper">
                        <img src="{{ asset('frontend') }}/img/illustrations/logo6.png" class="logo logo-display" alt="Logo">
                    </div>
                    <ul class="list-info">
                        <li>
                            <div class="info-icon">
                                <span class="fa fa-envelope"></span>
                                <span class="info-text">Email</span>
                            </div>
                        </li>
                        <li>
                            <div class="info-icon">
                                <span class="fa fa-phone"></span>
                                <span class="info-text">(0761) 654-123987</span>
                            </div>
                        </li>
                        <li>
                            <div class="info-icon">
                                <span class="fa fa-map-marker"></span>
                                <span class="info-text">99 S.t Jomblo Park Pekanbaru 28292. Indonesia</span>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="footer-item">
                    <div class="footer-title">INFORMASI PENTING</div>
                    <ul class="list">
                        <li><a href="tentang" title="Tentang SILANTIK">Tentang SILANTIK</a></li>
                        <li><a href="#" title="Hubungi Kami">Hubungi Kami</a></li>
                        <li><a href="#" title="Syarat dan Ketentuan">Syarat dan Ketentuan</a></li>
                        <li><a href="#" title="Kebijakan Privasi">Kebijakan Privasi</a></li>
                    </ul>
                </div>

                <div class="footer-item">
                    <div class="footer-title">INFORMASI TAMBAHAN</div>
                    <ul class="list">
                        <li><a href="#" title="Bantuan">Bantuan</a></li>
                        <li><a href="berita" title="Berita">Berita</a></li>
                        <li><a href="layanan" title="Layanan">Layanan</a></li>
                    </ul>
                </div>

                <div class="footer-item">
                    <div class="footer-title">OPSIONAL</div>
                    <ul class="list">
                        <li><a href="#" title="Kontak">Kontak</a></li>
                        <li><a href="tanya-jawab" title="FaQ">FaQ</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

</body>
</html>
