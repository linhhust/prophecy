@extends('layout')

@section('css')
    <link rel="stylesheet" href="{{asset('public/templates/css/custom.css')}}">
@stop
@section('content')

@include('partials.breadcrumb')


<div class="project-details">
    <div class="container">
        <div class="row ">
            <div class="col-xl-12 col-lg-12">
                <div class="left-side">

                    <div class="part-text-top">
                        <h2 class="subtitle">{{__($page_title)}}</h2>
                        <p><?php echo $basic->policy; ?></p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('js')

@stop
