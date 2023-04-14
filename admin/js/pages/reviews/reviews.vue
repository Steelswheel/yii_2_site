<template>
    <div>

        <portal to="title-actions">
            <router-link :to="{name:'reviewsCreate'}" class="btn btn-primary m-b-md">Создать</router-link>
        </portal>

        <rest-table
            ref="yiiTable"
            model="reviews"
            column_update="reviewsUpdate"
            componentInputDir="reviews/input"
            :attributes="[
                {
                    attribute: 'name',
                    filter: true,
                },{
                    attribute: 'link',
                    filter: true,
                    type: 'string'
                },{
                    attribute: 'text',
                    filter: true,
                    type: 'string'
                },{
                    attribute: 'ip',
                    filter: true,
                    type: 'string'
                },{
                    attribute: 'active',
                    filter: true,
                    type: 'toggle'
                },{
                    attribute: 'added',
                    filter: true,
                    type: 'datetime'
                }
            ]"
        >
        </rest-table>

        <!-- {description: '0010,string'},
                   {date_reviews: '0010,string'},-->
    </div>
</template>

<script>

    import table from 'rest/table'

    export default {
        name: "reviews",
        components: {
            'rest-table': table
        },
        mounted() {
            this.$store.commit("setBreadcrumb", [{text: 'Отзывы'}])
            this.$store.commit("setTitle", "Отзывы")
        },
    }
</script>

<style scoped>

</style>
