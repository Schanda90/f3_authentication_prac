<?php echo $this->render(('app/views/header.html'),NULL,get_defined_vars(),0); ?>
<div class="container">
    <h1>Signup</h1>
    <form action="/signup" method="POST">
        <input type="text" name="name" placeholder="name" required>
        <input type="text" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <!-- <input type="hidden" name="csrf_token" value="<?= ($SESSION['csrf']) ?>"> -->
        <button type="submit">Signup</button>
    </form>

    <p>
        <?php if ($error): ?>
            <p><?= ($error) ?></p>
        <?php endif; ?>
    </p>
</div>
<br/>
<?php echo $this->render(('app/views/footer.html'),NULL,get_defined_vars(),0); ?>
