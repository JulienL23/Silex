<?php
// app/config/dev.php

// Inclus toutes les configurations de prod.php
require __DIR__ . '/prod.php';

// Mode de debug :
$app['debug'] = true;
