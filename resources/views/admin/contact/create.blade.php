@extends('admin.admin_master')

@section('admin')

<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Contact Insert Data</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('store.contact') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="email">Contact Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Your Email">
                    </div>

                <div class="form-group">
                    <label for="phone">Contact Phone</label>
                    <input type="text" class="form-control" name="phone" placeholder="Number Phone"></div>

                <div class="form-group">
                    <label for="address">Contact Address</label>
                    <textarea class="form-control" rows="3" name="address" placeholder="Address"></textarea>
                </div>

                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Submit</button>
                    <button type="submit" class="btn btn-secondary btn-default">Cancel</button>
                </div>
            </form>
        </div>
    </div>

</div>

@endsection