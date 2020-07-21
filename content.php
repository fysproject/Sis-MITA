<?php 
	if ($_GET['view']=='home' OR $_GET['view']==''){
		if (isset($_SESSION[admin])){ 
			include "admin/view_admin.php";
		}else{
			include "home/view_home.php";
		}
	}elseif($_GET['view']=='detail'){
		include "home/view_journal_detail.php";
	}elseif($_GET['view']=='pendaftaran'){
		include "pendaftaran.php";
	}elseif($_GET['view']=='login'){
		include "login.php";
	}elseif($_GET['view']=='metodologi_penelitian'){
		include "home/view_metopel.php";
	}elseif($_GET['view']=='myjournal'){
		if ($_GET[act]==''){
			include "research/my_journal.php";
		}elseif ($_GET[act]=='tambah'){
			include "research/tambah_journal.php";
		}elseif ($_GET[act]=='edit'){
			include "research/edit_journal.php";
		}elseif ($_GET[act]=='upload'){
			include "research/upload_tor.php";
		}elseif ($_GET[act]=='pilih_metopel'){
			include "research/metopel_research.php";
		}elseif ($_GET[act]=='uploadpro'){
			include "research/upload_proposal.php";
		}
	}elseif($_GET['view']=='implementasi'){
		if ($_GET[act]==''){
			include "research/implementasi.php";
		}elseif ($_GET[act]=='tambah_imp'){
			include "research/tambah_implementasi.php";
		}elseif ($_GET[act]=='editimp'){
			include "research/edit_implementasi.php";
		}elseif ($_GET[act]=='upload'){
			include "research/upload_tor.php";
		}elseif ($_GET[act]=='uploadlah'){
			include "research/upload_olahdata.php";
		}elseif ($_GET[act]=='uploadreslap'){
			include "research/upload_reslap.php";
		}elseif ($_GET[act]=='uploadreseminar'){
			include "research/upload_reseminar.php";
		}
	}elseif($_GET['view']=='evaluasi'){
		if ($_GET[act]==''){
			include "research/evaluasi.php";
		}elseif ($_GET[act]=='uploadlap'){
			include "research/upload_laporan.php";
		}elseif ($_GET[act]=='editevalap'){
			include "research/edit_evaluasi_laporan.php";
		}elseif ($_GET[act]=='editevapub'){
			include "research/edit_evaluasi_publikasi.php";
		}elseif ($_GET[act]=='uploadpublis'){
			include "research/upload_publis.php";
		}
	}elseif($_GET['view']=='listjournal'){
		if ($_GET[act]==''){
			include "reviewer/list_journal.php";
		}elseif ($_GET[act]=='uploadrev') {
			include "reviewer/tor_rev.php";
		}elseif ($_GET[act]=='uploadinstrumen') {
			include "reviewer/upload_instrumen.php";
		}
	}elseif($_GET['view']=='implementasirev'){
		if ($_GET[act]==''){
			include "reviewer/imp_review.php";
		}elseif ($_GET[act]=='uploadimpeda') {
			include "reviewer/upload_olahdata.php";
		}elseif ($_GET[act]=='uploadimlap') {
			include "reviewer/upload_laporan.php";
		}
	}elseif($_GET['view']=='listjournaleditor'){
		if ($_GET[act]=='') {
			include "editor/list_journal.php";
		}elseif ($_GET[act]=='uploadtor') {
			include "editor/upload_tor.php";
		}elseif ($_GET[act]=='edit') {
			include "editor/edit_editor.php";
		}elseif ($_GET[act]=='uploadseminarprop'){
			include "editor/upload_seminarprop.php";
		}
	}elseif($_GET['view']=='implementasieditor'){
		if ($_GET[act]=='') {
			include "editor/implementasi_editor.php";
		}elseif ($_GET[act]=='uploadtor') {
			include "editor/upload_tor.php";
		}elseif ($_GET[act]=='edit') {
			include "editor/edit_editor.php";
		}
	}elseif($_GET['view']=='evaluasieditor'){
			include "editor/evaluasi_editor.php";
	}elseif($_GET['view']=='account'){
		if ($_SESSION[level]=='dosen'){
			include "home/account.php";
		}else{
			include "home/account-users.php";
		}
	}elseif($_GET['view']=='metodologi'){
		include "admin/metopel.php";
	}elseif($_GET['view']=='jabatan'){
		include "admin/jabatan.php";
	}elseif($_GET['view']=='journaladmin'){
		if ($_GET[act]==''){
			include "admin/list_journal.php";
		}elseif ($_GET[act]=='tambah'){
			include "admin/tambah_journal.php";
		}elseif ($_GET[act]=='pilih'){
			include "admin/penilai.php"; 
		}elseif ($_GET[act]=='edit'){
			include "admin/edit_journal.php";
		}
	}elseif($_GET['view']=='penulis'){
		if ($_GET[act]==''){
			include "admin/list_penulis.php";
		}elseif ($_GET[act]=='tambah'){
			include "admin/tambah_account.php";
		}elseif ($_GET[act]=='edit'){
			include "admin/edit_account.php";
		}

	}elseif($_GET['view']=='users'){
		if ($_GET[act]==''){
			include "admin/list_users.php";
		}elseif ($_GET[act]=='tambah'){
			include "admin/tambah_users.php";
		}elseif ($_GET[act]=='edit'){
			include "admin/edit_users.php";
		}
	}elseif($_GET['view']=='editprofile'){
		include "admin/edit_profile.php";
	}
?>