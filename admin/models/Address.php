<?php

namespace app\admin\models;

use Yii;

/**
 * This is the model class for table "address".
 *
 * @property int $id
 * @property string|null $unrestricted_value
 * @property string|null $value
 * @property string|null $area
 * @property string|null $area_fias_id
 * @property string|null $area_kladr_id
 * @property string|null $area_type
 * @property string|null $area_type_full
 * @property string|null $area_with_type
 * @property string|null $beltway_distance
 * @property string|null $beltway_hit
 * @property string|null $block
 * @property string|null $block_type
 * @property string|null $block_type_full
 * @property string|null $capital_marker
 * @property string|null $city
 * @property string|null $city_area
 * @property string|null $city_district
 * @property string|null $city_district_fias_id
 * @property string|null $city_district_kladr_id
 * @property string|null $city_district_type
 * @property string|null $city_district_type_full
 * @property string|null $city_district_with_type
 * @property string|null $city_fias_id
 * @property string|null $city_kladr_id
 * @property string|null $city_type
 * @property string|null $city_type_full
 * @property string|null $city_with_type
 * @property string|null $country
 * @property string|null $country_iso_code
 * @property string|null $entrance
 * @property string|null $federal_district
 * @property string|null $fias_actuality_state
 * @property string|null $fias_code
 * @property string|null $fias_id
 * @property string|null $fias_level
 * @property string|null $flat
 * @property string|null $flat_area
 * @property string|null $flat_fias_id
 * @property string|null $flat_price
 * @property string|null $flat_type
 * @property string|null $flat_type_full
 * @property string|null $floor
 * @property string|null $geo_lat
 * @property string|null $geo_lon
 * @property string|null $geoname_id
 * @property string|null $history_values
 * @property string|null $house
 * @property string|null $house_fias_id
 * @property string|null $house_kladr_id
 * @property string|null $house_type
 * @property string|null $house_type_full
 * @property string|null $kladr_id
 * @property string|null $metro
 * @property string|null $okato
 * @property string|null $oktmo
 * @property string|null $postal_box
 * @property string|null $postal_code
 * @property string|null $qc
 * @property string|null $qc_complete
 * @property string|null $qc_geo
 * @property string|null $qc_house
 * @property string|null $region
 * @property string|null $region_fias_id
 * @property string|null $region_iso_code
 * @property string|null $region_kladr_id
 * @property string|null $region_type
 * @property string|null $region_type_full
 * @property string|null $region_with_type
 * @property string|null $settlement
 * @property string|null $settlement_fias_id
 * @property string|null $settlement_kladr_id
 * @property string|null $settlement_type
 * @property string|null $settlement_type_full
 * @property string|null $settlement_with_type
 * @property string|null $source
 * @property string|null $square_meter_price
 * @property string|null $street
 * @property string|null $street_fias_id
 * @property string|null $street_kladr_id
 * @property string|null $street_type
 * @property string|null $street_type_full
 * @property string|null $street_with_type
 * @property string|null $tax_office
 * @property string|null $tax_office_legal
 * @property string|null $timezone
 * @property string|null $unparsed_parts
 */
class Address extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'address';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['unrestricted_value', 'value', 'area', 'area_fias_id', 'area_kladr_id', 'area_type', 'area_type_full', 'area_with_type', 'beltway_distance', 'beltway_hit', 'block', 'block_type', 'block_type_full', 'capital_marker', 'city', 'city_area', 'city_district', 'city_district_fias_id', 'city_district_kladr_id', 'city_district_type', 'city_district_type_full', 'city_district_with_type', 'city_fias_id', 'city_kladr_id', 'city_type', 'city_type_full', 'city_with_type', 'country', 'country_iso_code', 'entrance', 'federal_district', 'fias_actuality_state', 'fias_code', 'fias_id', 'fias_level', 'flat', 'flat_area', 'flat_fias_id', 'flat_price', 'flat_type', 'flat_type_full', 'floor', 'geo_lat', 'geo_lon', 'geoname_id', 'history_values', 'house', 'house_fias_id', 'house_kladr_id', 'house_type', 'house_type_full', 'kladr_id', 'metro', 'okato', 'oktmo', 'postal_box', 'postal_code', 'qc', 'qc_complete', 'qc_geo', 'qc_house', 'region', 'region_fias_id', 'region_iso_code', 'region_kladr_id', 'region_type', 'region_type_full', 'region_with_type', 'settlement', 'settlement_fias_id', 'settlement_kladr_id', 'settlement_type', 'settlement_type_full', 'settlement_with_type', 'source', 'square_meter_price', 'street', 'street_fias_id', 'street_kladr_id', 'street_type', 'street_type_full', 'street_with_type', 'tax_office', 'tax_office_legal', 'timezone', 'unparsed_parts'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'unrestricted_value' => 'Unrestricted Value',
            'value' => 'Value',
            'area' => 'Area',
            'area_fias_id' => 'Area Fias ID',
            'area_kladr_id' => 'Area Kladr ID',
            'area_type' => 'Area Type',
            'area_type_full' => 'Area Type Full',
            'area_with_type' => 'Area With Type',
            'beltway_distance' => 'Beltway Distance',
            'beltway_hit' => 'Beltway Hit',
            'block' => 'Block',
            'block_type' => 'Block Type',
            'block_type_full' => 'Block Type Full',
            'capital_marker' => 'Capital Marker',
            'city' => 'City',
            'city_area' => 'City Area',
            'city_district' => 'City District',
            'city_district_fias_id' => 'City District Fias ID',
            'city_district_kladr_id' => 'City District Kladr ID',
            'city_district_type' => 'City District Type',
            'city_district_type_full' => 'City District Type Full',
            'city_district_with_type' => 'City District With Type',
            'city_fias_id' => 'City Fias ID',
            'city_kladr_id' => 'City Kladr ID',
            'city_type' => 'City Type',
            'city_type_full' => 'City Type Full',
            'city_with_type' => 'City With Type',
            'country' => 'Country',
            'country_iso_code' => 'Country Iso Code',
            'entrance' => 'Entrance',
            'federal_district' => 'Federal District',
            'fias_actuality_state' => 'Fias Actuality State',
            'fias_code' => 'Fias Code',
            'fias_id' => 'Fias ID',
            'fias_level' => 'Fias Level',
            'flat' => 'Flat',
            'flat_area' => 'Flat Area',
            'flat_fias_id' => 'Flat Fias ID',
            'flat_price' => 'Flat Price',
            'flat_type' => 'Flat Type',
            'flat_type_full' => 'Flat Type Full',
            'floor' => 'Floor',
            'geo_lat' => 'Geo Lat',
            'geo_lon' => 'Geo Lon',
            'geoname_id' => 'Geoname ID',
            'history_values' => 'History Values',
            'house' => 'House',
            'house_fias_id' => 'House Fias ID',
            'house_kladr_id' => 'House Kladr ID',
            'house_type' => 'House Type',
            'house_type_full' => 'House Type Full',
            'kladr_id' => 'Kladr ID',
            'metro' => 'Metro',
            'okato' => 'Okato',
            'oktmo' => 'Oktmo',
            'postal_box' => 'Postal Box',
            'postal_code' => 'Postal Code',
            'qc' => 'Qc',
            'qc_complete' => 'Qc Complete',
            'qc_geo' => 'Qc Geo',
            'qc_house' => 'Qc House',
            'region' => 'Region',
            'region_fias_id' => 'Region Fias ID',
            'region_iso_code' => 'Region Iso Code',
            'region_kladr_id' => 'Region Kladr ID',
            'region_type' => 'Region Type',
            'region_type_full' => 'Region Type Full',
            'region_with_type' => 'Region With Type',
            'settlement' => 'Settlement',
            'settlement_fias_id' => 'Settlement Fias ID',
            'settlement_kladr_id' => 'Settlement Kladr ID',
            'settlement_type' => 'Settlement Type',
            'settlement_type_full' => 'Settlement Type Full',
            'settlement_with_type' => 'Settlement With Type',
            'source' => 'Source',
            'square_meter_price' => 'Square Meter Price',
            'street' => 'Street',
            'street_fias_id' => 'Street Fias ID',
            'street_kladr_id' => 'Street Kladr ID',
            'street_type' => 'Street Type',
            'street_type_full' => 'Street Type Full',
            'street_with_type' => 'Street With Type',
            'tax_office' => 'Tax Office',
            'tax_office_legal' => 'Tax Office Legal',
            'timezone' => 'Timezone',
            'unparsed_parts' => 'Unparsed Parts',
        ];
    }
}
