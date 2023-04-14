<template>
    <div>
        <input
            v-if="isEdit"
            ref="input"
            class="form-control"
            :disabled="disabled"
            :value="value"
            @input="e => $emit('input',e.target.value)"
            type="text"
            @keydown.enter="$emit('save')"
        >
        <span v-else>{{value}}</span>
    </div>
</template>

<script>
export default {
    name: "input-string",
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
    watch:{
        isEdit(){
            if(this.isEdit){
                this.$nextTick(() => {
                    this.$refs.input.focus()
                })
            }

        }
    },
}
</script>
