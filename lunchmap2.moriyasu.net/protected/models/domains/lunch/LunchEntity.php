<?php

/**
 * ランチEntity
 * @author moriyasu
 *
 */
class LunchEntity extends CComponent
{

    /**
     * ID
     * @var int 
     */
    public $id;
    
    /**
     * 店名
     * @var string 
     */
    public $shopName;
    
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
     * メニュー
     * @var string 
     */
    public $menu;
    
    /**
     * 画像URL
     * @var string 
     */
    public $imageUrl;
    
    /**
     * 最寄り駅
     * @var string 
     */
    public $nearest;
    
    /**
     * 価格
     * @var int
     */
    public $price;
    
    /**
     * 訪問日
     * @var date 
     */
    public $visitedAt;
    
    /**
     * ランチReposiroty
     * @var LunchRepository
     */
    private $_lunchRepository;

    /**
     * コンストラクタ
     *
     * @param int    $id        ID
     * @param string $shopName  店名
     * @param float  $lng       経度
     * @param float  $lat       緯度
     * @param float  $len       距離
     * @param string $menu      メニュー
     * @param string $imageUrl  画像URL
     * @param string $nearest   最寄り駅
     * @param int    $price     価格
     * @param date   $visitedAt 訪問日
     */

    public function __construct($id = null, $shopName = null, $lng = null, $lat = null, $len = null, $menu = null, $imageUrl = null, $nearest = null, $price = null, $visitedAt = null)
    {
        $this->id               = $id;
        $this->shopName         = $shopName;
        $this->lng              = $lng;
        $this->lat              = $lat;
        $this->len              = $len;
        $this->menu             = $menu;
        $this->imageUrl         = $imageUrl;
        $this->nearest          = $nearest;
        $this->price            = $price;
        $this->visitedAt        = $visitedAt;
        $this->_lunchRepository = new LunchRepository();
    }

    /**
     * LunchEntityのインスタンスを返却する
     *
     * @return LunchEntity
     */
    public static function getInstance()
    {
        return new LunchEntity();
    }

    /**
     * 一覧取得
     *
     * @param float $lng 経度
     * @param float $lat 緯度
     * 
     * @return LunchEntity[] ランチEntityリスト
     */
    public function getNearList($lng, $lat)
    {
        return $this->_lunchRepository->findAll($lng, $lat);
    }

    /**
     * 取得
     *
     * @param int $id ID
     *
     * @return LunchEntity ランチEntity
     */
    public function get($id)
    {
        return $this->_lunchRepository->findById($id);
    }

}
