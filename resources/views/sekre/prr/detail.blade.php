@extends('layouts.master')
@section('content')
  <div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>Detail Peminjaman Ruangan</h3>
          {{-- <p class="text-subtitle text-muted">Total Surat Keputusan:</p> --}}
        </div>
      </div>
    </div>
    <section class="multiple-choices">
      <div class="row">
        <div class="col-8">
          <div class="card">
            @foreach ($prr as $p)
              <div class="card-content">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Hari</label>
                        <input type="text" class="form-control" value="{{ $p['hari'] }}" disabled>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Waktu</label>
                        <input type="text" class="form-control" value="{{ $p['waktu'] }}" disabled>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Tanggal</label>
                        <input type="text" class="form-control" value="{{ $p['tanggal'] }}" disabled>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Lokasi</label>
                        @if ($p['lt1'] != null)
                          <input type="text" class="form-control" value="Lantai 1" disabled>
                        @else
                          <input type="text" class="form-control" value="Lantai 3" disabled>
                        @endif
                      </div>
                    </div>
                    <div class="col-md-8">
                      <div class="form-group">
                        <label>Nama Kegiatan</label>
                        <input type="text" class="form-control" value="{{ $p['nama_kegiatan'] }}" disabled>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>PIC</label>
                        <input type="text" class="form-control" value="{{ $p['pic'] }}" disabled>
                      </div>
                    </div>

                    <hr>
                    <div class="col-md-12">
                      <div class="form-group">
                        <a href="/sekre/prr">
                          <button class="btn btn-primary">Back</button>
                        </a>
                        <a href="/sekre/prr/calendar">
                          <button class="btn btn-warning">Back (Calendar)</button>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
