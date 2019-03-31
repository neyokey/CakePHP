<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Donhang Entity
 *
 * @property int $id
 * @property int $price
 * @property int $discount
 * @property int $ship_price
 * @property \Cake\I18n\FrozenTime $insert_time
 * @property string $name
 * @property string $phone
 * @property string $address
 * @property string $note
 * @property int $status
 * @property int $nguoidung_id
 * @property int $nguoigiaohang_id
 * @property int $khuvucgiaohang_id
 *
 * @property \App\Model\Entity\Nguoidung $nguoidung
 * @property \App\Model\Entity\Nguoigiaohang $nguoigiaohang
 * @property \App\Model\Entity\Khuvucgiaohang $khuvucgiaohang
 * @property \App\Model\Entity\Chitietdonhang[] $chitietdonhang
 */
class Donhang extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'price' => true,
        'discount' => true,
        'ship_price' => true,
        'insert_time' => true,
        'name' => true,
        'phone' => true,
        'address' => true,
        'note' => true,
        'status' => true,
        'nguoidung_id' => true,
        'nguoigiaohang_id' => true,
        'khuvucgiaohang_id' => true,
        'nguoidung' => true,
        'nguoigiaohang' => true,
        'khuvucgiaohang' => true,
        'chitietdonhang' => true
    ];
}
