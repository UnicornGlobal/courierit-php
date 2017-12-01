<?php

namespace DarrynTen\Courierit\Tests\Courierit\Request;

use DarrynTen\Courierit\Request\RequestHandler;
use InterNations\Component\HttpMock\PHPUnit\HttpMockTrait;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use ReflectionClass;
use SoapClient;

class RequestHandlerTest extends \PHPUnit_Framework_TestCase
{
    use HttpMockTrait;

    private $config = [
        'key' => 'key',
        'endpoint' => '//localhost:8082',
    ];

    public static function testSoap(){
        $client = new SoapClient("http://www.citwebservices.co.za/citwebservices.asmx?WSDL");
        var_dump($client->__getFunctions());
        var_dump($client->__getTypes());
    }

//    public static function setUpBeforeClass()
//    {
//        static::setUpHttpMockBeforeClass('8082', 'localhost');
//
//
//    }

//    public static function tearDownAfterClass()
//    {
//        static::tearDownHttpMockAfterClass();
//    }
//
//    public function setUp()
//    {
//        $this->setUpHttpMock();
//    }
//
//    public function tearDown()
//    {
//        $this->tearDownHttpMock();
//    }
//
//    public function testInstanceOf()
//    {
//        $request = new RequestHandler($this->config);
//        $this->assertInstanceOf(RequestHandler::class, $request);
//    }
//
//    public function testRequest()
//    {
//        // TODO
//    }
//
//    public function testRequestPostWithJson()
//    {
//        // TODO
//    }
//
//    public function testRequestResponse()
//    {
//        // TODO
//    }
}
