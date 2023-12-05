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

                  <h2>All Contact Data</h2>
                  <a href="{{ route('add.contact') }}"><button class="btn btn-info">Add Contact</button></a>
                      
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col" width="15%">No.</th>
                        <th scope="col" width="15%">Contact Address</th>
                        <th scope="col" width="15%">Contact Email</th>
                        <th scope="col" width="15%">Contact Phone</th>
                        <th scope="col" width="15%">Action</th>
                      </tr>
                    </thead>
                    <tbody>

                      @php($i = 1)
                      @foreach ($contacts as $con )
                      <tr>
                        <th scope="row"></th> 
                        <td>{{ $con->address }}</td>
                        <td>{{ $con->email }}</td>
                        <td>{{ $con->phone }}</td>
                      
                        <td>
                          <a href="{{ url('admin/edit/contact/'.$con->id) }}" class="btn btn-info">Edit</a>
                          <a href="{{ url('admin/delete/contact/'.$con->id) }}" onclick="return confirm('Are You Sure to Delete')" class="btn btn-danger">Delete</a>
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
