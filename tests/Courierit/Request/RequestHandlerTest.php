<?php

namespace DarrynTen\Courierit\Tests\Courierit\Request;

use DarrynTen\Courierit\Request\RequestHandler;
use InterNations\Component\HttpMock\PHPUnit\HttpMockTrait;

class RequestHandlerTest extends \PHPUnit_Framework_TestCase
{
    use HttpMockTrait;



    public function testSoap(){
        $config = [
            'endpoint' => 'http://www.citwebservices.co.za/citwebservices.asmx'
        ];
        $parameters = [
            'UserName' => 'test',
            'Password' => 'test',
        ];
        $client = new RequestHandler($config);
        $response = $client->requestRaw("Login", $parameters);
        var_dump($response);
    }
}
