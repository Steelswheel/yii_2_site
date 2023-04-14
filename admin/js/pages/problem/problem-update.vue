<template>
    <problem-form :id="id" />
</template>

<script>
import problemForm from './_problem-form'

export default {
  name: "problem-update",
  props: {
    id: Number
  },
  components: {
    problemForm
  },
  mounted() {
    this.$store.commit("setBreadcrumb", [{name: 'problem', text: 'Проблемы'}])
    this.$store.commit("setTitle", "Проблемы")
  },
}
</script>

<style scoped>

</style>
