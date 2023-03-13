<?php if (count($errors) > 0): ?>
    <center>
        <div style='border: 0px solid red; border-radius: 20px; max-width: 80%; margin: 1em'>
            <center>
                <?php foreach ($errors as $error): ?>
                    <p style='color: red'><b>*<?php echo $error; ?></b></p>
                <?php endforeach ?>
            </center>
        </div>
    </center>
<?php endif ?>
