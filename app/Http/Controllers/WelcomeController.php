<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use App\Models\Facilities;
use App\Models\Slider;
use App\Models\Album;
use App\Models\AlbumGallery;
use App\Models\Enquiry;
use App\Models\Notification;
use App\Models\Result;
use App\Models\Reviews;
use App\Models\Teachers;
use App\Models\VideoGallery;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facilitiesData=Facilities::where('status',1)->get();
        $sliderData=Slider::where('status',1)->get();
        $resultData=Result::where('status',1)->get();
        $reviewData=Reviews::where('status',1)->orderBy('created_at', 'desc')->get();
        $notificationData=Notification::where('status',1)->orderBy('created_at', 'desc')->get();
        return view('welcome',compact('facilitiesData','sliderData','resultData','reviewData','notificationData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function webAlbum()
    {
        $album_data=Album::where('status',1)->get();
        return view('components.gallery',compact('album_data'));
    }

    public function webGallery($album_id)
    {
        $gallery_data=AlbumGallery::where('album_id',$album_id)->where('status',1)->get();
        return view('components.subgallery',compact('gallery_data'));
    }

    public function contactUs()
    {
        return view('components.conatact_us');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function contactStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:190',
            'phone' => 'required|max:12|min:10',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);
        
        if ($validator->fails()) return response()->json(['status' => 400,'error' => $validator->messages()]);
      
        $contactusdata = $request->all();
        Enquiry::create($contactusdata);
        return response()->json(['status' => 200,'message' => "SEND_SUCCESSFULLY"]);
    }

    
    public function aboutUs()
    {
        $teacherList=Teachers::where('status',1)->get();
        return view('components.about-us',compact('teacherList'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storeReview(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'unique:clg_reviews',
            'message' => 'required|string',
            'position' => 'required',
            'image' => 'mimes:jpeg,jpg,png|max:500',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'error' => $validator->messages(),
            ]);
        } else {
            $reviewData=$request->except('image','_token');
            if ($request->hasFile('image')) {
                $review_image = $request->file('image');
                $filename = time() . '.' . $review_image->getClientOriginalExtension();
                $path =$review_image->move(public_path('Review'), $filename);
                $reviewData['image']=$filename;
            }
            Reviews::create($reviewData);
            return response()->json([
                'status' => 200,
                'message' => "Send Successfully",
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function videoGallery(Request $request)
    {
        $videoData=VideoGallery::where('status',1)->orderBy('created_at', 'desc')->get();
        return view('components.video-gallery',compact('videoData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function OurResults()
    {
        $result=Result::where('status',1)->get();
        // dd($result);
        return view('components.result-gallery',compact('result'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
