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
    <section class="mt-10">
        <div class="w-3/4 mx-auto">
            <div class="flex justify-between items-center my-4">
                <h1 class="text-xl font-semibold">Requests</h1>
                <a href="{{ route('request.create',["association"=>$association->id]) }}">

                    <button class="bg-indigo-600 hover:bg-indigo-500 shadow rounded text-white p-1 px-3">Create new
                        request +</button>
                </a>
            </div>
            <div class="border p-2  rounded">
                <table class="w-3/4">
                    <tr>
                        <td>#</td>
                        <td>renewals</td>
                        <td>times</td>
                        <td>actions</td>
                    </tr>
                    @foreach ($association->requests as $request)
                        <tr>
                            <td>{{ $request->id }}</td>
                            <td>{{ $request->renewals ? 'true' : 'false' }}</td>
                            <td>{{ $request->time }}</td>
                            <td>
                                <div class="flex items-center">
                                    <button class="bg-green-600 me-1 p-1 px-2">action1</button>
                                    <button class="bg-red-600 me-1 p-1 px-2">action1</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </section>

</body>

</html>
