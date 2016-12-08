<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Http\Requests\UserRequest;


class UsersController extends Controller
{
    /**
     *
     * 一覧表示
     *
     */
    public function index(Request $request)
    {
        #キーワード受け取り
        $keyword = $request->input('keyword');

        //クエリ生成
        $query = User::query();

        //もしキーワードがあったら
        if(!empty($keyword))
        {
            $query->where('name','like','%'.$keyword.'%')->orWhere('mail','like','%'.$keyword.'%');
        }

        //ページネーション
        $data = $query->orderBy('created_at','desc')->paginate(10);
        return view('users.index')->with('data',$data)
                                  ->with('keyword',$keyword)
                                  ->with('message','ユーザーリスト');
    }


    /**
     *
     * 新規作成
     *
     */
    public function create()
    {
        return view('users.create')->with('message','登録するユーザーを入力してください。');
    }

    /**
     *
     * 新規保存
     *
     */
    public function store(UserRequest $request)
    {

        $user = new User();
        $user->name = $request->name;
        $user->mail = $request->mail;
        $user->gender = $request->gender;
        $user->age = $request->age;
        $user->pref = $request->pref;
        $user->birthday = $request->birthday;
        $user->tel = $request->tel;
        $user->save();

        # View表示
        $res = $request->input('name')."さんを追加しました。";
        $data = User::latest('created_at')->paginate(10);
        return redirect('/users/')->with('message',$res)->with('data',$data)->with('status','新規保存の処理完了！');
    }

    /**
     *
     * 詳細表示
     *
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show')->with('user', $user);
    }

    /**
     *
     * 編集
     *
     */
    public function edit($id)
    {
        $data = User::findOrFail($id);
        return view('users.edit')->with('message','編集フォーム')->with('data',$data);
    }

    /**
     *
     * 更新
     *
     */
    public function update(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->mail = $request->mail;
        $user->gender = $request->gender;
        $user->age = $request->age;
        $user->pref = $request->pref;
        $user->birthday = $request->birthday;
        $user->tel = $request->tel;
        $user->save();

        # View表示
        $res = $request->input('name')."さんを更新しました。";
        $data = User::latest('created_at')->paginate(10);
        return redirect('/users/')->with('message',$res)->with('data',$data)->with('status','更新処理完了！');
    }

    /**
     *
     * 削除
     *
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        # 削除処理
        # $user = User::all();
        $data = User::latest('created_at')->get();
        return redirect('/users/')->with('status', '削除処理完了！')->with('data',$data);
    }


}
