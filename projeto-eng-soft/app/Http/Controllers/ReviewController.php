<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ReviewService;
use App\Http\Requests\ReviewStoreRequest;
use App\Http\Requests\ReviewUpdateRequest;
use App\Http\Resources\ReviewResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ReviewController extends Controller
{
    private ReviewService $reviewService;
    public function __construct(ReviewService $reviewService)
    {
        $this->reviewService = $reviewService;
    }

    public function get()
    {
        $reviews = $this->reviewService->get();
        return ReviewResource::collection($reviews);
    }

    public function details($id){
        try{
            $review = $this->reviewService->details($id);

        }catch(ModelNotFoundException $e){
            return response()->json(['error'=>'review not found'],404);
        }
        return new ReviewResource($review);
    }

    public function store(ReviewStoreRequest $request)
    {
        $data = $request->validated();
        $review = $this->reviewService->store($data);

        return new ReviewResource($review);
    }

    public function update(int $id, ReviewUpdateRequest $request){
        $data = $request->validated();
        try{
            $review = $this->reviewService->update($id, $data);
        }catch(ModelNotFoundException $e){
            return response()->json(['error'=>'review not found'],404);
        }
        return new ReviewResource($review);
    }

    public function delete(int $id){
        try{
            $review = $this->reviewService->delete($id);
        }catch(ModelNotFoundException $e){
            return response()->json(['error'=>'review not found'],404);
        }
        return new ReviewResource($review);
    }

    // public function getWithCategory(){
    //     $reviews = $this->reviewService->getWithCategory();
    //     return ReviewResource::collection($reviews);
    // }

    // public function findCategory(int $id){
    //     try{
    //         $category = $this->reviewService->findCategory($id);
    //     }catch(ModelNotFoundException $e){
    //         return response()->json(['error'=>'review not found'],404);
    //     }
    //     return response()->json($category);
    // }
}
