<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EmployeeFixture
 */
class EmployeeFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'employee';
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
                'name' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'phone' => 1,
                'password' => 'Lorem ipsum dolor sit amet',
                'designation' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
