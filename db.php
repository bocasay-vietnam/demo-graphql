<?php

class DB{
    public static $dbdatas = [];

    public static function loadDatas(){
        $datas = file_get_contents(__DIR__.'/db.json');
        DB::$dbdatas = json_decode($datas,true);
    }

    public static function saveDatas(){
        $jsondatas = json_encode(DB::$dbdatas);
        file_put_contents(__DIR__.'/db.json',$jsondatas);
    }
}