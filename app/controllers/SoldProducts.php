<?php

class SoldProducts 
{
        
    public static function index()
    {
        $model = new SoldProducts_model ;
        $model->getAll();

    }


    public static function store($data)
    {
        $model = new SoldProducts_model ;
        $model->create($data);

    }


    public static function show($id)
    {
        $model = new SoldProducts_model ;
        $model->read($id);


    }


    public static function update($id,$data)
    {
        $model = new SoldProducts_model ;
        $model->update($id,$data);

    }


    public static function destroy($id)
    {
        $model = new SoldProducts_model ;
        $model->delete($id);

    }
    public static function search()
    {
        $model = new SoldProducts_model ;
    }
}