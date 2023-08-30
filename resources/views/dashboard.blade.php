@extends('layouts.master')
@section('content')
  <div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>Welcome!</h3>
          <p class="text-subtitle text-muted">This page gonna be a dashboard page.</p>
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
          <h4 class="card-title">Example Content</h4>
        </div>
        <div class="card-body">
          This page is still on development. Please come back later.

          {{-- <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
          Loading... --}}
        </div>
      </div>
    </section>
  </div>
@endsection
