@extends('admin.admin_master')

@section('admin')

<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>About Insert Data</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('store.about') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">About Title</label>
                    <input type="text" class="form-control" name="title" placeholder="About Title">
                    </div>

                <div class="form-group">
                    <label for="short_dis">Short Description</label>
                    <textarea class="form-control" rows="3" name="short_dis" placeholder="Short Description About"></textarea>
                </div>

                <div class="form-group">
                    <label for="long_dis">Long Description</label>
                    <textarea class="form-control" rows="3" name="long_dis" placeholder="Long Description About"></textarea>
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