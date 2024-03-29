<?php

/**
 * Courierit Library
 *
 * @category Library
 * @package  Courierit
 * @author   Darryn Ten <darrynten@github.com>
 * @license  MIT <https://github.com/darrynten/courierit-php/blob/master/LICENSE>
 * @link     https://github.com/darrynten/courierit-php
 */

namespace DarrynTen\Courierit\Request;

use DarrynTen\Courierit\Exception\RequestHandlerException;
use DarrynTen\Courierit\Exception\ExceptionMessages;

/**
 * RequestHandler Class
 *
 * @category Library
 * @package  Courierit
 * @author   Darryn Ten <darrynten@github.com>
 * @license  MIT <https://github.com/darrynten/courierit-php/blob/master/LICENSE>
 * @link     https://github.com/darrynten/courierit-php
 */
class RequestHandler
{
    /**
     * Soap Client
     *
     * @var \SoapClient $client
     */
    private $client;

    /**
     * The WSDL address
     *
     * @var string $wsdl
     */
    private $wsdl;

    /**
     * Request handler constructor
     *
     * @param array $config The connection config
     */
    public function __construct(array $config)
    {
        if (array_key_exists('wsdl', $config)) {
            $this->wsdl = $config['wsdl'];
        }

        $this->client = new \SoapClient(
            $this->wsdl,
            [
                'soap_version' => SOAP_1_2,
                'exceptions' => true,
            ]
        );
    }

    /**
     * Add a waybill with attached collection request
     */
    public function addClientWaybillWithCollectionRequest($params = [])
    {
        try {
            $response = $this->client->addClientWaybillWithCollectionRequest($params);
        } catch (\SoapFault $exception) {
            $this->handleException($exception);
        }

        return $response;
    }

    /**
     * Login
     */
    public function Login($username, $password)
    {
        $params = [
            'strUserName' => $username,
            'strPassword' => $password,
        ];

        try {
            $response = $this->client->Login($params);
        } catch (\SoapFault $exception) {
            $this->handleException($exception);
        }

        return $response;
    }

    /**
     * Add a waybill with attached collection request
     */
    public function GetTrackingXML($params = [])
    {
        try {
            $response = $this->client->GetTrackingXML($params);
        } catch (\SoapFault $exception) {
            $this->handleException($exception);
        }

        return $response;
    }

    /**
     * Makes a request using Soap Client
     *
     * @param string $method The services method
     * @param array $parameters Request parameters
     * @return stdClass
     * @internal param string $verb The HTTP request verb (GET/POST/etc)
     * @internal param string $service The api service
     * @internal param array $options Request options
     */
    public function makeRequest(string $method, array $parameters)
    {
        try {
            $response = $this->client->__soapCall($method, array($parameters));
        } catch (\SoapFault $exception) {
            $this->handleException($exception);
        }

        return $response;
    }

    /**
     * Makes a request using SoapClient
     *
     * @param string $method The services method
     * @param array $parameters Request parameters
     * @return stdClass
     * @internal param array $options Request options
     * @see RequestHandler::request()
     *
     */
    public function handleRequest(string $method, array $parameters = [])
    {
        $response = $this->makeRequest($method, $parameters);

        return ($response);
    }

    /**
     * Handles all API exceptions, and adds the official exception terms
     * to the message.
     *
     * @param RequestException the original exception
     *
     * @throws RequestHandlerException
     */
    private function handleException($exception)
    {
        $code = $exception->faultcode();
        $message = $exception->faultstring();

        $title = sprintf(
            '%s: %s - %s',
            $code,
            ExceptionMessages::$strings[$code],
            $message
        );

        throw new RequestHandlerException($title, $exception->getCode(), $exception);
    }

    /**
     * Makes a request to Courierit
     *
     * @param string $method
     * @param array $parameters The request parameters
     * @return stdClass
     * @internal param bool $returnResponse If set to true, returns actual response
     *
     */
    public function request(string $method, array $parameters = [])
    {
        return $this->handleRequest(
            $method,
            $parameters
        );
    }

    public function requestRaw(string $method, array $parameters = [])
    {

        $response = $this->makeRequest(
            $method,
            $parameters
        );

        return $response;
    }

    public function makeMockClient($client)
    {
        $this->client = $client;
    }
}
