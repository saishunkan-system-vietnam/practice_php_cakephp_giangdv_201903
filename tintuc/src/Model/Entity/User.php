<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $idUser
 * @property string $HoTen
 * @property string $Username
 * @property string $Password
 * @property string|null $DiaChi
 * @property string|null $Dienthoai
 * @property string $Email
 * @property \Cake\I18n\FrozenDate $NgayDangKy
 * @property int $idGroup
 * @property \Cake\I18n\FrozenDate|null $NgaySinh
 * @property bool|null $GioiTinh
 * @property int|null $Active
 * @property string|null $RandomKey
 */
class User extends Entity
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
        'HoTen' => true,
        'Username' => true,
        'Password' => true,
        'DiaChi' => true,
        'Dienthoai' => true,
        'Email' => true,
        'NgayDangKy' => true,
        'idGroup' => true,
        'NgaySinh' => true,
        'GioiTinh' => true,
        'Active' => true,
        'RandomKey' => true
    ];
}
