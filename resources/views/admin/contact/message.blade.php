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

              <h2>Message Data</h2>
             <table class="table">
                <thead>
                  <tr>
                    <th scope="col" width="15%">No.</th>
                    <th scope="col" width="15%">Name</th>
                    <th scope="col" width="15%">Email</th>
                    <th scope="col" width="15%">Subject</th>
                    <th scope="col" width="15%">Message</th>
                    <th scope="col" width="15%">Action</th>
                  </tr>
                </thead>
                <tbody>

                  @php($i = 1)
                  @foreach ($messages as $msg)
                  <tr>
                    <th scope="row">{{ $i++ }}</th> 
                    <td>{{ $msg->name }}</td>
                    <td>{{ $msg->email }}</td>
                    <td>{{ $msg->subject }}</td>
                    <td>{{ $msg->message }}</td>
                  
                    <td>
                       <a href="{{ url('admin/delete/message/'.$msg->id) }}" onclick="return confirm('Are You Sure to Delete')" class="btn btn-danger">Delete</a>
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