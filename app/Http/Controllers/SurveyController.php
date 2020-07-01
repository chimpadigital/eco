<?php

namespace App\Http\Controllers;

use App\Models\Suervey;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function create(){

        return view('survey');
    }

    public function store(Request $request)
    {
        $request->validate([
            'how_did_you_know_manual'=>['required','numeric','min:1','max:6'],
            'process_download'=>['required','numeric','min:1','max:5'],
            'virtual_assists_boolean'=>['required','boolean'],
            'virtual_assists'=>['nullable','string'],
            'call_time_boolean'=>['required','boolean'],
            'call_time'=>['nullable','string'],
            'quality_advice_boolean'=>['required','boolean'],
            'quality_advice'=>['nullable','string'],
            'attention'=>['required','numeric','min:1','max:4'],
            'suggestions'=>['nullable','string'],
            'content_option_1'=>['required','numeric','min:1','max:5'],
            'content_option_2'=>['required','numeric','min:1','max:5'],
            'content_option_3'=>['required','numeric','min:1','max:5'],
            'content_option_4'=>['required','numeric','min:1','max:5'],
            'content_option_5'=>['required','numeric','min:1','max:5'],
            'content_option_6'=>['required','numeric','min:1','max:5'],
            'chapter_1'=>['required','numeric','min:1','max:5'],
            'chapter_2'=>['required','numeric','min:1','max:5'],
            'chapter_3'=>['required','numeric','min:1','max:5'],
            'chapter_4'=>['required','numeric','min:1','max:5'],
            'chapter_5'=>['required','numeric','min:1','max:5'],
            'chapter_6'=>['required','numeric','min:1','max:5'],
            'chapter_7'=>['required','numeric','min:1','max:5'],
            'chapter_8'=>['required','numeric','min:1','max:5'],
            'satisfied'=>['required','numeric','min:1','max:5'],
            'suggestions_2'=>['required','numeric','min:1','max:5'],
            'would_you_recommend'=>['nullable','string'],
            'like'=>['nullable','string'],
        ]);
        
        $data = $request->all();
        
        $data['user_id'] = auth()->user()->id;
        
        Suervey::create($data);

        return "exito";
        
    }
}
