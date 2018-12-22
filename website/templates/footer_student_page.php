<?php $keyword = (isset($_GET['keyword']))?$_GET['keyword']:""; ?>
<?php $key = (isset($_GET['key']))?$_GET['key']:""; ?>
    <header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="index.php">SIS</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">HOME</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="student_page.php">STUDENTS </a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="courses_page.php">COURSES</a>
          </li>
          <li class="nav-item">
              <a class="nav-link disabled" href="grades_page.php">GRADES</a>
          </li>
        </ul>
        <form class="form-inline mt-2 mt-md-0" action="student_page.php" method="get">
          <input class="form-control mr-sm-2" placeholder="Search" aria-label="Search" type="text" name="keyword" value="<?=$keyword?>">&nbsp;
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Search" >Search</button>
        </form>
      </div>
    </nav>
  </header>
  <!-- Begin page content -->
  <main role="main" class="container">
  	<h2>Students</h2>
    <p>  </p>
	<table class="table">
		<thead>
			<tr>
			<th scope="col">id</th>
			<th scope="col">Name</th>
			</tr>
		</thead>
			<?php
       if($key != NULL)
       {
         student::add($key);
         $key=NULL;
       }
				$students = Student::all($keyword);
				foreach ($students as $student) {
				?>
			<tbody>
				<tr> <td><?=$student->id?></td> <td><?=$student->name?></td>
        <td>
             <a href="delete_student.php?id=<?=$student->id?>">delete</a>
        </td>
         </tr>
			</tbody>
				<?php
			}
			?>
	</table>
  <form class="form-inline mt-2 mt-md-0" action="student_page.php" method="get">
          <input class="form-control mr-sm-2" placeholder="student name"  aria-label="student name" type="text" name="key" value="<?=NULL?>">&nbsp;
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit" value="add student" >Add student</button>
  </form>
  </main>
  <footer class="footer">
    <div class="container">
      <span class="text-muted">COPYRIGHTS 2018 , THE CLUTCH TEAM .</span>
    </div>
  </footer>
</body>
</html>

