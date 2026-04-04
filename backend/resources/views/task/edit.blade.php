@extends("main.index")

@section('content')
    <form method="POST" action="/tasks/{{ $task->id }}">
        @csrf
        @method('PUT')

        <input
            type="text"
            name="title"
            value="{{ $task->title }}"
            class="border p-2 rounded w-full mb-2"
        >

        <textarea
            name="description"
            class="border p-2 rounded w-full mb-2"
        >{{ $task->description }}</textarea>

        <select name="status" class="border p-2 rounded w-full mb-2">
            <option value="Новая" {{ $task->status == 'Новая' ? 'selected' : '' }}>Новая</option>
            <option value="В работе" {{ $task->status == 'В работе' ? 'selected' : '' }}>В работе</option>
            <option value="Выполнена" {{ $task->status == 'Выполнена' ? 'selected' : '' }}>Выполнена</option>
        </select>

        <button class="bg-green-500 text-white p-2 rounded">
            Сохранить
        </button>
    </form>
@endsection
