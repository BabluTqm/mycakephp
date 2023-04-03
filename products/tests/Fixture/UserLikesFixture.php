<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UserLikesFixture
 */
class UserLikesFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'user_id' => 1,
                'product_id' => 1,
                'like' => 'Lorem ipsum dolor sit amet',
                'dislike' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}