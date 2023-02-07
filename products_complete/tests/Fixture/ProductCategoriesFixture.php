<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProductCategoriesFixture
 */
class ProductCategoriesFixture extends TestFixture
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
                'category_name' => 'Lorem ipsum dolor sit amet',
                'status' => 'Lorem ipsum dolor sit amet',
                'created_date' => '2023-01-30 10:23:19',
                'modified_date' => '2023-01-30 10:23:19',
            ],
        ];
        parent::init();
    }
}
