<?php

class Inquiries 
{
      
    public static function index()
    {
        $model = new Inquiries_model ;
        return $model->getAll();

    }

    public static function count()
    {
        $model = new Inquiries_model;
        return $model->countAll();

    }
    public static function store($data)
    {
        $model = new Inquiries_model ;
        return $model->create($data);

    }


    public static function show($id)
    {
        $model = new Inquiries_model ;
        return $model->read($id);


    }


    public static function update($id,$data)
    {
        $model = new Inquiries_model ;
        return $model->update($id,$data);

    }


    public static function destroy($id)
    {
        $model = new Inquiries_model ;
        $model->delete($id);

    }
    public static function search($data)
    {
        $model = new Inquiries_model ;
        return $model->find($data);
    }  
}
