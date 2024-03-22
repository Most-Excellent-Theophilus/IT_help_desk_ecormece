<?php

class SurveyQuestions 
{
        
    public static function index()
    {
        $model = new SurveyQuestions_model ;
        $model->getAll();

    }


    public static function store($data)
    {
        $model = new SurveyQuestions_model ;
        $model->create($data);

    }


    public static function show($id)
    {
        $model = new SurveyQuestions_model ;
        $model->read($id);


    }


    public static function update($id,$data)
    {
        $model = new SurveyQuestions_model ;
        $model->update($id,$data);

    }


    public static function destroy($id)
    {
        $model = new SurveyQuestions_model ;
        $model->delete($id);

    }
    public static function search()
    {
        $model = new SurveyQuestions_model ;
    }
}
