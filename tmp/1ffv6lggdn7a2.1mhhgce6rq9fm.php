<?= (include('app/views/header.html'))."
" ?>
<div class="container">
    <h1>Login</h1>
    <form action="/login" method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
</div>
<?= (include('app/views/footer.html'))."
" ?>
