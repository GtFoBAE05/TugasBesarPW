<?php

include 'Sidebar.php';

$id = $_GET['id'];

$pengumuman = getPengumumanById($id);

if (isset($_POST['submit'])) {
    updatePengumuman($_POST, $id);
    header("location: indexAdmin.php");
    exit;
}

?>
<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px
    solid #141414; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0,
    0.19);">
    <h4>Edit Pengumuman</h4>
    <hr>
    <div class="countainer card-content w-50">
        <form action="" method="POST">
            <div class="mb-3">
                <label for="Judul" class="form-label">Judul</label>
                <input type="text" class="form-control" id="Judul" name="judul"
                    value="<?php echo $pengumuman['judul'] ?>">
            </div>
            <div class="mb-3">
                <label for="konten" class="form-label">konten</label>
                <textarea class="form-control" id="konten" rows="3"
                    name="konten"><?php echo $pengumuman['konten'] ?></textarea>
            </div>

            <button type="submit" class="btn btn-primary" name=" submit">EDIT</button>
        </form>
    </div>
</div>
</aside>
</body>

</html>