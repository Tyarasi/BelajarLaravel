@extends('admin.admin_master')
@section('admin')
    <div class="py-12">

        <div class="container">
            <div class="row">

                  <div class="col-md-8">
                    <div class="card">
                          <div class="card-header">Edit Brand</div>
                          <div class="card-body">
                            <!--Bagian Cara mengedit data ke database--->
                            <form action=" {{ url('update/slider/'.$sliders->id) }}" method="POST" enctype="multipart/form-data">
                              @csrf
                              <input type="hidden" name="old_image" value="{{ $sliders->image }}">
                              <div class="form-group"> 
                                <label for="exampleInputEmail1">Update Slider Name</label>
                                <input type="text" name="title"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" 
                                value="{{ $sliders->title }}">
                                </div>

                                <div class="form-group">
                                  <label for="exampleInputEmail1">Description Slider</label>
                                  <textarea class="form-control" rows="3" name="description">{{ $sliders->description }} </textarea>
                                  </div>
  

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Update Image Sliders</label>
                                    <input type="file" name="image"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" 
                                    value="{{ $sliders->image }}">
                                </div>

                                <div class="form-group">
                                    <img src="{{ asset($sliders->image) }}" style="width:400px; height:200px">
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