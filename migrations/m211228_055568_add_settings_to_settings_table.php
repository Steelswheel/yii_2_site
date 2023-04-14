<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%files}}`.
 */
class m211228_055568_add_settings_to_settings_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('settings', [
            'settings' => 'calc_easy',
            'label' => 'Калькулятор (Легкий старт)',
            'fields' => [
                [
                    'id' => 'option',
                    "type" => "string",
                    "label" => "Программа",
                    "value" => "{\"id\": 1, \"label\": \"Легкий старт\"}"
                ],
                [
                    "id" => "rates",
                    "type" => "string",
                    "label" => "Проценты",
                    "value" => "{\"1\": 10.5, \"2\": 11.5, \"3\": 12.5}"
                ],
                [
                    "id" => "ranges",
                    "type" => "string",
                    "label" => "Деньги",
                    "value" => "{\"value\": 100000, \"min\": 100000, \"max\": 3000000, \"step\": 10000}"
                ],
                [
                    "id" => "months",
                    "type" => "string",
                    "label" => "Месяца",
                    "value" => "{\"1\": 6, \"2\": 12, \"3\": 24}"
                ]
            ]
        ]);

        $this->insert('settings', [
            'settings' => 'calc_stable',
            'label' => 'Калькулятор (Стабильный доход)',
            'fields' => [
                [
                    'id' => 'option',
                    "type" => "string",
                    "label" => "Программа",
                    "value" => "{\"id\": 2, \"label\": \"Стабильный доход\"}"
                ],
                [
                    "id" => "rates",
                    "type" => "string",
                    "label" => "Проценты",
                    "value" => "{\"1\": 11.5, \"2\": 12.5, \"3\": 13.5}"
                ],
                [
                    "id" => "ranges",
                    "type" => "string",
                    "label" => "Деньги",
                    "value" => "{\"value\": 500000, \"min\": 500000, \"max\": 3000000, \"step\": 10000}"
                ],
                [
                    "id" => "months",
                    "type" => "string",
                    "label" => "Месяца",
                    "value" => "{\"1\": 6, \"2\": 12, \"3\": 24}"
                ]
            ]
        ]);

        $this->insert('settings', [
            'settings' => 'calc_max',
            'label' => 'Калькулятор (Максимальный доход)',
            'fields' => [
                [
                    'id' => 'option',
                    "type" => "string",
                    "label" => "Программа",
                    "value" => "{\"id\": 3, \"label\": \"Максимальный доход\"}"
                ],
                [
                    "id" => "rates",
                    "type" => "string",
                    "label" => "Проценты",
                    "value" => "{\"1\": 12.5, \"2\": 13.5, \"3\": 14.5}"
                ],
                [
                    "id" => "ranges",
                    "type" => "string",
                    "label" => "Деньги",
                    "value" => "{\"value\": 1000000, \"min\": 1000000, \"max\": 30000000, \"step\": 100000}"
                ],
                [
                    "id" => "months",
                    "type" => "string",
                    "label" => "Месяца",
                    "value" => "{\"1\": 6, \"2\": 12, \"3\": 24}"
                ]
            ]
        ]);

        $this->insert('settings', [
            'settings' => 'calc_promo',
            'label' => 'Калькулятор (Промо)',
            'fields' => [
                [
                    'id' => 'option',
                    "type" => "string",
                    "label" => "Программа",
                    "value" => "{\"id\": 4, \"label\": \"Промо\"}"
                ],
                [
                    "id" => "rates",
                    "type" => "string",
                    "label" => "Проценты",
                    "value" => "{\"1\": 8.5}"
                ],
                [
                    "id" => "ranges",
                    "type" => "string",
                    "label" => "Деньги",
                    "value" => "{\"value\": 50000, \"min\": 50000, \"max\": 3000000, \"step\": 10000}"
                ],
                [
                    "id" => "months",
                    "type" => "string",
                    "label" => "Месяца",
                    "value" => "{\"1\": 3}"
                ]
            ]
        ]);

        $this->delete('settings', ['settings' => ['calc_bp', 'calc_zp']]);
    }

    public function safeDown()
    {

    }
}
