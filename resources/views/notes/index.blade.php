@extends('layouts.app')

@section('content')

<style>
    .page-title {
        font-size: 26px;
        color: #2c3e50;
        margin-bottom: 25px;
    }

    .notes-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
        gap: 20px;
    }

    .note-card {
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        transition: transform 0.2s;
        cursor: pointer;
    }

    .note-card:hover { transform: translateY(-4px); }

    .note-card.yellow { background: #fff9c4; border-top: 4px solid #f1c40f; }
    .note-card.blue   { background: #e3f2fd; border-top: 4px solid #2196F3; }
    .note-card.green  { background: #e8f5e9; border-top: 4px solid #4CAF50; }
    .note-card.pink   { background: #fce4ec; border-top: 4px solid #e91e63; }

    .note-title {
        font-size: 18px;
        font-weight: bold;
        color: #2c3e50;
        margin-bottom: 10px;
    }

    .note-body {
        font-size: 14px;
        color: #555;
        line-height: 1.6;
        margin-bottom: 15px;
        /* ৩ লাইনের বেশি হলে কেটে দেবে */
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .note-date {
        font-size: 12px;
        color: #999;
        margin-bottom: 12px;
    }

    .note-actions {
        display: flex;
        gap: 8px;
    }

    .btn-view {
        padding: 6px 12px;
        background: #2c3e50;
        color: white;
        border-radius: 5px;
        text-decoration: none;
        font-size: 13px;
    }

    .btn-edit {
        padding: 6px 12px;
        background: #f39c12;
        color: white;
        border-radius: 5px;
        text-decoration: none;
        font-size: 13px;
    }

    .btn-delete {
        padding: 6px 12px;
        background: #e74c3c;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 13px;
        cursor: pointer;
    }

    .empty {
        text-align: center;
        padding: 60px;
        color: #aaa;
        font-size: 18px;
    }

    .counter {
        color: #888;
        margin-bottom: 20px;
        font-size: 14px;
    }
</style>

<h1 class="page-title">📒 আমার সব নোট</h1>

@if($notes->count() > 0)
    <p class="counter">মোট {{ $notes->count() }}টি নোট</p>
@endif




@forelse($notes as $note)
    @if($loop->first)
        <div class="notes-grid">
    @endif

   
    <div class="note-card {{ $note->color }}">
        <div class="note-title">{{ $note->title }}</div>
        <div class="note-body">{{ $note->body }}</div>
        <div class="note-date">🕐 {{ $note->created_at->diffForHumans() }}</div>
        <div class="note-actions">
            <a href="{{ route('notes.show', $note) }}" class="btn-view">👁 দেখুন</a>
            <a href="{{ route('notes.edit', $note) }}" class="btn-edit">✏️ এডিট</a>
            <form action="{{ route('notes.destroy', $note) }}" method="POST">
                @csrf @method('DELETE')
                <button
                    type="submit"
                    class="btn-delete"
                    onclick="return confirm('নোটটি মুছে ফেলবেন?')"
                >🗑️</button>
            </form>
        </div>
    </div>

    @if($loop->last)
        </div>
    @endif

@empty
    <div class="empty">
        😊 এখনো কোনো নোট নেই। উপরে "নতুন নোট" বাটন চাপুন!
    </div>
@endforelse

@endsection