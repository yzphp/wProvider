<?php
namespace WeOpen\Contracts;

/**
 * 错误消息处理
 * Class DataError
 * @package WeChat\Contracts
 */
class DataError
{
    /**
     * 接口代码错误
     * @var array
     */
    static $message = [
        -1      => '系统繁忙，此时请开发者稍候再试',
        0       => '请求成功',
        40001   => '获取 access_token 时 AppSecret 错误，或者 access_token 无效。请开发者认真比对 AppSecret 的正确性，或查看是否正在为恰当的公众号调用接口',
        40002   => '不合法的凭证类型',
        40003   => '不合法的 OpenID ，请开发者确认 OpenID （该用户）是否已关注公众号，或是否是其他公众号的 OpenID',
        40004   => '不合法的媒体文件类型',
        40005   => '不合法的文件类型',
        40006   => '不合法的文件大小',
        40007   => '不合法的媒体文件 id',
        40008   => '不合法的消息类型',
        40009   => '不合法的图片文件大小',
        40010   => '不合法的语音文件大小',
        40011   => '不合法的视频文件大小',
        40012   => '不合法的缩略图文件大小',
        40013   => '不合法的 AppID ，请开发者检查 AppID 的正确性，避免异常字符，注意大小写',
        40014   => '不合法的 access_token ，请开发者认真比对 access_token 的有效性（如是否过期），或查看是否正在为恰当的公众号调用接口',
        40015   => '不合法的菜单类型',
        40016   => '不合法的按钮个数',
        40017   => '不合法的按钮个数',
        40018   => '不合法的按钮名字长度',
        40019   => '不合法的按钮 KEY 长度',
        40020   => '不合法的按钮 URL 长度',
        40021   => '不合法的菜单版本号',
        40022   => '不合法的子菜单级数',
        40023   => '不合法的子菜单按钮个数',
        40024   => '不合法的子菜单按钮类型',
        40025   => '不合法的子菜单按钮名字长度',
        40026   => '不合法的子菜单按钮 KEY 长度',
        40027   => '不合法的子菜单按钮 URL 长度',
        40028   => '不合法的自定义菜单使用用户',
        40029   => '不合法的 oauth_code',
        40030   => '不合法的 refresh_token',
        40031   => '不合法的 openid 列表',
        40032   => '不合法的 openid 列表长度',
        40033   => '不合法的请求字符，不能包含 \\uxxxx 格式的字符',
        40035   => '不合法的参数',
        40038   => '不合法的请求格式',
        40039   => '不合法的 URL 长度',
        40050   => '不合法的分组 id',
        40051   => '分组名字不合法',
        40060   => '删除单篇图文时，指定的 article_idx 不合法',
        40117   => '分组名字不合法',
        40118   => 'media_id 大小不合法',
        40119   => 'button 类型错误',
        40120   => 'button 类型错误',
        40121   => '不合法的 media_id 类型',
        40132   => '微信号不合法',
        40137   => '不支持的图片格式',
        40155   => '请勿添加其他公众号的主页链接',
        41001   => '缺少 access_token 参数',
        41002   => '缺少 appid 参数',
        41003   => '缺少 refresh_token 参数',
        41004   => '缺少 secret 参数',
        41005   => '缺少多媒体文件数据',
        41006   => '缺少 media_id 参数',
        41007   => '缺少子菜单数据',
        41008   => '缺少 oauth code',
        41009   => '缺少 openid',
        42001   => 'access_token 超时，请检查 access_token 的有效期，请参考基础支持 - 获取 access_token 中，对 access_token 的详细机制说明',
        42002   => 'refresh_token 超时',
        42003   => 'oauth_code 超时',
        42007   => '用户修改微信密码， accesstoken 和 refreshtoken 失效，需要重新授权',
        43001   => '需要 GET 请求',
        43002   => '需要 POST 请求',
        43003   => '需要 HTTPS 请求',
        43004   => '需要接收者关注',
        43005   => '需要好友关系',
        43019   => '需要将接收者从黑名单中移除',
        44001   => '多媒体文件为空',
        44002   => 'POST 的数据包为空',
        44003   => '图文消息内容为空',
        44004   => '文本消息内容为空',
        45001   => '多媒体文件大小超过限制',
        45002   => '消息内容超过限制',
        45003   => '标题字段超过限制',
        45004   => '描述字段超过限制',
        45005   => '链接字段超过限制',
        45006   => '图片链接字段超过限制',
        45007   => '语音播放时间超过限制',
        45008   => '图文消息超过限制',
        45009   => '接口调用超过限制',
        45010   => '创建菜单个数超过限制',
        45011   => 'API 调用太频繁，请稍候再试',
        45015   => '回复时间超过限制',
        45016   => '系统分组，不允许修改',
        45017   => '分组名字过长',
        45018   => '分组数量超过上限',
        45047   => '客服接口下行条数超过上限',
        46001   => '不存在媒体数据',
        46002   => '不存在的菜单版本',
        46003   => '不存在的菜单数据',
        46004   => '不存在的用户',
        47001   => '解析 JSON/XML 内容错误',
        48001   => 'api 功能未授权，请确认公众号已获得该接口，可以在公众平台官网 - 开发者中心页中查看接口权限',
        48002   => '粉丝拒收消息（粉丝在公众号选项中，关闭了 “ 接收消息 ” ）',
        48004   => 'api 接口被封禁，请登录 mp.weixin.qq.com 查看详情',
        48005   => 'api 禁止删除被自动回复和自定义菜单引用的素材',
        48006   => 'api 禁止清零调用次数，因为清零次数达到上限',
        48008   => '没有该类型消息的发送权限',
        50001   => '用户未授权该 api',
        50002   => '用户受限，可能是违规后接口被封禁',
        61451   => '参数错误 (invalid parameter)',
        61452   => '无效客服账号 (invalid kf_account)',
        61453   => '客服帐号已存在 (kf_account exsited)',
        61454   => '客服帐号名长度超过限制 ( 仅允许 10 个英文字符，不包括 @ 及 @ 后的公众号的微信号 )(invalid kf_acount length)',
        61455   => '客服帐号名包含非法字符 ( 仅允许英文 + 数字 )(illegal character in kf_account)',
        61456   => '客服帐号个数超过限制 (10 个客服账号 )(kf_account count exceeded)',
        61457   => '无效头像文件类型 (invalid file type)',
        61450   => '系统错误 (system error)',
        61500   => '日期格式错误',
        65301   => '不存在此 menuid 对应的个性化菜单',
        65302   => '没有相应的用户',
        65303   => '没有默认菜单，不能创建个性化菜单',
        65304   => 'MatchRule 信息为空',
        65305   => '个性化菜单数量受限',
        65306   => '不支持个性化菜单的帐号',
        65307   => '个性化菜单信息为空',
        65308   => '包含没有响应类型的 button',
        65309   => '个性化菜单开关处于关闭状态',
        65310   => '填写了省份或城市信息，国家信息不能为空',
        65311   => '填写了城市信息，省份信息不能为空',
        65312   => '不合法的国家信息',
        65313   => '不合法的省份信息',
        65314   => '不合法的城市信息',
        65316   => '该公众号的菜单设置了过多的域名外跳（最多跳转到 3 个域名的链接）',
        65317   => '不合法的 URL',
        89249   => '该主体已有任务执行中，距上次任务 24h 后再试',
        89247   => '内部错误',
        86004   => '无效微信号',
        86002   => '小程序还未设置昵称、头像、简介。请先设置完后再重新提交',
        //设置服务器域名
        85015   => '该账号不是小程序账号',
        85016   => '域名数量超过限制',
        85017   => '没有新增域名，请确认小程序已经添加了域名或该域名是否没有在第三方平台添加',
        85018   => '域名没有在第三方平台设置',
        //设置业务域名
        89019   => '业务域名无更改，无需重复设置',
        89020   => '尚未设置小程序业务域名，请先在第三方平台中设置小程序业务域名后在调用本接口',
        89021   => '请求保存的域名不是第三方平台中已设置的小程序业务域名或子域名',
        89029   => '业务域名数量超过限制',
        89231   => '个人小程序不支持调用 setwebviewdomain 接口',
        //设置名称
        91001   => '不是公众号快速创建的小程序',
        91002   => '小程序发布后不可改名',
        91003   => '改名状态不合法',
        91004   => '昵称不合法',
        91005   => '昵称 15 天主体保护',
        91006   => '昵称命中微信号',
        91007   => '昵称已被占用',
        91008   => '昵称命中 7 天侵权保护期',
        91009   => '需要提交材料',
        91010   => '其他错误',
        91011   => '查不到昵称修改审核单信息',
        91012   => '其他错误',
        91013   => '占用名字过多',
        91014   => '+号规则 同一类型关联名主体不一致',
        91015   => '原始名不同类型主体不一致',
        91016   => '名称占用者 ≥2',
        91017   => '+号规则 不同类型关联名主体不一致',
        //微信认证名称检测
        53010   => '名称格式不合法',
        53011   => '名称检测命中频率限制',
        53012   => '禁止使用该名称',
        53013   => '公众号：名称与已有公众号名称重复;小程序：该名称与已有小程序名称重复',
        53014   => '公众号：公众号已有{名称 A+}时，需与该帐号相同主体才可申请{名称 A};小程序：小程序已有{名称 A+}时，需与该帐号相同主体才可申请{名称 A}',
        53015   => '公众号：该名称与已有小程序名称重复，需与该小程序帐号相同主体才可申请;小程序：该名称与已有公众号名称重复，需与该公众号帐号相同主体才可申请',
        53016   => '公众号：该名称与已有多个小程序名称重复，暂不支持申请;小程序：该名称与已有多个公众号名称重复，暂不支持申请',
        53017   => '公众号：小程序已有{名称 A+}时，需与该帐号相同主体才可申请{名称 A};小程序：公众号已有{名称 A+}时，需与该帐号相同主体才可申请{名称 A}',
        53018   => '名称命中微信号',
        53019   => '名称在保护期内',
        //修改头像
        40097   => '参数错误',
        53202   => '本月头像修改次数已用完',
        //修改功能介绍
        53200   => '本月功能介绍修改次数已用完',
        53201   => '功能介绍内容命中黑名单关键字',
        //类目管理返回码说明
        53300   => '超出每月次数限制',
        53301   => '超出可配置类目总数限制',
        53302   => '当前账号主体类型不允许设置此种类目',
        53303   => '提交的参数不合法',
        53304   => '与已有类目重复',
        53305   => '包含未通过 ICP 校验的类目',
        53306   => '修改类目只允许修改类目资质，不允许修改类目 ID',
        53307   => '只有审核失败的类目允许修改',
        53308   => '审核中的类目不允许删除',
        //绑定微信用户为体验者
        85001   => '微信号不存在或微信号设置为不可搜索',
        85002   => '小程序绑定的体验者数量达到上限',
        85003   => '微信号绑定的小程序体验者达到上限',
        85004   => '微信号已经绑定',
        //代码模板库
        85064   => '找不到模版',
        85065   => '模版库已满',
        //代码管理
        85013   => '无效的自定义配置',
        85014   => '无效的模版编号',
        85043   => '模版错误',
        85044   => '代码包超过大小限制',
        85045   => 'ext_json 有不存在的路径',
        85046   => 'tabBar 中缺少 path',
        85047   => 'pages 字段为空',
        85048   => 'ext_json 解析失败',
        80082   => '没有权限使用该插件',
        80067   => '找不到使用的插件',
        80066   => '非法的插件版本',
        86000   => '不是由第三方代小程序进行调用',
        86001   => '不存在第三方的已经提交的代码',
        85006   => '标签格式错误',
        85007   => '页面路径错误',
        85008   => '类目填写错误',
        85009   => '已经有正在审核的版本',
        85010   => 'item_list 有项目为空',
        85011   => '标题填写错误',
        85023   => '审核列表填写的项目数不在 1-5 以内',
        85092   => 'preview_info格式错误',
        85093   => 'preview_info 视频或者图片个数超限',
        87013   => '撤回次数达到上限（每天一次，每个月 10 次）',
        85012   => '无效的审核 id',
        85019   => '没有审核版本',
        85020   => '审核状态未满足发布',
        87011   => '现网已经在灰度发布，不能进行版本回退',
        87012   => '该版本不能回退，可能的原因：1:无上一个线上版用于回退 2:此版本为已回退版本，不能回退 3:此版本为回退功能上线之前的版本，不能回退',
        85079   => '小程序没有线上版本，不能进行灰度',
        85080   => '小程序提交的审核未审核通过',
        85081   => '无效的发布比例',
        85082   => '当前的发布比例需要比之前设置的高',
        85021   => '状态不可变',
        85022   => 'action 非法',
        89401   => '系统不稳定，请稍后再试，如多次失败请通过社区反馈',
        89402   => '该审核单不在待审核队列，请检查是否已提交审核或已审完',
        89403   => '本单属于平台不支持加急种类，请等待正常审核流程',
        89404   => '本单已加速成功，请勿重复提交',
        89405   => '本月加急额度不足，请提升提审质量以获取更多额度',
        85077   => '小程序类目信息失效（类目中含有官方下架的类目，请重新选择类目）',
        85085   => '小程序提审数量已达本月上限',
        85086   => '提交代码审核之前需提前上传代码',
        85087   => '小程序已使用 api navigateToMiniProgram，请声明跳转 appid 列表后再次提交',
        87006   => '小游戏不能提交',
        86007   => '小程序禁止提交',
        85051   => 'version_desc或者preview_info超限',
        61070   => '法人姓名与微信号不一致',
        89248   => '企业代码类型无效，请选择正确类型填写',
        89250   => '未找到该任务',
        89251   => '待法人人脸核身校验',
        89252   => '法人&企业信息一致性校验中',
        89253   => '缺少参数',
        89254   => '第三方权限集不全，补全权限集全网发布后生效',
        89236   =>'该插件不能申请',
        89237   =>'已经添加该插件',
        89238   =>'申请或使用的插件已经达到上限',
        89239   =>'该插件不存在',
        89243   =>'该申请为“待确认”状态，不可删除',
        89244   =>'不存在该插件 appid',
        89256   =>'token 信息有误',
        89257   =>'该插件版本不支持快速更新',
        89258   =>'当前小程序帐号存在灰度发布中的版本，不可操作快速更新',
        9001001 => 'POST 数据参数不合法',
        9001002 => '远端服务不可用',
        9001003 => 'Ticket 不合法',
        9001004 => '获取摇周边用户信息失败',
        9001005 => '获取商户信息失败',
        9001006 => '获取 OpenID 失败',
        9001007 => '上传文件缺失',
        9001008 => '上传素材的文件类型不合法',
        9001009 => '上传素材的文件尺寸不合法',
        9001010 => '上传失败',
        9001020 => '帐号不合法',
        9001021 => '已有设备激活率低于 50% ，不能新增设备',
        9001022 => '设备申请数不合法，必须为大于 0 的数字',
        9001023 => '已存在审核中的设备 ID 申请',
        9001024 => '一次查询设备 ID 数量不能超过 50',
        9001025 => '设备 ID 不合法',
        9001026 => '页面 ID 不合法',
        9001027 => '页面参数不合法',
        9001028 => '一次删除页面 ID 数量不能超过 10',
        9001029 => '页面已应用在设备中，请先解除应用关系再删除',
        9001030 => '一次查询页面 ID 数量不能超过 50',
        9001031 => '时间区间不合法',
        9001032 => '保存设备与页面的绑定关系参数错误',
        9001033 => '门店 ID 不合法',
        9001034 => '设备备注信息过长',
        9001035 => '设备申请参数不合法',
        9001036 => '查询起始值 begin 不合法',
    ];

    /**
     * 异常代码解析描述
     * @param string $code
     * @return string
     */
    public static function toMessage($code)
    {
        return isset(self::$message[$code]) ? self::$message[$code] : $code;
    }

}