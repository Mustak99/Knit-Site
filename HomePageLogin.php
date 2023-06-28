
<div class="nav-item dropdown" style="display: <?php if (isset($_SESSION["LoginUserName"] )||isset($_SESSION["adminName"])) { echo "block";} else { echo "none";}?>">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><?php if(isset($_SESSION["LoginUserName"])) {echo$_SESSION["LoginUserName"]."  ";} ?></a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="Login/logout.php" class="dropdown-item">Logout</a>
                                    <a href="updateProfile.php" class="dropdown-item" style="display: <?php if (isset($_SESSION["LoginUserName"])) { if (isset($_SESSION["adminName"])) { echo "none"; } else { echo "block";}} else { echo "none";}  ?>">Profile</a>
                                </div>
                            </div>
