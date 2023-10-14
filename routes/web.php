<?php

use App\Http\Controllers\CheckController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EstimateController;
use App\Http\Controllers\KadouhiController;
use App\Http\Controllers\ProjectController; // 追記
use App\Http\Controllers\DetailProjectController; // 追記
use App\Models\DetailProject;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('top'); // welcome から top に変更
});

// グループで囲み、その中にエンドポイントを作成
Route::group(['middleware' => ['auth']], function () {
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
Route::get('/projects/customer', [ProjectController::class, 'customer'])->name('projects.customer');
Route::get('/projects/check', [ProjectController::class, 'check'])->name('projects.check');
Route::get('/Projects/price', [ProjectController::class, 'price'])->name('projects.price');

Route::get('project/{project_id}/kadouhi', [KadouhiController::class, 'index'])->name('kadouhi.index');
Route::get('/project/{project}/details/kadouhi', [KadouhiController::class, 'showKadouhi'])->name('project.details.kadouhi');

// このようにルートパラメータを使用してkadouhiのページにアクセスするためのルートを定義します。


Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');
Route::get('/project/{project}/details/estimate', [EstimateController::class, 'showestimate'])->name('project.details.estimate');
Route::get('/project/{project}/details/check', [CheckController::class, 'showcheck'])->name('project.details.check');




//Projectの修正と削除
// 編集のためのルート
Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
// アップデートのためのルート
Route::patch('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
// 削除のためのルート
Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');

// プロジェクト詳細のチェックボックスの更新に関するルート
Route::get('/project/{project}/update-checkboxes', [DetailProjectController::class, 'index'])->name('detailprojects.index');
Route::post('/project/{project}/update-checkboxes', [DetailProjectController::class, 'updateCheckboxes'])->name('project.updateCheckboxes');


//customerのデータを書き込む
Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
Route::post('/customer', [CustomerController::class, 'store'])->name('customers.store');
Route::get('/customer', [CustomerController::class, 'index'])->name('customers.index');
Route::get('/customers/{customer}', [CustomerController::class, 'show'])->name('customers.show');
//Customer update
Route::resource('/customers', CustomerController::class);

//確認事項関連
Route::get('/checks/create', [CheckController::class, 'create'])->name('checks.create');
Route::post('/check', [CheckController::class, 'store'])->name('checks.store');
Route::get('/check', [CheckController::class, 'index'])->name('checks.index');
Route::get('/checks/{check}', [CheckController::class, 'show'])->name('checks.show');
//Customer update
Route::resource('/checks', CheckController::class);




//estimateのデータを書き込む
Route::put('/estimate/{project}', [EstimateController::class, 'update'])->name('estimate.update');
Route::post('/estimate', [EstimateController::class, 'store'])->name('estimates.store');
Route::get('/estimate/{project}', [EstimateController::class, 'show'])->name('estimates.show');
Route::resource('/estimate', EstimateController::class);


//ホーム画面に戻る
Route::get('/project', [ProjectController::class, 'index'])->name('back_to_projects');



Route::post('/create_detail_projects', [KadouhiController::class, 'store']);


});  

require __DIR__.'/auth.php';