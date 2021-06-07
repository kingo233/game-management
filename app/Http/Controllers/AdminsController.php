<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Models\User;
use Mail;
use DB;
use Auth; 
class AdminsController extends Controller
{
    //
    public function show(){
        $user = Auth::user();
        $this->authorize('superadmin',$user);

        $admins = DB::table('users')
                    ->where('priority','!=','3')
                    ->paginate(10);
        
        return view('admins.show',compact(['user','admins']));
    }
    public function modify(User $admin,Request $request){
        $this->authorize('modifyadmin',$admin);

        if($request->priority >= 1 && $request->priority <= 3){
            DB::table('priority_history')
                ->insert([
                    'uid' => $admin->id,
                    'prev_priority' => $admin->priority,
                    'now_priority' => $request->priority,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            $admin->priority = $request->priority;
            $admin->save();
            session()->flash('success','修改权限成功！');
        }
        else{
            session()->flash('danger','请输入正确的权限值！');
        }
        return redirect(route('admins.show'));
    }
}
