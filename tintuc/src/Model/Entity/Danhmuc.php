<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Danhmuc Entity
 *
 * @property int $id_danhmuc
 * @property string $ten_danhmuc
 * @property int $thu_tu
 * @property int $an_hien
 * @property int $parent_id
 *
 * @property \App\Model\Entity\ParentDanhmuc $parent_danhmuc
 * @property \App\Model\Entity\ChildDanhmuc[] $child_danhmuc
 */
class Danhmuc extends Entity
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
        'ten_danhmuc' => true,
        'thu_tu' => true,
        'an_hien' => true,
        'parent_id' => true,
        'parent_danhmuc' => true,
        'child_danhmuc' => true
    ];
}
