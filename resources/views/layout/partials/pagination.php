<ul class="pagination">


<!-- Previous Page Link -->

<?php if ($paginator->onFirstPage()) : ?>
    <li class="pagination-item"><a href="javascript:void(0)" class="pagination-item-link"><i class="pagination-item-icon fa-solid fa-angle-left"></i></a></li>
<?php else : ?>
    <li><a href="<?php echo $paginator->previousPageUrl(); ?>" class="pagination-item-link" rel="prev"><i class="pagination-item-icon fa-solid fa-angle-left"></i></a></li>
<?php endif; ?>

<!-- Pagination Elements -->
<?php foreach ($paginator->getElements() as $element) : ?>
    <!-- "Three Dots" Separator -->
    <?php if (is_string($element)) : ?>
        <li class="pagination-item"><a href="javascript:void(0)" class="pagination-item-link"><?php echo $element; ?></a></li>
    <?php endif; ?>

    <!-- Array Of Links -->
    <?php if (is_array($element)) : ?>
        <?php foreach ($element as $page => $url) : ?>
            <?php if ($page == $paginator->currentPage()) : ?>
                <li class="pagination-item pagination-item-active"><a href="javascript:void(0)"
                class="pagination-item-link"><?php echo $page; ?></a></li>
            <?php else : ?>
                <li><a class="pagination-item-link" href="<?php echo $url; ?>"><?php echo $page; ?></a></li>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>
<?php endforeach; ?>

<!-- Next Page Link -->
<?php if ($paginator->hasMorePages()) : ?>
    <li><a href="<?php echo $paginator->nextPageUrl(); ?>" rel="next" class="pagination-item-link"> <i class="pagination-item-icon fa-solid fa-angle-right"></i></a></li>
<?php else : ?>
    <li class="pagination-item"><a href="javascript:void(0)" class="pagination-item-link"> <i class="pagination-item-icon fa-solid fa-angle-right"></i></a></li>
<?php endif; ?>
</ul>