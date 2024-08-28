@extends('frontend.layouts.master')
@section('title')
    Beranda
@endsection
@push('style')
@endpush

@push('script')
@endpush

@section('content')
    <!-- Start Banner ============================================= -->
    <div id="beranda" class="banner-area fixed-top bg-theme-small bg-cover"
        style="background-image: url(../frontend/img/shape-bg.jpg);">
        <!-- Side Bg -->
        <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Syne:wght@400..800&display=swap');
        #pengaduan {
            background-size: cover;
            background-position: center;
            padding: 100px 0;
            color: #fff;
            text-align: center;
        }

        #pengaduan .content {
            background: #DCEBF2;
            padding: 20px;
            border-radius: 10px;
        }

        #pengaduan h2 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        #pengaduan p {
            font-size: 18px;
            margin-bottom: 30px;
            margin-right: 20%;
            margin-left: 20%;
            font-family: "Montserrat", Sans-serif;
            font-weight: bold;
            color: black;
        }

        #pengaduan .btn {
            padding: 10px 30px;
            font-size: 16px;
            border-radius: 50px;
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
        }

        #pengaduan .btn:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        /* Modal Background */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgba(86, 86, 86, 0.488); /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto; /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 80%; /* Could be more or less, depending on screen size */
        }

        /* The Close Button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        /* Form Styles */
        form {
            display: flex;
            flex-direction: column;
        }

        input, textarea, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            padding: 10px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
        }

        button:hover {
            background-color: #0056b3;
        }

         /* buat gambar ama text dan button */
        .centered-image2 {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 60vh; /* Height remains the same */
            position: relative; /* Ensure this container is positioned relative for the overlay */
        }

        .side-bg2 {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            position: absolute;
            overflow: hidden; /* Prevents image overflow */
        }

        .side-bg2 img {
             /* Makes sure the image covers the container */
          /* Ensures the image covers the container */
            object-fit: cover; /* Ensures the image covers the container without distortion *//* Maintain aspect ratio */
            position: absolute; /* Allows overlay text to be positioned correctly */
            top: 10%;
        }

        .overlay-text {
            position: absolute;
            top: 90%;
            left: 65%;
            transform: translate(-50%, -50%);
            color: #FFDE59; /* Overlay text color */
            font-family: "Montserrat", Sans-serif;
            font-weight: bold;
            font-size: 5vw; /* Dynamic font size based on viewport width */
            text-align: center;
            padding: 10px; /* Optional padding for better readability */
            text-shadow: 4px 4px 8px rgba(222, 222, 222, 5); /* Shadow properties */
        }
        @media (max-width: 1200px) {
            .overlay-text {
                top: 80%;
                right: 14%;
                font-size: 6vw;
            }
        }

        @media (max-width: 768px) {
            .overlay-text, {
                bottom: 20%;
                right: 5%;
                font-size: 5vw;
            }
        }

        @media (max-width: 480px) {
            .overlay-text,  {
                bottom: 25%;
                right: 5%;
                font-size: 6vw;
            }
        }
        .overlay-text2 {
            position: absolute;
            top: 100%;
            left: 65%;
            transform: translate(-50%, -50%);
            color: #fff; /* Overlay text color */
            font-family: "Montserrat", Sans-serif;
            font-weight: bold;
            font-size: 32px; /* Adjust as needed */
            text-align: center;
            padding: 15px; /* Optional padding for better readability */
            text-shadow: 4px 4px 8px rgba(37, 104, 239, 5); /* Shadow properties */
            line-height: 1.5;
            
        }
        @media (max-width: 1200px) {
            .overlay-text2 {
                top: 85%;
                left: 70%;
                font-size: 2vw;
            }
        }

        @media (max-width: 768px) {
            .overlay-text2 {
                bottom: 20%;
                right: 5%;
                font-size: 5vw;
            }
        }

        @media (max-width: 480px) {
            .overlay-text2 {
                bottom: 25%;
                right: 5%;
                font-size: 6vw;
            }
        }
        .overlay-button {
            position: absolute;
            top: 73%;
            left: 65%;
            transform: translate(-50%, -50%);
            font-family: "Montserrat", Sans-serif;
            font-weight: bold;
            font-size: 1vw; /* Dynamic font size based on viewport width */
            text-align: center;
            padding: 10px; /* Optional padding for better readability */
        }
        @media (max-width: 1200px) {
            .overlay-button {
                top: 52%;
                left: 70%;
                padding: 7px;
                font-size: 1vw;
            }
        }

        @media (max-width: 768px) {
            .overlay-button, {
                bottom: 20%;
                right: 5%;
                font-size: 5vw;
            }
        }

        @media (max-width: 480px) {
            .overlay-button,  {
                bottom: 25%;
                right: 5%;
                font-size: 6vw;
            }
        }

        .border-features-area {
            border: 2px solid #2568ef;
            border-radius: 16px;
            padding: 20px 50px 40px; /* Adds more space around the border */
        }    
        .textblue{
            color: #2568ef;
        }
        .font-weight-bold h4{
            font-family: "Montserrat", Sans-serif;
            color: #146D9A;
            font-weight: bold;
        }
        .fa{
            color: black;
            size: 500px;
        }

        </style>
        <div class="centered-image2">
            <div class="side-bg2">
                <img src="{{ asset('frontend') }}/img/illustrations/8.png" alt="Thumb">
                <div class="overlay-text">SILANTIK</div>
                <div class="overlay-text2">Sistem Informasi Layanan <br> Teknologi Informasi Komunikasi</div>
                    <div class="text-center">
                        <a href="{{ url('tentang') }}" class="btn btn-primary font-weight-bold  overlay-button">Selengkapnya</a>
                    </div>
            </div>
        </div>
        <!-- End Side Bg -->
    </div>

    <!-- Start Features Area ============================================= -->
    <div id="layanan" class="features-area icon-link carousel-shadow default-padding">
        <div class="container border-features-area">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-lg-offset-2 col-md-offset-2">
                    <div class="site-heading text-center textblue">
                        <h2>Layanan</h2>
                        {{-- <p>
                            Layanan 
                        </p> --}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="features-items features-carousel owl-carousel owl-theme">

                        <a href="{{ url('layanan/aplikasi') }}">
                            <div class="item font-weight-bold">
                                <div class="icon">
                                    <span>01</span>
                                    <i class="flaticon-drag-2"></i>
                                </div>
                                <div class="info">
                                    <h4>Pembuatan <br>Aplikasi</h4>
                                </div>

                            </div>
                        </a>


                        <a href="{{ url('layanan/aplikasi') }}">
                            <div class="item font-weight-bold">
                                <div class="icon ">
                                    <span>02</span>
                                    <i class="flaticon-software"></i>
                                </div>
                                <div class="info ">
                                    <h4>Pembaruan &<br> Pengembangan <br> Aplikasi</h4>
                                </div>
                            </div>
                        </a>

                        <a href="{{ url('layanan/aplikasi') }}">
                            <div class="item font-weight-bold">
                                <div class="icon">
                                    <span>03</span>
                                    <i class="flaticon-rgb"></i>
                                </div>
                                <div class="info">
                                    <h4>Permintaan Penggunaan Domain</h4>
                                </div>
                            </div>
                        </a>
                        <!-- End Single Item -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Features Area -->

    <!-- Start About ============================================= -->
    <div id="tentang" class="about-area about-area-bawah-sikit reverse default-padding-bottom bg-bluemudo">
        <div class="container">
            <div class="row">
                <div class="col-md-6 thumb">
                    <img src="{{ asset('frontend') }}/img/illustrations/logo.png" alt="Thumb">
                </div>
                <div class="col-lg-6 col-md-6 info">
                    <h2>TENTANG SILANTIK</h2>
                    <p>
                        Layanan Teknologi Informasi Komunikasi Dinas Kominfo menyediakan beberapa solusi Teknologi
                        Informasi untuk meningkatkan kinerja OPD pada Pemerintah Kota Jambi, yang mencakup:

                    </p>
                    <ul>
                        <li>Pembuatan Aplikasi</li>
                        <li>Pembaruan/Pengembangan Aplikasi</li>
                        <li>Permintaan SubDomain jambikota.go.id</li>
                    </ul>
                    <div class="fun-facts">
                        <h3>Total Aplikasi</h3>
                        <div class="row">
                            <div class="col-md-4 col-sm-4 item">
                                <div class="fun-fact">
                                    <div class="timer" data-to="75" data-speed="5000">75</div>
                                    <span class="medium">SELESAI</span>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 item">
                                <div class="fun-fact">
                                    <div class="timer" data-to="100" data-speed="5000">100</div>
                                    <span class="medium">PROSES</span>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 item">
                                <div class="fun-fact">
                                    <div class="timer" data-to="98" data-speed="5000">98</div>
                                    <span class="medium">MENUNGGU</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End About -->

    <!-- Start Blog Area  ============================================= -->
    <div id="berita" class="blog-area default-padding bottom-less">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-lg-offset-2 col-md-offset-2">
                    <div class="site-heading text-center">
                        <h2>Informasi</h2>
                        {{-- <p>
                            Learning day desirous informed expenses material returned six the. She enabled invited
                            exposed him another. Reasonably conviction solicitude me mr at discretion reasonable. Age
                            out full gate bed day lose.
                        </p> --}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="blog-items">

                    @foreach ($berita as $b)
                        <!-- Single Item -->
                        <div class="col-md-4 single-item">
                            <div class="item">
                                <div class="thumb">
                                    <a href="{{ url('news/' . $b->slug) }}"><img src="{{ $b->getThumbnailBerita() }}"
                                            alt="Thumb"
                                            style="object-fit: contain; position: relative; width: 100%; height: 300px; overflow: hidden;"></a>
                                </div>
                                <div class="info">
                                    <div class="content">
                                        <div class="date">
                                            {{ TanggalAja($b->created_at) }}
                                        </div>
                                        <h4>
                                            <a href="{{ url('news/' . $b->slug) }}">{{ $b->judul }}</a>
                                        </h4>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- Single Item -->
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <!-- End Blog Area -->

    <!-- Start Pengaduan ============================================= -->
    <div id="pengaduan" class="pengaduan-area full-bg"
    style="background-image: url(../frontend/img/your-background-image.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="content" data-animation="animated fadeInUp">
                    <h2>Pengaduan</h2>
                    <p>Jika Anda memiliki masalah terhadap aplikasi atau jaringan anda, silakan klik tombol di bawah ini untuk mengisi form pengaduan.</p>
                    <button class="btn btn-primary" id="openModalBtn">Buat Pengaduan</button>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- End Pengaduan -->

    <!-- Modal -->
    <div id="pengaduanModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h5 class="modal-title">Form Pengaduan</h5>
        <form action="{{ url('submit-pengaduan-aplikasi') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-3">
                <label class="form-label" style="font-weight: bold;">Judul Pengaduan
                    <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-sm @error('judul') is-invalid @enderror"
                    name="judul" id="judul" value="{{ old('judul') }}" />
                @error('judul')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" style="font-weight: bold;">Nama Pengadu
                    <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-sm @error('nama_aplikasi') is-invalid @enderror"
                    name="nama_aplikasi" id="nama_aplikasi" value="{{ old('nama_aplikasi') }}" />
                @error('nama_aplikasi')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" style="font-weight: bold;">Nomor Whatsapp
                    <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-sm @error('no_wa') is-invalid @enderror"
                    name="no_wa" id="no_wa" value="{{ old('no_wa') }}" />
                @error('no_wa')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" style="font-weight: bold;">Isi Pengaduan
                    <span class="text-danger">*</span></label>
                <textarea class="form-control form-control-sm @error('isi') is-invalid @enderror"
                    name="isi" id="isi" rows="4">{{ old('isi') }}</textarea>
                @error('isi')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            
            
            <div class="mb-3">
                <label class="form-label" style="font-weight: bold;">Jenis Pengaduan
                    <span class="text-danger">*</span></label>
                <select name="jenis_pengaduan" id="jenis_pengaduan"
                    class="form-control form-control-sm @error('jenis_pengaduan') is-invalid @enderror">
                    <option value="" selected disabled>[Pilih]</option>
                    <option value="jaringan" {{ old('jenis_pengaduan') == 'jaringan' ? ' selected' : '' }}>Jaringan</option>
                    <option value="aplikasi" {{ old('jenis_pengaduan') == 'aplikasi' ? ' selected' : '' }}>Aplikasi</option>
                </select>
                @error('jenis_pengaduan')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" style="font-weight: bold;">Foto Pengaduan
                    <span class="text-danger">*</span></label>
                <input type="file" class="form-control form-control-sm @error('foto_pengaduan') is-invalid @enderror"
                    name="foto_pengaduan[]" id="foto_pengaduan" multiple />
                @error('foto_pengaduan')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-12">
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary"><i
                            class="fa fa-arrow-right me-1"></i>Kirim Pengaduan</button>
                </div>
            </div>
        </form>
    </div>
    </div>
    <!-- End Modal -->
    <!-- Start Faq ============================================= -->
    <div id="faq" class="faq-area bg-bluemudo default-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-5 thumb">
                    <img src="{{ asset('frontend') }}/img/illustrations/9.png" alt="Thumb">
                </div>
                <div class="col-md-7 faq-items">
                    <div class="heading">
                        <h2>Answer & Question</h2>
                    </div>
                    <!-- Start Accordion -->
                    <div class="acd-items acd-arrow">
                        <div class="panel-group symb" id="accordion">
                            @foreach ($faq as $f)
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion"
                                                href="#ac{{ $f->id }}">
                                                {{ $f->pertanyaan }}
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="ac{{ $f->id }}"
                                        class="panel-collapse collapse @if ($f->id == 1) in @endif">
                                        <div class="panel-body">
                                            {!! $f->jawaban !!}
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <!-- End Accordion -->
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>    
    <!-- End Faq  -->
    @endsection
    @push('script')
<script>
// Get modal element
var modal = document.getElementById("pengaduanModal");

// Get open modal button
var openModalBtn = document.getElementById("openModalBtn");

// Get close button
var closeBtn = document.getElementsByClassName("close")[0];

// Open modal
openModalBtn.onclick = function() {
    modal.style.display = "block";
}

// Close modal when clicking on <span> (x)
closeBtn.onclick = function() {
    modal.style.display = "none";
}

// Close modal when clicking anywhere outside of the modal
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}


</script>
@endpush