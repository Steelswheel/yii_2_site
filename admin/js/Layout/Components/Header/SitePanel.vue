<template>
    <div class="header-site-panel">
        <a class="header-site-panel-item" :href="'https://' + site + '/admin'" v-for="site in sites" :data-active="site === location ? 'true' : 'false'">
            {{ site }}
        </a>
        <oauth-authorize></oauth-authorize>
    </div>
</template>

<script>
import OauthAuthorize from './OauthAuthorize';

export default {
    name: 'SitePanel',
    components: {
        OauthAuthorize
    },
    data() {
        return {
            sites: ['boggat.ru', 'trest24.ru', 'tek-sber.ru'],
            location: document.location.host
        }
    }
}
</script>

<style scoped>
    .header-site-panel {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
    }
    .header-site-panel-item {
        font-weight: bold;
        display: block;
        padding: 3px 8px;
        margin: 4px;
        color: rgba(255, 255, 255, 0.8);
        border-radius: 8px;
        transition: background-color 0.2s;
        cursor: pointer;
        text-decoration: none;
        background-color: #808080;
    }
    .header-site-panel-item:hover {
        background-color: #b0b0b0;
    }
    .header-site-panel .header-site-panel-item[data-active='true'] {
        background-color: #16aaff;
    }
</style>