<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/teste', function() {
 return "hello world";
});

Route::get('/user/{id}', function ($id) {
 return "O ID do usuário é: {$id}";
});

Route::get('/user/{tipo}/{id}', function ($tipo,$id) {
 return "O Tipo do usuário é {$tipo} e o ID do usuário é: {$id}";
});

Route::get('/teste_query' , function (Request $request) {
 $valor1 = $request->query('valor1'); // Captura o parâmetro 'valor1'
 $valor2 = $request->query('valor2', 'teste'); // Captura 'valor2' ou define teste como padrão
 echo $valor1;
 echo "\n";
 echo $valor2;
});


// EXEMPLO DE JSON
// {
//  "nome": "Fulado",
//  "dados": {
//  "idade": 26,
//  "telefone": "123456789"
//  },
//  "cores_favoritas": [
//  "azul",
//  "vermelho",
//  "preto"
//  ]
// }
Route::post('/dados' , function (Request $request ) {
 $nome = $request ->input('nome'); // Captura o campo "nome"
 $email = $request ->input('email', 'email_padrao@example.com' ); // Se não existir, usa um valor padrão
 return response ()->json([
 'nome' => $nome,
 'email' => $email
 ]);
});


Route::post('/products' , function (Request $request) {
 $product = new Product();
 $product->name = $request->input('name');;
 $product->price = $request->input('price');;
 $product->description = $request->input('description' );;
 $product->save();
 return response()->json($product);
});

Route::get('/products' , function () {
 $products = Product::all();
 return response()->json($products);
});

Route::get('/products/{id}' , function ($id) {
 $product = Product::find($id);
 return response()->json($product);
});

Route::patch('/products/{id}', function (Request $request, $id) {
 $product = Product::find($id);
 if($request->input('name') !== null){
 $product->name = $request->input('name');
 }
 if($request->input('price') !== null){
 $product->price = $request->input('price');
 }
 if($request->input('description') !== null){
 $product->description = $request->input('description');
 }
 $product->save();
 return response()->json($product);
});

Route::delete('/products/{id}' , function ($id) {
 $product = Product::find($id);
 $product->delete();
 return response()->json($product);
});
