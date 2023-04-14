<template>
    <span>
        <a @click.prevent="isOpenColumnSelection = true" href="#" class="btn btn-xs btn-default">
            <i class="glyphicon glyphicon-cog"></i>
        </a>

        <span v-if="isOpenColumnSelection">open</span>

<!--        <el-dialog
            title="Столбцы"
            :visible.sync="isOpenColumnSelection"
            width="80%"
            center>

            <draggable
                :list="inAttributes"
                class="column-select-list"
                element="div"
                :style="`grid-template-rows: repeat(${Math.ceil(inAttributes.length/3)}, auto)`"
                :options="{handle:'.btn-drag', style: ''}"
            >
                <div v-for="itemAttribute in inAttributes" :key="'eldropdownitem'+itemAttribute.attribute">
                    <div class="">
                        <span class="btn btn-xs btn-default btn-drag"><i class="fa fa-navicon" ></i></span>
                        <span v-if="itemAttribute.show === undefined">
                            {{itemAttribute.attributeLabel || (labels[itemAttribute.attribute] ? labels[itemAttribute.attribute] : itemAttribute.attribute)}}
                        </span>
                        <el-checkbox v-else v-model="itemAttribute.show">
                            {{itemAttribute.attributeLabel || (labels[itemAttribute.attribute] ? labels[itemAttribute.attribute] : itemAttribute.attribute)}}
                        </el-checkbox>
                    </div>
                </div>
            </draggable>

            <span slot="footer" class="dialog-footer">
                <button @click.prevent="reset" class="btn btn-danger m-r-md">
                    Сбросить
                </button>
                <button @click.prevent="clearCheck" class="btn btn-link">
                    снять все
                </button>
                <button @click.prevent="isOpenColumnSelection = false" class="btn btn-default">
                    Закрыть
                </button>
                <button @click.prevent="save" class="btn btn-primary">
                    Сохронить
                </button>

            </span>
        </el-dialog>-->

    </span>
</template>

<script>
import { cloneDeep, isEqual } from 'lodash'
export default {
    name: "table-column-select",
    props: {
        attributes: {
            type: Array,
            default: () => ([])
        },
        resetAttributes: {
            type: Array,
            default: () => ([])
        },
        labels: {
            type: Object,
            default: () => ({})
        }
    },
    data(){
        return {
            inAttributes: cloneDeep(this.attributes),
            isOpenColumnSelection: false
        }
    },
    watch: {
        attributes(){
            if (!isEqual(this.attributes, this.inAttributes)){
                this.inAttributes = cloneDeep(this.attributes)
            }
        }
    },
    methods: {
        clearCheck(){
            this.inAttributes.forEach(i => {
                if (i.show){
                    i.show = false
                }
            })
        },
        reset(){
            this.inAttributes = cloneDeep(this.resetAttributes)
            this.$emit('attributes',this.resetAttributes)
            this.isOpenColumnSelection = false
        },
        save(){
            this.$emit('attributes',cloneDeep(this.inAttributes))
            this.isOpenColumnSelection = false
        }
    }
}
</script>

<style scoped>

.column-select-list{
    display: grid;
    grid-template-columns: 33% 33% 33%;
    column-gap: 10px;
    row-gap: 5px;
    grid-auto-flow: column;
}
>>> .el-dialog--center .el-dialog__body {
    text-align: initial;
    padding: 25px 25px 0;
}
</style>
