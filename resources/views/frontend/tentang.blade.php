@extends('frontend.layouts.master')
@section('title')
    Tentang
@endsection
@push('script')
<script>
    
    document.addEventListener('DOMContentLoaded', function() {
        const companySection = document.getElementById('company');

        companySection.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.05)';
            this.style.transition = 'transform 0.3s ease';
        });

        companySection.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
        });
    });
    function toggleMissionDetail(element) {
    // Toggle class 'active' pada parent element .misi
    element.classList.toggle('active');
}

</script>
@endpush
@push('style')

    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

<style>
    

header {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

li, a, button {
  font-weight: 500;
  font-size: 16px;
  color: black;
  text-decoration: none;
}

/* Hero Section */
.bgimage {
    background-image: url('{{ asset('frontend') }}/img/illustrations/tentang5.png');
    background-size: cover;
    background-position: center;
    width: 100%;
    height: 700px; /* Adjust height as needed */
    display: flex;
    justify-content: right; /* Center content horizontally */
    align-items: center; /* Center content vertically */
    border-radius: 20px; /* Adjust border radius as needed */
    position: relative;
}

.ovrlytxt {
    color: #ffffff;
    padding: 20px;
    text-align: center;
    weight: bold;
    font-family: 'Montserrat', sans-serif; /* Apply Montserrat font */
    line-height: 1.4;
}

.ovrlytxt h3 {
    margin: 0;
    font-size: 80px;
    text-shadow: 4px 4px 6px rgba(255, 255, 255, 1); /* White shadow */
    font-weight: 700;
}

.ovrlytxt .yellow, .ovrlytxt .blue {
    display: inline-block;
    margin-right: -10px; /* Adjust margin to bring spans closer */
}

.ovrlytxt .yellow {
    color: #FFBE55;
}

.ovrlytxt .blue {
    color: #2568EF;
}

.ovrlytxt p {
    margin-top: 10px;
    font-size: 29px;    
    color: #ffffff;
    text-shadow: 4px 4px 6px rgba(61, 133, 198, 1); /* White shadow */
    line-height:1.7;
    font-weight: 700;
}




/* Gambar Dibawah header */
.tentang_img1 {
    border-radius: 10px;
}


/* Company Section */
#our-company {
    padding: 50px 20px;
    background: #f9f9f9;
    display: flex;
    justify-content: center;
}

.company-card {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 80%;
    max-width: 1000px;
    margin-bottom: 50px;
    padding: 30px;
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s, box-shadow 0.3s;
}

.company-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

.company-card .card-text {
    flex: 1;
    padding: 0 20px;
    color: black;
    text-align: justify;
    margin-left: 35px; 
}
.company-card h1{
    color: #2568ef;
}

.company-card img {
    width: 300px;
    height: 300px;
    border-radius: 10px;
    object-fit: cover;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Responsive Design */
@media (max-width: 768px) {
    .hero-content h1 {
        font-size: 3em;
    }

    .hero-content p {
        font-size: 1.2em;
    }

    .company-card {
        flex-direction: column;
        align-items: center;
        padding: 20px;
    }

    .company-card img {
        width: 100%;
        height: auto;
        margin-bottom: 20px;
    }

    .company-card .card-text {
        padding: 0;
    }
}

/* Responsiveness */
@media (max-width: 768px) {
    .hero-content h1 {
        font-size: 3rem;
    }

    .hero-content p {
        font-size: 1.2rem;
    }

    #company h1 {
        font-size: 2rem;
    }

    #company p {
        font-size: 1rem;
        text-align: justify;
    }
}


/* Kontainer utama untuk Visi dan Misi */
.vision-mission-container {
    padding: 40px 20px;
    background-color: #DCEBF2;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
}

/* Title Container */
.title-container {
    display: flex;
    justify-content: center;
    margin-bottom: 50px; /* Adjusted margin */
}

.title {
    text-align: center;
    position: relative;
}

.title h2 {
    font-size: 24px;
    box-shadow: 0px 4px 6px rgba(61, 133, 198, 1);
    border-radius: 10px;
    padding: 10px;
    color: #126189;
    font-weight: bold;
    background-color: #ffffff;
    font-family: 'Montserrat', serif;
}

.title h2::after {
   
    background-color: #126189; /* Same color as the title text */
    margin: 10px auto 0; /* Adjust margin to control spacing */
    border-radius: 2px; /* Optional: rounded edges */
}

.table-container {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 20px;
}

.table-item {
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 6px 6px 6px rgba(0, 0, 0, 0.2);
    padding: 20px;
    padding-bottom: 150px;
    flex: 1 1 calc(50% - 20px);
    font-family: 'Montserrat', serif;
}

.vision-card h3, .mission-card h3 {
    font-size: 20px;
    color: #2568EF;
    margin-bottom: 20px;
    font-weight: bold;
    font-family: 'Montserrat', serif;
    text-align: center; /* Center text */
    
}

.vision-card h3::after, .mission-card h3::after {
    content: '';
    display: block;
    width: 40px; /* Adjust the width as needed */
    height: 3px; /* Adjust the height as needed */
    background-color: #2568EF; /* Same color as the h3 text */
    margin: 10px auto 0; /* Adjust margin to control spacing */
    border-radius: 2px; /* Optional: rounded edges */
}

.vision-card p {
    color: #333;
    font-size: 18px;
    font-weight:bold;
    text-align: center;
    font-family: 'Montserrat', serif;

}

.mission-card p {
    color: #333;
    font-size: 18px;
    font-weight:bold;
    text-align: start;
    font-family: 'Montserrat', serif;

}

.vision-mision-icon{
    color: green;
    margin-bottom:15px;
    font-size: 20px;
}
.mission-list {
    list-style-type: decimal; /* Show numbers */
    padding-left: 20px; /* Indent list items */
    font-family: 'Montserrat', serif;
}

.mission-list li {
    margin-bottom: 20px;
    font-weight: bold;

}

.mission-list h4 {
    font-size: 18px;
    color: #3f5f92;
    margin-bottom: 5px;
}

.mission-list p {
    color: #333;
    font-weight: 200;
    font-size: 17px;
    font-weight: bold;
}

@media (max-width: 768px) {
    .table-item {
        flex: 1 1 100%;
    }
}

/* Responsif */ 

/* Kontainer utama untuk Tata layanan */
.service-container {
    padding: 40px 20px;
    background-color: #ffffff;
}
.container {
    max-width: 1200px;
    margin: 0 auto;
}


.title-container {
    display: flex;
    justify-content: center;
    margin-bottom: 50px; /* Adjusted margin */
}

.title {
    text-align: center;
    position: relative;
}

.title h2 {
    font-size: 24px;
    box-shadow: 0px 4px 6px rgba(61, 133, 198, 1);
    border-radius: 10px;
    padding: 10px;
    color: #126189;
    font-weight: bold;
    background-color: #ffffff;
    font-family: 'Montserrat', serif;
}

.service-table-item {
    background-color: #ffffff;
    border-radius: 10px;
    padding: 20px;
    flex: 1 1 calc(50% - 20px);
    font-family: 'Montserrat', serif;
    border: 4px dashed #2568EF; /* Dashed border */
}

.service-steps {
    display: flex;
    justify-content: center; /* Center the items horizontally */
    gap: 20px;
}
.service-card h3 {
    font-size: 25px;
    color: #1E53BF;
    margin-bottom: 20px;
    font-weight: bold;
    font-family: 'Montserrat', serif;
    text-align: center; /* Center text */
    text-decoration: underline;
}


.service-icon {
    width: 24px; /* Adjust icon size */
    height: 24px;
}
.service-steps {
    display: flex;
    justify-content: center;
    gap: 20px;
}

.service-step {
    display: flex;
    align-items: center;
    gap: 10px;
}

.service-icon {
    width: 24px;
    height: 24px;
}

.request-process-container {
    max-width: 600px; /* Constrain the width */
    margin: 0 auto; /* Center the container */
}

.request-process {
    margin-top: 30px;
}

.request-steps {
    list-style-type: decimal; /* Decimal numbers for list items */
    padding-left: 20px; /* Indent list items */
    font-family: 'Montserrat', serif; /* Font family */
    color: #333; /* Text color */
}

.request-steps li {
    margin-bottom: 40px; /* Space between list items */
    display: flex; /* Use flexbox for horizontal alignment */
    align-items: flex-start; /* Align items at the start */
}

.request-steps h4 {
    font-size: 18px; /* Font size for headings */
    font-weight: bold;
    color: #3f5f92; /* Text color for headings */
    margin-bottom: 0; /* Remove space below heading */
    flex: 0 0 300px; /* Fixed width for headings */
}

.request-steps p {
    color: #333; /* Text color for paragraphs */
    font-weight: bold; /* Font weight for paragraphs */
    font-size: 17px; /* Font size for paragraphs */
    margin: 0; /* Remove default margin */
    padding-left: 5px; /* Space between heading and paragraph */
    flex: 1; /* Take up remaining space */
}


@media (max-width: 768px) {
    .table-item {
        flex: 1 1 100%;
    }
}
/* Kontainer utama Team */
.container {
    max-width: 1200px;
    margin: 0 auto;
}

.btn-primary {
    display: inline-block;
    margin: 35px;
    padding: 10px 20px;
    font-size: 18px;
    color: #fff;
    background-color: #2568ef;
    border: none;
    border-radius: 5px;
    text-decoration: none;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn-primary:hover {
    background-color: #1a4fb5;
}

.site-heading {
    text-align: center;
    margin-bottom: 50px;
}

.site-heading h2 {
    font-weight: bold;
    color: #2568ef;
    font-size: 36px;
}

.site-heading p {
    font-size: 18px;
    color: #666;
    max-width: 600px;
    margin: 0 auto;
}

.team-container {
    padding: 60px 15px;
    background-color: #DCEBF2;
}
.team-members {
    display: flex;
    flex-direction: column; /* Stack team groups vertically */
    gap: 100px;
    align-items: center; /* Center items horizontally */
}

.team-group {
    display: flex;
    justify-content: center;
    gap: 100px;
    flex-wrap: wrap;
    margin-top: 40px;
}

.team-member {
    text-align: center;
    background-color: transparent;
    padding: 20px;
    border-radius: 10px;
    width: calc(33.333% - 30px); /* Three columns on larger screens */
    transition: transform 0.3s, box-shadow 0.3s;
    max-width: 300px; /* Limit maximum width */
    flex: 1 0 300px; /* Flex basis to control item width */
    position: relative; /* Position relative to place h3 correctly */
}

@media (max-width: 1024px) {
    .team-member {
        width: calc(50% - 30px); /* Two columns on medium screens */
    }
}

@media (max-width: 768px) {
    .team-member {
        width: 100%; /* One column on small screens */
        max-width: none; /* Remove maximum width */
    }
}

.team-member:hover {
    transform: translateY(-10px);
    box-shadow: 0 8px 12px rgba(0, 0, 0, 0);
}

.team-member img {
    width: 100%;
    height: 100%;
    border-radius: 0%;
    object-fit: cover;
    margin-bottom: 15px;
    transition: transform 0.3s;
}

.team-member:hover img {
    transform: scale(1.1);
}

.team-member h3 {
    font-family: "Montserrat", sans-serif;
    font-weight: 500;
    background: #2568ef;
    color: #ffffff;
    padding: 0 17px; /* Adjust padding to make it less wide */
    height: 35px; /* Adjust height */
    justify-items: center;
    font-size:12px;
    text-transform: uppercase;
    letter-spacing: 0px;
    line-height: 25px; /* Adjust line-height to match height */
    border-radius: 5px;
    width: 70%;
    margin: 0; /* Remove margin */
    position: absolute; /* Position absolute to place it on top of the image */
    top: 1px; /* Position at the bottom of the team member div */
    left: 50%;
    transform: translateX(-50%); /* Center horizontally */
}

.team-member p {
    margin-top: 10px;
    font-weight: bold;
    color: #000;
    font-size: 15px;
    padding: 10px;
    width: 100%;
    border: 2px solid #000000;
    margin: auto;
    font-family: 'Montserrat' , sans-serif;
}

.team-member p:nth-of-type(2) {
    font-weight: normal;
    color: #999;
}

#process {
    display: flex;
    justify-content: space-evenly;
    align-items: center;
    flex-wrap: wrap;
    padding: 50px 0;
    margin-left: 100px;
    margin-right: 100px;
}

.process-card {
    position: relative;
    width: 300px;
    height: 400px;
    perspective: 1000px;
    margin: 20px;
    cursor: pointer;
}

.process-card .front,
.process-card .back {
    position: absolute;
    width: 100%;
    height: 100%;
    backface-visibility: hidden;
    padding: 30px;
    transition: transform 0.8s;
}

.process-card .front {
    background-color: white;
    border: solid #2568ef;
    color: white;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    transform: rotateY(0deg);
}

.process-card .back {
    background-color: #f5f5f5;
    color: #333;
    transform: rotateY(180deg);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 20px;
    border: 1px solid #1a4fb5;
    border-radius: 5px;
}
.process-card img{
    width:auto;
    height: 300px;
}

.process-card:hover .front {
    transform: rotateY(-180deg);
}

.process-card:hover .back {
    transform: rotateY(0deg);
}


.process-card h2,
.process-card h3 {
    margin: 10px;
    font-size: 20px;
}

.process-card p {
    text-align: center;
}
@media (max-width: 768px) {
    .process-card {
        max-width: 100%; /* Mengubah lebar maksimum untuk layout responsif */
    }
}

</style>
@endpush


        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
@section('content')
<div id="blog" class="blog-area bg-white full-width single default-padding" style="padding-top: 50px;">
        <!--<div class="container">
            <div class="row">
                <div class="blog-items">
                    <div class="col-lg-12 col-md-12">
                        <div class="item">
                            <div class="text-center">
                                <h1></h1>
                            </div>
                            <div class="bgimage">
                                <div class="col-md-5">
                                    <div class="ovrlytxt">
                                        <h3>
                                            <span class="yellow">SI</span> 
                                            <span class="blue">LAN</span> <span class="yellow">TIK</span>
                                        </h3>
                                        <p>Sistem Informasi Layanan Teknologi Informasi Komunikasi</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
    </div>
    <!-- Vision and Mission Section -->
    <section id="vision-mission" class="vision-mission-container">
        <div class="container">
            <div class="title-container">
                <div class="title">
                    <h2>Visi dan Misi</h2>
                </div>
            </div>
            <div class="table-container">
                <div class="table-item vision-card">
                    <h3>Visi Kami</h3>
                    <p>Terselenggaranya jaringan komunikasi dan Informatika yang terintegrasi untuk mendukung terwujudnya Pemerintahan yang baik.</p>
                </div>
                <div class="table-item mission-card">
                    <h3>Misi Kami</h3>
                    <ol class="mission-list">
                        <li>
                            <p>Mewujudkan Jaringan Komunikasi dan Informatika yang terintegrasi.</p>
                        </li>
                        <li>
                            <p>Mewujudkan Sarana Komunikasi dan Diseminasi Informasi yang Efektif.</p>
                        </li>
                        <li>
                            <p>Melaksanakan Pengelolaan Data dan Produksi Secara Elektronik.</p>
                        </li>
                        <li>
                            <p>Melaksanakan Pengelolaan Data dan Produksi Secara Online.</p>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <!-- Tata Layanan -->
    <!-- Tata Layanan -->
    <section id="service" class="service-container">
        <div class="container">
            <div class="title-container">
                <div class="title">
                    <h2>Tata Cara Layanan Pembuatan/Pengembang Aplikasi</h2>
                </div>
            </div>
            <div class="table-container">
                <div class="service-table-item service-card">
                    <h3>Proses Layanan</h3>
                    <div class="service-steps">
                        <div class="service-step">
                            <i class="fa fa-check-circle vision-mision-icon"></i>
                            <p>Buat Permohonan</p>
                        </div>
                        <div class="service-step">
                            <i class="fa fa-check-circle vision-mision-icon"></i>
                            <p>Buat Permohonan</p>
                        </div>
                        <div class="service-step">
                        <i class="fa fa-check-circle vision-mision-icon"></i>
                        <p>Buat Permohonan</p>
                        </div>
                    </div>
                    <br>
                    <div class="request-process-container">
                        <h3>Cara Membuat Permohonan</h3>
                        <div class="request-process">
                        <ol class="request-steps">
                            <li>
                                <h4>1. Siapkan NIP :</h4>
                                <p>Persiapkan nomer induk pegawai untuk proses identifikasi.</p>
                            </li>
                            <li>
                                <h4>2. Isi Data Permohonan :</h4>
                                <p>Isi formulir yang telah di sediakan dengan data yang relevan.</p>
                            </li>
                            <li>
                                <h4>3. Menunggu Persetujuan :</h4>
                                <p>Setelah mengisi formulir, yaitu menunggu mendapatkan persetujuan atau validasi permohonan yang diajukan.</p>
                            </li>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team -->
    <section id="our-team" class="team-container">
        <div class="container">
            <div class="title-container">
                <div class="title">
                    <h2>TIM APTIKA</h2>
                </div>
            </div>
            <div class="team-members">
                <div class="team-member">
                        <div class="team-info">
                            <h3>Ir. SUDIRMAN, M.Si</h3>
                        </div>
                        <img src="{{ asset('frontend') }}/img/Team/user3.jpg" alt="Team Member 1">
                        <p>Bidang Aplikasi Informatika</p>
                    </div>
                <div class="team-group">
                    
                    <div class="team-member">
                        <div class='team-info'>
                            <h3>NURLIAN, S.Kom</h3>
                        </div>
                        <img src="{{ asset('frontend') }}/img/Team/user3.jpg" alt="Team Member 2">
                        <p>Pranata Komputer Ahli Muda</p>
                    </div>
                    <div class="team-member">
                        <div class="team-info">
                            <h3>YUDHI PERMANA, S.Kom</h3>
                        </div>
                        <img src="{{ asset('frontend') }}/img/Team/user3.jpg" alt="Team Member 3">
                        <p>Pranata Komputer Ahli Muda</p>
                    </div>
                    <div class="team-member">
                        <div class="team-info">
                            <h3>JUPRI, ST, S.Film, M.Kom</h3>
                        </div>
                        <img src="{{ asset('frontend') }}/img/Team/user3.jpg" alt="Team Member 3">
                        <p>Pranata Komputer Ahli Muda</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- start gallery section -->
    <section class="gallery-section ptb-100 bg-white">
        <div class="container">
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
        </div>
    </section>
    <!-- end gallery section -->

  <!-- End Team -->
        </section>
    </section>






@endsection
