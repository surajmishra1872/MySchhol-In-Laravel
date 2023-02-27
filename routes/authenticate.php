<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAccountController;

Route::middleware('auth')->group(function () {
    
    Route::controller(AdminAccountController::class)->group(function () {
        Route::group(['prefix'=>"admin"], function(){     
            Route::get('/dashboard', 'mydashboard');

            // facilities
            Route::get('/facilities', 'Facilities');
            Route::get('/add-facilities', 'addFacilities');
            Route::post('/store-Facilities', 'storeFacilities');
            Route::post('/delete-facilities', 'deleteFacilities');
            Route::get('/edit-facilities/{facilities_id}', 'editFacilities');
            Route::post('/update-facilities/{facilities_id}', 'updateFacilities');
            Route::post('/status-facilities', 'changeFacilitiesStatus');

            // Slider

            Route::get('/slider', 'Slider');
            Route::get('/add-slider', 'addSlider');
            Route::post('/store-slider', 'storeSlider');
            Route::get('/edit-slider/{slider_id}', 'editSlider');
            Route::post('/update-slider/{slider_id}', 'updateSlider');
            Route::post('/delete-slider', 'deleteSlider');
            Route::post('/status-slider', 'changeSliderstatus');
           
            // Album

            Route::get('/album', 'albumList');
            Route::get('/add-albums', 'addAlbum');
            Route::post('/store-album', 'storeAlbum');
            Route::get('/edit-album/{album_id}', 'editAlbum');
            Route::post('/update-album/{album_id}', 'updateAlbum');
            Route::post('/delete-album', 'deleteAlbum');
            Route::post('/status-album', 'changeAlbumStatus');

            // Album to Gallery

            Route::get('/show-gallery/{album_id}', 'showGallery');
            Route::get('/add-gallery/{album_id}', 'addGallery');
            Route::post('/store-gallery', 'storeGallery');
            Route::get('/edit-gallery/{img_id}', 'editGallery');
            Route::post('/update-gallery/{img_id}', 'updateGallery');
            Route::post('/delete-gallery', 'deleteGallery');
            Route::post('/status-gallery', 'changeGalleryStatus');

            // Student Result 

            Route::get('/student-results', 'resultList');
            Route::get('/add-result', 'addResult');
            Route::post('/store-result', 'storeResult');
            Route::get('/edit-result/{result_id}', 'editResult');
            Route::post('/update-result/{result_id}', 'updateResult');
            Route::post('/delete-result', 'deleteResult');
            Route::post('/status-result', 'changeResultStatus');

            // Reviews

            Route::get('/reviews-list', 'reviewList');
            Route::post('/delete-review', 'deleteReview');
            Route::post('/status-review', 'changeReviewStatus');


            // notifications
            Route::get('/notification-list', 'notificationList');
            Route::get('/add-notification', 'addNotification');
            Route::post('/delete-notification', 'deleteNotification');
            Route::post('/status-notification', 'changeNotificationStatus');
            Route::post('/store-notification', 'storeNotification');
            Route::get('/edit-notification/{notification_id}', 'editNotification');
            Route::post('/update-notification/{notification_id}', 'updateNotification');

             // Video Gallery
            Route::get('/video-gallerylist', 'videoGalleryList');
            Route::get('/add-video', 'addVideo');
            Route::post('/delete-video', 'deleteVideo');
            Route::post('/status-video', 'changeVideoStatus');
            Route::post('/store-video', 'storeVideo');
            Route::get('/edit-video/{video_id}', 'editVideo');
            Route::post('/update-video/{video_id}', 'updateVideo');


             // Manage Links
            Route::get('/linklists', 'linkList');
            Route::get('/add-links', 'addLink');
            Route::post('/delete-link', 'deleteLink');
            Route::post('/status-link', 'changeLinkStatus');
            Route::post('/store-link', 'storeLink');
            Route::get('/edit-link/{link_id}', 'editLink');
            Route::post('/update-link/{link_id}', 'updateLink');

            // Enquiry
            Route::get('/enquirylists', 'enquiryLists');

            // Search

            Route::get('/contact-search', 'search');

            
            // Teachers
            Route::get('/teacherlist', 'TeacherList');
            Route::get('/add-teacher', 'addTeacher');
            Route::post('/store-teacher', 'storeTeacher');
            Route::post('/delete-teacher', 'deleteTeacher');
            Route::get('/edit-teacher/{teacher_id}', 'editTeacher');
            Route::post('/update-teacher/{teacher_id}', 'updateTeacher');
            Route::post('/status-teacher', 'changeTeacherStatus');
        });
    });
});

