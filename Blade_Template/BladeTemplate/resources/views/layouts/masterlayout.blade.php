<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blade - @yield('title','Website')</title>

    <style>
        /* Basic reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Set height of html and body to 100% */
        html,
        body {
            height: 100%;
        }

        /* Wrapper takes the full height */
        #wrapper {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 20px;
        }

        nav {
            background-color: #555;
            color: white;
            text-align: center;
            padding: 10px;
        }

        nav a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
        }

        main {
            display: flex;
            flex: 1;
            /* This ensures main takes up the remaining space */
            padding: 20px;
        }

        article {
            flex: 3;
            padding: 20px;
        }

        aside {
            flex: 1;
            padding: 20px;
            background-color: #f4f4f4;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px;
            position: relative;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>

<body>
    <div id="wrapper">
        <header>
            <h1>Website</h1>
        </header>
        <nav>
            <a href="/">Home</a>
            <a href="/about">About</a>
            <a href="/post">Post</a>
        </nav>

        <main>
            <article>

                @hasSection('content')
                @yield('content')
                @else
                <h2>No content Found.</h2>

                @endif


            </article>
            <aside>

                @section('sidebar')
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="/about">About</a></li>
                    <li><a href="/post">Post</a></li>
                </ul>
                @show
            </aside>
        </main>

        <footer>
            website@copyright 2024
        </footer>
    </div>

        @stack('scripts')

</body>

</html>