@extends('admin.admin_master')
@section('admin')
    <div class="py-12">

        <div class="container">
            <div class="row">

                  <div class="col-md-4">
                    <div class="card">
                          <div class="card-header">Edit Brand</div>
                          <div class="card-body">
                            <!--Bagian Cara mengedit data ke database--->
                            <form action=" {{ url('brand/update/'.$brands->id) }}" method="POST" enctype="multipart/form-data">
                              @csrf
                              <input type="hidden" name="old_image" value="{{ $brands->brand_image }}">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Update Brand Name</label>
                                <input type="text" name="brand_name"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" 
                                value="{{ $brands->brand_name }}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Update Image Brand</label>
                                    <input type="file" name="brand_image"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" 
                                    value="{{ $brands->brand_image }}">
                                </div>

                                <div class="form-group">
                                    <img src="{{ asset($brands->brand_image) }}" style="width:400px; height:200px">
                                </div>
                            

                                
                              <button type="submit" class="btn btn-primary">Update Brand</button>
                            </form>

                            @error('ikodatainputkategori')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          
                          </div>

                </div>
              </div>




            </div>    
        </div>
    </div>
@endsection