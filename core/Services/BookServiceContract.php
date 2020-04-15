<?php

namespace Core\Services;

interface BookServiceContract
{
    public function paginate();
    public function find($id);
    public function store($data);
    public function update($request, $id);
    public function destroy($id);
    public function show($id);
    public function download($id);
}