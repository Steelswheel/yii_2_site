<template>
    <div class="attachment-calculator">
        <div class="attachment-calculator__group">
            <div>
                <label>
                    Продукт
                </label>
            </div>
            <el-select
                style="width: 100%"
                v-model="program"
            >
                <el-option
                    v-for="program in getPrograms"
                    :key="program.label"
                    :value="program.id"
                    :label="program.label"
                    style="color: #212529"
                />
            </el-select>
        </div>
        <div class="attachment-calculator__group" v-if="program">
            <label>
                Сумма вложения (рубли)
            </label>
            <input class="attachment-calculator__group__input input-gray" type="number" @input="setRangeValue" :value="range">
            <el-slider
                class="attachment-calculator__sticky"
                v-model="range"
                :show-tooltip="false"
                :min="getRanges[program].min"
                :step="getRanges[program].step"
                :max="getRanges[program].max"
            >
            </el-slider>
        </div>
        <div class="attachment-calculator__group" v-show="Object.keys(this.getMonths[this.program]).length > 1">
            <label>
                На срок {{ getSelectedMonth }}
            </label>
            <el-slider
                v-model="month"
                :show-tooltip="false"
                :step="1"
                :min="1"
                :max="3"
                :marks="getMonthMarks[program]"
            >
            </el-slider>
        </div>
        <div class="attachment-calculator__result">
            <div class="text-center">
                <div style="display: inline-block" ref="info">
                    <p style="width: max-content">
                        Общий доход
                        <span class="attachment-calculator__border">
                            {{ totalSum }}
                        </span>₽
                    </p>
                    <p style="width: max-content">
                        Доход в месяц
                        <span class="attachment-calculator__border">
                            {{ monthlyIncome }}
                        </span>₽
                    </p>
                    <p style="width: max-content">
                        Ставка
                        <span class="attachment-calculator__border">
                            {{ this.getRates[this.program][this.month] }}
                        </span>% годовых
                    </p>
                    <p style="width: max-content" class="mb-3">
                        Срок
                        <span class="attachment-calculator__border">
                            {{ this.getMonths[this.program][this.month] }}
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
                        {{ totalSum }}
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
        info: String
    },
    data() {
        return {
            program: 1,
            parsedInfo: JSON.parse(this.info),
            range: 0,
            month: 1,
        }
    },
    methods: {
        setRangeValue(event) {
            if (Number(event.target.value) >= Number(this.getRanges[this.program].min) && Number(event.target.value) <= Number(this.getRanges[this.program].max)) {
                this.range = Number(event.target.value);
            }

            if (event.target.value > Number(this.getRanges[this.program].max)) {
                this.range = event.target.value = Number(this.getRanges[this.program].max);
            }
        },
        send() {
            let text = `Общий доход: ${this.totalSum} ₽\n`;
            text += `Доход в месяц: ${this.monthlyIncome} ₽\n`;
            text += `Ставка: ${this.getRates[this.program][this.month]}\n`;
            text += `Срок: ${this.getMonths[this.program][this.month]}`;

            document.querySelector('#sendModalCalc [name="text"]').value = text;
        }
    },
    watch: {
        program(value) {
            this.range = this.getRanges[value].min;
        }
    },
    computed: {
        getPrograms() {
            const programs = [];

            for (let program in this.parsedInfo.programs) {
                programs.push(JSON.parse(this.parsedInfo.programs[program]));
            }

            return programs;
        },
        getRates() {
            const rates = {};

            for (let rate in this.parsedInfo.rates) {
                rates[rate] = JSON.parse(this.parsedInfo.rates[rate]);
            }

            return rates;
        },
        getRanges() {
            const ranges = {};

            for (let range in this.parsedInfo.ranges) {
                ranges[range] = JSON.parse(this.parsedInfo.ranges[range]);
            }

            return ranges;
        },
        getMonths() {
            const months = {};

            for (let month in this.parsedInfo.months) {
                months[month] = JSON.parse(this.parsedInfo.months[month]);
            }

            return months;
        },
        getMonthMarks() {
            const months = {};

            for (let month in this.parsedInfo.months) {
                let obj = JSON.parse(this.parsedInfo.months[month]);

                for (let i in obj) {
                    obj[i] = obj[i].toString();
                }

                months[month] = obj;
            }

            return months;
        },
        getSelectedMonth() {
            return this.getMonths[this.program][this.month] + ' ' + declOfNum(this.getMonths[this.program][this.month],['месяц','месяца','месяцев']);
        },
        daysInYear: function () {
            const date = new Date();
            return Math.ceil((new Date(date.getFullYear(), 11, 31) - new Date(date.getFullYear(), 0, 0))/86400000);
        },
        days: function () {
            const date = new Date();
            const finalDate = new Date(date.getFullYear(), date.getMonth() + +this.getMonths[this.program][this.month], date.getDate());
            return Math.ceil((finalDate - date)/86400000);
        },
        monthlyIncome() {
            return (this.totalSum/+this.getMonths[this.program][this.month]).toFixed(2);
        },
        totalSum() {
            return (((this.range * (this.getRates[this.program][this.month] / 100) * this.days) / this.daysInYear)).toFixed(2);
        }
    }
}
</script>

<style scoped>

</style>