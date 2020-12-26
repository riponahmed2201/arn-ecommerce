
@extends('admin.master')

@section('dashboard.title','Create Category')
@section('title','Create Category')

@section('content')
    <section class="content">
        <div class="container-fluid">
           <div class="card">
            <div class="card-header">
               <h4> Create Category</h4>
            </div>

            @include('admin.includes.message')

            <div class="card-body">
                <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="category_name"> Category Name</label>
                        <input type="text" class="form-control @error('category_name') is-invalid @enderror" name="category_name">
                        @if($errors->has('category_name'))
                            <p class="text-danger">{{ $errors->first('category_name') }}</p>
                        @endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="status"> Status</label>
                        <select name="status" id="" class="form-control">
                            <option value="">--select--</option>
                            <option value="1">Open</option>
                            <option value="0">Close</option>
                        </select>
                        @if($errors->has('status'))
                            <p class="text-danger">{{ $errors->first('status') }}</p>
                        @endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control">
                        @if($errors->has('image'))
                            <p class="text-danger">{{ $errors->first('image') }}</p>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="image"></label>
                    <button type="submit" class="btn btn-success">Submit </button>
                </div>
            </form>
            </div>
           </div>
        </div>
    </section>
@endsection