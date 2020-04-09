<?php

namespace Core\Services;

interface UserServiceContract
{
    public function paginate();
    public function find($id);
    public function store($data);
    public function update($id, $request);
    public function destroy($id);
    public function show($id);
    public function editUser($id);
    public function listRole();
}