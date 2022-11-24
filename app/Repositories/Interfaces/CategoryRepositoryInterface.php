<?php

namespace App\Repositories\Interfaces;

Interface CategoryRepositoryInterface{
    public function index();
    public function store(array $data);
    public function edit($id);
    public function destroy($id);
    public function restore($id);

  
}