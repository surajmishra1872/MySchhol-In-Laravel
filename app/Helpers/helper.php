<?php
use App\Models\Slider;
use App\Models\Album;
use App\Models\AlbumGallery;
use App\Models\Enquiry;
use App\Models\ExternalLinks;
use App\Models\Facilities;
use App\Models\Notification;
use App\Models\Result;
use App\Models\Reviews;
use App\Models\VideoGallery;
use App\Models\Teachers;

if (!function_exists('allDbCount')) {
    function allDbCount()
    {
        $dbcount=[];
        $dbcount['Slider']=Slider::all()->count();
        $dbcount['Album']=Album::all()->count();
        $dbcount['Images']=AlbumGallery::all()->count();
        $dbcount['Enquiry']=Enquiry::all()->count();
        $dbcount['External Links']=ExternalLinks::all()->count();
        $dbcount['Facilities']=Facilities::all()->count();
        $dbcount['Notification']=Notification::all()->count();
        $dbcount['Result']=Result::all()->count();
        $dbcount['Reviews']=Reviews::all()->count();
        $dbcount['VideoGallery']=VideoGallery::all()->count();
        $dbcount['Teachers']=Teachers::all()->count();

        return $dbcount;
    }
}


