<?php


namespace App\Helper;


class notificationHelper
{

    static $create = "Data Created Successfully";
    static $update = "Data Updated Successfully";
    static $delete = "Data Deleted Successfully";
    static $addcart = "Product Added To Cart";
    static $updatecart = "Cart Updated";
    static $clearcart = "Cart Cleared";
    static $error = "error";
    static $recurrent = "recurrent";
    static $nodata = "no data";
    static $saveddata = "This data is already registered";

    static function sendNotification($type,$message="error")
    {
        $succes = [
            "status" => "alert alert-success",
            "message" => self::$$message
        ];

        $error = [
            "status" => "alert alert-danger",
            "message" => self::$$message
        ];

        if ($type == 'success')
        {
            return redirect()->back()->with($succes);
        }
        elseif ($type == 'error')
        {
            return  redirect()->back()->with($error);
        }

    }
}
