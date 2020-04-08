<?php

namespace Core\Repositories;

interface RoleRepositoryContract
{
    public function paginate();
    public function find($id);
    public function store($data);
    public function update($id, $data);
    public function destroy($id);
    public function show($id);
    public function showPermission($id);

}