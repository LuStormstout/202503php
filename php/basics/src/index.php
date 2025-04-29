<?php

use Cowsayphp\Farm;
use Cowsayphp\Farm\Cow;
use Cowsayphp\Farm\Dragon;

require_once "../vendor/autoload.php";

$cow = Farm::create(Cow::class);
echo "<pre>" . $cow->say("Ohmg I'm a cow!") . "</pre>";

$dragon = Farm::create(Dragon::class);
echo "<pre>" . $dragon->say("Dragon!") . "</pre>";