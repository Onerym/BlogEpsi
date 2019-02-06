<?php
$info = mysqli_query($link, 'SELECT * FROM configblog WHERE id = 1');
$titreaffichage = mysqli_fetch_assoc($info);
?>
                <footer>
                        <h4><a href="#" class="btn">Retour en haut</a></h4>
						<h4>Copyright © 2018-2019</h4>
                        <h4><I><?php echo $titreaffichage['titre']; ?></I></h4><br>
						<div id="socialbar">
							<a href="https://www.facebook.com/"><img src="images/logo-facebook-noir-et-blanc-4.png" class="social" alt="image de Facebook"></a>
							<a href="https://twitter.com/login?lang=fr"><img src="images/logo-twitter-noir.png" class="social" alt="image de Twitter"></a>
							<a href="https://www.instagram.com/accounts/login/?hl=fr"><img src="images/Instagram_icon-icons.com_66804.png" class="social" alt="image de Twitter"></a>
						</div>
		</footer>