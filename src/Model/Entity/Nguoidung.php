<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher; 
/**
 * Nguoidung Entity
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property \Cake\I18n\FrozenDate $birthday
 * @property string $phone
 * @property string $address
 * @property int $point
 * @property int $status
 * @property int $loainguoidung_id
 *
 * @property \App\Model\Entity\Loainguoidung $loainguoidung
 * @property \App\Model\Entity\Donhang[] $donhang
 */
class Nguoidung extends Entity
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
        'email' => true,
        'password' => true,
        'birthday' => true,
        'phone' => true,
        'address' => true,
        'point' => true,
        'status' => true,
        'loainguoidung_id' => true,
        'loainguoidung' => true,
        'donhang' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
    protected function _setPassword($value)
    {
        if (strlen($value)) {
            $hasher = new DefaultPasswordHasher();

            return $hasher->hash($value);
        }
    }
}
