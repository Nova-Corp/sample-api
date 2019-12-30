<?php
	use \Firebase\JWT\JWT;
	// use \Tuupola\Base62;

	function generateToken($data){
	    $payload = [
	        "name" => $data['name'],
	        "phone" => $data['phone']
	    ];
	    $secret = $data['key'];
	    return JWT::encode($payload, $secret, "HS256");
	}