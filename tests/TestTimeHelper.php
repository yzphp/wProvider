<?php
require '../include.php';

echo '测试:' . PHP_EOL;
echo \Tool\TimeHelper::isTimestamp(1646186290) . PHP_EOL;
echo '测试:' . PHP_EOL;
echo \Tool\TimeHelper::secondEndToday() . PHP_EOL;
echo \Tool\TimeHelper::secondMinute(5) . PHP_EOL;
echo \Tool\TimeHelper::secondHour(2) . PHP_EOL;
echo \Tool\TimeHelper::secondDay(7) . PHP_EOL;
echo \Tool\TimeHelper::secondWeek(4) . PHP_EOL;
echo '友好日期:' . PHP_EOL;
echo \Tool\TimeHelper::toFriendly('2020-3-2 10:15:33', 'en') . PHP_EOL;

$datetime = '2020-04-10 22:22:22';

var_dump(\Tool\TimeHelper::isToday($datetime));
var_dump(\Tool\TimeHelper::isThisMonth($datetime));
var_dump(\Tool\TimeHelper::isThisYear($datetime));
var_dump(\Tool\TimeHelper::isThisWeek($datetime));

$datetime = 1586451741;

var_dump(\Tool\TimeHelper::isToday($datetime));
var_dump(\Tool\TimeHelper::isThisMonth($datetime));
var_dump(\Tool\TimeHelper::isThisYear($datetime));
var_dump(\Tool\TimeHelper::isThisWeek($datetime));

$datetime = 'Apr 11, 2020';

var_dump(\Tool\TimeHelper::isToday($datetime));
var_dump(\Tool\TimeHelper::isThisMonth($datetime));
var_dump(\Tool\TimeHelper::isThisYear($datetime));
var_dump(\Tool\TimeHelper::isThisWeek($datetime));
echo '相差天数:' . PHP_EOL;
var_dump(\Tool\TimeHelper::diffDays('2022-4-10 23:01:11', 'Apr 11, 2020')) . PHP_EOL;
echo '相差天数:' . PHP_EOL;
var_dump(\Tool\TimeHelper::diffDays(1586451741)) . PHP_EOL;
echo '相差年数:' . PHP_EOL;
var_dump(\Tool\TimeHelper::diffYears(1586451741)) . PHP_EOL;
echo '相差月数:' . PHP_EOL;
var_dump(\Tool\TimeHelper::diffMonths(1586451741)) . PHP_EOL;
echo '相差周数:' . PHP_EOL;
var_dump(\Tool\TimeHelper::diffWeeks(1586451741)) . PHP_EOL;
echo 'N时间前&后:' . PHP_EOL;
var_dump(\Tool\TimeHelper::beforeMinute(3, '2022-3-2 10:15:33'));
var_dump(\Tool\TimeHelper::beforeMinute(3, '2022-3-2 10:15:33', true));
var_dump(\Tool\TimeHelper::afterMinute(2, 1586451741));
var_dump(\Tool\TimeHelper::beforeHour(5, '2022-3-2 10:15:33'));
var_dump(\Tool\TimeHelper::afterHour(5));
var_dump(\Tool\TimeHelper::beforeDay(2));
var_dump(\Tool\TimeHelper::afterDay(2));
var_dump(\Tool\TimeHelper::beforeWeek(6, 1586451741));
var_dump(\Tool\TimeHelper::afterWeek(6));
var_dump(\Tool\TimeHelper::beforeMonth(1, 'March 3, 2010 10:15:33'));
var_dump(\Tool\TimeHelper::afterMonth(1));
var_dump(\Tool\TimeHelper::beforeYear(2));
var_dump(\Tool\TimeHelper::afterYear(2));
echo '获得毫秒级时间戳:' . PHP_EOL;
var_dump(\Tool\TimeHelper::getTimestamp());
var_dump(\Tool\TimeHelper::getMilliTimestamp());
var_dump(\Tool\TimeHelper::getMicroTimestamp());
var_dump(\Tool\TimeHelper::getNanoTimestamp());

echo '时间转换:' . PHP_EOL;
var_dump(\Tool\TimeHelper::format('Y-m-d H:i:s', 'May 3, 2021'));

echo '今天是星期几:' . PHP_EOL;
var_dump(\Tool\TimeHelper::getWeekDay('Nov 28, 2022'));

echo '是否为闰年:' . PHP_EOL;
var_dump(\Tool\TimeHelper::isLeapYear('2020-3-2 10:15:33'));

echo '该日期的当年有多少天:' . PHP_EOL;
var_dump(\Tool\TimeHelper::daysInYear('2020-3-2 10:15:33'));
echo '该日期的当月有多少天:' . PHP_EOL;
var_dump(\Tool\TimeHelper::daysInMonth('2020-3-2 10:15:33'));