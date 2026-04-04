@extends ("main.index")

@section('header')
    <h1>Tasks</h1>
@endsection

@section('content')

    <div class="w-full max-w-md border p-4 rounded">
        <h2 class="text-xl font-bold">{{ $task->title }}</h2>

        <p class="mt-2">{{ $task->description }}</p>

        <div class="mt-3 text-sm text-gray-500">
            Статус: {{ $task->status }}
        </div>
    </div>

    <a href="/tasks/{{ $task->id }}/edit"
       class="mt-3 inline-block bg-blue-500 text-white px-3 py-1 rounded">
        Редактировать
    </a>

@endsection
