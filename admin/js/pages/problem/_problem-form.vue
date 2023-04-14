<template>
    <form-update
        url="problem"
        :id="id"
        componentInputDir="problem/input"
        routerNameView="problemUpdate"
        routerNameTable="problem"
        :showBtbDelete="true"
        @res="$emit('res',arguments[0])"
        :attributes="[
            {
                attribute:'label',
                type: 'string',

            },{
                attribute:'parent_id',
                type: 'select-tree',
            },{
                attribute:'icon',
                type: 'file',
                settings: { multiple: false }
            }
        ]"
    >

        <div slot="template">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6 attribute-label"></div>
                        <div class="col-md-6 attribute-parent_id"></div>
                        <div class="col-md-6 attribute-icon"></div>

                    </div>
                </div>

            </div>
        </div>

    </form-update>
</template>

<script>
import formUpdate from 'rest/form-update'
export default {
    name: "problem-form",
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
