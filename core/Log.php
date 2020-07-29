<?php

/**
 * Log
 * this is a logging class, for the purpose of logging all of eLeague.gg's interactions to the database. Ideally there
 * are multiple scopes with which a log entry can be created:
 *
 * @copyright Johnathan Tiong, 2014 to present date
 * @author Johnathan Tiong <johnathan.tiong@gmail.com>
 */
class Log
{
    /**
     * create
     * creates a log entry into the database, this is not editable by anyone
     * @param  array  $data [
     *                          'user_id' => the user who caused the action (if any)
     *                          'message' => message/action name,
     *                          'payload' => any attached, extra data (json arrays, objects, etc)
     *                      ]
     * @return
     */
    public function create($data = [])
    {
        $log = R::dispense('logs');
        $log['time']    = time();
        $log['user_id'] = isset($data['user_id']) ? $data['user_id'] : 0;
        $log['message'] = $data['message'];
        $log['payload'] = $data['payload'];
        R::store($log);
    }
}
