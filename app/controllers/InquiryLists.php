<?php

class InquiryLists 
{
      
    public static function index()
    {
        $model = new InquiryLists_model ;
        $model->getAll();

    }


    public static function store($data)
    {
        $model = new InquiryLists_model ;
        $model->create($data);

    }


    public static function show($id)
    {
        $model = new InquiryLists_model ;
        $model->read($id);


    }


    public static function update($id,$data)
    {
        $model = new InquiryLists_model ;
        $model->update($id,$data);

    }


    public static function destroy($id)
    {
        $model = new InquiryLists_model ;
        $model->delete($id);

    }
    public static function search($data)
    {
        $model = new InquiryLists_model ;
        $model->find($data);

    } 
}
