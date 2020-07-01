<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Models\UserInformation;

class RegistrationFormController extends Controller
{
    public function store(Request $request){

        // return $request->all();
        $request->validate([
            "firstname" => ['required','string','max:255'],
            "lastname" => ['required','string','max:255'],
            "birth_date" => ['required','date'],
            "city" => ['required','string','max:255'],
            "country_id" => ['required','numeric','exists:countries,id'],
            "occupation" => ['nullable','string'],
            "facebook" => ['nullable','string'],
            "linkedin" => ['nullable','string'],
            "instagram" => ['nullable','string'],
            "others" => ['nullable','string'],
            "motivation" => ['nullable','string'],
            "did_you_know_foundation" => ['nullable','string'],
            "name_ogn" =>['nullable','string'],
            "web_page" =>['nullable','string'],
            "allies_to_implement" =>['nullable','string'],
            "impact_class" =>['nullable','string'],
            "extra_information" =>['nullable','string'],
        ]);

        $this->authorize('verifyUserInformation',UserInformation::class);

        $user = User::where('id',auth()->user()->id)->update([
            'name'=>$request->input('firstname'),
            'lastname'=>$request->input('lastname'),
            "birth_date" => $request->input('birth_date'),
            "city" => $request->input('city'),
            "country_id" => $request->input('country_id'),
        ]);

        $userInformation = UserInformation::where('user_id',auth()->user()->id)->updateOrCreate([
            "occupation" => $request->input('occupation'),
            "facebook" => $request->input('facebook'),
            "linkedin" => $request->input('linkedin'),
            "instagram" => $request->input('instagram'),
            "others" => $request->input('others'),
            "motivation" => $request->input('motivation'),
            "did_you_know_foundation" => $request->input('did_you_know_foundation'),
            "ong" => $request->input('ong') == 'option1'?1:0,
            "name_ogn" => $request->input('name_ogn'),
            "web_page" => $request->input('web_page'),
            'implementation_ant' =>$request->input('implementation_ant') == 'option1'?1:0,
            "allies_to_implement" => $request->input('allies_to_implement'),
            "impact_class" => $request->input('impact_class'),
            "extra_information" => $request->input('extra_information'),
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('steps');
        

    }
}
