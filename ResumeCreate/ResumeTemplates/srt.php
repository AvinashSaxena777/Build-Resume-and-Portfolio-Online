<?PHP
	session_start();
    if(isset($_POST['create_pdf'])){
        require_once("tcpdf/tcpdf.php");
        $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
          $obj_pdf->SetCreator(PDF_CREATOR);  
          $obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
          $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
          $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
          $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
          $obj_pdf->SetDefaultMonospacedFont('helvetica');  
          $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
          $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
          $obj_pdf->setPrintHeader(false);  
          $obj_pdf->setPrintFooter(false);  
          $obj_pdf->SetAutoPageBreak(TRUE, 10);  
          $obj_pdf->SetFont('helvetica', '', 12);  
          $obj_pdf->AddPage(); 
          $content .= '</body>';  
          $obj_pdf->writeHTML($content);
          $obj_pdf->Output('sample.pdf', 'I'); 
    }
    if(isset($_SESSION['id'])){
    if(isset($_POST['generate'])){
?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>

	<title><?php echo $_SESSION['name']; ?> | <?php echo $_SESSION['speciality']; ?> | <?php echo $_SESSION['emailid'];?></title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />

	<meta name="keywords" content="" />
	<meta name="description" content="" />

	<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.7.0/build/reset-fonts-grids/reset-fonts-grids.css" media="all" /> 
	<link rel="stylesheet" type="text/css" href="resume.css" media="all" />

</head>
<body>

<div id="doc2" class="yui-t7">
	<div id="inner">
	
		<div id="hd">
			<div class="yui-gc">
				<div class="yui-u first">
					<h1><?PHP
						echo $_SESSION['name']
					?> </h1>
					<h2><?php echo $_SESSION['speciality']; ?></h2>
				</div>

				<div class="yui-u">
					<div class="contact-info">
						<form action="" method="post"><h3><input type="submit" name="create_pdf" value="Generate PDF"></h3></form>
						<h3><a href="mailto:<?php echo $_SESSION['emailid'];?>"><?php echo $_SESSION['emailid'];?></a></h3>
						<h3><?php echo $_SESSION['mob']; ?></h3>
					</div><!--// .contact-info -->
				</div>
			</div><!--// .yui-gc -->
		</div><!--// hd -->

		<div id="bd">
			<div id="yui-main">
				<div class="yui-b">

					<div class="yui-gf">
						<div class="yui-u first">
							<h2>Education</h2>
						</div>
						<?php if(isset($_SESSION['ed'])){
                                  for( $i=0; $i<count($_SESSION['ed']); $i++ ){?>
						<div class="yui-u">
				            <div class="<?php if($i==count($_SESSION['ed'])-1){
                                            echo("job last");}
                                        else echo("job");?>">
                                <h2><?php echo $_SESSION['ed'][$i]['ed_level'];?></h2><h3><br>
								<?php if($_SESSION['ed'][$i]['ed_degree']!=null){
                                        echo $_SESSION['ed'][$i]['ed_degree'].' in '.$_SESSION['ed'][$i]['ed_field']; }?></h3>
                                <h3><?php echo 'University/Board: '.$_SESSION['ed'][$i]['ed_boarduni'];?><br><?php
                                          echo 'Institute: '.$_SESSION['ed'][$i]['ed_institute'];?><br><?php
                                          echo 'CGPA/Percentage: '.$_SESSION['ed'][$i]['ed_grade'];?><br></h3>
								<h3>From <?php echo $_SESSION['ed'][$i]['ed_start'];?> To <?php echo $_SESSION['ed'][$i]['ed_last'];?></h3>
								<p><?php echo $_SESSION['ed'][$i]['ed_detail'];?></p>
							</div>
							
						</div>
						<?php }
                        }?>
					</div><!--// .yui-gf -->
                    
                    
                    <div class="yui-gf">
						<div class="yui-u first">
							<h2>Experience</h2>
						</div>
						<?php if(isset($_SESSION['exp'])){
                                  for( $i=0; $i<count($_SESSION['exp']); $i++ ){?>
						<div class="yui-u">
				            <div class="<?php if($i==count($_SESSION['exp'])-1){
                                            echo("job last");}
                                        else echo("job");?>">
								<h2><?php echo $_SESSION['exp'][$i]['exp_organ'];?></h2>
								<h3>From <?php echo $_SESSION['exp'][$i]['exp_start'];?> To <?php echo $_SESSION['exp'][$i]['exp_end'];?></h3>
								<p><?php echo $_SESSION['exp'][$i]['exp_detail'];?></p>
							</div>
							
						</div>
						<?php }
                                 }?>
					</div>
					
					<div class="yui-gf">
						<div class="yui-u first">
							<h2>Skills</h2>
						</div>
						<div class="yui-u">
                            <?php if(isset($_SESSION['skill'])){
                                  foreach($_SESSION['skill'] as $skill){?>
								<div class="talent">
									<h2><?php echo $skill['skill_name'];?></h2>
									<p><?php echo $skill['skill_rating'];?> out of 10</p>
								</div>
                            <?php }}?>
						</div>
					</div>

					<div class="yui-gf last">
						<div class="yui-u first">
							<h2>Projects</h2>
						</div>
						<?php if(isset($_SESSION['project_row'])){
                                  for( $i=0; $i<count($_SESSION['project_row']); $i++ ){?>
						<div class="yui-u">
				            <div class="<?php if($i==count($_SESSION['project_row'])-1){
                                            echo("job last");}
                                        else echo("job");?>">
								<h2><?php echo $_SESSION['project_row'][$i]['project_title'];?></h2>
								<h3>Duration <?php echo $_SESSION['project_row'][$i]['project_duration'];?></h3>
								<p><?php echo $_SESSION['project_row'][$i]['project_detail'];?></p>
							</div>
							
						</div>
						<?php }
                                 }?>
					</div><!--// .yui-gf -->


				</div><!--// .yui-b -->
			</div><!--// yui-main -->
		</div><!--// bd -->

		<div id="ft">
			<p><?php echo $_SESSION['name'];?> &mdash; <a href="mailto:<?php echo $_SESSION['emailid'];?>"><?php echo $_SESSION['emailid'];?></a> &mdash; <?php echo $_SESSION['mob'];?></p>
		</div><!--// footer -->

	</div><!-- // inner -->


</div><!--// doc -->


</body>
</html>

<?php }
}else{
    header( "Location: /Complete Website/Front/index.php");
}?>