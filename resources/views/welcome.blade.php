<x-layout>
    <h1>Welcome to homepage</h1>

    <hr>

    @if(session('success'))
        <p style="color: green; font-weight: bold;">{{ session('success') }}</p>
    @endif

    @if(session('error'))
        <p style="color: red; font-weight: bold;">{{ session('error') }}</p>
    @endif

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="/submit-email" method="POST">
        @csrf
        <label for="email">Enter Email:</label>
        <input type="text" name="email" id="email" placeholder="example@mail.com">
        <button type="submit">Add to List</button>
    </form>

    <hr>

    <h3>Saved Emails:</h3>
    <ul>
        @if(session('emails'))
            @foreach(session('emails') as $email)
                <li>{{ $email }}</li>
            @endforeach
        @else
            <li>No emails added yet.</li>
        @endif
    </ul>
    <h3>Saved Emails:</h3>
<ul>
    @if(session('emails') && count(session('emails')) > 0)
        @foreach(session('emails') as $index => $email)
            <li style="margin-bottom: 10px;">
                {{ $email }} 
                
                <form action="/delete-email/{{ $index }}" method="POST" style="display:inline; margin-left: 10px;">
                    @csrf
                    <button type="submit" style="color: white; background-color: red; border: none; cursor: pointer;">
                        Delete
                    </button>
                </form>
            </li>
        @endforeach
    @else
        <li>No emails added yet.</li>
    @endif
</ul>
</x-layout>