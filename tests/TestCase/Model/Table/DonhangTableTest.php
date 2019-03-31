<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DonhangTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DonhangTable Test Case
 */
class DonhangTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DonhangTable
     */
    public $Donhang;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.donhang',
        'app.nguoidung',
        'app.nguoigiaohang',
        'app.khuvucgiaohang',
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
        $config = TableRegistry::exists('Donhang') ? [] : ['className' => DonhangTable::class];
        $this->Donhang = TableRegistry::get('Donhang', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Donhang);

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
