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
                <div class="panel-heading">{{ $scheme->title }}</div>
                <div class="panel-body">
                <p>{{ $scheme->description}}</p>
                <hr>
                <a href="#" class="btn btn-info">Find Referrer</a>
                <a href="{{ route('schemes.edit', $scheme->id) }}" class="btn btn-primary">Refer Someone</a>

                <div class="pull-right">
                    <a href="{{ route('schemes.index') }}" class="btn btn-danger">Back to Schemes</a>
                </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
