<?php
/**
 * Joomla! entity library.
 *
 * @copyright  Copyright (C) 2017 Roberto Segura López, Inc. All rights reserved.
 * @license    See COPYING.txt
 */

namespace Phproberto\Joomla\Entity\Categories;

use Joomla\Utilities\ArrayHelper;
use Phproberto\Joomla\Entity\Collection;
use Phproberto\Joomla\Entity\Entity;
use Phproberto\Joomla\Entity\Core\Traits as CoreTraits;
use Phproberto\Joomla\Entity\Traits as EntityTraits;

/**
 * Stub to test Entity class.
 *
 * @since   __DEPLOY_VERSION__
 */
class Category extends Entity
{
	use CoreTraits\HasAsset;
	use EntityTraits\HasAssociations, EntityTraits\HasTranslations;

	/**
	 * Get a table.
	 *
	 * @param   string  $name     The table name. Optional.
	 * @param   string  $prefix   The class prefix. Optional.
	 * @param   array   $options  Configuration array for model. Optional.
	 *
	 * @return  \JTable
	 */
	public function table($name = '', $prefix = null, $options = array())
	{
		\JTable::addIncludePath(JPATH_ADMINISTRATOR . '/components/com_categories/tables');

		$name = $name ?: 'Category';
		$prefix = $prefix ?: 'CategoriesTable';

		return parent::table($name, $prefix, $options);
	}

	/**
	 * Load associations from DB.
	 *
	 * @return  array
	 *
	 * @codeCoverageIgnore
	 */
	protected function loadAssociations()
	{
		if (!$this->hasId())
		{
			return array();
		}

		return \JLanguageAssociations::getAssociations($this->get('extension'), '#__categories', 'com_categories.item', $this->id(), 'id', 'alias', '');
	}


	/**
	 * Load associated translations from DB.
	 *
	 * @return  Collection
	 */
	protected function loadTranslations()
	{
		$ids = $this->associationsIds();

		if (empty($ids))
		{
			return new Collection;
		}

		$db = $this->getDbo();

		$query = $db->getQuery(true)
			->select('c.*')
			->from($db->qn('#__categories', 'c'))
			->where('c.id IN (' . implode(',', ArrayHelper::toInteger($ids)) . ')');

		$db->setQuery($query);

		$categories = array_map(
			function ($item)
			{
				return static::instance($item->id)->bind($item);
			},
			$db->loadObjectList() ?: array()
		);

		return new Collection($categories);
	}
}
