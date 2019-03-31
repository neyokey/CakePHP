<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\KhuvucgiaohangTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\KhuvucgiaohangTable Test Case
 */
class KhuvucgiaohangTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\KhuvucgiaohangTable
     */
    public $Khuvucgiaohang;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.khuvucgiaohang'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Khuvucgiaohang') ? [] : ['className' => KhuvucgiaohangTable::class];
        $this->Khuvucgiaohang = TableRegistry::get('Khuvucgiaohang', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Khuvucgiaohang);

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
