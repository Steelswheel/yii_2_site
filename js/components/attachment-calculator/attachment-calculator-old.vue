<template>
    <div class="attachment-calculator">
        <div class="attachment-calculator__group">
            <label for="">
                Сумма вложения (рубли)
            </label>
            <input class="attachment-calculator__group__input input-gray" type="text" v-model.number="range.value">
            <el-slider
                class="attachment-calculator__sticky"
                v-model="range.value"
                :show-tooltip="false"
                :min="range.min"
                :step="range.step"
                :max="range.max"
            >
            </el-slider>
        </div>
        <div class="attachment-calculator__group">
            <div>
                <label>Продукт</label>
            </div>
            <el-select
                style="width: 100%"
                v-model="program"
            >
                <el-option
                    v-for="program in programs"
                    :key="program.label"
                    :value="program.id"
                    :label="program.label"
                    style="color: #212529"
                />
            </el-select>
        </div>
        <div class="attachment-calculator__group">
            <label>
                На срок {{term}} {{term | month}}
            </label>
            <el-slider
                v-model="timeMonth"
                :show-tooltip="false"
                :step="1"
                :min="1"
                :max="3"
                :marks="month"
            >
            </el-slider>
        </div>
        <div class="attachment-calculator__result">
            <div class="text-center">
                <div style="display: inline-block" ref="info">
                    <p style="width: max-content">
                        Общий доход
                        <span class="attachment-calculator__border">
                            {{totalSum | price}}
                        </span>₽
                    </p>
                    <p style="width: max-content">
                        Доход в месяц
                        <span class="attachment-calculator__border">
                            {{monthlyIncome | price}}
                        </span>₽
                    </p>
                    <p style="width: max-content">
                        Ставка
                        <span class="attachment-calculator__border">
                            {{bidCalc}}
                        </span>% годовых
                    </p>
                    <p style="width: max-content" class="mb-3">
                        Срок
                        <span class="attachment-calculator__border">
                            {{term}}
                        </span>мес.
                    </p>
                </div>
            </div>
            <div class="text-center">
                <div
                    @click="send"
                    class="btn-purple btn-purple--b10"
                    data-bs-toggle="modal"
                    data-bs-target="#sendModalCalc"
                >
                    Получить доход
                    <div>
                        {{totalSum | price}}₽
                    </div>
                </div>
            </div>
            <p class="small">
                *Пример расчета процентов носит информационный характер и не является публичной офертой
            </p>
        </div>
    </div>
</template>

<script>
import { Slider, Select, Option } from 'element-ui';

function declOfNum(n, text_forms) {
    n = Math.abs(n) % 100;
    let  n1 = n % 10;
    if (n > 10 && n < 20) { return text_forms[2]; }
    if (n1 > 1 && n1 < 5) { return text_forms[1]; }
    if (n1 == 1) { return text_forms[0]; }
    return text_forms[2];
}

export default {
    name: 'attachment-calculator',
    components: {
        'el-slider': Slider,
        'el-select': Select,
        'el-option': Option
    },
    props: {
        ranges: {
            type: String
        },
        rates: {
            type: String
        }
    },
    data() {
        return {
            program: 1,
            programs: [
                {
                    id: 1,
                    label: 'Легкий старт'
                },
                {
                    id: 2,
                    label: 'Стабильный доход'
                },
                {
                    id: 3,
                    label: 'Максимальный доход'
                },
                {
                    id: 4,
                    label: 'Промо'
                }
            ],
            range: JSON.parse(this.ranges),
            rate: JSON.parse(this.rates),
            timeMonth: 3,
            month: {
                1: '3',
                2: '6',
                3: '12'
            },
            monthTermObject: {
                1: 3,
                2: 6,
                3: 12
            }
        }
    },
    computed: {
        daysInYear: function () {
            const date = new Date();
            return Math.ceil((new Date(date.getFullYear(), 11, 31) - new Date(date.getFullYear(), 0, 0))/86400000);
        },
        days: function () {
            const date = new Date();
            const finalDate = new Date(date.getFullYear(), date.getMonth() + +this.term, date.getDate());
            return Math.ceil((finalDate - date)/86400000);
        },
        bidCalc() {
            if (this.rate[this.timeMonth]) {
                return this.rate[this.timeMonth]
            }

            return 0;
        },
        term() {
            return this.monthTermObject[this.timeMonth]
        },
        monthlyIncome() {
            return this.totalSum/this.term
        },
        totalSum() {
            return (((this.range.value*(this.bidCalc/100)*this.days)/this.daysInYear));
        }
    },
    methods: {
        send() {
            let text = `Общий доход: ${this.$options.filters.price(this.totalSum)} ₽\n`
            text += `Доход в месяц: ${this.$options.filters.price(this.monthlyIncome)} ₽\n`
            text += `Ставка: ${this.bidCalc}\n`
            text += `Срок: ${this.term}`

            document.querySelector('#sendModalCalc [name="text"]').value = text
        },
    },
    filters: {
        month(value) {
            return declOfNum(value,['месяц','месяца','месяцев'])
        },
        price(value) {
            return value
                .toFixed(2)
                .toString()
                .replace(/(\d{1,3}(?=(?:\d\d\d)+(?!\d)))/g, "$1" + ' ');
        }
    }
}
</script>

<style scoped>

</style>