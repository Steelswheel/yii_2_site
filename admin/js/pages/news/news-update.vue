<template>
    <news-form :id="id" />
</template>

<script>
import newsForm from './_news-form'

export default {
  name: "news-update",
  props: {
    id: Number
  },
  components: {
    newsForm
  },
  mounted() {
    this.$store.commit("setBreadcrumb", [{name: 'news', text: 'Новости'}])
    this.$store.commit("setTitle", "Новости")
  },
}
</script>

<style scoped>

</style>
