{{-- <!DOCTYPE html>
<html>

<head>
    <title>Contact Form Submission</title>
</head>

<body>
    <p><strong>Name:</strong> {{ $name }}</p>
    <p><strong>Email:</strong> {{ $email }}</p>
    <p><strong>Message:</strong> {{ $TextMsg }}</p>
    <p><strong>Phone:</strong> {{ $phone }}</p>
    <p><strong>Country:</strong> {{ $country }}</p>
</body>

</html> --}}

<!DOCTYPE html>
<html>
<head>
    <title>Contact Form Submission</title>
</head>
<body>
    <p><strong>Name:</strong> {{ $emailData['name'] }}</p>
    <p><strong>Email:</strong> {{ $emailData['recipient'] }}</p>
    <p><strong>Message:</strong> {{ $emailData['message'] }}</p>
    <p><strong>Phone:</strong> {{ $emailData['phone'] }}</p>
    <p><strong>Country:</strong> {{ $emailData['country'] }}</p>
</body>
</html>


