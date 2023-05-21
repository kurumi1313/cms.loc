<?php

$this->router->add('dashboard', '/admin/login', 'LoginController:form');
$this->router->add('login', '/admin/', 'DashboardController:index');