<?php

/**
 * ランチRepository
 * @author moriyasu
 *
 */
class LunchRepository extends CComponent
{

    /**
     * ランチを近い順に取得する
     *
     * @param float $lng 経度
     * @param float $lat 緯度
     *
     * @return LunchEntity[]
     */
    public function findAll($lng, $lat)
    {
        $lunchList = Lunch::model()
            ->selectNear($lng, $lat)
            ->orderByLenAsc()
            ->findAll();

        $lunghEntityList = array_map(
            function ($lunch) {
                return $this->_toEntity($lunch);
            }, $lunchList
        );

        return $lunghEntityList;
    }

    /**
     * Entity 詰め替え
     *
     * @param Lunch $lunch ランチActiveRecord
     *
     * @return lunchEntity ランチEntity
     */
    private function _toEntity($lunch = null)
    {
        if (is_null($lunch)) {
            return null;
        } else {
            return new LunchEntity($lunch->id, $lunch->shop_name, $lunch->lng, $lunch->lat, $lunch->len, $lunch->menu, $lunch->image_url, $lunch->nearest, $lunch->price, $lunch->visited_at);
        }
    }

 
}
