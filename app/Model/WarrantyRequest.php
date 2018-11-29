<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class WarrantyRequest extends Model
{
    protected $table = "warranty_request";

    public const PENDING = 0;
    public const CONFIRM = 1;
    public const SUCCESS = 2;
    public const CANCEL = 3;

    protected $request_status = [
        self::PENDING => "Đang chờ",
        self::CONFIRM => "Đã Xác nhận",
        self::SUCCESS => "Thành công",
        self::CANCEL => "Đã huỷ",
    ];

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function code() {
        return $this->belongsTo('App\Model\ProductCode', 'product_code_id');
    }

    public static function addRequest($user_id, $product_code_id, $reason) {
        $warranty_request = new WarrantyRequest();

        $warranty_request->user_id = $user_id;
        $warranty_request->product_code_id = $product_code_id;
        $warranty_request->reason = $reason;

        return $warranty_request->save();
    }

    public function confirm() {
        $this->status = WarrantyRequest::CONFIRM;
        $this->save();
    }

    public function success() {
        $this->status = WarrantyRequest::SUCCESS;
        $this->save();
    }

    public function cancel() {
        $this->status = WarrantyRequest::CANCEL;
        $this->save();
    }

    public function status() {
        return $this->request_status[(int)$this->status];
    }

    public function getStatus() {
        return $this->request_status;
    }

    public static function get_request_status() {
        return (new WarrantyRequest)->getStatus();
    }
}
