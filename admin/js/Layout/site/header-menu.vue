<template>
    <header class="header header__menu">
        <div class="container">
            <div class="header__inner">
                <div class="header__left">
                    <nav class="menu">
                        <ul>
                            <li><a href="#">Купить</a></li>
                            <li><a href="#">Арендовать</a></li>
                            <li><a href="#">Продать</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="header__logo">
                    <a href="index.html"><img src="@/assets/img/logo.png" alt="logo"></a>
                </div>
                <div class="header__right">
                    <nav class="menu">
                        <ul>
                            <li><a href="#">Каталог специалистов</a></li>
                            <li><a href="#">Регистрация</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#exampleModal">Войти</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="mobile__hamburger">
                    <div class="hamburger mobile-open"></div>
                </div>
            </div>
        </div>
    </header>
</template>

<script>
export default {
    name: "header-menu"
}
</script>

<style scoped>

</style>
