<template>
    <form-update
        url="news"
        :id="id"
        componentInputDir="news/input"
        routerNameView="newsUpdate"
        @res="$emit('res',arguments[0])"
        :attributes="[
            {
                attribute: 'title',
                type: 'string'
            },{
                attribute: 'intro',
                type: 'text'
            },{
                attribute: 'active',
                type: 'toggle'
            },{
                attribute: 'published',
                type: 'datetime'
            },{
                attribute: 'text',
                type: 'html'
            },{
                attribute: 'img',
                type: 'file',
                settings: { multiple: false }
            }
        ]"
    >

        <div slot="template">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">

                        <div class="col-md-9 attribute-title"></div>
                        <div class="col-md-12 attribute-intro"></div>

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6 attribute-published"></div>
                        <div class="col-md-6 attribute-active"></div>
                        <div class="col-md-12 attribute-img"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 attribute-text"></div>

    </form-update>
</template>

<script>
import formUpdate from 'rest/form-update'
export default {
    name: "news-form",
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
