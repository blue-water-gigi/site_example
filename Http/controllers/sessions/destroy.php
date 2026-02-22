<?php

declare(strict_types=1);

use Core\Session;

Session::destroy();

header('location: /');
exit();