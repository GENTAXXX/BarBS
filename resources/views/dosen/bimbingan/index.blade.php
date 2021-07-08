@extends('dosen.layout')

@section('title')
Daftar Bimbingan Mahasiswa
@endsection

@section('konteng')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Mahasiswa</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dospem.home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Daftar Bimbingan Mahasiswa</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content-header -->

    <!-- Main content -->

    <!-- TABLE: PROPOSAL -->
    <section class="content">
        <div class="card">

            <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                    <thead>
                        <tr>
                            <th class="text-center">Nama</th>
                            <th class="text-center">NIM</th>
                            <th class="text-center">Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $mhs)
                        <tr>
                            <td class="text-center">{{ $mhs->nama_mhs }}</td>
                            <td class="text-center">{{ $mhs->NIM }}</td>
                            <td class="text-center">
                                <a href="{{ route('dospem.bimbingan', $mhs->id) }}" class="btn btn-primary">Lihat</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection