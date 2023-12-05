@extends('admin.admin_master')

@section('admin')

<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Brand Slider</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('store.slider') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Slider Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Slider Title">
                    </div>

                <div class="form-group">
                    <label for="description">Slider Description</label>
                    <textarea class="form-control" rows="3" name="description" placeholder="Slider Description"></textarea>
                </div>
                <div class="form-group">
                    <label for="image">Image Input</label>
                    <input type="file" class="form-control-file" name="image">
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