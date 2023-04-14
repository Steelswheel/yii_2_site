<template>
    <form-update
        url="settings"
        :id="id"
        componentInputDir="settings/input"
        routerNameView="settingsUpdate"
        @res="$emit('res',arguments[0])"
        :attributes="[

                    {
                        attribute:'label',
                        type: 'string',
                    },{
                        attribute:'settings',
                        type: 'string',
                    },{
                        attribute:'fields',
                        type: 'fields-ar',
                        title: false
                    }


                ]"
    >

        <div slot="template">
            <div class="row">
                <div class="col-md-6 attribute-label"></div>
                <div class="col-md-6 attribute-settings"></div>
                <div class="col-md-12 attribute-values"></div>

            </div>
        </div>

    </form-update>
</template>

<script>
import formUpdate from 'rest/form-update'
export default {
    name: "settings-form",
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
