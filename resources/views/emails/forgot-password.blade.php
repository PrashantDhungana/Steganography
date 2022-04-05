<body>
    <div style="text-align: center; font-weight:600;">Here is your Passimage. Please use it for future Logins</div>
    <a  style="padding:10px; background-color:rgb(31, 131, 208)"download="password.{{substr(strrchr($imageLink, '.'), 1);}}" href="http://127.0.0.1:8000/users/{{$imageLink}}" title="User PassImage">
        Download ImagePass Here!
    </a>
</body>