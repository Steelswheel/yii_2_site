<template>
    <div>

        <div v-if="isEdit">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="">Заголовок</label>
                        <input v-model="inValue.title" type="text" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Текст</label>
                        <textarea v-model="inValue.text" class="form-control"></textarea>
                    </div>

                </div>

                <div class="col-md-4">
                    <label for="">Картинка</label>
                    <input-upload
                        v-model="inValue.img"
                    />
                </div>


            </div>


        </div>
        <span v-else>{{value}}</span>
    </div>
</template>

<script>
import {cloneDeep, isEqual} from "lodash";
import inputUpload from './input-upload'
export default {
    name: "input-img-h1-text",
    components: {
        inputUpload
    },
    props:{
        value: {
            type: Object,
            default: () => ({})
        },
        disabled:{
            type: Boolean,
            default: false
        },
        isEdit: {
            type: Boolean,
            default: true
        },


    },
    data(){
        return {
            inValue: cloneDeep(this.value),
        }
    },
    watch:{
        inValue:{
            deep: true,
            handler(){
                this.$emit('input',this.inValue)
            }
        },
        value(){
            if (!isEqual(this.value, this.inValue)){
                this.inValue = cloneDeep(this.value)
            }
        }
    },
}
</script>
