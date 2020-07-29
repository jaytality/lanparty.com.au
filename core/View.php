<?php

class View
{
    public function load($path = '', $data = [])
    {
        include(VIEW . '/head.php');
        if (empty($path)) {
            include(VIEW . '/index.php');
        } else {
            if (isset($data['page']['layout'])) {
                include(VIEW . '/_layouts/' . $data['page']['layout'] . '.php');
            } else {
                include(VIEW . '/' . $path . '.php');
            }
        }
        include(VIEW . '/foot.php');
    }
}
