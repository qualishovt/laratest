@extends('layouts.app')

@section('content')
    <h1>Edit Post</h1>

    <form method="post" action="/posts/{{ $post->id }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" name="author" value="{{ old('author') ?? $post->author }}" class="form-control"
                id="author">
        </div>
        <hr>
        <div class="mb-3">
            <label for="title_en" class="form-label">Title En</label>
            <input type="text" name="en[title]" value="{{ old('en.title') ?? $post->translate('en')->title }}"
                class="form-control" id="title_en">
        </div>
        <div class="mb-3">
            <label for="content_en" class="form-label">Content En</label>
            <textarea name="en[content]" class="form-control" id="content_en"
                rows="3">{{ $post->translate('en')->content }}</textarea>
        </div>
        <hr>
        <div class="mb-3">
            <label for="title_fr" class="form-label">Title Fr</label>
            <input type="text" name="fr[title]" value="{{ old('fr.title') ?? $post->translate('fr')->title }}"
                class="form-control" id="title_fr">
        </div>
        <div class="mb-3">
            <label for="content_fr" class="form-label">Content Fr</label>
            <textarea name="fr[content]" class="form-control" id="content_fr"
                rows="3">{{ old('fr.content') ?? $post->translate('fr')->content }}</textarea>
        </div>
        <a class="btn btn-outline-secondary" href="/posts" role="button"><i class="bi bi-x-lg"></i> Back</a>
        <button type="submit" class="btn btn-primary float-end">Submit</button>
    </form>
@endsection
