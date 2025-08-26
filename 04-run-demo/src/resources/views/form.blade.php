<x-welcome>
    <div class="flex h-screen text-xl">
        <form method="POST" action="/" id="form" class="m-auto flex flex-col gap-4 text-gray-950">
            @csrf
            <fieldset>
                <label class="cursor-pointer tracking-[1rem]">
                    <span class="text-purple-600 tracking-normal">Использовать валидацию на фронте:</span>
                    <input type="checkbox" name="do_validate" {{ empty($do_validate) ? '' : 'checked' }} 
                    class="scale-200">
                </label>
            </fieldset>
            <fieldset>
                <label>
                    Имя:
                    <input type="text" name="name" value="{{ $name ?? '' }}" size="50" autocomplete="off" autofocus 
                    class="inpout p-2 rounded-lg outline outline-gray-950">
                </label>
            </fieldset>
            <fieldset class="flex flex-row justify-center">
                <input type="submit" value="Отправить" class="p-2 rounded-lg outline outline-gray-950 bg-gray-100 cursor-pointer">
            </fieldset>
            <ul id="frontend_err" class="text-purple-600">
            </ul>
            <ul id="backend_err" class="text-red-500">
                @if ($errors->any())
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
                @endif
            </ul>
        </form>
    </div>
</x-welcome>