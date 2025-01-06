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
    <div class="w-full mx-auto">
        <table class="w-full min-h-32 text-gray-700">
            <tr>
                <td>#</td>

                <td>name</td>

                <td>action</td>
            </tr>
            @foreach ($associations as $association)
                @if (!$association->state)
                    <tr>

                        <td>{{ $association->id }}</td>
                        <td>{{ $association->name }}</td>

                        <td>
                            <div class="flex items-center">

                                <form action={{ route('association.approve.status', $association->id) }} method="post">
                                    @method('PATCH')
                                    @csrf
                                    <button class="bg-green-600 p-1 me-2 px-3 rounded text-sm text-white">Update</button>
                                </form>

                                <form action={{ route('association.rejecte.status', $association->id) }} method="post">
                                    @method('PATCH')
                                    @csrf
                                    <button class="bg-red-600 p-1 px-3 rounded text-sm text-white">Rejected</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endif
            @endforeach
        </table>
    </div>


</body>

</html>
