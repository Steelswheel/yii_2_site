<template>
    <div class="header-dots">

        <b-dropdown toggle-class="p-0 mr-2" menu-class="dropdown-menu-xl" variant="link" no-caret right>
            <span slot="button-content">
                <div class="icon-wrapper icon-wrapper-alt rounded-circle">
                    <div class="icon-wrapper-bg bg-danger"></div>
                    <i class="lnr-pie-chart text-danger"></i>
                </div>
            </span>
            <div class="dropdown-menu-header mb-0 ">
                <div class="dropdown-menu-header-inner dd-header-bg-4 ">
                    <div class="menu-header-image opacity-1 "></div>
                    <div class="menu-header-content text-dark">
                        <h5 class="menu-header-title">STYLE</h5>
                    </div>
                </div>
            </div>
            <div class="nav-justified">
                <div class="scroll-gradient">
                    <div class="scroll-area-sm">
                        <VuePerfectScrollbar class="scrollbar-container" v-once>
                            <div class="ml-3 mr-3 mb-3 mt-3">
                                <div v-for="color in colors"
                                    :key="color"
                                     :class="color"
                                     class="badge "
                                >
                                    {{color}}
                                </div>
                            </div>
                        </VuePerfectScrollbar>
                    </div>
                </div>

            </div>
        </b-dropdown>

    </div>
</template>

<script>

    import VuePerfectScrollbar from 'vue-perfect-scrollbar'


    import {library} from '@fortawesome/fontawesome-svg-core'
    import {
        faArrowUp,
        faCog,
    } from '@fortawesome/free-solid-svg-icons'

    library.add(
        faArrowUp,
        faCog,
    );

    export default {
        components: {
            VuePerfectScrollbar,
        },
        data(){
            return {
                colors: [
                    'bg-primary text-lighter',
                    'bg-secondary text-lighter',
                    'bg-success text-lighter',
                    'bg-info text-lighter',
                    'bg-warning text-darker',
                    'bg-danger text-lighter',
                    'bg-light text-darker',
                    'bg-dark text-lighter',
                    'bg-focus text-lighter',
                    'bg-alternate text-lighter',

                    'bg-vicious-stance text-lighter',
                    'bg-midnight-bloom text-lighter',
                    'bg-night-sky text-lighter',
                    'bg-slick-carbon text-lighter',
                    'bg-asteroid text-lighter',
                    'bg-royal text-lighter',
                    'bg-warm-flame text-darker',
                    'bg-night-fade text-darker',
                    'bg-sunny-morning text-darker',
                    'bg-tempting-azure text-darker',
                    'bg-amy-crisp text-darker',
                    'bg-heavy-rain text-darker',
                    'bg-mean-fruit text-darker',
                    'bg-malibu-beach text-darker',
                    'bg-deep-blue text-darker',
                    'bg-ripe-malin text-lighter',
                    'bg-arielle-smile text-lighter',
                    'bg-plum-plate text-lighter',
                    'bg-happy-fisher text-darker',
                    'bg-happy-itmeo text-darker',
                    'bg-mixed-hopes text-lighter',
                    'bg-strong-bliss text-lighter',
                    'bg-grow-early text-lighter',
                    'bg-love-kiss text-lighter',
                    'bg-premium-dark text-lighter',
                    'bg-happy-green text-lighter',
                ],
            }
        },
        methods: {}
    }
</script>

