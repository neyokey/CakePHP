<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SubmenuTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SubmenuTable Test Case
 */
class SubmenuTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SubmenuTable
     */
    public $Submenu;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.submenu',
        'app.menu'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Submenu') ? [] : ['className' => SubmenuTable::class];
        $this->Submenu = TableRegistry::get('Submenu', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Submenu);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
