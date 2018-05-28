<?php
/**
 * Courierit API Exception
 *
 * @category Exception
 * @package  Courierit
 * @author   Fergus Strangways-Dixon <fergusdixon@github.com>
 * @license  MIT <https://github.com/darrynten/courierit-php/blob/master/LICENSE>
 * @link     https://github.com/darrynten/courierit-php
 */

namespace DarrynTen\Courierit\Exception;

use Exception;
use DarrynTen\Courierit\Exception\ExceptionMessages;

/**
 * Config exception for Courierit
 *
 * @package Courierit
 */
class ConfigException extends Exception
{
    const MISSING_API_KEY = 10401;

    /**
     * Custom Configs exception handler
     *
     *
     * @var integer $code The error code (as per above
     * @var string $extra Any additional information to be included
     */
    public function __construct($code = 10000)
    {
        $message = sprintf(
            'Config %s',
            ExceptionMessages::$configErrorMessages[$code]
        );

        parent::__construct($message, $code);
    }
}
