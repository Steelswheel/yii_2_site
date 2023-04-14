<template>
    <div :class="sidebarbg" class="app-sidebar sidebar-shadow"
         @mouseover="toggleSidebarHover('add','closed-sidebar-open')"
         @mouseleave="toggleSidebarHover('remove','closed-sidebar-open')">
        <div class="app-header__logo">
            <div class="logo-src"/>
            <div class="header__pane ml-auto">
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                        v-bind:class="{ 'is-active' : isOpen }" @click="toggleBodyClass('closed-sidebar')">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
        <div class="app-sidebar-content">
            <VuePerfectScrollbar class="app-sidebar-scroll" v-once>
                <sidebar-menu showOneChild :menu="menu"/>
            </VuePerfectScrollbar>
        </div>

    </div>
</template>

<script>
    import {SidebarMenu} from 'vue-sidebar-menu'
    import VuePerfectScrollbar from 'vue-perfect-scrollbar'

    export default {
        components: {
            SidebarMenu,
            VuePerfectScrollbar
        },
        data() {
            return {
                isOpen: false,
                sidebarActive: false,
                menu: [
                    {
                        header: true,
                        title: 'КПК "TREST"',
                    },
                    {
                        title: 'Настройки',
                        icon: 'dot-btn-icon lnr-cog icon-gradient bg-happy-green',
                        href: this.rout('settings'),
                    },
                    {
                        title: 'Новости',
                        icon: 'dot-btn-icon lnr-apartment icon-gradient bg-mixed-hopes',
                        href: this.rout('news'),
                    },
                    {
                      title: 'Фотогалерея',
                      icon: 'dot-btn-icon lnr-apartment icon-gradient bg-mixed-hopes',
                      href: this.rout('gallery')
                    },
                    {
                        title: 'Отзывы',
                        icon: 'dot-btn-icon lnr-smile icon-gradient bg-sunny-morning',
                        href: this.rout('reviews'),
                    },
                    /*{
                        title: 'Dashboards',
                        icon: 'dot-btn-icon lnr-earth icon-gradient bg-happy-itmeo',
                        child: [
                            {
                                href: this.rout('adminIndex'),
                                title: 'Страница 1',
                            }, {
                                href: this.rout('page1'),
                                title: 'Страница 2',
                            }
                        ]
                    },
                    {
                        title: 'Applications',
                        icon: 'pe-7s-plugin',
                        child: [
                            {
                                href: this.$router.resolve({name: 'page1'}).route.path,
                                title: 'Страница 1',
                            },
                            {
                                href: this.$router.resolve({name: 'adminIndex'}).route.path,
                                title: 'Страница 2',
                            },
                            {
                                title: 'Forums Section',
                                child: [
                                    {
                                        href: this.$router.resolve({name: 'page1'}).route.path,
                                        title: 'Страница 1',
                                    },
                                    {
                                        href: this.$router.resolve({name: 'adminIndex'}).route.path,
                                        title: 'Страница 2',
                                    },
                                    {
                                        title: 'Forums Section',
                                        child: [
                                            {
                                                href: this.$router.resolve({name: 'page1'}).route.path,
                                                title: 'Страница 1',
                                            },
                                            {
                                                href: this.$router.resolve({name: 'adminIndex'}).route.path,
                                                title: 'Страница 2',
                                            },
                                        ]
                                    },
                                ]
                            },
                        ]
                    },*/
                ],
                collapsed: true,

                windowWidth: 0,

            }
        },
        props: {
            sidebarbg: String,

        },
        methods: {
            rout(name) {
                return this.$router.resolve({name}).route.path
            },
            toggleBodyClass(className) {
                const el = document.body;
                this.isOpen = !this.isOpen;

                if (this.isOpen) {
                    el.classList.add(className);
                } else {
                    el.classList.remove(className);
                }
            },
            toggleSidebarHover(add, className) {
                const el = document.body;
                this.sidebarActive = !this.sidebarActive;

                this.windowWidth = document.documentElement.clientWidth;

                if (this.windowWidth > '992') {
                    if (add === 'add') {
                        el.classList.add(className);
                    } else {
                        el.classList.remove(className);
                    }
                }
            },
            getWindowWidth() {
                const el = document.body;

                this.windowWidth = document.documentElement.clientWidth;

                if (this.windowWidth < '1350') {
                    el.classList.add('closed-sidebar', 'closed-sidebar-md');
                } else {
                    el.classList.remove('closed-sidebar', 'closed-sidebar-md');
                }
            },
        },
        mounted() {
            this.$nextTick(function () {
                window.addEventListener('resize', this.getWindowWidth);

                //Init
                this.getWindowWidth()
            })
        },

        beforeDestroy() {
            window.removeEventListener('resize', this.getWindowWidth);
        }
    }
</script>
