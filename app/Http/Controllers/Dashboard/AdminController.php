<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
    public function index()
    {
        $admins = User::orderBy('updated_at', 'desc')->get();

        return DataTables::of($admins)
            ->addIndexColumn()
            ->editColumn('created_at', function ($game) {
                return $game->created_at
                    ? $game->created_at->locale('id')->translatedFormat('l, d F Y, H:i:s')
                    : '';
            })
            ->editColumn('updated_at', function ($game) {
                return $game->updated_at
                    ? $game->updated_at->locale('id')->translatedFormat('l, d F Y, H:i:s')
                    : '';
            })
            ->addColumn('action', function ($game) {
                return view('dashboard.pages.admin.action-button')->with('admins', $game);
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    public function create()
    {
        return view('dashboard.pages.admin.add-admin');
    }

    public function store(AddAdminRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);

        User::create($data);

        return redirect()->route('dashboard.admin')->with('success', 'Admin berhasil ditambahkan.');
    }

    public function show(User $admin)
    {
        if(Auth::user()->id == $admin->id)
        {
            return view('dashboard.pages.admin.profile', compact('admin'));
        }

        abort(401);
    }

    public function update(UpdateAdminRequest $request, User $admin)
    {
        $data = $request->validated();

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $admin->update($data);

        return redirect()->route('dashboard.admin.show', $admin->id)->with('success', 'Profil berhasil diperbarui.');
    }

    public function destroy(User $admin)
    {
        if(Auth::user()->id !== $admin->id)
        {
            $admin->delete();
    
            return redirect()->route('dashboard.admin')->with('success', 'Admin berhasil dihapus.');
        }
    }
}
