@extends('home')
@section('dashboard')
<div class="row ">
    <div class="col">
        <div class="card">
            <div class="card-header">{{ __('Dashboard Majoo') }}</div>
        
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
        
               Welcome, {{Auth::user()->name}}
            </div>
        </div>
    </div>
</div>
<div class="row mt-2">
    <div class="col">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Product</h5>
              <h6 class="card-subtitle mb-2 text-muted">2</h6>
              <a href="{{route('product.index')}}" class="card-link">See All</a>
            </div>
          </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Category</h5>
              <h6 class="card-subtitle mb-2 text-muted">2</h6>
              <a href="{{route('category.index')}}" class="card-link">See All</a>
            </div>
          </div>
    </div>
</div>


@endsection