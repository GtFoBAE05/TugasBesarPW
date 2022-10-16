<?php  
include '../component/sidebar.php' 
?>  
<!-- Bisa bantu terkait caraa menampilkan data dari tabel lain?-->
<div class="container p-3 m-4 h-100" style="background-color: #00cc44)); border-top: 5px 
solid #D40013; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >          
    <div class="body d-flex justify-content-between">         
        <h4>LIST PEMINJAMAN</h4>                                   
    </div>     
        <hr>         
            <table class="table ">         
            <thead>             
                <tr>                
                    <th scope="col">Nama Buku</th>                 
                    <th scope="col">Gambar</th>   
                    <th scope="col">Status</th>              
                    <th scope="col">Tanggal Pengembalian</th>                 
                    <th scope="col">Pengembalian Buku</th>             
                </tr>         
            </thead>         
            <tbody>             
                <?php             
                $query = mysqli_query($con, "SELECT * FROM statusbuku") or die(mysqli_error($con));

                if (mysqli_num_rows($query) == 0) {                 
                    echo '<tr> <td colspan="7"> Tidak ada data </td> </tr>';             
                }else{                 
               
                    while($data = mysqli_fetch_assoc($query)){                 
                    echo'                 
                    <tr>           
                        <td>'.$data[' '].'</td>                     
                        <td>'.$data[' '].'</td>   
                        <td>'.$data['statusBuku'].'</td>                     
                        <td>'.$data['tanggal'].'</td>                                                           
                        <td>    
                        <button class="btn btn-primary me-2" type="button" >                         
                            <a class="text-light" style="text-decoration: none" href="./konfirmasiKembaliPage.php">Kembali</a>                     
                        </button>
                                          
                    </td>                 
                </tr>';                 
               
                }             
            }             
            ?>         
        </tbody>     
    </table>  
</div>  
</aside>  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
crossorigin="anonymous"></script> 
</body> 
</html> 