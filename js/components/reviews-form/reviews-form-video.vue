<template>
    <div class="form-file-wrapper mb-3">
        <div class="form-file-group-title">
            Видео:
        </div>
        <div class="form-file-group d-flex flex-wrap" data-role="reviews-file-group">
            <div v-if="video.file.length > 0" class="form-file-group-item">
                <img src="/../../img/delete_image.svg" alt="delete" class="form-file-delete-icon" data-visible="true" @click="deleteItem">
                <div class="form-file-video-icon"></div>
                <div class="form-file-video-name mt-2">
                    {{ getVideoName }}
                </div>
            </div>
            <div class="form-file-group-item">
                <reviews-form-add-file v-if="video.file.length === 0" @change="getFile($event)" :type="type"
                                       :count="video.file ? 1 : 0" :maxFileCount="1"/>
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
        name: 'reviews-form-video',
        props: {
          messages: Array
        },
        components: {
            ReviewsFormAddFile
        },
        data() {
            return {
                video: {
                    file: [],
                    name: false
                },
                type: 'video'
            }
        },
        methods: {
            getFile(item) {
                this.video.file.push(item);
                this.video.name = item.name;
                this.$emit('input', this.video.file.map((i) => (
                    {
                        file: i
                    }
                )));
            },
            deleteItem() {
                this.video.file = [];
                this.$emit('removeInvalid');
            },
        },
        computed: {
            getVideoName() {
                if (this.video.name.length > 17) {
                    return this.video.name.slice(0, 17) + '...';
                }

                return this.video.name;
            }
        }
    }
</script>