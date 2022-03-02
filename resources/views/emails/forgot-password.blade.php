<body>
    <h3>Here is your Passimage. Please use it for future Logins</h3>
    <a download="password.{{substr(strrchr($imageLink, '.'), 1);}}" href="http://127.0.0.1:8000/users/{{$imageLink}}" title="User PassImage">
        Download ImagePass Here!
    </a>
</body>