# PHP library for cypto-rand-secure
## usage

composer require almadus/crypto-rand-secure

#Example

Create the php file example index.php and paste this code

<?php <br>


require __DIR__.'/../vendor/autoload.php'; <br>

$config = [ <br>
	"uppercase" => true, <br>
	"lowercase" => true, <br>
	"numeric" => true, <br>
	"length" => 10 <br>
]; <br>

$crypto = new Almadus\CryptoRandSecure($config); <br>

var_dump($crypto->getToken()); <br>
