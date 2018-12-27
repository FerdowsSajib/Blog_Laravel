<?php

namespace App\Http\Controllers;

use App\Category;
use App\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class VisitorController extends Controller
{
    public function visitorSignUp()
    {
        return view('front.visitor.visitor-sign-up',[
            'categories'    =>  Category::where('publication_status', 1)->get()
        ]);
    }

    public function addNewVisitor(Request $request)
    {
        Visitor::addNewVisitorInfo($request);
        return redirect('/');
    }

    public function visitorLogout(Request $request)
    {
        Session::forget('visitorId');
        Session::forget('visitorName');

        return redirect('/');
    }

    public function visitorLogin()
    {
        return view('front.visitor.visitor-login',[
            'categories'    =>  Category::where('publication_status', 1)->get()
        ]);
    }

    public function visitorLoginCheck(Request $request)
    {
        $visitor = Visitor::where('visitor_email', $request->visitor_email)->first();

        if ($visitor) {

            if (password_verify($request->visitor_password, $visitor->visitor_password)) {

                Session::put('visitorId', $visitor->id);
                Session::put('visitorName', $visitor->visitor_name);
                return redirect('/');

            } else {
                return redirect('/visitor-login')->with('message','Password is invalid!');
            }
        } else {
            return redirect('/visitor-login')->with('message','Email is invalid!');
        }
    }

    public function emailCheck($email)
    {
       $visitor = Visitor::where('visitor_email', $email)->first();
       if ($visitor) {
           return json_encode("Opps!! email address is already exist");
       } else {
           return json_encode("Congrats! email address is available");
       }
    }

    // This Function is for RAW AJAX
    /* public function emailCheck($email)
    {
       $visitor = Visitor::where('visitor_email', $email)->first();
       if ($visitor) {
           echo "Opps!! email address is already exist";
       } else {
           echo "Congrats! email address is available";
       }
    } */


}
