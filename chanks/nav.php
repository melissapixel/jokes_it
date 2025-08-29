<div class="nav">
    <div class="nav-card">
        <div class="card-text">
            <p>
                <?php include 'php/getJous.php'; ?>
            </p>
        </div>
    </div>
</div>


<script>
    const text_card = document.querySelector('.card-text'); 
    text_card.addEventListener('click', function(event) {

        window.location.reload();
    });
</script>

<script src="../controllers/get_bg__color.js"></script>