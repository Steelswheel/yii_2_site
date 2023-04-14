<template>
    <label :for="'reviews-file-input-' + type + count">
        <div style="cursor: pointer">
            <svg width="114" height="74" viewBox="0 0 114 74" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="1" y="1" width="112" height="72" rx="5.90909" stroke="#8757E8" stroke-width="2" stroke-dasharray="6.22 6.22"/>
                <path d="M56.7314 26V48" stroke="#8757E8" stroke-width="2" stroke-linecap="round"/>
                <path d="M46 37L68 37" stroke="#8757E8" stroke-width="2" stroke-linecap="round"/>
            </svg>
        </div>
        <input
            class="form-file-input"
            type="file"
            :id="'reviews-file-input-' + type + count"
            :accept="type === 'image' ? 'image/*' : '.mov, .mpeg4, .mp4, .avi, .wmv, .flv, .webm'"
            @change="onChange($event)"
            :value="value"
            :name="'reviews-form-file-' + type"
        >
    </label>
</template>

<script>
export default {
    name: 'reviews-form-add-file',
    props: {
        count: Number,
        maxFileCount: Number,
        type: String
    },
    data() {
        return {
          value: null,
        }
    },
    methods: {
        onChange(event) {
            this.setValue(event);
            this.getFiles(event);
        },
        setValue(event) {
            this.value = event.target.value;
        },
        clearValue() {
          this.value = null;
        },
        getFiles(event) {
            if (this.count <= this.maxFileCount) {
              this.$emit('change', event.target.files[0]);
              this.clearValue();
            }
        }
    }
}
</script>