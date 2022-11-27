<?php

class Article extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ArticleModel');
	}
	public function index()
	{
		$articles = $this->ArticleModel->list();

		$this->load->view('Article/header');
		//$this->load->view('Article/list');
		$this->load->view('Article/list', ['articles' => $articles]);  
		//到 Article.php 在原本 index 方法呼叫 ArticleModel 的 list function再把取出的資料丟給 list.php
		
		$this->load->view('Article/footer');
	}
	/**
	 * 新增留言
	 * 1.先檢查是否有填入文字、數字
	 * 2.表單驗證未通過顯示新增留言畫面
	 * 3.成功後就會回到首頁可以查看到新留言
	 */
	public function create()
	{
		$this->form_validation->set_rules('title','文章標題','required');
		$this->form_validation->set_rules('content','文章內容','required');
		$this->form_validation->set_message('required','%s 欄位必填');
		//設置 create.php 傳過來的參數運行表單驗證並判斷是否通過	
		$params = [
			'title' => $this->input->post("title"),
			'content' => $this->input->post("content"),
		];
		if(!$this->form_validation->run()){
			//表單驗證未通過顯示新增留言畫面
			$this->load->view('Article/header');
			$this->load->view('Article/create');
			$this->load->view('Article/footer');
			return ;
		}
		$this->ArticleModel->create($params);
		// 表單驗證通過呼叫 ArticleModel 的 create function設置文章新增成功訊息並轉址到 index
		$this->session->set_flashdata('MessageData' , [
			'type' => 'success',
			'message' => '文章新增成功',
		]);
		redirect(site_url('article/index'));
	}
	/**
	 * 編輯留言
	 * @param id $id
	*/
	public function edit($id)
	{
		$this->form_validation->set_rules('content','文章內容','required');
		$this->form_validation->set_message('required','%s 欄位必填');

		$article = $this->ArticleModel->getArticle($id);
		$params=[
			'id' => $id,
			'title' => $this->input->post("title"),
			'content' => $this->input->post("content"),
		];
		if(!$this->form_validation->run()){
			if($article){
				$this->load->view('Article/header');
				$this->load->view('Article/edit', ['article' => $article]);
				// $this->load->view('Article/edit');
				$this->load->view('Article/footer');
				return ;
			}else{
				$this->session->set_flashdata('MessageData', [
					'type' => 'danger',
					'message' => '文章取得失敗',
				]);
				redirect(site_url('article/index'));
			}
		}
		$this->ArticleModel->edit($params);
		$this->session->set_flashdata('MessageData' , [
			'type' => 'success',
			'message' => '文章編輯成功',
		]);
		redirect(site_url('article/index'));
	}
	/**
	 * 刪除留言
	 * 1.文章存在就設置刪除成功訊息並重新轉址到index(更新)
	 * 2.文章不存在就設置錯誤訊息並重新轉址到 index
	 * 
	 * @param id $id
	*/
	public function delete($id)
	{
		$article = $this->ArticleModel->getArticle($id);
		if($article){
			//文章存在就呼叫 ArticleModel 的 delete function設置刪除成功訊息並重新轉址到 index
			$this->ArticleModel->delete($id);
			$this->session->set_flashdata('MessageData' , [
				'type' => 'success',
				'message' => '文章刪除成功',
			]);
			redirect(site_url('article/index'));
		}else{
			//文章不存在就設置錯誤訊息並重新轉址到 index
			$this->session->set_flashdata('MessageData', [
				'type' => 'danger',
				'message' => '取得文章失敗',
			]);
			redirect(site_url('article/index'));
		}
	}
}

?>
