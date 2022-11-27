<?php
class ArticleModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	/**
	 * 新增留言
	 * @param params $params
	 * @return bool true false
	 */
	public function create($params)
	{
		// 把傳進來的參數進行重新整理
		$data = [
			'title' => $params['title'],
			'content' => $params['content'],
		];
		$this->db->insert('articles',$data);
		return $this->db->affected_rows() > 0; 
		//影響的行數
	}
	/**
	 * 列出文章(顯示留言)
	 * 到資料庫裡來顯示留言
	 * @return array 
	 */
	public function list()
	{
		$sql = $this->db->select('id,  title, content, timestamp')
			->from('articles');
		$query = $sql->get();

		return $query->result_array(); //回傳物件陣列
	}
	/**
	 * 找到編輯文章
	 * 再回傳找到的
	 * @param id $id
	 * @return array 
	 */
	public function getArticle($id)
	{
		//CodeIginiter 3 的查詢語法
		$sql= $this->db->select('id, title, content')
			->from('articles')
			->where('id', $id);
		$query = $sql->get(); //執行 $sql
		
		return $query->row_array(); //回傳物件陣列
	}
	/**
	 * 編輯文章
	 * 重新傳入再更新留言區(編輯成功)
	 * @param params $params
	 * @return bool true false
	 */
	public function edit($params)
	{
		// CodeIginiter 3 的更新語法
		$data = [
			'id' => $params['id'],
			'title' => $params['title'],
			'content' => $params['content'],
		];
		$this->db->where('id' , $data['id'])
			->update('articles', $data);

		return $this->db->affected_rows() > 0;
	}
	/**
	 * 刪除文章
	 * 由id去找留言再刪除
	 * @param id $id
	 * @return bool true false
	 */
	public function delete($id)
	{
		$this->db->where('id' , $id)
			->delete('articles');

		return $this->db->affected_rows() > 0;
	}
}
?>
