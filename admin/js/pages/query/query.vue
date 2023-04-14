<template>
    <div>

        <portal to="title-actions">
            <router-link :to="{name:'queryCreate'}" class="btn btn-primary m-b-md">Создать</router-link>
        </portal>

        <rest-table
            ref="yiiTable"
            model="query"
            column_update="queryUpdate"
            componentInputDir="query/input"
            :attributes="[
                {
                    attribute: 'name',
                    filter: true,
                },{
                    attribute: 'problem_des',
                    filter: true,
                    type: 'text'
                },{
                    attribute: 'phone',
                    filter: true,
                },{
                    attribute: 'email',
                    filter: true,
                },{
                    attribute: 'problem_id',
                    filter: true,
                    type: 'select-tree'
                },{
                    attribute: 'feedback',
                    filter: true,
                    type: 'string'
                }
            ]"
        >
        </rest-table>

        <!-- {description: '0010,string'},
                   {date_query: '0010,string'},-->
    </div>
</template>

<script>

    import table from 'rest/table'

    export default {
        name: "query",
        components: {
            'rest-table': table
        },
        mounted() {
            this.$store.commit("setBreadcrumb", [{text: 'Запросы горожан'}])
            this.$store.commit("setTitle", "Запросы горожан")
        },
    }
</script>

<style scoped>

</style>
