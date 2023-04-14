<template>
    <ul class="breadcrumbs p-0 ">
        <li>
            <router-link :to="{name: 'adminIndex'}">Домой</router-link>
        </li>
        <li class="breadcrumbs__divider">/</li>
        <template v-for="(item, key) in getBreadcrumbs" >
            <li >
                <router-link v-if="item.name" :to="item">{{item.text}}</router-link>
                <span v-else>{{item.text}}</span>
            </li>
            <li v-if="key + 1 !== getBreadcrumbs.length" class="v-breadcrumbs__divider">/</li>
        </template>
    </ul>
</template>

<script>
import {mapGetters} from "vuex";

export default {
  name: "breadcrumbs",
  computed: {
    ...mapGetters([
      'getBreadcrumbs'
    ]),
  }
}
</script>

<style scoped>

</style>