<?php 
 
namespace Almadus;

class CryptoRandSecure
{ 
	private $config;

	public function __construct($config)
	{
		$this->config = $config; 
	}

	function crypto_rand_secure($min, $max)
	{
	    $range = $max - $min;
	    if ($range < 1) return $min; // not so random...
	    $log = ceil(log($range, 2));
	    $bytes = (int) ($log / 8) + 1; // length in bytes
	    $bits = (int) $log + 1; // length in bits
	    $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
	    do {
	        $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
	        $rnd = $rnd & $filter; // discard irrelevant bits
	    } while ($rnd > $range);
	    return $min + $rnd;
	}

	function getToken()
	{
	    $token = "";
	    $codeAlphabet = "";
	    $codeAlphabetArray = [
	    	"uppercase" => "ABCDEFGHIJKLMNOPQRSTUVWXYZ",
	    	"lowercase" => "abcdefghijklmnopqrstuvwxyz",
	    	"numeric" => "0123456789",
	    ];
	    foreach ($codeAlphabetArray as $key => $value) {
	    	if($this->config[$key] == true) {
	    		$codeAlphabet .= $value;
	    	} 
	    } 

	    $max = strlen($codeAlphabet); // edited

	    if($max > 0) {
	    	for ($i=0; $i < $this->config["length"]; $i++) {
		        $token .= $codeAlphabet[$this->crypto_rand_secure(0, $max-1)];
		    }

		    return $token;
	    } else {
	    	return "WARNING : Empty string";
	    }
	}
}