<?php
include 'Modele/achat.php';

if(isset($_GET['action']))
{
	switch ($_GET['action']){
		case 'savoirplus':
			savoirplus();
			break;
		
		case 'acheter':
			acheter();
			break;
	}
}
else
{
	include 'Vue/achat.php';
}


function savoirplus()
{
	$res_app = get_app($_GET['application']);
	$res_res = get_resssouce($_GET['application']);
	$res_com = get_commentaire($_GET['application']);
	include 'Vue/achat/detailAPP.php';
}