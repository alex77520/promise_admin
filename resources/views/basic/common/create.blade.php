@extends('layouts.app')
@section('page-content')
    <div class="page-header">
        <h1>
            <a href="{{route($route.'.index')}}"> {{$title}} </a>
            <small>
                新建
            </small>
        </h1>
    </div><!-- /.page-header -->

    @include('components.message.validate')
    <div class="row">
        <div class="col-xs-6">
            {!!  Form::open(['route' => $route.'.store','class'=> 'form-horizontal','files' => $upload]) !!}
            @foreach($fields as $field=>$type)
                {{ Form::$type($field, trans($field), old($field))}}
            @endforeach
            {{Form::bsButton()}}
            {!! Form::close() !!}
        </div>
    </div>
@endsection