<?php
/**
 * Joomla! entity library.
 *
 * @copyright  Copyright (C) 2017-2019 Roberto Segura López, Inc. All rights reserved.
 * @license    See COPYING.txt
 */

namespace Phproberto\Joomla\Entity\Tests\Extensions\Entity\Traits\Stubs;

use Phproberto\Joomla\Entity\Entity;
use Phproberto\Joomla\Entity\Extensions\Entity\Traits\HasComponent;

/**
 * Sample class to test HasComponent trait.
 *
 * @since  1.1.0
 */
class ClassWithComponent extends Entity
{
	use HasComponent;
}
