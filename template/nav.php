</head>
<body>
  <nav>
    <ul>
      <li><a id="home" href="home.php">Home</a></li>
      <li><a id="search" href="search.php">Search Poll</a></li>
      <li><a id="list" href="list.php">List Polls</a></li>
      <?if(isset($_SESSION['username'])) {
        echo '<li><a id="my_polls" href="myPolls.php">My Polls</a></li>';
        echo '<li><a id="new_poll" href="createPoll.php">Create Poll</a></li>';
        echo '<li><a id="sign_out" href="logout.php">Sign Out</a></li>';
      }else{
        echo '<li><a id="sign_in" href="login.php">Sign In</a></li>';
        echo '<li><a id="sign_up" href="register.php">Sign Up</a></li>';
      }
      ?>
    </ul>
  </nav>
