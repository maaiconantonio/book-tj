<?php

if (!function_exists('session')) {
    function session($key = null, $default = null)
    {
        $session = app('session');

        if (is_null($key)) {
            return $session;
        }

        if (is_array($key)) {
            foreach ($key as $k => $v) {
                $session->put($k, $v);
            }
            return;
        }

        return $session->get($key, $default);
    }
}
