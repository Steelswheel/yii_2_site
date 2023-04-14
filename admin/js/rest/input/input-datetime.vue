<template>
    <div>


        <el-date-picker
                v-if="isEdit"
                v-model="inValue"
                value-format="yyyy-MM-dd"
                format="dd.MM.yyyy"
                :picker-options="{
                firstDayOfWeek: 1
            }"
        />


        <div v-else>
            {{valueFormat}}
        </div>
    </div>
</template>

<script>
    import 'vue-ctk-date-time-picker/dist/vue-ctk-date-time-picker.css';
    import { DatePicker} from 'element-ui'
    import moment from 'moment'
    moment.locale('ru')
    export default {
        name: "input-datetime",
        components: {
            'el-date-picker': DatePicker
        },
        props:{
            value: [String,Number],
            disabled:{
                type: Boolean,
                default: false
            },
            isEdit: {
                type: Boolean,
                default: true
            }

        },
        data(){
            return {
                inValue: this.value,
                id: this._uid
            }
        },
        computed: {
            valueFormat(){
                return moment(this.inValue,'YYYY-MM-DD hh:mm:ss').format('lll');  /// this.value + '--'
            }
        },
        mounted() {

        },
        watch:{
            inValue(){
                this.$emit('input',this.inValue)

            },
            value(){
                if (this.value !== this.inValue){
                    this.inValue = this.value;
                }
            }
        },
    }
</script>

<style scoped>

</style>