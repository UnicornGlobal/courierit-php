<?php

namespace DarrynTen\Courierit;

use DarrynTen\Courierit\Exception\ConfigException;
use DarrynTen\Courierit\Exception\RequestHandlerException;

/**
 * Courierit Config
 *
 * @category Configuration
 * @package  CourieritPHP
 * @author   Darryn Ten <darrynten@github.com>
 * @license  MIT <https://github.com/darrynten/courierit-php/LICENSE>
 * @link     https://github.com/darrynten/courierit-php
 */
class Config
{
    /**
     * The endpoint
     *
     * @var string $endpoint
     */
    public $endpoint = 'http://www.citwebservices.co.za/citwebservices.asmx';

    /**
     * Construct the config object
     *
     * @param array $config An array of configuration options
     */
    public function __construct($config)
    {
        // optionals
        $this->checkAndSetOverrides($config);
    }

    /**
     * Check and set any overriding elements.
     *
     * Optionals:
     *
     *   - Endpoint
     *
     * @param array $config An array of configuration options
     */
    private function checkAndSetOverrides($config)
    {
        if (isset($config['endpoint']) && !empty($config['endpoint'])) {
            $this->endpoint = (string)$config['endpoint'];
        }
    }

    /**
     * Retrieves the expected config for the API
     *
     * @return array
     */
    public function getRequestHandlerConfig()
    {
        $config = [
            'endpoint' => $this->endpoint,
        ];

        return $config;
    }
}
