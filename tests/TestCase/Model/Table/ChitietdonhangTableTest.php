<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ChitietdonhangTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ChitietdonhangTable Test Case
 */
class ChitietdonhangTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ChitietdonhangTable
     */
    public $Chitietdonhang;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.chitietdonhang',
        'app.donhang',
        'app.monan'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Chitietdonhang') ? [] : ['className' => ChitietdonhangTable::class];
        $this->Chitietdonhang = TableRegistry::get('Chitietdonhang', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Chitietdonhang);

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
