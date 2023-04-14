<template>
    <div>
      <router-link :to="{ name: 'adminIndex' }">page1</router-link>

      <router-link :to="{ name: 'page1' }">page2</router-link>

      <hr>

    </div>
</template>

<script>
    export default {
      name: "page1",
      mounted() {
        // console.log(this.$router.resolve({name:'page1'}));
      }
    }
</script>

<style scoped>

</style>