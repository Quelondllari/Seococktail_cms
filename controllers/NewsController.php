<?php

include_once DOC_ROOT . '/models/News.php';

class NewsController
{
    public function __construct()
    {
        return true;
    }

    public function actionIndex()
    {
        echo 'Список новостей';
        return true;
    }

    public function actionView($category, $url)
    {
        echo $category;
        echo $url;
        return true;
    }
}