<?php $x =false?>
<?php $id_s = (isset($_GET['id_s']))?$_GET['id_s']:""; ?>
<?php $id_c = (isset($_GET['id_c']))?$_GET['id_c']:""; ?>
<?php $deg = (isset($_GET['deg']))?$_GET['deg']:""; ?>
    <header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="index.php">SIS</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item ">
            <a class="nav-link" href="index.php">HOME <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="student_page.php">STUDENTS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="courses_page.php">COURSES</a>
          </li>
          <li class="nav-item active">
              <a class="nav-link disabled" href="grades_page.php">GRADES</a>
          </li>
        </ul>
        </form>
      </div>
    </nav>
  </header>

  <!-- Begin page content -->
  <main role="main" class="container">
  <h2>Grades</h2>
    <p>  </p>
	<table class="table">
		<thead>
			<tr>
			<th scope="col">id</th>
			<th scope="col">Student ID</th>
            <th scope="col">Course ID</th>
            <th scope="col">Degree</th>
            <th scope="col">Date</th>
			</tr>
		</thead>
			<?php
        if($id_s != NULL)
        {
          if($id_s !=NULL && $deg !=NULL)
          {
            $x=false;
            grade::add($id_s,$id_c,$deg);
          }
          else{
              $x=true;
          }
        }
        else
        {
          $x=false;
        }
				$grades = grade::all();
				foreach ($grades as $grade) {
				?>
			<tbody>
				<tr> <td><?=$grade->id?></td> <td><?=$grade->student_id?></td>
                <td><?=$grade->course_id?></td>
                <td><?=$grade->degree?></td>
                <td><?=$grade->examine_at?></td> 
                </tr>
			</tbody>
				<?php
				}
			?>
	</table>
  <form class="form-inline mt-2 mt-md-0" action="grades_page.php" method="get">
          <input class="form-control mr-sm-2" placeholder="student id" aria-label="student id" type="text" name="id_s" value="<?=NULL?>">&nbsp;
          <input class="form-control mr-sm-2" placeholder="course id" aria-label="course id" type="text" name="id_c" value="<?=NULL?>">&nbsp;
          <input class="form-control mr-sm-2"placeholder="degree" aria-label="degree" type="text" name="deg" value="<?=NULL?>">&nbsp;
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit" value="add grade" >Add Grade Today</button>
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

