<template>
    <div>
        <input
            ref="input"
            class="form-control"
            :value="value"
            @input="e => $emit('input',e.target.value === '' ? undefined: e.target.value)"
            type="text"
            @keydown.enter="$emit('save')"
        >
    </div>
</template>

<script>
export default {
    name: "input-string",
    props:{
        value: [String,Number],
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
