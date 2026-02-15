<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memo;

class MemoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $memos = Memo::all();
        return view('memo.index', compact('memos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('memo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $memos = new Memo();
        $memos->body = $request->body;
        $memos->save();

        return to_route('memo.index')->with('success', 'メモを一件登録しました');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Memo $memo)
    {
        return view('memo.edit', compact('memo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Memo $memo)
    {
        $memo->body = $request->body;
        $memo->save();

        return to_route('memo.index')->with('success', 'メモを一件編集しました');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Memo $memo)
    {
        $memo->delete();
        
        return to_route('memo.index')->with('success', 'メモを一件削除しました');
    }
}
