@extends('mitra.layout')

@section('title')
Detail Mahasiswa Magang
@endsection

@section('konteng')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Pendaftar</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="profile-departemen.html">Home</a></li>
              <li class="breadcrumb-item active">Edit Pendaftar</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" src="{{ ('images/'.$data->foto_mhs) }}"alt="User profile picture">
                                </div>
                                    <h3 class="profile-username text-center">{{ $data->nama_mhs }}</h3>

                                    <p class="text-muted text-center">Software Engineer</p>
                                    <strong><i class="fas fa-book mr-1"></i> NIM</strong>

                                    <p class="text-muted">{{ $data->NIM }}</p>

                                    <hr>

                                    <strong><i class="fas fa-mail-bulk mr-1"></i> Telepon</strong>

                                    <p class="text-muted">{{ $data->telepon_mhs }}</p>

                                    <hr>

                                    <strong><i class="fas fa-mail-bulk mr-1"></i> Pengalaman</strong>

                                    <p class="text-muted">{{ $data->pengalaman }}</p>

                                    <hr>

                                    <strong><i class="fas fa-pencil-alt mr-1"></i> Jurusan</strong>

                                    <p class="text-muted"> {{ $data->mahasiswa->jurusan['jurusan'] }}</p>

                                    <hr>

                                    <strong><i class="far fa-file-alt mr-1"></i> Skill</strong>

                                    <p class="text-muted">{{ $data->mahasiswa->skill['skill'] }}</p>

                                    <hr>

                                    <strong><i class="far fa-file-alt mr-1"></i> Jenis Kelamin</strong>

                                    <p class="text-muted">{{ $data->jenis_kelamin }}</p>

                                    <hr>

                                    <strong><i class="far fa-file-alt mr-1"></i> Tanggal Lahir</strong>

                                    <p class="text-muted">{{ $data->tgl_lahir }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="card col-md-9">
                            <div class="card-header border-transparent">
                                <h3 class="card-title">Lamaran Diajukan</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table m-0">
                                        <thead>
                                            <tr class="row">
                                                <th class="col-2">Nomor</th>
                                                <th class="col-4">Melamar</th>
                                                <th class="col-4">Asal</th>
                                                <th class="col-2">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="row">
                                                <td class="col-2">1</td>
                                                <td class="col-4">{{ $data->nama_low }}</td>
                                                <td class="col-4">{{ $data->mahasiswa->jurusan['jurusan']}}</td>
                                                <td class="col-2">
                                                    @if ($data->approval == 1)
                                                        <label class="badge badge-success">Magang</label>
                                                    @elseif ($data->approval == 2)
                                                        <label class="badge badge-danger">Selesai</label>
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('pendaftar.end', $data->magang_id) }}" class="btn btn-danger"> Akhiri</a>
                        </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection