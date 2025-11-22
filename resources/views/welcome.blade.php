<h1>Hello World</h1>

<a href="{{ route('feature') }}">Klik saya untuk pindah ke halaman fitur</a>

<h3>Data User</h3>
<ul>
    @foreach ($users as $user)
    <a href="{{ route('users.show', $user->id) }}">
        <li>{{ $user->name }}</li>
    </a>
    @endforeach
</ul>