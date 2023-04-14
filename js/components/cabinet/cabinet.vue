<template>
    <div class="cabinet">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="cabinet-forms">
                        <div class="cabinet-forms-tabs d-flex justify-content-center align-items-center">
                            <div
                                class="cabinet-forms-tabs-item"
                                @click="auth.active = true; register.active = false"
                                :data-active="auth.active ? 'true' : 'false'"
                                v-show="!restore.active"
                            >
                                {{ auth.title }}
                            </div>
                            <div
                                class="cabinet-forms-tabs-item"
                                @click="auth.active = false; register.active = true"
                                :data-active="register.active ? 'true' : 'false'"
                                v-show="!restore.active"
                            >
                                {{ register.title }}
                            </div>
                            <div
                                class="cabinet-forms-tabs-item"
                                v-show="restore.active"
                            >
                                {{ restore.title }}
                            </div>
                        </div>
                        <transition name="slide-fade">
                            <form method="post" class="cabinet-form" v-show="restore.active">
                                <div class="cabinet-form-item">
                                    <input
                                        type="email"
                                        id="cabinet-restore-email"
                                        name="email"
                                        class="cabinet-form-input"
                                        v-model="restore.email"
                                        placeholder="Электронная почта"
                                        required
                                    >
                                </div>
                                <button class="cabinet-form-button btn-purple" type="submit">
                                    Восстановить
                                </button>
                                <div class="cabinet-form-back" @click="restore.active = false">
                                    Назад
                                </div>
                            </form>
                        </transition>
                        <transition name="slide-fade">
                            <form method="post" class="cabinet-form" v-show="auth.active && !restore.active">
                                <div class="cabinet-form-item">
                                    <input
                                        type="text"
                                        id="cabinet-login"
                                        name="login"
                                        class="cabinet-form-input"
                                        v-model="auth.login"
                                        placeholder="Логин"
                                        required
                                    >
                                </div>
                                <div class="cabinet-form-item">
                                    <input
                                        type="password"
                                        id="cabinet-password"
                                        name="password"
                                        class="cabinet-form-input"
                                        v-model="auth.password"
                                        placeholder="Пароль"
                                        required
                                    >
                                </div>
                                <div class="cabinet-form-item">
                                    <input
                                        type="checkbox"
                                        name="remember"
                                        id="cabinet-remember"
                                        class="cabinet-form-checkbox"
                                        v-model="auth.remember"
                                    >
                                    <label for="cabinet-remember" class="cabinet-form-label">
                                        Запомнить меня
                                    </label>
                                </div>
                                <button class="cabinet-form-button btn-purple" type="submit">
                                    Войти
                                </button>
                                <div class="cabinet-form-forget" @click="restore.active = true">
                                    {{ restore.title }}
                                </div>
                            </form>
                        </transition>
                        <transition name="slide-fade">
                            <form method="post" class="cabinet-form" v-show="register.active && !restore.active">
                                <div class="cabinet-form-item">
                                    <input
                                        type="text"
                                        id="cabinet-new-login"
                                        name="login"
                                        class="cabinet-form-input"
                                        v-model="register.login"
                                        placeholder="Логин"
                                        required
                                    >
                                </div>
                                <div class="cabinet-form-item">
                                    <input
                                        type="text"
                                        id="cabinet-new-email"
                                        name="email"
                                        class="cabinet-form-input"
                                        v-model="register.email"
                                        placeholder="Электронная почта"
                                        required
                                    >
                                </div>
                                <div class="cabinet-form-item">
                                    <input
                                        type="password"
                                        id="cabinet-new-password"
                                        name="password"
                                        class="cabinet-form-input"
                                        v-model="register.password"
                                        placeholder="Пароль"
                                        required
                                    >
                                </div>
                                <div class="cabinet-form-item">
                                    <input
                                        type="checkbox"
                                        name="consent"
                                        id="cabinet-consent"
                                        class="cabinet-form-checkbox"
                                        v-model="register.consent"
                                        required
                                    >
                                    <label for="cabinet-consent" class="cabinet-form-label">
                                        Согласен с <a href="#">правилами</a>
                                    </label>
                                </div>
                                <button class="cabinet-form-button btn-purple" type="submit">
                                    Регистрация
                                </button>
                            </form>
                        </transition>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'cabinet',
    data() {
        return {
            auth: {
                active: true,
                title: 'Авторизация',
                login: '',
                password: '',
                remember: false
            },
            register: {
                active: false,
                title: 'Регистрация',
                login: '',
                email: '',
                password: ''
            },
            restore: {
                active: false,
                title: 'Восстановить пароль',
                email: ''
            }
        }
    },
    methods: {

    }
}
</script>

<style scoped>

</style>