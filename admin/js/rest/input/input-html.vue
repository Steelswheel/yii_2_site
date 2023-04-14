<template>
    <div>
        <div v-if="isEdit">
            <vue-editor
                 v-model="inValue"
                 useCustomImageHandler
                 @image-added="handleImageAdded"
            />
        </div>

       <!-- <textarea
            v-if="isEdit"
            :value="value"
            @input="e => $emit('input',e.target.value)"
            :rows="rows"
            class="form-control"
            :disabled="disabled"
        ></textarea>-->
        <div v-else>
            <div v-if="visible === 'mini'">
                {{visibleMini}}
            </div>
            <div v-else>
                {{value}}
            </div>
        </div>
    </div>
</template>

<script>
    import { VueEditor } from "vue2-editor";
    import axios from "axios";

    export default {
        name: "input-html",
        components: {
          VueEditor
        },
        props:{
            value: {
                type: [String,Number],
                default: ''
            },
            rows: {
                type: Number,
                default: 5
            },
            disabled:{
                type: Boolean,
                default: false
            },
            isEdit: {
                type: Boolean,
                default: true
            },
            visible: {
                type: String,
                default: 'full',
                validator: function (value) {
                    return ['mini', 'full'].includes(value)
                }
            }
        },
        data(){
            return {
                inValue: this.value
            }
        },
        watch:{
            inValue(){
                this.$emit('input',this.inValue)
            }
        },
        computed: {
            visibleMini(){
                return this.value
                    ? this.value.length > 120
                        ? `(${this.value.length}) ${this.value.substr(0,120)}...`
                        : this.value
                    : this.value
            }
        },
        methods:{
            handleImageAdded: function(file, Editor, cursorLocation, resetUploader) {
                // An example of using FormData
                // NOTE: Your key could be different such as:
                // formData.append('file', file)

                var formData = new FormData();
                formData.append("image", file);

                axios({
                    url: "/admin_api/upload/editor",
                    method: "POST",
                    data: formData
                })
                    .then(result => {
                        let url = result.data.url; // Get url from response
                        Editor.insertEmbed(cursorLocation, "image", url);
                        resetUploader();
                    })
                    .catch(err => {
                        console.log(err);
                    });
            }
        }
    }
</script>

<style scoped>

</style>