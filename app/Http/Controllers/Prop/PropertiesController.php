<?php

namespace App\Http\Controllers\Prop;

use App\Http\Controllers\Controller;
use App\Models\Prop\AllRequest;
use App\Models\Prop\Property;
use App\Models\Prop\PropImage;
use App\Models\Prop\SavedProp;
use Auth;
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
        
        //validate form request
        if(auth()->user()){

            $validateFormCount = AllRequest::where('prop_id',$id)
            ->where('user_id',Auth::user()->id)
            ->count();
    
            //validate saving proprety
            $validateSavingPropretyCount = SavedProp::where('prop_id',$id)
            ->where('user_id',Auth::user()->id)
            ->count();
            return view('props.single',compact('singleProp','propImage','relateProps','validateFormCount','validateSavingPropretyCount'));

        }
        
        return view('props.single',compact('singleProp','propImage','relateProps'));
    }

    public function insertRequest(Request $request){

        Request()->validate([
            'name' => 'required|max:40', 
            'email' =>'required|max:70',
            'phone' =>'required|max:50'
        ]);
        $insertRequest = AllRequest::create([
            'prop_id'=> $request->prop_id,
            'agent_name' => $request->agent_name,
            'user_id' => Auth::user()->id,
            'name' =>$request->name, 
            'email' =>$request->email,
            'phone' =>$request->phone
        ]);

        if($insertRequest){
            return redirect()->route('single.prop',$request->prop_id)->with('success','Request add successfuly');
        }
        echo "erreur inatendu";
    }

    public function saveProps(Request $request)
    {
        // dd($request);
        $saveProp = SavedProp::create([
            'prop_id'=> $request->prop_id,
            'user_id' => Auth::user()->id,
            'title' =>$request->title, 
            'image' =>$request->image,
            'location' =>$request->location,
            'price' =>$request->price,

        ]);

        if($saveProp){
            return redirect()->route('single.prop',$request->prop_id)->with('save','Proprety save successfuly');
        }
        echo "erreur inatendu";
    }

    public function propsBuy(){
        $type = "Buy";

        $propsBuy = Property::select()
        ->where('type',$type)
        ->get();

        return view('props.propsbuy',compact('propsBuy'));
    }

    
    public function propsRent(){
        $type = "Rent";

        $propsRent = Property::select()
        ->where('type',$type)
        ->get();

        return view('props.propsrent',compact('propsRent'));
    }

    
    public function displaysByHomeType($hometype){

        $propsByHomeType = Property::select()
        ->where('home_type',$hometype)
        ->get();

        return view('props.propshometype',compact('propsByHomeType','hometype'));
    }
    
    public function priceAsc(){

        $propsByPriceAsc = Property::select()
        ->take(9)
        ->orderBy('price',"asc")
        ->get();

        return view('props.propspriceasc',compact('propsByPriceAsc'));
    }

    public function priceDesc(){

        $propsByPriceDesc = Property::select()
        ->take(9)
        ->orderBy('price',"desc")
        ->get();

        return view('props.propspricedesc',compact('propsByPriceDesc'));
    }
    
    
}
