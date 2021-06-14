<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Mail;
use App\Models\Weapon;
class WeaponController extends Controller
{
    //
    protected function sendEmailConfirmationTo($user,$detail)
    {
        $view = 'emails.weapon_changed';
        $data = compact(['user','detail']);
        $to = 'kingo233@outlook.com';
        $subject = "游戏数据改动警示！";

        Mail::send($view, $data, function ($message) use ($to, $subject) {
            $message->to($to)->subject($subject);
        });
    }
    public function show(){
        $user = Auth::user();
        //$this->authorize('modify');
        if($user->priority == 0 || $user->priority == 2){
            $weapons = DB::table('weapons')
                        ->paginate(10);
            return view('weapons.show',compact(['user','weapons']));
        }
        session()->flash('danger','权限不足');
        return redirect()->back();
    }
    public function update(Weapon $weapon,Request $request){
        $user = Auth::user();
        //$this->authorize('modify',$user);
        if($user->priority == 0 || $user->priority == 2);
        else {
            session()->flash('danger','权限不足');
            return redirect()->back();
        }
        if($request->attack >= 0 && $request->attack <= 1000 && $request->defend >= 0 && $request->defend <= 1000 &&
            $request->critical_hit >= 0 && $request->critical_hit <= 100 && $request->critical_damage >= 0 );
        else{
            session()->flash('danger','请输入正确的数字！');
            return redirect()->back();
        }
        $detail = $weapon->name . ':';
        if($weapon->name != $request->name){
            $detail = $detail . 'name before:' . $weapon->name . 'name after:' . $request->name . '<br>';
            $weapon->name = $request->name;
        } 

        if($weapon->attack != $request->attack){
            $detail = $detail . 'attack before:' . $weapon->attack . 'defend after:' . $request->attack . '<br>';
            $weapon->attack = $request->attack;
        } 

        if($weapon->defend != $request->defend){
            $detail = $detail . 'defend before:' . $weapon->defend . 'defend after:' . $request->defend . '<br>';
            $weapon->defend = $request->defend;
        } 

        if($weapon->critical_hit != $request->critical_hit){
            $detail = $detail . 'critical_hit before:' . $weapon->critical_hit . 'critical_hit after:' . $request->critical_hit . '<br>';
            $weapon->critical_hit = $request->critical_hit;
        }
        
        if($weapon->critical_damage != $request->critical_damage){
            $detail = $detail . 'critical_damage before:' . $weapon->critical_damage . 'critical_hit after:' . $request->critical_hit . '<br>';
            $weapon->critical_hit = $request->critical_hit;
        }
        $weapon->save();
        $user = Auth::user();
        DB::table('weapon_modify_history')
            ->insert([
                'weapon_id' => $weapon->id,
                'user_id' => $user->id,
                'user_name' => $user->name,
                'detail' => $detail,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        
        session()->flash('success','成功改动！');
        $this->sendEmailConfirmationTo($user,$detail);
        return redirect(route('weapons.show'));
        
    }
}
