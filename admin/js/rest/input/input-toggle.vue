<template>
    <div :class="`input-toggle size-input-${size}` ">
        <el-switch
                :value="value"
                @input="$emit('input',arguments[0])"
                :active-value="1"
                :inactive-value="0"
                active-color="#43A33F"
                :disabled="disabled || !isEdit"
        >
        </el-switch>
    </div>
</template>

<script>
    import { Switch } from 'element-ui'
    export default {
        name: "input-toggle",
        components: {
            'el-switch': Switch
        },
        props:{
            value: {
                 type: Number,
                 default: 0
            },
            disabled:{
                type: Boolean,
                default: false
            },
            isEdit: {
                type: Boolean,
                default: true
            },
            size:{
                type: String,
                default: 'sm'
            },

        }
    }
</script>

<style scoped>
    .fa-toggle-on{
        color: #43A33F;
    }
    .input-toggle i {
        cursor: pointer;
    }
</style>