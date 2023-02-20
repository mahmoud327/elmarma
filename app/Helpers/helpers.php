<?php

use Illuminate\Support\Facades\URL;

function isActive($pageTitle)
{
    $url = URL::current();
    $domainName = substr($url, strrpos($url, '/') + 1);
    return $domainName == $pageTitle ? 'active' : ' ';
}
