			<hr>
		</main> <!-- /container -->

		<footer class="container">
			<?php	
				$d = new DateTime("now");
			?>
			<p>&copy;Enrico - Márcio <?php echo $d -> format("Y")?></p>
		</footer>

		<script src="<?php echo BASEURL; ?>js/jquery-3.6.0.min.js"></script>
		<script src="<?php echo BASEURL; ?>js/popper.min.js"></script>
		<script src="<?php echo BASEURL; ?>js/bootstrap/bootstrap.min.js"></script>
		<script src="<?php echo BASEURL; ?>js/awesome/all.min.js"></script>
		<script src="<?php echo BASEURL; ?>js/main.js"></script>
	</body>
</html>