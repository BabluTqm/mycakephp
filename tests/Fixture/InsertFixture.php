<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * InsertFixture
 */
class InsertFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'users';
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
                'email' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
                'created' => '2023-01-09 05:56:08',
                'modified' => '2023-01-09 05:56:08',
            ],
        ];
        parent::init();
    }
}
