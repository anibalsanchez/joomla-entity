<?php
/**
 * Joomla! entity library.
 *
 * @copyright  Copyright (C) 2017 Roberto Segura López, Inc. All rights reserved.
 * @license    See COPYING.txt
 */

namespace Phproberto\Joomla\Entity\Validation\Rule;

use Phproberto\Joomla\Entity\Validation\Rule\IsEmptyString;
use Phproberto\Joomla\Entity\Validation\Contracts\Rule as RuleContract;

/**
 * Check that value is not an empty string.
 *
 * @since   __DEPLOY_VERSION__
 */
class IsNotEmptyString extends IsEmptyString implements RuleContract
{
	/**
	 * Check if a value is valid.
	 *
	 * @param   mixed  $value  Value to check
	 *
	 * @return  boolean
	 */
	public function passes($value)
	{
		return !parent::passes($value);
	}
}
