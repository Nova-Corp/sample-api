<?php
    /**
     * This is Basic Example for The API Integeration.
     */
    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;

    require '../vendor/autoload.php';

//  This is configuration for the slim app. This is optional.
    $config = ['settings' => [
        'addContentLengthHeader' => false,
        'displayErrorDetails' => true,  //  It will show the clear slim error logs.
    ]];

    $c = new \Slim\Container($config);
    $c['key'] = 'Th!&is&e(RetKey4V@L!D@t!nGjWT';    //  This is the signature for JWT Auth-Token.
    $c['username'] = 'supercalifragilisticexpialidocious';  //  This is username for Basic-Auth.
    $c['password'] = 'Osseocarnisanguineoviscericartilaginonervomedullary'; //  This is password for Basic-Auth.

    $app = new \Slim\App($c);   //  Starting point of the slim app.

    require 'middleware.php';   //  This Middleware acts like constructor and destructor.
    require 'jwt-token.php';    //  It will generate JWT-Auth Token.
    require 'db/name.dao.php';  //  DB connection process here.

//  This is route process using GET-Method. Basic-Auth example used here and handled by Middleware.
    $app->get('/basic-auth/{name}', function (Request $request, Response $response, array $args) {
        $name = $args['name'];          //  Ex. {name} this parameter stored inside the $args. $args is the array
        $user = new UsersDetails;       //  SQL Connection created here.
        $dbName = $user->nameList();    //  SQL Result stored here.
        $response->getBody()->write(var_dump($dbName));     //  This body will be displayed, if Auth will be true. (Ex. Basic-Auth)
        $data = [
        		"name" => $name,
        		"phone" => "12345",
        		"key" => "Th!&is&e(RetKey4V@L!D@t!nGjWT"
        	];
        return $response    //  Response header can add like this.
    			->withHeader('Content-Type','application/json')  //  Accept header.
    			->withHeader('token', generateToken($data));     //  Custom header.
    });

//  This is route process using GET-Method. JWT-Auth example used here  and handled by Middleware.
    $app->get('/jwt-auth/{name}', function (Request $request, Response $response, array $args) {
        $name = $args['name'];
        $response->getBody()->write("Hello, $name. This is JWT Auth. It is Success!!!");     //  This body will be displayed, if Auth will be true. (Ex. JWT-Auth).
        return $response    //  Response header can add like this.
    			->withHeader('Content-Type','application/json')  //  Accept header.
    			->withHeader('token', '1234567890');             //  Custom header.
    });
    $app->run();






















