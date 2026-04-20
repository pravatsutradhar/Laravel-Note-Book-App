@extends('layouts.app')

@section('content')

<style>
    .note-card {
        max-width: 650px;
        margin: 0 auto;
        border-radius: 12px;
        padding: 35px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .note-card.yellow { background: #fff9c4; border-top: 5px solid #f1c40f; }
    .note-card.blue   { background: #e3f2fd; border-top: 5px solid #2196F3; }
    .note-card.green  { background: #e8f5e9; border-top: 5px solid #4CAF50; }
    .note-card.pink   { background: #fce4ec; border-top: 5px solid #e91e63; }

    .note-title {
        font-size: 26px;
        font-weight: bold;
        color: #2c3e50;
        margin-bottom: 15px;
    }

    .note-meta {
        font-size: 13px;
        color: #888;
        margin-bottom: 20px;
        display: flex;
        gap: 20px;
    }

    .note-body {
        font-size: 16px;
        color: #444;
        line-height: 1.8;
        white-space: pre-wrap;
        margin-bottom: 30px;
        padding: 20px;
        background: rgba(255,255,255,0.6);
        border-radius: 8px;
    }

    .note-actions {
        display: flex;
        gap: 10px;
    }

    .btn-edit {
        padding: 10px 22px;
        background: #f39c12;
        color: white;
        border-radius: 8px;
        text-decoration: none;
        font-size: 15px;
    }

    .btn-edit:hover { background: #e67e22; }

    .btn-delete {
        padding: 10px 22px;
        background: #e74c3c;
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 15px;
        cursor: pointer;
    }

    .btn-delete:hover { background: #c0392b; }

    .btn-back {
        padding: 10px 22px;
        background: #ccc;
        color: #333;
        border-radius: 8px;
        text-decoration: none;
        font-size: 15px;
    }

    .btn-back:hover { background: #bbb; }
</style>

<div class="note-card {{ $note->color }}">

    <h1 class="note-title">{{ $note->title }}</h1>

    <div class="note-meta">
        <span>🕐 তৈরি: {{ $note->created_at->format('d M Y, h:i A') }}</span>
        <span>🔄 আপডেট: {{ $note->updated_at->diffForHumans() }}</span>
    </div>

    <div class="note-body">{{ $note->body }}</div>

    <div class="note-actions">
        <a href="{{ route('notes.edit', $note) }}" class="btn-edit">✏️ এডিট করুন</a>

        <form action="{{ route('notes.destroy', $note) }}" method="POST">
            @csrf @method('DELETE')
            <button
                type="submit"
                class="btn-delete"
                onclick="return confirm('নোটটি মুছে ফেলবেন?')"
            >🗑️ মুছুন</button>
        </form>

        <a href="{{ route('notes.index') }}" class="btn-back">← সব নোট</a>
    </div>

</div>

@endsection