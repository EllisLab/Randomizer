<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$plugin_info = array(
						'pi_name'			=> 'Randomizer',
						'pi_version'			=> '1.1',
						'pi_author'			=> 'Rick Ellis',
						'pi_author_url'		=> 'http://expressionengine.com/',
						'pi_description'		=> 'Allows you to show random text, such as quotes, on your site.',
						'pi_usage'			=> Randomizer::usage()
					);

/**
 * Randomizer Class
 *
 * @package			ExpressionEngine
 * @category		Plugin
 * @author			ExpressionEngine Dev Team
 * @copyright		Copyright (c) 2004 - 2009, EllisLab, Inc.
 * @link			http://expressionengine.com/downloads/details/character_limiter/
 */

class Randomizer {
	
	var $return_data;

	/**
	 * Constructor
	 *
	 */
	function randomizer()
	{
		$this->EE =& get_instance();		
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
	
	/**
	 * Usage
	 *
	 * Plugin Usage
	 *
	 * @access	public
	 * @return	string
	 */
	function usage()
	{
		ob_start(); 
		?>
		Open this file: /plugins/pi.randomizer.php

		Fill the array with as many quotes as you want.

		Then place the following tag in any of your templates:

		{exp:randomizer:set_one}

		To add another sets of quotes, add another function:

		function set_two()
		{
			$quotes = array( FILL WITH QUOTES);

			return $quotes[array_rand($quotes)];	
		}

		Then use this tag in your template:

		{exp:randomizer:set_two}

		Version 1.1
		******************
		- Updated plugin to be 2.0 compatible

		<?php
		$buffer = ob_get_contents();
	
		ob_end_clean(); 

		return $buffer;
	}

	// --------------------------------------------------------------------
	
}

/* End of file pi.randomizer.php */
/* Location: ./system/expressionengine/randomizer/pi.randomizer.php */