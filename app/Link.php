<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Link extends Model
{
    protected $fillable = ['url','shorturl','user_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function logs()
    {
        return $this->hasMany(Log::class);
    }
    /**
     * @param array $options
     * @return bool
     */
    public function save($options=[])
    {
        if(null==$this->shorturl or ''==$this->shorturl){
            $this->shorturl=Str::random(6);
            while(self::where('shorturl',$this->shorturl)->count()>0){
                $this->shorturl=Str::random(6);
            }
        }
        $this->shorturl = Str::slug($this->shorturl);
        if(null!==$this->id or self::where('shorturl',$this->shorturl)->count()==0){
            return parent::save($options);
        }else{
            Message::addWarning('Ce lien court existe déjà, veuillez en utiliser un autre');
            return false;
        }
    }

    public function getCompleteShorturl()
    {
        return trim(env('APP_URL')).'/'.$this->shorturl;
    }

    /**
     * @param bool $path
     * @return string
     */
    public function getQrcodeFilename($path=true)
    {
        if($path) {
            return asset('storage/qrcode_' . $this->shorturl . '.png');
        }else{
            return 'qrcode_' . $this->shorturl . '.png';
        }
    }

    public function getLogsForGraph()
    {
        $logs = $this->logs()->get();
        $dataTemp=[];
        foreach ($logs as $log) {
            if(!isset($dataTemp[$log->created_at->format('Y-m-d')])){
                $dataTemp[$log->created_at->format('Y-m-d')]=0;
            }
            $dataTemp[$log->created_at->format('Y-m-d')]++;
        }
        $data=[];
        foreach ($dataTemp as $x=>$y) {
            $data[]=['x'=>$x,'y'=>$y];
        }
        return $data;
    }
}
