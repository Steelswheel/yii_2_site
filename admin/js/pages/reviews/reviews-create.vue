<template>
      <reviews-form/>
</template>

<script>
import reviewsForm from './_reviews-form'
export default {
  name: "reviews-create",
  components: {
    reviewsForm
  },
  mounted() {
    this.$store.commit("setBreadcrumb", [{name: 'reviews' ,text: 'Отзывы'}])
    this.$store.commit("setTitle", "Отзывы")
  },
}
</script>

<style scoped>

</style>
