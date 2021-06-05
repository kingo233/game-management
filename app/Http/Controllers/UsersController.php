<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Mail;
use Auth;
use DB;
class UsersController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth', [
            'except' => ['create', 'store', 'confirmEmail']
        ]);
        $this->middleware('guest', [
            'only' => ['create']
        ]);
        $this->middleware('throttle:10,60', [
            'only' => ['store']
        ]);
    }
    public function deal_complain(User $user,Request $request){
        $nowuser = Auth::user();
        $this->authorize('index',$nowuser);
        if($request->cancel == "cancel"){
            $user->is_banned = false;
            $user->save();
            DB::table('banned_history')
                ->where('id',$request->id)
                ->update([
                    'result' => '解除封禁'
                ]);
            session()->flash('success','成功处理！');
            return redirect(route('users.complain_table',$nowuser));
        }
        else if($request->cancel == "remain"){
            DB::table('banned_history')
                ->where('id',$request->id)
                ->update([
                    'result' => '保留封禁'
                ]);
            session()->flash('success','成功处理！');
            return redirect(route('users.complain_table',$nowuser));
        }
        else{
            session()->flash('error','请选择处理结果！');
            return redirect(route('users.complain_table',$nowuser));
        }
    }
    public function complain_table(User $user){
        $nowuser = Auth::user();
        $this->authorize('index',$nowuser);
        $complains = DB::table('banned_history')
                        ->where([
                            ['complaint','!=',''],
                            ['result','']
                        ])
                        ->paginate(10);
        return view('users.complain_table',compact(['user','complains']));
        
    }
    public function complain(User $user,Request $request){
        $ban_record = DB::table('banned_history')
                        ->where('uid',$user->id)
                        ->orderBy('created_at','desc')
                        ->first();
        DB::table('banned_history')
            ->where([
                ['uid',$user->id],
                ['id',$ban_record->id]
            ])
            ->update([
                'complaint' => $request->complaint,
                'result' => ''
                ]);
        session()->flash('success','成功提交申诉！');
        return redirect(route('users.show',$user));
    }
    public function show_complain(User $user){
        if($user->is_banned == false){
            session()->flash('info','您的账号正常，无需申诉');
            return redirect(route('users.show',$user));
        }
        $ban_record = DB::table('banned_history')
                        ->where('uid',$user->id)
                        ->orderBy('created_at','desc')
                        ->first();
        return view('users.complain',compact(['user','ban_record']));
    }
    public function ban(User $user,Request $request){
        $nowuser = Auth::user();
        $this->authorize('index',$nowuser);
        $user->is_banned = true;
        $user->save();
        DB::table('banned_history')->insert([
            'uid' => $user->id,
            'reason' => $request->reason,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        session()->flash('success','封禁成功！');
        return redirect(route('users.show',$nowuser));
    }
    public function ban_all(User $user){
        $users = User::paginate(10);
        $nowuser = Auth::user();
        $this->authorize('index',$nowuser);
        return view('users.ban_all',compact(['user','users']));
    }
    public function showall(User $user){
        $users = User::paginate(10);
        $nowuser = Auth::user();
        $this->authorize('index',$nowuser);
        return view('users.modify_all',compact(['user','users']));
    }
    public function charge_history(User $user){
        $data = DB::table('user_charges')->where('uid',$user->id)->orderBy('created_at', 'desc')->paginate(10);
        return view('users.charge_history',compact(['data','user']));
    }
    public function showcharge(User $user){
        return view('users.showcharge',compact('user'));
    }
    public function charge(User $user,Request $request){
        if($request->money >= 0){
            DB::table('user_charges')->insert([
                'uid' => $user->id,
                'money' => $request->money, 
                'created_at' => now(),
                'updated_at' => now()
            ]);
            $user->credit += $request->money;
            $user->save();
            session()->flash('success','充值成功！');
            return redirect(route('users.show',$user));
        }
        else{
            session()->flash('danger','金额必须大于等于0！');
            return redirect()->back()->withInput();
        }
    }
    public function showdie(User $user){
        $this->authorize('selfdie', $user);
        return view('users.confirmdie',compact('user'));
    }
    public function selfdie(User $user,Request $request){
        $this->authorize('selfdie', $user);
        $credentials = $this->validate($request, [
            'password' => 'confirmed|min:6'
        ]);
        
        $user->delete();
        session()->flash('success', '成功删除用户！');
        return redirect('/');

    }
    public function destroy(User $user)
    {
        $this->authorize('destroy', $user);
        $user->delete();
        session()->flash('success', '成功删除用户！');
        return back();
    }
    public function index()
    {
        $cuser = Auth::user();
        $this->authorize('index',$cuser);
        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }
    public function edit(User $user)
    {
        $this->authorize('update', $user);
        return view('users.edit', compact('user'));
    }
    public function show(User $user){
        $this->authorize('update', $user);
        return view('users.show',compact('user'));
    }
    public function create(){
        return view('users.create');
    }
    public function update(User $user, Request $request)
    {
        $this->authorize('update', $user);
        $this->validate($request, [
            'name' => 'required|max:50',
            'password' => 'nullable|confirmed|min:6'
        ]);

        $data = [];
        $data['name'] = $request->name;
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }
        $user->update($data);

        session()->flash('success', '个人资料更新成功！');

        return redirect()->route('users.show', $user);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:users|max:50',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6|max:255'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $this->sendEmailConfirmationTo($user);
        session()->flash('success', '验证邮件已发送到你的注册邮箱上，请注意查收。');
        return redirect('/');
    }
    protected function sendEmailConfirmationTo($user)
    {
        $view = 'emails.confirm';
        $data = compact('user');
        $to = $user->email;
        $subject = "感谢注册 网游管理系统 应用！请确认你的邮箱。";

        Mail::send($view, $data, function ($message) use ($to, $subject) {
            $message->to($to)->subject($subject);
        });
    }
    public function confirmEmail($token){
        $user = User::where('activation_token', $token)->firstOrFail();

        $user->activated = true;
        $user->activation_token = null;
        $user->save();

        Auth::login($user);
        session()->flash('success', '恭喜你，激活成功！');
        return redirect()->route('users.show', [$user]);
    }
    
}
