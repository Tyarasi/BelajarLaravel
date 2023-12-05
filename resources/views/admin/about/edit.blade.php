@extends('admin.admin_master')
@section('admin')
    <div class="py-12">

        <div class="container">
            <div class="row">

                  <div class="col-md-8">
                    <div class="card">
                          <div class="card-header">Edit About</div>
                          <div class="card-body">
                            <!--Bagian Cara mengedit data ke database--->
                            <form action=" {{ url('update/about/'.$abouts->id) }}" method="POST" enctype="multipart/form-data">
                              @csrf

                              <div class="form-group"> 
                                <label>Update About Title</label>
                                <input type="text" name="title"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" 
                                value="{{ $abouts->title }}">
                                </div>

                                <div class="form-group">
                                  <label>Update Short Description</label>
                                  <textarea class="form-control" rows="3" name="short_dis">{{ $abouts->short_dis }} </textarea>
                                </div>

                                <div class="form-group">
                                    <label>Update Long Description</label>
                                    <textarea class="form-control" rows="3" name="long_dis">{{ $abouts->long_dis }} </textarea>
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