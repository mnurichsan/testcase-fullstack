@extends('home')
@section('dashboard')
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
@endsection