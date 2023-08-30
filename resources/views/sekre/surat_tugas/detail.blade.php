@extends('layouts.master')
@section('content')
  <div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>Detail Surat Tugas</h3>
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
            @foreach ($surat_tugas as $st)
              <div class="card-content">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-10">
                      <div class="form-group">
                        <label>No. Surat</label>
                        <input type="text" class="form-control" value="{{ $st['no_surat'] }}" disabled>
                      </div>
                    </div>
                    <div class="col-md-2 mt-4">
                      <div class="form-group">
                        @if (filter_var($st['evidence'], FILTER_VALIDATE_URL))
                          <a href="{{ $st['evidence'] }}" target="_blank">
                            <button class="btn btn-warning">
                              <i class="bi bi-link-45deg"></i> Evidence
                            </button>
                          </a>
                        @else
                          <a href="#">
                            <button class="btn btn-secondary" title="Link tidak valid" disabled>Link evidence tidak
                              valid</button>
                          </a>
                        @endif
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Mitra</label>
                        <textarea rows="3" class="form-control" disabled>{{ $st['mitra'] }}</textarea>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea rows="3" class="form-control" disabled>{{ $st['deskripsi'] }}</textarea>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Tanggal Penetapan</label>
                        <input type="text" class="form-control" value="{{ $st['tgl_penetapan'] }}" disabled>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Periode Mulai</label>
                        <input type="text" class="form-control" value="{{ $st['periode_mulai'] }}" disabled>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Periode Selesai</label>
                        <input type="text" class="form-control" value="{{ $st['periode_selesai'] }}" disabled>
                      </div>
                    </div>


                    <hr>
                    <h6>Nama yang ditugaskan</h6>
                    <div class="col-md-12">
                      <div class="form-group">
                        <ul>
                          <li>{{ $st['nama_lengkap'] }}</li>
                          @foreach ($daftar_anggota as $anggota)
                            <li>{{ $anggota['nama_lengkap'] }}</li>
                          @endforeach
                        </ul>
                      </div>
                    </div>

                    <hr>
                    <div class="col-md-12">
                      <div class="form-group">
                        <a href="/sekre/st">
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
