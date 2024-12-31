<?php
// Paket bilgilerini al
$paket = $_GET['paket']; // AJAX ile gönderilen paket adı

// Formu oluştur
if($paket == 'classic') {
    echo '
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Classic Paket Başvuru</h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <form action="submit_form.php" method="POST">
                <input type="hidden" name="paket" value="classic">
                <label for="name">Adınız:</label>
                <input type="text" id="name" name="name" class="form-control">
                <label for="email">E-posta:</label>
                <input type="email" id="email" name="email" class="form-control">
                <button type="submit" class="btn btn-primary mt-3">Başvur</button>
            </form>
        </div>
    </div>';
} elseif($paket == 'gold') {
    echo '
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Gold Paket Başvuru</h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <form action="submit_form.php" method="POST">
                <input type="hidden" name="paket" value="gold">
                <label for="name">Adınız:</label>
                <input type="text" id="name" name="name" class="form-control">
                <label for="email">E-posta:</label>
                <input type="email" id="email" name="email" class="form-control">
                <button type="submit" class="btn btn-primary mt-3">Başvur</button>
            </form>
        </div>
    </div>';
} elseif($paket == 'platinum') {
    echo '
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Platinum Paket Başvuru</h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <form action="submit_form.php" method="POST">
                <input type="hidden" name="paket" value="platinum">
                <label for="name">Adınız:</label>
                <input type="text" id="name" name="name" class="form-control">
                <label for="email">E-posta:</label>
                <input type="email" id="email" name="email" class="form-control">
                <button type="submit" class="btn btn-primary mt-3">Başvur</button>
            </form>
        </div>
    </div>';
}
?>
