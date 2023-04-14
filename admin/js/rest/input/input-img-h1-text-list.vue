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
                        <label for="">Низ</label>
                        <input v-model="inValue.bottom" type="text" class="form-control" >
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="">Главная картинка</label>
                    <input-upload
                        v-model="inValue.mainImg"
                    />
                </div>
            </div>


            <draggable
                :list="inValue.items"
                element="div"
                :options="{handle:'.draggable-item'}"
            >
            <div v-for="item in inValue.items">
                <div class="d-flex">
                    <div style="width: 50px">
                        <span class="draggable-item btn btn-sm btn-icon-sm btn-outline-dark btn-icon-bottom"><font-awesome-icon icon="arrows-alt-v" class=""/></span>
                    </div>
                    <div style="width: 100%" class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Заголовок</label>
                                        <input v-model="item.title" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Текст</label>
                                        <textarea v-model="item.text" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-4">
                            <label for="">Картинка</label>
                            <input-upload
                                v-model="item.img"
                            />
                        </div>
                    </div>
                </div>

            </div>
            </draggable>



            <a href="#" @click.prevent="add">ДОБАВИТЬ</a>


        </div>
        <span v-else>{{value}}</span>
    </div>
</template>

<script>
import draggable from 'vuedraggable'
import {library} from '@fortawesome/fontawesome-svg-core'
import {
    faArrowsAltV,
} from '@fortawesome/free-solid-svg-icons'
import {FontAwesomeIcon} from '@fortawesome/vue-fontawesome'

library.add(
    faArrowsAltV,
);

import {cloneDeep, isEqual} from "lodash";
import inputUpload from './input-upload'
export default {
    name: "input-img-h1-text",
    components: {
        inputUpload,
        'font-awesome-icon': FontAwesomeIcon,
        draggable,
    },
    props:{
        value: {
            type: Object,
            default: () => ({title: '', mainImg: undefined, bottom: '', items: []})
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
            itemData: {title: '', text: '', img: undefined}
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
    methods: {
        add(){
            this.inValue.items.push({...this.itemData})

        }
    }
}
</script>
