<template>
    <div class="input-select">
        <!--<treeselect
            ref="input"
            v-if="isEdit"
            :maxHeight="500"
            :options="enumeration"
            :value="value"
            @input="setValue"
            :disabled="disabled"
            :openOnFocus="insertionPoint === 'table'"
            :autoFocus="insertionPoint === 'table'"

        />-->

        <select class="form-control form-control-sm"  v-if="isEdit" name="" id="">
            <option v-for="item in enumeration" :value="item.value">{{item.label}}</option>
        </select>
        <div v-else>
            {{enumeration.find(i => i.id === value) ? enumeration.find(i => i.id === value).label : '' }}
        </div>
    </div>
</template>

<script>
//import treeselect from '@riophae/vue-treeselect'
export default {
    name: "input-select",
    components: {
        //treeselect
    },
    props:{
        value: [Number,String],
        enumeration: {
            type: Array,
            default: () => ([])
        },
        disabled:{
            type: Boolean,
            default: false
        },
        isEdit: {
            type: Boolean,
            default: true
        },
        insertionPoint: String
    },
    methods:{
        setValue(val){
            this.$emit('input',val === undefined ? null : val)
            this.$emit('save')
        }
    },
    watch:{

    },
}
</script>

<style scoped>

</style>
