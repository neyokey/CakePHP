<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Bantin Entity
 *
 * @property int $id
 * @property string $name
 * @property string $content
 * @property \Cake\I18n\FrozenTime $insert_time
 * @property int $status
 * @property int $loaibantin_id
 * @property int $nguoidung_id
 *
 * @property \App\Model\Entity\Loaibantin $loaibantin
 */
class Bantin extends Entity
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
        'content' => true,
        'insert_time' => true,
        'status' => true,
        'loaibantin_id' => true,
        'nguoidung_id' => true,
        'loaibantin' => true
    ];
}
