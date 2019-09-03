<?php

// Twitter helpers

use Modules\TwitterMarketing\Entities\TwAccount;
use DG\Twitter\Twitter;
if (!function_exists('twitter')) {
    function twitter($account)
    {
        $config = TwAccount::find($account);
        $twitter = new Twitter($config->consumer_key, $config->consumer_secret, $config->access_token, $config->access_token_secret);
        return $twitter;
    }
}