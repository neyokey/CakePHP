<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NguoigiaohangTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NguoigiaohangTable Test Case
 */
class NguoigiaohangTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\NguoigiaohangTable
     */
    public $Nguoigiaohang;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.nguoigiaohang',
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
        $config = TableRegistry::exists('Nguoigiaohang') ? [] : ['className' => NguoigiaohangTable::class];
        $this->Nguoigiaohang = TableRegistry::get('Nguoigiaohang', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Nguoigiaohang);

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
