@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row mt-3 mb-2">
    <div class="col">
      <h1 class="text-bold">Product</h1>
    </div>
  </div>
    <div class="row">
      @foreach ($products as $product)
        <div class="col-lg-3">
          <div class="card shadow-sm h-100">
            <img src="{{asset($product->image)}}" class="bd-placeholder-img card-img-top" width="100%" height="225">
            {{-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg> --}}
            <div class="card-body">
            <h4 class="card-text text-center">{{$product->name}}</h4>
            <h5 class="card-text text-center">{{rupiahFormat($product->price)}}</h5>
              <p class="card-text">{!! $product->description !!}</p>
              <div class="text-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">Beli</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach
  </div>
@endsection