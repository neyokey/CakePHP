<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BantinTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BantinTable Test Case
 */
class BantinTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BantinTable
     */
    public $Bantin;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.bantin',
        'app.loaibantin'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Bantin') ? [] : ['className' => BantinTable::class];
        $this->Bantin = TableRegistry::get('Bantin', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Bantin);

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
