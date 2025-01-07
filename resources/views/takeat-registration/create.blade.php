<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>create association</title>
</head>
@vite(['resources/css/app.css', 'resources/js/app.js'])

<body>
{{$association->id}}
    <div class="w-full flex justify-center h-screen items-center">
        <div class="w-1/3">
            <h1 class="text-center font-semibold text-xl">Create Request </h1>
            <form action={{ route('request.store') }} method="post">
                @csrf
                <input type="hidden" name="association" value={{ $association->id }}>
                <div class="my-2">
                    <input value="{{ old('email') }}" class="p-2 px-4 w-full rounded" type="text" name="email"
                        placeholder="email">
                </div>
                <div class="my-2">
                    <select selected="{{ old('time') }}" class="p-2 px-4 w-full rounded" type="string" name="time"
                        name="" id="">
                        <option value="6">6</option>
                        <option value="12">12</option>
                    </select>
                    {{-- <input value="{{ old('time') }}" class="p-2 px-4 w-full rounded" type="string" name="time"
                        placeholder="time"> --}}
                </div>

                <div>
                    <button type="submit" class="rounded w-full bg-indigo-600 p-2 text-white">Submit</button>
                </div>
            </form>
            @error('email')
                <div class="text-red-600 mt-3 bg-red-50 p-1 rounded px-2">
                    {{ $message }}
                </div>
            @enderror
            @error('time')
                <div class="text-red-600 mt-3 bg-red-50 p-1 rounded px-2">

                    {{ $message }}

                </div>
            @enderror
        </div>
    </div>
</body>

</html>
