<?php
include '../component/sidebar.php'
?>
<div class="container p-3 m-4 h-100" style="background-color: #00cc44; border-top: 5px 
solid #D40013; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
    <div class="body d-flex justify-content-between">
        <h4>Konfirmasi pengembalian buku</h4>
    </div>
    <p></p>
    <p>Apakah anda ingin mengembalikan buku?</p>
    <button class="btn btn-primary me-2" type="button">
        <a class="text-light" style="text-decoration: none" name="kembali" action="../kembaliBuku.php" href="./listPeminjamanPage.php">Ya</a>
    </button>
    <button class="btn btn-warning ms-2" type="button">
        <a class="text-light" style="text-decoration: none" href="./listPeminjamanPage.php">Tidak</a>
    </button>
</div>
</aside>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>