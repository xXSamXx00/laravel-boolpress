<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h1>You have a new message</h1>

        <dl>
            <dd>Name: {{ $contact['name'] }}</dd>
            <dd>Email: {{ $contact['email'] }}</dd>
        </dl>
        <div class="message">
            <p>
                {{ $contact['message'] }}
            </p>
        </div>
    </div>
</body>

</html>
