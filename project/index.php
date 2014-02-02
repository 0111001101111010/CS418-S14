<?php include 'include/header.php';?>
<?php include 'include/nav.php';?>
<?php include 'include/connect_database.php';?>
    <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
        <h1>Hello, world!</h1>
        <p>This is a template for a simple marketing or informational website. It includes a large callout called the hero unit and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
        <p><a href="#" class="btn btn-primary btn-large">Learn more &raquo;</a></p>
      </div>
<?php 
for ($i=0; $i < 10; $i++) { 
	# code...
	echo '<p>Food Item'.$i.'</p>';
}
?>

<?php include 'include/footer.php'; ?>
</body>
<p> built by stanley zheng and lookmai rattana </p>
</html>

