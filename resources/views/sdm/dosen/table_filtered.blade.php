@extends('layouts.master')
@section('content')
  <div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>Data Dosen FIF</h3>
          <p class="text-subtitle text-muted">Jumlah dosen setelah difilter: {{ $total_dosen }} dosen.</p>
        </div>
        {{-- <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Layout Vertical Navbar</li>
            </ol>
          </nav>
        </div> --}}
      </div>
    </div>
    <section class="section">
      <div class="card">
        <div class="card-header">
          <h5>Filter Data</h5>
          <form action="/sdm/data-dosen-filtered" method="POST">
            @csrf
            <table>
              <tr>
                <td>JFA</td>
                <td>Program Studi</td>
                <td></td>
              </tr>
              <tr>
                <td>
                  <select name="jfa" class="form-select">
                    <option value="all" {{ $jfa == 'all' ? 'selected' : '' }}>--- All ---</option>
                    <option value="GB" {{ $jfa == 'GB' ? 'selected' : '' }}>Guru Besar</option>
                    <option value="LK" {{ $jfa == 'LK' ? 'selected' : '' }}>Lektor Kepala</option>
                    <option value="L" {{ $jfa == 'L' ? 'selected' : '' }}>Lektor</option>
                    <option value="NJFA" {{ $jfa == 'NJFA' ? 'selected' : '' }}>NJFA</option>
                    <option value="AA" {{ $jfa == 'AA' ? 'selected' : '' }}>Asisten Ahli</option>
                  </select>
                </td>
                <td>
                  <select name="prodi" class="form-select">
                    <option value="all" selected>--- All ---</option>
                    <option value="S1 INFORMATIKA" {{ $prodi == 'S1 INFORMATIKA' ? 'selected' : '' }}>S1 Informatika
                    </option>
                    <option value="S1 TEKNOLOGI INFORMASI" {{ $prodi == 'S1 TEKNOLOGI INFORMASI' ? 'selected' : '' }}>
                      S1 Teknologi Informasi</option>
                    <option value="S1 REKAYASA PERANGKAT LUNAK"
                      {{ $prodi == 'S1 REKAYASA PERANGKAT LUNAK' ? 'selected' : '' }}>S1 Rekayasa Perangkat Lunak
                    </option>
                    <option value="S1 DATA SAINS" {{ $prodi == 'S1 DATA SAINS' ? 'selected' : '' }}>S1 Sains Data
                    </option>
                    <option value="S1 INFORMATIKA PJJ" {{ $prodi == 'S1 INFORMATIKA PJJ' ? 'selected' : '' }}>S1 PJJ
                      Informatika</option>
                    <option value="S2 INFORMATIKA" {{ $prodi == 'S2 INFORMATIKA' ? 'selected' : '' }}>S2 Informatika
                    </option>
                    <option value="S2 ILMU FORENSIK" {{ $prodi == 'S2 ILMU FORENSIK' ? 'selected' : '' }}>S2 F.
                      Digital & Keamanan Siber</option>
                    <option value="S3 INFORMATIKA" {{ $prodi == 'S3 INFORMATIKA' ? 'selected' : '' }}>S3 Informatika
                    </option>
                  </select>
                </td>
                <td>
                  <button class="btn btn-primary" type="submit">Refresh</button>
                </td>
              </tr>
            </table>
          </form>
        </div>
        <br>
        <div class="card-body">
          <table class="table table-hover" id="table1">
            <thead>
              <tr>
                <th>No.</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Kode Dosen</th>
                <th>Status</th>
                <th>Email</th>
                <th>#</th>
              </tr>
            </thead>
            <tbody>
              @foreach (json_decode($data) as $d)
                <tr>
                  <td width="5%">{{ $loop->iteration }}</td>
                  <td>{{ $d->nip }}</td>
                  <td>{{ $d->fronttitle . ' ' . ucwords(strtolower($d->name)) . ' ' . $d->backtitle }}</td>
                  <td>{{ $d->lecturercode }}</td>
                  <td>
                    @if ($d->status == 'Aktif')
                      <span class="badge bg-success">{{ $d->status }}</span>
                    @else
                      <span class="badge bg-warning">{{ $d->status }}</span>
                    @endif
                  </td>
                  <td>{{ $d->email }}</td>
                  <td>
                    <a href="/sdm/profile-dosen/{{ $d->name }}" class="text-decoration-none">
                      <button class="btn btn-info btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail">
                        <i class="bi bi-pencil-square"></i>
                      </button>
                    </a>
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
