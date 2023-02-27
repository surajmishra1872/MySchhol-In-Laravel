@extends('layouts.app')
@section('title', 'Video Gallery')
@section('content')
<div class="container-fluid">
    <div class="px-lg-5">

        <!-- For demo purpose -->
        <div class="row py-5 ">
            <div class="col-lg-12 mx-auto">
                <div class="text-white p-5 shadow-sm rounded banner">
                    <h1 class="display-4">Our Video gallery</h1>
                    <p class="lead">Here you can seen our video gallery.</p>
                    <div class="row">
                        <div class="col-12 col-md-10">
                            <h2>For latest videos subscribe our channel</h2>
                        </div>
                        <div class="col-12 col-md-2 ">
                            <div class="g-ytsubscribe" data-channelid="UC5oZJLR8OUPyJIFodBIqE-A" data-theme="dark"
                                data-layout="full" data-count="default">
                            </div>
                        </div>
                    </div>
                    </span>
                </div>
            </div>
        </div>
        <!-- End -->
        <div class="row">

            <!-- Gallery item -->
            @if(!empty($videoData))
            @foreach($videoData as $vidkey=>$vidVal)
            @php
            $string =$vidVal->video_embed_url;
            $parts = explode('/', $string);
            $last = array_pop($parts);
            @endphp
            <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                <div class="bg-white rounded shadow-sm">
                    <iframe width="100%" height="200px"
                        src={{$vidVal->video_embed_url.'?playlist='.$last.'&autoplay=1&mute=1&loop=1'}}>;
                    </iframe>
                    <div class="p-4">
                        <h5> <a href="#" class="text-dark">{{$vidVal->video_name ?? ''}}</a></h5>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
            <!-- End -->
        </div>
        <div class="py-5 text-right"><a href="#" class="btn btn-dark px-5 py-3 text-uppercase">Show me more</a></div>
    </div>
</div>
@push('scripts')
<script src="https://apis.google.com/js/platform.js"></script>
@endpush
@endsection