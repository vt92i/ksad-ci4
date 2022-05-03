<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Toko Buku <?=date('Y');?></div>
            <div>
                <a href="#">Privacy Policy</a>
                <a href="#">Terms & Conditions</a>
            </div>
        </div>
    </div>
</footer>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="<?=base_url()?>/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="<?=base_url()?>/assets/demo/chart-area-demo.js"></script>
<script src="<?=base_url()?>/assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="<?=base_url()?>/js/datatables-simple-demo.js"></script>

<script>
function previewImage() {
    const cover_element = document.getElementById("book_cover")
    const img_preview_element = document.getElementById("img-preview")
    const file_cover = new FileReader()

    file_cover.readAsDataURL(cover_element.files[0])
    file_cover.onload = (e) => {
        img_preview_element.src = e.target.result
    }
}
</script>

</body>

</html>