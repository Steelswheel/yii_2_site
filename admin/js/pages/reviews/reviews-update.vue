<template>
    <reviews-form :id="id" />
</template>

<script>
import reviewsForm from './_reviews-form'

export default {
  name: "reviews-update",
  props: {
    id: Number
  },
  components: {
    reviewsForm
  },
  mounted() {
    this.$store.commit("setBreadcrumb", [{name: 'reviews', text: 'Отзывы'}])
    this.$store.commit("setTitle", "Отзывы")
  },
}
</script>

<style scoped>

</style>
