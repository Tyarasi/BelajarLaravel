<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Edit Category <b></b>
          <b style="float:right;"> Total Users
          <span class="badge badge-danger"> </span>
          </b>
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="container">
            <div class="row">

                  <div class="col-md-4">
                    <div class="card">
                          <div class="card-header">Edit Category</div>
                          <div class="card-body">
                            <!--Bagian Cara mengedit data ke database--->
                            <form action=" {{ url('category/update/'.$categories->id) }}" method="POST">
                              @csrf
                              <div class="form-group">
                                <label for="exampleInputEmail1">Update Category Name</label>
                                <input type="name" name="category_name"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" 
                                value="{{ $categories->category_name }}">
                                </div>
                              <button type="submit" class="btn btn-primary">Update Category</button>
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
</x-app-layout>
