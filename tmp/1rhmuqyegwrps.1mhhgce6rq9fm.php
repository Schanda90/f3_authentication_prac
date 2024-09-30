<?php echo $this->render(('app/views/header.html'),NULL,get_defined_vars(),0); ?>
<div class="container">
    <h1>Login</h1>
    <form action="/login" method="POST">
        <input type="text" name="email" placeholder="email" required>
        <input type="password" name="password" placeholder="Password" required>
        <!-- <input type="hidden" name="csrf_token" value="<?= ($SESSION['csrf']) ?>"> -->
        <button type="submit">Login</button>
    </form>
    <p>Not registered?
        <a href="/signup">Create an account</a>
        </p>
    <p>
        <?php if ($error): ?>
            <p><?= ($error) ?></p>
        <?php endif; ?>
    </p>
</div>
<?php echo $this->render(('app/views/footer.html'),NULL,get_defined_vars(),0); ?>
