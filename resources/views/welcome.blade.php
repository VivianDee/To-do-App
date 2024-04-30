<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>To-Do List</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


        <!-- Styles -->
        <style>

            body {
            background-color: rgb(48, 48, 48) !important;
            display: flex;
            align-items: center;
            justify-content: center;
            max-height: 100vh;
            overflow-y: hidden;
            padding-top: 30px;
            font-family: Arial, sans-serif;
            }
            .todo-app {
            width: 800px;
            height: 600px;
            border-radius: 15px;
            margin: 0px 0px;
            }
            .todo-header {
                margin-top: 0;
                color: #fff !important;
                margin-right: auto;
                display: flex;
                justify-content: center;
            }

            .input-section {
            display: flex;
            align-items: center;
            margin-top: 20px;
            height: 30px;
            }
            .input-section input[type="text"] {
            flex-grow: 1;
            padding: 16px;
            border: none;
            background-color: rgb(33, 33, 33);
            color: #fff;
            font-size: 16px;
            border-radius: 30px;
            transition: background-color 0.3s ease;
            -webkit-box-shadow: 9px 21px 30px -19px rgba(0, 0, 0, 0.63);
            -moz-box-shadow: 9px 21px 30px -19px rgba(0, 0, 0, 0.63);
            box-shadow: 9px 21px 30px -19px rgba(0, 0, 0, 0.63);
            }
            .input-section input[type="text"]::placeholder {
            color: #ddd;
            }
            .input-section input[type="text"]:focus {
            outline: none;
            background-color: #555;
            }
            .input-section button {
            margin-left: 10px;
            padding: 16px 23px;
            border: none;
            background-color: rgb(33, 33, 33);
            color: #ffffff;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            -webkit-box-shadow: 9px 21px 30px -19px rgba(0, 0, 0, 0.63);
            -moz-box-shadow: 9px 21px 30px -19px rgba(0, 0, 0, 0.63);
            box-shadow: 9px 21px 30px -19px rgba(0, 0, 0, 0.63);
            }
            .input-section button:hover {
            outline: none;
            background-color: #555;
            }
            .input-section button[type="text"]::placeholder {
            color: #ddd;
            }
            .add {
            margin-right: 10px;
            }
            .todos {
            width: 100%;
            height: 500px;
            margin-top: 50px;
            padding: 10px 5px;
            overflow-y: scroll;
            background-color: rgb(33, 33, 33);
            border-radius: 30px;
            -webkit-box-shadow: 9px 21px 30px -19px rgba(0, 0, 0, 0.63);
            -moz-box-shadow: 9px 21px 30px -19px rgba(0, 0, 0, 0.63);
            box-shadow: 9px 21px 30px -19px rgba(0, 0, 0, 0.63);
            }
            /* Style the scrollbar */
            .todos::-webkit-scrollbar {
                width: 10px; /* Width of the scrollbar */
            }

            /* Track */
            .todos::-webkit-scrollbar-track {
                background: transparent; /* Transparent background */
            }

            /* Handle */
            .todos::-webkit-scrollbar-thumb {
                background: rgba(255, 255, 255, 0.3); /* Transparent with some opacity */
                border-radius: 10px; /* Rounded corners */
            }

            /* Handle on hover */
            .todos::-webkit-scrollbar-thumb:hover {
                background: rgba(255, 255, 255, 0.5); /* Lighter background on hover */
            }
            .todo-list {
            list-style-type: none;
            padding: 0;
            margin: 0;
            }
            .todo-list li {
            display: flex;
            align-items: center;
            padding: 7px 30px;
            background-color: rgb(38 37 37);
            border-radius: 80px;
            margin-bottom: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            }
            .todo-list li span {
            margin-left: 10px;
            color: #fff;
            /* font-size: 13px */
            }
            .delete-button {
            padding: 3px;
            border-radius: 80px;
            }
            .delete-button :hover {
            outline: none;
            background-color: #555;
            }
            .todo-text {
            color: #fff !important;
            margin-right: auto;
            font-size: 16px !important;
            }
            .span-button {
            margin-left: auto;
            display: block;
            padding: 5px;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 18px !important;

            }
            .span-button:hover {
            background-color: rgb(52, 53, 53);
            border-radius: 80px;
            /* padding: 4px 6px; */
            color: 0 2px 4px rgba(0, 0, 0, 0.2) !important;
            }
            .face {
            width: 100px;
            z-index: 100;
            height: 100px;
            /* margin: auto; */
            top: 50%;
            position: absolute;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 30%;
            }
            .not-found{
            color: #fff;
            top: 60%;
            position: absolute;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 30%;
            }

        </style>
    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="todo-app">
            <h1 class="todo-header">TO-DO LIST</h1>
            <form method="post" class="input-section" action="{{ route('saveItem') }}" accept-charset="UTF-8">
                    {{ csrf_field() }}
                <input id="todoInput"  name="listItem" type="text" placeholder="Add item..." />
                <button id="addBtn" type="submit" class="add">Add</button>
            </form>
            <div class="todos">
                <ul class="todo-list">
                    @foreach($listItems as $item)
                        <li class="li">
                            <span class="todo-text">{{ $item->name }} ({{ $item->updated_at->format('d-M-Y, h:i') }})</span>
                            <span class="todo-text"></span>
                            <form method="post" action="{{ route('markComplete', $item->id) }}" accept-charset="UTF-8">
                            {{ csrf_field() }}
                                <button type="submit"  style="background-color: transparent; border: none;"> <span class="span-button"><i class="fa-solid fa-check"></i></span></button>
                            </form>
                            <form method="post" action="{{ route('delete', $item->id) }}" accept-charset="UTF-8">
                            {{ csrf_field() }}
                                <button type="submit" style="background-color: transparent; border: none;"> <span class="span-button"><i class="fa-solid fa-trash"></i></span></button>
                            </form>
                        </li>
                    @endforeach
                    @foreach($completedItems as $item)
                        <li class="li">
                            <span class="todo-text" style="text-decoration: line-through;">{{ $item->name }}</span>
                            <form method="post" action="{{ route('delete', $item->id) }}" accept-charset="UTF-8">
                            {{ csrf_field() }}
                                <button type="submit" style="background-color: transparent; border: none;"> <span class="span-button"><i class="fa-solid fa-trash"></i></span></button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>
            </div>
            
        </div>
    </body>
</html>
