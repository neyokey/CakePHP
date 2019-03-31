<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LichsugiaohangFixture
 *
 */
class LichsugiaohangFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'lichsugiaohang';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'status' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'donhang_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'nguoigiaohang_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'donhang_id' => ['type' => 'index', 'columns' => ['donhang_id'], 'length' => []],
            'nguoigiaohang_id' => ['type' => 'index', 'columns' => ['nguoigiaohang_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'lichsugiaohang_ibfk_1' => ['type' => 'foreign', 'columns' => ['nguoigiaohang_id'], 'references' => ['nguoigiaohang', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'lichsugiaohang_ibfk_2' => ['type' => 'foreign', 'columns' => ['donhang_id'], 'references' => ['donhang', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'status' => 1,
                'donhang_id' => 1,
                'nguoigiaohang_id' => 1
            ],
        ];
        parent::init();
    }
}
