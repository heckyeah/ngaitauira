<!-- resources/views/auth/register.blade.php -->

<form method="POST" action="/page/2">
    {!! csrf_field() !!}

    <div>
        Content
        <textarea name="content" id="content" cols="30" rows="10">{{ old('content') }}</textarea>
    </div>

    <div>
        <button type="submit">Register</button>
    </div>
</form>