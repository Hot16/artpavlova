<?

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('index');
//});

Route::get('/', 'AlbumsController@getList')->name('index');
Route::get('/createalbum', array('as' => 'create_album_form','uses' => 'AlbumsController@getForm'));
Route::post('/createalbum', array('as' => 'create_album','uses' => 'AlbumsController@postCreate'));

Route::get('/create_category_album', array('as' => 'create_category_album_form','uses' => 'AlbumsCategoryController@getForm'));
Route::post('/create_category_album', array('as' => 'create_category_album','uses' => 'AlbumsCategoryController@create'));

Route::get('/deletealbum/{id}', array('as' => 'delete_album','uses' => 'AlbumsController@getDelete'));
Route::get('/album/{slug}', 'AlbumsController@getAlbum')->name('show_album');
Route::get('/addimage/{id}', array('as' => 'add_image','uses' => 'ImagesController@getForm'));
Route::post('/addimage', array('as' => 'add_image_to_album','uses' => 'ImagesController@postAdd'));
Route::get('/deleteimage/{id}', array('as' => 'delete_image','uses' => 'ImagesController@getDelete'));
Route::post('/moveimage', array('as' => 'move_image', 'uses' => 'ImagesController@postMove'));

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
