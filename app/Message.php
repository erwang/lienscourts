<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Message extends Model
{
    static private $messages=[];


    static private function addMessage($type,$text){
        self::$messages[]=['type'=>$type,'text'=>$text];
        Session::put('messages',self::$messages);
    }

    static public function addDanger($text)
    {
        self::addMessage('danger',$text);
    }
    static public function addInfo($text)
    {
        self::addMessage('info',$text);
    }
    static public function addWarning($text)
    {
        self::addMessage('warning',$text);
    }
    static public function addSuccess($text)
    {
        self::addMessage('success',$text);
    }

    static public function get()
    {
        $m = Session::get('messages');
        Session::put('messages',[]);
        if(null==$m){
            $m=[];
        }
        return $m;
    }
}
