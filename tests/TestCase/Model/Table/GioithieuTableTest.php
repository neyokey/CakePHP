<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GioithieuTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GioithieuTable Test Case
 */
class GioithieuTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\GioithieuTable
     */
    public $Gioithieu;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.gioithieu'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Gioithieu') ? [] : ['className' => GioithieuTable::class];
        $this->Gioithieu = TableRegistry::get('Gioithieu', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Gioithieu);

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
