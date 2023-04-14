<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%addres}}`.
 */
class m210311_162028_create_address_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%address}}', [
            'id' => $this->primaryKey(),
            'unrestricted_value' => $this->string(200),
            'value' => $this->string(200),
            'area' => $this->string(200),
            'area_fias_id' => $this->string(200),
            'area_kladr_id' => $this->string(200),
            'area_type' => $this->string(200),
            'area_type_full' => $this->string(200),
            'area_with_type' => $this->string(200),
            'beltway_distance' => $this->string(200),
            'beltway_hit' => $this->string(200),
            'block' => $this->string(200),
            'block_type' => $this->string(200),
            'block_type_full' => $this->string(200),
            'capital_marker' => $this->string(200),
            'city' => $this->string(200),
            'city_area' => $this->string(200),
            'city_district' => $this->string(200),
            'city_district_fias_id' => $this->string(200),
            'city_district_kladr_id' => $this->string(200),
            'city_district_type' => $this->string(200),
            'city_district_type_full' => $this->string(200),
            'city_district_with_type' => $this->string(200),
            'city_fias_id' => $this->string(200),
            'city_kladr_id' => $this->string(200),
            'city_type' => $this->string(200),
            'city_type_full' => $this->string(200),
            'city_with_type' => $this->string(200),
            'country' => $this->string(200),
            'country_iso_code' => $this->string(200),
            'entrance' => $this->string(200),
            'federal_district' => $this->string(200),
            'fias_actuality_state' => $this->string(200),
            'fias_code' => $this->string(200),
            'fias_id' => $this->string(200),
            'fias_level' => $this->string(200),
            'flat' => $this->string(200),
            'flat_area' => $this->string(200),
            'flat_fias_id' => $this->string(200),
            'flat_price' => $this->string(200),
            'flat_type' => $this->string(200),
            'flat_type_full' => $this->string(200),
            'floor' => $this->string(200),
            'geo_lat' => $this->string(200),
            'geo_lon' => $this->string(200),
            'geoname_id' => $this->string(200),
            'history_values' => $this->string(200),
            'house' => $this->string(200),
            'house_fias_id' => $this->string(200),
            'house_kladr_id' => $this->string(200),
            'house_type' => $this->string(200),
            'house_type_full' => $this->string(200),
            'kladr_id' => $this->string(200),
            'metro' => $this->string(200),
            'okato' => $this->string(200),
            'oktmo' => $this->string(200),
            'postal_box' => $this->string(200),
            'postal_code' => $this->string(200),
            'qc' => $this->string(200),
            'qc_complete' => $this->string(200),
            'qc_geo' => $this->string(200),
            'qc_house' => $this->string(200),
            'region' => $this->string(200),
            'region_fias_id' => $this->string(200),
            'region_iso_code' => $this->string(200),
            'region_kladr_id' => $this->string(200),
            'region_type' => $this->string(200),
            'region_type_full' => $this->string(200),
            'region_with_type' => $this->string(200),
            'settlement' => $this->string(200),
            'settlement_fias_id' => $this->string(200),
            'settlement_kladr_id' => $this->string(200),
            'settlement_type' => $this->string(200),
            'settlement_type_full' => $this->string(200),
            'settlement_with_type' => $this->string(200),
            'source' => $this->string(200),
            'square_meter_price' => $this->string(200),
            'street' => $this->string(200),
            'street_fias_id' => $this->string(200),
            'street_kladr_id' => $this->string(200),
            'street_type' => $this->string(200),
            'street_type_full' => $this->string(200),
            'street_with_type' => $this->string(200),
            'tax_office' => $this->string(200),
            'tax_office_legal' => $this->string(200),
            'timezone' => $this->string(200),
            'unparsed_parts' => $this->string(200),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%addres}}');
    }
}
