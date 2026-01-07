<?php

require_once APPPATH . 'libraries/Faker/src/autoload.php';

use Faker\Factory;

function getFaker()
{
    return Factory::create();
}
