<?php

/**
 * routes.php
 * includes all the GET/POST url routes we'll be using
 *
 * @author Johnathan Tiong <johnathan.tiong@gmail.com>
 * @since 2020.07.27
 * @version v1.0.0
 *
 */

foreach (glob("routes/*.php") as $filename)
{
    include $filename;
}

// ERROR: 404
$base->notFound(function () {
    return Error::notFound([ 'path' => $_SERVER['REQUEST_URI'] ]);
});
