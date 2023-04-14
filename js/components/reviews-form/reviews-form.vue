<template>
    <div class="modal fade1" id="reviewModal" tabindex="-1" aria-labelledby="sendModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-send">
        <div class="modal-content">
          <span class="modal-close" data-bs-dismiss="modal" aria-label="Close" @click="updateForm">Закрыть</span>
          <span class="modal-mobile-close" data-bs-dismiss="modal" aria-label="Close" @click="updateForm">
              <div class="form-file-image" data-visible="true">
                  <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.75 0.750488L13.25 13.2505" stroke="#8757E8" stroke-width="1.18" stroke-linecap="round"/>
                    <path d="M13.252 0.749756L0.751953 13.2498" stroke="#8757E8" stroke-width="1.18" stroke-linecap="round"/>
                  </svg>
              </div>
          </span>
          <div class="modal-body">
            <div v-if="successSubmit" class="form-submission--success text-center mb-5">
              Ваш отзыв успешно добавлен и ожидает модерации
            </div>
            <div v-else class="form-inputs">
              <reviews-form-text
                  id="reviews-name"
                  type="text"
                  placeholder="Имя Фамилия"
                  v-model="fields.name"
                  @removeInvalid="delete errors['name']"
                  :messages="errors['name']"
                  :required="true"
                  label="Имя и Фамилия*:"
              />
              <reviews-form-text
                  id="reviews-email"
                  type="email"
                  placeholder="example@gmail.com"
                  v-model="fields.email"
                  @removeInvalid="delete errors['email']"
                  :messages="errors['email']"
                  label="Электронная почта*:"
              />
              <reviews-form-text
                  id="reviews-company"
                  type="text"
                  placeholder="АО 'Моя компания'"
                  v-model="fields.company"
                  @removeInvalid="delete errors['company']"
                  :messages="errors['company']"
                  label="Название компании:"
              />
              <reviews-form-text
                  id="reviews-city"
                  type="text"
                  placeholder="Москва"
                  v-model="fields.city"
                  @removeInvalid="delete errors['city']"
                  :messages="errors['city']"
                  label="Город:*"
              />
              <reviews-form-text
                  id="reviews-link"
                  type="text"
                  placeholder="https://example.com"
                  v-model="fields.link"
                  @removeInvalid="delete errors['link']"
                  :messages="errors['link']"
                  label="Ссылка на социальную сеть*:"
              />
              <reviews-form-textarea
                  id="reviews-text"
                  placeholder="Введите текст отзыва..."
                  v-model="fields.text"
                  @removeInvalid="delete errors['text']"
                  :messages="errors['text']"
                  label="Текст:*"
              />
                <reviews-form-video
                    v-model="fields.video"
                    :messages="errors['video']"
                    @removeInvalid="delete errors['video']"
                />
                <reviews-form-images
                    v-model="fields.img"
                    :messages="errors['img']"
                    @removeInvalid="delete errors['img']"
                />
              <div class="form-required">
                *поля обязательны для заполнения
              </div>
              <div class="form-sogl-wrapper">
                <a class="form-button btn-purple" @click="sendRequest">Отправить</a>
                <div class="form-sogl">
                  Я даю своё согласие на обработку<br> персональных данных
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</template>

<script>
import ReviewsFormText from './reviews-form-text';
import ReviewsFormTextarea from './reviews-form-textarea';
import ReviewsFormImages from './reviews-form-images';
import ReviewsFormVideo from './reviews-form-video';
import { POST } from '@site/API';

export default {
    name: 'reviews-form',
    components: {
        ReviewsFormText,
        ReviewsFormTextarea,
        ReviewsFormImages,
        ReviewsFormVideo
    },
    data () {
        return {
            errors: {},
            fields: {
                name: '',
                email: '',
                company: '',
                city: '',
                link: '',
                text: '',
                img: [],
                video: []
            },
            URL: '/reviews/add',
            successSubmit: false
        }
    },
    methods: {
        removeInvalid(item) {
            this[item] = 'false';
        },
        updateForm() {
          if (this.successSubmit) {
            this.successSubmit = false;
            this.errors = {};
            this.fields = {
                name: '',
                email: '',
                company: '',
                city: '',
                link: '',
                text: '',
                img: [],
                video: []
            };
          } else {
            this.errors = {};
          }
        },
        sendRequest() {
            POST(this.URL, this.fields).then(() => {
                this.success();
            }).catch(error => {
                this.errors = error;
            });

            return false;
        },
        success() {
          this.successSubmit = true;
        },
    }
}
</script>