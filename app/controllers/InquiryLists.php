<?php

class InquiryLists 
{
      
    public static function index()
    {
        $model = new InquiryLists_model ;
        return $model->getAll();

    }


    public static function store($data)
    {
        $model = new InquiryLists_model ;
        return $model->create($data);

    }


    public static function show($id)
    {
        $model = new InquiryLists_model ;
        return $model->read($id);


    }


    public static function update($id,$data)
    {
        $model = new InquiryLists_model ;
        return $model->update($id,$data);

    }


    public static function destroy($id)
    {
        $model = new InquiryLists_model ;
        return $model->delete($id);

    }
    public static function search($data)
    {
        $model = new InquiryLists_model ;
        return $model->find($data);

    } 
}
