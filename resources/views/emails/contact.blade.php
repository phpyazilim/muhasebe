<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İletişim Formu</title>
</head>
<body>
<h2>İletişim Formu</h2>
<p>Web sitesinden iletişim formu mesajı var :</p>

<ul>
    <li><strong>Name:</strong> {{ $formData['isim'] }}</li>
    <li><strong>Email:</strong> {{ $formData['email'] }}</li>
    <li><strong>Subject:</strong> {{ $formData['konu'] }}</li>
    <li><strong>Message:</strong> {{ $formData['mesaj'] }}</li>
</ul>

<p>     </p>
</body>
</html>
