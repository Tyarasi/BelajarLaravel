@extends('admin.admin_master')
@section('admin')
    <div class="py-12">

        <div class="container">
            <div class="row">

              <div class="col-md-12">
                <div class="card">

                  <!--Dibawah Ini adalah cara memasukkan notif ketika ada inputan masuk dari session controller-->
                  @if(session('success'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Cloe">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  @endif

                  <h2>Home Slide</h2>
                  <a href="{{ route('add.slider') }}"><button class="btn btn-info">Add Slider</button></a>
                      
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col" width="15%">No.</th>
                        <th scope="col" width="15%">Slider Title</th>
                        <th scope="col" width="15%">Description</th>
                        <th scope="col" width="15%">Image</th>
                        <th scope="col" width="15%">Action</th>
                      </tr>
                    </thead>
                    <tbody>

                      @php($i = 1)
                      @foreach ($sliders as $slider)
                      <tr>
                        <th scope="row">{{ $i++}}</th> <!--Cara lain memberikan slot 
                                                                                    nomor pada kolom tabel penomoran-->
                        <td>{{ $slider->title }}</td>
                        <td>{{ $slider->description }}</td>
                        <td> <img src="{{ asset($slider->image)}}" style="height:40px; width:70px;"> </td>
                        <td>
                            @if($slider->created_at == NULL)
                            <span class="text-danger">No Date Set</span>
                            @else
                           <!--Kalau di Kontroler pakai DB ::table('nama tabel')-->
                           {{ Carbon\Carbon::parse($slider->created_at)->diffForHumans() }}
                            @endif
                        </td>
                        <td>
                          <a href="{{ url('edit/slider/'.$slider->id) }}" class="btn btn-info">Edit</a>
                          <a href="{{ url('delete/slider/'.$slider->id) }}" onclick="return confirm('Are You Sure to Delete')" class="btn btn-danger">Delete</a>
                        </td>


                      </tr>
                      @endforeach

                    </tbody>
                  </table>

                </div>




            </div>    
        </div>
    </div>
@endsection
