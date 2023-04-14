<template>
  <div>

    <portal to="title-actions">
      <router-link :to="{name:'settingsCreate'}" class="btn btn-primary m-b-md">Создать</router-link>
    </portal>

    <rest-table
        ref="yiiTable"
        model="settings"
        column_update="settingsUpdate"
        componentInputDir="settings/input"
        :attributes="[
               {label: '1111,string'},
               {settings: '0110,string'},
               {fields: '0010,fields-ar'},
          ]"
    >
    </rest-table>

  </div>
</template>

<script>

import table from 'rest/table'

export default {
  name: "settings",
  components: {
    'rest-table': table
  },
  mounted() {
    this.$store.commit("setBreadcrumb", [{text: 'Настройки'}])
    this.$store.commit("setTitle", "Настройки")
  },
}
</script>

<style scoped>

</style>
