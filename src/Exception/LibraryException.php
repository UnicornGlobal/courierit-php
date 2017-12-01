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
 * Library exception for Courierit
 *
 * @package Courierit
 */
class LibraryException extends Exception
{
    const METHOD_NOT_IMPLEMENTED = 10301;

    /**
     * Custom NotYetImplemented exception handler
     * @var int $code default code [10300]
     * @var string $address should contain address.
     */
    public function __construct($code = 10300, $address = '')
    {
        $message = sprintf(
            'Error, "%s" %s.',
            $address,
            ExceptionMessages::$libraryErrorMessages[$code]
        );
        parent::__construct($message, $code);
    }
}
