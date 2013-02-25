<?php

$defaults = array(
    'root' => '/var/www/html/pub/',
    'remote-user' => 'ec2-user',
);

$aliases = array(
    'waldorf' => array(
        'uri'  => $host = 'awseb-waldorf-197549463.us-east-1.elb.amazonaws.com',
        'remote-host' => $host,
    ) + $defaults,
    'statler' => array(
        'uri'  => $host = 'awseb-statler-14751722.us-east-1.elb.amazonaws.com',
        'remote-host' => $host,
    ) + $defaults,
    'prd' => array(
        'uri'  => $host = 'prd-www-kony.elasticbeanstalk.com',
        'remote-host' => $host,
    ) + $defaults,
    'stg' => array(
        'uri'  => $host = 'stg-www-kony.elasticbeanstalk.com',
        'remote-host' => $host,
    ) + $defaults,
) + $aliases;
