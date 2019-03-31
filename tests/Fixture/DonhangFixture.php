<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DonhangFixture
 *
 */
class DonhangFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'donhang';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'price' => ['type' => 'integer', 'length' => 50, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'discount' => ['type' => 'integer', 'length' => 50, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'ship_price' => ['type' => 'integer', 'length' => 50, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'insert_time' => ['type' => 'timestamp', 'length' => null, 'null' => false, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        'name' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'phone' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'address' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'note' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'status' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'nguoidung_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'nguoigiaohang_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'khuvucgiaohang_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'id_nguoidung' => ['type' => 'index', 'columns' => ['nguoidung_id'], 'length' => []],
            'id_nguoigiaohang' => ['type' => 'index', 'columns' => ['nguoigiaohang_id'], 'length' => []],
            'id_khuvucgiaohang' => ['type' => 'index', 'columns' => ['id'], 'length' => []],
            'donhang_ibfk_3' => ['type' => 'index', 'columns' => ['khuvucgiaohang_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'donhang_ibfk_1' => ['type' => 'foreign', 'columns' => ['nguoidung_id'], 'references' => ['nguoidung', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'donhang_ibfk_2' => ['type' => 'foreign', 'columns' => ['nguoigiaohang_id'], 'references' => ['nguoigiaohang', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'donhang_ibfk_3' => ['type' => 'foreign', 'columns' => ['khuvucgiaohang_id'], 'references' => ['khuvucgiaohang', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'price' => 1,
                'discount' => 1,
                'ship_price' => 1,
                'insert_time' => 1531510525,
                'name' => 'Lorem ipsum dolor sit amet',
                'phone' => 'Lorem ipsum dolor sit amet',
                'address' => 'Lorem ipsum dolor sit amet',
                'note' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'status' => 1,
                'nguoidung_id' => 1,
                'nguoigiaohang_id' => 1,
                'khuvucgiaohang_id' => 1
            ],
        ];
        parent::init();
    }
}
