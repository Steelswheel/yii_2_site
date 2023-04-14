<template>
    <form-update
        url="query"
        :id="id"
        componentInputDir="query/input"
        routerNameView="queryUpdate"
        @res="$emit('res',arguments[0])"
        :attributes="[
            {
                attribute: 'name',
                type: 'string'
            },{
                attribute: 'problem_des',
                type: 'text'
            },{
                attribute: 'phone',
                type: 'string'
            },{
                attribute: 'email',
                type: 'string'
            },{
                attribute: 'problem_id',
                type: 'select-tree'
            },{
                attribute: 'feedback',
                type: 'string'
            },{
                attribute: 'address_value',
                type: 'string'
            },{
                attribute: 'is_active',
                type: 'string'
            },{
                attribute: 'is_map',
                type: 'string'
            },{
                attribute: 'code_activate',
                type: 'string'
            },{
                attribute:'img',
                type: 'file',
                settings: { multiple: true }
            }
        ]"
    >

        <div slot="template">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">

                        <div class="col-md-4 attribute-name"></div>
                        <div class="col attribute-feedback"></div>
                        <div class="col attribute-is_active"></div>
                        <div class="col attribute-is_map"></div>

                        <div class="col-md-6 attribute-phone"></div>
                        <div class="col-md-6 attribute-email"></div>

                        <div class="col-md-12 attribute-address_value"></div>
                        <div class="col-md-12 attribute-code_activate"></div>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12 attribute-problem_id"></div>
                        <div class="col-md-12 attribute-problem_des"></div>
                        <div class="col-md-12 attribute-img"></div>
                    </div>
                </div>

            </div>
        </div>

    </form-update>
</template>

<script>
import formUpdate from 'rest/form-update'
export default {
    name: "query-form",
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
