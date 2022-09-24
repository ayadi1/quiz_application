<?php

declare(strict_types=1);

namespace helper;


class Tools
{
    static public function Redirect($url, $permanent = false)
    {
        header('Location: ' . $url, true, $permanent ? 301 : 302);

        exit();
    }
}
