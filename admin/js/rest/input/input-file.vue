<template>
    <div>

        <ul v-for="(file, key) in inValue" class="el-upload-list el-upload-list--text">

            <li v-if="file.url" :class="file.deleted ? 'is-deleted' : 'is-success'" class="el-upload-list__item" >
                <a :href="file.url" target="_blank" class="el-upload-list__item-name">
                    <i class="el-icon-document"></i>
                    {{file.name}}
                </a>

                <label class="el-upload-list__item-status-label">
                    <i class="el-icon-upload-success el-icon-circle-check"></i>
                </label>
                <i @click.prevent="removeLoaded(key)" class="el-icon-close"></i>
            </li>

            <li v-else class="el-upload-list__item is-new">
                <a @click.prevent="removeInput(key)" href="#" class="el-upload-list__item-name">
                    <i class="el-icon-document"></i>
                    {{file.file.name}}
                </a>

                <label class="el-upload-list__item-status-label">
                    <i class="el-icon-upload-success el-icon-circle-check"></i>
                </label>
                <i @click.prevent="removeInput(key)" class="el-icon-close"></i>
            </li>

        </ul>

        <button @click.prevent="open" class="btn btn-xs btn-primary m-t-xs">Добавить</button>

        <input style="display: none" ref="fileUpload" @change="add" type="file" :multiple="multiple">
    </div>
</template>

<script>
    import { cloneDeep, isEqual } from 'lodash'
    export default {
        name: "input-file",
        props:{
            value: {
                default: () => ([])
            },
            multiple: {
                type: Boolean,
                default: false
            }
        },
        data(){
            return {
                files: [],
                deleteFiles: [],
                inValue: cloneDeep(this.value)
            }
        },
        watch: {
            value(){
                if (!isEqual(this.inValue,this.value)){
                    this.inValue = cloneDeep(this.value)
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
            open(){
                this.$refs.fileUpload.click()
            },
            add(){

                if (!this.multiple){
                    this.inValue = []
                }
                let filesFormat = [...this.$refs.fileUpload.files].map(i => ({file: i, data: 'test'}))

                this.inValue = [
                    ...this.inValue,
                    ...filesFormat
                ]

                this.$refs.fileUpload.type = '';
                this.$refs.fileUpload.type = 'file';
            },
            removeInput(key){
                this.inValue.splice(key,1)
            },
            removeLoaded(key){
                this.inValue[key].deleted = this.inValue[key].deleted ? 0 : 1
            },

        }
    }
</script>

<style>
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