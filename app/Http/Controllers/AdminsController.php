<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Models\User;
use Mail;
use DB;
use Auth; 
use Illuminate\Support\Str;

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
    public function create(){
        $user = Auth::user();
        return view('admins.create',compact('user'));
    }
    public function store(Request $request){
        $this->validate($request, [
            'email' => 'required|email|max:255|min:6',
        ]);
        
        if($request->priority != '1' && $request->priority != '2'){
            session()->flash('danger','请选择正确的权限！');
            return redirect()->back()->withInput();
        }
        $user = DB::table('users')->where('email',$request->email);
        if($user->exists()){
            DB::table('priority_history')
                ->insert([
                    'uid' => $user->first()->id,
                    'prev_priority' => $user->first()->priority,
                    'now_priority' => $request->priority,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            $user->update([
                'priority' => $request->priority
            ]);
        }
        else{
            DB::table('users')
            ->insert([
                'name' => 'AdminUser',
                'email' => $request->email,
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'priority' => $request->priority,
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'activated' => true,
                'is_banned' => false,
                'credit' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $user = DB::table('users')->where('email',$request->email);
            DB::table('priority_history')
                ->insert([
                    'uid' => $user->first()->id,
                    'prev_priority' => 0,
                    'now_priority' => $request->priority,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
        }
        session()->flash('success','成功创建管理员');
        return redirect(route('admins.create'));
    }
}
