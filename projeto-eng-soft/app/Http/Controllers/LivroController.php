<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LivroService;
use App\Http\Requests\LivroStoreRequest;
use App\Http\Requests\LivroUpdateRequest;
use App\Http\Resources\LivroResource;
use App\Http\Resources\ReviewResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class LivroController extends Controller
{
    private LivroService $livroService;
    public function __construct(LivroService $livroService)
    {
        $this->livroService = $livroService;
    }

    public function get()
    {
        $livros = $this->livroService->get();
        return LivroResource::collection($livros);
    }

    public function details($id){
        try{
            $livro = $this->livroService->details($id);

        }catch(ModelNotFoundException $e){
            return response()->json(['error'=>'livro not found'],404);
        }
        return new LivroResource($livro);
    }

    public function store(LivroStoreRequest $request)
    {
        $data = $request->validated();
        $livro = $this->livroService->store($data);

        return new LivroResource($livro);
    }

    public function update(int $id, LivroUpdateRequest $request){
        $data = $request->validated();
        try{
            $livro = $this->livroService->update($id, $data);
        }catch(ModelNotFoundException $e){
            return response()->json(['error'=>'livro not found'],404);
        }
        return new LivroResource($livro);
    }

    public function delete(int $id){
        try{
            $livro = $this->livroService->delete($id);
        }catch(ModelNotFoundException $e){
            return response()->json(['error'=>'livro not found'],404);
        }
        return new LivroResource($livro);
    }

    public function getReviews(int $id)
    {
        try {
            $reviews = $this->livroService->getReviews($id);
            return ReviewResource::collection($reviews);
           // return response()->json($reviews);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Livro não encontrado'], 404);
        }
    }

    public function getWithRelations()
    {
        $livros = $this->livroService->getWithRelations();
        return LivroResource::collection($livros);
    }

    public function getByAutorId(int $id)
    {
        $livros = $this->livroService->getByAutorId($id);
        return LivroResource::collection($livros);
    }

        public function getByGeneroId(int $id)
    {
        $livros = $this->livroService->getByGeneroId($id);
        return LivroResource::collection($livros);
    }


    // public function getWithCategory(){
    //     $livros = $this->livroService->getWithCategory();
    //     return LivroResource::collection($livros);
    // }

    // public function findCategory(int $id){
    //     try{
    //         $category = $this->livroService->findCategory($id);
    //     }catch(ModelNotFoundException $e){
    //         return response()->json(['error'=>'livro not found'],404);
    //     }
    //     return response()->json($category);
    // }
}
