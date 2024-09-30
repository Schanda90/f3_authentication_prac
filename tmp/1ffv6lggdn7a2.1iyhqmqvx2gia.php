<?= (include('app/views/header.html'))."
" ?>
<div class="container">
    <h1>Signup</h1>
    <form action="/signup" method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Signup</button>
    </form>
</div>
<?= (include('app/views/footer.html'))."
" ?>
