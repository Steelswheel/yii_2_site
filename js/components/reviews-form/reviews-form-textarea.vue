<template>
    <div class="form-textarea-wrapper">
        <label :for="id">
            {{ label }}
        </label>
        <div data-role="form-error-wrapper">
            <textarea
                :id="id"
                :name="id"
                :class="invalidClass"
                :placeholder="placeholder"
                @input="onInput($event)"
            >
            </textarea>
            <div v-if="messages && messages.length > 0" v-for="message in messages" :key="message" class="form-error-message">
                {{ message }}
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'reviews-form-textarea',
        props: {
            id: String,
            placeholder: String,
            label: [String, Number],
            messages: Array
        },
        computed: {
            invalidClass() {
                if (this.messages && this.messages.length > 0) {
                    return 'form-textarea invalid';
                } else {
                    return 'form-textarea';
                }
            }
        },
        methods: {
            onInput(event) {
                this.$emit('removeInvalid');
                this.getValue(event);
            },
            getValue(event) {
                this.$emit('input', event.target.value);
            }
        }
    }
</script>

<style scoped>

</style>