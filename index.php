<?php
/*
 OpenSimulator Web Login
    Copyright (C) 2019 Neverworld Grid and its Contributors

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <https://www.gnu.org/licenses/>.
*/
require"config.php";




?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Neverworld Grid Login</title>
  <link rel="stylesheet" href="style.css">
  <script type="text/javascript">
    function submitForm(myfield,e) {
        var keycode; if (window.event) keycode = window.event.keyCode; else if (e) keycode = e.which; else return true; if (keycode == 13) { myfield.form.submit(); return false; } else return true;
    }
  </script>
</head>
<body>
  <div class="page-wrap">
    <div class="content">
        <a href="https://www.neverworldgrid.com"><img class="logo" src="logo.jpg" alt="Neverworld Logo"></a>
        
        
          <form method="POST" action="handler.php">
            <input name="return" value="<?php echo $_REQUEST['return'];?>" type="hidden"/>
            <div class="row">
              <label for="first" class="visuallyHidden"></label>
              <input type="text" id="first" placeholder="Firstname" name="first" autocomplete="yes"/>
            </div>
<div class="row">
              <label for="last" class="visuallyHidden"></label>
              <input type="text" id="last" placeholder="Last Name" name="last" autocomplete="yes"/>
            </div>

            <div class="row">
              <label for="password" class="visuallHidden"></label>
              <input type="password" id="password" placeholder="Password" name="password" autocomplete="yes" onKeyPress="return submitForm(this, event;" />
            </div>
            <div class="row">
              <input type="checkbox" id="remember" class="checkbox" name="remember_me">
              <label for="remember" class="label">Remember me</label>
              <a href="https://secondlife.com/my/account/request.php" class="forgot">Forgot your login?</a>
            </div>
            <div class="row last">
              <button type="submit" class="login" id="login">LOGIN</button>
              <a href="join" class="join" id="join"><span>JOIN NOW</span></a>
            </div>
          </form>
        
    </div>
  </div>
  <footer class="footer">
    <ul class="footer_links">
      <li>
        <a target="_blank" href="http://www.neverworldgrid.com">Neverworld Grid</a>
      </li>
         <li>
        <span class="copyright">&copy; 2019 Neverworld Grid, All Rights Reserved</a></span>
      </li>
    </ul>
  </footer>
</body>
</html>