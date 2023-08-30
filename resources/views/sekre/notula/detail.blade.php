@extends('layouts.master')
@section('content')
  <div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>Detail Notula</h3>
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
            @foreach ($notula as $no)
              <div class="card-content">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Tanggal</label>
                        <input type="text" class="form-control" value="{{ $no['tanggal'] }}" disabled>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Jenis Rapat</label>
                        <input type="text" class="form-control" value="{{ $no['jenis_rapat'] }}" disabled>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Agenda</label>
                        <textarea rows="10" class="form-control" disabled>{{ $no['agenda'] }}</textarea>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        @if (filter_var($no['evidence'], FILTER_VALIDATE_URL))
                          <a href="{{ $no['evidence'] }}" target="_blank">
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
                    <hr>
                    <div class="col-md-12">
                      <div class="form-group">
                        <a href="/sekre/notula">
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
