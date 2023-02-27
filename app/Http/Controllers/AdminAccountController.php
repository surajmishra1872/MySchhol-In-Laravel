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
use App\Models\VideoGallery;
use App\Models\ExternalLinks;
use App\Models\Teachers;
use File;

class AdminAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function enquiryLists()
    {
        $enquiryData = Enquiry::latest()->paginate(8);
        return view('Admin.enquiry-list', compact('enquiryData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Facilities()
    {
        $FacData = Facilities::latest()->paginate(3);
        return view('Admin.facilities', compact('FacData'));
    }

    public function addFacilities()
    {
        return view('Admin.add-facilities');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeFacilities(Request $request)
    {
      
        $validated = $request->validate([
            'feature_image' => 'mimes:jpeg,jpg,png|max:500',
        ]);

        $storeFacilitiesData = $request->except('feature_image');
        if ($request->hasFile('feature_image')) {
            $feature_image = $request->file('feature_image');
            $filename = time() . '.' . $feature_image->getClientOriginalExtension();
            $path = $feature_image->move(public_path('facilities'), $filename);
            $storeFacilitiesData['feature_image'] = $filename;
        }
        Facilities::create($storeFacilitiesData);
        return redirect('/admin/facilities');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteFacilities(Request $request)
    {
        $dltfac = Facilities::where('facilities_id', $request->facilities_id)->first();
        if (File::exists(public_path('facilities/' . $dltfac->feature_image))) {
            File::delete(public_path('facilities/' . $dltfac->feature_image));
        }
        Facilities::where('facilities_id', $request->facilities_id)->delete();
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editFacilities($id)
    {
        $edit_fac_data = Facilities::where('facilities_id', $id)->first();
        return view('Admin.edit-facilities', compact('edit_fac_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateFacilities(Request $request, $id)
    {
        $validated = $request->validate([
            'feature_image' => 'mimes:jpeg,jpg,png|max:500',
        ]);

        $updateFacilitiesData = $request->except('feature_image', '_token');
        if ($request->hasFile('feature_image')) {
            $feature_image = $request->file('feature_image');
            $filename = time() . '.' . $feature_image->getClientOriginalExtension();
            $path = $feature_image->move(public_path('facilities'), $filename);
            $updateFacilitiesData['feature_image'] = $filename;
        }
        Facilities::where('facilities_id', $id)->update($updateFacilitiesData);
        return redirect('/admin/facilities');
    }

    public function changeFacilitiesStatus(Request $request)
    {
        $sId = $request->facilities_id;
        $facility_status = Facilities::where('facilities_id', $sId)->first();
        if ($facility_status->status == 1) {
            Facilities::where('facilities_id', $sId)->update([
                'status' => 0
            ]);
        } else {
            Facilities::where('facilities_id', $sId)->update([
                'status' => 1
            ]);
        }
        return back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Slider()
    {
        $slider_data = Slider::latest()->paginate(3);
        return view('Admin.slider', compact('slider_data'));
    }

    public function addSlider()
    {
        return view('Admin.add-slider');
    }

    // Add Slider
    public function storeSlider(Request $request)
    {
        $validated = $request->validate([
            'slider_image' => 'mimes:jpeg,jpg,png|max:1030',
        ]);


        $storeSliderData = $request->except('slider_image');
        if ($request->hasFile('slider_image')) {
            $slider_image = $request->file('slider_image');
            $filename = time() . '.' . $slider_image->getClientOriginalExtension();
            $path = $slider_image->move(public_path('slider'), $filename);
            $storeSliderData['slider_image'] = $filename;
        }
        Slider::create($storeSliderData);
        return redirect('/admin/slider');
    }

    public function editSlider($id)
    {
        $edit_slide_data = Slider::where('slider_id', $id)->first();
        return view('Admin.edit-slider', compact('edit_slide_data'));
    }

    public function updateSlider(Request $request, $id)
    {
        $validated = $request->validate([
            'slider_image' => 'mimes:jpeg,jpg,png|max:1030',
        ]);

        $updateSliderData = $request->except('slider_image', '_token');
        if ($request->hasFile('slider_image')) {
            $slider_image = $request->file('slider_image');
            $filename = time() . '.' . $slider_image->getClientOriginalExtension();
            $path = $slider_image->move(public_path('slider'), $filename);
            $updateSliderData['slider_image'] = $filename;
        }
        Slider::where('slider_id', $id)->update($updateSliderData);
        return redirect('/admin/slider');
    }

    public function deleteSlider(Request $request)
    {

        $dltSlider = Slider::where('slider_id', $request->slider_id)->first();
        if (File::exists(public_path('slider/' . $dltSlider->slider_image))) {
            File::delete(public_path('slider/' . $dltSlider->slider_image));
        }
        Slider::where('slider_id', $request->slider_id)->delete();
        return back();
    }

    public function changeSliderstatus(Request $request)
    {
        $sId = $request->slider_id;
        $slider_status = Slider::where('slider_id', $sId)->first();
        // dd($slider_status);
        if ($slider_status->status == 1) {
            Slider::where('slider_id', $sId)->update([
                'status' => 0
            ]);
        } else {
            Slider::where('slider_id', $sId)->update([
                'status' => 1
            ]);
        }
        return back();
    }

    public function albumList()
    {
        $albumData = Album::latest()->paginate(3);
        return view('Admin.album', compact('albumData'));
    }

    public function addAlbum()
    {
        return view('Admin.add-album');
    }

    public function storeAlbum(Request $request)
    {
        $validated = $request->validate([
            'album_image' => 'mimes:jpeg,jpg,png|max:500',
        ]);

        $storeAlbumData = $request->except('album_image');
        if ($request->hasFile('album_image')) {
            $album_image = $request->file('album_image');
            $filename = time() . '.' . $album_image->getClientOriginalExtension();
            $path = $album_image->move(public_path('Album'), $filename);
            $storeAlbumData['album_image'] = $filename;
        }
        Album::create($storeAlbumData);
        return redirect('/admin/album');
    }

    public function editAlbum($id)
    {
        $edit_album_data = Album::where('album_id', $id)->first();
        return view('Admin.edit-album', compact('edit_album_data'));
    }

    public function updateAlbum(Request $request, $id)
    {
        $validated = $request->validate([
            'album_image' => 'mimes:jpeg,jpg,png|max:500',
        ]);

        $updateAlbumData = $request->except('album_image', '_token');
        if ($request->hasFile('album_image')) {
            $album_image = $request->file('album_image');
            $filename = time() . '.' . $album_image->getClientOriginalExtension();
            $path = $album_image->move(public_path('Album'), $filename);
            $updateAlbumData['album_image'] = $filename;
        }
        Album::where('album_id', $id)->update($updateAlbumData);
        return redirect('/admin/album');
    }

    public function deleteAlbum(Request $request)
    {
        $dltalbum = Album::where('album_id', $request->album_id)->first();
        if (File::exists(public_path('Album/' . $dltalbum->album_image))) {
            File::delete(public_path('Album/' . $dltalbum->album_image));
        }
        Album::where('album_id', $request->album_id)->delete();
        return back();
    }

    public function changeAlbumstatus(Request $request)
    {
        $sId = $request->album_id;
        $album_status = Album::where('album_id', $sId)->first();
        // dd($slider_status);
        if ($album_status->status == 1) {
            Album::where('album_id', $sId)->update([
                'status' => 0
            ]);
        } else {
            Album::where('album_id', $sId)->update([
                'status' => 1
            ]);
        }
        return back();
    }

    public function showGallery($album_id)
    {
        $galleryData = AlbumGallery::where('album_id', $album_id)->paginate(2);
        return view('Admin.gallery', compact('galleryData', 'album_id'));
    }


    public function addGallery($id)
    {
        return view('Admin.add-gallery', compact('id'));
    }

    public function storeGallery(Request $request)
    {
        $validated = $request->validate([
            'img_image' => 'mimes:jpeg,jpg,png|max:500',
        ],
        [
            'img_image.mimes' => 'Image extension must be jpeg,jpg,png',
            'img_image.max' => 'The  image must not be greater than 500 kilobytes. '
        ]);

        $storeGalleryData = $request->except('img_image');
        if ($request->hasFile('img_image')) {
            $img_image = $request->file('img_image');
            $filename = time() . '.' . $img_image->getClientOriginalExtension();
            $path = $img_image->move(public_path('Gallery'), $filename);
            $storeGalleryData['img_image'] = $filename;
        }
        AlbumGallery::create($storeGalleryData);
        return redirect('/admin/show-gallery/' . $request->album_id);
    }

    public function editGallery($id)
    {
        $edit_img_data = AlbumGallery::where('img_id', $id)->first();
        return view('Admin.edit-gallery', compact('edit_img_data'));
    }

    public function updateGallery(Request $request, $id)
    {
        $validated = $request->validate([
            'img_image' => 'mimes:jpeg,jpg,png|max:500',
        ],
        [
            'img_image.mimes' => 'Image extension must be jpeg,jpg,png',
            'img_image.max' => 'The  image must not be greater than 500 kilobytes. '
        ]);
        
        $updateGalleryData = $request->except('img_image', '_token');
        if ($request->hasFile('img_image')) {
            $img_image = $request->file('img_image');
            $filename = time() . '.' . $img_image->getClientOriginalExtension();
            $path = $img_image->move(public_path('Gallery'), $filename);
            $updateGalleryData['img_image'] = $filename;
        }
        AlbumGallery::where('img_id', $id)->update($updateGalleryData);
        return redirect('/admin/album');
    }

    public function deleteGallery(Request $request)
    {
        $dltAlbumGal = AlbumGallery::where('img_id', $request->img_id)->first();
        if (File::exists(public_path('Gallery/' . $dltAlbumGal->img_image))) {
            File::delete(public_path('Gallery/' . $dltAlbumGal->img_image));
        }
        AlbumGallery::where('img_id', $request->img_id)->delete();
        return back();
    }

    public function changeGallerystatus(Request $request)
    {
        $sId = $request->img_id;
        $img_status = AlbumGallery::where('img_id', $sId)->first();
        // dd($slider_status);
        if ($img_status->status == 1) {
            AlbumGallery::where('img_id', $sId)->update([
                'status' => 0
            ]);
        } else {
            AlbumGallery::where('img_id', $sId)->update([
                'status' => 1
            ]);
        }
        return back();
    }

    public function resultList()
    {
        $resultData = Result::latest()->paginate(8);
        return view('Admin.resultList', compact('resultData'));
    }

    public function addResult()
    {
        return view('Admin.add-result');
    }

    public function storeResult(Request $request)
    {
        $validated = $request->validate([
            'student_image' => 'mimes:jpeg,jpg,png|max:500',
        ]);

        $storeResultData = $request->except('student_image');
        if ($request->hasFile('student_image')) {
            $student_image = $request->file('student_image');
            $filename = time() . '.' . $student_image->getClientOriginalExtension();
            $path = $student_image->move(public_path('Result'), $filename);
            $storeResultData['student_image'] = $filename;
        }
        $percentage = (float)(($request->get_number) * 100 / ($request->total_number));
        $storeResultData['percentage'] = round($percentage, 2);
        Result::create($storeResultData);
        return redirect('/admin/student-results');
    }

    public function editResult($id)
    {
        $edit_result_data = Result::where('result_id', $id)->first();
        return view('Admin.edit-result', compact('edit_result_data'));
    }

    public function updateResult(Request $request, $result_id)
    {
        $validated = $request->validate([
            'student_image' => 'mimes:jpeg,jpg,png|max:500',
        ]);

        $updateResultData = $request->except('student_image', '_token');
        if ($request->hasFile('student_image')) {
            $student_image = $request->file('student_image');
            $filename = time() . '.' . $student_image->getClientOriginalExtension();
            $path = $student_image->move(public_path('Result'), $filename);
            $updateResultData['student_image'] = $filename;
        }
        $percentage = (float)(($request->get_number) * 100 / ($request->total_number));
        $updateResultData['percentage'] = round($percentage, 2);
        Result::where('result_id', $result_id)->update($updateResultData);
        return redirect('/admin/student-results');
    }

    public function deleteResult(Request $request)
    {
        $dltResult = Result::where('result_id', $request->result_id)->first();
        if (File::exists(public_path('Result/' . $dltResult->student_image))) {
            File::delete(public_path('Result/' . $dltResult->student_image));
        }
        Result::where('result_id', $request->result_id)->delete();
        return back();
    }

    public function changeResultstatus(Request $request)
    {
        $sId = $request->result_id;
        $result_status = Result::where('result_id', $sId)->first();
        // dd($slider_status);
        if ($result_status->status == 1) {
            Result::where('result_id', $sId)->update([
                'status' => 0
            ]);
        } else {
            Result::where('result_id', $sId)->update([
                'status' => 1
            ]);
        }
        return back();
    }

    public function reviewList()
    {
        $reviewData = Reviews::latest()->paginate(4);
        return view('Admin.review-list', compact('reviewData'));
    }

    public function deleteReview(Request $request)
    {
        $dltReview = Reviews::where('review_id', $request->review_id)->first();
        if (File::exists(public_path('Result/' . $dltReview->image))) {
            File::delete(public_path('Result/' . $dltReview->image));
        }
        Reviews::where('review_id', $request->review_id)->delete();
        return back();
    }

    public function changeReviewStatus(Request $request)
    {
        $reId = $request->review_id;
        $review_status = Reviews::where('review_id', $reId)->first();
        if ($review_status->status == 1) {
            Reviews::where('review_id', $reId)->update([
                'status' => 0
            ]);
        } else {
            Reviews::where('review_id', $reId)->update([
                'status' => 1
            ]);
        }
        return back();
    }

    // Notifications

    public function notificationList()
    {
        $noticationData = Notification::latest()->paginate(8);
        return view('Admin.notification-list', compact('noticationData'));
    }


    public function addNotification()
    {
        return view('Admin.add-notification');
    }

    public function storeNotification(Request $request)
    {
        $noticationData = $request->all();
        Notification::create($noticationData);
        return redirect('/admin/notification-list');
    }

    public function deleteNotification(Request $request)
    {
        Notification::where('notification_id', $request->notification_id)->delete();
        return back();
    }

    public function changeNotificationStatus(Request $request)
    {
        $notiId = $request->notification_id;
        $notification_status = Notification::where('notification_id', $notiId)->first();

        if ($notification_status->status == 1) {
            Notification::where('notification_id', $notiId)->update([
                'status' => 0
            ]);
        } else {
            Notification::where('notification_id', $notiId)->update([
                'status' => 1
            ]);
        }
        return back();
    }

    public function editNotification($id)
    {
        $edit_notification_data = Notification::where('notification_id', $id)->first();
        return view('Admin.edit-notification', compact('edit_notification_data'));
    }

    public function updateNotification(Request $request, $notification_id)
    {
        $updateNotificationData = $request->except('_token');
        Notification::where('notification_id', $notification_id)->update($updateNotificationData);
        return redirect('/admin/notification-list');
    }

    // Video Gallery
    public function videoGalleryList()
    {
        $videoData = VideoGallery::latest()->paginate(2);
        return view('Admin.videogallery-list', compact('videoData'));
    }

    public function addVideo()
    {
        return view('Admin.add-video');
    }

    public function storeVideo(Request $request)
    {
        $videoData = $request->all();
        $url = $request->video_url;
        $embed_url = str_replace('watch?v=', 'embed/', $url);
        $videoData['video_embed_url'] = $embed_url;
        VideoGallery::create($videoData);
        return redirect('/admin/video-gallerylist');
    }

    public function deleteVideo(Request $request)
    {
        VideoGallery::where('video_id', $request->video_id)->delete();
        return back();
    }

    public function changeVideoStatus(Request $request)
    {
        $vidId = $request->video_id;
        $video_status = VideoGallery::where('video_id', $vidId)->first();

        if ($video_status->status == 1) {
            VideoGallery::where('video_id', $vidId)->update([
                'status' => 0
            ]);
        } else {
            VideoGallery::where('video_id', $vidId)->update([
                'status' => 1
            ]);
        }
        return back();
    }

    public function editVideo($id)
    {
        $edit_video_data = VideoGallery::where('video_id', $id)->first();
        return view('Admin.edit-video', compact('edit_video_data'));
    }

    public function updateVideo(Request $request, $video_id)
    {
        $updateVideoData = $request->except('_token');
        $url = $request->video_url;
        $embed_url = str_replace('watch?v=', 'embed/', $url);
        $updateVideoData['video_embed_url'] = $embed_url;
        VideoGallery::where('video_id', $video_id)->update($updateVideoData);
        return redirect('/admin/video-gallerylist');
    }


    // Links

    public function linkList()
    {
        $linksData = ExternalLinks::latest()->paginate(8);
        return view('Admin.link-list', compact('linksData'));
    }

    public function addLink()
    {
        return view('Admin.add-link');
    }

    public function storeLink(Request $request)
    {
        $linkData = $request->all();
        ExternalLinks::create($linkData);
        return redirect('/admin/linklists');
    }

    public function editLink($id)
    {
        $edit_link_data = ExternalLinks::where('link_id', $id)->first();
        return view('Admin.edit-link', compact('edit_link_data'));
    }

    public function updateLink(Request $request, $link_id)
    {
        $updateLinkData = $request->except('_token');
        ExternalLinks::where('link_id', $link_id)->update($updateLinkData);
        return redirect('/admin/linklists');
    }

    public function deleteLink(Request $request)
    {
        ExternalLinks::where('link_id', $request->link_id)->delete();
        return back();
    }

    public function changeLinkStatus(Request $request)
    {
        $LinkId = $request->link_id;
        $link_status = ExternalLinks::where('link_id', $LinkId)->first();

        if ($link_status->status == 1) {
            ExternalLinks::where('link_id', $LinkId)->update([
                'status' => 0
            ]);
        } else {
            ExternalLinks::where('link_id', $LinkId)->update([
                'status' => 1
            ]);
        }
        return back();
    }

    // Search

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $output = "";
            $enquiry = Enquiry::where('name', 'LIKE', '%' . $request->search . "%")
                ->orWhere('email', 'LIKE', '%' . $request->search . "%")
                ->orWhere('phone', 'LIKE', '%' . $request->search . "%")->get();
            if ($enquiry) {
                $sn = 0;
                foreach ($enquiry as $key => $enquiryVal) {
                    $sn += $key;
                    $output .= '<tr>' .
                        '<td>' . $sn . '</td>' .
                        '<td>' . $enquiryVal->name . '</td>' .
                        '<td>' . $enquiryVal->email . '</td>' .
                        '<td>' . $enquiryVal->phone . '</td>' .
                        '<td>' . $enquiryVal->subject . '</td>' .
                        '<td>' . $enquiryVal->message . '</td>' .
                        '<td>' . $enquiryVal->created_at . '</td>' .
                        '</tr>';
                }
                return Response($output);
            }
        }
    }


    // Manage Teachers
    public function TeacherList()
    {
        $TeachData = Teachers::latest()->paginate(8);
        return view('Admin.teachers-list', compact('TeachData'));
    }

    public function addTeacher()
    {
        return view('Admin.add-teacher');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeTeacher(Request $request)
    {
        $validated = $request->validate([
            'teacher_image' => 'mimes:jpeg,jpg,png|max:500',
        ]);

        $storeTeacherData = $request->except('teacher_image');
        if ($request->hasFile('teacher_image')) {
            $teacher_image = $request->file('teacher_image');
            $filename = time() . '.' . $teacher_image->getClientOriginalExtension();
            $path = $teacher_image->move(public_path('Teachers'), $filename);
            $storeTeacherData['teacher_image'] = $filename;
        }
        Teachers::create($storeTeacherData);
        return redirect('/admin/teacherlist');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteTeacher(Request $request)
    {
        $dltteach = Teachers::where('id', $request->id)->first();
        if (File::exists(public_path('Teachers/' . $dltteach->teacher_image))) {
            File::delete(public_path('Teachers/' . $dltteach->teacher_image));
        }
        Teachers::where('id', $request->id)->delete();
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editTeacher($id)
    {
        $edit_teach_data = Teachers::where('id', $id)->first();
        return view('Admin.edit-teacher', compact('edit_teach_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateTeacher(Request $request, $id)
    {
        $validated = $request->validate([
            'teacher_image' => 'mimes:jpeg,jpg,png|max:500',
        ]);
        
        $updateTeacherData = $request->except('teacher_image','_token');
        if ($request->hasFile('teacher_image')) {
            $teacher_image = $request->file('teacher_image');
            $filename = time() . '.' . $teacher_image->getClientOriginalExtension();
            $path = $teacher_image->move(public_path('Teachers'), $filename);
            $updateTeacherData['teacher_image'] = $filename;
        }
        Teachers::where('id', $id)->update($updateTeacherData);
        return redirect('/admin/teacherlist');
    }

    public function changeTeacherStatus(Request $request)
    {
        $tId = $request->id;
        $teacher_status = Teachers::where('id', $tId)->first();
        if ($teacher_status->status == 1) {
            Teachers::where('id', $tId)->update([
                'status' => 0
            ]);
        } else {
            Teachers::where('id', $tId)->update([
                'status' => 1
            ]);
        }
        return back();
    }

}
