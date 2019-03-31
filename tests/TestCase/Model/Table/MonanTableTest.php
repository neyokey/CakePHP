<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MonanTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MonanTable Test Case
 */
class MonanTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MonanTable
     */
    public $Monan;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.monan',
        'app.loaimonan',
        'app.chitietdonhang'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Monan') ? [] : ['className' => MonanTable::class];
        $this->Monan = TableRegistry::get('Monan', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Monan);

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
