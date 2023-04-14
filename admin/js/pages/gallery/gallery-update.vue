<template>
    <gallery-form :id="id" />
</template>

<script>
import galleryForm from './_gallery-form'

export default {
  name: "gallery-update",
  props: {
    id: Number
  },
  components: {
    galleryForm
  },
  mounted() {
    this.$store.commit("setBreadcrumb", [{name: 'gallery', text: 'Фотогалерея'}])
    this.$store.commit("setTitle", "Фотогалерея")
  },
}
</script>

<style scoped>

</style>
