<?php
/**
 * ランチマップTOP画面表示
 * @author moriyasu
 *
 */
class IndexController extends Controller
{
    /**
     * ランチマップTOP画面表示
     */
    
    public function actionIndex()
    {
        $this->render('index');
    }
}