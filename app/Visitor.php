<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Visitor extends Model
{
    protected $fillable = [
        'visitor_name','visitor_email','visitor_phone','visitor_password','visitor_address'
    ];

    public static function addNewVisitorInfo($request)
    {
        $visitor = new Visitor();
        $visitor->visitor_name     = $request->visitor_name;
        $visitor->visitor_email    = $request->visitor_email;
        $visitor->visitor_phone    = $request->visitor_phone;
        $visitor->visitor_password = bcrypt($request->visitor_password);
        $visitor->visitor_address  = $request->visitor_address;
        $visitor->save();

        Session::put('visitorId', $visitor->id);
        Session::put('visitorName', $visitor->visitor_name);
    }



}
