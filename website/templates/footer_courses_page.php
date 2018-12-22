<?php $keyword = (isset($_GET['keyword']))?$_GET['keyword']:""; ?>
<?php $x =false?>
<?php $key = (isset($_GET['key']))?$_GET['key']:""; ?>
<?php $max = (isset($_GET['max']))?$_GET['max']:""; ?>
<?php $year = (isset($_GET['year']))?$_GET['year']:""; ?>

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
            <a class="nav-link" href="index.php">HOME <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="student_page.php">STUDENTS</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link disabled" href="courses_page.php">COURSES</a>
          </li>
          <li class="nav-item">
              <a class="nav-link disabled" href="grades_page.php">GRADES</a>
          </li>
        </ul>
        <form class="form-inline mt-2 mt-md-0" action="courses_page.php" method="get">
        <input class="form-control mr-sm-2" placeholder="Search" aria-label="Search" type="text" name="keyword" value="<?=$keyword?>">&nbsp;
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Search" >Search</button>
        </form>
      </div>
    </nav>
  </header>

  <!-- Begin page content -->
  <main role="main" class="container">
  <h2>Courses</h2>
    <p>  </p>
	<table class="table">
		<thead>
			<tr>
			<th scope="col">id</th>
			<th scope="col">Name</th>
            <th scope="col">Max Degree</th>
            <th scope="col">Study Year</th>
			</tr>
		</thead>
			<?php
        if($key != NULL)
        {
          if($max !=NULL && $year !=NULL)
          {
            $x=false;
            course::add($key,$max,$year);
          }
          else{
              $x=true;
          }
        }
        else
        {
          $x=false;
        }
				$courses = course::all($keyword);
				foreach ($courses as $course) {
				?>
			<tbody>
				<tr> <td><?=$course->id?></td> <td><?=$course->name?></td>
                <td><?=$course->max_degree?></td>
                <td><?=$course->study_year?></td> 
                </tr>
			</tbody>
				<?php
				}
			?>
	</table>
  <form class="form-inline mt-2 mt-md-0" action="courses_page.php" method="get">
          <input class="form-control mr-sm-2" placeholder="course name" aria-label="course name" type="text" name="key" value="<?=NULL?>">&nbsp;
          <input class="form-control mr-sm-2" placeholder="max degree" aria-label="max degree" type="text" name="max" value="<?=NULL?>">&nbsp;
          <input class="form-control mr-sm-2"placeholder="study year" aria-label="study year" type="text" name="year" value="<?=NULL?>">&nbsp;
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit" value="add course" >Add course</button>
          <?php if( $x ) {?>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" value="miss" >Missing Data </button> 
          <?php } ?>  
  </form>
  </main>
  <footer class="footer">
    <div class="container">
      <span class="text-muted">COPYRIGHTS 2018 , THE CLUTCH TEAM .</span>
    </div>
  </footer>
</body>
</html>

