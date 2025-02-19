<?php

namespace App\Http\Controllers\Prop;

use App\Http\Controllers\Controller;
use App\Models\Prop\Property;
use App\Models\Prop\PropImage;
use Illuminate\Http\Request;

class PropertiesController extends Controller
{
    
    public function index(){
        $props = Property::select()->take(9)->orderBy('created_at','desc')->get();

        return view('home',compact('props'));
    }

    public function single($id){
        $singleProp = Property::find($id);

        $propImage= PropImage::where('prop_id',$id)->get();



        $relateProps = Property::where('home_type', $singleProp->home_type)
        ->where('id','!=',$id)
        ->take(3)
        ->orderBy('created_at','desc')
        ->get();

        return view('props.single',compact('singleProp','propImage','relateProps'));
    }

}
