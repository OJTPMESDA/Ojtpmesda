<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model {
    public $primary_key;
    public $id;
    public $tbl;
    public $fields;

    public $where;

    public function __construct()
    {
        parent::__construct();
    }

    public function get($where = null, $order = null, $join = null, $params = null)
    {
        $output = [];
        # accept string but the default where is to the primary key
        if (!empty($where)) {
            if (!is_array($where)) {
                $where  =   [$this->primary_key => $where];
            }
            $this->db->where($where);
        }

        # This statement will accept array or string order
        if (!empty($order)) {
            if (!is_array($order)) {
                $order  =   [$order];
            }
            $this->db->order_by(implode(', ', $order));
        }

        # This statement will accept array only for joining
        if (!empty($join)) {
            if (is_array($join)) {
                $isMultiArray   =   is_array($join[0]);

                if ($isMultiArray) {
                    foreach($join as $array) {
                        $joinTable      =   $array[0];
                        $joinWhere      =   $array[1];
                        $joinStatus     =   $array[2] ?? null;

                        $this->db->join($joinTable, $joinWhere, $joinStatus);
                    }
                } else {
                    $joinTable      =   $join[0];
                    $joinWhere      =   $join[1];
                    $joinStatus     =   $join[2] ?? null;

                    $this->db->join($joinTable, $joinWhere, $joinStatus);
                }
            }
        }

        $return_type = false;

        if (!is_null($params)) {
            if (isset($params['group_by'])) {
                $group_by   =   $params['group_by'];
                if (is_array($group_by)) {
                    $group_by   =   implode(', ', $group_by);
                }
                $this->db->group_by($group_by);
            }

            if (isset($params['select'])) {
                $select = $params['select'];
                $this->db->select($select);
            }

            if (isset($params['return_type'])) {
                $return_type = $params['return_type'];
            }

            if (isset($params['like'])) {

                $like   =   $params['like'];

                if (is_array($like)) {
                    $isMultiArray   =   is_array($like[0]);

                    $this->db->group_start();
                        if ($isMultiArray) {
                            foreach ($like as $keyV => $v) {
                                if (is_array($v[0])) {
                                    foreach ($v as $keyX => $x) {
                                        $this->db->group_start();
                                            foreach ($x as $y) {
                                                $likeColumn =   $y[0];
                                                $likeValue  =   $y[1];
                                                $likeExp    =   $y[2] ?? null;
                                                $likeParam  =   strtolower($y[3] ?? null);

                                                if ($likeParam == null || $likeParam == 'and') {
                                                    $this->db->like($likeColumn, $likeValue, $likeExp);
                                                } else {
                                                    $this->db->or_like($likeColumn, $likeValue, $likeExp);
                                                }
                                            }
                                        $this->db->group_end();
                                    }
                                } else {
                                    $likeColumn =   $v[0];
                                    $likeValue  =   $v[1];
                                    $likeExp    =   $v[2] ?? null;
                                    $likeParam  =   strtolower($v[3] ?? null);

                                    if ($likeParam == null || $likeParam == 'and') {
                                        $this->db->like($likeColumn, $likeValue, $likeExp);
                                    } else {
                                        $this->db->or_like($likeColumn, $likeValue, $likeExp);
                                    }
                                }
                            }
                        } else {
                            $likeColumn =   $like[0];
                            $likeValue  =   $like[1];
                            $likeExp    =   $like[2] ?? null;
                            $likeParam  =   strtolower($like[3] ?? null);

                            if ($likeParam == null || $likeParam == 'and') {
                                $this->db->like($likeColumn, $likeValue, $likeExp);
                            } else {
                                $this->db->or_like($likeColumn, $likeValue, $likeExp);
                            }
                        }
                    $this->db->group_end();
                }
            }
        }

        $query = $this->db->get($this->tbl, 1);

        if ($return_type) {
            if ($return_type == 'array') {
                $output = $query->num_rows() > 0 ? $query->row_array() : false;
            } else {
                $output = $query->num_rows() > 0 ? $query->row() : false;
            }
        } else {
            $output = $query->num_rows() > 0 ? $query->row() : false;
        }

        $query->free_result();

        return $output;
    }

    public function list_all($where = null, $limit = null, $offset = null, $order = null, $join = null, $params = null)
    {
        $output = [];
        if (empty($limit)) {
            $limit  =   PHP_INT_MAX;
        }

        if (empty($offset)) {
            $offset  =   0;
        }

        # accept string but the default where is to the primary key
        if (!empty($where)) {
            if (!is_array($where)) {
                $where  =   [$this->primary_key => $where];
            }
            $this->db->where($where);
        }

        # This statement will accept array or string order
        if (!empty($order)) {
            if (!is_array($order)) {
                $order  =   [$order];
            }
            $this->db->order_by(implode(', ', $order));
        }

        # This statement will accept array only for joining
        if (!empty($join)) {
            if (is_array($join)) {
                $isMultiArray   =   is_array($join[0]);

                if ($isMultiArray) {
                    foreach($join as $array) {
                        $joinTable      =   $array[0];
                        $joinWhere      =   $array[1];
                        $joinStatus     =   $array[2] ?? null;

                        $this->db->join($joinTable, $joinWhere, $joinStatus);
                    }
                } else {
                    $joinTable      =   $join[0];
                    $joinWhere      =   $join[1];
                    $joinStatus     =   $join[2] ?? null;

                    $this->db->join($joinTable, $joinWhere, $joinStatus);
                }
            }
        }

        $return_type = false;

        if (!is_null($params)) {
            if (isset($params['group_by'])) {
                $group_by   =   $params['group_by'];
                if (is_array($group_by)) {
                    $group_by   =   implode(', ', $group_by);
                }
                $this->db->group_by($group_by);
            }

            if (isset($params['select'])) {
                $select = $params['select'];
                $this->db->select($select);
            }

            if (isset($params['return_type'])) {
                $return_type = $params['return_type'];
            }

            if (isset($params['like'])) {
                if (!empty($params['like'])) {
                    $like   =   $params['like'];

                    if (is_array($like)) {
                        $isMultiArray   =   is_array($like[0]);

                        $this->db->group_start();
                            if ($isMultiArray) {
                                foreach ($like as $keyV => $v) {
                                    if (is_array($v[0])) {
                                        foreach ($v as $keyX => $x) {
                                            $this->db->group_start();
                                                foreach ($x as $y) {
                                                    $likeColumn =   $y[0];
                                                    $likeValue  =   $y[1];
                                                    $likeExp    =   $y[2] ?? null;
                                                    $likeParam  =   strtolower($y[3] ?? null);

                                                    if ($likeParam == null || $likeParam == 'and') {
                                                        $this->db->like($likeColumn, $likeValue, $likeExp);
                                                    } else {
                                                        $this->db->or_like($likeColumn, $likeValue, $likeExp);
                                                    }
                                                }
                                            $this->db->group_end();
                                        }
                                    } else {
                                        $likeColumn =   $v[0];
                                        $likeValue  =   $v[1];
                                        $likeExp    =   $v[2] ?? null;
                                        $likeParam  =   strtolower($v[3] ?? null);

                                        if ($likeParam == null || $likeParam == 'and') {
                                            $this->db->like($likeColumn, $likeValue, $likeExp);
                                        } else {
                                            $this->db->or_like($likeColumn, $likeValue, $likeExp);
                                        }
                                    }
                                }
                            } else {
                                $likeColumn =   $like[0];
                                $likeValue  =   $like[1];
                                $likeExp    =   $like[2] ?? null;
                                $likeParam  =   strtolower($like[3] ?? null);

                                if ($likeParam == null || $likeParam == 'and') {
                                    $this->db->like($likeColumn, $likeValue, $likeExp);
                                } else {
                                    $this->db->or_like($likeColumn, $likeValue, $likeExp);
                                }
                            }
                        $this->db->group_end();
                    }
                }
            }

            if (isset($params['or_where'])) {
                if (!is_array($params['or_where'])) {
                    $params['or_where']  =   [$this->primary_key => $params['or_where']];
                }
                $this->db->or_where($params['or_where']);
            }

            if (isset($params['in_where'])) {
                if (is_array($params['in_where'])) {
                    $this->db->where_in($params['in_where'][0], $params['in_where'][1]);
                }
            }

            if (isset($params['not_in'])) {

                if (is_array($params['not_in'])) {
                    $this->db->where_not_in($params['not_in'][0], $params['not_in'][1]);
                }
            }

            if (isset($params['return_count'])) {
                return $this->db->count_all_results($this->tbl);
            }

        } 


        $query = $this->db->get($this->tbl, $limit, $offset);

        if ($return_type) {
            if ($return_type == 'array') {
                $output = $query->num_rows() > 0 ? $output = $query->result_array() : false;
            } else {
                $output = $query->num_rows() > 0 ? $output = $query->result() : false;
            }
        } else {
            $output = $query->num_rows() > 0 ? $query->result() : false;
        }

        $query->free_result();

        return $output;
    }

    public function create($fields, $return = true)
    {
        $this->db->insert($this->tbl, $fields);
        
        if ($return) {
            return $this->db->affected_rows() > 0 ? $this->get($this->db->insert_id()) : false;
        }
    }

    public function batch_insert($fields)
    {
        $this->db->insert_batch($this->tbl, $fields);

        return $this->db->affected_rows() > 0 ? true : false;
    }

    public function update($fields, $where = null)
    {
        if (!empty($where)) {
            if (!is_array($where)) {
                $where  =   [$this->primary_key => $where];
            }
            $this->db->where($where);
        } else {
            $this->db->where($this->primary_key, $this->id);
        }

        $this->db->update($this->tbl, $fields);

        return $this->db->affected_rows() > 0 ? true : false;
    }

    public function delete($soft_delete = false)
    {
        if ($soft_delete) {
            return $this->update(['deleted' => date('Y-m-d H:i:s')]);
        }

        $this->db->where($this->where)
                 ->delete($this->tbl);

        return $this->db->affected_rows() > 0 ? true : false;
    }

    public function logs_query($query_array, $table, $datatable = false)
    {
        return $this->db->count_all_results($table);
    }
}