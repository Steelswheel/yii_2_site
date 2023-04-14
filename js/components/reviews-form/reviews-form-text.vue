<template>
    <div class="form-group">
        <label :for="id">
            {{ label }}
        </label>
        <div class="form-error-wrapper">
            <input
                :id="id"
                :name="id"
                :class="invalidClass"
                :type="type"
                :placeholder="placeholder"
                :required="required"
                @input="onInput($event)"
            >
            <div v-if="messages && messages.length > 0" v-for="message in messages" :key="message" class="form-error-message">
                {{ message }}
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'reviews-form-text',
    props: {
        id: String,
        type: String,
        placeholder: String,
        label: [String, Number],
        messages: Array,
        required: Boolean
    },
    computed: {
      invalidClass() {
          if (this.messages && this.messages.length > 0) {
              return 'form-control-input invalid';
          } else {
              return 'form-control-input';
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
