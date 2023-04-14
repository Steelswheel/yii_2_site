<template>
      <problem-form/>
</template>

<script>
import problemForm from './_problem-form'
export default {
  name: "problem-create",
  components: {
    problemForm
  },
  mounted() {
    this.$store.commit("setBreadcrumb", [{name: 'problem' ,text: 'Проблемы'}])
    this.$store.commit("setTitle", "Проблемы")
  },
}
</script>

<style scoped>

</style>
