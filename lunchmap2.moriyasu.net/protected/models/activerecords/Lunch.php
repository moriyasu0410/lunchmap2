<?php

/**
 * ランチActiveRecord
 * @author moriyasu
 *
 */
class Lunch extends LunchBase
{

    /**
     * 経度
     * @var float 
     */
    public $lng;

    /**
     * 緯度
     * @var float
     */
    public $lat;
    
    /**
     * 距離
     * @var float
     */
    public $len;

    /**
     * overwrite parent::model()
     *
     * @param string $className className
     *
     * @return PpMember
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * 名前付きスコープ
     *
     * @return [] 名前付きスコープ
     */
    public function scopes()
    {
        return [
        ];
    }

    /**
     * ランチを取得するクエリ
     *
     * @return Lunch
     */
    public function select()
    {
        $this->getDbCriteria()->mergeWith(
            [
                'select' => 'id, shop_name, X(latlng) as lng, Y(latlng) as lat, menu, image_url, nearest, price, visited_at',
            ]
        );
        return $this;
    }

    /**
     * ランチを経度・緯度を条件にセレクトするクエリ
     *
     * @param int $lng 経度
     * @param int $lat 緯度
     * 
     * @return Lunch
     */
    public function selectNear($lng, $lat)
    {
        $this->getDbCriteria()->mergeWith(
            [
                'select' => "id, shop_name, X(latlng) as lng, Y(latlng) as lat, GLength(GeomFromText(CONCAT('LineString($lng $lat,', X(latlng), ' ', Y(latlng),')'))) AS len, menu, image_url, nearest, price, visited_at",
            ]
        );
        return $this;
    }

    /**
     * IDを条件とするクエリ
     *
     * @param int $id ID
     *
     * @return Lunch
     */
    public function conditionId($id)
    {
        $this->getDbCriteria()->addColumnCondition(
            [
                'id' => $id,
            ]
        );
        return $this;
    }

    /**
     * 距離の昇順を指定するクエリ
     *
     * @return Lunch
     */
    public function orderByLenAsc()
    {
        $this->getDbCriteria()->mergeWith(
            [
                'order' => 'len ASC'
            ]
        );
        return $this;
    }

}
