
<form action="{{ route('user.login') }}" method="POST">
    @csrf
    <input type="text" name="email">
    <input type="text" name="password">
    <button type="submit">Submit</button>
</form>

