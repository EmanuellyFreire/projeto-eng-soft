<?php

namespace App\Repositories;

use App\Models\Livro;

class LivroRepository
{
    public function get(){
        return Livro::all();
    }

    public function details(int $id){
        return Livro::findOrFail($id);
    }

    public function store(array $data){
        return Livro::create($data);
    }

    public function update(int $id, array $data){
        $livro = $this->details($id);
        $livro->update($data);
        return $livro;
    }

    public function delete(int $id){
        $livro = $this->details($id);
        $livro->delete();
        return $livro;
    }

    public function getReviews(int $livroId)
    {
        $livro = Livro::findOrFail($livroId);
        return $livro->review;
    }

        public function getWithRelations()
    {
        return Livro::with(['autor', 'genero', 'review'])->get();
    }

    public function getByAutorId($id)
    {
        return Livro::where('autor_id', $id)->get();
    }

    public function getByGeneroId($id)
    {
        return Livro::where('genero_id', $id)->get();
    }



}