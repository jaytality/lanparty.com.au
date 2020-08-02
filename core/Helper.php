<?php

class Helper
{
    public function debugMsg($data)
    {
        echo '<pre>';
        print_r($data);
    }

    public function niceTimePast($timestamp)
    {
        $seconds      = time() - $timestamp;
        $minutes      = round((time() - $timestamp) / 60);
        $hours        = round((time() - $timestamp) / 3600);
        $days         = round((time() - $timestamp) / 86400);
        $weeks        = round((time() - $timestamp) / 604800);
        $months       = round((time() - $timestamp) / 2600640);
        $years        = round((time() - $timestamp) / 31207680);

        if ($seconds <= 60) {
            return "just now";
        } else if ($minutes < 60) {
            return ($minutes == 1) ? "a minute ago" : "$minutes minutes ago";
        } else if ($hours < 24) {
            return ($hours == 1) ? "an hour ago" : "$hours hours ago";
        } else if ($days < 6) {
            return ($days == 1) ? "a day ago" : "$days days ago";
        } else if ($weeks < 4) {
            return ($weeks == 1) ? "a week ago" : "$weeks weeks ago";
        } else if ($months < 12) {
            return ($months == 1) ? "a month ago" : "$months months ago";
        } else if ($years >= 1) {
            return "$years years ago";
        }
    }

    public function niceTimeFuture($timestamp)
    {
        $seconds      = $timestamp - time();
        $minutes      = round(($timestamp - time()) / 60);
        $hours        = round(($timestamp - time()) / 3600);
        $days         = round(($timestamp - time()) / 86400);
        $weeks        = round(($timestamp - time()) / 604800);
        $months       = round(($timestamp - time()) / 2600640);
        $years        = round(($timestamp - time()) / 31207680);

        if ($seconds <= 60) {
            return "in a few seconds";
        } else if ($minutes < 60) {
            return ($minutes == 1) ? "in a minute" : "$minutes minutes";
        } else if ($hours < 24) {
            return ($hours == 1) ? "in an hour" : "$hours hours";
        } else if ($days < 6) {
            return ($days == 1) ? "in a day" : "$days days";
        } else if ($weeks < 4) {
            return ($weeks == 1) ? "in a week" : "$weeks weeks";
        } else if ($months < 12) {
            return ($months == 1) ? "in a month" : "$months months";
        } else if ($years >= 1) {
            return "$years years";
        }
    }

    public function genSlug($text)
    {
        $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
        $text = trim($text, '-');
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        $text = strtolower($text);
        $text = preg_replace('~[^-\w]+~', '', $text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }

    public function sendMail($recipient, $subject, $body)
    {
        $user = R::load('users_details', $user_id);

        if ($user['id'] != 0) {
            // SEND AN EMAIL NOTIFYING USER
            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->Host       = '';
            $mail->SMTPAuth   = true;
            $mail->Username   = '';
            $mail->Password   = '';
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;
            $mail->setFrom('mailaddress', 'name');
            $mail->addAddress($recipient);
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $body;

            if(!$mail->send()) {
                die("Send Mail Error");
                return false;
            }

            return true;
        }

        return false;
    }
}
