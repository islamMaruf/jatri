<?php

namespace App\Http\Controllers;

use App\FareModule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FareController extends Controller
{
    public function index()
    {
        $fareModalities = [];
        $orderBySequence = DB::table('roads')->where('id', 1)->get();
        $orderBySequence = json_decode($orderBySequence[0]->stoppage_sequence);
        foreach ($orderBySequence as $order) {
            $fareModality = DB::table("fares")->where('from_stoppage_id', $order)->get()->toArray();
            array_push($fareModalities, $fareModality);
        }
        $fareModalities = collect($fareModalities)->filter()->all();

//        foreach ($fareModalities as $key => $fareModality){
//            foreach ($orderBySequence as $order){
//                $fareModality = DB::table("fares");
//                if( $fareModality[$key]->from_stoppage_id){
//                    $fareModality->where('from_stoppage_id', $fareModality[$key]->from_stoppage_id);
//                }
//                if(!is_null($order)){
//                    $fareModality->where('to_stoppage_id',$order);
//                }
//                $fareModality->get()->dd();
//
//            }
//        }
        dd($fareModalities);
        return view('fare-modality.index');
    }


}
