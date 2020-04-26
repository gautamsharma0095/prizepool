
@extends('layouts/contentLayoutMaster')

@section('title', 'DataTables')

@section('vendor-style')
        {{-- vendor css files --}}
        <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/datatables.min.css')) }}">
@endsection

@section('content')
<section id="basic-datatable">
  <div class="row">
      <div class="col-12">
          <div class="card">
              <div class="card-header">
                  <h4 class="card-title">Announcement</h4>
              </div>
              <div class="card-content">
                  <div class="card-body card-dashboard">
                      <div class="table-responsive">
                          <table class="table zero-configuration" id="table_id">
                              <thead>
                                  <tr>
                                    <th>Title</th>
                                    <th>Time</th>
                                  </tr>
                              </thead>
                              <tbody>

                              </tbody>
                              <tfoot>
                                  <tr>
                                      <th>Title</th>
                                      <th>Time</th>
                                  </tr>
                              </tfoot>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
@endsection
@section('vendor-script')
{{-- vendor files --}}
        <script src="{{ asset(mix('vendors/js/tables/datatable/pdfmake.min.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/tables/datatable/vfs_fonts.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.min.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.html5.min.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.print.min.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.bootstrap.min.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.bootstrap4.min.js')) }}"></script>
@endsection
@section('page-script')
        {{-- Page js files --}}
        {{-- <script src="{{ asset(mix('js/scripts/datatables/datatable.js')) }}"></script> --}}
        <script>
          $(document).ready( function () {

              var table = $("#table_id").DataTable({
                  processing: true,
                  serverSide: true,
                  ajax: "{{ route('announcement.list') }}",
                  columns: [
                  {
                      data: "title",
                      name: "title"
                  }, {
                      data: "created",
                      name: "created"
                  }]
              });
          } );
        </script>
@endsection
