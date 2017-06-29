<?php
/**
 * Joomla! entity library.
 *
 * @copyright  Copyright (C) 2017 Roberto Segura López, Inc. All rights reserved.
 * @license    See COPYING.txt
 */

namespace Phproberto\Joomla\Entity\Core;

use Phproberto\Joomla\Entity\Entity;

/**
 * Stub to test Entity class.
 *
 * @since   __DEPLOY_VERSION__
 */
class Asset extends Entity
{
	/**
	 * Get a table.
	 *
	 * @param   string  $name     The table name. Optional.
	 * @param   string  $prefix   The class prefix. Optional.
	 * @param   array   $options  Configuration array for model. Optional.
	 *
	 * @return  \JTable
	 *
	 * @codeCoverageIgnore
	 */
	public function getTable($name = '', $prefix = null, $options = array())
	{
		$name = $name ?: 'Asset';
		$prefix = $prefix ?: 'JTable';

		return parent::getTable($name, $prefix, $options);
	}
}
