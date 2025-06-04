<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UsuarioService;
use App\Http\Requests\UsuarioStoreRequest;
use App\Http\Requests\UsuarioUpdateRequest;
use App\Http\Resources\UsuarioResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UsuarioController extends Controller
{
    private UsuarioService $usuarioService;
    public function __construct(UsuarioService $usuarioService)
    {
        $this->usuarioService = $usuarioService;
    }

    public function get()
    {
        $usuarios = $this->usuarioService->get();
        return UsuarioResource::collection($usuarios);
    }

    public function details($id){
        try{
            $usuario = $this->usuarioService->details($id);

        }catch(ModelNotFoundException $e){
            return response()->json(['error'=>'usuario not found'],404);
        }
        return new UsuarioResource($usuario);
    }

    public function store(UsuarioResource $request)
    {
        $data = $request->all();
        $usuario = $this->usuarioService->store($data);

        return new UsuarioResource($usuario);
    }

    public function update(int $id, UsuarioUpdateRequest $request){
        $data = $reqest->validated();
        try{
            $usuario = $this->usuarioService->update($id, $data);
        }catch(ModelNotFoundException $e){
            return response()->json(['error'=>'usuario not found'],404);
        }
        return new UsuarioResource($usuario);
    }

    public function delete(int $id){
        try{
            $usuario = $this->usuarioService->delete($id);
        }catch(ModelNotFoundException $e){
            return response()->json(['error'=>'usuario not found'],404);
        }
        return new UsuarioResource($usuario);
    }

    // public function getWithCategory(){
    //     $usuarios = $this->usuarioService->getWithCategory();
    //     return UsuarioResource::collection($usuarios);
    // }

    // public function findCategory(int $id){
    //     try{
    //         $category = $this->usuarioService->findCategory($id);
    //     }catch(ModelNotFoundException $e){
    //         return response()->json(['error'=>'usuario not found'],404);
    //     }
    //     return response()->json($category);
    // }
}
