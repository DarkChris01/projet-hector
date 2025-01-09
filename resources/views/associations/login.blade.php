<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
@vite(['resources/css/app.css', 'resources/js/app.js'])

<body>
    <div class="w-full flex justify-center h-screen items-center">
        <div class="w-1/3 border shadow p-6">
            <h1 class="text-center font-semibold text-xl text-gray-500 mb-4">Connectez Vous</h1>
            <form action={{ route('association.login') }} method="post" id="formulaire">
                @csrf
                <div class="my-2">
                    <input value="{{ old('email') }}" class="p-2 px-4 w-full rounded" type="text" name="email"
                        placeholder="email">
                </div>
                <div class="my-2">

                    <input value="{{ old('password') }}" class="p-2 px-4 w-full rounded" type="password" name="password"
                        placeholder="password">
                </div>
             

                <div>
                    <button type="submit" id="submit" class="rounded w-full bg-indigo-600 p-2 text-white">Connexion</button>
                </div>
            </form>
            @error('email')
                <div class="text-red-600 mt-3 bg-red-50 p-1 rounded px-2">
                    {{ $message }}
                </div>
            @enderror
            @error('password')
                <div class="text-red-600 mt-3 bg-red-50 p-1 rounded px-2">

                    {{ $message }}

                </div>
            @enderror
        </div>
    </div>

</body>

</html>
