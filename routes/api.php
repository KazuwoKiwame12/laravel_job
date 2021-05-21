<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/job/{id}', function ($data_id) {
    $job = (new \App\Jobs\CreateCSV($data_id));
    dispatch($job);
    return 'データ'.$data_id.'csv作成の申請を受理しました';
});

Route::get('/fail', function () {
    $job = (new \App\Jobs\FailJob());
    dispatch($job);
    return '失敗するjobの登録を完了しました。';
});

Route::get('/fat', function () {
    $job = (new \App\Jobs\FatProcessOne());
    dispatch($job);
    return '重いjobを分散し、段階的にdispatchを呼んで処理が段階的に進むjobの登録を完了しました。';
});
