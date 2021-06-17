@extends('layout')

@section('title')
Detail Lowongan
@endsection

@section('konteng')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Detail Lowongan</h2>
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li>Detail Lowongan</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
        <div class="container">
            <div class=" row d-flex justify-content-center">
                <div class="col-md-12 ">
                    <img src="{{ asset('assets/img/work.png') }}" class="container-fluid d-flex justify-content-center" alt="">
                </div>
                <div class="portfolio-info d-flex justify-content-center col-md-10">
                    <div class="row  icon-box card-list">
                        <div class="col-sm-3">
                            <img src="{{ asset('assets/img/sim-vertical-black.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="col-lg-6 pt-4 pt-lg-0">
                            <h3>{{ $low->nama_low }}</h3>
                            <ul class="list-unstyled ">
                                <span>
                                    <li class=" d-flex align-items-start m-3"><span><img src="{{ asset('assets/img/building.svg') }}" alt="" style="height: 20px;width: 20px;"></span><span class="ml-3">{{ $low->mitra['nama_mitra'] }}</span></li>
                                </span>
                                <span>
                                    <li class="d-flex align-items-start m-3"><span><img src="{{ asset('assets/img/placeholder.svg') }}" alt="" style="height: 20px;width: 20px;"></span><span class="ml-3">{{ $low->lokasi}}</span></li>
                                </span>
                                <span>
                                    <li class="d-flex align-items-start m-3"><span><img src="{{ asset('assets/img/filter.svg') }}" alt="" style="height: 20px;width: 20px;"></span><span class="ml-3">{{ $low->kategori['kategori'] }}</span></li>
                                </span>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" container portfolio-info col-md-10">
                <div class=" m-lg-5 icon-box card-list">
                    <p><strong>Deskripsi Lowongan</strong></p>
                    <p>{{ $low->deskripsi_low }}</p>
                    <strong> Kemampuan</strong>
                    <p>
                        <i>
                            <button type="button" class="btn btn-outline-info icofont-close">Design</button>
                            <button type="button" class="btn btn-outline-info icofont-close">HTML</button>
                            <button type="button" class="btn btn-outline-info icofont-close">UI Design</button>
                        </i>
                    </p>
                    <div>
                        <a href="{{ route('lowongan.apply', $low->id) }}">
                            <button type="submit" class="btn btn-info icofont-save"> Apply</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Portfolio Details Section -->

</main><!-- End #main -->
@endsection

<!-- ======= Footer ======= -->