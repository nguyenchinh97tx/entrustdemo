<?php

namespace Core\Services;

interface BookServiceContract
{
    public function paginate();
    public function find($id);
    public function store($request);
    public function update($request, $id);
    public function destroy($id);
    public function show($id);
    public function download($id);
    public function uploadFile($request);
    public function uploadImage($request);
    public function createOrUpdate($request);
}