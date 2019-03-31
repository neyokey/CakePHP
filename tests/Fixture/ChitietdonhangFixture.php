<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ChitietdonhangFixture
 *
 */
class ChitietdonhangFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'chitietdonhang';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'donhang_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'monan_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'quantity' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'id_donhang' => ['type' => 'index', 'columns' => ['donhang_id'], 'length' => []],
            'id_monan' => ['type' => 'index', 'columns' => ['monan_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'chitietdonhang_ibfk_1' => ['type' => 'foreign', 'columns' => ['donhang_id'], 'references' => ['donhang', 'id'], 'update' => 'cascade', 'delete' => 'noAction', 'length' => []],
            'chitietdonhang_ibfk_2' => ['type' => 'foreign', 'columns' => ['monan_id'], 'references' => ['monan', 'id'], 'update' => 'cascade', 'delete' => 'noAction', 'length' => []],
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
                'donhang_id' => 1,
                'monan_id' => 1,
                'quantity' => 1
            ],
        ];
        parent::init();
    }
}
