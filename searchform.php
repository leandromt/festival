<form class="form-horizontal" action="<?= home_url('/'); ?>" method="get">
    <div class="form-group">
        <input type="search" class="form-control" name="s" value="<?php echo get_search_query(); ?>">
    </div>
    <div class="form-group">
        <button class="btn btn-primary">Ir</button>
    </div>
</form>