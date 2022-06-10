<?php 
use Illuminate\Support\Facades\Input;
?>
@extends('layouts.app')

@section('content')
<!-- Submit referral scheme form -->
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div id="image-div">
                        <div class="container">
                        <img src="{{asset('/images/'.$scheme->image_link)}}">
                        </div>
                        </div>

                        <h3>{{ $scheme->title }}</h3>
                </div>
                </div>
                <div class="panel-body">
                <p>{{ $scheme->description}}</p>

                <hr>
                <a href="#" class="btn btn-warning">Find Referrer</a>
                    <a href="{{ route('refer', $scheme->id) }}" class="btn btn-success">Refer People</a>


                <div class="pull-right">
                    <a href="{{ route('schemes.edit', $scheme->id) }}" class="btn btn-danger">Edit Scheme</a>
                </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
