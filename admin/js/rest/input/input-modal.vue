<template>
    <div>

<!--        <el-dialog
            :visible.sync="isOpen"
            width="80%"
            center>

            <component
                v-bind:is="componentField"
                :value="value"
                :value_name="value_name"
                :id="id"
                @input="inValue = arguments[0]"
                :rows="20"
                :enumeration="enumeration"
                :filter="filter"
            />

            <span slot="footer" class="dialog-footer">
                <button :disabled="isDisabledBtn" :class="{'is-loading': isLoading}" @click="save" class="btn btn-primary">
                    <span>Сохранить</span>
                </button>
            </span>
        </el-dialog>-->

      componentField MODAL
<!--        <component
            v-bind:is="componentField"
            :filter="filter"
            :value="value"
            :value_name="value_name"
            :id="id"
            :isEdit="false"
            :visible="visible"
            :enumeration="enumeration"
        />-->
    </div>
</template>

<script>
import { cloneDeep, isEqual } from 'lodash'
export default {
    name: "input-modal",
    components: {
    },
    props: {
        enumeration: {},
        filter: {},
        typeAttribute: {
            type: String
        },
        componentInputDir: {
            type: String
        },
        value: {},
        value_name: {},
        id: {},
        isEdit: {
            type: Boolean,
            default: true
        },
        isLoading: {
            type: Boolean,
            default: false
        },
        visible: {
            type: String,
            default: 'full',
            validator: function (value) {
                return ['mini', 'full'].includes(value)
            }
        }
    },
    data(){
        return {
            isOpen: this.isEdit,
            inValue: this.value,
            initialValue: cloneDeep(this.value),
        }
    },

    mounted(){
        window.addEventListener('keydown', this.ctrlS);

        this.$root.$on('saveYiiUpdate',  this.save)
    },
    destroyed(){
        window.removeEventListener('keydown', this.ctrlS);
    },
    computed: {
        isDisabledBtn(){
            return isEqual(this.initialValue,this.value)
        }
    },
    watch: {
        inValue:{
            deep: true,
            handler() {
                this.$emit('input',this.inValue)
            }
        },
        isOpen(){
            if (!this.isOpen){
                this.$emit('close')
            }
        },
        isEdit(){
            this.isOpen = this.isEdit
        }
    },
    methods: {
        ctrlS(e){
            if((e.ctrlKey || e.metaKey) && e.which === 83) {
                this.save()
                e.preventDefault();
                return false;
            }
        },
        save(){

            if (!isEqual(this.initialValue,this.value) && this.isOpen){
                this.initialValue = cloneDeep(this.inValue)
                this.$emit('save')
            }
        },
        componentField(){

            // Ищем компонент в общей папке
           /* let input = () => import(`./input-${this.typeAttribute}`)
            return input()
                .then(() => input())
                .catch(() => {
                    return import(`./../page/${this.componentInputDir}/input-${this.typeAttribute}`)
                })*/
        },
    }
}
</script>

<style scoped>

</style>
