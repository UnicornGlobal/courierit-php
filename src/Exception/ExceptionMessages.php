<?php

namespace DarrynTen\Courierit\Exception;

/**
 * Exception message strings for the ApiException object that gets throws.
 *
 * Maps to the Courierit docs.
 */
class ExceptionMessages
{
    /**
     * @var array $validationMessages [100xx codes]
     */
    public static $validationMessages = [
        10000 => 'Unknown validation error',
        10001 => 'Integer value is out of range',
        10002 => 'String length is out of range',
        10003 => 'String did not match validation regex',
        10004 => 'Validation type is invalid',
        10005 => 'filter_var failed to validate',
        10006 => 'Enum failed to validate',
    ];

    /**
     * @var array $modelErrorMessages [101xx codes]
     */
    public static $modelErrorMessages = [
        // Properties
        10110 => 'Property is referencing an undefined, non-primitive class',
        10111 => 'Property is null without nullable permission',
        10112 => 'A property is missing in the loadResult payload',
        10113 => 'Attempting to set a property that is not defined in the model',
        10114 => 'Attempting to set a read-only property',
        10115 => 'Unexpected class encountered while preparing row',
        10116 => 'Attempting to get an undefined property',
        10117 => 'ModelCollection is referencing an undefined, non-primitive class',
    ];

    /**
     * @var array $modelCollectionErrorMessages [102xx codes]
     */
    public static $modelCollectionErrorMessages = [
        10200 => 'Undefined model collection exception',
        10201 => 'Attempting to access undefined property',
        10202 => 'Missing required property in object',
    ];

    /**
     * @var array $libraryErrorMessages [103xx codes]
     */
    public static $libraryErrorMessages = [
        10300 => 'Library Error',
        10301 => 'Method not yet implemented. This still needs to be added, '
               . 'please consider contributing to the project.',
    ];

    /**
     * @var array $modelCollectionErrorMessages [104xx codes]
     */
    public static $configErrorMessages = [
        10400 => 'Unknown configuration error',
        10401 => 'API key missing',
    ];

    /**
     * @var array $strings map from http response codes to textual representation of errors
     */
    public static $strings = [
        1 => 'Found an invalid namespace for the SOAP Envelope element',
        2 => 'An immediate child element of the Header element, with the'
            .' mustUnderstand attribute set to "1", was not understood.',
        3 => 'The message was incorrectly formed or contained incorrect information.',
        4 => 'There was a problem with the server, so the message could not proceed.',
    ];
}
