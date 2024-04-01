@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                <div class="row">
                    <div class="col-md-3 card-footer">
                        <h4>Beranda</h4>
                    </div>
                    @if (auth()->user()->role=="Admin")
                    <div class="col-md-3 card-footer">
                        <a href="{{ route('index.halaman2') }}" class="btn btn-success">halaman 2</a>
                    </div>
                    <div class="col-md-3 card-footer">
                        <a href="{{ route('index.halaman1') }}" class="btn btn-success">halaman1</a>
                    </div>
                    @endif
                    <div class="col-md-3 card-footer">
                        <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endsection