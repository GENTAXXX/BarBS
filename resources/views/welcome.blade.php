@extends('layout')

@section('title')
SIMAGANG
@endsection

@section('konteng')
<!-- End Header -->
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="container text-center text-md-left" data-aos="fade-up">
        <h1>Selamat datang di <span>SIMagang</span></h1>
        <h2>Your Intern Partner</h2>
        <a href="#testimonials" class="btn-get-started scrollto">Mulai</a>
    </div>
</section><!-- End Hero -->

<main id="main">

    <!-- search bar -->
    <!-- Search form -->
    <section class="justify-content-center align-items-center">
        <div class="container">
            <div class="mr-xl-5 ml-xl-5 p-xl-5">
                <form action="/" method="GET">
                    <input class="form-control search-bar" type="text" placeholder="Search" aria-label="Search" name="cari" value="{{ old('cari') }}">
                    <button class="btn btn-primary">Cari</button>
                </form>
            </div>
        </div>
    </section>

    <!-- end of search bar  -->
    <!-- ======= What We Do Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
        <div class="container">
            <div class="section-title">
                <h2>Rekomendasi</h2>
                <p>Rekomendasi Lowongan Sesuai Dengan Kemampuanmu</p>
            </div>
            <div class="owl-carousel testimonials-carousel">
                @foreach ($low as $data)
                <div class="testimonial-item">
                    <a href="{{ route('detail.show', $data->id) }}">
                        <h3>{{ $data->nama }}</h3>
                        <img src="assets/img/sim-vertical-black.png" class="testimonial-img" alt="">
                        <div class="icon-box container">
                            <ul class="list-unstyled ">
                                <li class="d-flex align-items-start m-3"><span><img src="{{ asset('assets/img/building.svg') }}" alt="" style="height: 20px;width: 20px;" class=""></span><span class="ml-3">{{ $data->mitra['nama'] }}</span></li>
                                <li class="d-flex align-items-start m-3"><span><img src="{{ asset('assets/img/placeholder.svg') }}" alt="" style="height: 20px;width: 20px;"></span><span class="ml-3">{{ $data->lokasi}}</span></li>
                                <li class="d-flex align-items-start m-3"><span><img src="{{ asset('assets/img/filter.svg') }}" alt="" style="height: 20px;width: 20px;"></span><span class="ml-3">{{ $data->kategori['kategori'] }}</span></li>
                            </ul>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section><!-- End Testimonials Section -->

    <!-- End What We Do Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about section-bg">
        <div class="container">
            <div class="section-title">
                <h2>Lowongan</h2>
                <p>Lowongan lain yang dapat kamu pilih</p>
            </div>
            @foreach ($low as $data)
            <div class="justify-content-between ">
                <div class="row m-sm-5  card-list border">
                    <div class="col-sm-3">
                        <a href="{{ route('detail.show', $data->id) }}">
                            <img src="assets/img/sim-vertical-black.png" class="img-fluid" alt="">
                        </a>
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0">
                        <h3>{{ $data->nama }}</h3>
                        <ul class="list-unstyled ">
                            <span>
                                <li class="d-flex align-items-start m-3"><span><img src="{{ asset('assets/img/building.svg') }}" alt="" style="height: 20px;width: 20px;" class=""></span><span class="ml-3">{{ $data->mitra['nama'] }}</span></li>
                            </span>
                            <span>
                                <li class="d-flex align-items-start m-3"><span><img src="{{ asset('assets/img/placeholder.svg') }}" alt="" style="height: 20px;width: 20px;"></span><span class="ml-3">{{ $data->lokasi}}</span></li>
                            </span>
                            <span>
                                <li class="d-flex align-items-start m-3"><span><img src="{{ asset('assets/img/filter.svg') }}" alt="" style="height: 20px;width: 20px;"></span><span class="ml-3">{{ $data->kategori['kategori'] }}</span></li>
                            </span>
                        </ul>
                    </div>

                </div>
            </div>
            @endforeach
        </div>
    </section><!-- End About Section -->
</main><!-- End #main -->
@endsection