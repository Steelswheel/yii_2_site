<template>
  <div class="el-input-video">
    <div v-for="file in inValue">
      <div class="el-input-video-wrapper d-flex" v-if="file.url">
        <div class="d-flex flex-column">
          <video :src="file.url" controls></video>
          <div :class="file.deleted ? 'el-input-video-name deleted mt-2' : 'el-input-video-name mt-2'">
            {{ file.name }}
          </div>
          <b-button v-b-modal.youtubeLoad v-if="!file.deleted && file.url && !file.loaded" class="btn btn-xs btn-danger m-t-xs mt-2">
              Добавить на Youtube
          </b-button>
          <a download :href="file.url" v-if="!file.deleted && file.url" class="btn btn-xs btn-success m-t-xs mt-2">
            Скачать
          </a>
        </div>
        <i v-if="!disabled" @click.prevent="removeLoaded" class="el-icon-close ml-2"></i>
      </div>

      <div class="el-input-video-wrapper d-flex" v-else>
        <div class="d-flex">
          <div :class="file.file.deleted ? 'el-input-video-name deleted' : 'el-input-video-name without-video'">
            {{ file.file.name }}
          </div>
          <i v-if="!disabled" @click.prevent="removeInput" class="el-icon-close"></i>
        </div>
      </div>
    </div>

    <b-modal id="youtubeLoad" title="Загрузить видео на Youtube" hide-footer>
        <div class="youtube-download-form" v-if="!video.submitted">
            <label for="youtube_video_name" class="youtube-download-form-label">
                Название:
                <textarea
                    v-model="video.name"
                    id="youtube_video_name"
                    name="youtube_video_name"
                    class="youtube-download-form-textarea mt-2 p-2"
                    maxlength="100"
                >
                </textarea>
            </label>
            <label for="youtube_video_description" class="youtube-download-form-label mt-2">
                Описание:
                <textarea
                    v-model="video.description"
                    id="youtube_video_description"
                    name="youtube_video_description"
                    class="youtube-download-form-textarea mt-2 p-2"
                    maxlength="5000"
                >
                </textarea>
            </label>
            <label for="youtube_video_tags" class="youtube-download-form-label mt-2">
                Теги (обязательно через запятую!):
                <textarea
                    v-model="video.tags"
                    id="youtube_video_tags"
                    name="youtube_video_tags"
                    class="youtube-download-form-textarea mt-2 p-2"
                    maxlength="500"
                >
                </textarea>
            </label>
            <button @click.prevent="addVideoToYoutube" class="btn btn-danger mt-2">
                Загрузить
            </button>
        </div>
        <div v-else>
            <div v-if="video.submitResponse">
                {{ video.submitResponse }}
            </div>
            <div v-if="video.sumbitError">
                {{ video.sumbitError }}
            </div>
        </div>
    </b-modal>

    <button v-if="!disabled && inValue.length < 1" @click.prevent="open" class="btn btn-xs btn-primary m-t-xs">
      Загрузить
    </button>

    <input style="display: none" ref="fileUpload" @change="add" type="file">
  </div>
</template>

<script>
    import API from '../../API';

    export default {
        name: 'input-video',
        props:{
            value: {
                default: () => ([])
            },
            disabled: {
                type: Boolean,
                default: false
            }
        },
        data() {
            return {
                files: [],
                deleteFiles: [],
                inValue: JSON.parse(JSON.stringify(this.value)),
                visible: false,
                video: {
                    name: '',
                    description: '',
                    tags: '',
                    submitted: false,
                    submitResponse: '',
                    sumbitError: ''
                }
            }
        },
        computed: {
          getFirstValue() {
            return this.inValue[0];
          },
          getVideoTags() {
              if (this.video.tags) {
                  const tags = this.video.tags.split(',');
                  tags.forEach(item => item.trim());
                  return tags;
              }

              return false;
          }
        },
        watch: {
            value() {
                if (JSON.stringify(this.inValue) !== JSON.stringify(this.value)) {
                    this.inValue = JSON.parse(JSON.stringify(this.value));
                }
            },
            inValue: {
                deep: true,
                handler() {
                    this.$emit('input', this.inValue);
                }
            }
        },
        methods: {
            add() {
                this.inValue = [];

                let filesFormat = [...this.$refs.fileUpload.files].map(i => ({file: i}));

                this.inValue = [...this.inValue,...filesFormat];

                this.$refs.fileUpload.type = '';
                this.$refs.fileUpload.type = 'file';
            },
            removeInput() {
                this.inValue = [];
            },
            removeLoaded() {
                this.getFirstValue.deleted = this.getFirstValue.deleted ? 0 : 1;
            },
            open() {
              this.$refs.fileUpload.click();
            },
            addVideoToYoutube() {
                const formData = {
                    id: this.getFirstValue.id,
                    name: this.video.name,
                    description: this.video.description,
                    tags: this.getVideoTags,
                    file: this.getFirstValue.url
                }

                let check = [];

                for (let item in formData) {
                    if (formData[item]) {
                        check.push(true);
                    }
                }

                if (check.length === Object.keys(formData).length) {
                    return API.getData('/reviews/youtube/', formData).then(
                        response => {
                            this.video.submitted = true;
                            this.video.submitResponse = response;
                        }
                    ).catch(
                        error => {
                            this.video.submitted = true;
                            this.video.sumbitError = error;
                        }
                    );
                } else {
                    return false;
                }
            }
        }
    }
</script>

<style>
    .el-input-video-wrapper video {
        width: 100%;
        max-height: 150px;
    }

    .el-input-video-name {
        display: inline-block;
    }

    .el-input-video-name.deleted {
        color: red;
    }

    .el-icon-close {
        cursor: pointer;
        font-size: 16px;
    }

    .youtube-download-form-label {
        display: block;
    }

    .youtube-download-form-textarea {
        width: 100%;
        resize: none;
        border: 1px solid #808080;
        height: 100px;
    }
</style>