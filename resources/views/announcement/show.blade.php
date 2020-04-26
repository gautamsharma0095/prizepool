
@extends('layouts/contentLayoutMaster')

@section('title', 'DataTables')

@section('vendor-style')
        {{-- vendor css files --}}
        <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/datatables.min.css')) }}">
@endsection

@section('content')
<div class="card">
  <div class="card-header mb-1">
    <h4 class="card-title">{!! $announcement->title !!}</h4>
  </div>
  <div class="card-content">
    @if($announcement->image != '')
      <img class="img-fluid" src="{{ $announcement->image }}" alt="Card image cap">
    @endif
    <div class="card-body">
      <p class="card-text">
        {!! $announcement->message !!}
      </p>
    </div>
  </div>
</div>
@endsection
