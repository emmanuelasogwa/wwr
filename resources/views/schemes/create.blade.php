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
                @if(session('message'))
                    <div class="alert alert-success">
                    {{session('message')}}
                    </div>
                @endif
                <div class="panel-heading"><h2>{{ $modify == 1 ? "Modify " : "Post a "  }}referral scheme</h2></div>
                <div class="panel-body">

                    {{ Form::open(array('route' => $route = $modify == 1 ?  ['update_scheme', $id] : 'schemes.store', 'files'=>'true')) }}
                {!! csrf_field() !!}
                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    {{ Form::label('title', 'Title:', ['class' => 'control-label']) }}
                    {{ Form::text('title', Input::old('title') ? Input::old('title') : @$title, ['class' => 'form-control', 'placeholder' => 'Give your post a title', 'required' => 'required autofocus']) }}
                    @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
                    {{ Form::label('link', 'Referral Link/URL:', ['class' => 'control-label']) }}
                    {{ Form::url('link', Input::old('link') ? Input::old('link') : @$link, ['class' => 'form-control', 'placeholder' => 'Referral link', 'required' => 'required']) }}
                    @if ($errors->has('link'))
                        <span class="help-block">
                            <strong>{{ $errors->first('link') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                   {{ Form::label('description', 'Description:', ['class' => 'control-label']) }}
                   {{ Form::textarea('description', Input::old('description') ? Input::old('description') : @$description, ['class' => 'form-control', 'rows' => '5', 'required' => 'required']) }}
                </div>

                <div class="form-group{{ $errors->has('creator') ? ' has-error' : '' }}">
                  {{ Form::label('creator', "Your Username:", ['class' => 'control-label']) }}
                  {{ Form::text('creator', Input::old('creator') ? Input::old('creator') : @$creator, ['class' => 'form-control', 'placeholder' => "Creator", 'required' => 'required']) }}
                </div>

                <div class="form-group{{ $errors->has('referer_reward') ? ' has-error' : '' }}">
                  {{ Form::label('referer_reward', "Referer's reward:", ['class' => 'control-label']) }}
                  {{ Form::text('referer_reward', Input::old('referer_reward') ? Input::old('referer_reward') : @$referer_reward, ['class' => 'form-control', 'placeholder' => "Referer's reward", 'required' => 'required']) }}
                </div>

                <div class="form-group{{ $errors->has('invitee_reward') ? ' has-error' : '' }}">
                  {{ Form::label('invitee_reward', "Invitee's reward:", ['class' => 'control-label']) }}
                  {{ Form::text('invitee_reward', Input::old('invitee_reward') ? Input::old('invitee_reward'): @$invitee_reward, ['class' => 'form-control', 'placeholder' => "Invitee's reward", 'required' => 'required']) }}
                 </div>

                 <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                  {{ Form::label('image', "Select Image:", ['class' => 'control-label btn btn-default btn-file']) }}
                  {{ Form::file('image', ['style'=>"display: none"]) }}
                  </div>

                 <div class="form-group">
                 {{ Form::submit($modify == 1 ? 'Update' : 'Submit', ['class' => 'btn btn-success']) }}

                 </div>
                    
                {{ Form::close() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
