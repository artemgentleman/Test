@extends ("main.index")

@section('header')
    <h1>Tasks</h1>
@endsection

@section('content')
    <div class="w-full max-w-md">
        <h1 class="text-xl mb-4">Create Task</h1>

        <form method="POST" action="/tasks" class="flex flex-col gap-3">
            @csrf

            <input
                type="text"
                name="title"
                placeholder="Title"
                value="{{ old('title') }}"
                class="border p-2 rounded"
            >
            @error('title')
            <div class="text-red-500">{{ $message }}</div>
            @enderror

            <textarea
                name="description"
                placeholder="Description"
                class="border p-2 rounded"
            >{{ old('description') }}</textarea>
            @error('description')
            <div class="text-red-500">{{ $message }}</div>
            @enderror

            <select name="status" class="border p-2 rounded">
                <option value="">Выберите статус</option>
                <option value="Новая">Новая</option>
                <option value="В работе">В работе</option>
                <option value="Выполнена">Выполнена</option>
            </select>
            @error('status')
            <div class="text-red-500">{{ $message }}</div>
            @enderror

            <button class="bg-black text-white p-2 rounded">
                Create
            </button>
        </form>
    </div>

@endsection
