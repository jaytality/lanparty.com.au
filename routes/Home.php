<?php

$base->get("/", function () {
    $controller = new Home;
    return $controller->{'index'}();
});

    $base->post("/", function () {
        $controller = new Home;
        return $controller->{'index'}($_POST);
    });
