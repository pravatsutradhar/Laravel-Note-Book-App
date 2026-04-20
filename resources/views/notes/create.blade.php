@extends('layouts.app')

@section('content')

<style>
    .form-card {
        background: white;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        max-width: 650px;
        margin: 0 auto;
    }

    .form-title {
        font-size: 24px;
        color: #2c3e50;
        margin-bottom: 25px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        font-size: 15px;
        color: #555;
        margin-bottom: 8px;
        font-weight: bold;
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 12px;
        border: 2px solid #ddd;
        border-radius: 8px;
        font-size: 15px;
        outline: none;
        transition: border 0.2s;
    }

    .form-group input:focus,
    .form-group textarea:focus {
        border-color: #2c3e50;
    }

    .form-group textarea {
        height: 180px;
        resize: vertical;
    }

    .color-group {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
    }

    .color-option input { display: none; }

    .color-option label {
        display: block;
        width: 45px;
        height: 45px;
        border-radius: 50%;
        cursor: pointer;
        border: 3px solid transparent;
        transition: border 0.2s;
    }

    .color-option input:checked + label {
        border-color: #2c3e50;
        transform: scale(1.15);
    }

    .color-yellow label { background: #f1c40f; }
    .color-blue   label { background: #2196F3; }
    .color-green  label { background: #4CAF50; }
    .color-pink   label { background: #e91e63; }

    .error { color: red; font-size: 13px; margin-top: 5px; }

    .form-buttons {
        display: flex;
        gap: 10px;
        margin-top: 10px;
    }

    .btn-save {
        padding: 12px 28px;
        background: #2c3e50;
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        cursor: pointer;
    }

    .btn-save:hover { background: #1a252f; }

    .btn-back {
        padding: 12px 22px;
        background: #ccc;
        color: #333;
        border-radius: 8px;
        text-decoration: none;
        font-size: 16px;
    }

    .btn-back:hover { background: #bbb; }
</style>

<div class="form-card">
    <h1 class="form-title">📝 নতুন নোট লিখুন</h1>

    <form action="{{ route('notes.store') }}" method="POST">
        @csrf

        {{-- শিরোনাম --}}
        <div class="form-group">
            <label>📌 শিরোনাম</label>
            <input
                type="text"
                name="title"
                placeholder="নোটের শিরোনাম লিখুন..."
                value="{{ old('title') }}"
                autofocus
            >
            @error('title')
                <p class="error">⚠️ {{ $message }}</p>
            @enderror
        </div>

        {{-- বিস্তারিত --}}
        <div class="form-group">
            <label>📄 বিস্তারিত</label>
            <textarea
                name="body"
                placeholder="নোটের বিস্তারিত লিখুন..."
            >{{ old('body') }}</textarea>
            @error('body')
                <p class="error">⚠️ {{ $message }}</p>
            @enderror
        </div>

        {{-- রঙ বাছাই --}}
        <div class="form-group">
            <label>🎨 রঙ বাছাই করুন</label>
            <div class="color-group">
                <div class="color-option color-yellow">
                    <input type="radio" name="color" id="yellow" value="yellow"
                        {{ old('color', 'yellow') == 'yellow' ? 'checked' : '' }}>
                    <label for="yellow" title="হলুদ"></label>
                </div>
                <div class="color-option color-blue">
                    <input type="radio" name="color" id="blue" value="blue"
                        {{ old('color') == 'blue' ? 'checked' : '' }}>
                    <label for="blue" title="নীল"></label>
                </div>
                <div class="color-option color-green">
                    <input type="radio" name="color" id="green" value="green"
                        {{ old('color') == 'green' ? 'checked' : '' }}>
                    <label for="green" title="সবুজ"></label>
                </div>
                <div class="color-option color-pink">
                    <input type="radio" name="color" id="pink" value="pink"
                        {{ old('color') == 'pink' ? 'checked' : '' }}>
                    <label for="pink" title="গোলাপি"></label>
                </div>
            </div>
            @error('color')
                <p class="error">⚠️ {{ $message }}</p>
            @enderror
        </div>

        <div class="form-buttons">
            <button type="submit" class="btn-save">💾 সেভ করুন</button>
            <a href="{{ route('notes.index') }}" class="btn-back">← ফিরে যান</a>
        </div>

    </form>
</div>

@endsection