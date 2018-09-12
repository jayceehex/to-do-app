<?php

$router->group(["prefix" => "tasks"], function ($router) {
    $router->post("", "Tasks@store");
    $router->get("", "Tasks@index");
    $router->get("{task}", "Tasks@show");
    $router->put("{task}", "Tasks@update_all");
    $router->delete("{task}", "Tasks@destroy");
    $router->patch("{task}", "Tasks@update_completed");
});