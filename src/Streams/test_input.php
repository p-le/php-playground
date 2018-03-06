<?php

namespace Playground\Streams;

require_once 'vendor/autoload.php';

use React\EventLoop\Factory;
use React\Http\Server as HttpServer;
use Psr\Http\Message\ServerRequestInterface;
use React\Http\Response;
use React\Socket\Server as SocketServer;

$loop = Factory::create();

$server = new HttpServer(function (ServerRequestInterface $request) {
    return new Response(200, ['Content-type' => 'text/plain'], "Hello World!_n");
});
$socket = new SocketServer(8081, $loop);
$server->listen($socket);
$loop->run();
// $input = file_get_contents('php://input');
// parse_str($input, $params);
// var_dump($params);
