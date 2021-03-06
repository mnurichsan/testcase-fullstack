@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center mt-3">
        <div class="col-lg-2">
            <div class="list-group">
                <a href="{{route('home')}}" class="list-group-item list-group-item-action @if(Route::is('home')) active @endif" aria-current="true">
                  Dashboard
                </a>
                <a href="{{route('category.index')}}" class="list-group-item list-group-item-action @if(Route::is('category.index') || Route::is('category.create')  || Route::is('category.edit') ) active @endif">Category</a>
                <a href="{{route('product.index')}}" class="list-group-item list-group-item-action @if(Route::is('product.index') || Route::is('product.create')  || Route::is('product.edit') ) active @endif">Product</a>
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button type="submit" class="list-group-item list-group-item-action">Log out</button>
                </form>
   
              </div>
        </div>
        <div class="col-lg-10 mt-3">
            @yield('dashboard')
        </div>
    </div>
</div>
@endsection

