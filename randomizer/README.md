# Randomizer

## Installation

1. Open this file: /user/addons/randomizer/pi.randomizer.php
2. Fill the array with as many quotes as you want.
3. Then place the following tag in any of your templates:

```
{exp:randomizer:set_one}
```

To add another sets of quotes, add another function:

```
function set_two()
{
	$quotes = array( FILL WITH QUOTES);

	return $quotes[array_rand($quotes)];
}
```

Then use this tag in your template:

	{exp:randomizer:set_two}

## Usage

### `{exp:randomizer:set_one}`

#### Example Usage	

```
{exp:randomizer:set_one}
```	

## Change Log

### 2.0

- Updated plugin to be 3.0 compatible

### 1.1

- Updated plugin to be 2.0 compatible
