<template>
    <settings-form :id="id" />
</template>

<script>
import settingsForm from './_settings-form'

export default {
  name: "settings-update",
  props: {
    id: Number
  },
  components: {
    settingsForm
  },
  mounted() {
    this.$store.commit("setBreadcrumb", [{name: 'settings', text: 'Настройки'}])
    this.$store.commit("setTitle", "Настройки")
  },
}
</script>

<style scoped>

</style>
