# PHP library for cypto-rand-secure
## usage

composer require almadus/crypto-rand-secure

#Example

Create the php file example index.php and paste this code

<?php 


require __DIR__.'/../vendor/autoload.php';

$config = [
	"uppercase" => true,
	"lowercase" => true,
	"numeric" => true,
	"length" => 10
];

$crypto = new Almadus\CryptoRandSecure($config);

var_dump($crypto->getToken());
