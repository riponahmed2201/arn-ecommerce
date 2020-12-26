
@extends('admin.master')

@section('dashboard.title','Create Category')
@section('title','Create Category')

@section('content')
    <section class="content">
        <div class="container-fluid">
           <div class="card">
            <div class="card-header">
               <h4> All Category</h4>
            </div>

            @include('admin.includes.message')

            <div class="card-body">
                <table id="all-category" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>SL NO</th>
                      <th>Category Name</th>
                      <th>Status</th>
                      <th>Image</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach ($categories as $category)
                            <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->category_name }}</td>
                            {{-- turnary operator  ? : --}}
                            <td>{{ $category->status == 1 ? 'Open' : 'Close' }}</td>
                            <td>
                                <img style="width: 60px; height:60px" src="{{ asset('uploads/category/'.$category->image) }}" alt="">
                            </td>
                            <td style="width: 80px">
                                <a href="" class="btn btn-info btn-xs"> <i class="fa fa-edit"></i> </a>
                                <a href="" class="btn btn-danger btn-xs"> <i class="fa fa-trash-alt"></i> </a>
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
      $("#all-category").DataTable();
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
