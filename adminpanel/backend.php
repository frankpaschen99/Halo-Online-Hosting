<?php
require_once("SSHWrapper");

$ssh = new SSHWrapper("localhost", "22", "19:ce:ad:e5:9a:3f:30:b1:85:31:95:68:bb:ab:58:b5",
						"frank@frank-VirtualBox", "/home/.ssh/id_rsa.pub", "/home/.ssh/id_rsa");

function mkdir_new_user($username) {
	// Create and enter new directory on the vm
	$ssh->exec("mkdir /home/$username && cd /home/$username");
}
?>