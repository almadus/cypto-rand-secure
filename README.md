# PHP library for cypto-rand-secure
## Install With Composer

composer require almadus/crypto-rand-secure

## Code Sample

Create the php file example index.php and paste this code

<?php <br>


require __DIR__.'/../vendor/autoload.php'; <br>

$config = [ <br>
	"uppercase" => true, <br>
	"lowercase" => true, <br>
	"numeric" => true, <br>
	"length" => 10 <br>
]; <br><br>

$crypto = new Almadus\CryptoRandSecure($config); <br>

var_dump($crypto->getToken()); <br>
