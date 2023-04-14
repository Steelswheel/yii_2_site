<template>
      <gallery-form />
</template>

<script>
import galleryForm from './_gallery-form';

export default {
  name: "gallery-create",
  components: {
    galleryForm
  },
  mounted() {
    this.$store.commit("setBreadcrumb", [{name: 'gallery' ,text: 'Фотогалерея'}]);
    this.$store.commit("setTitle", "Фотогалерея");
  }
}
</script>

<style scoped>

</style>
