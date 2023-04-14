<template>
    <form-update
        url="gallery"
        :id="id"
        componentInputDir="gallery/input"
        routerNameView="galleryUpdate"
        @res="$emit('res', arguments[0])"
        :attributes="[
            {
                attribute: 'active',
                type: 'toggle'
            },
            {
                attribute: 'published',
                type: 'datetime'
            },
            {
                attribute: 'name',
                type: 'text'
            },
            {
                attribute: 'img',
                type: 'file',
                settings: { multiple: false }
            }
        ]"
    >
        <div slot="template">
            <div class="row">
              <div class="col-md-4 attribute-name"></div>
              <div class="col-md-4 attribute-published"></div>
              <div class="col-md-4 attribute-active"></div>
              <div class="col-md-12 attribute-img"></div>
            </div>
        </div>
    </form-update>
</template>

<script>
import formUpdate from 'rest/form-update'
export default {
    name: "gallery-form",
    components: {
        formUpdate
    },
    props: {
        id: Number
    }
}
</script>

<style scoped>

</style>
