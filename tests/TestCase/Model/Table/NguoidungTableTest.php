<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NguoidungTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NguoidungTable Test Case
 */
class NguoidungTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\NguoidungTable
     */
    public $Nguoidung;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.nguoidung',
        'app.loainguoidung',
        'app.donhang'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Nguoidung') ? [] : ['className' => NguoidungTable::class];
        $this->Nguoidung = TableRegistry::get('Nguoidung', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Nguoidung);

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
