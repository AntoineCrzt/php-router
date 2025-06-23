<?php

namespace Middlewares;

class Stats
{
    public function getStats()
    {
        $GLOBALS['nb_users'] = 1000;
        $GLOBALS['nb_topics'] = 500;
        $GLOBALS['nb_messages'] = 4242;
    }
}
