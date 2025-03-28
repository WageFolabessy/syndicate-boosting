<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddLabelRequest;
use App\Http\Requests\UpdateLabelRequest;
use App\Models\Label;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class LabelController extends Controller
{
    public function index()
    {
        $labels = Label::orderBy('created_at', 'desc')->get();

        return DataTables::of($labels)
            ->addIndexColumn()
            ->editColumn('created_at', function ($label) {
                return $label->created_at
                    ? $label->created_at->locale('id')->translatedFormat('l, d F Y, H:i:s')
                    : '';
            })
            ->editColumn('updated_at', function ($label) {
                return $label->updated_at
                    ? $label->updated_at->locale('id')->translatedFormat('l, d F Y, H:i:s')
                    : '';
            })
            ->addColumn('action', function ($label) {
                return view('dashboard.pages.label.action-button')->with('label', $label);
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function create()
    {
        return view('dashboard.pages.label.add-label');
    }

    public function store(AddLabelRequest $request)
    {
        $data = $request->validated();
        Label::create($data);
        return redirect()->route('dashboard.label')->with('success', 'Label berhasil ditambahkan.');
    }

    public function show(Label $label)
    {
        return view('dashboard.pages.label.edit-label', compact('label'));
    }

    public function update(UpdateLabelRequest $request, Label $label)
    {
        $data = $request->validated();
        $label->update($data);
        return redirect()->route('dashboard.label')->with('success', 'Label berhasil diperbarui.');
    }

    public function destroy(Label $label)
    {
        $label->delete();
        return redirect()->route('dashboard.label')->with('success', 'Label berhasil dihapus.');
    }
}
