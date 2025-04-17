<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\VideoController;
use App\Models\Books;
use App\Models\Catergory;
use App\Models\Interest;
use App\Models\Video;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('auth.login');
// });
Route::post('logout', [AuthController::class, 'destroy'])->name('logout');
Route::get('/', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'registerAction']);
Route::post('/login', [AuthController::class, 'loginAction']);
Route::get('/verify_otp', function () {
    return view('email.verify_otp');
});
Route::post('/verify_auth_code', [AuthController::class, 'verifyOTP']);

Route::get('/resend_verify_otp', function () {
    return view('auth.resend_verify_otp');
});
Route::post('/resend_verify_otp', [AuthController::class, 'resendVerifyOTP']);

Route::get('/forget_password', function () {
    return view('auth.forgot_password');
});
Route::post('/forgot_password', [AuthController::class, 'forgetPassword']);

// REset password?
Route::get('/reset_password', function () {
    return view('auth.new_password');
});
Route::post('/reset_password', [AuthController::class, 'resetPassword']);

// Super admin only
Route::middleware(['auth', 'role:super_admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.home', [
            'books' => Books::with('catergory')->paginate(6), // relationship
        ]);
    });
    Route::get('/videos_resources', function () {
        return view('admin.videos', [
            'videos' => Video::with('catergory')->paginate(6), // relationship
        ]);
    });
    Route::get('/admin_books_create', function () {
        $cate = Catergory::all();
        return view('admin.books_create', [
            'cate' => $cate
        ]);
    });
    Route::get('/admin_videos_create', function () {
        $cate = Catergory::all();
        return view('admin.videos_create', [
            'cate' => $cate
        ]);
    });
    Route::post('/save_book', [BooksController::class, 'saveBook']);
    Route::post('/save_video', [VideoController::class, 'saveVideo']);
    Route::get('/create_resources_catergory', function () {
        return view('admin.create_resources_catergory', [
            'cate' => Catergory::paginate(8)
        ]);
    });
    Route::post('/create_resources_catergory', [AdminController::class, 'saveCatergory']);
    Route::delete('/create_resources_catergory/{id}', [AdminController::class, 'deleteCatergory']);
    Route::delete('/delete_book/{id}', [AdminController::class, 'deleteBook']);
    Route::delete('/delete_video/{id}', [AdminController::class, 'deleteVideo']);
    Route::get('/view_book/{id}', [AdminController::class, 'viewBook']);
    Route::get('/view_video/{id}', [AdminController::class, 'viewVideo']);
    Route::get('/update_book/{id}', function ($id) {
        return view('admin.books_update', [
            'cate' => Catergory::all(),
            'book' => Books::with('catergory')->findOrFail($id)
        ]);
    });
    Route::put('/update_book/{id}', [AdminController::class, 'updateBook']);
    Route::get('/update_video/{id}', function ($id) {
        return view('admin.videos_update', [
            'cate' => Catergory::all(),
            'video' => Video::with('catergory')->findOrFail($id)
        ]);
    });
    Route::put('/update_video/{id}', [AdminController::class, 'updateVideo']);
    Route::get('/search_books', [AdminController::class, 'searchbooks']);
    Route::get('/search_videos', [AdminController::class, 'searchVideos']);
});

// Students only
Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/home', function () {
        $catergories = Catergory::all();
        $user = auth()->id();
        $hasInterests = Interest::where('user_id', $user)->first();
        $userCatergories = Interest::where('user_id', $user)->pluck('catergory_id');
        $userInterest = Catergory::whereIn('id', $userCatergories)->get();
        // dd($userInterest->pluck('id'));
        $books = Books::whereIn('catergory_id', $userInterest->pluck('id'))->get()->each(function ($item) {
            $item->type = 'book';
        });
        $videos = Video::whereIn('catergory_id', $userInterest->pluck('id'))->get()->each(function ($item) {
            $item->type = 'video';
        });
        $resources = $books->merge($videos)->shuffle();
        $page = request()->get('page', 1);
        $perPage = 8;
        $offset = ($page - 1) * $perPage;

        $pagedData = new LengthAwarePaginator(
            $resources->slice($offset, $perPage)->values(),
            $resources->count(),
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        // For trending resources?
        $book = Books::whereIn('catergory_id', [2, 3])->get()->each(function ($item) {
            $item->type = 'book';
        });
        $video = Video::whereIn('catergory_id', [2, 3])->get()->each(function ($item) {
            $item->type = 'video';
        });
        $trending = $book->merge($video)->shuffle();
        return view('students.home', [
            'catergories' => $catergories,
            'showModal' => !$hasInterests,
            'userInterest' => $userInterest,
            'resources' => $pagedData,
            'trending' => $trending
        ]);
    });

    // Save user interest
    Route::post('user_interests_save', [StudentController::class, 'saveUserInterests']);

    // The view resources part
    Route::get('view_resources_video/{id}', function ($id) {
        $user = auth()->id();
        $catergories = Catergory::all();
        $hasInterests = Interest::where('user_id', $user)->first();
        $userCatergories = Interest::where('user_id', $user)->pluck('catergory_id');
        $userInterest = Catergory::whereIn('id', $userCatergories)->get();
        $video = Video::with('catergory')->findOrFail($id);
        // dd($video);
        return view('students.view_resources_video', [
            'showModal' => !$hasInterests,
            'catergories' => $catergories,
            'userInterest' => $userInterest,
            'video' => $video
        ]);
    });
    Route::get('view_resources_book/{id}', function ($id) {
        $user = auth()->id();
        $catergories = Catergory::all();
        $hasInterests = Interest::where('user_id', $user)->first();
        $userCatergories = Interest::where('user_id', $user)->pluck('catergory_id');
        $userInterest = Catergory::whereIn('id', $userCatergories)->get();
        $book = Books::with('catergory')->findOrFail($id);
        return view('students.view_resources_book', [
            'showModal' => !$hasInterests,
            'catergories' => $catergories,
            'userInterest' => $userInterest,
            'book' => $book
        ]);
    });
});
