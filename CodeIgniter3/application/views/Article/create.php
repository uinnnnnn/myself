<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <span class="card-header-title h4">新增留言</span>
                </div>
                <div class="card-body">
					<?php echo validation_errors('<div class="alert alert-warning" role="alert">', '</div>')?>
                    <form action="<?php echo site_url('article/create'); ?>" method="POST">
                        <div class="form-group">
                            <label> 標題： </label>
                            <input type="text" placeholder="請輸入標題"  name="title" id="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label> 內容： </label>
                            <input type="text" placeholder="請輸入內容" name="content" id="content" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary"> 新增 </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
