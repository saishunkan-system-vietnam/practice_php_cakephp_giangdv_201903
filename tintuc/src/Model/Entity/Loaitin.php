<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Loaitin Entity
 *
 * @property int $idLT
 * @property string $Ten
 * @property string $Ten_KhongDau
 * @property int $ThuTu
 * @property bool $AnHien
 * @property int $idTL
 */
class Loaitin extends Entity
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
        'Ten' => true,
        'Ten_KhongDau' => true,
        'ThuTu' => true,
        'AnHien' => true,
        'idTL' => true
    ];
}
