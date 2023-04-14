<template>
    <query-form :id="id" />
</template>

<script>
import queryForm from './_query-form'

export default {
  name: "query-update",
  props: {
    id: Number
  },
  components: {
    queryForm
  },
  mounted() {
    this.$store.commit("setBreadcrumb", [{name: 'query', text: 'Запросы горожан'}])
    this.$store.commit("setTitle", "Запросы горожан")
  },
}
</script>

<style scoped>

</style>
