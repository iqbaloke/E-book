<?php

use App\Http\Controllers\Web\Admin\Book\{BookApprovedController, BookNotPublishController, BookPublishController, RequestBookController};
use App\Http\Controllers\Web\Admin\Master\{CategoryController, FileController, SosmedController, TagController};
use App\Http\Controllers\Web\Admin\RoleAndPermission\{GivePermissionController, UserRoleController, PermissionController, RoleController};
use App\Http\Controllers\Web\Admin\User\UserController;
use App\Http\Controllers\Web\BecomeAcreatorController;
use App\Http\Controllers\Web\cartController;
use App\Http\Controllers\Web\Creator\{BookCreatorController, DashboardCreatorController, IncomeController, PurchasedController, TransactionController};
use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\Landing\{CommentController, LandingController};
use App\Http\Controllers\Web\OrderController;
use App\Http\Controllers\Web\ProfileController;
use Illuminate\Support\Facades\{Auth, Route};


Route::get('/', [LandingController::class, 'landing'])->name('welocme');
Route::get('/category-all', [LandingController::class, 'categorylanding'])->name('categorylanding');
Route::get('/category/{category:category_name}', [LandingController::class, 'categorydetail'])->name('categorydetail');
Route::get('/categorytag/{category:category_name}/{tag:tag_name}', [LandingController::class, 'categorytagdetail'])->name('categorytagdetail');
Route::middleware('auth')->group(function () {
    // check roles dashboard admin
    Route::middleware('check.role')->group(function () {
        // dashboard admin
        Route::group(['middleware' => ['role:super admin|admin']], function () {
            Route::prefix('dashboard-admin')->group(function () {
                Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
                // master data
                Route::prefix('master-data')->group(function () {
                    Route::prefix('category')->group(function () {
                        Route::get('/', [CategoryController::class, 'categoryindex'])->name('categoryindex');
                        Route::post('/create', [CategoryController::class, 'categorycreate'])->name('categorycreate');
                        Route::patch('/update/{category:slug}', [CategoryController::class, 'categoryupdate'])->name('categoryupdate');
                        Route::delete('/delete/{category:slug}', [CategoryController::class, 'categorydelete'])->name('categorydelete');
                    });

                    Route::prefix('tag')->group(function () {
                        Route::get('/', [TagController::class, 'tagindex'])->name('tagindex');
                        Route::post('/create', [TagController::class, 'tagcreate'])->name('tagcreate');
                        Route::patch('/update/{tag:slug}', [TagController::class, 'tagupdate'])->name('tagupdate');
                        Route::delete('/delete/{tag:slug}', [TagController::class, 'tagdelete'])->name('tagdelete');
                    });

                    Route::prefix('file')->group(function () {
                        Route::get('/', [FileController::class, 'fileindex'])->name('fileindex');
                        Route::post('/create', [FileController::class, 'filecreate'])->name('filecreate');
                        Route::patch('/update/{file:slug}', [FileController::class, 'fileupdate'])->name('fileupdate');
                        Route::delete('/delete/{file:slug}', [FileController::class, 'filedelete'])->name('filedelete');
                    });
                });
                Route::prefix('transaction')->group(function () {
                    Route::get('/success', [TransactionController::class, 'transactionadminsuccess'])->name('transactionadminsuccess');
                    Route::get('/pending', [TransactionController::class, 'transactionadminpending'])->name('transactionadminpending');
                    Route::get('/faild', [TransactionController::class, 'transactionadminfaild'])->name('transactionadminfaild');
                });

                Route::prefix('widraw')->group(function () {
                    Route::get('/request', [IncomeController::class, 'widrawrequest'])->name('widrawrequest');
                    Route::patch('/update/{widraw}', [IncomeController::class, 'widrawupdate'])->name('widrawupdate');
                    Route::get('/success', [IncomeController::class, 'widrawsuccess'])->name('widrawsuccess');
                });
                Route::group(['middleware' => ['role:super admin|admin|creator']], function () {
                });
                // Roles and permissions
                Route::prefix('user')->group(function () {
                    Route::get('/table', [UserController::class, 'usertable'])->name('usertable');
                    Route::patch('/update/{user}', [UserController::class, 'userupdate'])->name('userupdate');
                    Route::delete('/delete/{user}', [UserController::class, 'userdelete'])->name('userdelete');


                    Route::get('/create', [UserController::class, 'usercreate'])->name('usercreate');
                    Route::post('/store', [UserController::class, 'userstore'])->name('userstore');
                });
                Route::prefix('role-and-permission')->group(function () {

                    Route::prefix('roles')->group(function () {
                        Route::get('/', [RoleController::class, 'roleindex'])->name('roleindex');
                        Route::post('/create', [RoleController::class, 'rolecreate'])->name('rolecreate');
                        Route::patch('/update/{role}', [RoleController::class, 'roleupdate'])->name('roleupdate');
                        Route::delete('/delete/{role}', [RoleController::class, 'roledelete'])->name('roledelete');
                    });

                    Route::prefix('permission')->group(function () {
                        Route::get('/', [PermissionController::class, 'permissionindex'])->name('permissionindex');
                        Route::post('/create', [PermissionController::class, 'permissioncreate'])->name('permissioncreate');
                        Route::patch('/update/{permission}', [PermissionController::class, 'permissionupdate'])->name('permissionupdate');
                        Route::delete('/delete/{permission}', [PermissionController::class, 'permissiondelete'])->name('permissiondelete');
                    });
                    Route::prefix('give-permission')->group(function () {
                        Route::get('/', [GivePermissionController::class, 'givepermissionindex'])->name('givepermissionindex');
                        Route::post('/create', [GivePermissionController::class, 'givepermissioncreate'])->name('givepermissioncreate');
                        Route::put('/update/{role}', [GivePermissionController::class, 'givepermissionupdate'])->name('givepermissionupdate');
                    });

                    Route::prefix('user-role')->group(function () {
                        Route::get('/', [UserRoleController::class, 'userroleindex'])->name('userroleindex');
                        Route::post('/create', [UserRoleController::class, 'userrolecreate'])->name('userrolecreate');
                        Route::put('/update/{user}', [UserRoleController::class, 'userroleupdate'])->name('userroleupdate');
                    });
                });
                Route::prefix('book')->group(function () {
                    Route::get('/request-book', [RequestBookController::class, 'requestbook'])->name('requestbook');
                    Route::patch('/publishbookrequest/{book:slug}', [BookNotPublishController::class, 'publishbookrequest'])->name('publishbookrequest');

                    Route::get('/approved-book', [BookApprovedController::class, 'approvedbook'])->name('approvedbook');
                    Route::patch('/approvedbookrequest/{book:slug}', [BookApprovedController::class, 'approvedbookrequest'])->name('approvedbookrequest');

                    Route::get('/publish-book-byuser', [BookPublishController::class, 'publishbyuser'])->name('publishbyuser');
                    Route::get('/not-publish-book-byuser', [BookNotPublishController::class, 'notpublishbyuser'])->name('notpublishbyuser');
                });
            });
        });
        Route::prefix('checkout')->group(function () {
            Route::get('/{book:slug}', [OrderController::class, 'checkoutview'])->name('checkoutview');
            Route::post('create/{book:slug}/{cart}', [OrderController::class, 'checkoutcreate'])->name('checkoutcreate');
        });
        // dashboard  creators
        Route::group(['middleware' => ['role:creator|admin|super admin|writer']], function () {
            route::prefix('dashboard')->group(function () {
                Route::get('/', [DashboardCreatorController::class, 'dashboardcreator'])->name('dashboardcreator');
                Route::prefix('profile')->group(function () {
                    Route::get('/', [ProfileController::class, 'profile'])->name('profile');
                    Route::patch('/update/{user}', [ProfileController::class, 'profileupdate'])->name('profileupdate');
                });
                Route::group(['middleware' => ['role:creator|admin|super admin']], function () {
                    Route::prefix('book')->group(function () {
                        Route::get('/', [BookCreatorController::class, 'bookcreator'])->name('bookcreator');
                        Route::post('create/', [BookCreatorController::class, 'createbookcreator'])->name('createbookcreator');
                        Route::get('ajax-tag/{tag}', [BookCreatorController::class, 'ajaxtag'])->name('ajaxtag');
                        Route::get('detail/{book:slug}', [BookCreatorController::class, 'detailbookcreator'])->name('detailbookcreator');
                        Route::patch('update/{book:slug}', [BookCreatorController::class, 'updatebookcreator'])->name('updatebookcreator');
                        Route::delete('delete/{book:slug}', [BookCreatorController::class, 'deletebookcreator'])->name('deletebookcreator');
                    });
                });
                Route::prefix('purchased')->group(function () {
                    Route::get('/', [PurchasedController::class, 'purchased'])->name('purchased');
                });
                Route::prefix('transaction')->group(function () {
                    Route::get('/', [TransactionController::class, 'transaction'])->name('transaction');
                });
                Route::group(['middleware' => ['role:super admin|admin|creator']], function () {
                    Route::prefix('income')->group(function () {
                        Route::get('/', [IncomeController::class, 'income'])->name('income');
                        Route::post('/widraw', [IncomeController::class, 'widraw'])->name('widraw');
                    });
                });
            });
        });
        Route::prefix('cart')->group(function () {
            Route::get('/', [cartController::class, 'cartlanding'])->name('cartlanding');
            Route::post('/{book:slug}', [cartController::class, 'addtocart'])->name('addtocart');
            Route::get('favorite', [cartController::class, 'favorite'])->name('favorite');
            Route::delete('delete/{cart}', [cartController::class, 'favoritedelete'])->name('favoritedelete');
        });
        Route::group(['middleware' => ['role:admin|super admin|writer']], function () {
            Route::prefix('become-a-creator')->group(function () {
                Route::get('/', [BecomeAcreatorController::class, 'becomeacreator'])->name('becomeacreator');
                Route::post('/addbecomeacreator', [BecomeAcreatorController::class, 'addbecomeacreator'])->name('addbecomeacreator');
            });
        });
    });
    Route::get('/detail/{book:slug}', [LandingController::class, 'landingdetail'])->name('landingdetail');
    Route::post('/comment/{book:slug}', [CommentController::class, 'comment'])->name('comment');
});
Route::get('/ajaxtag', [BookCreatorController::class, 'ajaxtag'])->name('ajaxtag');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
