<?php

namespace App\Http\Controllers;

use App\Models\User;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UserRequest;
use App\Tool\ImageUploadTool;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $identifies = DB::table('user_has_identifies')
            ->join('identifies', 'user_has_identifies.identify_id', '=', 'identifies.id')
            ->where('user_has_identifies.user_id', '=', $user->id)
            ->select('identifies.name')
            ->get();

        return view('user.profile', [
            'user' => $user,
            'identifies' => $identifies,
        ]);
    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(User $user)
    {
        //验证权限
        $this->authorize('update', $user);

        $identifies = DB::table('user_has_identifies')
            ->join('identifies', 'user_has_identifies.identify_id', '=', 'identifies.id')
            ->where('user_has_identifies.user_id', '=', $user->id)
            ->select('identifies.name')
            ->get();

        return view('user.edit', [
            'user' => $user,
            'identifies' => $identifies,
        ]);
    }

    /**
     * @param UserRequest $request
     * @param ImageUploadTool $uploader
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(UserRequest $request, ImageUploadTool $uploader, User $user)
    {
        $this->authorize('update', $user);

        $data = $request->all();

        if ($request->avatar) {
            $result = $uploader->save($request->avatar, 'avatar', $user->id);
            if ($result) {
                $data['avatar'] = $result['path'];
            }
        }

        $user->update($data);

        return redirect()
            ->route('user.profile', $user->id)
            ->with('success', '个人资料更新成功！');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
