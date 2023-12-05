<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Hii... Bro , ini adalah nama kamu <b>({{ Auth::user()->name }})</b>
          <b style="float:right;"> Total Users
          <span class="badge badge-danger"> {{ count($users) }}</span>
          </b>
        </h2>
    </x-slot>
  
    <div class="py-12">
        <div class="container">
            <div class="row">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">No.</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                      </tr>
                    </thead>
                    <tbody>

                      @php($i = 1)
                      @foreach($users as $ambil)
                      <tr>
                        <th scope="row">{{ $i++ }}</th>
                        <td>{{ $ambil->name }}</td>
                        <td>{{ $ambil->email }}</td>
                        <td>{{ Carbon\Carbon::parse($ambil->created_at)->diffForHumans() }}</td>
                      </tr>  
                      @endforeach


                    </tbody>
                  </table>
            </div>    
        </div>
    </div>
</x-app-layout>
