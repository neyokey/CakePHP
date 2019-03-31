<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Submenu Entity
 *
 * @property int $id
 * @property string $name
 * @property string $link
 * @property int $position
 * @property int $status
 * @property int $menu_id
 *
 * @property \App\Model\Entity\Menu $menu
 */
class Submenu extends Entity
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
        'link' => true,
        'position' => true,
        'status' => true,
        'menu_id' => true,
        'menu' => true
    ];
}
