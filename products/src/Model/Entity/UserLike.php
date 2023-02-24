<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserLike Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $product_id
 * @property string $like
 * @property string $dislike
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Product $product
 */
class UserLike extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'user_id' => true,
        'product_id' => true,
        'likes' => true,
        'dislikes' => true,
        'user' => true,
        'product' => true,
    ];
}
