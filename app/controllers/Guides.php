<?php

class Guides 
{
      
    public static function index()
    {
        $model = new Guides_model ;
        $model->getAll();

    }


    public static function store($data)
    {
        $model = new Guides_model ;
        $model->create($data);

    }


    public static function show($id)
    {
        $model = new Guides_model ;
        $model->read($id);


    }


    public static function update($id,$data)
    {
        $model = new Guides_model ;
        $model->update($id,$data);

    }


    public static function destroy($id)
    {
        $model = new Guides_model ;
        $model->delete($id);

    }
    public static function search()
    {
        $model = new Guides_model ;
    }  
}