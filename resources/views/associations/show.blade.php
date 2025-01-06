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
    @if ($association)
        <h1 class="text-center p-3 text-xl">
            Welcome to {{ $association->name }}
        </h1>
    @endif

    <main>
        <div>
            <div>
                <table class="w-3/4">
                    <tr>
                        <td>#</td>
                        <td>association</td>
                        <td>b</td>
                        <td>actions</td>
                    </tr>
                    @foreach ($associations->takeat_registration_request as $request)
                        <tr>
                            <td>{{$request->id}}</td>
                            <td>{{z}}</td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </main>

</body>

</html>
