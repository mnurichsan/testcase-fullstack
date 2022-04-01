@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-2">
            <div class="list-group">
                <a href="{{route('home')}}" class="list-group-item list-group-item-action @if(Route::is('home')) active @endif" aria-current="true">
                  Dashboard
                </a>
                <a href="{{route('category.index')}}" class="list-group-item list-group-item-action @if(Route::is('category.index') || Route::is('category.create')  || Route::is('category.edit') ) active @endif">Category</a>
                <a href="#" class="list-group-item list-group-item-action">Product</a>
              </div>
        </div>
        <div class="col-lg-10">
            @yield('dashboard')
        </div>
    </div>
</div>
@endsection

