<?php
include '../inc/connect.php';
include 'student_navbar.php';
?>
<head>
    <title>PDFs</title>
</head>
<body class="books">
<div class="container">
    <div class="srch">
        
    </div>

    <h3 style="text-align: center; font-weight: bold;">Available PDFs</h3>
    <?php
        
                echo "<table class='table table-bordered table-hover' style='width:99%'>";
                    echo "<tr style='background-color: #61c6e4;'>";
                        echo "<th>"; echo "Serial no"; echo "</th>";
                        echo "<th>"; echo "Book name"; echo "</th>";
                        echo "<th>"; echo "Author's name"; echo "</th>";
                        echo "<th>"; echo "Edition"; echo "</th>";
                        echo "<th>"; echo "Department"; echo "</th>";
						echo "<th>"; echo "PDF"; echo "</th>";
                    echo "</tr>";
               
        
    ?>
	<table style="width:100%">
  
  <tr>
    <td colspan="2">1</td>
	<td>Computer Graphics</td>
    <td>Foley, Van Dam, Feiner, Hughes</td>
	 <td>2nd</td>
	 <td>CSE</td>
	<td><a href="graphics.pdf"  target="_blank">visit</a></td>
  </tr>
  <tr>
    <td colspan="2">2</td>
	<td>Computer Graphics</td>
    <td>Foley, Van Dam, Feiner, Hughes</td>
	 <td>2nd</td>
	 <td>CSE</td>
	<td><a href="graphics.pdf"  target="_blank">visit</a></td>
  </tr>
  <tr>
    <td colspan="2">3</td>
	<td>Computer Graphics</td>
    <td>Foley, Van Dam, Feiner, Hughes</td>
	 <td>2nd</td>
	 <td>CSE</td>
	<td><a href="graphics.pdf"  target="_blank">visit</a></td>
  </tr>
 <tr>
    <td colspan="2">4</td>
	<td>Computer Graphics</td>
    <td>Foley, Van Dam, Feiner, Hughes</td>
	 <td>2nd</td>
	 <td>CSE</td>
	<td><a href="graphics.pdf"  target="_blank">visit</a></td>
  </tr>
  <tr>
    <td colspan="2">5</td>
	<td>Computer Graphics</td>
    <td>Foley, Van Dam, Feiner, Hughes</td>
	 <td>2nd</td>
	 <td>CSE</td>
	<td><a href="graphics.pdf"  target="_blank">visit</a></td>
  </tr>
  <tr>
    <td colspan="2">6</td>
	<td>Computer Graphics</td>
    <td>Foley, Van Dam, Feiner, Hughes</td>
	 <td>2nd</td>
	 <td>CSE</td>
	<td><a href="graphics.pdf"  target="_blank">visit</a></td>
  </tr>
  <tr>
    <td colspan="2">7</td>
	<td>Computer Graphics</td>
    <td>Foley, Van Dam, Feiner, Hughes</td>
	 <td>2nd</td>
	 <td>CSE</td>
	<td><a href="graphics.pdf"  target="_blank">visit</a></td>
  </tr>
  <tr>
    <td colspan="2">8</td>
	<td>Computer Graphics</td>
    <td>Foley, Van Dam, Feiner, Hughes</td>
	 <td>2nd</td>
	 <td>CSE</td>
	<td><a href="graphics.pdf"  target="_blank">visit</a></td>
  </tr>
  <tr>
    <td colspan="2">9</td>
	<td>Computer Graphics</td>
    <td>Foley, Van Dam, Feiner, Hughes</td>
	 <td>2nd</td>
	 <td>CSE</td>
	<td><a href="graphics.pdf"  target="_blank">visit</a></td>
  </tr>
</table>
    </div>
    </div>
</body>
<?php include '../inc/footer.php'; ?>
