<?php

namespace Cms\Controller;

class HomeController extends CmsController
{
    public function index()
    {
        $data = ['name' => 'Artem'];
        $this->view->render('Index', $data);
    }
    public function news($id)
    {
        echo $id;
    }
}