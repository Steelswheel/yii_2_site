const fs = require('fs');
const {kebabCase} = require('lodash')
 const {urls, name, fullName} = require('./data')

console.log(fullName)
/*

const noRLower = noR.map(i => i.toLowerCase());


let urlsIdx = urls.map(i => ({
    ...i,
    idx: noRLower.indexOf(i.href),
}))

let urlFinaly = urlsIdx.map(i => ({
    title: i.title,
    href: `this.rout('${r[i.idx]}')`
}))*/



// console.log(urlFinaly)
// kebabCase


//fs.writeFileSync("./src/pages/reference/123.txt", "Привет ми ми ми!")
/// генерация документов
/*function genText(url){
    return `<template>
    <div>
        ${r[url.idx]}
    </div>
</template>

<script>
    export default {
        name: "${r[url.idx]}",
        data() {
            return {}
        },
        mounted() {
            this.$store.commit("setBreadcrumb", [{text: "${url.title}"}])
            this.$store.commit("setTitle", "${url.title}")
        },
    }
</script>`
}
urlsIdx.forEach(url => {
    let name = lodash.kebabCase(noR[url.idx])+".vue"
    console.log(name)
    fs.writeFileSync("./src/pages/reference/"+name, genText(url))
})*/

/*
{
    path: '/admin/reference/type-of-house',
    name: 'ReferenceTypeOfHouse',
    component: () => import('./pages/reference/type-of-house'),
},
* */
/*
let rout = urlsIdx.map(url => ({
    path: '/admin/reference/'+lodash.kebabCase(noR[url.idx]),
    name: r[url.idx],
    component: "() => import('./pages/reference/"+lodash.kebabCase(noR[url.idx])+"')",
}))*/

//console.log(rout)

console.log("\r")