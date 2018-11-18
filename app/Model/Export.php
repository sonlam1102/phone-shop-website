<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Export extends Model
{
    protected $table = "export";

    public function import() {
        return $this->belongsTo('App\Model\Import', 'import_id');
    }

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public static function add_export($data){
        $export = new Export();

        $export->user_id = $data['user'];
        $export->company_id = $data['company'];
        $export->import_id = $data['import'];
        $export->receiver = $data['receiver'];
        $export->receiver_address = $data['receiver_address'];

        return $export->save();
    }
}
