<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Quangcao Entity
 *
 * @property int $idQC
 * @property int $vitri
 * @property string $MoTa
 * @property string $Url
 * @property string $urlHinh
 * @property int $SoLanClick
 */
class Quangcao extends Entity
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
        'vitri' => true,
        'MoTa' => true,
        'Url' => true,
        'urlHinh' => true,
        'SoLanClick' => true
    ];
}
