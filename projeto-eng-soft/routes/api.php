<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Autor;
use App\Models\Genero;
use App\Models\Livro;
use App\Models\Review;
use App\Models\Usuario;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UsuarioController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(AutorController::class)->group( function (){
    Route::get('/autor', 'get');
    Route::get('/autor/{id}', 'details');
    Route::post('/autor', 'store');
    Route::patch('/autor/{id}', 'update');
    Route::delete('/autor/{id}', 'delete');
});

Route::controller(GeneroController::class)->group( function (){
    Route::get('/genero', 'get');
    Route::get('/genero/{id}', 'details');
    Route::post('/genero', 'store');
    Route::patch('/genero/{id}', 'update');
    Route::delete('/genero/{id}', 'delete');
});

Route::controller(LivroController::class)->group( function (){
    Route::get('/livro', 'get');
    Route::get('/livro/{id}', 'details');
    Route::post('/livro', 'store');
    Route::patch('/livro/{id}', 'update');
    Route::delete('/livro/{id}', 'delete');
});

Route::controller(ReviewController::class)->group( function (){
    Route::get('/review', 'get');
    Route::get('/review/{id}', 'details');
    Route::post('/review', 'store');
    Route::patch('/review/{id}', 'update');
    Route::delete('/review/{id}', 'delete');
});

Route::controller(UsuarioController::class)->group( function (){
    Route::get('/usuario', 'get');
    Route::get('/usuario/{id}', 'details');
    Route::post('/usuario', 'store');
    Route::patch('/usuario/{id}', 'update');
    Route::delete('/usuario/{id}', 'delete');
});


// Route::controller(CategoryController::class)->group( function (){
//     Route::get('/categories', 'get');
//     Route::get('/categories/products', 'getWithProducts');
//     Route::get('/categories/{id}', 'details');
//     Route::post('/categories', 'store');
//     Route::patch('/categories/{id}', 'update');
//     Route::delete('/categories/{id}', 'delete');
//     Route::get('/categories/products/{id}', 'findProducts');
// });



// Route::controller(CompanyController::class)->group( function (){
//     Route::get('/companies', 'get');
//     Route::get('/companies/products', 'getWithProducts');
//     Route::get('/companies/{id}', 'details');
//     Route::post('/companies', 'store');
//     Route::patch('/companies/{id}', 'update');
//     Route::delete('/companies/{id}', 'delete');
//     Route::get('/companies/products/{id}', 'findProducts');
// });







// TESTES

// Route::get('/teste', function() {
//  return "hello world";
// });

// Route::get('/user/{id}', function ($id) {
//  return "O ID do usuário é: {$id}";
// });

// Route::get('/user/{tipo}/{id}', function ($tipo,$id) {
//  return "O Tipo do usuário é {$tipo} e o ID do usuário é: {$id}";
// });

// Route::get('/teste_query' , function (Request $request) {
//  $valor1 = $request->query('valor1'); // Captura o parâmetro 'valor1'
//  $valor2 = $request->query('valor2', 'teste'); // Captura 'valor2' ou define teste como padrão
//  echo $valor1;
//  echo "\n";
//  echo $valor2;
// });


// // EXEMPLO DE JSON
// // {
// //  "nome": "Fulado",
// //  "dados": {
// //  "idade": 26,
// //  "telefone": "123456789"
// //  },
// //  "cores_favoritas": [
// //  "azul",
// //  "vermelho",
// //  "preto"
// //  ]
// // }
// Route::post('/dados' , function (Request $request ) {
//  $nome = $request ->input('nome'); // Captura o campo "nome"
//  $email = $request ->input('email', 'email_padrao@example.com' ); // Se não existir, usa um valor padrão
//  return response ()->json([
//  'nome' => $nome,
//  'email' => $email
//  ]);
// });


// Route::post('/products' , function (Request $request) {
//  $product = new Product();
//  $product->name = $request->input('name');;
//  $product->price = $request->input('price');;
//  $product->description = $request->input('description' );;
//  $product->save();
//  return response()->json($product);
// });

// Route::get('/products' , function () {
//  $products = Product::all();
//  return response()->json($products);
// });

// Route::get('/products/{id}' , function ($id) {
//  $product = Product::find($id);
//  return response()->json($product);
// });

// Route::patch('/products/{id}', function (Request $request, $id) {
//  $product = Product::find($id);
//  if($request->input('name') !== null){
//  $product->name = $request->input('name');
//  }
//  if($request->input('price') !== null){
//  $product->price = $request->input('price');
//  }
//  if($request->input('description') !== null){
//  $product->description = $request->input('description');
//  }
//  $product->save();
//  return response()->json($product);
// });

// Route::delete('/products/{id}' , function ($id) {
//  $product = Product::find($id);
//  $product->delete();
//  return response()->json($product);
// });
