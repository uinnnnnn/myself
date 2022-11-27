<div class="container mt-5">
    <div class="row">
        <div class="col-md-12 text-right">
            <a href="<?php echo site_url('article/create'); ?>" class="btn btn-primary btn-lg"> 新增 </a>
        </div>
    </div>
</div>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
			<?php
			$MessageData = $this->session->flashdata('MessageData');
			if ($this->session->flashdata('MessageData')) {
				echo '<div class="alert alert-'. $MessageData['type'] . '">' . 
					$MessageData['message'] . 
					'</div>'; 
			}
			?>
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <span class="card-header-title h4">留言列表</span>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <th> 編號 </th>
                            <th> 標題 </th>
                            <th> 內容 </th>
                            <th> 時間 </th>
                            <th width=150> 操作 </th>
                        </thead>
                        <tbody>

							<?php if(!empty($articles)){
								foreach ($articles as $article){
									?>
							<tr>
								<td> <?php echo $article ['id']?> </td>
								<td> <?php echo $article ['title']?> </td>
								<td> <?php echo $article ['content']?> </td>
								<td> <?php echo $article ['timestamp']?> </td>
								<td>		
									<a href="<?php echo site_url('article/edit/' . $article['id']); ?>" class="btn btn-primary btn-sm"> 編輯 </a>
									<a href="<?php echo site_url('article/delete/' . $article['id']); ?>" class="btn btn-danger btn-sm"> 刪除 </a>
								</td>
							</tr>
									<?php		
								}
							}
							?>
                                   
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
