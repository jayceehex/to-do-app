<?php

$router->group(["prefix" => "tasks"], function ($router) {
    $router->post("", "Tasks@store");
    $router->get("", "Tasks@store");
});