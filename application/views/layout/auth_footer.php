</div>
</div>
</div>
</div>
</main>
</div>
<div id="layoutAuthentication_footer">
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="text-center small">
                <div class="text-muted">Copyright &copy; Sistem Informasi Bimbingan 2021</div>
                <div>
                    <a href="#">Privacy Policy</a>
                    &middot;
                    <a href="#">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </footer>
    
    <?= $this->session->flashdata('toast'); ?>

</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="<?= base_url('assets/js/scripts.js') ?>"></script>
<script>
    var toast = new bootstrap.Toast(document.getElementById('myToast'))
    toast.show();
</script>

</body>

</html>