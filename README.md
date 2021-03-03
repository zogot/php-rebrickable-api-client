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
| Endpoint | Path | Implemented |
| -------- | ----------- | ---- |
| /api/v3/lego/colors/ | [GetColors](src/Lego/Color/Request/GetColors.php) | ✔️ |
| /api/v3/lego/colors/{id}/ | GetColorsById | ❌ |
| /api/v3/lego/elements/{element_id}/ | GetElementById | ❌ |
| /api/v3/lego/minifigs/ | GetMinifigs | ❌ |
| /api/v3/lego/minifigs/{set_num}/ | GetMinifigById | ❌ |
| /api/v3/lego/minifigs/{set_num}/parts/ | GetMinifigPartsById | ❌ |
| /api/v3/lego/minifigs/{set_num}/sets/ | GetMinifigSetsById | ❌ |
| /api/v3/lego/minifigs/part_categories/ | GetPartCategories | ❌ |
| /api/v3/lego/minifigs/part_categories/{id}/ | GetPartCategoryById | ❌ |
| /api/v3/lego/minifigs/parts/ | GetParts | ❌ |
| /api/v3/lego/minifigs/parts/{part_num}/ | GetPartByNumber | ❌ |
| /api/v3/lego/minifigs/parts/{part_num}/colors/ | GetPartColor | ❌ |
| /api/v3/lego/minifigs/parts/{part_num}/colors/{color_id}/ | GetPartColorCombination | ❌ |
| /api/v3/lego/minifigs/parts/{part_num}/colors/{color_id}/sets/ | GetPartColorCombinationSets | ❌ |
| /api/v3/lego/minifigs/sets/ | GetSets | ❌ |
| /api/v3/lego/minifigs/sets/{set_num}/ | GetSetsById | ❌ |
| /api/v3/lego/minifigs/sets/{set_num}/alternates/ | GetAlternatesForSet | ❌ |
| /api/v3/lego/minifigs/sets/{set_num}/minifigs/ | GetMinifigsInSet | ❌ |
| /api/v3/lego/minifigs/sets/{set_num}/parts/ | GetPartsInSet | ❌ |
| /api/v3/lego/minifigs/sets/{set_num}/sets/ | GetInventorySetsInSet | ❌ |
| /api/v3/lego/minifigs/themes/ | GetThemes | ❌ |
| /api/v3/lego/minifigs/themes/{id}/ | GetThemesById | ❌ |

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
