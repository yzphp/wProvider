<?php
/**
 * 数组助手类
 * @author : weiyi <294287600@qq.com>
 * Licensed ( http://www.wycto.cn )
 * Copyright (c) 2016~2099 http://www.wycto.cn All rights reserved.
 */
namespace wProvider\Tool;

class HelperArray
{
    /**
    *移除数组中值为空的数据
    */
    static function removeEmpty(& $arr, $trim = true) {

        foreach ( $arr as $key => $value ) {
            if (is_array ( $value )) {
                self::removeEmpty ( $arr [$key] );
            } else {
                $value = trim ( $value );
                if ($value == '') {
                    unset ( $arr [$key] );
                } elseif ($trim) {
                    $arr [$key] = $value;
                }
            }
        }
    }

    /**
    *移除数组中指定键的数据
    */
    static function removeKey(&$array, $keys) {

        if (! is_array ( $keys )) {
            $keys = array (
                $keys
            );
        }
        return array_diff_key ( $array, array_flip ( $keys ) );
    }

    /**
     * 将一个平面的二维数组按照指定的字段转换为树状结构
     * @param array $arr 数据源
     * @param string $key_node_id 节点ID字段名
     * @param string $key_parent_id 节点父ID字段名
     * @param string $key_childrens 保存子节点的字段名
     * @param boolean $refs 是否在返回结果中包含节点引用
     * return array 树形结构的数组
     */
    static function toTree($arr, $key_node_id, $key_parent_id = 'parent_id', $key_childrens = 'children', $treeIndex = false, & $refs = null) {

    	$refs = array();
    	foreach ($arr as $offset => $row) {
    		$arr[$offset][$key_childrens] = array();
    		$refs[$row[$key_node_id]] = & $arr[$offset];
    	}

    	$tree = array();
    	foreach ($arr as $offset => $row) {
    		$parent_id = $row[$key_parent_id];
    		if ($parent_id) {
    			if (!isset($refs[$parent_id])) {
    				if ($treeIndex) {
    					$tree[$offset] = & $arr[$offset];
    				}
    				else {
    					$tree[] = & $arr[$offset];
    				}
    				continue;
    			}
    			$parent = & $refs[$parent_id];
    			if ($treeIndex) {
    				$parent[$key_childrens][$offset] = & $arr[$offset];
    			}
    			else {
    				$parent[$key_childrens][] = & $arr[$offset];
    			}
    		}
    		else {
    			if ($treeIndex) {
    				$tree[$offset] = & $arr[$offset];
    			}
    			else {
    				$tree[] = & $arr[$offset];
    			}
    		}
    	}

    	return $tree;
    }

    /**
    * 将数组按照键值转换成数组
    */
    static function toHashmap($arr, $key_field, $value_field = null) {

    	$ret = array ();
    	if (empty ( $arr )) {
    		return $ret;
    	}
    	if ($value_field) {
    		foreach ( $arr as $row ) {
    			if (isset ( $row [$key_field] )) {
    				$ret [$row [$key_field]] = isset($row [$value_field])?$row [$value_field]:'NULL';
    			}
    		}
    	} else {
    		foreach ( $arr as $row ) {
    			$ret [$row [$key_field]] = $row;
    		}
    	}
    	return $ret;
    }

    /**
     * 将数组用分隔符连接并输出
     * @param $array
     * @param $separator
     * @param $find
     * @return string
     */
    static function toString($array, $separator = ',', $find = '') {

    	$str = '';
    	$separator_temp = '';

    	if (! empty ( $find )) {
    		if (! is_array ( $find )) {
    			$find = self::toArray ( $find );
    		}
    		foreach ( $find as $key ) {
    			$str .= $separator_temp . $array [$key];
    			$separator_temp = $separator;
    		}
    	} else {
    		foreach ( $array as $value ) {
    			$str .= $separator_temp . $value;
    			$separator_temp = $separator;
    		}
    	}
    	return $str;
    }

    /**
     * 从一个二维数组中返回指定键的所有值
     * @param array $arr 数据源
     * @param string $col 要查询的键
     * @return array 包含指定键所有值的数组
     */
    static function getCols($arr, $col) {

    	$ret = array ();
    	foreach ( $arr as $row ) {
    		if (isset ( $row [$col] )) {
    			$ret [] = $row [$col];
    		}
    	}
    	return $ret;
    }
    /**
     * 判断一个数组是否是二维数组
     * @param $array
     * @return bool
     */
    public static function hasDoubleArray(array $array)
    {
        return count($array) == count($array, 1);
    }

    /**
     * 计算指定二维数组里面某个字段的总和
     * @param array $array 数组
     * @param $coloum  指定字段
     * @return float
     */
    public static function sumArray(array $array, $coloum)
    {
        return array_sum(array_column($array, $coloum));
    }

    /**
     * 计算数组里面某个单价的总和 精确到分
     * @param array $array
     * @param $column
     * @return string
     */
    public static function sumArrayWithPrice(array $array, $column)
    {
        $total = self::sumArray($array, $column);
        return Helper::formatPrice($total);
    }

    /**
     * 大数组中用于替换in_array或者array_search
     * @param $key
     * @param $array
     * @return bool
     */
    public static function inArray($key, $array)
    {
        $arrayFlip = array_flip($array);
        return isset($arrayFlip[$key]);
    }

    /**
     * 冒泡排序
     * @param $array
     * @param string $sort
     * @return mixed
     */
    public static function bubbSort($array, $sort = 'desc')
    {
        if(empty($array)) return $array;
        //默认有序
        $isSorted   = true;
        $Count     = count($array);
        for($i = 0; $i < $Count; $i++) {
            //对比次数随着循环逐渐减少，因为后面的数据已经处理为有序
            for($j = 0; $j < ($Count - $i - 1); $j++) {
                //执行判断
                $isChange = $sort == 'desc' ? $array[$j] < $array[$j+1] : $array[$j] > $array[$j+1];
                if($isChange) {
                    //首次对比，判断是否有序
                    $isSorted       = false;
                    $temp           = $array[$j];
                    $array[$j]      = $array[$j+1];
                    $array[$j+1]    = $temp;
                }
            }
            if($isSorted) break;
        }
        unset($i, $j, $isSorted, $temp, $Count);
        return $array;
    }

    /**
     * 快速排序
     * @param $array
     * @param string $sort
     * @return array
     */
    public static function quickSort($array, $sort = 'desc')
    {
        //检查数据，多于一个数据才执行
        $nCount = count($array);
        if($nCount > 1) {
            //选取标准（第一个数据）
            $nStandard = $array[0];
            $arrLeftData = [];
            $arrRightData = [];
            //遍历，注意这里从1开始比较
            for($i = 1; $i < $nCount; $i++) {
                if($sort == 'desc') {
                    $array[$i] > $nStandard ? $arrLeftData[] = $array[$i] : $arrRightData[] = $array[$i];
                } else {
                    $array[$i] > $nStandard ? $arrRightData[] = $array[$i] : $arrLeftData[] = $array[$i];
                }
            }
            $array = array_merge(
                self::quickSort($arrLeftData, $sort),
                array($nStandard),
                self::quickSort($arrRightData, $sort)
            );
        }
        return $array;
    }

    /**
     * 二分查找
     * @param $toSearch
     * @param $array
     * @return bool|int
     */
    public static function twoPointSearch($toSearch, $array)
    {
        //确定当前的检索范围
        $nCount = count($array);
        //低位键，初始为0
        $nLowNum = 0;
        //高位键，初始为末尾
        $nHighNum = $nCount - 1;
        while($nLowNum <= $nHighNum) {
            //选定大概中间键
            $nMiddleNum = intval(($nHighNum + $nLowNum)/2);
            if($array[$nMiddleNum] > $toSearch) {
                //比检索值大
                $nHighNum = $nMiddleNum - 1;
            } elseif ($array[$nMiddleNum] < $toSearch) {
                //比检索值小
                $nLowNum = $nMiddleNum + 1;
            } else {
                return $nMiddleNum;
            }
        }
        return false;
    }

    
}
