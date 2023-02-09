<?php

namespace wProvider\Map\Tencent;

use GuzzleHttp\Exception\GuzzleException;

/**
 * 服务中心类
 */
class Server
{
    /**
     * @var Request
     */
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * 地点搜索
     * @link https://lbs.qq.com/service/webService/webServiceGuide/webServiceSearch
     * @param string $keyword 此参数无需进行url编码
     * @param string $boundary
     * @param array $option
     * @return Response
     * @throws GuzzleException
     */
    public function locationSearch(string $keyword, string $boundary, array $option=[]): Response
    {
        return $this->request->get('place/v1/search',array_merge(
            compact('boundary'),
            [
                'keyword'=>urlencode($keyword)
            ],
            $option
        ));
    }

    /**
     * 关键词输入提示
     * @link https://lbs.qq.com/service/webService/webServiceGuide/webServiceSuggestion
     * @param string $keyword
     * @param array $option
     * @return Response
     * @throws GuzzleException
     */
    public function suggestion(string $keyword,array $option=[]):Response
    {
        //$keyword = urlencode($keyword);
        return $this->request->get('place/v1/suggestion',array_merge(
            compact('keyword'),
            $option
        ));
    }

    /**
     * 逆地址解析
     * @link https://lbs.qq.com/service/webService/webServiceGuide/webServiceGcoder
     * @param string $location
     * @param array $option
     * @throws GuzzleException
     * @return Response
     */
    public function inverseAddress(string $location,array $option=[]):Response
    {
        return $this->request->get('geocoder/v1/',array_merge(
            compact('location'),
            $option
        ));
    }

    /**
     * 地址解析
     * @link https://lbs.qq.com/service/webService/webServiceGuide/webServiceGeocoder
     * @param string $address
     * @param array $option
     * @return Response
     * @throws GuzzleException
     */
    public function addressResolution(string $address,array $option=[]):Response
    {
        return $this->request->get('geocoder/v1/',array_merge(
            compact('address'),
            $option
        ));
    }

    /**
     * 智能地址解析
     * @link https://lbs.qq.com/service/webService/webServiceGuide/SmartGeocoder
     * @param string $smart_address
     * @param array $option
     * @return Response
     * @throws GuzzleException
     */
    public function smartAddressResolution(string $smart_address,array $option=[]):Response
    {
        return $this->request->get('geocoder/v1/',array_merge(
            compact('smart_address'),
            $option
        ));
    }

    /**
     * 路线规划
     * @link https://lbs.qq.com/service/webService/webServiceGuide/webServiceRoute
     * @param string $from
     * @param string $to
     * @param array $option
     * @return Response
     * @throws GuzzleException
     */
    public function routePlanning(string $from , string $to,array $option = []):Response
    {
        return $this->request->get('direction/v1/driving/',array_merge(
            compact('from','to'),
            $option
        ));
    }

    /**
     * 地址距离计算
     * @link https://lbs.qq.com/service/webService/webServiceGuide/webServiceMatrix
     * @param string $mode
     * @param string $from
     * @param string $to
     * @param array $option
     * @return Response
     * @throws GuzzleException
     */
    public function distanceCalculation(string $mode , string $from , string $to , array $option=[]):Response
    {
        return $this->request->get('distance/v1/matrix',array_merge(
            compact('from','to','mode'),
            $option
        ));
    }

    /**
     * 货车（trucking）路线规划
     * @link https://lbs.qq.com/service/webService/webServiceGuide/directionTrucking
     * @param string $from
     * @param string $to
     * @param string $size
     * @param string $height
     * @param string $width
     * @param string $weight
     * @param string $axle_weight
     * @param string $axle_count
     * @param string $is_trailer
     * @param array $option
     * @return Response
     * @throws GuzzleException
     */
    public function trucking(string $from , string $to , string $size ,
                             string $height , string $width , string $weight ,
                             string $axle_weight , string $axle_count , string $is_trailer ,
                             array $option=[]):Response
    {
        return $this->request->get('direction/v1/trucking',array_merge(
            compact('from','to','size','height','weight','width',
                    'axle_weight','axle_count','is_trailer'),
            $option
        ));
    }

    /**
     * 获取省市区列表
     * @link https://lbs.qq.com/service/webService/webServiceGuide/webServiceDistrict
     * @param array $option
     * @return Response
     * @throws GuzzleException
     */
    public function districtList(array $option=[]):Response
    {
        return $this->request->get('district/v1/list',$option);
    }

    /**
     * 获取下级行政区划
     * @link https://lbs.qq.com/service/webService/webServiceGuide/webServiceDistrict
     * @param string $id
     * @param array $option
     * @return Response
     * @throws GuzzleException
     */
    public function districtGetchildren(string $id,array $option=[]):Response
    {
        return $this->request->get('district/v1/getchildren',array_merge(
            compact('id'),
            $option
        ));
    }

    /**
     * 行政区划搜索
     * @link https://lbs.qq.com/service/webService/webServiceGuide/webServiceDistrict
     * @param string $keyword
     * @param array  $option
     * @return Response
     * @throws GuzzleException
     */
    public function districtSearch(string $keyword,array $option=[]):Response
    {
        return $this->request->get('district/v1/search',array_merge(
            compact('keyword'),
            $option
        ));
    }

    /**
     * 坐标转换
     * @link https://lbs.qq.com/service/webService/webServiceGuide/webServiceTranslate
     * @param string $locations
     * @param string $type
     * @param array $option
     * @return Response
     * @throws GuzzleException
     */
    public function coordTranslate(string $locations,string $type,array $option=[]):Response
    {
        return $this->request->get('coord/v1/translate',array_merge(
            compact('locations','type'),
            $option
        ));
    }

    /**
     * ip定位
     * @link https://lbs.qq.com/service/webService/webServiceGuide/webServiceIp
     * @param string $ip
     * @param array $option
     * @return Response
     * @throws GuzzleException
     */
    public function ip(string $ip,array $option=[]):Response
    {
        return $this->request->get('location/v1/ip',array_merge(
            compact('ip'),
            $option
        ));
    }
}