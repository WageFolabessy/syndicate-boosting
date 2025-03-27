<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddFaqRequest;
use App\Http\Requests\UpdateFaqRequest;
use App\Models\Faq;
use Yajra\DataTables\Facades\DataTables;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::orderBy('updated_at', 'desc')->get();

        return DataTables::of($faqs)
            ->addIndexColumn()
            ->editColumn('created_at', function ($faq) {
                return $faq->created_at
                    ? $faq->created_at->locale('id')->translatedFormat('l, d F Y, H:i:s')
                    : '';
            })
            ->editColumn('updated_at', function ($faq) {
                return $faq->updated_at
                    ? $faq->updated_at->locale('id')->translatedFormat('l, d F Y, H:i:s')
                    : '';
            })
            ->addColumn('action', function ($faq) {
                return view('dashboard.pages.faq.action-button')->with('faq', $faq);
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    public function create()
    {
        return view('dashboard.pages.faq.add-faq');
    }

    public function store(AddFaqRequest $request)
    {
        $data = $request->validated();

        Faq::create($data);

        return redirect()->route('dashboard.faq')->with('success', 'FAQ berhasil ditambahkan.');
    }

    public function show(Faq $faq)
    {
        return view('dashboard.pages.faq.edit-faq', compact('faq'));
    }

    public function update(UpdateFaqRequest $request, Faq $faq)
    {
        $data = $request->validated();

        $faq->update($data);

        return redirect()->route('dashboard.faq.show', $faq->id)->with('success', 'FAQ berhasil diperbarui.');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('dashboard.faq')->with('success', 'FAQ berhasil dihapus.');
    }
}
