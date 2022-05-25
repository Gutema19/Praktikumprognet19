@extends('template.admin')
@section('title', 'Product ')
@section('judul', 'Product')
@section('content')
<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header ">
                <h5 class="text-center">PRODUCT IMAGE</h5>
              </div>
              <div class="card-body ">
                <form action="{{  url('admin/product/editimage/'.$image->id) }}" method="POST" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                  <img src="{{ asset('public/image/'.$image->image_name) }}" width="100" height="100" alt="">
                      <div class="form-control text-center">
                        <label><h5 ></h5></label>
                        <input type="file" class="form-control" required name="image">
                      </div>
                    </div>
              </div>
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
