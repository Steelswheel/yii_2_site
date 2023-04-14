<template>
    <div>
        <draggable
            :list="inValue"
            element="div"
        >
        <ul  v-for="(file, key) in inValue">

            <li>
                <div class="upload-list-item">
                    <div   class="upload-list-item__icon">
                        <a :href="file.url" target="_blank">
                            <img v-if="file.img" :src="file.url" alt="load-icon">
                            <i v-else class="el-icon-document-checked"></i>
                        </a>

                    </div>

                    <div class="upload-list-item__title"><input v-model="file.name" type="text" ></div>
                    <div class="upload-list-item__control">

                        <a href="#"  @click.prevent="remove(key)"><i class="el-icon-close"></i></a>
                    </div>
                </div>


                <el-progress v-if="file.loading" :percentage="file.progress"></el-progress>

            </li>
        </ul>
        </draggable>


        <button v-if="!disabled" @click.prevent="open" class="btn btn-xs btn-primary m-t-xs">Загрузить</button>

        <input  style="display: none" ref="fileUpload" @change="add" type="file" :multiple="multiple">
    </div>
</template>

<script>
import draggable from 'vuedraggable'
import API from 'API'
import { Progress } from 'element-ui'
export default {
    name: "input-upload",
    components: {
        draggable,
        'el-progress': Progress
    },
    props:{
        value: {
            default: () => ([])
        },
        multiple: {
            type: Boolean,
            default: false
        },
        disabled:{
            type: Boolean,
            default: false
        },
        height: {
            type: Number,
            default: 50
        }
    },
    data(){
        return {
            files: [],
            deleteFiles: [],
            inValue: JSON.parse(JSON.stringify(this.value)),
            objectFile: {
                url: '',
                error: false,
                img: false,
                loading: true,
                progress: 0,
            },
        }
    },
    watch: {
        value(){
            if (JSON.stringify(this.inValue) !== JSON.stringify(this.value)){

                this.inValue = JSON.parse(JSON.stringify(this.value))
            }
        },
        inValue:{
            deep:true,
            handler(){
                this.$emit('input',this.inValue)
            }

        }
    },
    methods: {
        add(){

            let filesObject = this.$refs.fileUpload.files
            console.log(filesObject);
            for(let item of filesObject){
                this.loadFile(item)
            }


            /*if (this.multiple){

            }*/

            // API.

            this.$refs.fileUpload.type = '';
            this.$refs.fileUpload.type = 'file';
        },
        loadFile(file){
            let id = this.inValue.length;
            this.inValue.push({ name: file.name, size: file.size, ...this.objectFile})
            const vm = this
            const progress = function(progressEvent) {
                vm.inValue[id].progress = Math.round((progressEvent.loaded * 100) / progressEvent.total)
            }

            API.postUpload('upload/upload',file,progress)
                .then(r => {
                    if (r.upload){
                        this.inValue[id].loading = undefined
                        this.inValue[id].url = r.url
                        this.inValue[id].img = r.img

                        this.inValue[id].error = undefined
                        this.inValue[id].progress = undefined
                    }else{
                        this.inValue[id].loading = undefined
                        this.inValue[id].error = true
                    }
                })
                .catch(() => {
                    this.inValue[id].loading = false
                    this.inValue[id].error = true
                    this.inValue[id].deleted = true
                })


        },
        remove(key){
            this.inValue.splice(key,1)
        },

        open(){
            console.log(this.$refs.fileUpload.click);
            this.$refs.fileUpload.click()
        }

    }
}
</script>

<style>
    .el-upload-list__item > a > img{
        margin: 0 5px 0 0;
        border-radius: 5px;
    }
    .el-upload-list__item.is-deleted .el-upload-list__item-name{
        color: red;
    }

    .el-upload-list__item.is-new .el-upload-list__item-name{
        color: #409EFF;
    }

    .el-upload-list__item.is-success .el-upload-list__item-status-label {
        display: block;
    }
</style>