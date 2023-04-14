const fs = require('fs');

const generate = function (url){

    return text2(url);
}

let text = function (url) {
return `                '${url.kebab}' => '${url.title}',`
}

let text2 = function (url) {
return `        $${url.name} = \\App\\Models\\Reference\\${url.fullName}::all()->toArray();
        $${url.name} = array_map(function($i){ return [ 'value' => $i['name'],'model' => 'reference',
        'field' => '${url.kebab}','created_at' => Carbon::now(),'updated_at' => Carbon::now(),];},$${url.name});
        DB::table('enumeration')->insert($${url.name});`}

module.exports = generate;
