const fs = require('fs');

const generate = function (url){
    let path = './../../pages/reference'
    let nameFull = path+'/'+url.kebab+'.vue'

    let mainText = text(url)

    mainText = mainText.replace('FIELD_FORM_UPDATE',gen_FIELD_FORM_UPDATE(url))
    mainText = mainText.replace('FIELD_REST_TABLE',gen_FIELD_REST_TABLE(url))


    fs.writeFileSync(nameFull,mainText )
    return nameFull;
}

let gen_FIELD_FORM_UPDATE = function(url){
    let f = '';
    url.fields.forEach(field => {
        f += `{\n                        attribute:\'${field}\',\n                        type: \'string\',\n                    },`
    })
    return f
}
 // {name: '1111,string'},
let gen_FIELD_REST_TABLE = function(url){
    let f = '';
    url.fields.forEach(field => {
        f += `{${field}: '1111,string'},\n                `
    })
    return f
}

let text = function (url) {
return `<template>
    <div>
        <portal to="title-actions">
            <b-button class="" variant="primary" @click="create">Создать</b-button>
        </portal>

        <b-modal ref="my-modal" id="my-modal" hide-footer >
            <form-update

                url="${url.fullName}"
                :id="editId"
                :redirectNewModel="false"
                @save="updateTable"
                :attributes="[
                    FIELD_FORM_UPDATE]"
            />
        </b-modal>

        <rest-table
            model="${url.fullName}"
            ref="table"
            componentInputDir="task/input"
            :attributes="[
                {
                    attribute: 'edit',
                    attributeLabel:'',
                    width:'40'
                },
                FIELD_REST_TABLE
          ]"
        >
            <template slot="edit" slot-scope="data">
                <b-button class="" variant="warning" size="sm" @click="edit(data.data.id)">
                    <font-awesome-icon  icon="edit"/>
                </b-button>
            </template>
        </rest-table>
    </div>
</template>

<script>
    import formUpdate from 'rest/form-update'
    import {library} from '@fortawesome/fontawesome-svg-core'
    import { faEdit } from '@fortawesome/free-solid-svg-icons'
    import {FontAwesomeIcon} from '@fortawesome/vue-fontawesome'
    library.add(faEdit);

    import table from 'rest/table'
    export default {
        name: "additional-services",
        components: {
            'rest-table': table,
            'font-awesome-icon': FontAwesomeIcon,
            formUpdate
        },
        data() {
            return {
                editId: null,
                isOpen: false,
            }
        },
        mounted() {
            this.$store.commit("setBreadcrumb", [{text: "${url.title}"}])
            this.$store.commit("setTitle", "${url.title}")
        },
        methods: {
            updateTable(){
                this.$refs['my-modal'].hide()
                this.$refs['table'].load()
            },
            create(){
                this.editId = undefined
                this.$refs['my-modal'].show()
            },
            edit(id){
                this.editId = id
                this.$refs['my-modal'].show()

            }
        }
    }
</script>`;
}

module.exports = generate;
