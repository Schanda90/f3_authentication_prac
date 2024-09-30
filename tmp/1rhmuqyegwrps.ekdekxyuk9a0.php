

<?php echo $this->render(('app/views/header.html'),NULL,get_defined_vars(),0); ?>
<div class="container">
    <h1>Welcome to Your Dashboard</h1>
    <p>You are logged in!</p>
    <a href="/login">Logout</a>
</div>
<br/>
<?php echo $this->render(('app/views/footer.html'),NULL,get_defined_vars(),0); ?>
