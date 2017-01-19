<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group(['middleware' => 'cors'], function() {
  Route::get('/', function () {
      return view('welcome');
  });

  Route::get('/categories', function() {
    try {
      $response = [];
      $statusCode = 200;
      $categories = \App\Category::all();

      foreach($categories as $category) {

          $response[] = [
              'id' => $category->id,
              'name' => $category->name
          ];
      }
    }
    catch (Exception $ex) {
      $statusCode = 404;
    }

    return Response::json($response, $statusCode);
  });

  Route::get('/products/{id1}-{id2}', function($id1, $id2) {
    try {
      $response = [];
      $statusCode = 200;
      $products = \App\Product::whereBetween('id', [$id1, $id2])->get();

      foreach($products as $product) {
        $response[] = [
              'id' => $product->id,
              'pro_link' => $product->pro_link,
              'pro_image' => $product->pro_image,
              'description' => $product->description,
              'cat_id' => $product->cat_id
          ];
      }
    }
    catch (Exception $ex) {
      $statusCode = 404;
    }

    return Response::json($response, $statusCode);
  });

  Route::post('/test', function(\Request $request) {
    return Response::json($request);
  });
});
