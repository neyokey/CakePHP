<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Lienhe Entity
 *
 * @property int $id
 * @property string $address
 * @property string $phone
 * @property string $email
 * @property string $brand_name
 * @property float $X
 * @property float $Y
 * @property string $link_fb
 * @property string $link_ins
 * @property string $link_gl
 */
class Lienhe extends Entity
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
        'address' => true,
        'phone' => true,
        'email' => true,
        'brand_name' => true,
        'X' => true,
        'Y' => true,
        'link_fb' => true,
        'link_ins' => true,
        'link_gl' => true
    ];
}
