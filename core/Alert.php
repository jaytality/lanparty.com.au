<?php

class Alert
{
    public function create($data)
    {
        if (!empty($data)) {
            $alert = R::dispense('alerts');
            $alert['created']    = time();
            $alert['recipients'] = json_encode($data['recipients']);
            $alert['title']      = $data['title'];
            $alert['message']    = $data['message'];
            $alert['style']      = $data['style'];
            $alert['viewed']     = 0;
            $alert = R::store($alert);

            return $alert != 0;
        }

        return false;
    }

    public function getUnreadAlertsList($user_id)
    {
        $alertList = [];

        $alerts = R::find('alerts', ' viewed = 0');

        foreach ($alerts as $alert) {
            $recipients = json_decode($alert['recipients']);
            if (in_array($user_id, $recipients)) {
                array_push($alertList, $alert['id']);
            }
        }

        return $alertList;
    }
}
