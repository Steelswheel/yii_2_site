<template>
    <div>
        <portal to="title-actions">
            <router-link :to="{name:'galleryCreate'}" class="btn btn-primary m-b-md">
              Создать
            </router-link>
        </portal>

        <rest-table
            ref="yiiTable"
            model="gallery"
            column_update="galleryUpdate"
            componentInputDir="gallery/input"
            :attributes="[
                {
                    attribute: 'name',
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
    </div>
</template>

<script>
    import table from 'rest/table';

    export default {
        name: "gallery",
        components: {
            'rest-table': table
        },
        mounted() {
            this.$store.commit("setBreadcrumb", [{text: 'Фотогалерея'}])
            this.$store.commit("setTitle", "Фотогалерея")
        }
    }
</script>

<style scoped>

</style>
