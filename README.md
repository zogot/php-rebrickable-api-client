# Rebrickable API Client
Provides the clients and data objects for communicating
with the Rebrickable API.

## Installation
```bash
composer require zogot/rebrickable-api-client 
```

## Usage

## Implemented

### Lego Data
| Endpoint | Implemented |
| -------- | ----------- |
| /api/v3/lego/colors/ | (/) |
| /api/v3/lego/colors/{id}/ | (x) |
| /api/v3/lego/elements/{element_id}/ | (x) |
| /api/v3/lego/minifigs/ | (x) |
| /api/v3/lego/minifigs/{set_num}/ | (x) |
| /api/v3/lego/minifigs/{set_num}/parts/ | (x) |
| /api/v3/lego/minifigs/{set_num}/sets/ | (x) |
| /api/v3/lego/minifigs/part_categories/ | (x) |
| /api/v3/lego/minifigs/part_categories/{id}/ | (x) |
| /api/v3/lego/minifigs/parts/ | (x) |
| /api/v3/lego/minifigs/parts/{part_num}/ | (x) |
| /api/v3/lego/minifigs/parts/{part_num}/colors/ | (x) |
| /api/v3/lego/minifigs/parts/{part_num}/colors/{color_id}/ | (x) |
| /api/v3/lego/minifigs/parts/{part_num}/colors/{color_id}/sets/ | (x) |
| /api/v3/lego/minifigs/sets/ | (x) |
| /api/v3/lego/minifigs/sets/{set_num}/ | (x) |
| /api/v3/lego/minifigs/sets/{set_num}/alternates/ | (x) |
| /api/v3/lego/minifigs/sets/{set_num}/minifigs/ | (x) |
| /api/v3/lego/minifigs/sets/{set_num}/parts/ | (x) |
| /api/v3/lego/minifigs/sets/{set_num}/sets/ | (x) |
| /api/v3/lego/minifigs/themes/ | (x) |
| /api/v3/lego/minifigs/themes/{id}/ | (x) |

### Users
Coming soon

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
