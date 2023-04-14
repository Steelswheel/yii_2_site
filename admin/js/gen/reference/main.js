const fs = require('fs');

const {urls, name, fullName} = require('./data')


/*
// генерация страниц
const generate = require('./page/index.vue')
urls.forEach(url => {
    console.log(generate(url))
})*/


const generateMigrate = require('./page/migrate-compact')

urls.forEach(url => {
    if (url.isCompactTable)
        console.log(generateMigrate(url))
})

console.log("\r")
