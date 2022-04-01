@extends('home')
@section('dashboard')
<div class="card">
    <div class="card-header">
        <a href="{{route('category.index')}}" class="btn btn-success pull-end"><< Back</a>
        <h3 class="card-title mt-3">Edit Category</h3>
    </div>
    <form action="{{route('category.update',$category->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label>Category Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$category->name}}">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div> 
        
        </div>
        <div class="card-footer">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="reset" class="btn btn-danger me-md-1">Reset</button>
                <button type="submit" class="btn btn-primary" >Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection