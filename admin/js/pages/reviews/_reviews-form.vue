<template>
    <form-update
        url="reviews"
        :id="id"
        componentInputDir="reviews/input"
        routerNameView="reviewsUpdate"
        @res="$emit('res',arguments[0])"
        :attributes="[
            {
                attribute: 'added',
                type: 'datetime'
            },{
                attribute: 'active',
                type: 'toggle'
            },{
                attribute: 'name',
                type: 'string'
            },{
                attribute: 'text',
                type: 'text'
            },{
                attribute: 'city',
                type: 'string'
            },{
                attribute: 'company',
                type: 'string'
            },{
                attribute: 'link',
                type: 'string'
            },{
                attribute: 'phone',
                type: 'string'
            },{
                attribute: 'ip',
                type: 'string'
            },{
                attribute: 'email',
                type: 'string'
            },{
                attribute: 'img',
                type: 'img',
                settings: { multiple: true }
            },{
                attribute: 'video',
                type: 'video'
            }
        ]"
    >
        <div slot="template">
            <div class="row">
                <div class="col-md-12 attribute-active"></div>

                <div class="col-md-3 attribute-name"></div>
                <div class="col-md-3 attribute-city"></div>
                <div class="col-md-3 attribute-company"></div>
                <div class="col-md-3 attribute-added"></div>

                <div class="col-md-3 attribute-phone"></div>
                <div class="col-md-3 attribute-email"></div>
                <div class="col-md-3 attribute-link"></div>
                <div class="col-md-3 attribute-ip"></div>

                <div class="col-md-8 attribute-text"></div>
                <div class="col-md-4 attribute-img"></div>

                <div class="col-md-3 attribute-video"></div>
            </div>
        </div>
    </form-update>
</template>

<script>
import formUpdate from 'rest/form-update'
export default {
    name: "reviews-form",
    components: {
        formUpdate
    },
    props: {
        id: Number
    },

}
</script>

<style scoped>

</style>
