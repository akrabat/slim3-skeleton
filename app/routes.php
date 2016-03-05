<?php
// Routes

$app->get('/', App\Action\HomeAction::class)
    ->setName('homepage');
