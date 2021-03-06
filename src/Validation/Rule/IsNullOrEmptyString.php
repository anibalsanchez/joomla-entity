<?php
/**
 * Joomla! entity library.
 *
 * @copyright  Copyright (C) 2017-2019 Roberto Segura López, Inc. All rights reserved.
 * @license    See COPYING.txt
 */

namespace Phproberto\Joomla\Entity\Validation\Rule;

defined('_JEXEC') || die;

use Phproberto\Joomla\Entity\Validation\Rule;
use Phproberto\Joomla\Entity\Validation\Rule\IsNull;
use Phproberto\Joomla\Entity\Validation\Rule\IsEmptyString;
use Phproberto\Joomla\Entity\Validation\Contracts\Rule as RuleContract;

/**
 * Check that a column is null or an empty string.
 *
 * @since   1.0.0
 */
class IsNullOrEmptyString extends Rule implements RuleContract
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
		$isNullValidator = new IsNull;
		$emptyStringValidator = new IsEmptyString;

		return $isNullValidator->passes($value) || $emptyStringValidator->passes($value);
	}
}
