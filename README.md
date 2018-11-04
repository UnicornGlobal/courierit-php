# courierit-php

[Courierit](http://www.courierit.co.za/) Web Services Handler

## Overview

Courierit exposes a SOAP API for tracking orders, creating waybills, etc.

This handler supplies a straightforward process to interact with it.

## Usage

The [default WSDL schema](http://www.citwebservices.co.za/citwebservices.asmx?WSDL) is the live version, and can be overwritten using a `$config` array.

There is a `request` method that simply takes parameters and method you may need in a request, and returns the result:

```php
$config = [
    'wsdl' => env('COURIERIT_WSDL'),
];

$courierit = new DarrynTen\Courierit\Request\RequestHandler($config);

$parameters = [
    'strUserName' => 'test',
    'strPassword' => 'test',
];

$method = 'Login'

$result = $courierit->request($method, $parameters);
```

Some common methods have been built into the handler:
```php
$result = $courierit->Login($username, $password);
```

Completed methods include:
* Login
* addClientWaybillWithCollectionRequest
* GetTrackingXML

Please add more if you are able!

## Contributers

* [Darryn Ten](www.github.com/darrynten)
* [Fergus Strangways-Dixon](www.github.com/fergusdixon)

Add yourself to this list!
