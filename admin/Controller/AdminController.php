<?php

namespace Admin\Controller;

use Engine\Controller;
use Engine\DI\DI;

class AdminController extends Controller
{
    public function __construct(DI $di)
    {
        parent::__construct($di);
    }
}