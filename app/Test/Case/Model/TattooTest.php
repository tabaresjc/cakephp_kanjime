<?php
App::uses('Tattoo', 'Model');

/**
 * Tattoo Test Case
 *
 */
class TattooTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tattoo'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Tattoo = ClassRegistry::init('Tattoo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Tattoo);

		parent::tearDown();
	}

}
