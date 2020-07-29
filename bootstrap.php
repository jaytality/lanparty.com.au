<?php

// check if a cookie exists with a matching session
if (isset($_COOKIE['lanparty'])) {
    // if there is a cookie, split it into session_id and session id
    $cookie = explode(':', $_COOKIE['lanparty']);
    if (!empty($cookie)) {
        $session = R::load('users_sessions', $cookie[1]);

        $user = R::load('users_details', $session['user']);

        if ($session['id'] != 0) {
            $_SESSION = array(
                'auth' => true,
                'user' => [
                    // user details to keep track of
                ]
            );

            // update the session_id
            $session['session'] = session_id();
            R::store($session);
        }
    }
}
