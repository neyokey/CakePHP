<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LoaimonanTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LoaimonanTable Test Case
 */
class LoaimonanTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LoaimonanTable
     */
    public $Loaimonan;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.loaimonan',
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
        $config = TableRegistry::exists('Loaimonan') ? [] : ['className' => LoaimonanTable::class];
        $this->Loaimonan = TableRegistry::get('Loaimonan', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Loaimonan);

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
