<template>
    <div class="input-select">
        <treeselect
                ref="input"
                v-if="isEdit"
                :maxHeight="500"
                :options="enumeration"
                :value="value"
                @input="setValue"
                :disabled="disabled"
                :openOnFocus="insertionPoint === 'table'"
                :autoFocus="insertionPoint === 'table'"

        />
        <div v-else>
            {{ findTree(value,enumeration)}}
        </div>
    </div>
</template>

<script>
    import Treeselect from '@riophae/vue-treeselect'
    export default {
        name: "input-select",
        components: {
            Treeselect
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
            },
            findTree(find,tree){

                const stack = [...tree];
                while (stack.length) {
                    const node = stack.shift()
                    if (node.id === find) return node.label
                    node.children && stack.push(...node.children)
                }
                return null

            }
        },
        watch:{
            isEdit(){


            }
        },
    }
</script>