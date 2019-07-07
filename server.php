<?php
/**
 * Created by PhpStorm.
 * User: yujc@youshu.cc
 * Date: 2019-07-07
 * Time: 08:18
 */


error_reporting(E_ALL);

$ROOT_DIR = realpath(dirname(__FILE__) . '/lib-php/');
$GEN_DIR = realpath(dirname(__FILE__)) . '/gen-php/';
require_once $ROOT_DIR . '/Thrift/ClassLoader/ThriftClassLoader.php';

use Thrift\ClassLoader\ThriftClassLoader;
use Thrift\Protocol\TBinaryProtocol;
use Thrift\Transport\TSocket;
use Thrift\Transport\TBufferedTransport;
use \Thrift\Transport\TPhpStream;

$loader = new ThriftClassLoader();
$loader->registerNamespace('Thrift', $ROOT_DIR);
$loader->registerDefinition('Sample', $GEN_DIR);
$loader->register();

class Handler implements \Sample\GreeterIf {

    /**
     * @param \Sample\User $user
     * @return \Sample\Response
     */
    public function SayHello(\Sample\User $user)
    {
        $response = new \Sample\Response();
        $response->errCode = 0;
        $response->errMsg = "success";
        $response->data = [
            "user" => json_encode($user)
        ];

        return $response;
    }

    /**
     * @param int $uid
     * @return \Sample\Response
     */
    public function GetUser($uid)
    {
        $response = new \Sample\Response();
        $response->errCode = 1;
        $response->errMsg = "fail";
        return $response;
    }
}


header('Content-Type', 'application/x-thrift');
if (php_sapi_name() == 'cli') {
    echo "\r\n";
}

$handler = new Handler();
$processor = new \Sample\GreeterProcessor($handler);

$transport = new TBufferedTransport(new TPhpStream(TPhpStream::MODE_R | TPhpStream::MODE_W));
$protocol = new TBinaryProtocol($transport, true, true);

$transport->open();
$processor->process($protocol, $protocol);
$transport->close();