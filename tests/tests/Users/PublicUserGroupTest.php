<?php
/**
 * Joomla! entity library.
 *
 * @copyright  Copyright (C) 2017-2019 Roberto Segura López, Inc. All rights reserved.
 * @license    See COPYING.txt
 */

namespace Phproberto\Joomla\Entity\Tests\Users;

use Joomla\CMS\Factory;
use Phproberto\Joomla\Entity\Users\UserGroup;
use Phproberto\Joomla\Entity\Users\PublicUserGroup;
use Phproberto\Joomla\Entity\Command\Database\EmptyTable;

/**
 * PublicUserGroup entity tests.
 *
 * @since   __DEPLOY_VERSION__
 */
class PublicUserGroupTest extends \TestCaseDatabase
{
	/**
	 * @test
	 *
	 * @return void
	 */
	public function constructReturnGroupIfExists()
	{
		PublicUserGroup::create();

		$group = new PublicUserGroup;

		$this->assertTrue($group->isLoaded());
	}

	/**
	 * @test
	 *
	 * @return void
	 */
	public function instanceOrCreateReturnsCreatedGroup()
	{
		$this->assertTrue(PublicUserGroup::instanceOrCreate()->isLoaded());
	}

	/**
	 * @test
	 *
	 * @return void
	 */
	public function instanceOrCreateReturnsCachedInstance()
	{
		$cachedGroup = PublicUserGroup::create();
		$cachedGroup->assign('title', 'edited');

		$group = PublicUserGroup::instanceOrCreate();

		$this->assertInstanceOf(PublicUserGroup::class, $group);
		$this->assertSame($cachedGroup, $group);
	}

	/**
	 * @test
	 *
	 * @return void
	 */
	public function instanceReturnsCachedInstance()
	{
		$cachedGroup = PublicUserGroup::create();
		$cachedGroup->assign('title', 'edited');

		$group = PublicUserGroup::instance();

		$this->assertInstanceOf(PublicUserGroup::class, $group);
		$this->assertSame($cachedGroup, $group);
		$this->assertSame($cachedGroup->get('title'), PublicUserGroup::instance()->get('title'));
	}

	/**
	 * @test
	 *
	 * @return void
	 */
	public function instanceReturnsExistingGroup()
	{
		PublicUserGroup::create();

		$this->assertTrue(PublicUserGroup::instance()->isLoaded());
	}

	/**
	 * @test
	 *
	 * @return void
	 *
	 * @expectedException  \RuntimeException
	 */
	public function instanceThrowsExceptionForUnexistingGroup()
	{
		$this->assertTrue(PublicUserGroup::instance()->isLoaded());
	}

	/**
	 * @test
	 *
	 * @return void
	 *
	 * @expectedException  \RuntimeException
	 */
	public function groupThrowsExceptionIfGroupDoesNotExist()
	{
		$group = new PublicUserGroup;
	}

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 *
	 * @return  void
	 */
	protected function setUp()
	{
		parent::setUp();

		$this->saveFactoryState();

		Factory::$session     = $this->getMockSession();
		Factory::$config      = $this->getMockConfig();
		Factory::$application = $this->getMockCmsApp();
	}

	/**
	 * Tears down the fixture, for example, closes a network connection.
	 * This method is called after a test is executed.
	 *
	 * @return  void
	 */
	protected function tearDown()
	{
		EmptyTable::instance(['#__usergroups'])->execute();

		PublicUserGroup::clearAll();

		$this->restoreFactoryState();

		parent::tearDown();
	}
}
