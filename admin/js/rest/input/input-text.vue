<template>
    <div>
        <textarea
            v-if="isEdit"
            :value="value"
            @input="e => $emit('input',e.target.value)"
            :rows="rows"
            class="form-control"
            :disabled="disabled"
        ></textarea>
        <div v-else>
            <div v-if="visible === 'mini'">
                {{visibleMini}}
            </div>
            <div v-else>
                {{value}}
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "input-string",
        props:{
            value: [String,Number],
            rows: {
                type: Number,
                default: 5
            },
            disabled:{
                type: Boolean,
                default: false
            },
            isEdit: {
                type: Boolean,
                default: true
            },
            visible: {
                type: String,
                default: 'full',
                validator: function (value) {
                    return ['mini', 'full'].includes(value)
                }
            }
        },
        computed: {
            visibleMini(){
                return this.value
                    ? this.value.length > 120
                        ? `(${this.value.length}) ${this.value.substr(0,120)}...`
                        : this.value
                    : this.value
            }
        }
    }
</script>

<style scoped>

</style>