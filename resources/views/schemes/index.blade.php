<?php 
use Illuminate\Support\Facades\Input;
?>
@extends('layouts.app')

@section('content')
<!-- Submit referral scheme form -->
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        @foreach($schemes as $scheme)
            <div class="panel panel-default">
                <div class="panel-heading">{{ $scheme->title }}</div>
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
