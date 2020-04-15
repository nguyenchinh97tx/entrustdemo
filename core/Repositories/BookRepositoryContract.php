<?php

namespace Core\Repositories;

interface BookRepositoryContract
{
    public function paginate();
    public function find($id);
    public function store($data);
    public function update($request, $id);
    public function destroy($id);
    public function download($id);

}