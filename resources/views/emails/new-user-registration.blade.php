<p>Hello Admin,</p>

<p>A new user has registered on your website and is waiting for approval:</p>

<ul>
    <li>Name: {{ $user->name }}</li>
    <li>Email: {{ $user->email }}</li>
    <li>Registration date: {{ $user->created_at->format('Y-m-d H:i:s') }}</li>
</ul>

<p>Please log in to the admin panel and approve or reject the user's request.</p>

<p>Best regards,</p>
<p>Your Website Team</p>
