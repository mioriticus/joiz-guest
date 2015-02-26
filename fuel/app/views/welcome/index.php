<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Joiz - Guest mode</title>
    <?php echo Asset::css('bootstrap.css'); ?>
    <?php echo Asset::css('joiz-guest.css'); ?>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-offset-4 col-md-4 text-center">
          <h1 class="h1">Joiz</h1>
          <br>
          <form method="post">
            <?php if ($this->data['guestMode']== 'true') { ?>
              <h3>Guest mode is enabled</h3>
              <input type="submit" class="btn btn-block btn-lg btn-danger"
                     name="disableGuestMode" value="Disable guest mode">
                   <?php } else { ?>
              <h3>Guest mode is disabled</h3>
              <input type="submit" class="btn btn-block btn-lg btn-success"
                     name="enableGuestMode" value="Enable guest mode">
                   <?php } ?>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
