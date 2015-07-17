<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
Copyright (C) 2004 - 2015 EllisLab, Inc.

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL
ELLISLAB, INC. BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

Except as contained in this notice, the name of EllisLab, Inc. shall not be
used in advertising or otherwise to promote the sale, use or other dealings
in this Software without prior written authorization from EllisLab, Inc.
*/


/**
 * Randomizer Class
 *
 * @package			ExpressionEngine
 * @category		Plugin
 * @author			EllisLab
 * @copyright		Copyright (c) 2004 - 2015, EllisLab, Inc.
 * @link			https://github.com/EllisLab/Randomizer
 */
class Randomizer {

	public $return_data;

	/**
	 * Constructor
	 *
	 */
	function __construct()
	{
		// nada
	}

	// --------------------------------------------------------------------

	function set_one()
	{
		$quotes = array(
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
						);


		return $quotes[array_rand($quotes)];
	}

	// --------------------------------------------------------------------

}
