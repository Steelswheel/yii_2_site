<template>
  <div class="app-page-title">
    <div class="page-title-wrapper">
      <div class="page-title-heading">
        <div>
          {{ heading }}
          <div class="page-title-subheading">
            <breadcrumbs/>
          </div>
        </div>
      </div>
      <div class="page-title-actions">
        <portal-target name="title-actions">
        </portal-target>

      </div>
    </div>
  </div>
</template>

<script>
import breadcrumbs from './breadcrumbs'

export default {
  props: {
    icon: String,
    heading: String,
    subheading: String,
  },
  components: {
    breadcrumbs
  },


}
</script>
