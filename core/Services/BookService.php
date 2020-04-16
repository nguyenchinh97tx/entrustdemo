<?php

namespace Core\Services;

use Core\Repositories\BookRepositoryContract;

class BookService implements BookServiceContract
{
    protected $repository;

    public function __construct(BookRepositoryContract $repository)
    {
        return $this->repository = $repository;
    }

    public function paginate()
    {
        return $this->repository->paginate();
    }

    public function find($id)
    {
        return $this->repository->find($id);
    }

    public function store($request)
    {
        $data = $this->createOrUpdate($request);
        return $this->repository->store($data);
    }

    public function update($request, $id)
    {
        $data = $this->createOrUpdate($request);
        return $this->repository->update($data,$id);
    }

    public function destroy($id)
    {
        return $this->repository->destroy($id);
    }
    public function show($id)
    {
        return $this->repository->show($id);
    }
    public function download($id)
    {
        return $this->repository->download($id);
    }
    public function uploadFile($request)
    {
        if ($request->hasFile('attachfile')) {
            $image = $request->file('attachfile');
            $nameFile = time().$image->getClientOriginalName();
            $path = storage_path('/files');
            $image->move($path, $nameFile);
            return $nameFile;
        }
        return '';
    }

    public function uploadImage($request){
        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $nameImage = time().$image->getClientOriginalName();
            $path = public_path('/images');
            $image->move($path, $nameImage);
            return $nameImage;
        }
        return '';
    }

    public function createOrUpdate($request){
        $nameImage = $this->uploadImage($request);
        $nameFile = $this->uploadFile($request);
        $request->merge([
            'image' => $nameImage,
            'file' => $nameFile,
        ]);
        return $request->all();
    }
}