<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Tin Entity
 *
 * @property int $idTin
 * @property string $TieuDe
 * @property string $TieuDe_KhongDau
 * @property string|null $TomTat
 * @property string|null $urlHinh
 * @property \Cake\I18n\FrozenDate|null $Ngay
 * @property int $idUser
 * @property string|null $Content
 * @property int $idLT
 * @property int|null $idTL
 * @property int|null $SoLanXem
 * @property bool|null $TinNoiBat
 * @property bool|null $AnHien
 */
class Tin extends Entity
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
        'TieuDe' => true,
        'TieuDe_KhongDau' => true,
        'TomTat' => true,
        'urlHinh' => true,
        'Ngay' => true,
        'idUser' => true,
        'Content' => true,
        'idLT' => true,
        'idTL' => true,
        'SoLanXem' => true,
        'id_danhmuc' => true,
        'TinNoiBat' => true,
        'AnHien' => true
    ];
}
