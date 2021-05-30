@extends('layout')

@section('css')
    <link rel="stylesheet" href="{{asset('public/templates/css/custom.css')}}">
    <style>
        @foreach($sliders as $data)
        .hero-bg-{{$data->id}}    {
            background-image: url({{asset('public/images/slider/'.$data->image)}});
            background-size: cover;
            background-position: center;
        }
        @endforeach
    </style>
@stop
@section('content')

    <script>
        function createCountDown(elementId, sec) {
            var tms = sec;
            var x = setInterval(function() {
                var distance = tms*1000;
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                document.getElementById(elementId).innerHTML =days+"D  "+ hours + "h "+ minutes + "m " + seconds + "s ";
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById(elementId).innerHTML = "{{__('COMPLETE')}}";
                }
                tms--;
            }, 1000);
        }

    </script>

    <!--  Hero Area Start  -->
    <div class="hero-area home-3">
        <div class="hero-carousel owl-carousel owl-theme">

            @foreach($sliders as $data)
                <div class="single-hero-item hero-bg-{{$data->id}}">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-8 col-lg-10">
                                <div class="hero-txt">
                                    <h1>{{$data->title}}</h1>
                                </div>
                            </div>
                            <div class="col-lg-5"></div>
                        </div>
                    </div>
                    <div class="hero-overlay"></div>
                </div>
            @endforeach
        </div>
    </div>
    <!--  Hero Area End  -->
    <!--  Tournament Start  -->
    <div class="vehicles-area home-2" {{-- style="margin-top:15px;" --}}>
        <div class="container">
            <div class="gjBbTt">
                @php
                    $first = true;   
                @endphp
                @foreach($tournaments as $event)
                    <a href="{{route('tournament',[str_slug($event->name),$event->id])}}" style="text-decoration: none;">
                        <div class="padding: 1rem 0.1rem">
                            <div class="button-content {{$first?'active':''}}">
                                <div class="icon-wrapper">
                                    <svg class="styles__SVG-sc-1l853wk-1 eiogy" style="font-size: 2em;">
                                        @if(strtolower($event->name) == "soccer")
                                            <use xlink:href="#icon-{{strtolower($event->name)}}">
                                                <svg id="icon-{{strtolower($event->name)}}" viewBox="0 0 32 32">
                                                    <path d="M31.92 17.973c-0.462-0.215-1.003-0.341-1.573-0.341s-1.111 0.126-1.597 0.351l0.023-0.010c0.104-0.38 0.164-0.816 0.164-1.265 0-1.742-0.896-3.275-2.251-4.163l-0.019-0.012c2.293-0.213 3.493-4.173 3.493-4.173-1.511-2.79-3.726-5.031-6.411-6.531l-0.082-0.042s-3.867-0.533-5.027 0.693c-1.44-2.333-5.533-2.333-5.533-2.333-3.247 0.623-6.063 2.157-8.255 4.322l0.002-0.002c0.002 1.293 0.602 2.445 1.538 3.194l0.008 0.006c-2.040 0.48-4.16 3.347-3.813 4.507-0.41-0.545-1.056-0.894-1.784-0.894-0.020 0-0.039 0-0.059 0.001l0.003-0c-0.42 1.369-0.664 2.942-0.667 4.572v0.002c0 0 0 0.001 0 0.001 0 1.759 0.288 3.45 0.819 5.030l-0.032-0.111c0.744-0.602 1.315-1.391 1.642-2.297l0.011-0.036c1.011 0.667 2.252 1.063 3.585 1.063 0.656 0 1.29-0.096 1.889-0.275l-0.047 0.012c-0.42 0.849-0.666 1.848-0.666 2.905 0 1.327 0.388 2.563 1.056 3.601l-0.016-0.026c-1.303 0.187-2.433 0.811-3.263 1.716l-0.004 0.004c2.863 2.73 6.748 4.411 11.026 4.413h0c1.36-0.003 2.679-0.178 3.936-0.504l-0.109 0.024c-0.743-1.721-2.096-3.061-3.78-3.769l-0.047-0.017c1.867-0.107 3.707-2.84 4-4.707 1.341 0.61 2.909 0.965 4.56 0.965 0.404 0 0.803-0.021 1.196-0.063l-0.049 0.004c-0.286 0.703-0.452 1.519-0.452 2.373s0.166 1.67 0.468 2.417l-0.015-0.043c3.276-2.524 5.532-6.234 6.124-10.476l0.010-0.084zM19.693 20.867c-2.040-2.88-7.88-4.6-10.947-2.893 1.76-4.32 1.147-7.133-1.040-10.12 4 0.373 8.747-1.707 10.667-4.373 0.547 2.893 3.733 7.72 6.667 8.693-4.773 2.173-5.32 5.6-5.347 8.693z"></path>
                                                </svg>
                                            </use>
                                        @elseif(strtolower($event->name) == "tennis")
                                            <use xlink:href="#icon-{{strtolower($event->name)}}">
                                                <svg id="icon-{{strtolower($event->name)}}" viewBox="0 0 32 32">
                                                    <path d="M1.511 9.186l2.253 2.253c1.846 1.832 3.232 4.125 3.973 6.691l0.027 0.109c1.008 3.631 4.284 6.252 8.172 6.252 1.744 0 3.365-0.527 4.712-1.431l-0.030 0.019c2.083-1.404 3.503-3.652 3.77-6.243l0.003-0.037c0.023-0.237 0.037-0.513 0.037-0.791 0-3.859-2.565-7.118-6.083-8.166l-0.060-0.015c-2.707-0.766-5.030-2.152-6.894-4.001l0.001 0.001-2.213-2.307c-3.403 1.589-6.077 4.264-7.626 7.571l-0.040 0.096z"></path>
                                                    <path d="M27.297 4.666c-2.893-2.881-6.883-4.663-11.29-4.663-1.432 0-2.821 0.188-4.142 0.541l0.112-0.025 1.333 1.333c1.546 1.579 3.476 2.776 5.638 3.441l0.095 0.025c1.894 0.554 3.519 1.532 4.828 2.828l-0.001-0.001c1.936 2.004 3.129 4.737 3.129 7.749 0 6.163-4.997 11.16-11.16 11.16-2.287 0-4.413-0.688-6.183-1.868l0.041 0.026c-2.157-1.477-3.745-3.649-4.448-6.189l-0.018-0.078c-0.645-2.217-1.805-4.114-3.345-5.625l-0.002-0.002-1.373-1.333c-0.324 1.203-0.511 2.585-0.511 4.010 0 8.837 7.163 16 16 16s16-7.163 16-16c0-4.426-1.797-8.433-4.702-11.33l-0-0z"></path>
                                                </svg>
                                            </use>
                                        @elseif(strtolower($event->name) == "table tennis")
                                            <use xlink:href="#icon-{{strtolower($event->name)}}">
                                                <svg id="icon-{{strtolower($event->name)}}" viewBox="0 0 32 32">
                                                    <path d="M25.198 13.001c0.002 0.010 0.004 0.021 0.004 0.033s-0.001 0.023-0.004 0.034l0-0.001z"></path>
                                                    <path d="M23.625 20.681c1.071-1.695 1.707-3.758 1.707-5.97 0-0.58-0.044-1.15-0.128-1.706l0.008 0.063-12.147 12.147c0.477 0.076 1.026 0.12 1.585 0.12 0.005 0 0.010 0 0.015 0h-0.001c0.004 0 0.008 0 0.013 0 2.225 0 4.3-0.646 6.046-1.76l-0.045 0.027 7.32 8.4 4-4z"></path>
                                                    <path d="M20.865 4.468v0c-5.333-5.333-13.333-5.987-17.853-1.453s-3.88 12.52 1.453 17.853c1.625 1.62 3.617 2.873 5.84 3.622l0.107 0.031 14.147-14.093c-0.793-2.337-2.058-4.333-3.693-5.959l-0.001-0.001zM6.665 16.001c-2.209 0-4-1.791-4-4s1.791-4 4-4c2.209 0 4 1.791 4 4v0c0 2.209-1.791 4-4 4v0z"></path>
                                                </svg>
                                            </use>
                                        @elseif(strtolower($event->name) == "counter-strike")
                                            <use xlink:href="#icon-{{strtolower($event->name)}}">
                                                <svg id="icon-{{strtolower($event->name)}}" viewBox="0 0 32 32">
                                                    <path d="M13.235 0h0.855c0.646 0.264 1.202 0.574 1.715 0.942l-0.025-0.017c0.165 0.7 0.455 1.45 0.205 2.17-0.22 0.161-0.473 0.296-0.744 0.393l-0.021 0.007c0.030 0.275 0.075 0.55 0.12 0.825 0.568-0.073 1.056-0.164 1.536-0.279l-0.096 0.019c0.035-0.313 0.129-0.597 0.271-0.851l-0.006 0.011c0.040 0.195 0.070 0.39 0.095 0.585 0.223 0.188 0.508 0.309 0.821 0.33h0.004c2 0 4 0 6.035 0 0.225 0 0.33 0.215 0.5 0.335 0-0.425 0-0.85 0-1.28h0.235c-0.003 0.069-0.005 0.15-0.005 0.232 0 0.316 0.029 0.624 0.085 0.924l-0.005-0.031c0.097 0.022 0.215 0.039 0.335 0.049l0.010 0.001c0 0.145 0 0.295 0 0.44 0.211 0.017 0.457 0.027 0.705 0.027 0.405 0 0.804-0.026 1.196-0.077l-0.046 0.005c0.186-0.016 0.403-0.024 0.622-0.024s0.436 0.009 0.651 0.026l-0.028-0.002c0.009 0.164 0.025 0.316 0.048 0.465l-0.003-0.025c-0.231 0.029-0.499 0.045-0.77 0.045s-0.539-0.016-0.802-0.048l0.032 0.003c-0.82-0.1-1.635 0.075-2.455 0.030 0 0.11-0.055 0.22-0.080 0.33-0.785 0-1.57 0-2.355 0-0.027-0.003-0.059-0.005-0.091-0.005-0.245 0-0.466 0.106-0.619 0.274l-0.001 0.001c-0.235 0.29-0.5 0.535-0.735 0.83 0 0.020 0 0.044 0 0.068 0 0.544 0.095 1.065 0.271 1.548l-0.010-0.032-0.55 0.2c-0.19 0.585-0.115 1.335-0.65 1.745-0.263 0.241-0.556 0.457-0.871 0.642l-0.024 0.013c-0.093 0.023-0.201 0.036-0.311 0.036-0.161 0-0.315-0.028-0.458-0.079l0.010 0.003c-0.92-0.14-1.685-0.705-2.5-1.1-0.055 0.225-0.115 0.445-0.175 0.665 0.25 0.165 0.575 0.3 0.655 0.62 0.036 0.215 0.056 0.463 0.056 0.715s-0.020 0.5-0.060 0.741l0.004-0.026c-0.040 0.435-0.050 0.87-0.095 1.305-0.076 0.433-0.266 0.812-0.537 1.117l0.002-0.002c-0.235-0.055-0.465-0.125-0.695-0.185-0.064 0.157-0.101 0.34-0.101 0.531 0 0.423 0.181 0.803 0.47 1.068l0.001 0.001c1.070 1.165 1.65 2.665 2.195 4.125 0.095 0.31 0.41 0.5 0.465 0.82 0.115 0.312 0.183 0.673 0.185 1.049v0.001c-0.040 0.635-0.085 1.27-0.15 1.905-0.069 0.297-0.109 0.639-0.109 0.989 0 0.125 0.005 0.249 0.015 0.372l-0.001-0.016c0.051 0.175 0.081 0.375 0.081 0.582s-0.029 0.408-0.084 0.598l0.004-0.015c-0.126 0.368-0.199 0.792-0.199 1.233 0 0.094 0.003 0.187 0.010 0.279l-0.001-0.012c-0.004 0.038-0.006 0.082-0.006 0.127 0 0.308 0.098 0.594 0.264 0.828l-0.003-0.004c0.268 0.354 0.548 0.668 0.852 0.957l0.003 0.003c0.4 0.26 0.95 0.265 1.28 0.64 0.025 0.101 0.039 0.216 0.039 0.335s-0.014 0.234-0.041 0.345l0.002-0.010c-0.372 0.072-0.799 0.113-1.236 0.113-0.675 0-1.326-0.098-1.942-0.28l0.048 0.012c-0.57-0.185-1.2 0.135-1.74-0.18 0.041-0.692 0.19-1.337 0.43-1.937l-0.015 0.042c0.022-0.182 0.034-0.392 0.034-0.605 0-0.681-0.126-1.332-0.357-1.932l0.012 0.037c-0.19-0.745-0.307-1.604-0.325-2.488v-0.012c-0.050-0.415 0.3-0.725 0.315-1.13 0.019-0.082 0.030-0.177 0.030-0.274 0-0.272-0.086-0.524-0.233-0.73l0.003 0.004c-0.39 0-0.91 0.090-1.125-0.325-0.455-0.67-0.89-1.35-1.345-2-0.155-0.29-0.535-0.225-0.79-0.35-0.207-0.221-0.375-0.482-0.494-0.768l-0.006-0.017c-0.079 0.31-0.225 0.579-0.422 0.802l0.002-0.002c-0.304 0.374-0.538 0.819-0.674 1.304l-0.006 0.026c-0.131 0.297-0.236 0.643-0.296 1.004l-0.004 0.026c-0.050 0.27-0.060 0.585-0.305 0.76-0.355 0.27-0.5 0.725-0.805 1-0.226 0.23-0.389 0.522-0.463 0.848l-0.002 0.012c0.010 0.129 0.015 0.28 0.015 0.433s-0.005 0.303-0.016 0.453l0.001-0.020c-0.198 0.577-0.411 1.062-0.658 1.527l0.028-0.057c-0.15 0.345-0.23 0.715-0.395 1.055-0.105 0.235-0.385 0.31-0.54 0.5-0.309 0.533-0.491 1.173-0.491 1.856 0 0.247 0.024 0.489 0.069 0.723l-0.004-0.024c0.103 0.229 0.163 0.496 0.163 0.777 0 0.105-0.008 0.208-0.024 0.309l0.001-0.011c-0.275 0.035-0.545 0.080-0.82 0.105h-0.85c-0.242-0.034-0.461-0.099-0.665-0.191l0.015 0.006c-0.068-0.218-0.107-0.468-0.107-0.727s0.039-0.51 0.112-0.745l-0.005 0.018c0.2-0.71 0.38-1.425 0.56-2.135 0.12-0.35-0.17-0.665-0.14-1 0.039-0.518 0.221-0.988 0.505-1.378l-0.005 0.008c0.215-0.385 0.14-0.845 0.29-1.245 0.34-0.88 1-1.59 1.365-2.445 0.023-0.161 0.036-0.348 0.036-0.538s-0.013-0.376-0.038-0.559l0.002 0.021c0.056-0.749 0.155-1.433 0.298-2.101l-0.018 0.101c0.033-0.118 0.052-0.253 0.052-0.392s-0.019-0.275-0.055-0.403l0.003 0.011c-0.091-0.223-0.144-0.481-0.144-0.752 0-0.068 0.003-0.135 0.010-0.201l-0.001 0.008c0.040-0.3-0.135-0.595 0-0.885s0.285-0.385 0.465-0.535c0.035-1-0.335-2-0.18-3 0.203-0.191 0.454-0.333 0.733-0.407l0.012-0.003-1.080-0.23c-0.001-0.030-0.001-0.065-0.001-0.1 0-0.394 0.046-0.776 0.133-1.143l-0.007 0.034c0.135-0.62 0.060-1.265 0.16-1.89 0-0.16 0.19-0.215 0.325-0.22 0.363-0.013 0.707-0.055 1.041-0.122l-0.041 0.007c-0.066-0.359-0.103-0.771-0.103-1.192s0.038-0.834 0.109-1.235l-0.006 0.042c0.133-0.991 0.628-1.846 1.344-2.445l0.006-0.005c0.535-0.36 1.31-0.575 1.875-0.14l0.18-0.125c-0.125-0.319-0.197-0.689-0.197-1.076 0-0.596 0.172-1.153 0.47-1.621l-0.007 0.012c0.358-0.503 0.877-0.871 1.482-1.031l0.018-0.004zM18.5 6.045c-0.002 0.24-0.128 0.45-0.317 0.568l-0.003 0.002c0.316-0.007 0.619-0.037 0.915-0.090l-0.035 0.005c0-0.165 0-0.335 0-0.5h-0.54zM17.91 6.68l-0.1 0.13c0.102 0.32 0.25 0.597 0.439 0.841l-0.005-0.006c0.225-0.32 0.455-0.635 0.67-0.965-0.15-0.012-0.324-0.019-0.5-0.019s-0.35 0.007-0.523 0.020l0.023-0.001z"></path>
                                                </svg>
                                            </use>
                                        @elseif(strtolower($event->name) == "badminton")
                                            <use xlink:href="#icon-{{strtolower($event->name)}}">
                                                <svg id="icon-{{strtolower($event->name)}}" viewBox="0 0 32 32">
                                                    <path d="M30.28 23.093c-0.127-0.089-0.283-0.143-0.452-0.147h-0.001c-0.267 0.015-0.507 0.119-0.695 0.281l0.001-0.001-5.693 5.333c-0.305 0.206-0.504 0.551-0.504 0.942 0 0.247 0.079 0.475 0.213 0.661l-0.002-0.003c0.836 0.983 2.031 1.637 3.381 1.759l0.019 0.001h0.427c0 0 0.001 0 0.001 0 2.776 0 5.027-2.25 5.027-5.027 0-1.508-0.664-2.86-1.715-3.782l-0.006-0.005z"></path>
                                                    <path d="M27.587 21.493v0c0.223-0.238 0.36-0.559 0.36-0.912 0-0.012-0-0.025-0-0.037l0 0.002c-0.008-0.339-0.081-0.658-0.206-0.95l0.006 0.017-4.4-11.893-1.747-4.893s0-0.093 0-0.147l-0.093-0.253c-0.59-1.344-1.886-2.277-3.406-2.333l-0.007-0c-0.069-0.006-0.149-0.010-0.23-0.010-1.473 0-2.667 1.194-2.667 2.667 0 0.495 0.135 0.958 0.37 1.356l-0.007-0.012 7.080 13.613c0.049 0.090 0.078 0.197 0.078 0.31 0 0.253-0.144 0.473-0.355 0.581l-0.004 0.002c-0.087 0.050-0.192 0.080-0.303 0.080-0.001 0-0.003 0-0.004 0h0c-0.254-0.002-0.474-0.146-0.585-0.356l-0.002-0.004-7.693-13.707c-0.282-0.53-0.832-0.885-1.464-0.885-0.172 0-0.338 0.026-0.494 0.075l0.012-0.003c-1.399 0.484-2.419 1.71-2.598 3.195l-0.002 0.018s0 0 0 0c-0.050 0.277-0.29 0.485-0.578 0.485-0.027 0-0.053-0.002-0.079-0.005l0.003 0h-0.213c-0.050-0.002-0.108-0.004-0.167-0.004-1.38 0-2.59 0.731-3.263 1.827l-0.010 0.017c-0.175 0.263-0.279 0.587-0.279 0.934 0 0.56 0.27 1.058 0.687 1.369l0.005 0.003 13.067 9.827c0.163 0.123 0.267 0.316 0.267 0.533 0 0.151-0.050 0.29-0.135 0.402l0.001-0.002c-0.124 0.161-0.316 0.264-0.533 0.267h-0c-0.001 0-0.003 0-0.004 0-0.149 0-0.287-0.050-0.397-0.134l0.002 0.001-13.013-9.613c-0.462-0.361-1.052-0.579-1.692-0.579-0.904 0-1.706 0.434-2.209 1.106l-0.005 0.007c-0.394 0.556-0.643 1.239-0.68 1.978l-0 0.009v0.187c0.002 1.551 0.92 2.888 2.243 3.497l0.024 0.010 0.213 0.107 17.333 8.093c0.175 0.114 0.39 0.182 0.62 0.182 0.271 0 0.519-0.094 0.715-0.251l-0.002 0.002 6.507-5.76z"></path>
                                                </svg>
                                            </use>
                                        @elseif(strtolower($event->name) == "volleyball")
                                            <use xlink:href="#icon-{{strtolower($event->name)}}">
                                                <svg id="icon-{{strtolower($event->name)}}" viewBox="0 0 32 32">
                                                    <path d="M4.88 4.494c2.875-2.782 6.797-4.496 11.12-4.496 3.446 0 6.638 1.089 9.249 2.943l-0.050-0.033c-0.187 0.44-0.373 0.867-0.587 1.333s-0.32 0.627-0.507 0.947c-3.085-1.187-6.655-1.875-10.385-1.875-0.394 0-0.787 0.008-1.177 0.023l0.056-0.002c-2.815 0.152-5.456 0.566-8.001 1.221l0.281-0.061zM1.8 8.614c3.219-1.149 6.945-1.925 10.815-2.167l0.118-0.006c0.381-0.019 0.826-0.030 1.275-0.030 3.012 0 5.906 0.499 8.607 1.419l-0.188-0.056c-0.453 0.667-0.96 1.333-1.493 2.013-2.191-0.421-4.71-0.662-7.285-0.662-1.444 0-2.871 0.076-4.276 0.223l0.175-0.015c-3.269 0.338-6.257 0.996-9.109 1.953l0.296-0.086c0.319-1.004 0.68-1.86 1.109-2.676l-0.043 0.089zM32 17.214c-0.868 0.948-1.773 1.819-2.73 2.631l-0.043 0.036c-0.387-0.84-0.813-1.667-1.333-2.493 1.363-1.398 2.605-2.928 3.7-4.564l0.073-0.116c0.212 0.99 0.333 2.127 0.333 3.293v0c0 0.413 0 0.813 0 1.213zM30.427 22.934v0 0zM30.333 8.881l-0.147 0.267c-1.164 2.119-2.491 3.948-4.016 5.591l0.016-0.018c-0.853-1.080-1.653-2.16-2.587-3.227 1.376-1.722 2.634-3.657 3.695-5.711l0.092-0.196c0.093-0.187 0.187-0.36 0.267-0.547 1.043 1.106 1.936 2.37 2.638 3.748l0.042 0.092zM28.16 26.401c-1.641 1.915-3.701 3.422-6.041 4.388l-0.106 0.039c-0.825-1.241-1.617-2.671-2.294-4.165l-0.079-0.195c-1.854-4.095-3.304-8.854-4.115-13.828l-0.045-0.332c1.984 0.127 3.813 0.368 5.6 0.724l-0.266-0.044c2.438 2.606 4.463 5.639 5.944 8.967l0.082 0.207c0.501 1.185 0.955 2.602 1.287 4.064l0.033 0.176zM0 14.734c1.080-0.4 2.16-0.747 3.227-1.053 0.146 4.259 1.004 8.275 2.458 11.993l-0.085-0.246c0.596 1.64 1.167 2.96 1.802 4.242l-0.109-0.242c-4.417-2.896-7.293-7.824-7.293-13.424 0-0.001 0-0.002 0-0.003v0c0-0.427 0-0.84 0-1.267zM12.267 12.241c0.913 5.809 2.494 11.028 4.69 15.911l-0.157-0.391c0.724 1.596 1.422 2.908 2.191 4.173l-0.098-0.173c-0.828 0.153-1.781 0.241-2.754 0.241-0.049 0-0.098-0-0.147-0.001l0.008 0c-1.393-0.003-2.744-0.178-4.034-0.505l0.114 0.024c-1.352-2.059-2.535-4.423-3.433-6.924l-0.074-0.236c-1.347-3.39-2.146-7.316-2.187-11.423l-0-0.017q1.76-0.347 3.48-0.52c0.8-0.080 1.613-0.133 2.453-0.16z"></path>
                                                </svg>
                                            </use>
                                        @elseif(strtolower($event->name) == "cricket")
                                            <use xlink:href="#icon-{{strtolower($event->name)}}">
                                                <svg id="icon-{{strtolower($event->name)}}" viewBox="0 0 32 32">
                                                    <path d="M4 5.48c0.28-0.32 0.573-0.64 0.88-0.933 5.438 0.271 10.371 2.236 14.332 5.373l-0.052-0.040c4.613 3.863 8.205 8.795 10.41 14.424l0.084 0.243c-0.284 0.461-0.552 0.848-0.838 1.221l0.025-0.034c-2.282-5.492-5.65-10.126-9.864-13.817l-0.043-0.037c-4.062-3.439-9.18-5.75-14.805-6.388l-0.128-0.012zM1.907 8.413c5.763 0.262 10.974 2.43 15.064 5.884l-0.037-0.031c4.172 3.7 7.43 8.338 9.453 13.588l0.081 0.238c-2.789 2.424-6.457 3.901-10.47 3.901-8.837 0-16-7.163-16-16 0-2.777 0.708-5.389 1.952-7.665l-0.042 0.084zM8.573 1.84c2.153-1.151 4.71-1.827 7.425-1.827 8.837 0 16 7.163 16 16 0 1.66-0.253 3.262-0.722 4.767l0.030-0.113c-2.457-5.312-5.941-9.769-10.228-13.281l-0.065-0.052c-3.473-2.736-7.699-4.675-12.316-5.47l-0.164-0.023z"></path>
                                                </svg>
                                            </use>
                                        @elseif(strtolower($event->name) == "electronic leagues")
                                            <use xlink:href="#icon-{{strtolower($event->name)}}">
                                                <svg id="icon-{{strtolower($event->name)}}" viewBox="0 0 32 32">
                                                    <path d="M8.405 21.155c1.394-1.516 2.248-3.547 2.248-5.778 0-0.166-0.005-0.331-0.014-0.494l0.001 0.023c1.89-2.932 3.013-6.514 3.013-10.357 0-0.245-0.005-0.49-0.014-0.733l0.001 0.035c-0.31-5.54-7.075-1.705-9.75 2.245-2.24 3.187-3.662 7.095-3.888 11.32l-0.002 0.055c1.184-5.444 4.799-9.858 9.624-12.115l0.106-0.045c0.002 0.085 0.002 0.186 0.002 0.286 0 2.931-0.755 5.685-2.081 8.079l0.044-0.086c-1.583 0.031-3.046 0.514-4.275 1.324l0.030-0.019c-0.586 0.37-0.969 1.014-0.969 1.747 0 0.3 0.064 0.584 0.179 0.841l-0.005-0.013-2.155 1.86c-0.159 0.14-0.258 0.343-0.258 0.57 0 0.419 0.339 0.758 0.758 0.758 0.192 0 0.367-0.071 0.501-0.189l-0.001 0.001 2-1.75 0.96 1.305-2.030 1.74c-0.161 0.138-0.263 0.342-0.263 0.57 0 0.414 0.336 0.75 0.75 0.75 0.004 0 0.009-0 0.013-0h-0.001c0.004 0 0.009 0 0.014 0 0.187 0 0.357-0.070 0.487-0.186l-0.001 0.001 2-1.69c0.374 0.373 0.891 0.603 1.461 0.603 0.597 0 1.135-0.253 1.513-0.657l0.001-0.001z"></path>
                                                    <path d="M28.595 23.5l-2.465-0.77c0.037-0.147 0.058-0.315 0.058-0.488 0-1.023-0.735-1.874-1.705-2.055l-0.013-0.002c-0.471-0.091-1.012-0.144-1.565-0.144-1.848 0-3.56 0.584-4.961 1.577l0.027-0.018c-0.030-0-0.065-0-0.101-0-4.053 0-7.816 1.245-10.926 3.373l0.066-0.043c-4.51 3.17 2.305 6.875 7.075 7.070 0.32 0.017 0.695 0.026 1.073 0.026 3.903 0 7.568-1.020 10.742-2.808l-0.11 0.057c-1.759 0.658-3.792 1.038-5.914 1.038-3.556 0-6.862-1.069-9.614-2.903l0.064 0.040c2.294-1.511 5.067-2.479 8.053-2.663l0.047-0.002c0.828 1.259 1.966 2.254 3.306 2.889l0.049 0.021c0.264 0.131 0.574 0.208 0.903 0.208 0.706 0 1.33-0.355 1.702-0.896l0.005-0.007 2.725 0.855c0.066 0.022 0.141 0.035 0.219 0.035 0.002 0 0.004 0 0.006-0h-0c0.414-0.001 0.749-0.336 0.749-0.75 0-0.333-0.217-0.616-0.518-0.713l-0.005-0.002-2.565-0.8 0.595-1.5 2.555 0.805c0.067 0.019 0.145 0.030 0.225 0.030h0c0.405-0.012 0.729-0.343 0.729-0.75 0-0.328-0.211-0.607-0.504-0.709l-0.005-0.002z"></path>
                                                    <path d="M31 10.695c-2.765-6.47-7.46-9.44-7.46-9.44 3.155 3.142 5.108 7.489 5.108 12.292 0 0.874-0.065 1.733-0.189 2.573l0.012-0.095c-2.456-1.546-4.436-3.638-5.806-6.114l-0.044-0.086c0.759-1.21 1.21-2.681 1.21-4.257 0-0.006 0-0.012-0-0.019v0.001c0-0.003 0-0.007 0-0.012 0-1.024-0.745-1.874-1.723-2.037l-0.012-0.002-0.38-2.85c-0.051-0.373-0.367-0.657-0.75-0.657-0.418 0-0.757 0.339-0.757 0.757 0 0.035 0.002 0.070 0.007 0.104l-0-0.004 0.375 2.65-1.59 0.11-0.36-2.645c-0.051-0.373-0.367-0.657-0.75-0.657-0.418 0-0.757 0.339-0.757 0.757 0 0.035 0.002 0.070 0.007 0.104l-0-0.004 0.36 2.56c-0.958 0.204-1.666 1.042-1.666 2.046 0 0.191 0.026 0.377 0.074 0.553l-0.003-0.015c0.609 2.268 2.062 4.124 3.994 5.248l0.041 0.022c1.687 3.583 4.322 6.484 7.583 8.451l0.087 0.049c4.785 2.765 5.235-4.995 3.39-9.385z"></path>
                                                </svg>
                                            </use>
                                        @endif
                                    </svg>
                                    <div class="Badge__StyledBadge-im4ck3-0 iUVkfr styles__Badge-sc-1kg2k2r-1 csAgNu">{{count($event->matches)}}</div>
                                </div>
                                <div class="eageCH">
                                    <span class="jiKQsf">{{$event->name}}</span>
                                </div>
                            </div>
                        </div>
                    </a>
                    @php
                        $first = false;   
                    @endphp
                @endforeach
            </div>
        </div>
    </div>
    <!--  Tournament End  -->

    <div class="vehicles-area home-2">
        <div class="container">
            {{-- <div class="section-title">
                <h2>@lang('PREDICT NOW')</h2>
            </div> --}}
            <div class="row ">
                @include('errors.error')
                @foreach($matches as $match)
                    <div class="col-lg-12 mb-3 match_{{$match->id}}">
                        <!-- Heading Component-->
                        <article class="heading-component ">
                            <div class="heading-component-inner">
                                <h5 class="heading-component-title">{{$match->event->name}}
                                </h5>
                                {{-- <span> {{date('d M, Y', strtotime($match->start_date))}}</span> --}}
                            </div>
                        </article>

                        <div class="sport-table-header">
                            <p class="left">
                                <span>{{$match->name}}</span>
                                <span class="live-match {{$match->is_live == 1 ? 'live' : ''}}">Live</span>
                            </p>
                            <p class="right">
                                <span class="text">{{$match->text}}</span>
                                <span class="float-right site-color countdown"  id="counter{{$match->id}}" ></span>
                            </p>
                            <script>createCountDown('counter<?php echo $match->id ?>', {{\Carbon\Carbon::parse($match->end_date)->diffInSeconds()}});</script>

                        </div>

                        @php
                            $now = Carbon\Carbon::now();
                            $questions = App\BetQuestion::with('match')->whereMatch_id($match->id)->whereStatus(1)->where('end_time','>=', $now)->latest()->get();
                        @endphp


                        @if(count($questions) > 0)
                            @php
                                $question = $questions[0];
                                $betOptions = App\BetOption::with('match','question')->whereQuestion_id($question->id)->whereStatus(1)->latest()->get();
                                if (count($betOptions)>0)
                                    $width = floor(100/count($betOptions));
                                else
                                    $width = 1;
                            @endphp

                            <div class="sport-table">
                                @if(count($betOptions)>0)
                                    <div class="sport-table-tr">
                                        <div class="row sport-row align-items-center justify-content-center">
                                            {{-- <div class="col-md-1 col-lg-1">
                                                <div class="sport-table-icon">
                                                </div>
                                            </div> --}}

                                            <div class="col-md-3 col-lg-2">
                                                <div class="sport-table-title">
                                                    <div class="sport-table-title-item sport-table-title-item-left">
                                                        <span class="sport-table-title-team">  {{$question->question}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-7 col-lg-8">
                                                <div class="sport-table-wager">
                                                    @foreach($betOptions as $data)

                                                        <div class="progress-button-item sport-table-wager-button m-0 bet_option_{{$data->id}}" style="width: {{$width}}%">
                                                            <a class="bet_button text-decoration-none"
                                                               href="#0"
                                                               data-toggle="modal" data-target="#sportModal"
                                                               data-team-name="{{$data->option_name}}"
                                                               data-confrontation="{{$question->match->name}}"
                                                               data-id="{{$data->id}}"
                                                               data-minamo="{{$data->min_amo}}"
                                                               data-macthid="{{$question->match->id}}"
                                                               data-ratioone="{{$data->ratio1}}"
                                                               data-ratiotwo="{{$data->ratio2}}"
                                                               data-betlimit="{{$data->bet_limit}}"
                                                               data-questionid="{{$question->id}}"
                                                               data-wager-count="{{$data->ratio1}} : {{$data->ratio2}}">
                                                                <span class="option-name">{{$data->option_name}}</span>
                                                                <span class="sport-table-wager-button-count">{{$data->ratio1}}
                                                                    : {{$data->ratio2}}</span>
                                                            </a>

                                                            @php
                                                               $percent =  percent($data->totalInvestByOptions(), $question->totalInvest())
                                                            @endphp
                                                            <div class="progress">
                                                                <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: {{$percent}}%;" aria-valuenow="{{$percent}}" aria-valuemin="0" aria-valuemax="100">{{$percent}}%</div>
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                </div>
                                            </div>

                                            <a class="col-md-1 col-lg-1 total-question text-decoration-none" href="javascript:void(0)">
                                                {{count($questions) > 1?'+'.(count($questions)-1): ''}}
                                            </a>

                                        </div>
                                    </div>

                                    <div class="split"></div>
                                {{-- </div> --}}
                                @endif
                                <div class="all-item">
                                    @for($i = 1; $i < count($questions); $i++)
                                        @php
                                            $question = $questions[$i];
                                            $betOptions = App\BetOption::with('match','question')->whereQuestion_id($question->id)->whereStatus(1)->latest()->get();
                                            if (count($betOptions)>0)
                                                $width = floor(100/count($betOptions));
                                            else
                                                $width = 1;
                                        @endphp
                                        @if(count($betOptions)>0)
                                            {{-- <div class="sport-table"> --}}
                                                <div class="sport-table-tr">
                                                    <div class="row sport-row align-items-center justify-content-center">
                                                        {{-- <div class="col-md-1 col-lg-1">
                                                            <div class="sport-table-icon">
                                                            </div>
                                                        </div> --}}

                                                        <div class="col-md-3 col-lg-2">
                                                            <div class="sport-table-title">
                                                                <div class="sport-table-title-item sport-table-title-item-left">
                                                                    <span class="sport-table-title-team">  {{$question->question}}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-7 col-lg-8">
                                                            <div class="sport-table-wager">
                                                                @foreach($betOptions as $data)

                                                                    <div class="progress-button-item sport-table-wager-button m-0 bet_option_{{$data->id}}" style="width: {{$width}}%">
                                                                        <a class="bet_button text-decoration-none"
                                                                           href="#0"
                                                                           data-toggle="modal" data-target="#sportModal"
                                                                           data-team-name="{{$data->option_name}}"
                                                                           data-confrontation="{{$question->match->name}}"
                                                                           data-id="{{$data->id}}"
                                                                           data-minamo="{{$data->min_amo}}"
                                                                           data-macthid="{{$question->match->id}}"
                                                                           data-ratioone="{{$data->ratio1}}"
                                                                           data-ratiotwo="{{$data->ratio2}}"
                                                                           data-betlimit="{{$data->bet_limit}}"
                                                                           data-questionid="{{$question->id}}"
                                                                           data-wager-count="{{$data->ratio1}} : {{$data->ratio2}}">
                                                                            <span class="option-name">{{$data->option_name}}</span>
                                                                            <span class="sport-table-wager-button-count">{{$data->ratio1}}
                                                                                : {{$data->ratio2}}</span>
                                                                        </a>

                                                                        @php
                                                                           $percent =  percent($data->totalInvestByOptions(), $question->totalInvest())
                                                                        @endphp
                                                                        <div class="progress">
                                                                            <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: {{$percent}}%;" aria-valuenow="{{$percent}}" aria-valuemin="0" aria-valuemax="100">{{$percent}}%</div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach

                                                            </div>
                                                        </div>
                                                        <a class="col-md-1 col-lg-1 total-question text-decoration-none" href="javascript:void(0)">
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="split"></div>
                                            {{-- </div> --}}
                                        @endif
                                    @endfor
                                </div>
                            </div>
                        @else
                            <div class="sport-table">
                                <div class="sport-table-tr">
                                    <div class="row sport-row align-items-center ">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <div class="sport-table-icon">
                                                <p class="text-center">@lang('No question available')</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    <section class="about-area about-bg" id="about">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section-title text-white text-uppercase">
                        <h2>@lang('ABOUT') {{__($basic->sitename)}}</h2>
                    </div>
                </div>
            </div>
            <div class="row">

                @foreach($howItWork as $k => $data)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-about-box-item">
                            <div class="icon">
                                <?php echo  $data->icon?>
                            </div>
                            <div class="content">
                                <h3>{{$data->title}}</h3>
                                <p>
                                    {{$data->details}}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>




    <!--  Statistics Area Start  -->
    <div class="statistics-area">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-3 col-sm-6">
                    <div class="single-statistic">
                        <div class="icon-wrapper"><i class="fa fa-users"></i></div>
                        <div class="count">
                            <h2><span class="counter">{{number_format($users)}}</span> +</h2>
                        </div>
                        <span class="title">@lang('Total User')</span>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-statistic">
                        <div class="icon-wrapper"><i class="fas fa-hand-point-up"></i></div>
                        <div class="count">
                            <h2><span class="counter">{{number_format($totalPrediction)}}</span> +</h2>
                        </div>
                        <span class="title">@lang('Total Prediction')</span>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-statistic">
                        <div class="icon-wrapper"><i class="fas fa-wallet"></i></div>
                        <div class="count">
                            <h2><span class="counter">{{number_format(count($gateway))}}</span> +</h2>
                        </div>
                        <span class="title">@lang('Total Gateways')</span>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-statistic">
                        <div class="icon-wrapper"><i class="fas fa-hand-holding-usd"></i></div>
                        <div class="count">
                            <h2><span class="counter">{{$withdraw}}</span> +</h2>
                        </div>
                        <span class="title">@lang('Withdraw Method')</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  Statistics Area End  -->



    <div class="transaction_wrapper float_left smoke_bg ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="section-title ">
                        <h2>@lang('Leader Board')</h2>
                    </div>

                    <div class="x_offer_tabs_wrapper index3_offer_tabs">
                        <ul class="nav nav-tabs">
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#home"> @lang('Weekly')</a>
                            </li>
                            <li class="nav-item"><a class="nav-link active show" data-toggle="tab"
                                                    href="#menu2">@lang('All Time')</a>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="tab-content">
                        <div id="home" class="tab-pane">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="table_next_race index3_table_race league_table overflow-scroll">
                                        <table>
                                            <tbody>
                                            <tr>
                                                <th data-scope="col">@lang('Name')</th>
                                                <th data-scope="col">@lang('Prediction')</th>
                                                <th data-scope="col">@lang('Amount')</th>
                                            </tr>

                                            @foreach($weeklyLeader as $k => $data)
                                                <tr>

                                                    <td data-label="@lang('User')">
                                                        @if($data->user->image == null)
                                                            <img src="{{asset('public/images/user/user-default.jpg')}}" class="leader-img" alt="{{$data->user->username}}">
                                                        @else
                                                            <img src="{{asset('public/images/user/'.$data->user->image)}}" class="leader-img" alt="{{$data->user->username}}">
                                                        @endif
                                                        <span class="font-weight-bold">{{$data->user->username}}</span>
                                                    </td>

                                                    <td data-label="@lang('Prediction')"><span class="font-weight-bold">{{$data->total_predictions}} @lang('Times')</span></td>
                                                    <td data-label="@lang('Amount')"><span class="font-weight-bold">{{$basic->currency_sym}} {{number_format($data->investAmount,$basic->decimal)}}</span></td>

                                                </tr>
                                            @endforeach


                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="menu2" class="tab-pane fade active show">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="table_next_race index3_table_race league_table overflow-scroll">
                                        <table>
                                            <tbody>
                                            <tr>
                                                <th data-scope="col">@lang('Name')</th>
                                                <th data-scope="col">@lang('Prediction')</th>
                                                <th data-scope="col">@lang('Amount')</th>

                                            </tr>

                                            @foreach($leader as $k => $data)
                                                <tr>

                                                    <td data-label="@lang('User')">
                                                        @if($data->user->image == null)
                                                            <img src="{{asset('public/images/user/user-default.jpg')}}" class="leader-img" alt="{{$data->user->username}}">
                                                        @else
                                                            <img src="{{asset('public/images/user/'.$data->user->image)}}" class="leader-img" alt="{{$data->user->username}}">
                                                        @endif
                                                        <span class="font-weight-bold">{{$data->user->username}}</span>
                                                    </td>

                                                    <td data-label="@lang('Prediction')"> <span class="font-weight-bold">{{$data->total_predictions}} @lang('Times')</span></td>
                                                    <td data-label="@lang('Amount')"><span class="font-weight-bold">{{$basic->currency_sym}} {{number_format($data->investAmount,$basic->decimal)}}</span></td>

                                                </tr>
                                            @endforeach

                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>






    <!--  testimonial section start  -->
    <div class="testimonial-section home-3 py-5 smoke_bg ">
        <div class="container">
            <div class="section-title">
                <h2>{{$basic->testimonial_subtitle}}</h2>
            </div>

            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="testimonial-carousel-3 owl-carousel owl-theme">
                        @foreach($testimonials as $data)
                            <div class="single-testimonial">
                                <div class="img-wrapper">

                                    @if($data->image == null)
                                        <img src="{{ asset('public/images/user/default.jpg') }}" class="w-80"
                                             alt="{{$data->name}}">
                                    @else

                                        <img src="{{ asset('public/images/testimonial/'.$data->image)}}"
                                             alt="{{$data->name}}">
                                    @endif


                                </div>
                                <div class="client-desc">
                                    <p class="icon-wrapper"><i class="flaticon-quote-left"></i></p>
                                    <p class="comment">{{$data->details}}</p>
                                    <h5 class="name">{{$data->name}}</h5>
                                    <p class="rank">{{$data->designation}}</p>
                                </div>
                            </div>
                        @endforeach


                    </div>

                </div>
            </div>

            <div class="testimonial-section-overlay"></div>
        </div>

    </div>
    <!--  testimonial section end  -->



    <section class="blog-area gray-bg pt-5">
        <div class="container">

            <div class="section-title mt-5">
                <span>{{__($basic->blog_title)}}</span>
                <h2>{{__($basic->blog_subtitle)}}</h2>
            </div>

            <div class="row">
                @foreach($blogs as $data)
                    <div class="col-lg-6 col-md-6">
                        <div class="single-blog mt-30">
                            <img src="{{asset('public/images/blog/'.$data->image)}}" alt="{{$data->title}}">
                            <div class="blog-content">
                                <div class="blog-user-flex d-flex align-items-center">
                                    <div class="blog-user-info">
                                        <span>By Admin | {{date('d M, Y',strtotime($data->created_at))}}</span>
                                    </div>
                                </div>
                                <div class="blog-item">
                                    <h4 class="title">{{str_limit($data->title,50)}}</h4>
                                    <p>{{str_limit(strip_tags($data->details),120)}}</p>
                                    <a href="{{route('info',[str_slug($data->title), $data->id])}}">@lang('Read More ')
                                        <i class="flaticon-long-right-arrow"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>



    <!--   partner section start    -->
    <div class="partner-section section-padding pt-5 smoke_bg">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section-title text-dark text-uppercase">
                        <h2>@lang('We Accept') </h2>
                    </div>
                </div>
            </div>

            <div class="row pb-5">
                <div class="col-md-12">
                    <div class="partner-carousel owl-carousel owl-theme">
                        @foreach($gateway as $data)
                            <div class="single-partner-item ">
                                <div class="outer-container">
                                    <div class="inner-container">
                                        <img src="{{asset('public/images/gateways/'.$data->image)}}" alt="{{$data->name}}">
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--   partner section end    -->


    <!--    Call to Action Area Start    -->
    <div class="cta-area cta-bg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-10">
                    <h2>@lang('We Are Here To Help You Needs')</h2>
                </div>
                <div class="col-lg-2">
                    <a href="{{route('contact')}}" class="cartbtn cart">@lang('Contact Us')</a>
                </div>
            </div>
        </div>
        <div class="cta-overlay"></div>
    </div>
    <!--    Call to Action Area End    -->


    <div class="modal modal-sport fade" id="sportModal" tabindex="-1" role="dialog" aria-labelledby="sportModalTitle"
         aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title modal-sport-confrontation text-white font-20"
                        id="sportModalTitle">@lang('Prediction Now')</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{route('prediction')}}" method="post">
                    @csrf
                    <div class="modal-body text-center">
                        <p class="modal-sport-wager-title">
                            <span class="modal-sport-wager"></span>
                            <span class="modal-sport-wager-count"></span>
                        </p>

                        <p class="modal-sport-live">
                            <span class="font-weight-bold">@lang('MINIMUM PREDICT AMOUNT') <span
                                    class="minamo"></span> {{__($basic->currency)}}</span>
                        </p>
                        <div class="stepper-sport">
                            <div class='ctrl'>
                                <div class='ctrl__button ctrl__button--decrement'>&ndash;</div>
                                <div class='ctrl__counter'>
                                    <input name="invest_amount"
                                           class='ctrl__counter-input form-input  invest_amount_min ronnie_bet get_amount_for_ratio'
                                           maxlength='10' type='text' value='' min="" max=""
                                           onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')">
                                </div>
                                <div class='ctrl__button ctrl__button--increment'>+</div>
                            </div>
                        </div>


                        <input type="hidden" value="" name="betoption_id" id="betoption_id">
                        <input type="hidden" value="" name="match_id" id="match_id">
                        <input type="hidden" value="" name="betquestion_id" id="questionid">
                        <input class="ratio1" type="hidden" value="" id="ratioOne">
                        <input class="ratio2" type="hidden" value="" id="ratioTwo">
                        <input class="form-control input-lg ronnie_ratio" name="return_amount" type="hidden">
                    </div>
                    <div class="modal-footer">
                        <small>(@lang('IF YOU WIN'))</small>
                        <p class="modal-sport-win">
                            <span class="font-weight-bold">@lang('RETURN AMOUNT')</span>
                            <span class="font-weight-bold"><span class="wining-rate"></span> {{$basic->currency}}</span>
                        </p>
                        <p class="text-danger">{{$basic->win_charge}}% @lang('Charge Apply From This Amount')
                            (@lang('IF YOU WIN')) </p>
                        <p class="text-success">@lang('Maximum') <span
                                class="betlimit"></span>{{$basic->currency}} @lang('Predict in this Option')  </p>

                        @if(Auth::user())
                            <div class="form-element mt-2">
                                <button type="submit"><span>@lang('Predict Now')</span>
                                </button>
                            </div>
                        @else
                            <div class="form-element mt-2">
                                <a href="{{route('login')}}" class="cartbtn cart">@lang('Predict Now')
                                </a>
                            </div>
                        @endif
                    </div>

                </form>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script type="text/javascript" src="{{ asset('public/js/home.js') }}"></script>
    <script>
        (function ($) {
            "use strict";

            $(document).ready(function () {
                $(document).on('click', '.bet_button', function () {
                    var id = $(this).data('id');
                    var minamo = $(this).data('minamo');
                    var macthid = $(this).data('macthid');
                    var ratioone = $(this).data('ratioone');
                    var ratiotwo = $(this).data('ratiotwo');
                    var questionid = $(this).data('questionid');
                    var betlimit = $(this).data('betlimit');
                    console.log(minamo)
                    $('#betoption_id').val(id);
                    $("#match_id").val(macthid);
                    $("#ratioOne").val(ratioone);
                    $("#ratioTwo").val(ratiotwo);
                    $("#questionid").val(questionid);

                    $(".get_amount_for_ratio").val(minamo);
                    $('.minamo').text(minamo);
                    $('.betlimit').text(betlimit);
                    $('.ctrl__counter-input').attr('value', minamo)
                    $('.ctrl__counter-input').attr('min', minamo)
                    $('.ctrl__counter-num').text(minamo)
                    $('.ctrl__counter-input').attr('max', betlimit)

                    var amount = $('.get_amount_for_ratio').val();
                    var ratio1 = $('.ratio1').val();
                    var ratio2 = $('.ratio2').val();
                    var finalRation = parseFloat((amount * ratio2) / ratio1).toFixed(2);
                    $('.ronnie_ratio').val(finalRation);
                    $('.wining-rate').text(finalRation);
                });


                $(document).on('keyup change click', '.get_amount_for_ratio', function () {
                    var amount = $('.get_amount_for_ratio').val();
                    var ratio1 = $('.ratio1').val();
                    var ratio2 = $('.ratio2').val();
                    var finalRation = parseFloat((amount * ratio2) / ratio1).toFixed(2);
                    $('.ronnie_ratio').val(finalRation);
                    $('.wining-rate').text(finalRation);
                });
            });

        })(jQuery);

    </script>
@stop