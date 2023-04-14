<template>
    <button v-if="visible" class="header-site-panel-oauth-item btn-danger" @click.prevent="getOauth2Key">
        Авторизация для загрузки на Youtube
    </button>
</template>

<script>
    import API from '../../../API';

    export default {
        name: 'OauthAuthorize',
        data() {
            return {
                token: false,
                visible: false
            }
        },
        methods: {
            getOauth2Key() {
                gapi.load('auth2', () => {
                    gapi.auth2.init({
                        client_id: '27940428198-jeplkg9u69qeu0a9uo6j6skj2tvp90v4.apps.googleusercontent.com',
                        scope: 'https://www.googleapis.com/auth/youtube.force-ssl'
                    }).then(GoogleAuth => {
                        if (GoogleAuth.isSignedIn.get()) {
                            this.visible = false;
                            let GoogleUser = GoogleAuth.currentUser.get();

                            if (GoogleUser.getAuthResponse(true)) {
                                this.token = GoogleUser.getAuthResponse(true).access_token;

                                if (this.token) {
                                    API.getData('/reviews/gettoken/', JSON.stringify(this.token)).then(
                                        response => console.log(response)
                                    ).catch(
                                        error => {
                                            this.visible = true;
                                            console.log(error);
                                        }
                                    );
                                } else {
                                    this.visible = true;
                                    return false;
                                }
                            }
                        } else {
                            GoogleAuth.signIn().then(GoogleUser => {
                                this.visible = false;
                                if (GoogleUser.getAuthResponse(true)) {
                                    this.token = GoogleUser.getAuthResponse(true).access_token;

                                    if (this.token) {
                                        API.getData('/reviews/gettoken/', JSON.stringify(this.token)).then(
                                            response => console.log(response)
                                        ).catch(
                                            error => {
                                                this.visible = true;
                                                console.log(error);
                                            }
                                        );
                                    } else {
                                        this.visible = true;
                                        return false;
                                    }
                                }
                            }).catch(
                                error => {
                                    this.visible = true;
                                    console.log(error);
                                }
                            );
                        }
                    }).catch(
                        error => {
                            this.visible = true;
                            console.log(error);
                        }
                    );
                });
            }
        },
        beforeCreate() {
            gapi.load('auth2', () => {
                gapi.auth2.init({
                    client_id: '27940428198-jeplkg9u69qeu0a9uo6j6skj2tvp90v4.apps.googleusercontent.com',
                    scope: 'https://www.googleapis.com/auth/youtube.force-ssl'
                }).then(GoogleAuth => {
                    if (GoogleAuth.isSignedIn.get()) {
                        this.visible = false;
                        let GoogleUser = GoogleAuth.currentUser.get();

                        if (GoogleUser.getAuthResponse(true)) {
                            this.token = GoogleUser.getAuthResponse(true).access_token;

                            if (this.token) {
                                API.getData('/reviews/gettoken/', JSON.stringify(this.token)).then(
                                    response => console.log(response)
                                ).catch(
                                    error => {
                                        this.visible = true;
                                        console.log(error);
                                    }
                                );
                            } else {
                                this.visible = true;
                                return false;
                            }
                        }
                    } else {
                        this.visible = true;
                        return false;
                    }
                }).catch(
                    error => {
                        this.visible = true;
                        console.log(error);
                    }
                );
            });
        }
    }
</script>

<style scoped>
    .header-site-panel-oauth-item {
        font-weight: bold;
        display: block;
        padding: 3px 8px;
        margin: 4px;
        color: rgba(255, 255, 255, 0.8);
        border-radius: 8px;
        transition: background-color 0.2s;
        cursor: pointer;
    }
</style>