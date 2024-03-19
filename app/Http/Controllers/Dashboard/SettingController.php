<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\support\str;

class SettingController extends Controller
{
    public function update(Request $request, setting $setting){

        $data = [
            'logo' =>'nullable|image|mimes:jpg,png.pdf,jpeg|max:5000',
            'favicon' =>'nullable|image|mimes:jpg,png.pdf,jpeg|max:2049',
            'facbook'=> 'nullable|string',
            'instgram'=> 'nullable|string',
            'phone'=> 'nullable',
            'email'=> 'nullable|email',
        ];
        foreach(config('app.languages') as $key => $value){
           $data[$key.'*.title'] = 'required|string';
           $data[$key.'*.content'] = 'required|string';
           $data[$key.'*.address'] = 'required|string';
        }
        $validationData=$request->validate($data);
        $setting->update($request->except('logo','favicon','_token'));
        //$Dimage=setting::all();
        //  if($request->file('logo')){
        //  $file =$request->file('logo');
        //  $finalName=$file->getClientOriginalName();
        //  $file->move(public_path('images'),$finalName);
        //   $path ='images/'.$finalName;
        //
        //  $setting->update(['logo'=>$path]);
        //  }

        if ( $request->hasFile('logo')){
            $finalName=time().rand().'.'.$request->logo->extension();
            if($request->logo->move(public_path('images'),$finalName)){
                unlink(public_path('images/'.$setting->logo));
            }
            }else{
                $finalName=$setting->logo;
            }
        $data['logo']=$finalName;
        $setting->update(['logo'=>$finalName]);


        if ( $request->hasFile('favicon')){
            $finalNameF=time().rand().'.'.$request->favicon->extension();
            if($request->favicon->move(public_path('images'),$finalNameF)){
               unlink(public_path('images/'.$setting->favicon));
            }
            }else{
                $finalNameF=$setting->favicon;
            }
        $data['favicon']=$finalNameF;
        $setting->update(['favicon'=>$finalNameF]);
         return redirect()->route('dashbord.settings');
    }
}
