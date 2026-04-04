@extends ("main.index")

@section('header')
    <h1>Tasks</h1>
@endsection

@section('content')

    <div class="w-full max-w-md flex flex-col gap-3">

        @forelse($tasks as $task)
            <div class="border p-3 rounded">
                <a href="/tasks/show/{{ $task->id }}"
                   class="mt-3 inline-block bg-blue-500 text-white px-3 py-1 rounded">
                    {{ $task->id }}
                </a>
                <h3 class="font-bold">{{ $task->title }}</h3>
                <p>{{ $task->description }}</p>
                <span class="text-sm text-gray-500">
                    Статус: {{ $task->status }}
                </span>
                <form method="POST" action="/tasks/{{ $task->id }}" class="mt-3">
                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        class="bg-red-500 text-white px-3 py-1 rounded"
                        onclick="return confirm('Удалить задачу?')"
                    >
                        Удалить
                    </button>
                </form>
            </div>
        @empty
            <p>Задач пока нет</p>
        @endforelse
        <div class="border p-3 rounded">
            <a href="/tasks"
               class="mt-3 inline-block bg-blue-500 text-white px-3 py-1 rounded">
                Создать
            </a>
        </div>
    </div>

@endsection
