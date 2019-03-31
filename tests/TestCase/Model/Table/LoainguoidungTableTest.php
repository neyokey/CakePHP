<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LoainguoidungTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LoainguoidungTable Test Case
 */
class LoainguoidungTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LoainguoidungTable
     */
    public $Loainguoidung;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.loainguoidung',
        'app.nguoidung'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Loainguoidung') ? [] : ['className' => LoainguoidungTable::class];
        $this->Loainguoidung = TableRegistry::get('Loainguoidung', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Loainguoidung);

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
