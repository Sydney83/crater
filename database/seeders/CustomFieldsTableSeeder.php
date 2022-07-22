<?php

namespace Database\Seeders;

use Crater\Models\CustomField;
use Illuminate\Database\Seeder;

class CustomFieldsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (empty(CustomField::count())) {
            $customfields = [
                [
                    'name' => 'GST Number',
                    'slug' => 'CUSTOM_INVOICE_GST_NUMBER',
                    'label' => 'GST Number',
                    'model_type' => 'Invoice',
                    'type' => 'Number',
                    'is_required' => 0,
                    'order' => 1,
                    'company_id' => 1,
                ],
            ];

            foreach ($customfields as $customfield) {
                CustomField::create($customfield);
            }
        }
    }
}
