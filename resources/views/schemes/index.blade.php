<?php 
use Illuminate\Support\Facades\Input;
?>
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
            {{--<nav class="navbar">--}}
                {{--<ul class="nav navbar-nav">--}}
                    {{--<li class="active"><a href="#">Home</a></li>--}}
                    {{--<li><a href="{{ url('post') }}">Post</a></li>--}}
                    {{--<li><a href="#">Services</a></li>--}}
                    {{--<li><a href="#">Downloads</a></li>--}}
                    {{--<li><a href="#">About</a></li>--}}
                    {{--<li><a href="#">Contact</a></li>--}}
                {{--</ul>--}}
            {{--</nav>--}}
            <h1>Current Referral Schemes</h1>
        @foreach($schemes as $scheme)
            <div class="panel panel-default">
                <div class="panel-heading"><h2>{{ $scheme->title }}</h2></div>
                <div class="panel-body">
                <p>{{ $scheme->description}}</p>
                <p>
                    <a href="{{ route('schemes.show', $scheme->id) }}" class="btn btn-info">Read More</a>
                </p>
                <hr>

                </div>
            </div>
            @endforeach
        </div>
        <div class="col-md-4">
            <h2>Most Popular</h2>
            @foreach($schemes as $scheme)
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>{{ $scheme->title }}</h4></div>
                    <div class="panel-body">
                        <p>{{ $scheme->description}}</p>
                        <p>
                            <a href="{{ route('schemes.show', $scheme->id) }}" class="btn btn-info">Read More</a>
                        </p>
                        <hr>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
