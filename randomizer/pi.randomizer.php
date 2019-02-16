<?php
/**
 * This source file is for use with the open source project
 * ExpressionEngine (https://expressionengine.com)
 *
 * @link      https://expressionengine.com/
 * @copyright Copyright (c) 2011-2019, EllisLab Corp. (https://ellislab.com)
 * @license   https://expressionengine.com/license Licensed under Apache License, Version 2.0
 */

/**
 * Randomizer plugin class
 */
class Randomizer {

	public $return_data;

	/**
	 * Constructor
	 */
	public function __construct()
	{
		// nada
	}

	/**
	 * Choose
	 *
	 * Chooses one item from {randomizer:items}{/randomizer:items}
	 */
	public function choose()
	{
		$var_name = 'randomizer:items';

		// find all of the individual items
		preg_match_all('/'.LD.$var_name.RD.'(.*?)'.LD.'\/'.$var_name.RD.'/s', ee()->TMPL->tagdata, $matches);

		if (empty($matches[0]))
		{
			return ee()->TMPL->delete_var_pairs($var_name, $var_name, ee()->TMPL->tagdata);
		}

		$keep = $matches[1][array_rand($matches[1])];

		// add a marker
		$var_marker = ee('Encrypt')->generateKey();
		$str = str_replace($matches[0][0], LD.$var_marker.RD.$matches[0][0], ee()->TMPL->tagdata);

		// only keep our random value
		$str = ee()->TMPL->delete_var_pairs($var_name, $var_name, $str);

		$str = trim(str_replace(LD.$var_marker.RD, $keep, $str));

		return $str;
	}

	/**
	 * Generate a random number/string
	 *
	 * @return string
	 */
	public function generate()
	{
		$type = ee()->TMPL->fetch_param('type', 'numeric');
		$length = ee()->TMPL->fetch_param('length', 5);
		$antipool = ee()->TMPL->fetch_param('antipool', '0OoDd1IiLl8Bb5Ss2Zz');
		$avoid_ambiguous = get_bool_from_string(ee()->TMPL->fetch_param('avoid_ambiguous', false));
		$case = ee()->TMPL->fetch_param('case', 'normal');

		$antipool = ($avoid_ambiguous) ? $antipool : '';

		$str = random_string($type, $length, $antipool);

		switch ($case)
		{
			case 'upper':
				$str = strtoupper($str);
				break;
			case 'lower':
				$str = strtolower($str);
				break;
		}

		return $str;
	}

	/**
	 * Set One
	 *
	 * Deprecated, undocumented! Only exists for backwards compatibility for plugin users prior to v3.0.0
	 *
	 * @return string A random quote.
	 */
	function set_one()
	{
		$quotes = [
			"I find that the harder I work, the more luck I seem to have. - Thomas Jefferson",
			"Don't stay in bed, unless you can make money in bed. - George Burns",
			"We didn't lose the game; we just ran out of time. - Vince Lombardi",
			"If everything seems under control, you're not going fast enough. - Mario Andretti",
			"Reality is merely an illusion, albeit a very persistent one. - Albert Einstein",
			"Adventure is worthwhile - Aesop",
			"No legacy is so rich as honesty - William Shakespeare",
			"You will never live if you are looking for the meaning of life - Albert Camus",
			"The price of anything is the amount of life you exchange for it - Henry David Thoreau",
			"Chance favors the prepared mind - Louis Pasteur",
			"Freedom of Press is limited to those who own one - H.L. Mencken",
			"I do not fear computers. I fear the lack of them - Isaac Asimov",
			"Never trust a computer you can't throw out a window - Steve Wozniak",
			"Do, or do not.  There is no 'try'. - Yoda" // No comma after the last item
		];

		return $quotes[array_rand($quotes)];
	}
}
// END Class
