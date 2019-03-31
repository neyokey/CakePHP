<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Monan Entity
 *
 * @property int $id
 * @property string $name
 * @property int $price
 * @property string $detail
 * @property string $image
 * @property int $status
 * @property int $loaimonan_id
 *
 * @property \App\Model\Entity\Loaimonan $loaimonan
 * @property \App\Model\Entity\Chitietdonhang[] $chitietdonhang
 */
class Monan extends Entity
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
        'name' => true,
        'price' => true,
        'detail' => true,
        'image' => true,
        'status' => true,
        'loaimonan_id' => true,
        'loaimonan' => true,
        'chitietdonhang' => true
    ];
}
