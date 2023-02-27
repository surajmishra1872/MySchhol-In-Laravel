@extends('layouts.adminapp')
@section('title', 'Dashboard')
@section('AdminContent')<!-- Small boxes (Stat box) -->
@php
    $colorArray = array('Slider' =>'bg-info' ,'Album'=>'bg-warning','Images'=>'bg-success','Enquiry'=>'bg-danger',
    'External Links'=>'bg-success','Facilities'=>'bg-primary','Notification'=>'bg-danger','Result'=>'bg-success',
    'Reviews'=>'bg-danger','VideoGallery'=>'bg-warning','Teachers'=>'bg-info');

    $linksArray = array('Slider' =>'slider' ,'Album'=>'album','Images'=>'album','Enquiry'=>'enquirylists',
    'External Links'=>'linklists','Facilities'=>'facilities','Notification'=>'notification-list','Result'=>'student-results',
    'Reviews'=>'reviews-list','VideoGallery'=>'video-gallerylist','Teachers'=>'teacherlist');
@endphp

<div class="row">
  @foreach (allDbCount() as $countKey=>$countVal)
  <div class="col-lg-3 col-6 ">
    <!-- small box -->
    <div class="small-box {{$colorArray[$countKey]}}">
      <div class="inner">
        <h3 class="text-white">{{$countVal}} </h3>

        <p class="text-white"><b>{{$countKey}}</b> In Database</p>
      </div>
      <div class="icon">
        <i class="ion ion-bag"></i>
      </div>
      <a href="{{url('admin/'.$linksArray[$countKey])}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  @endforeach
  </div>
  <!-- /.row -->

 @endsection