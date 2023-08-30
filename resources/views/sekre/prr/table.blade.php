@extends('layouts.master')
@section('content')
  <div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 order-md-1 order-last">
          <h3>Data Peminjaman ruang rapat FIF</h3>
          <div class="d-flex justify-content-between">
            <p class="text-subtitle text-muted"><i>Last Sync: {{ $last_sync }}</i></p>
          </div>
        </div>
      </div>
    </div>
    <section class="section">
      <div class="card">
        <div class="card-header">
          <a href="/sekre/prr/calendar">Calendar View</a>
        </div>
        <div class="card-body">
          <table class="table table-hover" id="table1">
            <thead>
              <tr>
                <th>No.</th>
                <th>Tanggal</th>
                <th>Nama Kegiatan</th>
                <th>Waktu</th>
                <th>Lt. 1</th>
                <th>Lt. 3</th>
                <th>PIC</th>
                <th style="text-align: center">#</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($prr as $p)
                <tr>
                  <td width="5%">{{ $loop->iteration }}</td>
                  <td style="width: 15%">{{ $p['tanggal'] }}</td>
                  <td>{{ $p['nama_kegiatan'] }}</td>
                  <td style="width: 15%">{{ $p['waktu'] }}</td>
                  <td style="width: 6%">{{ $p['lt1'] }}</td>
                  <td style="width: 6%">{{ $p['lt3'] }}</td>
                  <td>{{ $p['pic'] }}</td>
                  <td width='5%'>
                    <a href="/sekre/prr/detail/{{ $p['tanggal'] }}" class="text-decoration-none">
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
