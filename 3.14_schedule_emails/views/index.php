<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        a {
            font-size: 2rem;
        }
    </style>
</head>

<body>
    <div>
        <a href="/">Home |</a>
        <a href="/transactions">Transactions |</a>
    </div>
    <h1>Home Page</h1>
    <div>
        <form action="/upload" method="POST" enctype="multipart/form-data">
            <input type="file" name="transactions[]">
            <input type="file" name="transactions[]">
            <button type="submit">Upload</button>
        </form>
    </div>
</body>

</html>