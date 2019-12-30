<?php 
    /**
     * This is the Middleware used for authenticate the app.
     * Middleware will be executed on entry point of the slim app as well as exit point of the slim app.
     * Just create the middleware like this and include index file.
     */
	$container = $app->getContainer(); 	//	Initialize the container to access the previously stored keys.

	$app->add(new Slim\Middleware\HttpBasicAuthentication([ 	//	Auth method added. (Ex. Basic-Auth).
		"secure" => false, 			//	It will handle the http and https.
		"path" => ["/basic-auth"],	// 	Multiple auth route added here. This route will be authenticated by Auth Method. (Ex. "path" => ["/jwt-auth", "new-route"]).
		"users" => [
			"admin" => "admin",
			$container->get("username") => $container->get("password")	//	This is Basic-Auth username and password structure. Container keys accessed like this.
		],
		"error" => function ($request, $response, $arguments){	//	Error response constructed like this.
			$data["status"] = false;
        	$data["message"] = $arguments["message"];
        	return $response
	            ->withHeader("Content-Type", "application/json")
	            ->withJson($data, 200);
		}
	]));

	$app->add(new \Slim\Middleware\JwtAuthentication([ 	//	Auth method added. (Ex. JWT-Auth).
	    "secret" => $app->getContainer()->get('key'), 	//	Container keys accessed like this.
	    "secure" => false, 			//	It will handle the http and https.
	    "path" => ["/jwt-auth"],	// 	Multiple auth route added here. This route will be authenticated by Auth Method. (Ex. "path" => ["/jwt-auth", "new-route"]).
	    "error" => function ($request, $response, $arguments) {	//	Error response constructed like this.
	        $data["status"] = false;
	        $data["message"] = $arguments["message"];
	        return $response
	            ->withHeader("Content-Type", "application/json")
	            ->withJson($data, 200);
	    }
	]));