# Rebrickable API Client
Provides the clients and data objects for communicating
with the Rebrickable API.

## Installation
```bash
composer require zogot/rebrickable-api-client 
```

## Usage

## Test
```bash
bin/build-responses
vendor/bin/phpunit
```

All tests run against a mock client as not
to hit the servers each run.

To ensure that its working with upto date api implementation
there is a script ```bin/build-responses``` that makes a call
to their API to generate the responses that are used for testing.

If you don't want to actually test the API calls themselves
you can run with following:

```vendor/bin/phpunit -c entities```

## Contributing
