const { kebabCase } = require('lodash')
const urls = [


    { title: 'Тип дома', href: 'typeofhouse'},
    { title: 'Кол-во комнат', href: 'numberofroom'},
    { title: 'Тип ремонта', href: 'typeofrepair'},
    { title: 'Санузел', href: 'bathroom'},
    { title: 'Тип частного дома', href: 'typeofprivatehouse'},
    { title: 'Материал стен дома', href: 'materialofwalls'},
    { title: 'Планировки квартир', href: 'apartmentplanning'},

    { title: 'Отопление', href: 'heating'},
    { title: 'Статус земли', href: 'typeofland'},


    { title: 'Гараж: Тип', href: 'garagetype'},
    { title: 'Гараж: Материал', href: 'garagewalltype'},
    { title: 'Гараж: Статус', href: 'garageown'},

    { title: 'Офис: Планировка', href: 'officelayout'},


    { title: 'Здание: Класс', href: 'buildingclass'},
    { title: 'Здание: Категория', href: 'buildingcategory'},
    { title: 'Здание: Вентиляция', href: 'buildingventilation'},
    { title: 'Здание: Кондиционирование', href: 'buildingconditioning'},
    { title: 'Здание: Отопление', href: 'buildingheating'},
    { title: 'Здание: Система пожаротушения', href: 'buildingfirefighting'},
    { title: 'Здание: Вход', href: 'buildingentrance'},

    { title: 'Назначение комм. здания', href: 'purposecommercialbuilding'},
    { title: 'Парковка', href: 'parking'},
    { title: 'Состояния ремонта в ком.', href: 'repairstatuscommercial'},
    { title: 'Назначение комм. недвижимости', href: 'purposecommercialreal'},
    { title: 'Материал пола', href: 'floormaterial'},
    { title: 'Бизнес: Тип недвижимости', href: 'businessrealtytype'},


    { title: 'Производство: Состояние', href: 'productionrepair'},
    { title: 'Производство: Ворота', href: 'productiongoal'},
    { title: 'Производство: Дополнительные услуги', href: 'additionalservices'},

    { title: 'Категория земли', href: 'commercialplotcategory'},
    { title: 'Вид разрешенного использования', href: 'commercialplotpermitteduse'},
    { title: 'На стадии строительства', href: 'unfinishedhouse'},
    { title: 'Районы города', href: 'district'},

    { title: 'Теги файлов объектов', href: 'objectfiletag'}
]


const fullName = ['ReferenceAdditionalServices', 'ReferenceApartmentPlanning', 'ReferenceBathroom', 'ReferenceBuildingCategory', 'ReferenceBuildingClass',
    'ReferenceBuildingConditioning', 'ReferenceBuildingEntrance', 'ReferenceBuildingFireFighting', 'ReferenceBuildingHeating', 'ReferenceBuildingVentilation',
    'ReferenceBusinessRealtyType', 'ReferenceCommercialPlotCategory', 'ReferenceCommercialPlotPermittedUse', 'ReferenceDistrictCity', 'ReferenceDistrictMicro',
    'ReferenceDistrict', 'ReferenceFloorMaterial', 'ReferenceGarageOwn', 'ReferenceGarageType', 'ReferenceGarageWallType', 'ReferenceHeating', 'ReferenceMaterialOfWalls',
    'ReferenceNumberOfRoom', 'ReferenceObjectFileTag', 'ReferenceOfficeLayout', 'ReferenceParking', 'ReferenceProductionGoal', 'ReferenceProductionRepair',
    'ReferencePurposeCommercialBuilding', 'ReferencePurposeCommercialReal', 'ReferenceRepairStatusCommercial', 'ReferenceTransactionType', 'ReferenceTypeOfHouse',
    'ReferenceTypeOfLand', 'ReferenceTypeOfOwnership', 'ReferenceTypeOfPrivateHouse', 'ReferenceTypeOfRepair', 'ReferenceUnfinishedHouse', 'ReferenceUnfinishedHousesObject'
]

const name = ['AdditionalServices', 'ApartmentPlanning', 'Bathroom', 'BuildingCategory', 'BuildingClass', 'BuildingConditioning', 'BuildingEntrance', 'BuildingFireFighting',
    'BuildingHeating', 'BuildingVentilation', 'BusinessRealtyType', 'CommercialPlotCategory', 'CommercialPlotPermittedUse', 'DistrictCity', 'DistrictMicro', 'District',
    'FloorMaterial', 'GarageOwn', 'GarageType', 'GarageWallType', 'Heating', 'MaterialOfWalls', 'NumberOfRoom', 'ObjectFileTag', 'OfficeLayout', 'Parking', 'ProductionGoal',
    'ProductionRepair', 'PurposeCommercialBuilding', 'PurposeCommercialReal', 'RepairStatusCommercial', 'TransactionType', 'TypeOfHouse', 'TypeOfLand', 'TypeOfOwnership',
    'TypeOfPrivateHouse', 'TypeOfRepair', 'UnfinishedHouse', 'UnfinishedHousesObject'
]

const nameFields = [
    ['name', 'position'],
    ['name'],
    ['name', 'position'],
    ['name', 'position'],
    ['name', 'position'],
    ['name', 'position'],
    ['name', 'position'],
    ['name', 'position'],
    ['name', 'position'],
    ['name', 'position'],
    ['name', 'position'],
    ['name', 'position'],
    ['name', 'position'],
    ['aoguid_city', 'name'],
    ['district_id', 'name'],
    ['city_id', 'name'],
    ['name', 'position'],
    ['name', 'position'],
    ['name', 'position'],
    ['name', 'position'],
    ['name', 'position'],
    ['name', 'position'],
    ['name', 'position'],
    ['name', 'position','type_id','text','img'],
    ['name', 'position'],
    ['name', 'position'],
    ['name', 'position'],
    ['name', 'position'],
    ['name', 'position'],
    ['name', 'position'],
    ['name', 'position'],
    ['name', 'position'],
    ['name', 'position'],
    ['name', 'position'],
    ['name', 'position'],
    ['name', 'position'],
    ['name', 'position'],
    ['region_aoguid', 'region_name', 'city_aoguid', 'city_name', 'name', 'object_id', 'address', 'livestatus'],
    ['unfinished_house_id', 'name', 'object_id', 'address', 'livestatus'],
]

// таблицы которые будут преобразованны в enumeration
let compactTable = [
    'ReferenceAdditionalServices',
    'ReferenceApartmentPlanning',
    'ReferenceBathroom',
    'ReferenceBuildingCategory',
    'ReferenceBuildingClass',
    'ReferenceBuildingConditioning',
    'ReferenceBuildingEntrance',
    'ReferenceBuildingFireFighting',
    'ReferenceBuildingHeating',
    'ReferenceBuildingVentilation',
    'ReferenceBusinessRealtyType',
    'ReferenceCommercialPlotCategory',
    'ReferenceCommercialPlotPermittedUse',
    'ReferenceFloorMaterial',
    'ReferenceGarageOwn',
    'ReferenceGarageType',
    'ReferenceGarageWallType',
    'ReferenceHeating',
    'ReferenceMaterialOfWalls',
    'ReferenceNumberOfRoom',
    'ReferenceOfficeLayout',
    'ReferenceParking',
    'ReferenceProductionGoal',
    'ReferenceProductionRepair',
    'ReferencePurposeCommercialBuilding',
    'ReferencePurposeCommercialReal',
    'ReferenceRepairStatusCommercial',
    'ReferenceTransactionType',
    'ReferenceTypeOfHouse',
    'ReferenceTypeOfLand',
    'ReferenceTypeOfOwnership',
    'ReferenceTypeOfPrivateHouse',
    'ReferenceTypeOfRepair',
]

const nameLower = name.map(i => i.toLowerCase());

let urlsIdx = urls.map(i => ({
    ...i,
    idx: nameLower.indexOf(i.href),
    name: name[nameLower.indexOf(i.href)],
    fullName: fullName[nameLower.indexOf(i.href)],
    kebab: kebabCase(name[nameLower.indexOf(i.href)]),
    fields: nameFields[nameLower.indexOf(i.href)],
    isCompactTable: compactTable.includes(fullName[nameLower.indexOf(i.href)])
}))

module.exports.urls = urlsIdx;
module.exports.fullName = fullName;
module.exports.name = name;





