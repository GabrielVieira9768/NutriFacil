<nav aria-label="Page navigation" class="d-flex justify-content-center">
    <ul class="pagination">
        <li class="page-item <?= $page <= 1 ? "disabled" : "" ?>">
            <a class="page-link" href="?pagina=<?= $page - 1 ?>" aria-label="Previous" title="Página anterior">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        
        <?php for($page_number = 1; $page_number <= $total_pages; $page_number++): ?>
            <li class="page-item"><a class="page-link <?= $page_number == $page ? "active" : ""  ?>" href="?pagina=<?= $page_number ?>" title="Página <?= $page_number ?>"><?= $page_number ?></a></li>
        <?php endfor ?>
        
        <li class="page-item <?= $page >= $total_pages ? "disabled" : "" ?>">
            <a class="page-link" href="?pagina=<?= $page + 1 ?>" aria-label="Next" title="Próxima página">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>