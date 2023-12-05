<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           All Category <b></b>
          <b style="float:right;"> Total Users
          <span class="badge badge-danger"> </span>
          </b>
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="container">
            <div class="row">

              <div class="col-md-8">
                <div class="card">

                  <!--Dibawah Ini adalah cara memasukkan notif ketika ada inputan masuk dari session controller-->
                  @if(session('success'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong> Dah Masuk dah.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Cloe">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  @endif

                      <div class="card-header">All Category</div>


                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">User</th>
                        <th scope="col">Created_at</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>

                      <!--- php($i = 1) --->
                      @foreach ($categories as $category)
                      <tr>
                        <th scope="row">{{ $categories->firstItem()+$loop->index }}</th> <!--Cara lain memberikan slot 
                                                                                    nomor pada kolom tabel penomoran-->
                        <td>{{ $category->category_name }}</td>
                        <td>{{ $category->user->name }}</td>
                        <td>
                            @if($category->created_at == NULL)
                            <span class="text-danger">No Date Set</span>
                            @else
                           <!--Kalau di Kontroler pakai DB ::table('nama tabel')-->
                           {{ Carbon\Carbon::parse($category->created_at)->diffForHumans() }}
                            @endif
                        </td>
                        <td>
                          <a href="{{ url('category/edit/'.$category->id) }}" class="btn btn-info">Edit</a>
                          <a href="{{ url('softdelete/category/'.$category->id) }}" class="btn btn-danger">Delete</a>
                        </td>


                      </tr>
                      @endforeach

                    </tbody>
                  </table>

                  {{ $categories->links() }}

                </div>
              </div>

                  <div class="col-md-4">
                    <div class="card">
                          <div class="card-header">Add Category</div>
                          <div class="card-body">
                            <!--Bagian Cara menginputkan data ke database--->
                            <form action="{{ route('store.category') }}" method="POST">
                              @csrf
                              <div class="form-group">
                                <label for="exampleInputEmail1">Category Name</label>
                                <input type="name" name="category_name"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                              <button type="submit" class="btn btn-primary">Add Category</button>
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



    <div class="py-12">

      <div class="container">
          <div class="row">

            <div class="col-md-8">
              <div class="card">
                    <div class="card-header">Trash List</div>


              <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">No.</th>
                      <th scope="col">Category Name</th>
                      <th scope="col">User</th>
                      <th scope="col">Created_at</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>

                    <!--- php($i = 1) --->
                    @foreach ($trachCat as $category)
                    <tr>
                      <th scope="row">{{ $trachCat->firstItem()+$loop->index }}</th> <!--Cara lain memberikan slot 
                                                                                  nomor pada kolom tabel penomoran-->
                      <td>{{ $category->category_name }}</td>
                      <td>{{ $category->user->name }}</td>
                      <td>
                          @if($category->created_at == NULL)
                          <span class="text-danger">No Date Set</span>
                          @else
                         <!--Kalau di Kontroler pakai DB ::table('nama tabel')-->
                         {{ Carbon\Carbon::parse($category->created_at)->diffForHumans() }}
                          @endif
                      </td>
                      <td>
                        <a href="{{ url('category/restore/'.$category->id) }}" class="btn btn-info">Restore</a>
                        <a href="{{ url('deletepermanent/category/'.$category->id) }}" class="btn btn-danger">Delete Permanent</a>
                      </td>


                    </tr>
                    @endforeach

                  </tbody>
                </table>

                {{ $trachCat->links() }}

              </div>
            </div>
            </div>




          </div>    
      </div>
  </div>

</x-app-layout>
