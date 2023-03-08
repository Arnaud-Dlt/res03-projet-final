<?php

class PageController extends AbstractController {
    private AdminManager $um;

    public function __construct()
    {
        $this->um = new AdminManager();
    }

    public function getAdmins()
    {
        
    }
}