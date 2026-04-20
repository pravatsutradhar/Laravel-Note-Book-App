<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    // সব নোট দেখাবে
    public function index()
    {
        // $notes = Note::latest()->get();
        $notes = Note::latest()->paginate(9); // পেজিনেশন সহ নোট দেখাবে
        return view('notes.index', compact('notes'));
    }

    // নতুন নোট তৈরি করার ফর্ম দেখাবে
    public function create()
    {
        return view('notes.create');
    }

    // নতুন নোট ডাটাবেসে সংরক্ষণ করবে
    public function store(Request $request)
    {
       $request->validate([
            'title' => 'required|min:3|max:255',
            'body'  => 'required|min:5',
            'color' => 'required|in:yellow,blue,green,pink'
        ]);

        Note::create($request->only('title', 'body', 'color'));

        return redirect()->route('notes.index')
                         ->with('success', 'নোট তৈরি হয়েছে!');
    }

     // একটি নোট বিস্তারিত দেখাবে
    public function show(Note $note)
    {
        return view('notes.show', compact('note'));
    }


    // এডিট ফর্ম দেখাবে
    public function edit(Note $note)
    {
        return view('notes.edit', compact('note'));
    }


    // এডিট করা নোট আপডেট করবে
    public function update(Request $request, Note $note)
    {
        $request->validate([
            'title' => 'required|min:3|max:255',
            'body'  => 'required|min:5',
            'color' => 'required|in:yellow,blue,green,pink'
        ]);

        $note->update($request->only('title', 'body', 'color'));

        return redirect()->route('notes.index')
                         ->with('success', 'নোট আপডেট হয়েছে!');
    }
   
}
