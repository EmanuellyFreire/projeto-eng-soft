<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AutorService;
use App\Http\Requests\AutorStoreRequest;
use App\Http\Requests\AutorUpdateRequest;
use App\Http\Resources\AutorResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AutorController extends Controller
{
    private AutorService $autorService;
    public function __construct(AutorService $autorService)
    {
        $this->autorService = $autorService;
    }

    public function get()
    {
        $autors = $this->autorService->get();
        return AutorResource::collection($autors);
    }

    public function details($id){
        try{
            $autor = $this->autorService->details($id);

        }catch(ModelNotFoundException $e){
            return response()->json(['error'=>'autor not found'],404);
        }
        return new AutorResource($autor);
    }

    public function store(AutorStoreRequest $request)
    {
        $data = $request->validated();
        $autor = $this->autorService->store($data);

        return new AutorResource($autor);
    }

    public function update(int $id, AutorUpdateRequest $request){
        $data = $request->validated();
        try{
            $autor = $this->autorService->update($id, $data);
        }catch(ModelNotFoundException $e){
            return response()->json(['error'=>'autor not found'],404);
        }
        return new AutorResource($autor);
    }

    public function delete(int $id){
        try{
            $autor = $this->autorService->delete($id);
        }catch(ModelNotFoundException $e){
            return response()->json(['error'=>'autor not found'],404);
        }
        return new AutorResource($autor);
    }

    // public function getWithCategory(){
    //     $autors = $this->autorService->getWithCategory();
    //     return AutorResource::collection($autors);
    // }

    // public function findCategory(int $id){
    //     try{
    //         $category = $this->autorService->findCategory($id);
    //     }catch(ModelNotFoundException $e){
    //         return response()->json(['error'=>'autor not found'],404);
    //     }
    //     return response()->json($category);
    // }
}
