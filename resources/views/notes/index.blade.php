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


    .pagination-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 8px;
    margin-top: 35px;
    flex-wrap: wrap;
}

.page-btn {
    padding: 8px 16px;
    border-radius: 6px;
    background: white;
    color: #2c3e50;
    text-decoration: none;
    font-size: 14px;
    border: 2px solid #ddd;
    transition: all 0.2s;
}

.page-btn:hover {
    background: #2c3e50;
    color: white;
    border-color: #2c3e50;
}

.page-btn.active {
    background: #2c3e50;
    color: white;
    border-color: #2c3e50;
    font-weight: bold;
}

.page-btn.disabled {
    color: #ccc;
    border-color: #eee;
    cursor: not-allowed;
}

</style>

<h1 class="page-title">📒 আমার সব নোট</h1>

{{-- @if($notes->count() > 0)
    <p class="counter">মোট {{ $notes->count() }}টি নোট</p>
@endif --}}


@if($notes->total() > 0)
    <p class="counter">
        মোট {{ $notes->total() }}টি নোট |
        পেজ {{ $notes->currentPage() }} / {{ $notes->lastPage() }}
    </p>
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

{{-- Pagination --}}
@if($notes->hasPages())
<div class="pagination-wrapper">
    {{-- আগের পেজ --}}
    @if($notes->onFirstPage())
        <span class="page-btn disabled">← আগে</span>
    @else
        <a href="{{ $notes->previousPageUrl() }}" class="page-btn">← আগে</a>
    @endif

    {{-- পেজ নম্বর --}}
    @foreach($notes->getUrlRange(1, $notes->lastPage()) as $page => $url)
        @if($page == $notes->currentPage())
            <span class="page-btn active">{{ $page }}</span>
        @else
            <a href="{{ $url }}" class="page-btn">{{ $page }}</a>
        @endif
    @endforeach

    {{-- পরের পেজ --}}
    @if($notes->hasMorePages())
        <a href="{{ $notes->nextPageUrl() }}" class="page-btn">পরে →</a>
    @else
        <span class="page-btn disabled">পরে →</span>
    @endif
</div>
@endif

@endsection