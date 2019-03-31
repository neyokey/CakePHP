<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LoaibantinTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LoaibantinTable Test Case
 */
class LoaibantinTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LoaibantinTable
     */
    public $Loaibantin;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.loaibantin',
        'app.bantin'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Loaibantin') ? [] : ['className' => LoaibantinTable::class];
        $this->Loaibantin = TableRegistry::get('Loaibantin', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Loaibantin);

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
}
