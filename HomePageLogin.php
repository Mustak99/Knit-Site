
<div class="nav-item dropdown" style="display: <?php if (isset($_SESSION["name"] )) { echo "block";} else { echo "none";}?>">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><?php if(isset($_SESSION["name"])) {echo$_SESSION["name"]."  ";} ?></a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="Login/logout.php" class="dropdown-item">Logout</a>
                                    <a href="updateProfile.php" class="dropdown-item" style="display: <?php if (isset($_SESSION["adminId"])) { if (isset($_SESSION["adminId"])) { echo "none"; } else { echo "block";}} else { echo "none";}  ?>">Profile</a>
                                </div>
                            </div>
