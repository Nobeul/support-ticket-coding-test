<!DOCTYPE html>
<html>
<head>
    <title>Support Ticket Closed</title>
</head>
<body>
    <h1>Ticket Closed</h1>
    <p>Dear {{ $ticket->user->name }},</p>
    <p>Your support ticket with the subject <strong>{{ $ticket->subject }}</strong> has been marked as closed by the admin.</p>

    <p>If you need further assistance, feel free to open a new ticket.</p>

    <p>Regards,<br>Support Team</p>
</body>
</html>
