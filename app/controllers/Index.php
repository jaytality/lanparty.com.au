<?php

class Index extends Controller
{
    public function __construct()
    {
        $this->view = new View;
    }

    public function index($data = [])
    {
        $this->data = [];

        $this->view->load('index/index', $this->data);
    }
}
