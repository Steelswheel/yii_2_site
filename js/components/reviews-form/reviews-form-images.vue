<template>
    <div class="form-file-wrapper">
        <div class="form-file-group-title">
            Фотоотзыв (не более 5 фото):
        </div>
        <div class="form-file-group d-flex flex-wrap" data-role="reviews-file-group">
          <div v-for="(file, index) in img">
            <div class="form-file-group-item">
              <img src="/../../img/delete_image.svg" alt="delete" class="form-file-delete-icon" data-visible="true" @click="deleteItem(index)">
              <div v-if="previews[index]" class="form-file-preview" :style="`background-image: url(${previews[index]});`"></div>
            </div>
          </div>
          <div class="form-file-group-item">
              <reviews-form-add-file v-if="img.length < maxFileCount" @change="getFiles($event)" :count="img.length" :type="type" :maxFileCount="maxFileCount"/>
          </div>
        </div>
        <div v-if="messages && messages.length > 0" v-for="message in messages" :key="message" class="form-error-message">
          {{ message }}
        </div>
    </div>
</template>

<script>
    import ReviewsFormAddFile from './reviews-form-add-file';
    export default {
        name: 'reviews-form-images',
        props: {
          messages: Array
        },
        components: {
            ReviewsFormAddFile
        },
        data() {
            return {
                maxFileCount: 5,
                img: [],
                previews: [],
                type: 'image'
            }
        },
        methods: {
            getPreview(item) {
                const reader = new FileReader;

                reader.readAsDataURL(item);

                reader.addEventListener('load', (e) => {
                    this.previews.push(e.target.result);
                });
            },
            getFiles(item) {
                this.getPreview(item);
                this.img.push(item);
                this.$emit('input', this.img.map((i) => (
                    {
                      file: i
                    }
                )));
            },
            deleteItem(index) {
                this.img.splice(index, 1);
                this.previews.splice(index, 1);
                this.$emit('add', this.img);
                this.$emit('removeInvalid');
            },
        },
    }
</script>