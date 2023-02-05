<?php
require '../../../autoload.php';

echo '测试:' . PHP_EOL;
echo \wProvider\Tool\HelperDateTime::isTimestamp(1646186290) . PHP_EOL;
echo '测试:' . PHP_EOL;
echo \wProvider\Tool\HelperDateTime::secondEndToday() . PHP_EOL;
echo \wProvider\Tool\HelperDateTime::secondMinute(5) . PHP_EOL;
echo \wProvider\Tool\HelperDateTime::secondHour(2) . PHP_EOL;
echo \wProvider\Tool\HelperDateTime::secondDay(7) . PHP_EOL;
echo \wProvider\Tool\HelperDateTime::secondWeek(4) . PHP_EOL;
echo '友好日期:' . PHP_EOL;
echo \wProvider\Tool\HelperDateTime::toFriendly('2020-3-2 10:15:33', 'en') . PHP_EOL;

$datetime = '2020-04-10 22:22:22';

var_dump(\wProvider\Tool\HelperDateTime::isToday($datetime));
var_dump(\wProvider\Tool\HelperDateTime::isThisMonth($datetime));
var_dump(\wProvider\Tool\HelperDateTime::isThisYear($datetime));
var_dump(\wProvider\Tool\HelperDateTime::isThisWeek($datetime));

$datetime = 1586451741;

var_dump(\wProvider\Tool\HelperDateTime::isToday($datetime));
var_dump(\wProvider\Tool\HelperDateTime::isThisMonth($datetime));
var_dump(\wProvider\Tool\HelperDateTime::isThisYear($datetime));
var_dump(\wProvider\Tool\HelperDateTime::isThisWeek($datetime));

$datetime = 'Apr 11, 2020';

var_dump(\wProvider\Tool\HelperDateTime::isToday($datetime));
var_dump(\wProvider\Tool\HelperDateTime::isThisMonth($datetime));
var_dump(\wProvider\Tool\HelperDateTime::isThisYear($datetime));
var_dump(\wProvider\Tool\HelperDateTime::isThisWeek($datetime));
echo '相差天数:' . PHP_EOL;
var_dump(\wProvider\Tool\HelperDateTime::diffDays('2022-4-10 23:01:11', 'Apr 11, 2020')) . PHP_EOL;
echo '相差天数:' . PHP_EOL;
var_dump(\wProvider\Tool\HelperDateTime::diffDays(1586451741)) . PHP_EOL;
echo '相差年数:' . PHP_EOL;
var_dump(\wProvider\Tool\HelperDateTime::diffYears(1586451741)) . PHP_EOL;
echo '相差月数:' . PHP_EOL;
var_dump(\wProvider\Tool\HelperDateTime::diffMonths(1586451741)) . PHP_EOL;
echo '相差周数:' . PHP_EOL;
var_dump(\wProvider\Tool\HelperDateTime::diffWeeks(1586451741)) . PHP_EOL;
echo 'N时间前&后:' . PHP_EOL;
var_dump(\wProvider\Tool\HelperDateTime::beforeMinute(3, '2022-3-2 10:15:33'));
var_dump(\wProvider\Tool\HelperDateTime::beforeMinute(3, '2022-3-2 10:15:33', true));
var_dump(\wProvider\Tool\HelperDateTime::afterMinute(2, 1586451741));
var_dump(\wProvider\Tool\HelperDateTime::beforeHour(5, '2022-3-2 10:15:33'));
var_dump(\wProvider\Tool\HelperDateTime::afterHour(5));
var_dump(\wProvider\Tool\HelperDateTime::beforeDay(2));
var_dump(\wProvider\Tool\HelperDateTime::afterDay(2));
var_dump(\wProvider\Tool\HelperDateTime::beforeWeek(6, 1586451741));
var_dump(\wProvider\Tool\HelperDateTime::afterWeek(6));
var_dump(\wProvider\Tool\HelperDateTime::beforeMonth(1, 'March 3, 2010 10:15:33'));
var_dump(\wProvider\Tool\HelperDateTime::afterMonth(1));
var_dump(\wProvider\Tool\HelperDateTime::beforeYear(2));
var_dump(\wProvider\Tool\HelperDateTime::afterYear(2));
echo '获得毫秒级时间戳:' . PHP_EOL;
var_dump(\wProvider\Tool\HelperDateTime::getTimestamp());
var_dump(\wProvider\Tool\HelperDateTime::getMilliTimestamp());
var_dump(\wProvider\Tool\HelperDateTime::getMicroTimestamp());
var_dump(\wProvider\Tool\HelperDateTime::getNanoTimestamp());

echo '时间转换:' . PHP_EOL;
var_dump(\wProvider\Tool\HelperDateTime::format('May 3, 2021'));

echo '今天是星期几:' . PHP_EOL;
var_dump(\wProvider\Tool\HelperDateTime::getWeekDay('Nov 28, 2022'));

echo '是否为闰年:' . PHP_EOL;
var_dump(\wProvider\Tool\HelperDateTime::isLeapYear('2020-3-2 10:15:33'));

echo '该日期的当年有多少天:' . PHP_EOL;
var_dump(\wProvider\Tool\HelperDateTime::daysInYear('2020-3-2 10:15:33'));
echo '该日期的当月有多少天:' . PHP_EOL;
var_dump(\wProvider\Tool\HelperDateTime::daysInMonth('2020-3-2 10:15:33'));
$re = \wProvider\Tool\HelperSpell::getPinYin("我想你了");
var_dump($re);