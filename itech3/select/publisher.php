<?php

declare(strict_types=1);

require_once __DIR__ . '/../connection.php';

$publishers = $db->literature->distinct('publisher');