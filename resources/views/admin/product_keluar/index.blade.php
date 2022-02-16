@extends('admin.admin')

@section('content')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">


<!-- /.card -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <!-- /.card-header -->
            <div class="card-header">
                <h3 class="card-title">Data Mainan Keluar</h3>
                <div class="card-tools">
                 <a href="{{ URL::to('/admin/productout/create')}}" class="btn btn-tool">
                     <i class="fa fa-plus"></i>
                     &nbsp; Add
                 </a>
                 <a href="{{ route('exportPDF.productKeluarAll') }}" class="btn btn-tool">Export PDF</a>
             </div>
         </div>

         <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
            @if (Session::has('message'))
            <div id="alert-msg" class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ Session::get('message') }}
            </div>
            @endif
                        <thead>
                            <tr class="text-center">
                                <th>ID</th>
                                <th>Produk</th>
                                <th>Customer</th>
                                <th>Qty</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($productout as $productout)
                            <tr>
                                <td class="text-center">{{ $productout['id'] }}</td>
                                <td>{{ $productout->product->name }}</td>
                                <td>{{ $productout->customer->nama}}</td>
                                <td>{{ $productout['qty'] }}</td>
                                <td>{{ $productout['tanggal'] }}</td>
                                <td class="text-center">
                                    <form method="POST" action="{{ URL::to('/admin/productout/'.$productout['id']) }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE" />
                                        <div class="btn-group">
                                            <a class="btn btn-success" href="{{ URL::to('/admin/productout/'.$productout['id'].'/edit') }}"><i class="fa fa-edit"></i></a>
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>


<!-- jQuery -->
<script src="{{ asset('lte/plugins/jquery/jquery.min.js')}}"></script>
<!-- DataTables -->
<script src="{{ asset('lte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('lte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('lte/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('lte/dist/js/demo.js')}}"></script>
<!-- page script -->
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
    });
  </script>
@endsection

