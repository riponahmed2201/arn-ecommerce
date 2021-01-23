
@extends('admin.master')

@section('dashboard.title','Create product details')
@section('title','Create product details')

@section('content')
    <section class="content">
        <div class="container-fluid">
           <div class="card">
            <div class="card-header">
               <a href="{{ route('product.details.create') }}" class="btn btn-primary float-right"> <i class="fa fa-table"></i> Create product details</a>
               <h4> All product details</h4>
              </div>

            @include('admin.includes.message')

            <div class="card-body">
                <table id="all-product-details" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>SL NO</th>
                      <th>Size</th>
                      <th>Color</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach ($product_details as $product_detail)
                            <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $product_detail->size }}</td>
                            {{-- turnary operator  ? : --}}
                            <td>{{ $product_detail->color}}</td>
                            <td style="width: 80px">
                                <a href="{{route('product.details.edit',$product_detail->id)}}" class="btn btn-info btn-xs"> <i class="fa fa-edit"></i> </a>
                                <a href="{{route('product.details.delete',$product_detail->id)}}" class="btn btn-danger btn-xs"> <i class="fa fa-trash-alt"></i> </a>
                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
           </div>
        </div>
    </section>
@endsection


@section('script')
<script>
    $(function () {
      $("#all-product-details").DataTable();
    //   $('#example2').DataTable({
    //     "paging": true,
    //     "lengthChange": false,
    //     "searching": false,
    //     "ordering": true,
    //     "info": true,
    //     "autoWidth": false,
    //   });
    });
  </script>
@endsection
