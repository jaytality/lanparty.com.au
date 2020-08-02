<?php

class Model
{
    private $alert;
    private $logger;
    private $view;

    public function __construct()
    {
        $this->alert = new Alert();
        $this->logger = new Log();
        $this->view = new View();
    }
}
