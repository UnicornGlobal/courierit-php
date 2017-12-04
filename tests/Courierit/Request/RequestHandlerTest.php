<?php

namespace DarrynTen\Courierit\Tests\Courierit\Request;

use DarrynTen\Courierit\Config;
use DarrynTen\Courierit\Request\RequestHandler;
use InterNations\Component\HttpMock\PHPUnit\HttpMockTrait;

class RequestHandlerTest extends \PHPUnit_Framework_TestCase
{
    use HttpMockTrait;



    public function testSoap(){
        $parameters = [
            'UserName' => 'test',
            'Password' => 'test',
        ];
        $config = new Config([]);

        $soapClientMock = $this->getMockFromWsdl($config->getRequestHandlerConfig()['wsdl']);

        $result = new \stdClass();
        $result->LoginResult = '-1';

        $soapClientMock->expects($this->any())
                       ->method('Login')
                       ->will($this->returnValue($result));

        $this->assertEquals($result, $soapClientMock->Login($parameters));
    }
}
