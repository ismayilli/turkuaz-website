<!DOCTYPE html>
<html>
<body>
    <h1>There is new message from Turkuaz.az Contact Form</h1>
    <p>Sender Name: {{ $request->name }}</p>
    <p>Sender Email: {{ $request->email }}</p>
    <p>Sender Number: {{ $request->mobile }}</p>
    <p>Message: {{ $request->message }}</p>
</body>
</html>