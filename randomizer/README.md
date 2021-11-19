# Randomizer

The Randomizer plugin lets you generate or randomize content. It can be used to output a random item from a set of content, or it can generate random output for you (text, numbers, hashes, and more).

## Installation

1. Download the [latest release](https://github.com/EllisLab/Randomizer/releases/latest).
2. Copy the `randomizer` folder to your `system/user/addons` folder (you can ignore the rest of this repository's files).
3. In your ExpressionEngine control panel, visit the Add-On Manager and click Install next to "Randomizer" in the list of first-party add-ons.

## Usage

### `{exp:randomizer:generate}`

#### Example Usage

The Generate tag is used to generate and output random values. It can output letters, numbers, or specific patterns (like sha1 hashes).

In this example, we will use the tag twice to create random codes that could be used for redemption codes or similar. It avoids characters that are ambiguous in many typefaces (`0`, `O`, `l`, `1`, etc.) to prevent end user errors.

```
{exp:randomizer:generate type='alnum' length='4' avoid_ambiguous='yes'}-{exp:randomizer:generate type='alnum' length='4' avoid_ambiguous='yes'}

```

#### Parameters

##### antipool=

A list of characters to avoid including in the generated output. (Case-sensitive, default `0OoDd1IiLl8Bb5Ss2Zz`)

```
{!-- no E's or 3's --}
{exp:randomizer:generate type='alnum' antipool='Ee3'}
```

##### avoid_ambiguous=

`yes`/`no`, whether or not to avoid ambiguous characters, as defined by the [antipool= parameter](#antipool). Default `no`.

##### case=

Force the case of the output. One of:

- `lower`
- `normal` (Default)
- `upper`

##### length=

The length of the generated text (default `5`).

##### type=

Which type of output to generate (default `numbers`). One of:

- `alnum`: letters and numbers
- `alpha`: letters
- `basic`: a number between 0 and 2147483647. (ignores [length= parameter](#length))
- `encrypt`: alias of `sha1`
- `md5`: an md5 hash of a random, cryptographically secure unique ID 
- `nozero`: numbers, excluding `0`
- `numeric`: numbers
- `sha1`: a sha1 hash of a random, cryptographically secure unique ID
- `unique`: alias of `md5`

### `{exp:randomizer:choose}`

#### Example Usage

The Choose tag is used to output one item from among a list of items. The list can be created with dynamic content or statically.

In this example, we will use it to choose a famous quote at random.

```
{exp:randomizer:choose}
	{randomizer:items}I find that the harder I work, the more luck I seem to have. - Thomas Jefferson{/randomizer:items}
	{randomizer:items}Don't stay in bed, unless you can make money in bed. - George Burns{/randomizer:items}
	{randomizer:items}We didn't lose the game; we just ran out of time. - Vince Lombardi{/randomizer:items}
	{randomizer:items}If everything seems under control, you're not going fast enough. - Mario Andretti{/randomizer:items}
	{randomizer:items}Reality is merely an illusion, albeit a very persistent one. - Albert Einstein{/randomizer:items}
	{randomizer:items}Adventure is worthwhile. - Aesop{/randomizer:items}
	{randomizer:items}No legacy is so rich as honesty. - William Shakespeare{/randomizer:items}
	{randomizer:items}You will never live if you are looking for the meaning of life. - Albert Camus{/randomizer:items}
	{randomizer:items}The price of anything is the amount of life you exchange for it. - Henry David Thoreau{/randomizer:items}
	{randomizer:items}Chance favors the prepared mind. - Louis Pasteur{/randomizer:items}
	{randomizer:items}Freedom of Press is limited to those who own one. - H.L. Mencken{/randomizer:items}
	{randomizer:items}I do not fear computers. I fear the lack of them. - Isaac Asimov{/randomizer:items}
	{randomizer:items}Never trust a computer you can't throw out a window. - Steve Wozniak{/randomizer:items}
	{randomizer:items}Do, or do not.  There is no 'try'. - Yoda{/randomizer:items}
{/exp:randomizer:choose}
```

In this example, we'll choose one title at random from all entries being displayed. The rest of the Channel Entries tag's output is displayed as normal.

```
{exp:randomizer:chooser}
    {exp:channel:entries channel='blog' limit='10'}
        {randomizer:items}{title}{/randomizer:items}
    {/exp:channel:entries}
{/exp:randomizer:chooser}
```

#### `{randomizer:items}{/randomizer:items}`

Use `{randomizer:items}{/randomizer:items}` to define each item you want to include in the set to choose from. Only one will be output.

## Change Log

### 3.0.0

- Complete rewritten, with two new tags:
    - `{exp:randomizer:generate}` to generate random text or numbers.
    - `{exp:randomizer:choose}` to output only one of a defined set of content.
- Backwards compatible for those still using v2 or prior, but the new tags are vastly superior and do not require modifying the plugin itself.

### 2.0

- Updated plugin to be 3.0 compatible

### 1.1

- Updated plugin to be 2.0 compatible


## Additional Files

You may be wondering what the rest of the files in this package are for. They are solely for development, so if you are forking the GitHub repo, they can be helpful. If you are just using the add-on in your ExpressionEngine installation, you can ignore all of these files.

- **.editorconfig**: [EditorConfig](http://editorconfig.org) helps developers maintain consistent coding styles across files and text editors.
- **.gitignore:** [.gitignore](https://git-scm.com/docs/gitignore) lets you specify files in your working environment that you do not want under source control.
- **.travis.yml:** A [Travis CI](https://travis-ci.org) configuration file for continuous integration (automated testing, releases, etc.).
- **.composer.json:** A [Composer project setup file](https://getcomposer.org/doc/01-basic-usage.md) that manages development dependencies.
- **.composer.lock:** A [list of dependency versions](https://getcomposer.org/doc/01-basic-usage.md#composer-lock-the-lock-file) that Composer has locked to this project.

## Copyright / License Notice

The ExpressionEngine Randomizer project is copyright (c) 2011-2021 Packet Tide, LLC ([https://packettide.com](https://packettide.com)) and is licensed under Apache License, Version 2.0.

Complete license terms and copyright information can be found in [LICENSE.txt](LICENSE.txt) in the root of this repository.

"ExpressionEngine" is a registered trademark of Packet Tide, LLC. in the United States and around the world. Refer to Packet Tide's [Trademark Use Policy](https://expressionengine.com/about/trademark-use-policy) for access to logos and acceptable use.
