<h3>Data Artikel</h3>
<div class="row">
	<div class="col-md-9">
		<a href="<?= base_url('crud/artikel_add') ?>" class="btn btn-primary">Tambah Artikel</a>
	</div>
	<div class="col-md-3">
		<form action="<?= base_url('backend/artikel') ?>" method="get">
		 	<input type="text" name="keywords" required>
		 	<input type="submit" value="search" class="btn btn-sm">
		</form>
	</div>
</div>
<br>
<table class="table table-sm">
	<tr>
		<th>No</th>
		<th>Judul</th>
		<th>Tanggal</th>
		<th>Excerpt</th>
		<th>Kategori</th>
		<th>Image</th>
		<th>Action</th>
	</tr>
	<?php $no=1; 
		foreach($artikel as $row) {
	?>
	<tr>
		<td><?= $no++ ?></td>
		<td><?= substr($row['judul'],0, 40) ?>[...]</td>
		<td><?= $row['tanggal'] ?></td>
		<td><?= substr($row['excerpt'], 0, 35) ?> [...]</td>
		<td><?= $row['nama_kategori'] ?></td>
		<td><img src="<?= base_url('upload/artikel/thumbs/').$row['img']?>" alt="<?= $row['img'] ?>" width="80"></td>
		<td>
			<button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target=".bd-example-modal-lg-<?= $row['id_artikel'] ?>"><i class="fa fa-eye"></i></button>| 
			<!-- MODAL UNTUK VIEW  -->
			<div class="modal fade bd-example-modal-lg-<?= $row['id_artikel'] ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			  <div class="modal-dialog modal-lg">
			    <div class="modal-content">
			     <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel"><?= $row['judul'] ?></h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			      	<div class="col-md-12" align="center">
			      		<img src="<?= base_url('upload/artikel/thumbs/').$row['img'] ?>" alt="<?= $row['img'] ?>" align="center" class="img-thumbnail">	
			      	</div>
			      	<br>
			      	<p>Published : <?= $row['tanggal'] ?> | Kategori : <?= $row['nama_kategori'] ?></p>
			        <?= $row['isi'] ?>
			      </div>
			    </div>
			  </div>
			</div>

			<a href="<?= base_url('crud/artikel_edit/').$row['id_artikel'] ?>" class="btn btn-sm btn-warning"><i class="fa fa-cog"></i></a> |
			<a href="<?= base_url('crud/artikel_hapus/').$row['id_artikel'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin akan menghapus data?')"><i class="fa fa-trash"></i></a> 
		</td>
	</tr>
	<?php } ?>
</table>

<nav>
  <ul class="pagination">
      <?= $pagination ?>
  </ul>
</nav>


