<?php
use Evenement\EventEmitterInterface;

return function(EventEmitterInterface $emitter) {
    \Peridot\Plugin\Lumen\register(require __DIR__ . '/backend/bootstrap.php');
};