@extends('layouts.master')
@section('content')
  <div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 order-md-1 order-last">
          <h3>Data Buku Ajar FIF</h3>
          <div class="d-flex justify-content-between">
            <p class="text-subtitle text-muted">Total Buku Ajar: {{ $total_buku_ajar }}</p>
            <p class="text-subtitle text-muted"><i>Last Sync: {{ $last_sync }}</i></p>
          </div>
        </div>
      </div>
    </div>
    <section class="section">
      <div class="card">
        <div class="card-header">
          {{-- Filter here! --}}
        </div>
        <div class="card-body">
          <table class="table table-hover" id="table1">
            <thead>
              <tr>
                <th>No.</th>
                <th>Judul Buku</th>
                <th>No. ISBN</th>
                <th>Penulis</th>
                <th>Program Studi</th>
                <th style="text-align: center">#</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($buku_ajar as $ba)
                <tr>
                  <td width="5%">{{ $loop->iteration }}</td>
                  <td>{{ $ba['judul'] }}</td>
                  <td style="width: 15%">{{ $ba['no_isbn'] }}</td>
                  <td style="white-space:pre-line">{{ $ba['nama_dosen'] }}</td>
                  <td style="width: 15%">{{ $ba['prodi'] }}</td>
                  <td width='5%'>
                    <a href="/sekre/ba/detail/{{ $ba['judul'] }}" class="text-decoration-none">
                      <button class="btn btn-info btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail">
                        <i class="bi bi-info-circle"></i>
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
