<?php
namespace app\controllers;

use yii\helpers\Url;
use yii\web\Controller;

class DepositController extends Controller
{
    public $layout = '@template/index';

    public function actionIndex()
    {
        $this->view->title = 'Выгодное вложение в кредитный потребительский кооператив в Москве и других городах России';

        $this->view->registerMetaTag([
            'name' => 'keywords',
            'content' => 'выгодная, программа, вклад, доходность, ТРЕСТ, Москва'
        ]);

        $this->view->registerMetaTag([
            'name' => 'description',
            'content' => 'Воспользуйтесь выгодными программами вкладов КПК ТРЕСТ в Москве и других городах России. Прозрачная отчетность, высокая доходность по вкладам, сохранение и преумножение финансов вкладчиков.'
        ]);

        $this->view->registerLinkTag(
            [
                'rel' => 'canonical',
                'href' => Url::to(['/deposit'], true)
            ]
        );

        $easy = [
            'WRAPPER' => [
                'border' => 'purple'
            ],
            'HEAD' => [
                [
                    [
                        'content' => 'ЛЕГКИЙ СТАРТ',
                        'background' => 'purple',
                        'border' => 'purple',
                        'color' => 'white',
                        'colspan' => 4
                    ]
                ]
            ],
            'BODY' => [
                [
                    [
                        'content' => 'Минимальная сумма<br>(рубли)',
                        'border' => 'purple'
                    ],
                    [
                        'content' => 'от 100 000',
                        'colspan' => 3,
                        'border' => 'purple'
                    ]
                ],
                [
                    [
                        'content' => 'Срок размещения<br>(месяцы)',
                        'border' => 'purple'
                    ],
                    [
                        'content' => '6',
                        'border' => 'purple'
                    ],
                    [
                        'content' => '12',
                        'border' => 'purple'
                    ],
                    [
                        'content' => '24',
                        'border' => 'purple'
                    ],
                ],
                [
                    [
                        'content' => 'Процентная ставка<br>(% годовых)',
                        'border' => 'purple'
                    ],
                    [
                        'content' => '10,5',
                        'border' => 'purple'
                    ],
                    [
                        'content' => '11,5',
                        'border' => 'purple'
                    ],
                    [
                        'content' => '12,5',
                        'border' => 'purple'
                    ]
                ],
                [
                    [
                        'content' => 'Выплата процентов',
                        'border' => 'purple'
                    ],
                    [
                        'content' => 'в конце срока',
                        'border' => 'purple',
                        'colspan' => 2
                    ],
                    [
                        'content' => 'в конце срока - ежемесячно',
                        'border' => 'purple'
                    ]
                ],
                [
                    [
                        'content' => 'Пополнение',
                        'border' => 'purple'
                    ],
                    [
                        'content' => 'да',
                        'border' => 'purple'
                    ],
                    [
                        'content' => 'да',
                        'border' => 'purple'
                    ],
                    [
                        'content' => 'да',
                        'border' => 'purple'
                    ]
                ],
                [
                    [
                        'content' => 'Частичное снятие',
                        'border' => 'purple'
                    ],
                    [
                        'content' => 'нет',
                        'border' => 'purple'
                    ],
                    [
                        'content' => 'нет',
                        'border' => 'purple'
                    ],
                    [
                        'content' => 'нет',
                        'border' => 'purple'
                    ]
                ],
                [
                    [
                        'content' => 'Капитализация %',
                        'border' => 'purple'
                    ],
                    [
                        'content' => 'нет',
                        'border' => 'purple'
                    ],
                    [
                        'content' => 'нет',
                        'border' => 'purple'
                    ],
                    [
                        'content' => 'нет',
                        'border' => 'purple'
                    ]
                ],
                [
                    [
                        'content' => 'Досрочное<br>расторжение<br>(% годовых)',
                        'border' => 'purple'
                    ],
                    [
                        'content' => '0,1',
                        'border' => 'purple'
                    ],
                    [
                        'content' => '0,1',
                        'border' => 'purple'
                    ],
                    [
                        'content' => '0,1',
                        'border' => 'purple'
                    ]
                ]
            ]
        ];

        $stable = [
            'WRAPPER' => [
                'border' => 'purple'
            ],
            'HEAD' => [
                [
                    [
                        'content' => 'СТАБИЛЬНЫЙ ДОХОД',
                        'background' => 'purple',
                        'border' => 'purple',
                        'color' => 'white',
                        'colspan' => 4
                    ]
                ]
            ],
            'BODY' => [
                [
                    [
                        'content' => 'Минимальная сумма<br>(рубли)',
                        'border' => 'purple'
                    ],
                    [
                        'content' => 'от 500 000',
                        'colspan' => 3,
                        'border' => 'purple'
                    ]
                ],
                [
                    [
                        'content' => 'Срок размещения<br>(месяцы)',
                        'border' => 'purple'
                    ],
                    [
                        'content' => '6',
                        'border' => 'purple'
                    ],
                    [
                        'content' => '12',
                        'border' => 'purple'
                    ],
                    [
                        'content' => '24',
                        'border' => 'purple'
                    ],
                ],
                [
                    [
                        'content' => 'Процентная ставка<br>(% годовых)',
                        'border' => 'purple'
                    ],
                    [
                        'content' => '11,5',
                        'border' => 'purple'
                    ],
                    [
                        'content' => '12,5',
                        'border' => 'purple'
                    ],
                    [
                        'content' => '13,5',
                        'border' => 'purple'
                    ]
                ],
                [
                    [
                        'content' => 'Выплата процентов',
                        'border' => 'purple'
                    ],
                    [
                        'content' => 'в конце срока',
                        'border' => 'purple'
                    ],
                    [
                        'content' => 'в конце срока -<br> ежемесячно',
                        'border' => 'purple',
                        'colspan' => 2
                    ]
                ],
                [
                    [
                        'content' => 'Пополнение',
                        'border' => 'purple'
                    ],
                    [
                        'content' => 'да',
                        'border' => 'purple'
                    ],
                    [
                        'content' => 'да',
                        'border' => 'purple'
                    ],
                    [
                        'content' => 'да',
                        'border' => 'purple'
                    ]
                ],
                [
                    [
                        'content' => 'Частичное снятие',
                        'border' => 'purple'
                    ],
                    [
                        'content' => 'нет',
                        'border' => 'purple'
                    ],
                    [
                        'content' => 'нет',
                        'border' => 'purple'
                    ],
                    [
                        'content' => 'да',
                        'border' => 'purple'
                    ]
                ],
                [
                    [
                        'content' => 'Капитализация %',
                        'border' => 'purple'
                    ],
                    [
                        'content' => 'нет',
                        'border' => 'purple'
                    ],
                    [
                        'content' => 'нет',
                        'border' => 'purple'
                    ],
                    [
                        'content' => 'нет',
                        'border' => 'purple'
                    ]
                ],
                [
                    [
                        'content' => 'Досрочное<br>расторжение<br>(% годовых)',
                        'border' => 'purple'
                    ],
                    [
                        'content' => '0,1',
                        'border' => 'purple'
                    ],
                    [
                        'content' => '1',
                        'border' => 'purple'
                    ],
                    [
                        'content' => '1,5',
                        'border' => 'purple'
                    ]
                ]
            ]
        ];

        $max = [
            'WRAPPER' => [
                'border' => 'purple'
            ],
            'HEAD' => [
                [
                    [
                        'content' => 'МАКСИМАЛЬНЫЙ ДОХОД',
                        'background' => 'purple',
                        'border' => 'purple',
                        'color' => 'white',
                        'colspan' => 4
                    ]
                ]
            ],
            'BODY' => [
                [
                    [
                        'content' => 'Минимальная сумма<br>(рубли)',
                        'border' => 'purple'
                    ],
                    [
                        'content' => 'от 1 000 000',
                        'colspan' => 3,
                        'border' => 'purple'
                    ]
                ],
                [
                    [
                        'content' => 'Срок размещения<br>(месяцы)',
                        'border' => 'purple'
                    ],
                    [
                        'content' => '6',
                        'border' => 'purple'
                    ],
                    [
                        'content' => '12',
                        'border' => 'purple'
                    ],
                    [
                        'content' => '24',
                        'border' => 'purple'
                    ],
                ],
                [
                    [
                        'content' => 'Процентная ставка<br>(% годовых)',
                        'border' => 'purple'
                    ],
                    [
                        'content' => '12,5',
                        'border' => 'purple'
                    ],
                    [
                        'content' => '13,5',
                        'border' => 'purple'
                    ],
                    [
                        'content' => '14,5',
                        'border' => 'purple'
                    ]
                ],
                [
                    [
                        'content' => 'Выплата процентов',
                        'border' => 'purple'
                    ],
                    [
                        'content' => 'в конце срока',
                        'border' => 'purple'
                    ],
                    [
                        'content' => 'в конце срока - ежемесячно',
                        'border' => 'purple',
                        'colspan' => 2
                    ]
                ],
                [
                    [
                        'content' => 'Пополнение',
                        'border' => 'purple'
                    ],
                    [
                        'content' => 'да',
                        'border' => 'purple'
                    ],
                    [
                        'content' => 'да',
                        'border' => 'purple'
                    ],
                    [
                        'content' => 'да',
                        'border' => 'purple'
                    ]
                ],
                [
                    [
                        'content' => 'Частичное снятие',
                        'border' => 'purple'
                    ],
                    [
                        'content' => 'нет',
                        'border' => 'purple'
                    ],
                    [
                        'content' => 'да',
                        'border' => 'purple'
                    ],
                    [
                        'content' => 'да',
                        'border' => 'purple'
                    ]
                ],
                [
                    [
                        'content' => 'Капитализация %',
                        'border' => 'purple'
                    ],
                    [
                        'content' => 'нет',
                        'border' => 'purple'
                    ],
                    [
                        'content' => 'нет',
                        'border' => 'purple'
                    ],
                    [
                        'content' => 'нет',
                        'border' => 'purple'
                    ]
                ],
                [
                    [
                        'content' => 'Досрочное<br>расторжение<br>(% годовых)',
                        'border' => 'purple'
                    ],
                    [
                        'content' => '1',
                        'border' => 'purple'
                    ],
                    [
                        'content' => '1,5',
                        'border' => 'purple'
                    ],
                    [
                        'content' => '3',
                        'border' => 'purple'
                    ]
                ]
            ]
        ];

        $promo = [
            'WRAPPER' => [
                'border' => 'yellow'
            ],
            'HEAD' => [
                [
                    [
                        'content' => 'ПРОМО',
                        'background' => 'yellow',
                        'border' => 'yellow',
                        'color' => 'black',
                        'colspan' => 4
                    ]
                ]
            ],
            'BODY' => [
                [
                    [
                        'content' => 'Минимальная сумма<br>(рубли)',
                        'border' => 'yellow'
                    ],
                    [
                        'content' => 'от 50 000',
                        'colspan' => 3,
                        'border' => 'yellow'
                    ]
                ],
                [
                    [
                        'content' => 'Срок размещения<br>(месяцы)',
                        'border' => 'yellow'
                    ],
                    [
                        'content' => '3',
                        'border' => 'yellow'
                    ]
                ],
                [
                    [
                        'content' => 'Процентная ставка<br>(% годовых)',
                        'border' => 'yellow'
                    ],
                    [
                        'content' => '8,5',
                        'border' => 'yellow'
                    ]
                ],
                [
                    [
                        'content' => 'Выплата процентов',
                        'border' => 'yellow'
                    ],
                    [
                        'content' => 'в конце срока',
                        'border' => 'yellow'
                    ]
                ],
                [
                    [
                        'content' => 'Пополнение',
                        'border' => 'yellow'
                    ],
                    [
                        'content' => 'да',
                        'border' => 'yellow'
                    ]
                ],
                [
                    [
                        'content' => 'Частичное снятие',
                        'border' => 'yellow'
                    ],
                    [
                        'content' => 'нет',
                        'border' => 'yellow'
                    ]
                ],
                [
                    [
                        'content' => 'Капитализация %',
                        'border' => 'yellow'
                    ],
                    [
                        'content' => 'нет',
                        'border' => 'yellow'
                    ]
                ],
                [
                    [
                        'content' => 'Досрочное<br>расторжение<br>(% годовых)',
                        'border' => 'yellow'
                    ],
                    [
                        'content' => '0,1',
                        'border' => 'yellow'
                    ]
                ]
            ]
        ];

        $calc_easy = \app\models\Settings::field('calc_easy');
        $calc_stable = \app\models\Settings::field('calc_stable');
        $calc_max = \app\models\Settings::field('calc_max');
        $calc_promo = \app\models\Settings::field('calc_promo');

        $calc_info = [
            'programs' => [
                $calc_easy['option'],
                $calc_stable['option'],
                $calc_max['option'],
                $calc_promo['option']
            ],
            'rates' => [
                '1' => $calc_easy['rates'],
                '2' => $calc_stable['rates'],
                '3' => $calc_max['rates'],
                '4' => $calc_promo['rates']
            ],
            'ranges' => [
                '1' => $calc_easy['ranges'],
                '2' => $calc_stable['ranges'],
                '3' => $calc_max['ranges'],
                '4' => $calc_promo['ranges']
            ],
            'months' => [
                '1' => $calc_easy['months'],
                '2' => $calc_stable['months'],
                '3' => $calc_max['months'],
                '4' => $calc_promo['months']
            ]
        ];

        return $this->render('index', [
            'tariffs' => [$easy, $stable, $max, $promo],
            'calc_info' => json_encode($calc_info)
        ]);
    }
}