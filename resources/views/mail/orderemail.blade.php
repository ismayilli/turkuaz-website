<!DOCTYPE html>
<html>
<body>
<h1>New Order from Turkuaz.az</h1>
<p>Buyer Name: {{ $request->name }}</p>
<p>Buyer Number: {{ $request->mobile }}</p>
<p>Buyer Address: {{ $request->delivery }}</p>
<p>Product: {{ $request->product." (".$request->quantity." piece)" }}</p>
</body>
</html>