<template>
    <div class="app-container app-theme-white">
        <header-menu/>
        <slot></slot>
    </div>
</template>

<script>
import headerMenu from 'Layout/site/header-menu'
export default {
    name: "siteLayout",
    components: {
        headerMenu
    }
}
</script>

<style scoped>

</style>
