<?php

error_reporting(E_ALL);

$ROOT_DIR = realpath(dirname(__FILE__) . '/lib-php/');
$GEN_DIR = realpath(dirname(__FILE__)) . '/gen-php/';
require_once $ROOT_DIR . '/Thrift/ClassLoader/ThriftClassLoader.php';

use Thrift\ClassLoader\ThriftClassLoader;
use Thrift\Protocol\TBinaryProtocol;
use Thrift\Transport\TSocket;
use Thrift\Transport\TBufferedTransport;

$loader = new ThriftClassLoader();
$loader->registerNamespace('Thrift', $ROOT_DIR);
$loader->registerDefinition('Sample', $GEN_DIR);
$loader->register();

try {
    $socket = new TSocket('localhost', 9090);
    $transport = new TBufferedTransport($socket, 1024, 1024);
    $protocol = new TBinaryProtocol($transport);
    $client = new \Sample\GreeterClient($protocol);

    $transport->open();

    try {
        $user = new \Sample\User();
        $user->id = 100;
        $user->name = "test";
        $user->avatar = "avatar";
        $user->address = "address";
        $user->mobile = "mobile";
        $rep = $client->SayHello($user);
        var_dump($rep);

        $rep = $client->GetUser(100);
        var_dump($rep);

    } catch (\tutorial\InvalidOperation $io) {
        print "InvalidOperation: $io->why\n";
    }

    $transport->close();

} catch (TException $tx) {
    print 'TException: ' . $tx->getMessage() . "\n";
}

?>