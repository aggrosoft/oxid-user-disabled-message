<?php

$sMetadataVersion = '2.0';

$aModule = array(
    'id'           => 'aguserdisabledmessage',
    'title'        => 'User disabled message',
    'description'  => 'Show descriptive message when user is disabled',
    'thumbnail'    => '',
    'version'      => '1.0.1',
    'author'       => 'Aggrosoft GmbH',
    'extend'      => array(
        \OxidEsales\Eshop\Application\Model\User::class => Aggrosoft\UserDisabledMessage\Application\Model\User::class
    )
);
