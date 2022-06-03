@extends('layouts.app')

@section('content')
    <h1>Posts</h1>

    <a class="btn btn-success float-end" href="/posts/create" role="button"><i class="bi bi-plus-lg"></i> Add new</a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Active</th>
                <th scope="col">Author</th>
                <th scope="col">Title En</th>
                <th scope="col">Content En</th>
                <th scope="col">Title Fr</th>
                <th scope="col">Content Fr</th>
                <th scope="col" class="text-end">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>{{ $post->active ? 'Yes' : 'No' }}</td>
                    <td>{{ $post->author }}</td>
                    <td>{{ $post->translate('en')->title }}</td>
                    <td>{{ $post->translate('en')->content }}</td>
                    <td>{{ $post->translate('fr')->title }}</td>
                    <td>{{ $post->translate('fr')->content }}</td>
                    <td class="text-end">
                        <a class="btn btn-warning" href="/posts/{{ $post->id }}/edit" role="button"><i
                                class="bi bi-pencil"></i> Edit</a>
                        <form class="d-inline" action="/posts/{{ $post->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" role="button" onclick="return confirm('Delete?')">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $posts->appends(request()->input())->links() }}
    </div>
    @hook(sayHello)
@endsection

@section('qatiq')
    <h1>Qatiq!</h1>
@endsection
