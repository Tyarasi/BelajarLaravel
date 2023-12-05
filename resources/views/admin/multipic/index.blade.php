@extends('admin.admin_master')
@section('admin')

    <div class="py-12">

        <div class="container">
            <div class="row">

              <div class="col-md-8">
                <div class="card-group">
                  @foreach ($images as $multi )
                
                  <div class="col-md-4 mt-5">
                      <div class="card">
                        <img src="{{ asset($multi->image) }}" alt="">
                      </div>
                  </div>
      
                  @endforeach
                </div>
              </div>

                  <div class="col-md-4">
                    <div class="card">
                          <div class="card-header">Multi Image</div>
                          <div class="card-body">
                            <!--Bagaimana Cara nya memasukkan lebih dari 2 file--->
                            <form action=" {{ route('store.image') }} " method="POST" enctype="multipart/form-data">
                              @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Multi Image</label>
                                    <input type="file" name="image[]"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" multiple="">
                                </div>
                              <button type="submit" class="btn btn-primary">Add Image</button>
                            </form>

                            @error('brand_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          
                          </div>

                </div>
              </div>




            </div>    
        </div>
    </div>
@endsection
