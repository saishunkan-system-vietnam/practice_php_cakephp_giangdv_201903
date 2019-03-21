<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Theloai Entity
 *
 * @property int $idTL
 * @property string $TenTL
 * @property string $TenTL_KhongDau
 * @property int|null $ThuTu
 * @property bool|null $AnHien
 */
class Theloai extends Entity
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
        'TenTL' => true,
        'TenTL_KhongDau' => true,
        'ThuTu' => true,
        'AnHien' => true
    ];
}
