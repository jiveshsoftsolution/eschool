<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* common function for CRUD operation */


/* Save and Update Record  */
function save($data ,$tablename="")
{
	$CI = & get_instance();
	if($tablename=="")
	{
		$tablename = $CI->table;
	}
	$op = 'update';
	$keyExists = FALSE;
	$fields = $CI->db->field_data($tablename);
	foreach ($fields as $field)
	{
		if($field->primary_key==1)
		{
			$keyExists = TRUE;
			if(isset($data[$field->name]))
			{
				$CI->db->where($field->name, $data[$field->name]);
			}
			else
			{
				$op = 'insert';
			}
		}
}
   if($keyExists && $op=='update')
	{
		$CI->db->set($data);
		$CI->db->update($tablename);
		if($CI->db->affected_rows()==1)
		{
			return ($CI->db->affected_rows() > 0) ? TRUE : FALSE;
		}
	}
	$CI->db->insert($tablename,$data);
	return ($CI->db->affected_rows() > 0) ? TRUE : FALSE;

}
/* End */
/* Search Record*/
function search($conditions=NULL,$tablename="",$limit=500,$offset=0)
{
	 $CI = & get_instance();
	if($tablename=="")
	{
		$tablename = $CI->table;
	}
	if($conditions != NULL)
	$CI->db->where($conditions);
	$query = $CI->db->get($tablename,$limit,$offset=0);
	return ($CI->db->affected_rows() > 0) ? TRUE : FALSE;
}
/* End */

/* Insert Record */
function insert($data,$tablename="")
{
	 $CI = & get_instance();
	if($tablename=="")
	$tablename = $CI->table;
	$CI->db->insert($tablename,$data);
	return ($CI->db->affected_rows() > 0) ? TRUE : FALSE;
	
}
/* End */

/* Update Record */
function update($data,$conditions,$tablename="")
{
	$CI = & get_instance();
	if($tablename=="")
	$tablename = $CI->table;
	$CI->db->where($conditions);
	$CI->db->update($tablename,$data);
	return ($CI->db->affected_rows() > 0) ? TRUE : FALSE;
}
/* End */

/* Delete Record */
function delete($conditions,$tablename="")
{
	$CI = & get_instance();
	if($tablename=="")
	$tablename = $CI->table;
	$CI->db->where($conditions);
	$CI->db->delete($tablename);
	return ($CI->db->affected_rows() > 0) ? TRUE : FALSE;
}
/* End */	

/* Retrive Record */
function retrieve_records($cond = NULL, $offset = 0, $limit = NULL, $sort = NULL, $tablename="") {
                $CI = & get_instance();
                if ($cond != NULL) {
                   foreach ($cond as $param => $item)
                    $CI->db->where($param, $item);
                }
                if ($sort != NULL) {
                    for ($i = 0; $i < count($sort); $i++)
                     $CI->db->order_by($sort['column'], $sort['order']);
                }
                if ($limit != NULL)
                $CI->db->limit($limit, $offset);
                $CI->db->select('*');
                $CI->db->from($tablename);
                $query = $CI->db->get();
        $tdata = array();
        if ($query->num_rows() > 0) {
		    return $query->result();
            $query->free_result();
        }
        else {
            $tdata = array('status' => 'No result found', 'result' => $query->num_rows());
        }
        return $tdata;
    }
	/* End */	


?>
