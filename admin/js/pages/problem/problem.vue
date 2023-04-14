<template>
    <div>

        <portal to="title-actions">
            <router-link :to="{name:'problemCreate'}" class="btn btn-primary m-b-md">Создать</router-link>
        </portal>

        <rest-table
            ref="yiiTable"
            model="problem"
            column_update="problemUpdate"
            componentInputDir="problem/input"
            :attributes="[
                {
                    attribute: 'label',
                    edit: true,
                    show: true,
                },{
                    attribute: 'parent_id',
                    edit: true,
                    show: true,
                    type: 'select-tree'
                },
            ]"
        >
        </rest-table>

        <!-- {description: '0010,string'},
                   {date_problem: '0010,string'},-->
    </div>
</template>

<script>

    import table from 'rest/table'

    export default {
        name: "problem",
        components: {
            'rest-table': table
        },
        mounted() {
            this.$store.commit("setBreadcrumb", [{text: 'Проблемы'}])
            this.$store.commit("setTitle", "Проблемы")
        },
    }
</script>

<style scoped>

</style>
