<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Loainguoidung Entity
 *
 * @property int $id
 * @property string $name
 * @property int $discount
 * @property int $point
 * @property int $status
 *
 * @property \App\Model\Entity\Nguoidung[] $nguoidung
 */
class Loainguoidung extends Entity
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
        'discount' => true,
        'point' => true,
        'status' => true,
        'nguoidung' => true
    ];
}
