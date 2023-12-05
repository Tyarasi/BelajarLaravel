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

                  <h2>Home About</h2>
                  <a href="{{ route('add.about') }}"><button class="btn btn-info">Add About</button></a>
                      
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col" width="15%">No.</th>
                        <th scope="col" width="15%">Title</th>
                        <th scope="col" width="15%">Short Description</th>
                        <th scope="col" width="15%">Long Description</th>
                        <th scope="col" width="15%">Action</th>
                      </tr>
                    </thead>
                    <tbody>

                      @php($i = 1)
                      @foreach ($homeabouts as $about)
                      <tr>
                        <th scope="row">{{ $i++}}</th> 
                        <td>{{ $about->title }}</td>
                        <td>{{ $about->short_dis }}</td>
                        <td>{{ $about->long_dis }}</td>
                         
                        <td>
                          <a href="{{ url('edit/about/'.$about->id) }}" class="btn btn-info">Edit</a>
                          <a href="{{ url('delete/about/'.$about->id) }}" onclick="return confirm('Are You Sure to Delete')" class="btn btn-danger">Delete</a>
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
