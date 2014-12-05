</head>
<body>
  <div class="root">
	<div class="non_footer">
		<ul id="menu">
		<img src="img\logo.png" width="125">
		  <li><a id="home" href="home.php">Home</a></li>
		  <li><a id="search" href="search.php">Search Poll</a></li>
		  <li><a id="list" href="list.php">List Polls</a></li>
		  <?
		  session_start();
		  if(isset($_SESSION['username'])) {
			echo '<li><a id="my_polls" href="my_polls.php">My Polls</a></li>';
			echo '<li><a id="new_poll" href="create_poll.php">Create Poll</a></li>';
			echo '<li><a id="sign_out" href="process_logout.php">Sign Out</a></li>';
		  }else{
			echo '<li><a id="sign_in" href="login.php">Sign In</a></li>';
			echo '<li><a id="sign_up" href="register.php">Sign Up</a></li>';
		  }
		  ?>
		</ul>
		
		<div class="content">
				<div class="container">
					
				
