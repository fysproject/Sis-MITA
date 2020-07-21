			<ul class="nav navbar-nav">
                <li><a href="index.mu"><i class="glyphicon glyphicon-home"></i> Home Page</a></li>
                <li><a href="index.php?view=metodologi"><i class="glyphicon glyphicon-th-list"></i> Metodologi Penelitian</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-book"></i>List Research<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="index.php?view=journaladmin">Planing</a></li>
                    <li><a href="index.php?view=users&status=editor">Implementation</a></li>
                    <li><a href="index.php?view=users&status=reviewer">Evaluasi</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-user"></i> List Users <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="index.php?view=penulis">Data Researcher</a></li>
                    <li><a href="index.php?view=users&status=editor">Data Reviewer Internal</a></li>
                    <li><a href="index.php?view=users&status=reviewer">Data Reviewer Eksternal</a></li>
                  </ul>
                </li>
            </ul>

			<ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo"Login as! <strong class='text-default'>".$_SESSION[admin]; ?></strong> <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="index.php?view=editprofile">Setting Account</a></li>
                    <li><a href="logout.php">Logout</a></li>
                  </ul>
                </li>
            </ul>