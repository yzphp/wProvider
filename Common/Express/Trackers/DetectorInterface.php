<?php

namespace wProvider\Common\Express\Trackers;

use wProvider\Common\Express\Waybill;

interface DetectorInterface
{
    /**
     * 识别快递公司
     *
     * @param Waybill $waybill
     *
     * @return array
     */
    public function detect(Waybill $waybill);
}
