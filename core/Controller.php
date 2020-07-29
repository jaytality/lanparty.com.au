<?php
/**
 * Controller
 * Page Controller class
 *
 * @author Johnathan Tiong <johnathan.tiong@gmail.com>
 * @since 2020.07.27
 *
 */
class Controller
{
    protected $data = [];
    protected $alert;
    protected $logger;
    protected $view;

    public function __construct()
    {
        $this->alert = new Alert();
        $this->logger = new Log();
        $this->view = new View();
    }
}
