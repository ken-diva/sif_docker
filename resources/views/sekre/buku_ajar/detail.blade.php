@extends('layouts.master')
@section('content')
  <div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>Detail Buku Ajar</h3>
          {{-- <p class="text-subtitle text-muted">Total Surat Tugas:</p> --}}
        </div>
      </div>
    </div>
    <section class="multiple-choices">
      <div class="row">
        <div class="col-12">
          <div class="card">
            {{-- <div class="card-header">
              <h4 class="card-title">Multiple choices</h4>
            </div> --}}
            @foreach ($buku_ajar as $ba)
              <div class="card-content">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Judul Buku Ajar</label>
                        <input type="text" class="form-control" value="{{ $ba['judul'] }}" disabled>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" class="form-control" value="{{ $ba['keterangan'] }}" disabled>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Prodi</label>
                        <input type="text" class="form-control" value="{{ $ba['prodi'] }}" disabled>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>No. ISBN</label>
                        <input type="text" class="form-control" value="{{ $ba['no_isbn'] }}" disabled>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Tahun Terbit</label>
                        <input type="text" class="form-control" value="{{ $ba['th_terbit'] }}" disabled>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Sumber</label>
                        <input type="text" class="form-control" value="{{ $ba['sumber'] }}" disabled>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Mata Kuliah</label>
                        <input type="text" class="form-control" value="{{ $ba['mata_kuliah'] }}" disabled>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nama Dosen</label>
                        <textarea rows="5" class="form-control" disabled>{{ $ba['nama_dosen'] }}</textarea>
                      </div>
                    </div>
                    <hr>
                    <div class="col-md-12">
                      <div class="form-group">
                        <a href="/sekre/ba">
                          <button class="btn btn-primary">Back</button>
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
