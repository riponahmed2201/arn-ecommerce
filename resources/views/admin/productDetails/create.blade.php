
@extends('admin.master')

@section('dashboard.title','Create product details')
@section('title','Create product details')

@section('content')
    <section class="content">
        <div class="container-fluid">
           <div class="card">
            <div class="card-header">
               <a href="{{ route('product.details.index') }}" class="btn btn-primary float-right"> <i class="fa fa-table"></i> All product details</a>
               <h4> Create product details</h4>

            </div>

            @include('admin.includes.message')

            <div class="card-body">
                <form action="{{ route('product.details.store') }}" method="POST">
                    @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="category_name">Product Color</label>
                        <input type="text" class="form-control @error('color') is-invalid @enderror" name="color">
                        @if($errors->has('color'))
                            <p class="text-danger">{{ $errors->first('color') }}</p>
                        @endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="category_name">Product Size</label>
                        <input type="text" class="form-control @error('size') is-invalid @enderror" name="size">
                        @if($errors->has('size'))
                            <p class="text-danger">{{ $errors->first('size') }}</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
           </div>
        </div>
    </section>
@endsection