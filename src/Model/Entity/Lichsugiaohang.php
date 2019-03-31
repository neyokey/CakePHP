<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Lichsugiaohang Entity
 *
 * @property int $id
 * @property int $status
 * @property int $donhang_id
 * @property int $nguoigiaohang_id
 *
 * @property \App\Model\Entity\Donhang $donhang
 * @property \App\Model\Entity\Nguoigiaohang $nguoigiaohang
 */
class Lichsugiaohang extends Entity
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
        'status' => true,
        'donhang_id' => true,
        'nguoigiaohang_id' => true,
        'donhang' => true,
        'nguoigiaohang' => true
    ];
}
