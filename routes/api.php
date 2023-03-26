<?php

use App\Models\TempImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('upload/{type}', function (Request $request, string $type) {
    // dd($request,$type);
    switch ($type) {
        case 'product':
            if ($request->hasFile('image')) {
                // dd($request);
                $destinasion_path = 'public/image/products';
                $image = $request->file('image');
                $image_name = uniqid() . '.' . $image->getClientOriginalExtension();
                $request->file('image')->storeAs($destinasion_path, $image_name);
                $temp = new TempImage([
                    'name' => $image_name,
                    'path' => $destinasion_path,
                    'origin' => $request->ip()
                ]);

                $temp->save();

                return response($image_name, 201);
                // exit($image_name);
            }
            break;
    }
});

Route::delete('upload/{type}', function (Request $request, string $type) {

    switch ($type) {
        case 'product':
            $filename = file_get_contents('php://input');
            $temp = TempImage::where('name', $filename)->first();
            // unlink("{$temp->path}/{$temp->name}");
            if (Storage::exists("{$temp->path}/{$temp->name}")) {

                Storage::delete("{$temp->path}/{$temp->name}");
                $temp->delete();
                return response()->json([

                    'status' => "Ok",

                ], 201);
            } else {
                return response()->json([

                    'status' => "Error",
                    'message'=>"file not found"

                ], 404);
            }
    }
});
