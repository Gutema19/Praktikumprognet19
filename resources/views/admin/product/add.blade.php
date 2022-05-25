@extends('template.admin')
@section('title', 'Product ')
@section('judul', 'Product')
@section('content')
<div class="content">
        <div class="row">
          <div class="col-md-7">
            <div class="card ">
              <div class="card-header ">
                <h5 class="text-center">PRODUCT IMAGE</h5>
              </div>
              <div class="card-body ">
                <form method="POST" action="{{ url('admin/product') }}"
                  enctype="multipart/form-data">
                  @csrf
                      <div class="form-control text-center">
                        <label><h5 >Add image</h5></label>
                        <input type="file" class="form-control" required name="image">
                      </div>
                    </div>
              </div>
          </div>
          <div class="col-md-4">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-title">PRODUCT DETAIL</h5>
              </div>
              <div class="card-body">
                  <form method="POST" action="{{ url('admin/product') }}">
                    @csrf
                        <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" name="product_name" class="form-control @error('product_name') is-invalid @enderror" value="{{ old('product_name') }}" autofocus>
                        @error('product_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" autofocus>
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}" autofocus></textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Stock</label>
                            <input type="integer" name="stock" class="form-control @error('stock') is-invalid @enderror" value="{{ old('stock') }}" autofocus>
                            @error('stock')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Weight</label>
                            <input type="integer" name="weight" class="form-control @error('weight') is-invalid @enderror" value="{{ old('weight') }}" autofocus>
                            @error('weight')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    <button type="submit" class="btn btn-success">Simpan</button>
                    </form>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
