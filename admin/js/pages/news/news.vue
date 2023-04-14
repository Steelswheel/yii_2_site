<template>
    <div>

        <portal to="title-actions">
            <router-link :to="{name:'newsCreate'}" class="btn btn-primary m-b-md">Создать</router-link>
        </portal>

        <rest-table
            ref="yiiTable"
            model="news"
            column_update="newsUpdate"
            componentInputDir="news/input"
            :attributes="[
                {
                    attribute: 'title',
                    filter: true,
                },{
                    attribute: 'intro',
                    filter: true,
                    type: 'text'
                },{
                    attribute: 'published',
                    filter: true,
                    type: 'text'
                },{
                    attribute: 'active',
                    filter: true,
                    type: 'toggle'
                }
            ]"
        >
        </rest-table>

        <!-- {description: '0010,string'},
                   {date_news: '0010,string'},-->
    </div>
</template>

<script>

    import table from 'rest/table'

    export default {
        name: "news",
        components: {
            'rest-table': table
        },
        mounted() {
            this.$store.commit("setBreadcrumb", [{text: 'Новости'}])
            this.$store.commit("setTitle", "Новости")
        },
    }
</script>

<style scoped>

</style>
