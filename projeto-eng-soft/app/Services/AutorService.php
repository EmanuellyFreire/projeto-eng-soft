<?php

namespace App\Services;

use App\Repositories\AutorRepository;

class AutorService
{
    private AutorRepository $autorRepository;

    public function __construct(AutorRepository $autorRepository){
        $this->autorRepository = $autorRepository;
    }

    public function get(){
        $autors = $this->autorRepository->get();
        return $autors;
    }

    public function details($id){
        return $this->autorRepository->details($id);
    }

    public function store(array $data){
        return $this->autorRepository->store($data);
    }

    public function update($id, $data){
        $autor = $this->autorRepository->update($id,$data);
        return $autor;

    }

    public function delete(int $id){
        return $this->autorRepository->delete($id);
    }

}