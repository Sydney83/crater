<?php

use Crater\Models\Customer;
use Crater\Models\CustomField;
use Crater\Models\Estimate;
use Crater\Models\ExchangeRateProvider;
use Crater\Models\Expense;
use Crater\Models\Invoice;
use Crater\Models\Item;
use Crater\Models\Note;
use Crater\Models\Payment;
use Crater\Models\RecurringInvoice;
use Crater\Models\TaxType;

return [
    'abilities' => [

        // Customer
        [
            "name" => "view customer",
            "ability" => "view-customer",
            "model" => Customer::class,
            "depends_on" => [
                'dashboard'
            ]
        ],
        [
            "name" => "create customer",
            "ability" => "create-customer",
            "model" => Customer::class,
            "depends_on" => [
                'view-customer',
                'view-custom-field',
                'dashboard'
            ]
        ],
        [
            "name" => "edit customer",
            "ability" => "edit-customer",
            "model" => Customer::class,
            "depends_on" => [
                'view-customer',
                'view-custom-field',
                'dashboard'
            ]
        ],
        [
            "name" => "delete customer",
            "ability" => "delete-customer",
            "model" => Customer::class,
            "depends_on" => [
                'view-customer',
                'dashboard'
            ]
        ],

        // Item
        [
            "name" => "view item",
            "ability" => "view-item",
            "model" => Item::class,
            "depends_on" => [
                'dashboard'
            ]
        ],
        [
            "name" => "create item",
            "ability" => "create-item",
            "model" => Item::class,
            "depends_on" => [
                'view-item',
                'view-tax-type',
                'dashboard'
            ]
        ],
        [
            "name" => "edit item",
            "ability" => "edit-item",
            "model" => Item::class,
            "depends_on" => [
                'view-item',
                'dashboard'
            ]
        ],
        [
            "name" => "delete item",
            "ability" => "delete-item",
            "model" => Item::class,
            "depends_on" => [
                'view-item',
                'dashboard'
            ]
        ],

        // Tax Type
        [
            "name" => "view tax type",
            "ability" => "view-tax-type",
            "model" => TaxType::class,
            "depends_on" => [
                'dashboard'
            ]
        ],
        [
            "name" => "create tax type",
            "ability" => "create-tax-type",
            "model" => TaxType::class,
            "depends_on" => [
                'view-tax-type',
                'dashboard'
            ]
        ],
        [
            "name" => "edit tax type",
            "ability" => "edit-tax-type",
            "model" => TaxType::class,
            "depends_on" => [
                'view-tax-type',
                'dashboard'
            ]
        ],
        [
            "name" => "delete tax type",
            "ability" => "delete-tax-type",
            "model" => TaxType::class,
            "depends_on" => [
                'view-tax-type',
                'dashboard'
            ]
        ],

        // Estimate
        [
            "name" => "view estimate",
            "ability" => "view-estimate",
            "model" => Estimate::class,
            "depends_on" => [
                'dashboard'
            ]
        ],
        [
            "name" => "create estimate",
            "ability" => "create-estimate",
            "model" => Estimate::class,
            "depends_on" => [
                'view-estimate',
                'view-item',
                'view-tax-type',
                'view-customer',
                'view-custom-field',
                'dashboard',
                'view-all-notes'
            ]
        ],
        [
            "name" => "edit estimate",
            "ability" => "edit-estimate",
            "model" => Estimate::class,
            "depends_on" => [
                'view-item',
                'view-estimate',
                'view-tax-type',
                'view-customer',
                'view-custom-field',
                'view-all-notes',
                'dashboard'
            ]
        ],
        [
            "name" => "delete estimate",
            "ability" => "delete-estimate",
            "model" => Estimate::class,
            "depends_on" => [
                'view-estimate',
                'dashboard'
            ]
        ],
        [
            "name" => "send estimate",
            "ability" => "send-estimate",
            "model" => Estimate::class,
            "depends_on" => [
                'dashboard'
            ]
        ],

        // Invoice
        [
            "name" => "view invoice",
            "ability" => "view-invoice",
            "model" => Invoice::class,
            "depends_on" => [
                'dashboard'
            ]
        ],
        [
            "name" => "create invoice",
            "ability" => "create-invoice",
            "model" => Invoice::class,
            'owner_only' => false,
            "depends_on" => [
                'view-item',
                'view-invoice',
                'view-tax-type',
                'view-customer',
                'view-custom-field',
                'view-all-notes',
                'dashboard'
            ]
        ],
        [
            "name" => "edit invoice",
            "ability" => "edit-invoice",
            "model" => Invoice::class,
            "depends_on" => [
                'view-item',
                'view-invoice',
                'view-tax-type',
                'view-customer',
                'view-custom-field',
                'view-all-notes',
                'dashboard'
            ]
        ],
        [
            "name" => "delete invoice",
            "ability" => "delete-invoice",
            "model" => Invoice::class,
            "depends_on" => [
                'view-invoice',
                'dashboard'
            ]
        ],
        [
            "name" => "send invoice",
            "ability" => "send-invoice",
            "model" => Invoice::class,
            "depends_on" => [
                'dashboard'
            ]
        ],

        // Recurring Invoice
        [
            "name" => "view recurring invoice",
            "ability" => "view-recurring-invoice",
            "model" => RecurringInvoice::class,
            "depends_on" => [
                'dashboard'
            ]
        ],
        [
            "name" => "create recurring invoice",
            "ability" => "create-recurring-invoice",
            "model" => RecurringInvoice::class,
            "depends_on" => [
                'view-item',
                'view-recurring-invoice',
                'view-tax-type',
                'view-customer',
                'view-all-notes',
                'send-invoice',
                'dashboard'
            ]
        ],
        [
            "name" => "edit recurring invoice",
            "ability" => "edit-recurring-invoice",
            "model" => RecurringInvoice::class,
            "depends_on" => [
                'view-item',
                'view-recurring-invoice',
                'view-tax-type',
                'view-customer',
                'view-all-notes',
                'send-invoice',
                'dashboard'
            ]
        ],
        [
            "name" => "delete recurring invoice",
            "ability" => "delete-recurring-invoice",
            "model" => RecurringInvoice::class,
            "depends_on" => [
                'view-recurring-invoice',
                'dashboard'
            ]
        ],

        // Payment
        [
            "name" => "view payment",
            "ability" => "view-payment",
            "model" => Payment::class,
            "depends_on" => [
                'dashboard'
            ]
        ],
        [
            "name" => "create payment",
            "ability" => "create-payment",
            "model" => Payment::class,
            "depends_on" => [
                'view-customer',
                'view-payment',
                'view-invoice',
                'view-custom-field',
                'view-all-notes',
                'dashboard'
            ]
        ],
        [
            "name" => "edit payment",
            "ability" => "edit-payment",
            "model" => Payment::class,
            "depends_on" => [
                'view-customer',
                'view-payment',
                'view-invoice',
                'view-custom-field',
                'view-all-notes',
                'dashboard'
            ]
        ],
        [
            "name" => "delete payment",
            "ability" => "delete-payment",
            "model" => Payment::class,
            "depends_on" => [
                'view-payment',
                'dashboard'
            ]
        ],
        [
            "name" => "send payment",
            "ability" => "send-payment",
            "model" => Payment::class,
            "depends_on" => [
                'dashboard'
            ]
        ],

        // Expense
        [
            "name" => "view expense",
            "ability" => "view-expense",
            "model" => Expense::class,
            "depends_on" => [
                'dashboard'
            ]
        ],
        [
            "name" => "create expense",
            "ability" => "create-expense",
            "model" => Expense::class,
            "depends_on" => [
                'view-customer',
                'view-expense',
                'view-custom-field',
                'dashboard'
            ]
        ],
        [
            "name" => "edit expense",
            "ability" => "edit-expense",
            "model" => Expense::class,
            "depends_on" => [
                'view-customer',
                'view-expense',
                'view-custom-field',
                'dashboard'
            ]
        ],
        [
            "name" => "delete expense",
            "ability" => "delete-expense",
            "model" => Expense::class,
            "depends_on" => [
                'view-expense',
                'dashboard'
            ]
        ],

        // Custom Field
        [
            "name" => "view custom field",
            "ability" => "view-custom-field",
            "model" => CustomField::class,
            "depends_on" => [
                'dashboard'
            ]
        ],
        [
            "name" => "create custom field",
            "ability" => "create-custom-field",
            "model" => CustomField::class,
            "depends_on" => [
                'view-custom-field',
                'dashboard'
            ]
        ],
        [
            "name" => "edit custom field",
            "ability" => "edit-custom-field",
            "model" => CustomField::class,
            "depends_on" => [
                'view-custom-field',
                'dashboard'
            ]
        ],
        [
            "name" => "delete custom field",
            "ability" => "delete-custom-field",
            "model" => CustomField::class,
            "depends_on" => [
                'view-custom-field',
                'dashboard'
            ]
        ],

        // Financial Reports
        [
            "name" => "view financial reports",
            "ability" => "view-financial-reports",
            "model" => null,
            "depends_on" => [
                'dashboard'
            ]
        ],

        // Exchange Rate Provider
        [
            "name" => "view exchange rate provider",
            "ability" => "view-exchange-rate-provider",
            "model" => ExchangeRateProvider::class,
            'owner_only' => false,
            "depends_on" => [
                'dashboard'
            ]
        ],
        [
            "name" => "create exchange rate provider",
            "ability" => "create-exchange-rate-provider",
            "model" => ExchangeRateProvider::class,
            'owner_only' => false,
            "depends_on" => [
                'view-exchange-rate-provider',
                'dashboard'
            ]
        ],
        [
            "name" => "edit exchange rate provider",
            "ability" => "edit-exchange-rate-provider",
            "model" => ExchangeRateProvider::class,
            'owner_only' => false,
            "depends_on" => [
                'view-exchange-rate-provider',
                'dashboard'
            ]
        ],
        [
            "name" => "delete exchange rate provider",
            "ability" => "delete-exchange-rate-provider",
            "model" => ExchangeRateProvider::class,
            'owner_only' => false,
            "depends_on" => [
                'view-exchange-rate-provider',
                'dashboard'
            ]
        ],

        // Settings
        [
            "name" => "view company dashboard",
            "ability" => "dashboard",
            "model" => null,
            "depends_on" => [
                'dashboard'
            ]
        ],
        [
            "name" => "view all notes",
            "ability" => "view-all-notes",
            "model" => Note::class,
            "depends_on" => [
                'dashboard'
            ]
        ],
        [
            "name" => "manage notes",
            "ability" => "manage-all-notes",
            "model" => Note::class,
            "depends_on" => [
                'view-all-notes',
                'dashboard'
            ]
        ]
    ]
];